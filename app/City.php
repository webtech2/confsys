<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public function conferences() {
        return $this->hasMany('App\Conference');
    }
    
    public function country() {
        return $this->belongsTo('App\Country');
    }
}
