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
                <h3>Dono do Evento: {{ $donoevento['name'] }}</h3>
                <h3>Cidade: {{ $eventos->cidade }}</h3>
                <h3>Endereço: {{ $eventos->endereco }}</h3>
                <h3>Dia: {{ $eventos->dia }}</h3>
                <h3>Horário: {{ $eventos->horario }}</h3>
                <h3>Descrição: {{ $eventos->descricao }}</h3>
                <h3>Participantes {{count($eventos->users)}}</h3>
                <form action="/eventos/join/{{$eventos->id}}" method="POST">
                    @csrf
                    <a href="/eventos/join/{{$eventos->id}}"
                    class="btn btn-primary"
                    onclick="event.preventDefault();
                    this.closest('form').submit();
                    ">
                    Confirmar Presença
                    </a>
                </form>
            </div>
        </div>
    </div>

@endsection