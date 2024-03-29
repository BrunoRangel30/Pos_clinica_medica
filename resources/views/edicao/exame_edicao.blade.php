@extends('layouts.app')
<style>

  #resultExames{
      height:200px;
      overflow-y: scroll;
      display: none;
  }
  #examesSelect{
    border-width: medium;
    border-style: solid;
    border-color: #00f;;
    height: auto;
    width: 100%;
  }

</style>

@section('content')
    <div class='container'>
        <div class='row'>
            <div class='col-md-12 mb-3'>
                @component('consulta.componentes.dadosPaciente')@endcomponent
            </div>
        </div>
        <div class='row'>
            <div class='col-md-12 mb-3'>
                @component('consulta.componentes.menuConsulta')@endcomponent
            </div>
        </div>
        <form method="POST" action="{{route('consulta.exame.store')}}">
            @csrf
            <div class='row'>
                <div class="col-md-6">
                    <label class="sr-only" for="pesquisaExame">Pesquise o exame</label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fas fa-search"></i></div>
                        </div>
                        <input type="text"  class="form-control" id="pesquisaExame" placeholder="Pesquise o exame">
                        </div>
                        <div class='row'>
                            <div class='col-md-12' id="resultExames"></div>
                        </div>
                    </div>
                    <!--<div id="examesSelect" class="col-md-12"><li> <i id="2" class="fas fa-times-circle"></i> 
                            PUNCAO ASPIRATIVA RENAL PARA DIAGNOSTICO DE R</li>
                            <input type="hidden" name="exames-3" value="3"><li> 
                                <i id="3" class="fas fa-times-circle">
                                    </i> BLOQUEIO ANESTESICO DE NERVOS CRANIANOS</li><input type="hidden" name="exames-5" value="5"><li> <i id="5" class="fas fa-times-circle"></i> BLOQUEIO ANESTESICO DE SIMPATICO LOMBAR</li><input type="hidden" name="exames-6" value="6"><li> <i id="6" class="fas fa-times-circle"></i> BLOQUEIO PERIDURAL OU SUBRACNOIDEO COM CORTIC</li>
                    </div>-->
                <div class='row' id='examesrequest'>
                    <div class='col-md-12' id="examesSelect">
                        <!--aqui toda a contrucao do html-->
                        <input type="hidden" name="exames-2" value="2">
                    </div>
                </div>
            </div>
            <div id='salvarExame'>
               <button type="submit" class="btn btn-primary">Finalizar Seleção</button>
            </div>
        </form>
@endsection