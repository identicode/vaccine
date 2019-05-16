<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dog extends Model
{
    protected $fillable = [
    	'name',
    	'breed',
    	'age',
    	'gender',
        'status',
    	'vaccinated_by',
    	'owner_id',
        'purok_id',
    	'brgy_id',
        'color',
        'img'
    ];

    public function purok()
    {
        return $this->belongsTo('App\Purok', 'purok_id');
    }

    public function brgy()
    {
        return $this->belongsTo('App\Brgy', 'brgy_id');
    }

    public function owner()
    {
        return $this->belongsTo('App\Owner', 'owner_id');
    }

    public function lost()
    {
        return $this->hasMany('App\Laf', 'dog_id');
    }
    
}
