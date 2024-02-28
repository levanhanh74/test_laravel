<?php

namespace App\Http\Services;

use App\Models\team_tb;

class TeamService
{
    
    // list all
    function TeamList()
    {
        return team_tb::all();
    }
    // post team
    function TeamPost($data)
    {
        return team_tb::create($data);
        
    }
    // get oneTeam
    function GetOneTeam($team_id)
    {
        return team_tb::where('team_id', $team_id)->first();
    }
    // update Team
    function TeamEdit($team_id, $data)
    {
        return team_tb::where('team_id', $team_id)->update($data);
    }
    // delete team
    function DeleteTeam($team_id)
    {
        return team_tb::where('team_id', $team_id)->delete();
    }
}
