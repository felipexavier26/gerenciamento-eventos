@extends('layouts.main')
@section('title', 'Dashboard')
@section('content')

    <div class="col-md-10 offset-md-1 dashboard-title-container">
        <h1>Meus eventos</h1>
    </div>

    <div class="col-md-10 offset-md-1 dashboard-events-container">
        @if (count($events) > 0)
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Participantes</th>
                        <th scope="col">Açoes</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($events as $event)
                        <tr>
                            <td scope="col">{{ $event->id }}</td>
                            <td scope="col"><a href="/events/{{ $event->id }}">{{ $event->title }}</a></td>
                            <td scope="col"> {{ count($event->users) }}</td>
                            <td scope="col">

                                <a href="/events/edit/{{ $event->id }}"><button type="submit"
                                        class="btn btn-info edit-btn">
                                        Editar
                                    </button>
                                </a>



                                <form action="/events/{{ $event->id }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger delete-btn"
                                        onclick="return confirm('Tem certeza que deseja excluir este evento?')">
                                        Deletar
                                    </button>

                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>Voçê ainda não tem eventos <a href="/events/create">Criar eventos</a></p>
        @endif
    </div>



    <div class="col-md-10 offset-md-1 dashboard-title-container">
        <h1>Eventos que estou participando</h1>
    </div>

    <div class="col-md-10 offset-md-1 dashboard-events-container">
        @if (count($eventsAsParticipant) > 0)
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Participantes</th>
                    <th scope="col">Açoes</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($eventsAsParticipant as $event)
                    <tr>
                        <td scope="col">{{ $event->id }}</td>
                        <td scope="col"><a href="/events/{{ $event->id }}">{{ $event->title }}</a></td>
                        <td scope="col"> {{ count($event->users) }}</td>
                        <td scope="col">

                         <a href="#">Sair do evento</a>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @else
            <p>
                Você ainda não está participando de nenhum evento. <a href="/">Veja todos os eventos</a>
            </p>
        @endif
    </div>

@endsection
