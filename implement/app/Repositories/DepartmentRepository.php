<?php

namespace App\Http\Repositories;

use App\Models\department_tb;

class DepartmentRepository
{
    // List All Department
    public function DepartmentListRePository()
    {
        return  department_tb::all();
    }
    // Post Department
    public function DepartmentPostRePository($data)
    {
        return  department_tb::created($data);
    }
    // Get One Department
    public function GetOneDepartmentRePository($department_id)
    {
        return department_tb::where('department_id', $department_id)->first();
    }
    // Update Department
    public function UpdateDepartmentRePository($data, $department_id)
    {
        return department_tb::where('department_id', $department_id)->update($data);
    }
    // Delete Department
    public function DeleteDepartmentRePository($department_id)
    {
        return department_tb::where('department_id', $department_id)->delete();
    }
}
