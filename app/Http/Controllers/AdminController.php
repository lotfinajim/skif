<?php

namespace App\Http\Controllers;

use App\Compteurs;
use App\Event;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Posts;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminController extends Controller
{


    public function index(){
        $compteur = Compteurs::findOrNew(1);
        $compteurArticles  = Compteurs::findOrNew(2);
        $activeMenu='overview';
       return view('admin.index', compact('compteur','compteurArticles','activeMenu'));
    }
    public function agendaAdmin()
    {
        $activeMenu= 'agenda';
        $activeClass='ajouter';
        $allEvent=Event::all();
        return view('admin.agendaAdmin',compact('activeMenu','activeClass', 'allEvent'));
    }




    public function event(Request $request){
        if($request->has('query')){
            $id = $request['query'];
            return json_encode(Event::findOrNew($id));
        }
    }








}
