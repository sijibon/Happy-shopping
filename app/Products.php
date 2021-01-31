<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
class Products extends Model
{
    protected $fillable = [
        'category_id','brand_id','product_name','product_code','product_slug','product_quantity','product_price','product_title','product_details',
        'product_image1','product_image2','product_image3','product_status'
    ];

    public function category(){
        return $this->belongsTo('App\Categories');
    }

    public function brand(){
        return $this->belongsTo(brands::class);
    }
}
