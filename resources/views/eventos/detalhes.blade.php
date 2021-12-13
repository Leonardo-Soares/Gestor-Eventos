@extends('layouts.head')

@extends('layouts.menu')

@section('content')

    <div class="col-md-10">
        <div class="row">
            <div id="imagem-container" class="col-md-6">
                <img src="/img/eventos/{{ $eventos->imagem }}" alt="{{ $eventos->titulo }}" class="img-fluid">
            </div>
            <div class="col-md-6" id="info-container">
                <h1>{{ $eventos->titulo }}</h1>
                <h3>Cidade: {{ $eventos->cidade }}</h3>
                <h3>Endereço: {{ $eventos->endereco }}</h3>
                <h3>Dia: {{ $eventos->dia }}</h3>
                <h3>Horário: {{ $eventos->horario }}</h3>
                <h3>Descrição: {{ $eventos->descricao }}</h3>
            </div>
        </div>
    </div>

@endsection