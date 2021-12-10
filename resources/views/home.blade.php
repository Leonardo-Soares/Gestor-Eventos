@extends('layouts.head')

@extends('layouts.menu')

@section('content')

    @if ($nome != null)
        <h1>Usuário: {{$nome}}</h1> 

    @else 
        <h1>Valor Nulo</h1>
    @endif

@endsection