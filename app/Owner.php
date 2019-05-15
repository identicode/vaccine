<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    protected $fillable = ['name', 'cp', 'bday', 'purok_id', 'brgy_id'];

    public function dog()
    {
    	return $this->hasMany('App\Dog', 'owner_id');
    }

    public function purok()
    {
    	return $this->belongsTo('App\Purok', 'purok_id');
    }

    public function brgy()
    {
    	return $this->belongsTo('App\Brgy', 'brgy_id');
    }
}
