<?php

namespace App\Http\Controllers;


use App\Http\Requests\ValidateFormDepartment;
use App\Http\Services\DepartmentService;
use Illuminate\Http\Request;


class DeparmentController extends Controller
{
    protected $department;
    function __construct(DepartmentService $department)
    {
        $this->department =  $department;
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
    function PostDepartment(ValidateFormDepartment $request)
    {
        $data = [
            'department_id' => $request->department_id,
            'department_name' => $request->department_name,
            'descriptions' => $request->descriptions,
        ];
        $request->validated();
        $this->department->PostDepartment($data);
        return redirect()->route('getDepartment')->with('mess', "Add success Department!!");
    }
    function EditDepartment(Request $request)
    {
        $getOne  = $this->department->GetOneDepartment($request->id);
        $listDepartment = $this->department->DepartmentList();
        return view("DepartmentEdit", compact('listDepartment', 'getOne'));
    }
    function UpdateDepartment(ValidateFormDepartment $request)
    {
        $data = [
            'department_id' => $request->department_id,
            'department_name' => $request->department_name,
            'descriptions' => $request->descriptions,
        ];
        $request->validated();

        $this->department->UpdateDepartment($data, $request->id);
        return redirect()->route('getDepartment')->with('mess', "Update success Department!!");
    }

    function DeleteDepartment(Request $request)
    {
        $getOne  = $this->department->GetOneDepartment($request->id);
        $listDepartment = $this->department->DepartmentList();
        return view("DepartmentDelete", compact('listDepartment', 'getOne'));
    }
    function DeletePostDepartment(Request $request)
    {
        if (isset($request->department_id)) {
            // Delete
            $this->department->DeleteDepartment($request->department_id);
            return back()->with('mess', "delelte Successs");
        } else {
            return back();
        }
    }
}
