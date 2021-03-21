<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Categories;
use DB;

class Category extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }


    public function Create(){
        // $all_categories = DB::table('categories')->get();
        $all_categories = Categories::paginate(8);
        return view('admin.category.add_category', compact('all_categories'));
    }

    public function Store(Request $request){ 
        $request->validate([
            'category_name' => 'required|unique:categories|max:255',
        ]);

        
        $data = array();
        $data['category_name'] = $request->category_name;
        $category = DB::table('categories')->insert($data);

        $notification = array(
            'message' => 'Category added successfully!',
            'alert-type' => 'success'
        );
        return Redirect()->route('admin.cateogry')->with($notification);

    }

    public function Edit($cat_id){
        $editCategory = Categories::find($cat_id);
        return view('admin.category.edit_category', compact('editCategory'));
    }

    public function Update(Request $request, $id){
        $updateData = array();
        $updateData['category_name'] = $request->category_name;
        $updateCategory = DB::table('categories')->where('id',$id)->update( $updateData );
        
        $notification = array(
            'message' => 'Category updated successfully!',
            'alert-type' => 'success'
        );
        return Redirect()->route('admin.cateogry')->with($notification);
       
    }

    public function Delete($del_id){
        $delete = Categories::find($del_id);
        $delete->delete();
        $notification = array(
            'message' => 'Deleted successfully!',
            'alert-type' => 'success'
        );
        return Redirect()->route('admin.cateogry')->with($notification);
    }

    //active and deactive 
    public function Deactive($cat_id){
        Categories::find($cat_id)->update(['status' => 0 ]);
        return Redirect()->route('admin.cateogry');
    }

    public function Active($cat_id){
        Categories::find($cat_id)->update(['status' => 1 ]);
        return Redirect()->route('admin.cateogry');
    }

    public function get_subcategory(REQUEST $request)
    { 
        $subcategory = DB::table('sub_categories')
        ->where('category_id',$request->cat_id)
        ->orderBy('sub_category_name','asc')
        ->get();

        $html = '';
        $html .= '<option value="#">Choose One</option>';

        foreach($subcategory as $key => $value){
            $html .= '<option value="'.$value->id.'">'.$value->sub_category_name.'</option>';
        }

        return $html;

    }
 }
