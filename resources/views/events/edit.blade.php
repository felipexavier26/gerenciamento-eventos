@extends('layouts.main')
@section('title', 'Editando ' . $event->title)
@section('content')


    <!DOCTYPE html>
    <html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="/css/styles.css">
    </head>

    <body>
        <div id="event-create-container" class="col-md-6 offset-md-3">
            <h1 class="text-center mt-4">Editar o {{$event->title}}</h1>

            <form action="/events/update/{{$event->id}}" method="post" enctype="multipart/form-data">
                @csrf
                @method("PUT")

                <div class="form-group mb-3 mt-4">
                    <label for="image">Imagem do Evento:</label>
                    <input type="file" id="image" name="image" class="form-control-file">
                    <img src="/img/events/{{$event->image}}" alt="{{$event->image}}" class="img-preview">
                </div>

                <div class="form-group mb-3">
                    <label for="title">Evento:</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{$event->title}}">
                </div>
                
                <div class="form-group mb-3">
                    <label for="title">Data do evento:</label>
                    <input type="datetime-local" class="form-control" id="date" name="date" value="{{$event->date}}">
                </div>

                <div class="form-group mb-3">
                    <label for="title">Cidade:</label>
                    <input type="text" class="form-control" id="city" name="city" placeholder="Local do evento" value="{{$event->city}}">
                </div>

                <div class="form-group mb-3">
                    <label for="title">O evento é privado?:</label>
                    <select name="private" id="private" class="form-control">
                        <option value="0">Não</option>
                        <option value="1" {{$event->private === 1 ? "selected='selected" : ""}}>Sim</option>
                    </select>
                </div>

                <div class="form-group mb-3">
                    <label for="title">Descrição:</label>
                    <textarea name="description" id="description" class="form-control"  >
                        {{$event->description}}
                </textarea>
                </div>
                

                <div class="form-group mb-3">
                    <label for="title">Adicione itens de infraestrutura:</label>
                    <div class="from-group mb-1">
                        <input type="checkbox" name="items[]" value="Cadeiras">Cadeiras
                    </div>
                    <div class="from-group mb-1">
                        <input type="checkbox" name="items[]" value="Palco">Palco
                    </div>
                    <div class="from-group mb-1 ">
                        <input type="checkbox" name="items[]" value="Cerveja grátis">Cerveja grátis
                    </div>
                    <div class="from-group mb-1 ">
                        <input type="checkbox" name="items[]" value="Open Food ">Open Food
                    </div>
                    <div class="from-group mb-1 ">
                        <input type="checkbox" name="items[]" value="Brindes ">Brindes
                    </div>
                </div>

                <input type="submit" class="btn btn-primary" value="Editar evento">

            </form>

        </div>

    </body>

    </html>



@endsection