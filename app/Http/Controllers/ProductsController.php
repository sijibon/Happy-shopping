<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin\Products;
use App\Categories;
use App\brands;
class ProductsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

//     //add products
//      public function Create(){
//          $category = Categories::get();
//         return view('admin.product.add_product');
//    }
}
