<?php

namespace App\Http\Controllers;
include 'Utilities/format.php';
include 'Utilities/validation.php';
include 'Utilities/dql.php';
include 'Utilities/dml.php';

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\MessageBag;

class ConsumerController extends Controller
{
    function index($id)
    {
        $data = getOrdersAndItems($id);
        $res = formatByOrders($data);
        return view('consumer.lists', ['orders' => $res]);
    }

    function openNewList()
    {
        return view('consumer.alter_list');
    }

    function openExistingList($id, $list)
    {
        $items = formatByOrders(getItemsFromList($id, $list));
        $order_details = getOrderDetails($id, $list);
        $order_details = collect($order_details->get(0));
        return view('consumer.alter_list', ['details' => $order_details, 'items' => $items]);
    }

    function deleteList(int $user_id, $list_id){
        DB::table('items') -> where("order_id", "=", $list_id) -> delete();
        DB::table('orders') -> where("user_id", "=", $user_id)
                -> where("id", "=", $list_id) -> delete();
        return Redirect::route('consumer_lists', [$user_id]);
    }

    function updateExistingList(Request $request, $id, $list)
    {
        $validated_items = validateItems($request);
        if (empty($validated_items)) {
            $errors = new MessageBag();
            $errors->add('Empty List', 'Saving empty lists are forbidden');
            return Redirect::route('open_list', [$id, $list])->withErrors($errors);
        } else {
            $items = jsonCollectionToItemArray($validated_items, $list);
            $details = collect(validateDetails($request));
            $store_address = collect(validateStoreAddress($request));
            $delivery_address = collect(validateDeliveryAddress($request));
            $ref = formatByItems(getItemsFromList($id, $list));
            updateItemTable($items, $ref);
            updateDeliveryTable($delivery_address, $id, $list);
            updateStoreTable($store_address, $id, $list);
            updateOrderTable($details, $list);
            DB::commit();
            return $this->openExistingList($id, $list);
        }
    }

    function addList(Request $request, $id): RedirectResponse
    {
        $items = validateItems($request);
        if (empty($items)) {
            $errors = new MessageBag();
            $errors->add('Empty List', 'Creating empty lists are forbidden');
            return Redirect::route('create_list', [$id])->withErrors($errors);
        } else {
            $items = collect($items);
            $details = collect(validateDetails($request));
            $store_address = collect(validateStoreAddress($request));
            $delivery_address = collect(validateDeliveryAddress($request));
            $delivery_id = insertDelivery($delivery_address);
            $store_id = insertStore($store_address);
            $list_id = insertOrder($details, $delivery_id, $store_id, $id);
            insertItems($items, $list_id);
            return redirect()->route('open_list', [$id, $list_id]);
        }
    }

    function openProfile($id)
    {
        $completed_orders = formatByOrders(getCompletedOrders($id));
        $ongoing_orders = formatByOrders(getOngoingOrders($id));
        $item_amount = 0;
        $status = $this->getOrderStatus($id);
        foreach ($completed_orders as $order){
            $item_amount += count($order);
        }
        foreach ($ongoing_orders as $order){
            $item_amount += count($order);
        }
        return view('consumer.profile', ['completed_orders' => $completed_orders, 'ongoing_orders' => $ongoing_orders, 'status_data' => $status, 'item_amount' => $item_amount]);
    }

    function makeOrder(int $user_id, int $order_id): RedirectResponse
    {
        DB::table('orders') -> where('orders.id', '=', $order_id)
            ->where('orders.id', '=', $order_id)
            ->update(['status' => 'ordered']);
        DB::commit();
        return redirect()->route('open_order', [$user_id, $order_id]);
    }

    function openOrder(int $user_id, int $order_id)
    {
        $order = collect(getOrderDetails($user_id, $order_id)[0]);
        return view('consumer.order', ['details' => $order]);
    }

    function openHistory(int $user_id){
        $completed_orders = formatByOrders(getCompletedOrders($user_id));
        $ongoing_orders = formatByOrders(getOngoingOrders($user_id));
        $status = $this->getOrderStatus($user_id);
        return view('consumer.history', ['completed_orders' => $completed_orders, 'ongoing_orders' => $ongoing_orders, 'status_data' => $status]);
    }

    private function getOrderStatus($user_id): array
    {
        $status = [];
        $status_data = getOrderStatus($user_id);
        foreach ($status_data as $order){
            $id = collect($order) -> get('id');
            $order_status = collect($order) -> get('status');
            $status[$id] = str_replace('_', ' ', $order_status);
        }
        return $status;
    }
}
