<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderCoffee extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function coffee(){
        return $this->belongsTo('App\Models\Coffee');
    }

    public function order(){
        return $this->belongsTo('App\Models\Order');
    }
}
