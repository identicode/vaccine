<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brgy extends Model
{
	protected $fillable = ['name'];
    protected $table = 'brgy';

    public function purok()
    {
    	return $this->hasMany('App\Purok', 'brgy_id');
    }

    public function dog()
    {
    	return $this->hasMany('App\Dog', 'brgy_id');
    }
}
