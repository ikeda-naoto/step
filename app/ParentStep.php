<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ParentStep extends Model
{
    protected $fillable = [
        'parent_title', 'category_id', 'parent_content', 'pic'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function children()
    {
        return $this->hasMany('App\ChildStep');
    }
}
