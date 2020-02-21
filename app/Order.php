<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public $table = "orders";
    public function pharmacy()
    {
       return $this->belongsTo(Pharmacy::class);
    }
    public function user()
    {
       return $this->belongsTo(User::class);
    }

}
