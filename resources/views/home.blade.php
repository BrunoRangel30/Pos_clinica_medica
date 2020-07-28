@extends('layouts.app')
<style>
    .tamanho .card{
        min-height: 300px;
        border-radius: 10px;
        border: solid 1px #183153
    }
    .tamanho .card-title{
       background-color: #183153;
       border-radius:10px 10px 0px 0px;
       
     
    }
    .tamanho h5{
      color: white;
    }
    .tamanho i{
      color:#63e6be;
    }
    .tamanho ul li a{
      color:#395993 !important;
      font-size: 1.2em;
      text-decoration: none;
    }
</style>
@section('content')
    
<div class='container'>
    <div class='row mt-5'>
       @can('recep')
            <div class='col-md-4 p-3 tamanho '>
                <div class="card" style="width: 18rem;">
                    <h5 class="card-title pl-3 pt-4 pb-3"> <i class="fas fa-id-card"></i> Cadastros</h5>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><a href="{{route('cadastro.paciente.create')}}">Paciente</a></li>
                        <li class="list-group-item"><a href="{{route('cadastro.medico.create')}}">Médico</a></li>
                        <li class="list-group-item"><a href="{{route('cadastro.recepcionista.create')}}">Recepcionista</a></li>
                        <li class="list-group-item"><a href="{{route('cadastro.medicamento.create')}}">Medicamento</a></li>
                    </ul>
                </div>
            </div>
        @endcan
        <div class='col-md-4 p-3 tamanho'>
            @can('recep')
                <div class="card" style="width: 18rem;">
                    <h5 class="card-title pl-3 pt-4 pb-3"> <i class="fas fa-search"></i> Pesquisas </h5>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><a href="{{route('listar.paciente.index')}}">Paciente</a></li>
                        <li class="list-group-item"><a href="{{route('listar.medico.index')}}">Médico</a></li>
                        <li class="list-group-item"><a href="{{route('listar.recepcionista.index')}}">Recepcionista</a></li>
                        <li class="list-group-item"><a href="{{route('listar.medicamento.index')}}">Medicamento</a></li>
                    </ul>
                </div>
            @endcan
        </div>
        <div class='col-md-4 p-3 tamanho'>
            <div class="card" style="width: 18rem;">
                    <h5 class="card-title pl-3 pt-4 pb-3"> <i class="far fa-calendar-check"></i> Consultas</h5>
                    <ul class="list-group list-group-flush">
                        @can('recep')
                            <li class="list-group-item"><a href="{{route('consulta.agenda.index')}}">Agendar Consulta</a></li>
                        @endcan
                        @can('medico')
                            <li class="list-group-item"><a href="{{route('consulta.paciente.index')}}">Realizar Consulta</a></li>
                            <li class="list-group-item"><a href="{{route('resultadosExames')}}">Resultado de Exame</a></li>
                        @endcan
                        @can('user')
                        <li class="list-group-item"><a href="{{route('indexPaciente')}}">Resultado de Exame</a></li>
                        @endcan
                    </ul>
            </div>
        </div>
        </div>
</div>
  
@endsection
<script>

</script>
