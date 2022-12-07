<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'coffee_id',
        'jumlah'
    ];

    public function coffee(){
        return $this->belongsTo('App\Models\Coffee');
    }
}
