<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventController extends Controller
{
    public function home($nome = null)
    { 
        return view('home', ['nome' => $nome]);
    }

    public function eventos()
    {
        return view('eventos');
    }

    public function contato()
    {
        return view('contato');
    }
}
