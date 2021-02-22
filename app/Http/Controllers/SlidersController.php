<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\sliders;
use Image;
class SlidersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }


    public function imageUpload()
    {
       $img_show = sliders::orderBy('id', 'DESC')->get();
       return view('admin.slider.slider', compact('img_show'));
    }

    public function imageUploadPost(Request $request)
    {
        
        $slide_image = $request->slider_image;
        if($slide_image){
        $image_gen = hexdec(uniqid()).'.'.$slide_image->getClientOriginalExtension();
        Image::make($slide_image)->resize(500,500)->save('backend/slide_img/slider_image'.$image_gen);
        $image_url1 = ('backend/slide_img/slider_image'.$image_gen);

        sliders::insert([
        'slide_image'=> $image_url1,  
        ]);
        
        $notification = array(
            'message' => 'Image added successfully!',
            'alert-type' => 'success'
        );
        return Redirect()->route('image.upload')->with($notification);
        }
    }

     public function edit_show($id)
        {
        $edit_img = sliders::find($id);
        return view('admin.slider.edit_slide_img', compact('edit_img'));
        }

        public function update_show(Request $request, $id)
        {
            $old_image = $request->slider_image;
            if($request->has('slide_image')){
               unlink($old_image);
               $image = $request->slider_image;
               $image_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
               Image::make($image)->resize(500,500)->save('backend/slide_img/slider_image/'.$image_gen);
               $image_url = ('backend/slide_img/slider_image/'.$image_gen);
               sliders::where('id', $id)->update([
               'slide_image'=> $image_url,  
             ]);
                
            $notification = array(
                'message' => 'Update image successfully!',
                'alert-type' => 'success'
            );
            return Redirect()->route('image.upload')->with($notification);
            }
        }

        public function delete($id)
        {
            sliders::where('id', $id)->delete(); 

            $notification = array(
                'message' => 'Delete successfully!',
                'alert-type' => 'success'
            );
            return Redirect()->route('image.upload')->with($notification);
            
        }

            //active and deactive 
    public function deactive($id){
        sliders::find($id)->update(['status' => 0 ]);
        return Redirect()->route('image.upload');
    }

    public function active($id){
        sliders::find($id)->update(['status' => 1 ]);
        return Redirect()->route('image.upload');
    }

 
}
