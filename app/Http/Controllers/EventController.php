<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Evento;
use Illuminate\Console\Scheduling\Event;

class EventController extends Controller
{
    public function home($nome = null)
    { 
        return view('home', ['nome' => $nome]);
    }

    public function exibieventos()
    {
        $eventos = Evento::all();

        return view('eventos/eventos', ['eventos' => $eventos]);
    }

    public function criaevento()
    {
        return view('eventos.criar');
    }

    public function enviaevento(Request $request) // Recebimento dos dados
    {
        $evento = new Evento; // Criarção do objeto e istaniamento da class

        $evento->titulo = $request->titulo; // Espelhamento de dados para o banco
        $evento->cidade = $request->cidade;
        $evento->dia = $request->dia;
        $evento->horario = $request->horario;
        $evento->endereco = $request->endereco;
        $evento->descricao = $request->descricao;
        $evento->privado = $request->privado;

        $evento->save(); // Salvar dados no banco

        return redirect('/'); // Redirecionamento do usuário

    }

    public function contato()
    {
        return view('contato');
    }
}
