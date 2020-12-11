<?php

use Illuminate\Support\Facades\DB;

/* UPDATE DML's */
function updateItemTable($items, $ref)
{
    foreach (array_keys($ref) as $key) {
        if (!key_exists($key, $items)) {
            DB::table('items')->where('id', '=', $key)->delete();
        }
    }
    foreach ($items as $key => $value) {
        if ($key < 0) {
            $new_item = collect($value);
            DB::table('items')->insert(
                ['name' => $new_item->get('name'),
                    'brand' => $new_item->get('brand'),
                    'weight' => $new_item->get('weight'),
                    'note' => $new_item->get('note'),
                    'order_id' => $new_item->get('order_id')]
            );
        }
    }
}

function updateDeliveryTable($delivery_address, int $userId, int $listId)
{
    $details = getOrderDetails($userId, $listId);
    $delivery_id = collect($details[0])->get('delivery_id');
    DB::table('deliveries')
        ->where('id', '=', $delivery_id)
        ->update(['street' => $delivery_address->get('delivery_street'),
            'house_number' => $delivery_address->get('delivery_number'),
            'postal_code' => $delivery_address->get('delivery_postal_code'),
            'city' => $delivery_address->get('delivery_city'),
            'country' => $delivery_address->get('delivery_country')]);
}

function updateStoreTable($store_address, $userId, $listId)
{
    $details = getOrderDetails($userId, $listId);
    $store_id = collect($details[0])->get('store_id');
    DB::table('stores')->where('id', '=', $store_id)
        ->update(['street' => $store_address->get('store_street'),
            'house_number' => $store_address->get('store_number'),
            'postal_code' => $store_address->get('store_postal_code'),
            'city' => $store_address->get('store_city'),
            'country' => $store_address->get('store_country')]);
}

function updateOrderTable($order_details, $listId)
{
    DB::table('orders')->where('id', '=', $listId)->update($order_details->toArray());
}

/* INSERT DML's */
function insertDelivery($delivery_address): int
{
    return DB::table('deliveries')->insertGetId(
        ['street' => $delivery_address->get('delivery_street'),
            'house_number' => $delivery_address->get('delivery_number'),
            'postal_code' => $delivery_address->get('delivery_postal_code'),
            'city' => $delivery_address->get('delivery_city'),
            'country' => $delivery_address->get('delivery_country')]);
}

function insertStore($store_address): int
{
    return DB::table('stores')->insertGetId(
        ['street' => $store_address->get('store_street'),
            'house_number' => $store_address->get('store_number'),
            'postal_code' => $store_address->get('store_postal_code'),
            'city' => $store_address->get('store_city'),
            'country' => $store_address->get('store_country')]);
}

function insertOrder($order, int $delivery_id, int $store_id, int $user_id): int
{
    $addon = ['delivery_id' => $delivery_id, 'store_id' => $store_id, 'user_id' => $user_id];
    return DB::table('orders')->insertGetId(array_merge($order->toArray(), $addon));
}

function insertItems($items, int $order_id)
{
    foreach ($items as $key => $value) {
        $item = collect(json_decode($value));
        $item = $item->forget("id")->put('order_id', $order_id)->toArray();
        DB::table('items')->insert($item);
    }
}
