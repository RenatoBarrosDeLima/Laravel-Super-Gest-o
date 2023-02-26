<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContatoController extends Controller
{
    public function contatoGet(){

        var_dump($_GET);
        return view('site.contato');
    }

    public function contatoPost(){

        var_dump($_POST);
        return view('site.contato');
    }
}
