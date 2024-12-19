@extends('layouts.main')
@section('title', 'HDC Events')
@section('content')

    <!DOCTYPE html>
    <html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/css/styles.css">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
    </head>

    <body>


        <div id="search-container" class="col-md-12">
            <h1>Busque um evento</h1>

            <form action="/" method="GET">
                <input type="text" id="search" name="search" class="form-control" placeholder="Procurar...">
            </form>
        </div>

        <div id="events-container" class="col-md-12">
            @if ($search)
                <h2 class="sub-title">Buscando por {{ $search }}</h2>
            @else
                <h2 class="sub-title">Proximos um eventos</h2>
                <p>Veja os eventos dos proximos dias</p>
            @endif

            <div id="card-container" class="row">
                @foreach ($events as $event)
                    <div class="card col-md-3">
                        <img src="/img/events/{{ $event->image }}" alt="{{ $event->title }}" srcset="">
                        <div class="card-boby">
                            <p class="card-date">
                                {{ \Carbon\Carbon::parse($event->date)->format('d/m/Y H:i:s') }}
                            </p>
                            <h5 class="card-title">
                                {{ $event->title }}
                            </h5>

                            <p class="card-participants">
                                {{count($event->users)}} participants
                            </p>
                            <a href="events/{{ $event->id }}" class="btn btn-primary">Saber mais</a>
                        </div>
                    </div>
                @endforeach
            </div>
            @if (count($events) == 0)
                <p>Não foi possível encontrar nenhum evento com {{$search}}! <a href="/">Ver todos!</a> </p>
            @elseif(count($events) == 0)
                <p>Não há eventos disponiveis</p>
            @endif
        </div>



    </body>

    </html>
@endsection
