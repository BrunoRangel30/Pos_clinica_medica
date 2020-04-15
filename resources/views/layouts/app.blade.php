<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
     <!-- fullcalendar -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='../assets/fullcalendar/packages/core/main.css' rel='stylesheet' />
    <link href='../assets/fullcalendar/packages/daygrid/main.css' rel='stylesheet' />
    <link href='../assets/fullcalendar/packages/timegrid/main.css' rel='stylesheet' />
    <link href='../assets/fullcalendar/packages/list/main.css' rel='stylesheet' />
    <script src='../assets/fullcalendar/packages/core/main.js'></script>
    <script src='../assets/fullcalendar/packages/interaction/main.js'></script>
    <script src='../assets/fullcalendar/packages/daygrid/main.js'></script>
    <script src='../assets/fullcalendar/packages/timegrid/main.js'></script>
    <script src='../assets/fullcalendar/packages/list/main.js'></script>
    <script src='../assets/fullcalendar/packages/core/locales/pt-br.js'></script>
    <script src='../assets/fullcalendar/js/scriptCalendario.js'></script>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <meta charset='utf-8' />
    
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <div class='pt-1'>
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class='container'>
                    <a class="navbar-brand" href="#"><i class="fas fa-heartbeat"></i></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Cadastrar
                                    </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{route('cadastro.paciente.index')}}">Cadastrar Paciente</a>
                                    <a class="dropdown-item" href="{{route('cadastro.medico.index')}}">Cadastrar Médico</a>
                                    <a class="dropdown-item" href="#">Cadastrar Recepcionista</a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Consultas
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">Lista de Pacientes</a>
                                <a class="dropdown-item" href="#">Lista de Médicos</a>
                                <a class="dropdown-item" href="#">Lista de Recepcionista</a>
                                </div>
                            </li>
                            <li class="nav-item">
                                    <a class="nav-link" href="{{route('consulta.agenda.index')}}">Agendar Consulta</a>
                            </li>
                            @can('admin')
                                <li class="nav-item">
                                <a class="nav-link" href="{{route('admin.users.index')}}">Atribruir Perfil</a>
                                </li>
                            @endcan
                        </ul>
                    </div>
                </div>
            </nav>
        </div>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
