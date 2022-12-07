<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'article_id',
        'body'
    ];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function article(){
        return $this->belongsTo('App\Models\Article');
    }

    public function replies(){
        return $this->hasMany('App\Models\Reply');
    }
}
