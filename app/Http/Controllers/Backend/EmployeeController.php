<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class EmployeeController extends Controller
{
    //All Employee
    public function AllEmployee()
    {
        $employee = Employee::orderBy('id','ASC')->get();
        return view('backend.emploee.all_employee', compact('employee'));
    }

    //Add Employee
    public function AddEmployee()
    {
        return view('backend.emploee.add_employee');
    }

    //Store Employee
    public function StoreEmployee(Request $request)
    {
        $validateData = $request->validate(
            [
                'image' => 'required|mimes:jpeg,png,jpg,gif,svg,webp',
            ],
        );

        $card = IdGenerator::generate(['table' => 'employees','field' => 'id_card', 'length' => 6, 'prefix' =>'Id897']);

        $image = $request->file('image');
        $name_gen = date('YmdHi') . $image->getClientOriginalName();
        Image::make($image)->resize(200, 200)->save('upload/employee/' . $name_gen);
        $save_url = 'upload/employee/' . $name_gen;

        Employee::insert([

            'name' => $request->name,
            'id_card' => $card,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'city' => $request->city,
            'position' => $request->position,
            'salary' => $request->salary,
            'experience' => $request->experience,
            'image' => $save_url,
            'created_at' => now(),
        ]);

        $notification = array(
            'message' => 'Employee Inserted Successfully',
            'alert-type' => 'info',
        );

        return redirect()->route('all.employee')->with($notification);
    }

    //Edit Employee
    public function EditEmployee($id)
    {
        $employee = Employee::find($id);
        return view('backend.emploee.edit_employee', compact('employee'));
    }

    //Update Employee
    public function UpdateEmployee(Request $request)
    {
        $validateData = $request->validate(
            [
                'image' => 'mimes:jpeg,png,jpg,gif,svg,webp',
            ],
        );

        // $card = IdGenerator::generate(['table' => 'employees','field' => 'id_card', 'length' => 6, 'prefix' =>'Id897']);

        $uid = $request->id;
        $old_img = $request->old_image;

        if ($request->file('image')) {
            $image = $request->file('image');
            $name_gen = date('YmdHi') . $image->getClientOriginalName();
            Image::make($image)->resize(200, 200)->save('upload/employee/' . $name_gen);
            $save_url = 'upload/employee/' . $name_gen;

            if (file_exists($old_img)) {
                unlink($old_img);
            }

            Employee::find($uid)->update([

                'name' => $request->name,
                // 'id_card' => $card,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'city' => $request->city,
                'position' => $request->position,
                'salary' => $request->salary,
                'experience' => $request->experience,
                'image' => $save_url,
                'created_at' => now(),
            ]);

            $notification = array(
                'message' => 'Employee Update With Image Successfully',
                'alert-type' => 'info',
            );

            return redirect()->route('all.employee')->with($notification);
        } else {

            Employee::find($uid)->update([

                'name' => $request->name,
                // 'id_card' => $card,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'city' => $request->city,
                'position' => $request->position,
                'salary' => $request->salary,
                'experience' => $request->experience,
                'created_at' => now(),
            ]);

            $notification = array(
                'message' => 'Employee Update WithOut Image Successfully',
                'alert-type' => 'info',
            );

            return redirect()->route('all.employee')->with($notification);
        }
    }

    // Delete Employee
    public function DeleteEmployee($id)
    {
        $employee = Employee::find($id);
        $del_img = $employee->image;
        unlink($del_img);

        Employee::find($id)->delete();

        $notification = array(
            'message' => 'Employee Delete Successfully',
            'alert-type' => 'info',
        );

        return redirect()->route('all.employee')->with($notification);
    }
}
