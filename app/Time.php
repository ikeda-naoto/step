<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Time extends Model
{
    public function children()
    {
        return $this->hasMany('App\ChildStep');
    }
}
