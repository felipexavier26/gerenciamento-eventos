@extends('layouts.main')
@section('title', 'HDC Events')
@section('content')

    <div class="col-md-10 offset-md-1">
        <div class="row">
            <div id="image-container" class="col-md-6">
                <img src="/img/events/{{ $event->image }}" class="img-fluid" alt="{{ $event->image }}">

            </div>
            <div id="info-container" class="col-md-6">
                <h1 class="mb-3">{{ $event->title }}</h1>
                <p class="event-city">
                    <ion-icon class="fas fa-map-marker-alt"></ion-icon>
                    {{ $event->city }}
                </p>

                <p class="event-participants mt-1">
                    <ion-icon name="people-outline"></ion-icon>
                    {{count($event->users)}} participants
                </p>

                <p class="event-owner mt-1">
                    <ion-icon name="star-outline"></ion-icon>
                    {{ $eventOwner['name'] }}
                </p>

                <p class="event-owner mt-1">
                    <ion-icon name="calendar-outline"></ion-icon>
                    {{ \Carbon\Carbon::parse($event->date)->format('d/m/Y H:i:s') }}

                </p>

                <form action="/events/join/{{ $event->id }}" method="POST">
                    @csrf
                    <a href="/events/join/{{ $event->id }}" class="btn btn-primary" id="event-submit"
                        onclick="event.preventDefault(); this.closest('form').submit();"
                        >Confirmar presenção</a>
                </form>

                @if (!empty($event->items) && is_array($event->items))
                    <h3 class="mt-3">O evento conta com:</h3>
                    <ul id="items-list">
                        @foreach ($event->items as $item)
                            <li>
                                <ion-icon name="play-outline"></ion-icon>
                                {{ $item }}
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p>Este evento não possui itens cadastrados.</p>
                @endif

            </div>

            <div class="col-md-12 mt-5"id="description-container">
                <h3>Sobre o evento</h3>
                <p class="event-descrption">
                    {{ $event->description }}
                </p>


            </div>
        </div>

    </div>
@endsection
