<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;
use App\Categories;
class frontendController extends Controller
{
    public function index(){
        $product = Products::where('product_status',1)->get();
        $category = Categories::where('status',1)->get();
        return view('pages.home',compact('product','category'));
    }
}
