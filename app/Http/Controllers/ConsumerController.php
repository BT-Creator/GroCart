<?php
namespace App\Http\Controllers;
include 'Utilities/Format.php';
include 'Utilities/Validation.php';
include 'Utilities/Query.php';

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

    function updateExistingList(Request $request, $id, $list) {
        $validated_items = validateItems($request);
        $items = jsonCollectionToItemArray($validated_items, $list);
        $details = validateDetails($request);
        $store_address = validateStoreAddress($request);
        $delivery_address = validateDeliveryAddress($request);
        $ref = formatByItems(getItemsFromList($id, $list));
        $this -> updateItemTable($items, $ref);
        $this -> updateDeliveryTable($delivery_address, $id, $list);
        $this -> updateStoreTable($store_address, $id, $list);
        $this -> updateOrderTable($details, $list);
        return $this->openExistingList($id, $list);
    }

    private function updateItemTable($items, $ref){
        foreach (array_keys($ref) as $key){
            if(!key_exists($key, $items)){
                DB::table('items') -> where('id', '=', $key) -> delete();
            }
        }
        foreach ($items as $key => $value){
            if($key < 0) {
                $new_item = collect($value);
                DB::table('items') -> insert(
                    ['name' => $new_item -> get('name'),
                        'brand' => $new_item -> get('brand'),
                        'weight' => $new_item -> get('weight'),
                        'note' => $new_item -> get('note'),
                        'order_id' => $new_item -> get('order_id')]
                );
            }
        }
    }

    private function updateDeliveryTable(array $delivery_address, int $userId, int $listId)
    {
        $details = getOrderDetails($userId, $listId);
        $delivery_id = collect($details[0]) -> get('delivery_id');
        $delivery_address = collect($delivery_address);
        DB::table('deliveries')
            ->where('id', '=', $delivery_id)
            ->update(['street' => $delivery_address -> get('delivery_street'),
                'house_number' => $delivery_address -> get('delivery_number'),
                'postal_code' => $delivery_address -> get('delivery_postal_code'),
                'city' => $delivery_address -> get('delivery_city'),
                'country' => $delivery_address -> get('delivery_country')]);
    }

    private function updateStoreTable(array $store_address, $userId, $listId)
    {
        $details = getOrderDetails($userId, $listId);
        $store_id = collect($details[0]) -> get('store_id');
        $store_address = collect($store_address);
        DB::table('stores') -> where('id', '=', $store_id)
            ->update(['street' => $store_address -> get('store_street'),
                'house_number' => $store_address -> get('store_number'),
                'postal_code' => $store_address -> get('store_postal_code'),
                'city' => $store_address -> get('store_city'),
                'country' => $store_address -> get('store_country')]);
    }

    private function updateOrderTable(array $order_details, $listId)
    {
        $order_details = collect($order_details);
        DB::table('orders') -> where('id', '=', $listId) -> update($order_details -> toArray());
    }

    function addList(Request $request, $id) {
        $items = validateItems($request);
        $details = validateDetails($request);
        $store_address = validateStoreAddress($request);
        $delivery_address = validateDeliveryAddress($request);
        dd($request, $items, $details, $store_address, $delivery_address);
        $delivery_id = $this -> insertDelivery($delivery_address);
        $store_id = $this -> insertStore($store_address);
        $order_id = $this -> insertOrder($details, $delivery_id, $store_id);
        $this -> insertItems($items, $order_id);
    }

    function openProfile()
    {
        return view('consumer.profile');
    }

    //DB Sub-functions
    private function insertDelivery(array $delivery_address)
    {
    }

    private function insertStore(array $store_address)
    {
    }

    private function insertOrder(array $order, int $delivery_id, int $store_id)
    {
    }

    private function insertItems(array $items, int $order_id)
    {
    }

}
