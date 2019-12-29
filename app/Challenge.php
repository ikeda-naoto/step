<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Challenge extends Model
{
    protected $fillable = [
        'parent_step_id', 'clear_num', 'user_id',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function parentStep()
    {
        return $this->belongsTo('App\ParentStep');
    }
}
