<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class team_tb extends Model
{

    /*

* @var array
*/
    use HasFactory;
    protected $fillable = [
        'team_id',
        'team_name',
        'department_id',
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}
