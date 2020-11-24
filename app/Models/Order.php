<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    public $timestamps = false;
    public function items(){
        return $this -> hasMany(Item::class);
    }
    public function stores(){
        return $this ->hasOne(Store::class);
    }
    public function deliveries(){
        return $this ->hasOne(Delivery::class);
    }
    public function users(){
        return $this -> belongsTo(User::class);
    }
}
