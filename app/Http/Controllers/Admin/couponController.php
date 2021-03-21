<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\coupons;
class couponController extends Controller
{
   
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function Create(){
        $coupon = coupons::orderBy('id','DESC')->paginate(10);
        return view('admin.coupon.add_coupon', compact('coupon'));
    }

    public function Store(Request $request){
        $request->validate([
            'coupon_name' => 'required',
            'discount' => 'required',
        ]);

        $coupon = new coupons;
        $coupon->coupon_name = $request->coupon_name;
        $coupon->discount = $request->discount;
        $coupon->save();

        $notification = array(
            'message' => 'Coupon added successfully!',
            'alert-type' => 'success'
        );
        return Redirect()->route('add.coupon')->with($notification);
       
    }

    public function Edit($id){
        $editCoupon = coupons::findOrFail($id);
        return view('admin.coupon.edit_coupon', compact('editCoupon'));
    }

    public function Update(Request $request, $id){
    $updateCoupon = coupons::find($id);
    $updateCoupon->coupon_name = $request->coupon_name;
    $updateCoupon->discount = $request->discount;
    $updateCoupon->update();

    $notification = array(
        'message' => 'Update brand successfully!',
        'alert-type' => 'success'
    );
    return Redirect()->route('add.coupon')->with($notification);
    
 }

    public function Delete($id){
        $deleteCoupon = coupons::find($id)->delete();
   
        $notification = array(
            'message' => 'Deleted successfully!',
            'alert-type' => 'success'
        );

     return Redirect()->route('add.coupon')->with($notification);

    }

    public function Deactive($id){
    coupons::find($id)->update(['status'=>0]);
    return Redirect()->route('add.coupon');

 }

    public function Active($id){
    coupons::find($id)->update(['status'=>1]);
    return Redirect()->route('add.coupon');

  }
}
