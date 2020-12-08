<?php

use Illuminate\Http\Request;

function validateDetails(Request $request): array
{
    $rules = [
        "picking_method" => "nullable|string|max:64",
        "delivery_notes" => "string|nullable",
        "medical_notes" => "string|nullable"
    ];
    return $request->validate($rules);
}

function validateStoreAddress(Request $request): array
{
    $rules = [
        "store_street" => "string|max:64",
        "store_number" => "string|max:6",
        "store_postal_code" => "string|max:8",
        "store_city" => "string|max:64",
        "store_country" => "string|max:64"
    ];
    return $request->validate($rules);
}

function validateDeliveryAddress(Request $request): array
{
    $rules = [
        "delivery_street" => "string|max:64",
        "delivery_number" => "string|max:6",
        "delivery_postal_code" => "string|max:8",
        "delivery_city" => "string|max:64",
        "delivery_country" => "string|max:64"
    ];
    return $request->validate($rules);
}

function validateItems(Request $request): array
{
    $item_attributes = [];
    foreach ($request->post() as $key => $value) {
        if (str_contains($key, 'item:')) {
            array_push($item_attributes, $key);
        }
    }
    if (empty($item_attributes)) {
        return [];
    }
    $rules = [];
    foreach ($item_attributes as $attribute) {
        $rules[$attribute] = "json";
    }
    return $request->validate($rules);
}
