@extends('layouts.app')

@section('content')
    <div class='container'>
        @component('consulta.componentes.dadosPaciente')@endcomponent
        @component('consulta.componentes.menuConsulta')@endcomponent
        <label>Resumo de Consulta</label>
        <p>Receita</p>
        <p>Exames Solicitados</p>
        
    </div>
    
@endsection