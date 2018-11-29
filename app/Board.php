<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Board extends Model
{

    protected $primaryKey='num';

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
