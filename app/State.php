<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    /**
     * Get all of the rides for the state.
     */

    public function users()
    {
        return $this->hasMany('App\User');
    }
}
