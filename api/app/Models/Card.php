<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    protected $table = 'card';

    protected $fillable = [
        'user_id',
        'user',
        'title',
        'description',
        'group',
        'status',
        'file_path'
    ];
}
