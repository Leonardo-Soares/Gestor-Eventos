@extends('layouts.head')

@extends('layouts.menu')

@section('content')
    <div id="search-container" class="col-md-12">
        <h1>Busque um evento</h1>
        <form action="/" method="GET">
            <input type="text" id="procurar" name="procurar" class="form-control" placeholder="Procurar...">
        </form>
    </div>
    <div id="events-container" class="col-md-12">
        @if ($procurar)
            <h2>Buscando por: {{ $procurar }}</h2>
        @else
            <h2>Próximos Eventos</h2>
            <p class="subtitle">Veja os eventos nos próximos dias</p>
        @endif
        <div id="cards-container" class="row">
            @foreach ($eventos as $event)
                <div class="card col-md-3">
                    <img src="/img/eventos/{{ $event->image }}" alt="{{ $event->title }}">
                    <div class="card-body">
                        <p class="card-date">{{ date('d/m/Y', strtotime($event->date)) }}</p>
                        <h5 class="card-title">{{ $event->title }}</h5>
                        <p class="card-participants"> {{ count($event->users) }} Participantes</p>
                        <a href="/eventos/detalhes/{{ $event->id }}" class="btn btn-primary">Saber mais</a>
                    </div>
                </div>
            @endforeach
            @if (count($eventos) == 0 && $procurar)
                <p>Não foi possível encontrar nenhum evento com {{ $procurar }}! <a href="/">Ver todos</a></p>
            @elseif(count($eventos) == 0)
                <p>Não há eventos disponíveis</p>
            @endif
        </div>
    </div>
@endsection
