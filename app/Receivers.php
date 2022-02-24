<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Receivers extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'tnum', 'name', 'phone', 'address'
    ];
}
