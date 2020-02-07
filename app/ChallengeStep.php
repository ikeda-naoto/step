<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChallengeStep extends Model
{
    public function clears()
    {
        return $this->hasMany('App\ChildStep');
    }
}
