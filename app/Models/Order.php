<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function coffee(){
        return $this->belongsTo('App\Models\Coffee');
    }

    public function order_detail()
    {
        return $this->hasMany('App\Models\OrderDetail');
    }

    public function detail(){
        return $this->belongsTo('App\Models\OrderDetail','order_id');
    }

    public function orderCoffees(){
        return $this->hasMany('App\Models\OrderCoffee');
    }

    public function order_coffees()
    {
        return $this->hasMany('App\Models\OrderCoffee');
    }
}
