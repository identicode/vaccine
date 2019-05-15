<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purok extends Model
{
    protected $table = 'purok';
    protected $fillable = ['name', 'brgy_id'];

    public function brgy()
    {
    	return $this->belongsTo('App\Brgy', 'brgy_id');
    }
}
