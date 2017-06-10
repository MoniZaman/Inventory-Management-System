<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
     protected $table='product';

     public function category()
    {
        return $this->belongsToMany('App\Category');
    }

    public function invoice()
    {
        return $this->hasOne('App\Invoice');
    }

    
}
