<?php

namespace App\Http\Repositories;

use App\Models\team_tb;

class TeamRepository
{
    // listTeam
    function ListTeamRepository()
    {
        return team_tb::all();
    }
    // addTeam
    function PostTeamRepository($data)
    {
        return team_tb::create($data);
    }
    //getOneTeam
    function GetOneTeamRepository($team_id)
    {
        return team_tb::where('team_id', $team_id)->first();
    }
    // updateTeam
    function UpdateTeamRepository($team_id, $data)
    {
        return team_tb::where('team_id', $team_id)->update($data);
    }
    // deleteTeam
    function DeleteTeamRepository($team_id)
    {
        return team_tb::where('team_id', $team_id)->delete();
    }
}
