<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/styles.css">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="/css/styles.css">
    <script src="/js/scripts.js"></script>
</head>

<body>

    <header>
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="navbar collapse navbar-collapse">
                <a href="/" class="nav-brad">
                    <img src="/img/hdcevents_logo.svg" alt="logo">
                </a>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="/" class="nav-link">
                            Eventos</a>
                    </li>
                    <li class="nav-item">
                        <a href="/events/create" class="nav-link">
                            Criar Envetos</a>
                    </li>
                    @auth
                        <li class="nav-item">
                            <a href="/dashboard" class="nav-link">
                                Meus Eventos
                            </a>
                        </li>
                        <li class="nav-item">
                            <form action="/logout" method="post" id="logout-form">
                                @csrf
                                <a href="#" class="nav-link"
                                    onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                    Sair
                                </a>
                            </form>
                        </li>
                    @endauth

                    

                    @guest
                        <li class="nav-item">
                            <a href="/login" class="nav-link">
                                Entrar</a>
                        </li>
                        <li class="nav-item">
                            <a href="/register" class="nav-link">
                                Cadastrar</a>
                        </li>
                    @endguest
                </ul>

            </div>
        </nav>
    </header>


    <main>
        <div class="container-fluid">
            <div class="row">
                @if (session('success'))
                    <p class="success">{{ session('success') }}</p>
                @endif
                @yield('content')
            </div>
        </div>
    </main>


    <footer>
        <p>HDC Events &copy; 2024</p>
    </footer>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">


</body>

</html>
