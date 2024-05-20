<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class SiteSettingController extends Controller
{
    // All SiteSetting
    public function AllSiteSetting()
    {
        $site = SiteSetting::latest()->get();
        return view('backend.sitesetting.all_sitesetting',compact('site'));
    }

    // Add SiteSetting
    public function AddSiteSetting()
    {
        return view('backend.sitesetting.add_sitesetting');
    }

    // Store SiteSetting
    public function StoreSiteSetting(Request $request)
    {
        SiteSetting::insert([

            'email' => $request->email,
            'address' => $request->address,
            'phone' => $request->phone,
            'time' => $request->time,
            'facebook' => $request->facebook,
            'linkdin' => $request->linkdin,
            'youtube' => $request->youtube,
            'twitter' => $request->twitter,
            'map' => $request->map,
            'instagrm' => $request->instagrm,
            'created_at' => now(),

        ]);

        $notification = array(
            'message' => 'SiteSetting Inserted Successfully',
            'alert-type' => 'info',
        );

        return redirect()->route('all.sitesetting')->with($notification);
    }

    // Edit SiteSetting
    public function EditSitesetting($id)
    {
        $site = SiteSetting::find($id);
        return view('backend.sitesetting.edit_sitesetting',compact('site'));
    }

    // Update Sitesetting
    public function UpdateSitesetting(Request $request)
    {
        $uid = $request->id;

        SiteSetting::find($uid)->update([

            'email' => $request->email,
            'address' => $request->address,
            'phone' => $request->phone,
            'time' => $request->time,
            'facebook' => $request->facebook,
            'linkdin' => $request->linkdin,
            'youtube' => $request->youtube,
            'twitter' => $request->twitter,
            'map' => $request->map,
            'instagrm' => $request->instagrm,

        ]);

        $notification = array(
            'message' => 'SiteSetting Update Successfully',
            'alert-type' => 'info',
        );

        return redirect()->route('all.sitesetting')->with($notification);
    }


}
