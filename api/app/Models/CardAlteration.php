<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CardAlteration extends Model
{
    protected $table = 'card_alterations';

    protected $fillable = [
        'user_id',
        'user',
        'before_status',
        'after_status',
        'period_alteration',

    ];
}
