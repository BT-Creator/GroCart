<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroceryList extends Model
{
    use HasFactory;
    public $timestamps = false;
    public function order(){
        return $this -> belongsTo('app\Models\Order');
    }
    public function Item(){
        return $this -> hasMany('app\Models\Item');
    }
}
