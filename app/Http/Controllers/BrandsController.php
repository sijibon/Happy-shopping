<?php

namespace App\Http\Controllers;
use Redirect;
use Illuminate\Http\Request;
use App\brands;
class BrandsController extends Controller
{

    
        public function __construct()
        {
            $this->middleware('auth:admin');
        }

            public function Create(){
            $data = brands::paginate(8);
            return view('admin.brand.add_brand', compact('data'));
        }

        public function Store(Request $request){
            $request->validate([
                'brand_name' => 'required',
            ]);

            $brand = new brands;
            $brand->brand_name = $request->brand_name;
            $brand->save();

            $notification = array(
                'message' => 'Brand added successfully!',
                'alert-type' => 'success'
            );
            return Redirect()->route('add.brand')->with($notification);
           
        }

        public function Edit($id){
            $editBrand = brands::findOrFail($id);
            return view('admin.brand.edit_brand', compact('editBrand'));
        }

        public function Update(Request $request, $id){
        $request->validate([
            'brand_name' => 'required',
        ]);

        $updateBrand = brands::find($id);
        $updateBrand->brand_name = $request->brand_name;
        $updateBrand->save();

        $notification = array(
            'message' => 'Update brand successfully!',
            'alert-type' => 'success'
        );
        return Redirect()->route('add.brand')->with($notification);
        
     }

        public function Delete($id){
        $deleteBrand = brands::find($id);
        $deleteBrand->delete();

         $notification = array(
            'message' => 'Deleted successfully!',
            'alert-type' => 'success'
        );

        return Redirect()->route('add.brand')->with($notification);

        }

        public function Deactive($id){
        brands::find($id)->update(['status'=>0]);
        return Redirect()->route('add.brand');

     }

        public function Active($id){
        brands::find($id)->update(['status'=>1]);
        return Redirect()->route('add.brand');

      }
}
