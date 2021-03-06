<?php

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

function getOrdersAndItems(int $userId): Collection
{
    return DB::table('orders')
        ->join('items', 'orders.id', '=', 'items.order_id')
        ->select('orders.id', 'items.*')
        ->where('orders.user_id', '=', $userId)
        ->where('orders.status', '=', 'draft')
        ->orderByDesc('orders.id')
        ->get();
}

function getItemsFromList(int $userId, int $listId): Collection
{
    return DB::table('orders')
        ->join('items', 'orders.id', '=', 'items.order_id')
        ->select('items.*')
        ->where('orders.user_id', '=', $userId)
        ->where('orders.id', '=', $listId)
        ->get();
}

function getOrderDetails(int $userId, int $listId): Collection
{
    return DB::table('orders')
        ->join('deliveries', 'orders.delivery_id', '=', 'deliveries.id')
        ->join('stores', 'orders.store_id', '=', 'stores.id')
        ->select('orders.id', 'orders.picking_method', 'orders.delivery_notes', 'orders.medical_notes', 'orders.status',
            'deliveries.id as delivery_id', 'deliveries.street as delivery_street', 'deliveries.house_number as delivery_house_number',
            'deliveries.postal_code as delivery_postal_code', 'deliveries.city as delivery_city',
            'deliveries.country as delivery_country',
            'stores.id as store_id', 'stores.street as store_street', 'stores.house_number as store_house_number',
            'stores.postal_code as store_postal_code', 'stores.city as store_city', 'stores.country as store_country')
        ->where('orders.user_id', '=', $userId)
        ->where('orders.id', '=', $listId)
        ->get();
}

function getOngoingOrders($user_id): Collection
{
    return DB::table('orders')
        ->join('items', 'orders.id', '=', 'items.order_id')
        ->select('orders.id', 'items.*')
        ->where('orders.user_id', '=', $user_id)
        ->where('orders.status', '!=', 'completed')
        ->where('orders.status', '!=', 'draft')
        ->orderByDesc('orders.id', 'orders.status')
        ->get();
}

function getCompletedOrders($user_id): Collection
{
    return DB::table('orders')
        ->join('items', 'orders.id', '=', 'items.order_id')
        ->select('orders.id', 'items.*')
        ->where('orders.user_id', '=', $user_id)
        ->where('orders.status', '=', 'completed')
        ->orderByDesc('orders.id')
        ->get();
}

function getOrderStatus($user_id): Collection
{
    return DB::table('orders') -> select('orders.id', 'orders.status')
        -> where('orders.status', '!=', 'completed')
        -> where('orders.status', '!=', 'draft')
        -> where('orders.user_id', '=', $user_id) -> get();
}
