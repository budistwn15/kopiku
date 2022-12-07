<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coffee extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function types(){
        return $this->belongsToMany('App\Models\Type')->withTimestamps();
    }
}
