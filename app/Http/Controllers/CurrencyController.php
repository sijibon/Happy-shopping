<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Currency;
class CurrencyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

   public function CreateCurrency()
   {
      $show_currency = Currency::orderBy('id', 'DESC')->get();
      return view('admin.currency.add_currency', compact('show_currency'));
   }

   public function PostCurrency(Request $request)
   {
        $request->validate([
            'currency_icon' => 'required',
        ]);

        $currency = new Currency;
        $currency->currency_icon = $request->currency_icon;
        $currency->save();

        $notification = array(
            'message' => 'currency added successfully!',
            'alert-type' => 'success'
        );
        return Redirect()->route('create_currency')->with($notification);
   }

    public function delete($id)
    {
        Currency::where('id',$id)->delete();
        $notification = array(
            'message' => 'Deleted successfully!',
            'alert-type' => 'success'
        );
        return Redirect()->route('create_currency')->with($notification);
    }
}
