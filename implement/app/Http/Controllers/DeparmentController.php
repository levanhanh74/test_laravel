<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use PDO;

class DeparmentController extends Controller
{
    protected $department;
    function __construct()
    {
        $this->department = new Department();
    }
    // List and create Department 
    function DepartmentList(Request $request)
    {
        $listDepartment = $this->department->DepartmentList();
        $oneDepartment = $this->department->GetOneDepartment($request->id);
        return view('Department', compact('listDepartment', 'oneDepartment'));
    }

    function DepartmentCreate(Request $request)
    {
        $listDepartment = $this->department->DepartmentList();
        return view("DepartmentAdd", compact('listDepartment'));
    }
    function PostDepartment(Request $request)
    {
        $rule = [
            'department_id' => 'required|min:2',
            'department_name' => 'required|min:2',
            'descriptions' => 'required|min:8',
        ];
        $message = [
            'required' => 'Ban can nhap truong :attribute nay!',
            'min' => 'Ban can nhap truong :attribute nay du :min!',
        ];
        $request->validate($rule, $message);
        $data = [
            'department_id' => $request->department_id,
            'department_name' => $request->department_name,
            'descriptions' => $request->descriptions,
        ];
        // dd($data);
        $this->department->DepartmentCreate($data);
        return redirect()->route('getDepartment')->with('mess', "Add success Department!!");
    }
    function EditDepartment(Request $request)
    {
        $getOne  = $this->department->GetOneDepartment($request->id);
        $listDepartment = $this->department->DepartmentList();
        return view("DepartmentEdit", compact('listDepartment', 'getOne'));
    }
    function UpdateDepartment(Request $request)
    {
        $data = [
            'department_id' => $request->department_id,
            'department_name' => $request->department_name,
            'descriptions' => $request->descriptions,
        ];
        $this->department->UpdateDepartment($data, $request->id);
        return redirect()->route('getDepartment')->with('mess', "Update success Department!!");
    }

    function DeleteDepartment(Request $request)
    {
        if (isset($request->department_id)) {
            // Delete
            $this->department->DeleteDepartment($request->department_id);
            return back()->with('mess', "delelte Successs");
        } else {
            // not Delete
            return back();
        }
    }
}
