<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clear extends Model
{
    protected $fillable = [
        'challenge_id', 'child_step_id', 
    ];

    public function challenge()
    {
        return $this->belongsTo('App\Challenge');
    }
}
