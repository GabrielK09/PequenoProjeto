<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Calls extends Model
{
    protected $table = 'calls';

    protected $fillable = [
        'user_id',
        'user',
        'before_call',
        'after_call',

        'before_call_exit',
        'after_call_exit',

        'before_call_input',
        'after_call_input',
        
        'period'
    ];
}
