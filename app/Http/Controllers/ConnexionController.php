<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ConnexionController extends Controller
{
    public function connexion(){
        return view ('connexion.connexion');
    }
}
