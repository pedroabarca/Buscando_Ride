<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ride extends Model
{
    //
    protected $fillable = [
        'user_id','name', 'departure', 'destination','description','departure_time',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    /**
     * The days that belong to the ride.
     */
    public function days()
    {
        return $this->belongsToMany('App\Day');
    }

}
