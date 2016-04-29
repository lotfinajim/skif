<?php

namespace App\Http\Controllers;

use App\Membres;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class MembreController extends Controller
{

    public function membres(){

        $activeMenu ="lister";
        $all = Membres::all();
        return view('admin.membre', compact("lister", 'all','activeMenu'));
    }

    public function membresAjouter(){
        $activeMenu ="ajouter";
        $all = Membres::all();
        return view('admin.membre', compact('all','activeMenu'));
    }
    public function membresMisAJour(){

        $activeMenu ="maj";
        $all = Membres::all();
        return view('admin.membre', compact( 'all','activeMenu'));
    }

    public function storeMembre(Request $request){
        $input = $request->except(['_token']);

        $errors=array();
        $message = '';
        $membres = new Membres();
        $membres->Nom=$input['nom'];
        $membres->Prenom=$input['prenom'];
        $membres->sexe=$input['sexe'];
        $membres->Adres=$input['addresse'];
        $membres->Localite=$input['localite'];
        $membres->Email=$input['email'];
        $membres->NrID=$input['nrId'];
        $membres->Phone=$input['Phone'];
        $membres->DateNaissance =  $input['yearN'].'-'.$input['monthN'].'-'.$input['dayN'];
        $membres->DebutCot = $input['yearD'] .'-'.$input['monthD'].'-'.$input['dayD'];
        $membres->FinCOt = $input['yearF'] .'-'.$input['monthF'].'-'.$input['dayF'];
        $membres->RenouvelementSigner=$input['renouvellement'];
        $membres->Actif=$input['actif'];

        if(!preg_match('/[a-zA-Z]{3,35}/',$membres->Nom)){
            $errors['nom'] = "Nom incorrect, merci d'utiliser des alphanumérique min 3 - max 50";
        }
        if(!preg_match('/[a-zA-Z]{3,35}/',$membres->Prenom)){
            $errors['prenom'] = "Prénom incorrect, merci d'utiliser des alphanumérique min 3 - max 50";
        }
        if(!checkdate($input['monthN'],$input['dayN'],$input['yearN'])) {
            $errors['datedenaissance'] = "Date de naissance : Date invalide";
        }
        if(!checkdate($input['monthD'],$input['dayD'],$input['yearD'])) {
            $errors['dateD'] = "Date début de cotisation: Date invalide";
        }
        if(!checkdate($input['monthF'],$input['dayF'],$input['yearF'])) {
            $errors['dateF'] = "Date Fin de cotisation : Date invalide";
        }
        if(!filter_var($membres->Email, FILTER_VALIDATE_EMAIL)){
            $errors['email'] = "email : Merci d'utiliser une adresse email correct";
        }
        if(!preg_match('/^[0-9]{10}$/',$membres->Phone)){
            $errors['gsm'] = "gsm : Merci  d'utiliser que des numériques ";
        }
        if(empty($errors)){
            $membres->save();
            return redirect()->route('membresAjouter')->with('success', 'Le membre '. $membres->Nom. ' '. $membres->Prenom. ' a bien été crée.');
        }else{
            foreach ($errors as $error){
                $message .= $error.' - ';
            }

            return redirect()->route('membresAjouter')->with('error',  $message);
        }

    }

    public function updateMembre(Request $request){
        $input = $request->except(['_token']);
     /*   echo "mon input";
      var_dump($input);*/
        $errors=array();
        $message = '';
        $membres = Membres::findOrNew($input['id']);
      // var_dump($membres);
        $membres->Nom=$input['nomU'];
        $membres->Prenom=$input['prenomU'];
        $membres->sexe=$input['sexe'];
        $membres->Adres=$input['addresseU'];
        $membres->Localite=$input['localiteU'];
        $membres->Email=$input['emailU'];
        $membres->NrID=$input['nrIdU'];
        $membres->Phone=$input['PhoneU'];
        $dayNU=$input['dayNU'];
        $dayDU=$input['dayDU'];
        $dayFU=$input['dayFU'];
        $monthNU=$input['monthNU'];
        $monthDU=$input['monthDU'];
        $monthFU=$input['monthFU'];
        if($input['dayNU']<9){
            echo 'dans dayNu';
            $dayNU= '0'.$input['dayNU'];
            echo $dayNU;

        }
        if($input['dayDU']<9){
            $dayDU= '0'.$input['dayDU'];
        }
        if($input['dayFU']<9){
            $dayFU= '0'.$input['dayFU'];
        }

        if($input['monthNU']<9){
            $monthNU= '0'.$input['monthNU'];

        }
        if($input['monthDU']<9){
                    $monthDU= '0'.$input['monthDU'];
                }
        if($input['monthFU']<9){
                    $monthFU= '0'.$input['monthFU'];
                }


        $membres->DateNaissance = $input['yearNU'] .'-'.$monthNU .'-'.$dayNU;
        $membres->DebutCot = $input['yearDU'].'-'.$monthDU.'-'.$dayDU;
        $membres->FinCOt = $input['yearFU'] .'-'.$monthFU.'-'.$dayFU;
        $membres->RenouvelementSigner=$input['renouvellementU'];
        $membres->Actif=$input['actifU'];

        if(!preg_match('/[a-zA-Z]{3,35}/',$membres->Nom)){
            $errors['nom'] = "Nom incorrect, merci d'utiliser des alphanumérique min 3 - max 50";
        }
        if(!preg_match('/[a-zA-Z]{3,35}/',$membres->Prenom)){
            $errors['prenom'] = "Prénom incorrect, merci d'utiliser des alphanumérique min 3 - max 50";
        }
        if(!checkdate($input['monthNU'],$input['dayNU'],$input['yearNU'])) {
            $errors['datedenaissance'] = "Date de naissance : Date invalide";
        }
        if(!checkdate($input['monthDU'],$input['dayDU'],$input['yearDU'])) {
            $errors['dateD'] = "Date début de cotisation: Date invalide";
        }
        if(!checkdate($input['monthFU'],$input['dayFU'],$input['yearFU'])) {
            $errors['dateF'] = "Date Fin de cotisation : Date invalide";
        }
        if(!filter_var($membres->Email, FILTER_VALIDATE_EMAIL)){
            $errors['email'] = "email : Merci d'utiliser une adresse email correct";
        }
        /*if(!preg_match('/^[0-9]{10}$/',$membres->Phone)){
            $errors['gsm'] = "gsm : Merci  d'utiliser que des numériques ";
        }*/
        if(empty($errors)){

           $membres->save();

            return redirect()->route('membresMisAJour')->with('success', 'Le membre '. $membres->Nom. ' '. $membres->Prenom. ' a bien été mis à jour.');
        }else{
            foreach ($errors as $error){
                $message .= $error.' - ';
            }
            return redirect()->route('membresMisAJour')->with('danger',  $message);
        }

    }
    public function searchAllUser(Request $request){
      $term=$request->query->get('query');
      $data = Membres::where('Prenom','like','%'.$term.'%')->orderBy('Nom','desc')->limit(10)->get();
      $results=array();
      foreach ($data as  $v){
           $results[]=['id' => $v->id, 'Prenom'=>$v->Prenom, 'Nom'=>$v->Nom];
      }

        return response()->json($results);
    }

    public function searchLocalite(Request $request){
        $term = $request->query->get('query');
        $data = \DB::table('skif_cp')->where('CodePostal','like','%'.$term.'%')->orderBy('CodePostal','desc')->limit(10)->get();

        $results=array();
        foreach ($data as  $v){
            $results[]=['ID' => $v->ID, 'CodePostal'=>$v->CodePostal];
        }
        return response()->json($results);


    }

    public function searchUser(Request $request){

        $term=$request->query->get('query');

        $data = Membres::findOrNew($term);
       // print_r($data);
        /* $results=array();
         foreach ($data as  $v){
             $results[]=['id' => $v->id, 'Prenom'=>$v->Prenom, 'Nom'=>$v->Nom];
         }*/
        return response()->json($data);
    }



    public function accessMediasAll(){
      echo "ok";
    }

}
