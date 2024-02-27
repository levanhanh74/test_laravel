<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Department extends Model
{
    use HasFactory;
    protected $table = 'department_tb';
    public function DepartmentList()
    {
        return  DB::table($this->table)->get();
    }
    public function DepartmentCreate($data)
    {
        // dd($data);
        return  DB::table($this->table)->insert($data);
    }
    public function GetOneDepartment($department_id)
    {
        // dd($data);
        return DB::table($this->table)->where('department_id', $department_id)->first();
    }
    public function UpdateDepartment($data, $department_id)
    {
        // dd($data);
        return DB::table($this->table)->where('department_id', $department_id)->update($data);
    }
    public function DeleteDepartment($department_id)
    {
        // dd($data);
        return DB::table($this->table)->where('department_id', $department_id)->delete();
    }
}
