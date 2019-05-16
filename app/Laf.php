<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Laf extends Model
{
    protected $fillable = [
    	'dog_id',
    	'date_lost',
    	'date_report',
    	'date_found'
    ];

    public function dog()
    {
    	return $this->belongsTo('App\Dog', 'dog_id');
    }
}
