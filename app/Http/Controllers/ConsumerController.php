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
        $details = collect(validateDetails($request));
        $store_address = collect(validateStoreAddress($request));
        $delivery_address = collect(validateDeliveryAddress($request));
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

    private function updateDeliveryTable($delivery_address, int $userId, int $listId)
    {
        $details = getOrderDetails($userId, $listId);
        $delivery_id = collect($details[0]) -> get('delivery_id');
        DB::table('deliveries')
            ->where('id', '=', $delivery_id)
            ->update(['street' => $delivery_address -> get('delivery_street'),
                'house_number' => $delivery_address -> get('delivery_number'),
                'postal_code' => $delivery_address -> get('delivery_postal_code'),
                'city' => $delivery_address -> get('delivery_city'),
                'country' => $delivery_address -> get('delivery_country')]);
    }

    private function updateStoreTable($store_address, $userId, $listId)
    {
        $details = getOrderDetails($userId, $listId);
        $store_id = collect($details[0]) -> get('store_id');
        DB::table('stores') -> where('id', '=', $store_id)
            ->update(['street' => $store_address -> get('store_street'),
                'house_number' => $store_address -> get('store_number'),
                'postal_code' => $store_address -> get('store_postal_code'),
                'city' => $store_address -> get('store_city'),
                'country' => $store_address -> get('store_country')]);
    }

    private function updateOrderTable($order_details, $listId)
    {
        DB::table('orders') -> where('id', '=', $listId) -> update($order_details -> toArray());
    }

    function addList(Request $request, $id) {
        $items = collect(validateItems($request));
        $details = collect(validateDetails($request));
        $store_address = collect(validateStoreAddress($request));
        $delivery_address = collect(validateDeliveryAddress($request));
        $delivery_id = $this -> insertDelivery($delivery_address);
        $store_id = $this -> insertStore($store_address);
        $order_id = $this -> insertOrder($details, $delivery_id, $store_id, $id);
        $this -> insertItems($items, $order_id);
        return redirect()->route('open_list', [$id, $order_id]);
    }

    private function insertDelivery($delivery_address)
    {
        return DB::table('deliveries')->insertGetId(
            ['street' => $delivery_address -> get('delivery_street'),
            'house_number' => $delivery_address -> get('delivery_number'),
            'postal_code' => $delivery_address -> get('delivery_postal_code'),
            'city' => $delivery_address -> get('delivery_city'),
            'country' => $delivery_address -> get('delivery_country')]);
    }

    private function insertStore($store_address)
    {
        return DB::table('stores')->insertGetId(
            ['street' => $store_address -> get('store_street'),
            'house_number' => $store_address -> get('store_number'),
            'postal_code' => $store_address -> get('store_postal_code'),
            'city' => $store_address -> get('store_city'),
            'country' => $store_address -> get('store_country')]);
    }

    private function insertOrder($order, int $delivery_id, int $store_id, int $user_id)
    {
        $addon = ['delivery_id' => $delivery_id, 'store_id' => $store_id, 'user_id' => $user_id];
        return DB::table('orders')->insertGetId(array_merge($order -> toArray(), $addon));
    }

    private function insertItems($items, int $order_id)
    {
        foreach ($items as $key => $value){
            $item = collect(json_decode($value));
            $item = $item-> forget("id") -> put('order_id', $order_id) -> toArray();
            DB::table('items') -> insert($item) ;
        }
    }

    function openProfile()
    {
        return view('consumer.profile');
    }

}
