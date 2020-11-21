<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    public $timestamps = false;
    public function groceryList(){
        return $this -> hasOne('app\Models\GroceryList');
    }
    public function store(){
        return $this ->hasOne('app/Models/Store');
    }
    public function delivery(){
        return $this ->hasOne('app/Models/Delivery');
    }
}
