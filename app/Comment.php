<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    public function board()
    {
        return $this->belongsTo('App\Board');
    }
}
