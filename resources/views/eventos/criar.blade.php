@extends('layouts.head')

@extends('layouts.menu')

@section('content')
    <h3>Criar Evento</h3>

    <form action="/eventos" method="POST">
        @csrf
        <div class="form-group">
            <label for="titulo">Título: </label>
            <input type="text" name="titulo" id="titulo" class="form-control" placeholder="Insira o título de seu evento">
        </div>
        <div class="form-group">
            <label for="titulo">Cidade: </label>
            <input type="text" name="cidade" id="cidade" class="form-control" placeholder="Insira a cidade onde vai ocorrer o seu evento">
        </div>
        <div class="form-group">
            <label for="titulo">Dia: </label>
            <input type="date" name="dia" id="dia" class="form-control">
        </div>
        <div class="form-group">
            <label for="titulo">Horário: </label>
            <input type="time" name="horario" id="horario" class="form-control" placeholder="Insira o título de seu evento">
        </div>
        <div class="form-group">
            <label for="titulo">Endereço: </label>
            <input type="text" name="endereco" id="endereco" class="form-control" placeholder="Insira o ebdereço onde vai ocorrer seu evento">
        </div>
        <div class="form-group">
            <label for="titulo">Descrição: </label>
           <textarea name="descricao" id="descricao" class="form-control" placeholder="Descrição do seu evento:"></textarea>
        </div>
        <div class="form-group">
            <label for="titulo">O Evento é privado ? </label>
            <select name="privado" id="privado">
                <option value="0">Não</option>
                <option value="1">Sim</option>
            </select>
        </div>

        <input type="submit" value="Criar Evento" class="btn btn-primary">
    </form>
@endsection