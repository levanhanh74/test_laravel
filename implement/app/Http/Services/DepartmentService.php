<?php

namespace App\Http\Services;

use Illuminate\Support\Facades\DB;
use App\Models\department_tb;

class DepartmentService
{

    // list all
    function DepartmentList()
    {
        // return DB::table("department_tbs")->get();
        return  department_tb::all();
    }
    // post team
    function PostDepartment($data)
    {
        // // dd($data);
        // return department_tb::create($data);
        return DB::table("department_tbs")->insert($data);
    }
    // get oneTeam
    function GetOneDepartment($department_id)
    {
        return department_tb::where('department_id', $department_id)->first();
    }
    // update Team
    function UpdateDepartment($data, $department_id)
    {
        return department_tb::where('department_id', $department_id)->update($data);
    }
    // delete team
    function DeleteDepartment($department_id)
    {
        return department_tb::where('department_id', $department_id)->delete();
    }
}
