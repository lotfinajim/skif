<?php

namespace App\Http\Controllers;

use App\Compteur;
use App\Compteurs;
use App\Contact;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use PhpImap\Mailbox as ImapMailbox;
use PhpImap\IncomingMail;
use PhpImap\IncomingMailAttachment;
use PhpImap\Mailbox;


class ContactController extends Controller
{


    public function index()
    {
        return view('contact.index');
    }


    public function validFormContact(Request $request)
    {
        $input = $request->except(['_token']);
        $contact = Contact::create($input);
        $contact->save();
        return redirect()->route('contact')->with('success', 'ok dans db');
    }


    public function messages(Request $request){
             $message = Contact::orderBy('id','desc')->simplePaginate(10);
             $activeMenu='message';
             $compteurMail = Compteurs::findOrNew(1);
             return view('admin.messages',compact('compteurMail','activeMenu'))->with('message', $message);

    }


    public function showContact($id){
            $contact = Contact::findOrNew($id);
            $id= $id;
            return redirect('administration/message')->route(compact('id'))->with('contact', $contact);
    }

    public function send(Request $request){
        $input = $request->except(['_token']);

        $data =[
            'title' => $input['obj'],
            'content' =>$input['content'],
        ];

       \Mail::send('emails.send',$data, function($message) use($input){
            $message->to($input['from'], '')->subject($input['obj']);
        });

        return redirect()->route('message')->with('success', 'Votre mail a bién été envoyer');
    }
     public  function finduser($id){
        return  Contact::findOrfail($id);
    }

    public function unread(Request $request){
        $input = $request->except(['_token']);
        $id=$input['id'];
        $contact=ContactController::finduser($id);
        $compteur= Compteurs::findOrNew(1);
        if( $contact->status==1){

            $compteur->lu=$compteur->lu - 1;
            $compteur->nonLu=$compteur->nonLu + 1;
            $compteur->save();
        }
        if($contact->status==2 ){
            $compteur->lu=$compteur->lu - 1;
            $compteur->draft=$compteur->draft + 1;
            $compteur->save();
        }
        $contact->status=0;
        $contact->save();

        return response()->json("successUnread");
    }

    public function draft(Request $request){
        //status = 2 = draft
        $input = $request->except(['_token']);
        $id=$input['id'];
        $contact=ContactController::finduser($id);
        $contact->status=2;
        if($contact->status==2){
            $compteur= Compteurs::findOrNew(1);
            $compteur->lu=$compteur->lu - 1;
            $compteur->draft=$compteur->draft +1;
            $compteur->save();
        }
        $contact->information=$input['content'];
        $contact->save();
        return response()->json("success");
    }


    public function read(Request $request){
        $input = $request->except(['_token']);
        $id=$input['id'];
        $contact=ContactController::finduser($id);
        $compteur= Compteurs::findOrNew(1);
        if($contact->status==0){
            $compteur->lu=$compteur->lu +1;
            $compteur->nonLu=$compteur->nonLu - 1;
            $compteur->save();
        }
        if($contact->status==2){
            $compteur->lu=$compteur->lu +1;
            $compteur->draft=$compteur->draft - 1;
            $compteur->save();
        }
        $contact->status=1;
        $contact->save();


        return response()->json($contact);
    }






}
