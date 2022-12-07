<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    use HasFactory;

    protected $fillable = [
        'article_id',
        'comment_id',
        'user_id',
        'body'
    ];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
