<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Laf extends Model
{
    protected $fillable = [
    	'owner',
    	'cp',
    	'dog',
    	'breed',
    	'lost',
    	'image'
    ];
}
