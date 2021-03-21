<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class Categories extends Model
{
    protected $fillable = [
        'category_name','status'
    ];

    public function sub_category(){
        return $this->hasMany('App\sub_categories', 'category_id', 'id');
    }


}
