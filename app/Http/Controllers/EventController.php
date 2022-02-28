<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Evento;
use App\Models\User;
use Illuminate\Console\Scheduling\Event;

class EventController extends Controller
{
    public function home(Request $eventos)
    { 
        return view('home', ['eventos' => $eventos]);
    }

    public function exibieventos()
    {
        $procurar = request('procurar');

        if ($procurar) {
            $eventos = Evento::where([
                ['titulo', 'like', '%'.$procurar.'%']
            ])->get();
        }

        else {
            $eventos = Evento::all();
        }
        
        return view('eventos.eventos', ['eventos' => $eventos, 'procurar' => $procurar]);
        $eventos = Evento::all();
        return view('eventos.eventos', ['eventos' => $eventos]);
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
        $evento->items = $request->items;

        // upload de imagens
        if ($request->hasFile('imagem') && $request->file('imagem')->isValid()){

            $requestImagem = $request->imagem;

            $extesion = $requestImagem->extension();

            $imageName = md5($requestImagem->getClientOriginalName() . strtotime("now")) . "." . $extesion;

            $requestImagem->move(public_path('img/eventos'), $imageName);

            $evento->imagem = $imageName;
        }

        $user = auth()->user();
        $evento->user_id = $user->id;

        $evento->save(); // Salvar dados no banco

        return redirect('/')->with('sucesso','Evento cadastrado com sucesso !'); // Redirecionamento do usuário

    }

    public function contato()
    {
        return view('contato');
    }

    public function detalhesevento($id)
    {
        $eventos = Evento::findOrFail($id);

        $donoevento = User::where('id', $eventos->user_id)->first()->toArray();

        return view('eventos.detalhes', ['eventos' => $eventos, 'donoevento' => $donoevento]);
    }


    public function participaevento($id)
    {
        $user = auth()->user();

        $user->participanteEvento()->attach($id);

        $evento = Evento::findOrFail($id);

        return redirect('/dashboard')->with('msg', 'Presença confirmada para ' . $evento->titulo);
    }



    // DASHBOARD

    public function dashboard()
    {
        $user = auth()->user();
        $eventos = $user->eventos;

        return  view('controle.dashboard', ['eventos' => $eventos]);
    }

    public function destroy($id)
    {
        Evento::findOrFail($id)->delete();
        
        return redirect('/dashboard')->with('msg', 'Evento excluido com sucesso');
    }

    public function edit($id)
    {
        $eventos = Evento::findOrFail($id);

        return view('eventos.editar', ['eventos' => $eventos]);
    }

    public function update(Request $request)
    {
        $data = $request->all();

        // upload de imagens
        if ($request->hasFile('imagem') && $request->file('imagem')->isValid()){

            $requestImagem = $request->imagem;

            $extesion = $requestImagem->extension();

            $imageName = md5($requestImagem->getClientOriginalName() . strtotime("now")) . "." . $extesion;

            $requestImagem->move(public_path('img/eventos'), $imageName);

            $data['imagem'] = $imageName;
        }

        Evento::findOrFail($request->id)->update($data);

        return redirect('/dashboard')->with('msg', 'Evento editado com sucesso!');
    }
}