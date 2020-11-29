<?php

function formatByOrders($data)
{
    $first_item = collect($data->shift());
    $first_item_id = $first_item->get('order_id');
    $res = array(
        $first_item_id => array($first_item->toArray())
    );
    foreach ($data as $item) {
        $object = collect($item);
        foreach ($res as $key => $value) {
            if ($key === $object->get('order_id')) {
                array_push($value, $object->toArray());
                $res[$key] = $value;
            } else {
                $res[$object->get('order_id')] = array($object->toArray());
            }
        }
    }
    return $res;
}

function formatByItems($data){
    $res = [];
    foreach ($data as $key => $entry){
        $entry = collect($entry);
        $res[$entry -> get('id')] = collect($entry) -> toArray();
    }
    return $res;
}

function jsonCollectionToItemArray(array $json_collection, $list){
    $res = [];
    foreach ($json_collection as $item_json){
        $item = collect(json_decode($item_json)) -> toArray();
        if(!array_key_exists('order_id', $item)){
            $item['order_id'] = intval($list);
        }
        $res[$item['id']] = $item;
    }
    return $res;
}
