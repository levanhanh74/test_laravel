<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class department_tb extends Model
{
    use HasFactory;
    protected $fillable = [
        'department_id,',
        'department_name,',
        'descriptions,',
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}
