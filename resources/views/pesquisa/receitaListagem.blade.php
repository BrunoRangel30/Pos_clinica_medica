@extends('layouts.app')
@section('content')
    <div class="container">
        @component('consulta.componentes.dadosPaciente')@endcomponent
        @component('consulta.componentes.menuConsulta')@endcomponent
        <div class="row">
            <div class="col-lg-12">
                <table id="example" class="icone table table-striped table-bordered" style="width:100%">
                    @if(session('receita'))
                        <thead>
                            <tr>
                                <th>Receita(s) do Paciente</th>
                                <th>Ações</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach (session('receita') as $item)
                                    <tr>
                                        <td>{{$item['nome_fabrica']}}</td>
                                        <td></td>
                                    </tr>
                                @endforeach
                            </tbody>
                    @endif
                </table>  
            </div>
        </div>
    </div> 
@endsection
    
