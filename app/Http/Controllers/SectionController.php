<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class SectionController extends Controller
{
   public function index(){
       $section = ['matin' => '10'];
       return view('section.index', compact('section'));
   }
}
