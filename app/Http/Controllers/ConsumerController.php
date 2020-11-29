<?php
namespace App\Http\Controllers;
include 'Utilities/Format.php';
include 'Utilities/Validation.php';
include 'Utilities/Query.php';

use Illuminate\Http\Request;
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
        $items = collect(jsonCollectionToItemArray($validated_items, $list)) -> forget('id') -> toArray();
        $details = validateDetails($request);
        $store_address = validateStoreAddress($request);
        $delivery_address = validateDeliveryAddress($request);
        $ref = formatByItems(getItemsFromList($id, $list));
        $this -> updateItemTable($items, $ref);
        $this -> updateDeliveryTable($delivery_address, $id, $list);
        $this -> updateStoreTable($store_address, $id, $list);
        $this -> updateOrderTable($details, $id, $list);
        dd($items, $ref, $details, $store_address, $delivery_address);
    }


    function addList(Request $request, $id) {
        dd($request, $id);
    }

    function openProfile()
    {
        return view('consumer.profile');
    }

    //DB Sub-functions
    private function updateItemTable($items, $ref){
        foreach (array_keys($ref) as $key){
            if(!key_exists($key, $items)){
                echo "Deleting item $key \n";
            }
        }
        foreach ($items as $key => $value){
            if($key < 0){
                echo "Detecting new item; inserting... \n";
            }
        }
    }

    private function updateDeliveryTable(array $delivery_address, int $userId, int $listId)
    {
        $details = getOrderDetails($userId, $listId);
        $delivery_id = collect($details[0]) -> get('delivery_id');
        echo "Updating delivery with id $delivery_id for list $listId of user $userId \n";
    }

    private function updateStoreTable(array $store_address, $userId, $listId)
    {
        $details = getOrderDetails($userId, $listId);
        $store_id = collect($details[0]) -> get('store_id');
        echo "Updating store with id $store_id for list $listId of user $userId \n";
    }

    private function updateOrderTable(array $order_details, $userId, $listId)
    {
        $details = getOrderDetails($userId, $listId);
        echo "Updating order with id $listId of user $userId \n";
        dd($details);
    }
}
