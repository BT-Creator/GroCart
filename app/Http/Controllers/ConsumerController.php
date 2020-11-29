<?php


namespace App\Http\Controllers;
include 'Utilities/Format.php';
include 'Utilities/Validation.php';
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ConsumerController extends Controller
{
    //Main Functions
    function index($id)
    {
        $data = DB::table('orders')
            ->join('items', 'orders.id', '=', 'items.order_id')
            ->select('orders.id', 'items.*')
            ->where('orders.user_id', '=', $id)
            ->where('orders.status', '=', 'draft')
            ->orderByDesc('orders.id')
            ->get();
        $res = formatByOrders($data);
        return view('consumer.lists', ['orders' => $res]);
    }

    function openNewList()
    {
        return view('consumer.alter_list');
    }

    function openExistingList($id, $list)
    {
        $items = DB::table('orders')
            ->join('items', 'orders.id', '=', 'items.order_id')
            ->select('items.*')
            ->where('orders.user_id', '=', $id)
            ->where('orders.id', '=', $list)
            ->get();
        $items = formatByOrders($items);
        $order_details = DB::table('orders')
            ->join('deliveries', 'orders.delivery_id', '=', 'deliveries.id')
            ->join('stores', 'orders.store_id', '=', 'stores.id')
            ->select('orders.id', 'orders.picking_method', 'orders.delivery_notes', 'orders.medical_notes',
                'deliveries.street as delivery_street', 'deliveries.house_number as delivery_house_number',
                'deliveries.postal_code as delivery_postal_code', 'deliveries.city as delivery_city',
                'deliveries.country as delivery_country',
                'stores.street as store_street', 'stores.house_number as store_house_number',
                'stores.postal_code as store_postal_code', 'stores.city as store_city', 'stores.country as store_country')
            ->where('orders.user_id', '=', $id)
            ->where('orders.id', '=', $list)
            ->get();
        $order_details = collect($order_details->get(0));
        return view('consumer.alter_list', ['details' => $order_details, 'items' => $items]);
    }

    function updateExistingList(Request $request, $id, $list) {
        $validated_items = validateItems($request);
        $items = jsonCollectionToItemArray($validated_items, $list);
        $details = validateDetails($request);
        $store_address = validateStoreAddress($request);
        $delivery_address = validateDeliveryAddress($request);
        $ref = formatByItems(collect(DB::table('items')
                                        -> where('order_id', '=', $list)
                                        -> get()));
        $this -> updateItemDB($items, $ref);
        dd($items, $details, $store_address, $delivery_address);
    }


    function addList(Request $request, $id) {
        dd($request, $id);
    }

    function openProfile()
    {
        return view('consumer.profile');
    }

    //DB Sub-functions
    private function updateItemDB($items, $ref){
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
