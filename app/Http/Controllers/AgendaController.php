<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use MaddHatter\LaravelFullcalendar\Calendar;

class AgendaController extends Controller
{
    public function index(){

            return view('agenda.index');
    }


    public function Json(Request $request){

        if($request->has('start') && $request->has('end'))
            $events = Event::where([['start', '>=', $request->start], ['end', '<=', $request->end]])->get();
        else
            $events = Event::all();
        $toJson = [];
        foreach($events as $event){
            $arr['id'] = $event->id;
            $arr['title'] = $event->titre;
            $arr['url'] = '';
            $arr['class'] = "event-important";
            $arr['start'] = $event->start->getTimestamp()*1000;
            $arr['end'] = $event->end->getTimestamp()*1000;
            array_push($toJson, $arr);
        }
    return json_encode($toJson);
    }
    public function storeAgenda(Request $request){
        $input = $request->except(['_token']);
        $event = new Event();
        $event->titre=$input['post_title'];
        $event->Description=$input['description'];
        $event->content=$input['post_content'];
        $event->status=$input['status'];
        $event->categorie=$input['categorie'];
        $event->map = $input['map'];
        $event->start=$input['startN'];
        $event->end=$input['endN'];

        $event->save();
        return redirect()->route('agendaAdmin')->with('success','Votre nouvelle événement à bein été sauvegardé');
    }

    public function updateEvent(Request $request){
        $input = $request->except(['_token']);
        $event = Event::findOrNew($input['id']);
        $event->titre=$input['titreEvent'];
        $event->Description=$input['description'];
        $event->content=$input['editor'];
        $event->status=$input['status'];
        $event->categorie=$input['categorie'];
        $event->map = $input['map'];
        $event->start=$input['start'];
        $event->end=$input['end'];

        $event->save();
        $activeClass='maj';
        return redirect()->route('agendaAdmin',compact('activeClasse'))->with('success','Votre nouvelle événement à bein été mis à jour');

    }


    public function showEvent($id){
        $event = Event::findOrNew($id);
        return json_encode($event);
    }
}
