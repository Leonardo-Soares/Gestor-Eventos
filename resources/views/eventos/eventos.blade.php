@extends('layouts.head')

@extends('layouts.menu')

@section('content')

    <h1>Eventos em Belém</h1>

    @foreach ($eventos as $evento)
        <ul>
            <li>Título: {{ $evento->titulo }}</li>
            <li>Cidade: {{ $evento->cidade }}</li>
            <li>Endereço: {{ $evento->endereco }}</li>
            <li>Dia: {{ date('d/m/Y', strtotime($evento->dia)) }}</li>
            <li>Hora: {{ $evento->horario }}</li>
            <li>Descrição: {{ $evento->descricao }}</li>
            <h3>O evento conta com:</h3>
            {{-- <ul id="items-list">
                @foreach($evento => $items as $item)
                    <li><ion-icon name="play-outline"></ion-icon> <span>{{ $item }}</span></li>
                @endforeach
            </ul> --}}
            <a href="eventos/detalhes/{{ $evento->id }}" class="btn btn-primary">Saber mais</a>
        </ul>
    @endforeach

    @if (count($eventos) == 0)
        <p>Não temos eventos hoje</p>
    @endif

@endsection