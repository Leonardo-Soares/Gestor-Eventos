@extends('layouts.head')

@section('title', 'Dashboard')

@extends('layouts.menu')

@section('content')
    <h1>Dashboard</h1>


    <div class="col-10">
        <h2>Meus Eventos</h1>
    </div>

    <div class="col-10">
        @if (count($eventos) > 0)
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Participantes</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($eventos as $evento)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td><a href="/eventos/detalhes/{{ $evento->id }}">{{ $evento->titulo }}</a></td>
                            <td> {{ count($evento->users) }} </td>
                            <td>
                                <a href="/eventos/editar/{{ $evento->id }}">Editar</a>
                                <form action="/eventos/detalhes/{{ $evento->id }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">
                                        Deletar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>Sem evento, <a href="/eventos/criar">Criar evento</a></p>
        @endif
    </div>

    <div class="col-10">
        <h2>Eventos que estou participando </h1>
            @if (count($participanteEvento) > 0)
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Participantes</th>
                            <th scope="col">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($participanteEvento as $evento)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td><a href="/eventos/detalhes/{{ $evento->id }}">{{ $evento->titulo }}</a></td>
                                <td> {{ count($evento->users) }} </td>
                                <td>
                                  <form action="/eventos/exit/{{ $evento->id}}" method="POST">
                                    @csrf
                                    @method("DELETE")
                                    <button type="submit" class="btn btn-danger">
                                      Sair do evento
                                    </button>
                                  </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p>Sem evento, <a href="/eventos">Ver mais eventos</a></p>
            @endif
    </div>

@endsection
