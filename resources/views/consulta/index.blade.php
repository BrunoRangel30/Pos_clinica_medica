@extends('layouts.app')

@section('content')
    <div class='container'>
        @component('consulta.componentes.dadosPaciente')@endcomponent
        @component('consulta.componentes.menuConsulta')@endcomponent
        @component('consulta.componentes.salvarConsulta')@endcomponent
    </div>
@endsection