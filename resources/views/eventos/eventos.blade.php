@extends('layouts.head')

@extends('layouts.menu')

@section('content')

    <h1>Eventos em Belém</h1>

    <h1>Busque um evento</h1>
    <form action="/eventos" method="GET">
        <input type="text" name="procurar" id="procurar" placeholder="Procure um evento">
    </form>
    @if ($procurar)
        <h2>Buscando por: {{$procurar}}</h2>
    @else
        <h2>Próximos Eventos</h2>
    @endif


    @foreach ($eventos as $evento)
        <ul>
            <li>Título: {{ $evento->titulo }}</li>
            <li>Cidade: {{ $evento->cidade }}</li>
            <li>Endereço: {{ $evento->endereco }}</li>
            <li>Dia: {{ $evento->dia }}</li>
            <li>Hora: {{ $evento->horario }}</li>
            <li>Descrição: {{ $evento->descricao }}</li>
            <a href="eventos/detalhes/{{ $evento->id }}" class="btn btn-primary">Saber mais</a>
        </ul>
    @endforeach

    @if (count($eventos) == 0 && $procurar)
        <p> Não encontramos nenhum evento com <b>{{$procurar}}</b>  <br/>
            Veja muito mais clicando em: <a href="/eventos">Ver Todos</a>
        </p>
    @elseif (count($eventos) == 0)
        <p>Não há eventos disponíveis</p>
    @endif

@endsection