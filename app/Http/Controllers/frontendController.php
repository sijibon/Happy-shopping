<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;
use App\Categories;
use App\sliders;
use App\Banners;
use App\Currency;
use DB;
use App\sub_categories;

class frontendController extends Controller
{
    public function index(){
        $products = DB::table('products')
                    ->join('currencies','products.currency_id','=','currencies.id')
                    ->select('currencies.currency_icon','products.*')->where(['product_status'=>1])->get();
                    $category = Categories::where('status',1)->get();     
                    $img_slide = sliders::where('status',1)->get();        
                    $banner_img = Banners::where(['status'=>1])->get();        
                    return view('pages.home',compact('products','category','img_slide','banner_img'));
    }

    
    
    public function show_category($id)
    {
        $show_category = sub_categories::where('category_id', $id)->get();
        return view('pages.home',compact('show_category'));
    }

    public function sub_category($id){
            $sub_categories = DB::table('products')->where('sub_category_id',$id)
                             ->join('currencies','products.currency_id', '=', 'currencies.id')
                             ->join('categories','products.category_id', '=', 'categories.id')
                             ->join('sub_categories','products.sub_category_id', '=', 'sub_categories.id')
                             ->select('products.*','currencies.currency_icon', 'categories.category_name','sub_categories.sub_category_name')
                             ->get();  
                            //  dd($sub_categories);
                            //  die();              
            return view('pages.product', compact('sub_categories'));
    }


    public function product_details($id){
        $product_details = DB::table('products')->where('id',$id)
                        //  ->join('currencies','products.currency_id', '=', 'currencies.id')
                        //  ->join('categories','products.category_id', '=', 'categories.id')
                        //  ->join('sub_categories','products.sub_category_id', '=', 'sub_categories.id')
                        //  ->select('products.*','currencies.currency_icon', 'categories.category_name','sub_categories.sub_category_name')
                         ->get();  
                        //  dd($product_details);
                        //  die();              
        return view('pages.product_details', compact('product_details'));
}
}
