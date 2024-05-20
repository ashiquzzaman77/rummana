<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\about;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class AboutController extends Controller
{
    // All About
    public function AllAbout()
    {
        $about = about::latest()->get();
        return view('backend.about.all_about', compact('about'));
    }

    // Add About
    public function AddAbout()
    {
        return view('backend.about.add_about');
    }

    // Store About
    public function StoreAbout(Request $request)
    {
        $validateData = $request->validate(
            [
                'image' => 'required|mimes:jpeg,png,jpg,gif,svg,webp',
            ],
        );


        $image = $request->file('image');
        $name_gen = date('YmdHi') . $image->getClientOriginalName();
        Image::make($image)->resize(440, 570)->save('upload/about/' . $name_gen);
        $save_url = 'upload/about/' . $name_gen;

        about::insert([

            'description' => $request->description,
            'image' => $save_url,
            'created_at' => now(),
        ]);

        $notification = array(
            'message' => 'About Inserted Successfully',
            'alert-type' => 'info',
        );

        return redirect()->route('all.about')->with($notification);
    }

    // Edit About
    public function EditAbout($id)
    {
        $about = about::find($id);
        return view('backend.about.edit_about', compact('about'));
    }

    // Update About
    public function UpdateAbout(Request $request)
    {
        $validateData = $request->validate(
            [
                'image' => 'mimes:jpeg,png,jpg,gif,svg,webp',
            ],
        );

        $uid = $request->id;
        $old_img = $request->old_image;

        if ($request->file('image')) {
            $image = $request->file('image');
            $name_gen = date('YmdHi') . $image->getClientOriginalName();
            Image::make($image)->resize(440, 570)->save('upload/about/' . $name_gen);
            $save_url = 'upload/about/' . $name_gen;

            if (file_exists($old_img)) {
                unlink($old_img);
            }

            about::find($uid)->update([

                'description' => $request->description,
                'image' => $save_url,
            ]);

            $notification = array(
                'message' => 'About Update With Image Successfully',
                'alert-type' => 'info',
            );

            return redirect()->route('all.about')->with($notification);
        } else {

            about::find($uid)->update([

                'description' => $request->description,
            ]);

            $notification = array(
                'message' => 'About Update WithOut Image Successfully',
                'alert-type' => 'info',
            );

            return redirect()->route('all.about')->with($notification);
        }
    }

    // Delete About
    public function DeleteAbout($id)
    {
        $about = about::find($id);
        $del_img = $about->image;
        unlink($del_img);

        about::find($id)->delete();

        $notification = array(
            'message' => 'About Delete Successfully',
            'alert-type' => 'info',
        );

        return redirect()->route('all.about')->with($notification);
    }
}
