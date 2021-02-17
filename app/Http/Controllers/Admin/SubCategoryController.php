<?php

namespace App\Http\Controllers\Admin;
use App\sub_categories;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function Create()
    {
        $data = sub_categories::orderBy('id', 'DESC')->paginate(8);
        return view('admin.sub_category.sub_category', compact('data'));
    }

    public function Store(Request $request)
    {
        $request->validate([
            'sub_category_name'=>'required',
        ]);
        
        $sub_category = new sub_categories;
        $sub_category->sub_category_name = $request->sub_category_name;
        $sub_category->save();
 
        $notification = array(
            'message' => 'Sub-Category added successfully!',
            'alert-type' => 'success'
        );
        return Redirect()->route('admin.sub-category')->with($notification);
        
    }

    public function Edit($id)
    {
        $edit_subCategory = sub_categories::find($id);
        return view('admin.sub_category.edit_sub_category', compact('edit_subCategory'));
    }

    public function Update(Request $request, $id)
    {
        $update_sub_cat = sub_categories::find($id);
        $update_sub_cat->sub_category_name = $request->sub_category_name;
        $update_sub_cat->update();

        $notification = array(
            'message' => 'Update Sub-Category successfully!',
            'alert-type' => 'success'
        );
        return Redirect()->route('admin.sub-category')->with($notification);
        
    }


    public function Delete($del_id)
    {
       $delete_sub_cat = sub_categories::find($del_id);
       $delete_sub_cat->delete();

       $notification = array(
        'message' => 'Sub-Category Deleted successfully!',
        'alert-type' => 'success'
    );
    return Redirect()->route('admin.sub-category')->with($notification);

    }

    
    public function Deactive($dec_id){
        sub_categories::find($dec_id)->update(['status'=>0]);
        return Redirect()->route('admin.sub-category');

     }

        public function Active($act_id){
        sub_categories::find($act_id)->update(['status'=>1]);
        return Redirect()->route('admin.sub-category');

      }
}
