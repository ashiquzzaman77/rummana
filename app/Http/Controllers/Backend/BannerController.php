<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class BannerController extends Controller
{
    // All Banner
    public function AllBanner()
    {
        $banner = Banner::latest()->get();
        return view('backend.banner.all_banner', compact('banner'));
    }

    // Add Banner
    public function AddBanner()
    {
        return view('backend.banner.add_banner');
    }

    // Store Banner
    public function StoreBanner(Request $request)
    {
        $image = $request->file('image');
        $name_gen = date('YmdHi') . $image->getClientOriginalName();
        Image::make($image)->resize(1920, 760)->save('upload/banner/' . $name_gen);
        $save_url = 'upload/banner/' . $name_gen;

        Banner::insert([

            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'image' => $save_url,
            'created_at' => now(),
        ]);

        $notification = array(
            'message' => 'Banner Inserted Successfully',
            'alert-type' => 'info',
        );

        return redirect()->route('all.banner')->with($notification);
    }

    // Edit Banner
    public function EditBanner($id)
    {
        $banner = Banner::find($id);
        return view('backend.banner.edit_banner', compact('banner'));
    }

    // Update Banner
    public function UpdateBanner(Request $request)
    {

        $uid = $request->id;
        $old_img = $request->old_image;

        if($request->file('image'))
        {
            $image = $request->file('image');
            $name_gen = date('YmdHi') . $image->getClientOriginalName();
            Image::make($image)->resize(1920, 760)->save('upload/banner/' . $name_gen);
            $save_url = 'upload/banner/' . $name_gen;

            if(file_exists($old_img))
            {
                unlink($old_img);
            }
    
            Banner::find($uid)->update([
    
                'title' => $request->title,
                'subtitle' => $request->subtitle,
                'image' => $save_url,
            ]);
    
            $notification = array(
                'message' => 'Banner Update With Image Successfully',
                'alert-type' => 'info',
            );
    
            return redirect()->route('all.banner')->with($notification);
        }

        else{

            Banner::find($uid)->update([
    
                'title' => $request->title,
                'subtitle' => $request->subtitle,
            ]);
    
            $notification = array(
                'message' => 'Banner Update WithOut Image Successfully',
                'alert-type' => 'info',
            );
    
            return redirect()->route('all.banner')->with($notification);

        }
    }

    // Delete Banner
    public function DeleteBanner($id)
    {
        $banner = Banner::find($id);
        $del_img = $banner->image;
        unlink($del_img);

        Banner::find($id)->delete();

        $notification = array(
            'message' => 'Banner Delete Successfully',
            'alert-type' => 'info',
        );

        return redirect()->route('all.banner')->with($notification);

    }
}
