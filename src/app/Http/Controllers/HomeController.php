<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    

    // * Método HOME - Carregar a index
    public function home(){
        return view('site.home.home');
    }

}
