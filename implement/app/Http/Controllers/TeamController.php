<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidateTeam;
use App\Http\Services\DepartmentService;
use App\Http\Services\TeamService as ServicesTeamService;
use Illuminate\Http\Request;


class TeamController extends Controller
{
    protected $team;
    protected $department;
    function __construct(ServicesTeamService $TeamService, DepartmentService  $department)
    {
        $this->team =  $TeamService;
        $this->department =  $department;
    }

    function TeamList(Request $request)
    {
        $listTeam = $this->team->TeamList();
        $listDepartment = $this->department->DepartmentList();
        $getOneTeam = $this->team->GetOneTeam($request->id);

        return view('pageTeams.Teams', compact('listTeam', 'getOneTeam', 'listDepartment'));
    }
    function TeamCreate(Request $request)
    {
        $listTeam = $this->team->TeamList();
        $listDepartment = $this->department->DepartmentList();
        $getOneTeam = $this->team->GetOneTeam($request->id);

        return view('pageTeams.TeamAdd', compact('listTeam', 'getOneTeam', 'listDepartment'));
    }
    function TeamPost(ValidateTeam $request)
    {
        $data = [
            'team_id' => $request->team_id,
            'team_name' => $request->team_name,
            'department_id' => $request->department_id,
        ];


        $request->validated();
        // dd($data);
        $this->team->TeamPost($data);
        return redirect()->route('TeamList')->with('mess', "Add team success!");
    }

    function TeamEdit(Request $request)
    {
        $listTeam = $this->team->TeamList();
        $listDepartment = $this->department->DepartmentList();
        $getOneTeam = $this->team->GetOneTeam($request->id);
        return view('pageTeams.TeamEdit', compact('listTeam', 'getOneTeam', 'listDepartment'));
    }
    function TeamUpdate(ValidateTeam $request)
    {
        $data = [
            'team_id' => $request->team_id,
            'team_name' => $request->team_name,
            'department_id' => $request->department_id,
        ];

        $request->validated();
        $this->team->TeamEdit($request->team_id, $data);
        return redirect()->route('TeamList')->with('mess', "Update success team!");
    }
    function TeamDelete(Request $request)
    {
        $this->team->DeleteTeam($request->team_id);
        return redirect()->route('TeamList')->with('mess', "Delete success team!");
    }
}
