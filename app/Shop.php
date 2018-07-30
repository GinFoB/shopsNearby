<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    protected $table = 'shops';

    protected $fillable = [
        '_id', 'city', 'email','coordinates0', 'coordinates1', 'locationType', 'name', 'picture'
    ];

}
