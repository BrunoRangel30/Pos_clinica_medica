@extends('layouts.app')

@section('content')
    <div class='container'>
        @component('consulta.componentes.dadosPaciente')@endcomponent
        @component('consulta.componentes.menuConsulta')@endcomponent

        <div class='row'>
            <div class='col-md-12' id="listagemReceita"></div>
        </div>
        
    </div> 
@endsection