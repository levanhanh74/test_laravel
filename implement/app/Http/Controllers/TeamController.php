<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Teams;
use Illuminate\Http\Request;
use PDO;

class TeamController extends Controller
{
    protected $team;
    protected $department;
    function __construct()
    {
        $this->team = new Teams();
        $this->department = new Department();
    }
    function TeamList(Request $request)
    {
        $listTeam = $this->team->ListTeam();
        $listDepartment = $this->department->DepartmentList();
        $getOneTeam = $this->team->GetOneTeam($request->id);

        return view('pageTeams.Teams', compact('listTeam', 'getOneTeam', 'listDepartment'));
    }
    function TeamCreate(Request $request)
    {
        $listTeam = $this->team->ListTeam();
        $listDepartment = $this->department->DepartmentList();
        $getOneTeam = $this->team->GetOneTeam($request->id);

        return view('pageTeams.TeamAdd', compact('listTeam', 'getOneTeam', 'listDepartment'));
    }
    function TeamPost(Request $request)
    {
        $data = [
            'team_id' => $request->team_id,
            'team_name' => $request->team_name,
            'department_id' => $request->department_id,
        ];

        $rule = [
            'team_id' => 'required|min:2',
            'team_name' => 'required|min:2',
            'department_id' => 'required|min:2',
        ];
        $message = [
            'required' => 'Ban can nhap truong :attribute nay!',
            'min' => 'Ban can nhap truong :attribute nay du :min!',
        ];
        $request->validate($rule, $message);
        // dd($data);
        $this->team->PostTeam($data);
        return redirect()->route('TeamList')->with('mess', "Add team success!");
    }

    function TeamEdit(Request $request)
    {
        $listTeam = $this->team->ListTeam();
        $listDepartment = $this->department->DepartmentList();
        $getOneTeam = $this->team->GetOneTeam($request->id);
        return view('pageTeams.TeamEdit', compact('listTeam', 'getOneTeam', 'listDepartment'));
    }
    function TeamUpdate(Request $request)
    {
        $data = [
            'team_id' => $request->team_id,
            'team_name' => $request->team_name,
            'department_id' => $request->department_id,
        ];
        $this->team->UpdateTeam($request->team_id, $data);
        return redirect()->route('TeamList')->with('mess', "Update success team!");
    }
    function TeamDelete(Request $request)
    {
        $this->team->DeleteTeam($request->team_id);
        return redirect()->route('TeamList')->with('mess', "Delete success team!");
    }
}
