<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shippers extends Model
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
