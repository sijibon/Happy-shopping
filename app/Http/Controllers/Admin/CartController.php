<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Carts;
class CartController extends Controller
{
   public function Create(Request $request, $id){
       $check = Carts::where('product_id',$id)->where('user_ip', $request->ip())->first();
       if($check){
           Carts::where('product_id',$id)->where('user_ip', $request->ip())->increment('product_quantity');
           $notification = array(
            'message' => 'Product added on cart successfully!',
            'alert-type' => 'info'
        );
        return Redirect()->back()->with($notification);
       }else{
        $addCart = Carts::insert([
            'product_id' =>$id,
            'product_quantity' => 1,
            'product_price' =>$request->product_price,
            'user_ip' =>$request->ip(),
        ]);

        $notification = array(
            'message' => 'Product added on cart successfully!',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
       }
   }

        public function cartPage(){
            $cart = Carts::where('user_ip', request()->ip())->latest()->get();
            $total = Carts::all()->where('user_ip', request()->ip())->sum( function($t){
                return $t->product_price * $t->product_quantity;
            });
            return view('pages.cart_page', compact('cart','total'));
        }

        public function Destroy($id){
            Carts::where('id', $id)->where('user_ip', request()->ip())->delete();

            $notification = array(
                'message' => 'cart Deleted successfully!',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);

        }
        //quantity update
        public function quantity_update( Request $request, $id){
            Carts::where('id',$id)->where('user_ip',request()->ip())->update([
                'product_quantity'=>$request->quantity,
            ]);

            $notification = array(
                'message' => ' cart updated successfully!',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        }
}
