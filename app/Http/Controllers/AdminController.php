<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Subscribe;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    // Admin Dashboard
    public function AdminDashboard()
    {
        return view('admin.index');
    }

    // AdminLogin
    public function AdminLogin()
    {
        return view('admin.admin_login');
    }

    // Admin Profile
    public function AdminProfile()
    {
        $id = Auth::user()->id;
        $profileData = User::find($id);

        return view('admin.admin_profile', compact('profileData'));
    }

    // Admin Profile Store
    public function AdminProfileStore(Request $request)
    {
        $id = Auth::user()->id;
        $update = User::findOrFail($id);

        $update->name = $request->name;
        $update->username = $request->username;
        $update->email = $request->email;
        $update->phone = $request->phone;
        $update->address = $request->address;

        if ($request->file('photo')) {
            $file = $request->file('photo');
            @unlink(public_path('upload/admin_images/' . $update->photo));
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/admin_images/'), $filename);
            $update['photo'] = $filename;
        }

        $update->save();

        $notification = array(
            'message' => 'Profile Update Successfully',
            'alert-type' => 'info',
        );

        return redirect()->route('admin.profile')->with($notification);
    }

    // Admin Password
    public function AdminPassword()
    {
        return view('admin.admin_password');
    }

    // Admin Password
    public function AdminPasswordUpdate(Request $request)
    {
        //validate
        $request->validate([

            'old_password' => 'required',
            'new_password' => [

                'required', 'confirmed', Rules\Password::min(8)->mixedCase()->symbols()->letters()->numbers()

            ],
        ]);

        //Match Old Password
        if (!Hash::check($request->old_password, auth::user()->password)) {

            $notification = array(
                'message' => 'Old Password Not Match',
                'alert-type' => 'error',
            );

            return redirect()->back()->with($notification);
        }

        //Update New Password
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password),
        ]);

        $notification = array(
            'message' => 'Password Change Successfully',
            'alert-type' => 'info',
        );

        return redirect()->back()->with($notification);
    }


    // Admin Logout
    public function AdminLogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        $notification = array(

            'message' => 'Logout Successfully',
            'alert-type' => 'info',

        );

        return redirect()->route('admin.login')->with($notification);
    }

    // Contact Message
    public function ContactMessage()
    {
        $message = Contact::latest()->get();
        return view('backend.message.all_message', compact('message'));
    }

    // Delete Message
    public function DeleteContactMessage($id)
    {
        Contact::findOrFail($id)->delete();

        $notification = array(

            'message' => 'Contact Message Delete Successfully',
            'alert-type' => 'info',

        );

        return redirect()->back()->with($notification);
    }

    //ViewContactMessage

    public function ViewContactMessage($id)
    {
        $message = Contact::find($id);
        return view('backend.message.view_message', compact('message'));
    }

    // Subscribe

    public function Subscribe()
    {
        $subscribe = Subscribe::latest()->get();
        return view('backend.subscribe.subscribe', compact('subscribe'));
    }

    // DeleteSubscribe

    public function DeleteSubscribe($id)
    {
        Subscribe::find($id)->delete();

        $notification = array(

            'message' => 'Subscribe Delete Successfully',
            'alert-type' => 'info',

        );

        return redirect()->back()->with($notification);
    }

    /////////////// All Admin ///////////////

    // All Admin
    public function AllAdmin()
    {
        $admin = User::where('status', 'active')->where('role', 'admin')->orderBy('id', 'ASC')->get();
        return view('backend.admin.all_admin', compact('admin'));
    }

    // Add Admin
    public function AddAdmin()
    {
        $roles = Role::all();
        return view('backend.admin.add_admin', compact('roles'));
    }

    // Store Admin
    public function StoreAdmin(Request $request)
    {
        $request->validate([
            'password' => ['required', Rules\Password::min(8)->mixedCase()->symbols()->letters()->numbers()],
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->password =  Hash::make($request->password);
        $user->role = 'admin';
        $user->status = 'active';
        $user->save();

        if ($request->roles) {
            $user->assignRole($request->roles);
        }

        $notification = array(
            'message' => 'New Admin User Inserted Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('all.admin')->with($notification);
    }

    // Edit Admin
    public function EditAdmin($id)
    {
        $user = User::findorFail($id);
        $roles = Role::latest()->get();
        return view('backend.admin.edit_admin', compact('roles', 'user'));
    }

    // Update Admin
    public function UpdateAdmin(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->role = 'admin';
        $user->status = 'active';

        $user->save();

        $user->roles()->detach();

        if ($request->roles) {
            $user->assignRole($request->roles);
        }
        $notification = array(
            'message' => 'New Admin User Update Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('all.admin')->with($notification);
    }

    // Delete Admin
    public function DeleteNewAdmin($id)
    {

        $user = User::findOrFail($id);
        if (!is_null($user)) {
            $user->delete();
        }

        $notification = array(
            'message' => 'New Admin User Deleted Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('all.admin')->with($notification);
    }
}
