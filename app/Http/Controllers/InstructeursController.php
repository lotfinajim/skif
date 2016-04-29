<?php

namespace App\Http\Controllers;


use App\Instructeurs;
use App\Posts;
use Illuminate\Http\Request;
use Session;
use App\Http\Requests;

use Illuminate\Support\Facades\Input;

class InstructeursController extends Controller
{
    public function index(){
            $instructeurs = Instructeurs::all();
            return view('instructeur.index', compact('instructeurs'));
    }

    public function adminInstructeurs(){
        if(isset($_GET['activeMenu'])){
            $activeMenu='maj';
        }else{
            $activeMenu='ajouter';
        }
        $instructeurs = Instructeurs::all();
        return  view('admin.instructeurs', compact('activeMenu','instructeurs'));
    }

    public function storeInstructeurs(Request $request){

        $input = $request->except(['_token']);
        var_dump($input);
        $instructeur = new Instructeurs();
        $file = array('image'=>Input::file('image'));
        $rules = array('image'=>'required');
        $validator = \Validator::make($file,$rules);
        if($validator->fails()){
            return redirect()->route('adminInstructeurs')->with('error', "Merci de choisir une image");
        }else {
            // checking file is valid.
            if (Input::file('image')->isValid()){
                $destinationPath = 'img/'; // upload path
                $extension = Input::file('image')->getClientOriginalExtension(); // getting image extension
                $fileName = rand(11111,99999).'.'.$extension; // renameing image
                Input::file('image')->move($destinationPath, $fileName); // uploading file to given path
                $instructeur->nom=$input['nom'];
                $instructeur->prenom=$input['prenom'];
                $instructeur->grade=$input['grade'];
                $instructeur->yearsOfPractice=$input['yearPractice'];
                $instructeur->Description=$input['editor'];
                $instructeur->linkImage=$destinationPath.$fileName;

                // sending back with message
                Session::flash('success', 'Upload successfully');
                $instructeur->save();
                return redirect()->route('adminInstructeurs')->with('success', 'L\'instructeur '.$instructeur->nom.'à bien été rajouté à la database');
            }
            else {
                // sending back with error message.
                // Session::flash('error', 'uploaded file is not valid');
                return redirect()->route('adminInstructeurs', compact('instructeur'))->with('danger','Une erreur est survenu');
            }
        }
    }


    public function updateInstructeur(Request $request)
    {

        $input = $request->except(['_token']);
        $instruc = Instructeurs::findOrNew($input['id']);
        $instruc->nom= $input['nom'];
        $instruc->prenom= $input['prenom'];
        $instruc->grade= $input['grade'];
        $instruc->yearsOfPractice= $input['yearPractice'];
        $instruc->Description= $input['editorUpdate'];
        $instruc->status= $input['status'];
        $instruc->save();
        $activeMenu = 'maj';

         return redirect()->route('adminInstructeurs',compact('activeMenu'))->with('success', 'update Instructeur');
    }

        public function showInstructeur($id){
            $instructeur = Instructeurs::findOrNew($id);
            return redirect('administration/instructeurs')->with('instructeur',$instructeur);
        }



}
