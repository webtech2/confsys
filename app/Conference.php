<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Conference extends Model
{
    protected $fillable = [
        'acronym', 'name', 'rating', 'start_date', 'end_date', 'price'
    ];
    public function city() { 
        return $this->belongsTo('App\City');
    }
    public function year() {
        return Carbon::createFromFormat('Y-m-d',$this->start_date)->year;        
    }
}
