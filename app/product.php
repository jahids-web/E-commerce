<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $fillable = ['product_thumbnail_photo'];

    function get_multiple_photos(){
        return $this->hasMany('App\product_multiple_photo', 'product_id', 'id');
    }
}
