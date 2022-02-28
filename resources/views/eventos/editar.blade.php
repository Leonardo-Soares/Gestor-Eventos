@extends('layouts.head')

@section('title', 'GEB - Editando: ' . $eventos->titulo)

@extends('layouts.menu')

@section('content')
    <h3>Editando: {{ $eventos->titulo }}</h3>

    <form action="/eventos/atualizar/{{ $eventos->id }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="titulo">Imagem do Evento: </label>
            <input type="file" name="imagem" id="imagem" class="form-control" placeholder="Insira a imagem do seu evento">
            <img width="200px" src="/img/eventos/{{ $eventos->imagem }}" alt="{{ $eventos->titulo }}">
        </div>
        <div class="form-group">
            <label for="titulo">Título: </label>
            <input value="{{ $eventos->titulo }}" type="text" name="titulo" id="titulo" class="form-control" placeholder="Insira o título de seu evento">
        </div>
        <div class="form-group">
            <label for="titulo">Cidade: </label>
            <input value="{{ $eventos->cidade }}" type="text" name="cidade" id="cidade" class="form-control"
                placeholder="Insira a cidade onde vai ocorrer o seu evento">
        </div>
        <div class="form-group">
            <label for="titulo">Dia: </label>
            <input type="date" name="dia" id="dia" value="{{ $eventos->dia }}" class="form-control">
        </div>
        <div class="form-group">
            <label for="titulo">Horário: </label>
            <input type="time" name="horario" id="horario" value="{{ $eventos->horario }}" class="form-control"
                placeholder="Insira o título de seu evento">
        </div>
        <div class="form-group">
            <label for="titulo">Endereço: </label>
            <input value="{{ $eventos->endereco }}" type="text" name="endereco" id="endereco" class="form-control"
                placeholder="Insira o ebdereço onde vai ocorrer seu evento">
        </div>
        <div class="form-group">
            <label for="titulo">Descrição: </label>
            <textarea name="descricao" id="descricao" class="form-control"
                placeholder="Descrição do seu evento:">{{ $eventos->descricao }}</textarea>
        </div>
        <div class="form-group">
            <label for="titulo">O Evento é privado ? </label>
            <select name="privado" id="privado">
                <option value="0" {{ $eventos->privado == 0 ? "selected='selected'" : ""}}>Não</option>
                <option value="1" {{ $eventos->privado == 1 ? "selected='selected'" : ""}}>Sim</option>
            </select>
        </div>
        {{-- INFRAESTRUTURA DO EVENTO --}}
        <div class="form-group">
            <label for="titulo">Infraestrutura do Evento: </label>
        </div>
        <div class="form-group">
            <input type="checkbox" name="items[]" value="Ar condicionado">Ar condicionado
        </div>
        <div class="form-group">
            <input type="checkbox" name="items[]" value="Food">Food
        </div>
        <div class="form-group">
            <input type="checkbox" name="items[]" value="Cadeiras">Cadeiras
        </div>
        <div class="form-group">
            <input type="checkbox" name="items[]" value="Mesas">Mesas
        </div>
        <div class="form-group">
            <input type="checkbox" name="items[]" value="Brindes">Brindes
        </div>
        <div class="form-group">
            <input type="checkbox" name="items[]" value="Certificado">Certificado
        </div>
        <div class="form-group">
            <input type="checkbox" name="items[]" value="Música">Música
        </div>

        <input type="submit" value="Salvar Alterações" class="btn btn-primary">
    </form>
@endsection
