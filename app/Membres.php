<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Membres extends Model
{
    protected $fillable = [
        'nom',
        'prenom',
        'sexe',
        'addresse',
        'localite',
        'email',
        'Phone',
        'nrId',
        'DateNaissance',
        'DebutCot',
        'FinCot',
        'renouvellement',
        'actif'
    ];
}
