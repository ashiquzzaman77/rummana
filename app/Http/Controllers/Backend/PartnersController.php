<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PartnersController extends Controller
{
    // All Partners
    public function AllPartners()
    {
        $partners = Partner::latest()->get();
        return view('backend.partner.all_partner', compact('partners'));
    }

    // Add Partners
    public function AddPartners()
    {
        return view('backend.partner.add_partner');
    }

    // Store Partners
    public function StorePartners(Request $request)
    {

        $validateData = $request->validate(
            [
                'image' => 'required|mimes:jpeg,png,jpg,gif,svg,webp',
            ],
        );

        $image = $request->file('image');
        $name_gen = date('YmdHi') . $image->getClientOriginalName();
        Image::make($image)->resize(120, 120)->save('upload/partner/' . $name_gen);
        $save_url = 'upload/partner/' . $name_gen;

        Partner::insert([

            'name' => $request->name,
            'image' => $save_url,
            'created_at' => now(),
        ]);

        $notification = array(
            'message' => 'Partner Inserted Successfully',
            'alert-type' => 'info',
        );

        return redirect()->route('all.partners')->with($notification);
    }

    // Edit Partners
    public function EditPartners($id)
    {
        $partners = Partner::find($id);
        return view('backend.partner.edit_partner', compact('partners'));
    }

    // Update Partners
    public function UpdatePartners(Request $request)
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
            Image::make($image)->resize(120, 120)->save('upload/partner/' . $name_gen);
            $save_url = 'upload/partner/' . $name_gen;

            if (file_exists($old_img)) {
                unlink($old_img);
            }

            Partner::find($uid)->update([

                'name' => $request->name,
                'image' => $save_url,
            ]);

            $notification = array(
                'message' => 'Partner Update With Image Successfully',
                'alert-type' => 'info',
            );

            return redirect()->route('all.partners')->with($notification);
        } else {

            Partner::find($uid)->update([

                'name' => $request->name,
            ]);

            $notification = array(
                'message' => 'Partner Update WithOut Image Successfully',
                'alert-type' => 'info',
            );

            return redirect()->route('all.partners')->with($notification);
        }
    }

     // Delete Partners
     public function DeletePartners($id)
     {
         $partner = Partner::find($id);
         $del_img = $partner->image;
         unlink($del_img);
 
         Partner::find($id)->delete();
 
         $notification = array(
             'message' => 'Partner Delete Successfully',
             'alert-type' => 'info',
         );
 
         return redirect()->route('all.partners')->with($notification);
 
     }
}
