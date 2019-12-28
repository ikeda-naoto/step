<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChallengeStep extends Model
{
    protected $fillable = [
        'parent_step_id', 'clear_num', 'user_id',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function parent()
    {
        return $this->belongsTo('App\ParentStep');
    }
}
