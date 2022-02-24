<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'user_id', 'category', 'flink', 'title', 'img', 'irdc', 'content', 'likes', 'status'
    ];
}
