<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Products;
use App\Categories;
use App\brands;
use Image;
use Carbon\Carbon;
use DB;
class productController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    //add products
     public function Create(){
         $category = Categories::get()->orderBy('id', 'DESC');
         $brand = brands::get();
        return view('admin.product.add_product', compact('category', 'brand'));
   }

        public function Store(Request $request){
         $request->validate([
             'product_name' => 'required|max:255',
             'product_code' => 'required|max:11',
             'product_quantity' => 'required',
             'product_price' =>'required',
             'category_id' =>'required',
             'brand_id' =>'required',
             'product_title' => 'required|max:500',
             'product_details' => 'required',
             'product_image1' =>'required|mimes:jpg,jpeg,png,gif',
             'product_image2' =>'required|mimes:jpg,jpeg,png,gif',
             'product_image3' =>'required|mimes:jpg,jpeg,png,gif',
         ]);
            //image1
            $image1 = $request->product_image1;
            if($image1){
            $image_gen = hexdec(uniqid()).'.'.$image1->getClientOriginalExtension();
            Image::make($image1)->resize(270,270)->save('frontend/img/product/upload/'.$image_gen);
            $image_url1 = ('frontend/img/product/upload/'.$image_gen);

         }
    
         //image2
          $image2 = $request->product_image2;
          if($image2){
            $image_gen = hexdec(uniqid()).'.'.$image2->getClientOriginalExtension();
            Image::make($image2)->resize(270,270)->save('frontend/img/product/upload/'.$image_gen);
            $image_url2 = ('frontend/img/product/upload/'.$image_gen);
   
         }
     
         //image3
          $image3 = $request->product_image3;
          if($image3){
            $image_gen = hexdec(uniqid()).'.'.$image3->getClientOriginalExtension();
            Image::make($image3)->resize(270,270)->save('frontend/img/product/upload/'.$image_gen);
            $image_url3 = ('frontend/img/product/upload/'.$image_gen);
         }
      

        //  Insert product
           Products::insert([
            'category_id' => $request->category_id,
            'brand_id' => $request->brand_id,
            'product_name' =>$request->product_name,
            'product_slug' => strtolower(str_replace(' ','-',$request->product_name)),
            'product_code' =>$request->product_code,
            'product_quantity' =>$request->product_quantity,
            'product_price' =>$request->product_price,
            'product_title' =>$request->product_title,
            'product_details' =>$request->product_details,
            'product_image1' => $image_url1,
            'product_image2' => $image_url2,
            'product_image3' =>$image_url3,
            'created_at' => Carbon::now(),
         ]);

         $notification = array(
            'message' => 'Product added successfully!',
            'alert-type' => 'success'
        );
        return Redirect()->route('add-product')->with($notification);
     }

     public function ManageProduct(){
        $manageProduct = Products::latest()->get();
        return view('admin.product.manage_product', compact('manageProduct'));
     }

     //edit product
     public function editProduct($id){
        $editProduct = Products::find($id);
        $category = Categories::get();
        $brand = brands::get();
         return view('admin.product.edit_product', compact('editProduct','category','brand'));
     }
   

     
     //Update product 
     public function updateProduct( Request $request, $id){
         Products::find($id)->update([
         'category_id' => $request->category_id,
         'brand_id' => $request->brand_id,
         'product_name' =>$request->product_name,
         'product_slug' => strtolower(str_replace(' ','-',$request->product_name)),
         'product_code' =>$request->product_code,
         'product_quantity' =>$request->product_quantity,
         'product_price' =>$request->product_price,
         'product_title' =>$request->product_title,
         'product_details' =>$request->product_details,
         'updated_at' => Carbon::now(),
      ]);

      $notification = array(
         'message' => 'Updated successfully!',
         'alert-type' => 'success'
      );
      return redirect()->route('manage-product')->with($notification);
   }

     public function updateImage(Request $request, $id){
         $old_image1 = $request->image1;
         $old_image2 = $request->image2;
         $old_image3 = $request->image3;

         if($request->has('product_image1')){
              unlink($old_image1);
             //image1
             $image1 = $request->product_image1;
             $image_gen = hexdec(uniqid()).'.'.$image1->getClientOriginalExtension();
             Image::make($image1)->resize(270,270)->save('frontend/img/product/upload/'.$image_gen);
             $image_url1 = ('frontend/img/product/upload/'.$image_gen);

             Products::find($id)->update([
                'product_image1' => $image_url1,
                'updated_at' =>Carbon::now(),
             ]);

             $notification = array(
               'message' => 'Image Updated successfully!',
               'alert-type' => 'success'
            );
             return redirect()->route('manage-product')->with($notification);
      }

         if($request->has('product_image2')){
            unlink($old_image2);
         //image2
         $image2 = $request->product_image2;
         $image_gen = hexdec(uniqid()).'.'.$image2->getClientOriginalExtension();
         Image::make($image2)->resize(270,270)->save('frontend/img/product/upload/'.$image_gen);
         $image_url2 = ('frontend/img/product/upload/'.$image_gen);

         Products::find($id)->update([
            'product_image2' => $image_url2,
            'updated_at' =>Carbon::now(),
         ]);

         $notification = array(
            'message' => 'Image Updated successfully!',
            'alert-type' => 'success'
         );
         return redirect()->route('manage-product')->with($notification);
      }

         if($request->has('product_image3')){
            unlink($old_image3);
         //image3
         $image3 = $request->product_image3;
         $image_gen = hexdec(uniqid()).'.'.$image3->getClientOriginalExtension();
         Image::make($image3)->resize(270,270)->save('frontend/img/product/upload/'.$image_gen);
         $image_url3 = ('frontend/img/product/upload/'.$image_gen);

         Products::find($id)->update([
            'product_image3' => $image_url3,
            'updated_at' =>Carbon::now(),
         ]);

         $notification = array(
            'message' => 'Image Updated successfully!',
            'alert-type' => 'success'
         );
         return redirect()->route('manage-product')->with($notification);
      }
         
   } 

      //Delete product
      public function deleteProduct($id){
        $image = Products::find($id);
        $image1 = $image->product_image1;
        $image2 = $image->product_image2;
        $image3 = $image->product_image3;
        unlink($image1);
        unlink($image2);
        unlink($image3);
        Products::find($id)->delete();

        $notification = array(
         'message' => 'Product Deleted successfully!',
         'alert-type' => 'success'
      );
      return redirect()->route('manage-product')->with($notification);
   }

      //deactive
       public function deactiveProduct($id){
         Products::find($id)->update(['product_status' => 0]);
         return redirect()->back();
      }
      //active 
      public function activeProduct($id){
         Products::find($id)->update(['product_status' => 1]);
         return redirect()->back();
   }
}
