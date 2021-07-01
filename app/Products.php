<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $fillable =[
        'unit_id','category_id','sku', 'product_name', 'price', 'sale_price', 'description', 'photo'
    ];


    public function category() {
        return $this->belongsTo('App\Category');
    }

    public function unit() {
        return $this->belongsTo('App\Unit');
    }
}
