<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EmployeeForm;
use App\Models\Employee;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::all();
        return view('employees.index',compact('employees'));
    }
    public function show()
    {
        $employees = Employee::all();
        return view('employees.index',compact('employees'));
    }

    public function create()
    {
        return view('employees.create');
    }

    public function store(Request $request)
    {
        // if($request->ajax()){
        //     return true;
        // }
        $employee = new Employee;
        $employee->name=$request->name;
        $employee->email=$request->email;
        $employee->phone=$request->phone;
        $employee->save();
        return redirect('/employees/index')->with('success','employee created succesfully');
    }

    public function edit($id)
    {
        $employee = Employee::find($id);
        return view('employees.edit',compact('employee'));
    }

    public function update(Request $request, $id)
    {
        $employee = Employee::find($id);
        $employee->name=$request->name;
        $employee->email=$request->email;
        $employee->phone=$request->phone;
        $employee->update();
        return redirect('/employees/index')->with('success','employee updated succesfully');
    }

    public function destroy($id)
    {
        $employee =Employee::find($id);
        $employee->delete();
        return redirect('/employees/index');
    }

    public function status($userId)
    {
        $employee = Employee::find($userId);
        if ($employee->status == 'active') {
            $employee->status = 'inactive';
            $employee->save();
        }else{
            $employee->status = 'active';
            $employee->save();
        }
        return response()->json(['message' => 'Employee status toggled successfully']);
    }
}
