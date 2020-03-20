<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    //
    // public $timestamps = false;
    protected $primaryKey = 'trip_id';
    protected $fillable = ['current', 'destination', 'departure_date', 'trip_duration', 'note', 'traveller_id'];
}
