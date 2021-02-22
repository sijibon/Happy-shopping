<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Banners;
use Image;
class BannerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function BannerUpload()
    {  $banner_img = Banners::get();
       return view('admin.banner.add_banner', compact('banner_img'));
    }

    public function imageUploadBanner(Request $request)
    { 
        $banner_image = $request->banner_image;
        if($banner_image){
        $image_gen = hexdec(uniqid()).'.'.$banner_image->getClientOriginalExtension();
        Image::make($banner_image)->resize(500,500)->save('backend/banner_img/banner_img'.$image_gen);
        $image_url = ('backend/banner_img/banner_img'.$image_gen);

        Banners::insert([
        'banner_image'=> $image_url,  
        ]);
        
        $notification = array(
            'message' => 'Image added successfully!',
            'alert-type' => 'success'
        );
        return Redirect()->route('banner.upload')->with($notification);
        }
    }
  
        public function edit_image($id)
            {
            $edit_img = Banners::find($id);
            return view('admin.banner.edit_banner_img', compact('edit_img'));
            }

        public function update_image(Request $request, $id)
        {
            $old_image = $request->banner_image;
            if($request->has('banner_image')){
            unlink($old_image);
            $banner_image = $request->banner_image;
            $image_gen = hexdec(uniqid()).'.'.$banner_image->getClientOriginalExtension();
            Image::make($banner_image)->resize(500,500)->save('backend/banner_img/banner_img'.$image_gen);
            $image_url = ('backend/banner_img/banner_img'.$image_gen);

            Banners::where('id', $id)->update([
            'banner_image'=> $image_url,  
            ]);
                
            $notification = array(
                'message' => 'Update image successfully!',
                'alert-type' => 'success'
            );
            return Redirect()->route('banner.upload')->with($notification);
            }
        }

        public function delete($id)
        {
            Banners::where('id', $id)->delete(); 

            $notification = array(
                'message' => 'Delete successfully!',
                'alert-type' => 'success'
            );
            return Redirect()->route('banner.upload')->with($notification);
            
        }

                //active and deactive 
        public function deactive($id){
            Banners::find($id)->update(['status' => 0 ]);
            return Redirect()->route('banner.upload');
        }

        public function active($id){
            Banners::find($id)->update(['status' => 1 ]);
            return Redirect()->route('banner.upload');
        }

}
