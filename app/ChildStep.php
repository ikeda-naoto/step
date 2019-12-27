<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChildStep extends Model
{
    protected $fillable = [
        'child_title', 'time', 'child_content', 'num'
    ];

    public function parent()
    {
        return $this->belongsTo('App\ParentStep');
    }

    public function time()
    {
        return $this->belongsTo('App\Time');
    }
}
