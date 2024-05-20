<?php

namespace App\Http\Controllers\Backend;

use App\Exports\PermissionExport;
use App\Http\Controllers\Controller;
use App\Imports\PermissionImport;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Maatwebsite\Excel\Facades\Excel;

class RoleController extends Controller
{
    //All Permission
    public function AllPermission()
    {
        $permission = Permission::latest()->get();
        return view('backend.page.permission.all_permission', compact('permission'));
    }

    //Add Permission
    public function AddPermission()
    {
        return view('backend.page.permission.add_permission');
    }

    //Store Permission
    public function StorePermission(Request $request)
    {
        Permission::insert([

            'name' => $request->name,
            'group_name' => $request->group_name,
            'created_at' => now(),

        ]);

        $notification = array(
            'message' => 'Permission Added Successfully',
            'alert-type' => 'info',
        );

        return redirect()->route('all.permission')->with($notification);
    }

    //Edit Permission
    public function EditPermission($id)
    {
        $permission = Permission::find($id);
        return view('backend.page.permission.edit_permission', compact('permission'));
    }

    //Update Permission
    public function UpdatePermission(Request $request)
    {
        $uid = $request->id;

        Permission::find($uid)->update([

            'name' => $request->name,
            'group_name' => $request->group_name,

        ]);

        $notification = array(
            'message' => 'Permission Update Successfully',
            'alert-type' => 'info',
        );

        return redirect()->route('all.permission')->with($notification);
    }

    //Delete Permission
    public function DeletePermission($id)
    {
        Permission::find($id)->delete();

        $notification = array(
            'message' => 'Permission Delete Successfully',
            'alert-type' => 'info',
        );

        return redirect()->route('all.permission')->with($notification);
    }

    // Export
    public function Export()
    {
        return Excel::download(new PermissionExport, 'permission.xlsx');
    }

    // Import
    public function Import()
    {
        return view('backend.page.permission.permission_import');
    }

    // Store Import
    public function StoreImport(Request $request)
    {
        Excel::import(new PermissionImport, $request->file('import_file'));

        $notification = array(
            'message' => 'Permission File Inserted Successfully',
            'alert-type' => 'info',
        );

        return redirect()->back()->with($notification);
    }

    ////////////////// Add Role ///////////////////

    //All Role
    public function AllRole()
    {
        $role = Role::all();
        return view('backend.page.role.all_role', compact('role'));
    }

    //Add Role
    public function AddRole()
    {
        return view('backend.page.role.add_role');
    }

    //Store Role
    public function StoreRole(Request $request)
    {
        Role::insert([

            'name' => $request->name,
            'created_at' => now(),

        ]);

        $notification = array(
            'message' => 'Role Added Successfully',
            'alert-type' => 'info',
        );

        return redirect()->route('all.role')->with($notification);
    }

    //Edit Permission
    public function EditRole($id)
    {
        $role = Role::find($id);
        return view('backend.page.role.edit_role', compact('role'));
    }

    //Update Role
    public function UpdateRole(Request $request)
    {
        $uid = $request->id;

        Role::find($uid)->update([

            'name' => $request->name,

        ]);

        $notification = array(
            'message' => 'Role Update Successfully',
            'alert-type' => 'info',
        );

        return redirect()->route('all.role')->with($notification);
    }

    //Delete Role
    public function DeleteRole($id)
    {
        Role::find($id)->delete();

        $notification = array(
            'message' => 'Role Delete Successfully',
            'alert-type' => 'info',
        );

        return redirect()->route('all.role')->with($notification);
    }

    ////// Role & Permission //////////////

    // All Role Permission
    public function AllRolePermission()
    {
        $role = Role::all();
        $permissions = Permission::all();
        return view('backend.page.rolesetup.all_role_permission', compact('role', 'permissions'));
    }

    // Add Role Permission
    public function AddRolePermission()
    {
        $role = Role::all();
        $permissions = Permission::all();
        $permission_groups = User::getpermissionGroup();

        return view('backend.page.rolesetup.add_role_permission', compact('role', 'permissions', 'permission_groups'));
    }

    // Store Role Permission

    public function StoreRolePermission(Request $request)
    {
        $data = array();
        $permissions = $request->permission;

        foreach ($permissions as $key => $item) {
            $data['role_id'] = $request->role_id;
            $data['permission_id'] = $item;

            DB::table('role_has_permissions')->insert($data);
        } // end foreach 

        $notification = array(
            'message' => 'Role Permission Added Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('all.role.permission')->with($notification);
    }

    // Admin Edit Role
    public function AdminEditRole($id)
    {
        $role = Role::find($id);
        $permissions = Permission::all();
        $permission_groups = User::getpermissionGroup();

        return view('backend.page.rolesetup.edit_role_permission', compact('role', 'permissions', 'permission_groups'));
    }

    // Admin Update Role

    public function AdminUpdateRole(Request $request, $id){

        $role = Role::findOrFail($id);
        $permissions = $request->permission;

        if (!empty($permissions)) {
            $role->syncPermissions($permissions);
        }

        $notification = array(
            'message' => 'Role Permission Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('all.role.permission')->with($notification);
    }

    //Admin Delete Role

    public function AdminDeleteRole($id)
    {
        $role = Role::findOrFail($id);
        if (!is_null($role)) {
            $role->delete();
        }

        $notification = array(
            'message' => 'Role Permission Deleted Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('all.role.permission')->with($notification);
    }
}
