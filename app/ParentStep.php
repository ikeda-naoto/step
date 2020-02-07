<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ParentStep extends Model
{
    use SoftDeletes;

    protected $table = 'parent_steps';
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'title', 'category_id', 'content', 'pic', 
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
