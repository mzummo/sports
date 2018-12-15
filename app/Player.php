<?php

namespace App;

use App\Team;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstName', 'lastName'
    ];

    public function team()
    {
        return $this->belongsTo('App\Team');
    }   
}