<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pharmacy extends Model
{
    public $table = "pharmacies";
    public function order()
    { 
        return $this->hasMany(Order::class);
    }
}
