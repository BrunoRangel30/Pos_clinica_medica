@extends('layouts.app')
<style>

    #custom-search-input{
        padding: 3px;
        border: solid 1px #183153;
        border-radius: 8px;
        background-color: #fff;
        color: #183153;
        -webkit-box-shadow: 0 0.375em 0 currentColor;
    }

    #custom-search-input input{
        border: 0;
        box-shadow: none;
    }
    .buscaExamePaciente ul li {
       list-style-type: none;
       padding-top: 3px;
       cursor: pointer;
    }
  .buscaExamePaciente ul li i{
       font-size:9px;
    }
  
    .buscaExamePaciente #resulPacExame ul{
        padding: 0px;
    }
    .titulosPesquisas{
        padding: 0px !important;
    }
    .buscaExamePaciente{
       position: absolute !important;
        padding-top:2px; 
        border: solid 1px #183153;
        border-radius: 8px;
        z-index: 1;
        display: none;
    }
    .divExames{
        z-index:0;
    }

</style>
@section('content')
    <div class='container' id='buscaExame'>
        <div class='row'>
            <div class='col-lg-6 titulosPesquisas'>
                <h4>Selecione o Paciente</h4>
                <div id="custom-search-input">
                    <div class="input-group" id="InputsearchPacExame">
                        <input  name='pesquisaExame' type="text" data-paciente="" id="searchPacExame" class="form-control input-lg" placeholder="Buscar" />
                        <span class="input-group-btn"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class='row'>
            <div class='col-md-4 shadow-sm p-3 mb-5 bg-white rounded  buscaExamePaciente'>
              <div id="resulPacExame"></div>
            </div>
        </div>
        <div id='resultadosExames'></div>
    </div> 
@endsection