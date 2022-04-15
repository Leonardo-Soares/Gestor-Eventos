@extends('layouts.head')

@section('Eventos', 'Dashboard')

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
        <div class="container">
            <div class="row gx-5">
                @foreach ($eventos as $event)
                    <div class="col-lg-4 mb-5">
                        <div class="card h-100 shadow border-0">
                            <img class="card-img-top"
                                style="width: 100%; height: 150px;object-fit: cover;object-position: center;"
                                src="/img/eventos/{{ $event->imagem }}" alt="{{ $event->titulo }}" />
                            <div class="card-body p-4">
                                <div class="badge bg-primary bg-gradient rounded-pill mb-2">
                                    {{ date('d/m/Y', strtotime($event->dia)) }}</div>
                                <a class="text-decoration-none link-dark stretched-link"
                                    href="/eventos/detalhes/{{ $event->id }}">
                                    <h5 class="card-title mb-3" style="color: black">{{ $event->titulo }}</h5>
                                </a>
                                <p class="card-text mb-0">
                                    {{ $event->descricao }}
                                </p>
                            </div>
                            <div class="card-footer p-4 pt-0 bg-transparent border-top-0">
                                <div class="d-flex align-items-end justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <i style="background-color: aquamarine"
                                            class="rounded-circle me-3 p-1 bi bi-people-fill"></i>
                                        Inscritos:
                                        <div class="small ml-1">
                                            <div class="fw-bold">{{ count($event->users) }}</div>
                                            {{-- <div class="text-muted">March 12, 2021 &middot; 6 min read</div> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </div>
@endsection
