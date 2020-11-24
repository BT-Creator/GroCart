<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    use HasFactory;
    public $timestamps = false;
    public function orders(){
        return $this -> belongsTo('app/Models/Order');
    }
}
