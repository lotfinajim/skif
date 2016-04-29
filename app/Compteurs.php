<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Compteurs extends Model
{
    protected $fillable = [
        'lu',
        'nonLu',
        'total',
        'draft'
    ];
}
