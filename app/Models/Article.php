<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'slug',
        'content',
        'thumbnail',
        'user_id'
    ];

    public function categories(){
        return $this->belongsToMany('App\Models\Category')->withTimestamps();
    }

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
