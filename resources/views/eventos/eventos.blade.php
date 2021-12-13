@extends('layouts.head')

@extends('layouts.menu')

@section('content')

    <h1>Eventos em Belém</h1>

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

@endsection