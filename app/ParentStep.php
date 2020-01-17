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

    public function childSteps()
    {
        return $this->hasMany('App\ChildStep');
    }

    public function category() {
        return $this->belongsTo('App\Category');
    }

    public function challenges()
    {
        return $this->hasMany('App\Challenge');
    }
    
}
