<?php

namespace App;

use App\Player;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    public function players()
    {
        return $this->hasMany('App\Player');
    }
}
