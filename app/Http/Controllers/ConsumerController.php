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
        $items = collect(jsonCollectionToItemArray($validated_items, $list)) -> forget('id') -> toArray();
        $details = validateDetails($request);
        $store_address = validateStoreAddress($request);
        $delivery_address = validateDeliveryAddress($request);
        $ref = collect(formatByItems(collect(DB::table('items')
                                        -> where('order_id', '=', $list)
                                        -> get()))) -> forget('id') -> toArray();
        $this -> updateItemTable($items, $ref);
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
                echo "Deleting item $key";
            }
        }
        foreach ($items as $key => $value){
            if($key < 0){
                echo "Detecting new item; inserting...";
            }
        }
    }
}
