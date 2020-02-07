<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clear extends Model
{
    protected $fillable = [
        'challenge_id', 'child_step_id', 'user_id', 
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function challenge()
    {
        return $this->belongsTo('App\ParentStep');
    }
}
