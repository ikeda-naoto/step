<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Challenge extends Model
{
    protected $fillable = [
        'parent_step_id', 'user_id',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function parentStep()
    {
        return $this->belongsTo('App\ParentStep');
    }

    public function clears()
    {
        return $this->hasMany('App\Clear');
    }
}
