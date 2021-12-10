<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Evento;

class EventController extends Controller
{
    public function home($nome = null)
    { 
        return view('home', ['nome' => $nome]);
    }

    public function eventos()
    {
        $eventos = Evento::all();

        return view('eventos', ['eventos' => $eventos]);
    }

    public function contato()
    {
        return view('contato');
    }
}
