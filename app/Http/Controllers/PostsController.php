<?php

namespace App\Http\Controllers;

use App\Instructeurs;
use Faker\Provider\DateTime;
use Intervention\Image\Facades\Image;
use SebastianBergmann\Diff\LCS\TimeEfficientImplementationTest;
use Validator;
use Redirect;
use Session;
use Illuminate\Http\Request;
use App\Posts;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;


class PostsController extends Controller
{
    public function articlesUpdate(){
        $activeMenu='maj';
        $articles = Posts::orderBy('id','desc')->simplePaginate(10);
        return view ('admin.articles', compact('articles','activeMenu'));
    }

    public function articles(){
        if(isset($_GET['page'])){
            $activeMenu='maj';
        }else{
                $activeMenu='ajouter';
        }

       $articles = Posts::orderBy('id','desc')->simplePaginate(10);
       return view ('admin.articles', compact('articles','activeMenu'));
    }

    public function modifierArticle(){
        $articles = Posts::orderBy('id','desc')->simplePaginate(5);
        return view ('administration.articles.modifier',compact('articles'));
    }

    public function ajouterArticle(){
        return view ('administration.articles.ajouter');
    }




    public function showArticles($id){
        $article = Posts::findOrNew($id);
        return redirect('administration/articles')->with('article', $article);
    }




    public function storePost(Request $request){

        $input = $request->except(['_token']);



        $post = new Posts();
        $file = array('image'=>Input::file('image'));
        $rules = array('image'=>'required');
        $validator = \Validator::make($file,$rules);
        if($validator->fails()){
            return redirect()->route('ajouterArticle')->with('error', "Merci de choisir une image");
        }else {
            // checking file is valid.
            if (Input::file('image')->isValid()) {
                $destinationPath = 'img/'; // upload path
                $extension = Input::file('image')->getClientOriginalExtension(); // getting image extension
                $fileName = rand(11111,99999).'.'.$extension; // renameing image
                Input::file('image')->move($destinationPath, $fileName); // uploading file to given path
                $post->post_title=$input['post_title'];
                $post->post_content=$input['post_content'];
                $post->fk_categorie=$input['categorie'];
                $post->description=$input['description'];
                $post->img=$destinationPath.$fileName;
                // sending back with message
                Session::flash('success', 'Upload successfully');
                $post->save();
                return redirect()->route('ajouterArticle')->with('success', 'ok dans db');
            }
            else {
                // sending back with error message.
                Session::flash('error', 'uploaded file is not valid');
                return redirect()->route('ajouterArticle');
            }
        }
    }



    public function updatePost(Request $request){
        $input = $request->except(['_token']);
        $update=Posts::findOrNew($input['update']);
        $update->post_title=$input['posttitle'];
        $update->post_content=$input['editor'];
        $update->description=$input['description'];
        $update->fk_categorie=$input['categorie'];
        $update->status=$input['status'];

        $update->save();
        return redirect()->route('articlesUpdate')->with('success', 'update ok dans db');
    }


    public function searchArticle(Request $request){
        $term=$request->term;
        $data = Posts::where('post_title','LIKE','%'.$term.'%')->get();
        $results=array();
        foreach ($data as  $v){
            $results[]=['id' => $v->id, 'title'=>$v->post_title, 'content'=>$v->post_content, 'categorie'=>$v->fk_categorie];
        }
        return response()->json($results);
    }









}
