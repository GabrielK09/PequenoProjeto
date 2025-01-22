<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $table = 'users';

    protected $fillable = [
        'name',
        'total_call',
        'total_call_input',
        'total_call_exit',
        'login',
        'password',
        'leader',
        'active'
    ];
}
