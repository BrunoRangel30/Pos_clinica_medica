<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <style>
        body{
            background-color: #fff !important;
        }
        .MenuPrincipal .bg-light{
            background-color: #183153 !important;
            height: 12vh;
        }
        .campo .form-control:focus{
            color: #183153;
            background-color: #fff;
            border-color: #183153 !;
            outline: 0;
            box-shadow: 0 0 0 0.2rem rgba(0, 0, 0, 0) !important;
           /* box-shadow: 0 0 0 0.2rem #f8fafc !important;*/
        }

        .MenuPrincipal li a{
            color: #fff !important;
            font-size: 1.2em;
        }
        .MenuPrincipal .dropdown-menu{
            background-color: #183153 !important;
            border: solid 1px #459d93 !important;
        }

        .MenuPrincipal .dropdown-item:hover, .dropdown-item:focus {
            color: #16181b;
            text-decoration: none;
            background-color:#ffd43b;
        }

        .icone li i{
            color:#ffd43b;
            font-size: 3em;
        }

        /*botao*/
       .sombraBotao{
            padding-left:15px;
            padding-right: 15px;
            padding-top: 5px;
            padding-bottom: 5px;
            border: solid 1px #183153;
            border-radius: 8px;
            background-color:#ffd43b;
            color: #214450;
            /* font-family: 'roundproblackegular'; /* fonte */
            font-weight: 700;
            font-size: 1em;
            /* text-transform: uppercase;*/
            -webkit-box-shadow: 0 0.375em 0 currentColor !important;
        }
        /*configurações tabela*/
        .icone i {
            padding: 5px;
            font-size: 1.5em; 
            color:#183153;
            cursor: pointer;
        }

        .icone td{
            text-align: center

        }
        .icone th{
            text-align: center
        }

        /*modal mais opçoes*/
        .TitulomaisInfo h4{
            color:#183153;
            font-weight: 600;
        }
        .subTitulomaisInfo label{
            color:#183153;
            font-weight: 600;
        }
        .subTitulomaisInfo label span{
            color:black ;
            font-weight: 500;
        }
        .iconeModalMaisInfo i{
            padding: 5px;
            font-size: 1em; 
        }
        .bordaInfo{           
            border-radius: 10px;
        }
        .bordaInfo p {           
            font-size: 1.1em;
            font-weight: 500;
        }

        /*menu Consulta*/
        .MenuConsulta li a {
            color:#183153;
            font-weight: 500;
            font-size: 1.2em;
            padding: 10px;
        }
        .MenuConsulta li a i {
            color:#459d93;
        }
        .bordaGeral{
            margin-bottom: 10px;
        }

        /*icone busca*/
        .iconePesquisa i{
            color:#459d93;
           
        }
        .iconePesquisa .input-group-text{
            background-color:#183153 !important;
        }
      


    </style>
     <!-- fullcalendar -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{asset('assets/fullcalendar/packages/core/main.css')}}" rel='stylesheet' />
    <link href="{{asset('assets/fullcalendar/packages/daygrid/main.css')}}" rel='stylesheet' />
    <link href="{{asset('assets/fullcalendar/packages/timegrid/main.css')}}" rel='stylesheet' />
    <link href="{{asset('assets/fullcalendar/packages/list/main.css')}}" rel='stylesheet' />
    <script src="{{asset('assets/fullcalendar/packages/core/main.js')}}"></script>
    <script src="{{asset('assets/fullcalendar/packages/daygrid/main.js')}}"></script>
    <script src="{{asset('assets/fullcalendar/packages/timegrid/main.js')}}"></script>
    <script src="{{asset('assets/fullcalendar/packages/list/main.js')}}"></script>
    <script src="{{asset('assets/fullcalendar/packages/core/locales/pt-br.js')}}"></script>
    <script src="{{asset('assets/fullcalendar/packages/interaction/main.js')}}"></script>
    <script src="{{asset('assets/fullcalendar/packages/moment/main.js')}}"></script>
    <script src="{{asset('assets/moment/moment.min.js')}}"></script>
    
    
    
   
    <!--Font-->
    <link href="{{asset('assets/fontawesome/css/all.css')}}" rel="stylesheet"> 
    <!--load all styles -->
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('assets/fullcalendar/js/scriptCalendario.js')}}" defer></script>
    
    
  

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <meta charset='utf-8' />
    
</head>
<body>
    <div id="app">
        <div class='MenuPrincipal'>
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class='container'>
                    <a class="navbar-brand" href="#"></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto icone">
                            <li>
                                <a href="{{route('home')}}">
                                    <i class='fas fa-user-md'></i>
                                </a>
                            </li>
                        </ul>
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Cadastrar
                                    </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{route('cadastro.paciente.create')}}">Cadastrar Paciente</a>
                                    <a class="dropdown-item" href="{{route('cadastro.medico.create')}}">Cadastrar Médico</a>
                                    <a class="dropdown-item" href="{{route('cadastro.recepcionista.create')}}">Cadastrar Recepcionista</a>
                                    <a class="dropdown-item" href="{{route('cadastro.medicamento.create')}}">Cadastrar Medicamento</a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Pesquisar
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{route('listar.paciente.index')}}"> Pacientes</a>
                                    <a class="dropdown-item" href="{{route('listar.medico.index')}}"> Médicos</a>
                                    <a class="dropdown-item" href="{{route('listar.recepcionista.index')}}"> Recepcionista</a>
                                    <a class="dropdown-item" href="{{route('listar.medicamento.index')}}"> Medicamentos</a>
                                </div>
                            </li>
                            <li class="nav-item">
                                    <a class="nav-link" href="{{route('consulta.agenda.index')}}">Agendar Consulta</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('consulta.paciente.index')}}">Realizar Consulta</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('resultadosExames')}}">Resultados de Exames</a>
                            </li>
                            @can('admin')
                                <li class="nav-item">
                                <a class="nav-link" href="{{route('admin.users.index')}}">Atribruir Perfil</a>
                                </li>
                            @endcan
                            <!--parte de atentificação-->
                           
                        </ul>
                        <!--atentificação-->
                        <ul class="navbar-nav">
                        @guest
                        <li class="nav-item form-control mr-sm-2">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item form-control mr-sm-2">
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
                                <i class="fas fa-sign-out-alt"></i>
                                {{ __('Sair') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                            @endguest
                        </ul>

                    </div>
                </div>
            </nav>
        </div>

        <main class="py-5">
            @yield('content')
        </main>
    </div>

  
    
   

</body>


</html>
