<?php

namespace App\Http\Controllers;

use App\Posts;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;


class PagesController extends Controller
{



    public function home()
    {
        $val = \DB::table('posts')->orderBy('created_at','desc')->simplePaginate(6);;

        return view('acceuil.welcome', compact('val'));
    }


    public function show($id){
            $post = Posts::find($id);
           return view('acceuil.articles',compact('post'));
    }


}
