<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conference extends Model
{
    protected $fillable = [
        'acronym', 'name', 'rating', 'start_date', 'end_date', 'price'
    ];
    public function city() { 
        return $this->belongsTo('App\City');
    }
}
