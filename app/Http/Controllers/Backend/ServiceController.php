<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    // All Service
    public function AllService()
    {
        $service = Service::latest()->get();
        return view('backend.service.all_service', compact('service'));
    }

    // Add Service
    public function AddService()
    {
        return view('backend.service.add_service');
    }

    // Store Service
    public function StoreService(Request $request)
    {

        Service::insert([

            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'icon' => $request->icon,
            'created_at' => now(),
        ]);

        $notification = array(
            'message' => 'Service Inserted Successfully',
            'alert-type' => 'info',
        );

        return redirect()->route('all.service')->with($notification);
    }

    // Edit Service
    public function EditService($id)
    {
        $service = Service::find($id);
        return view('backend.service.edit_service', compact('service'));
    }

    // Update service
    public function UpdateService(Request $request)
    {

        $uid = $request->id;

        Service::find($uid)->update([

            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'icon' => $request->icon,
        ]);

        $notification = array(
            'message' => 'Service Update Successfully',
            'alert-type' => 'info',
        );

        return redirect()->route('all.service')->with($notification);
    }

    // Delete Service
    public function DeleteService($id)
    {
        Service::find($id)->delete();

        $notification = array(
            'message' => 'Service Delete Successfully',
            'alert-type' => 'info',
        );

        return redirect()->route('all.service')->with($notification);
    }
}
