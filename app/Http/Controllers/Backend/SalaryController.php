<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\AdvanceSalary;
use App\Models\Employee;
use Illuminate\Http\Request;

class SalaryController extends Controller
{
    //All Advance Salary
    public function AllAdvanceSalary()
    {
        $advance = AdvanceSalary::orderBy('id', 'ASC')->get();
        return view('backend.salary.all_advance_salary', compact('advance'));
    }

    //Add Advance Salary
    public function AddAdvanceSalary()
    {
        $employee = Employee::orderBy('id', 'ASC')->get();
        return view('backend.salary.add_advance_salary', compact('employee'));
    }

    //Store Advance Salary
    public function StoreAdvanceSalary(Request $request)
    {
        $month = $request->month;
        $employee_id = $request->employee_id;

        $advanced = AdvanceSalary::where('month', $month)->where('employee_id', $employee_id)->first();

        if ($advanced == Null) {
            AdvanceSalary::insert([

                'employee_id' => $request->employee_id,
                'month' => $request->month,
                'year' => $request->year,
                'advance_salary' => $request->advance_salary,
                'created_at' => now(),

            ]);

            $notification = array(

                'message' => 'Advance Salary Paid Successfully',
                'alert-type' => 'info',

            );

            return redirect()->back()->with($notification);
        } else {

            $notification = array(

                'message' => 'Advance Salary Already Paid',
                'alert-type' => 'warning',

            );

            return redirect()->back()->with($notification);
        }
    }

    //Edit Advance Salary
    public function EditAdvanceSalary($id)
    {
        $status = AdvanceSalary::where('id',$id)->first();

        if($status->status == 0)
        {
            $employee = Employee::latest()->get();
            $advance = AdvanceSalary::findOrFail($id);
    
            return view('backend.salary.edit_advance_salary', compact('employee', 'advance'));
        }

        else{

            $notification = array(

                'message' => 'Salary Already Paid',
                'alert-type' => 'warning',
    
            );
    
            return redirect()->back()->with($notification);

        }
        
    }

    //Update Advance Salary
    public function UpdateAdvanceSalary(Request $request)
    {
        $id = $request->id;

        AdvanceSalary::find($id)->update([

            // 'employee_id' => $request->employee_id,
            'month' => $request->month,
            'year' => $request->year,
            'advance_salary' => $request->advance_salary,

        ]);

        $notification = array(

            'message' => 'Advance Salary Update Successfully',
            'alert-type' => 'info',

        );

        return redirect()->route('all.advance.salary')->with($notification);
    }

    // PaySalary
    public function PaySalary($id)
    {

        AdvanceSalary::find($id)->update([

            'status' => 1,

        ]);

        $notification = array(

            'message' => 'Salary Paid Successfully',
            'alert-type' => 'info',

        );

        return redirect()->route('all.advance.salary')->with($notification);
    }


}
