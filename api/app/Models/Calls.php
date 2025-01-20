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
        'period'
    ];
}
