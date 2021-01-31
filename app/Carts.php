<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carts extends Model
{
    protected $fillable = [
        'product_id','product_quantity','product_price','user_ip'
    ];

    public function product(){
        return $this->belongsTo(Products::class,'product_id');
    }
}
