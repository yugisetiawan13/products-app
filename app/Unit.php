<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Unit extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'unit_name','desc'
    ];

    public function products()
    {
        return $this->hasMany('App\Products');
    }

    
}
