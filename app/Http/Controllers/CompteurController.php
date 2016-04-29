<?php

namespace App\Http\Controllers;

use App\Compteur;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CompteurController extends Controller
{

    public function getValue(){
        $value = Compteur::all();
        return view('administration/message', compact($value));
    }


    public function updateCompteur(Request $request){
        $input = $request->except(['_token']);
       return "ok " . var_dump($input);
    }
}
