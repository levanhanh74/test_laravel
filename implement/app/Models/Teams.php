<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Teams extends Model
{
    use HasFactory;
    protected $table  = 'team_tb';
    // listTeam
    function ListTeam()
    {
        return DB::table($this->table)->get();
    }
    // addTeam
    function PostTeam($data)
    {
        return DB::table($this->table)->insert($data);
    }
    //getDetailTeam
    function GetOneTeam($team_id)
    {
        return DB::table($this->table)->where('team_id', $team_id)->first();
    }
    function UpdateTeam($team_id, $data)
    {
        return DB::table($this->table)->where('team_id', $team_id)->update($data);
    }
    function DeleteTeam($team_id)
    {
        return DB::table($this->table)->where('team_id', $team_id)->delete();
    }
}
