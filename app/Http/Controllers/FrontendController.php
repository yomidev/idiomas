<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Idioma;

class FrontendController extends Controller
{
    public function index(){
        $idioma = Idioma::all();
        return view('welcome')->with(['idioma' => $idioma]);
    }
    public function about(){

    }
    public function services(){

    }
    public function students(){

    }
}
