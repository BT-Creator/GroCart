<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    public $timestamps = false;
    public function item(){
        return $this -> hasMany('app\Models\Item');
    }
    public function store(){
        return $this ->hasOne('app/Models/Store');
    }
    public function delivery(){
        return $this ->hasOne('app/Models/Delivery');
    }
    public function user(){
        return $this -> belongsTo('app/Models/User');
    }
}
