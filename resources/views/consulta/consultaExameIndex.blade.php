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
        padding-top:2px; 
        border: solid 1px #183153;
        border-radius: 8px;
  }

</style>
@section('content')
    <div class='container' id='buscaExame'>
        <div class='row'>
            <div class='col-md-6 titulosPesquisas'>
                <h4>Selecione o Paciente</h4>
                <div id="custom-search-input">
                    <div class="input-group col-md-12" id="InputsearchPacExame">
                        <input name='nome' type="text" data-paciente="" id="searchPacExame" class="form-control input-lg bordaBotao" placeholder="Buscar" />
                        <span class="input-group-btn"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class='row'>
            <div class='col-md-6 buscaExamePaciente'>
              <div id="resulPacExame"></div>
            </div>
        </div>
        <div id='resultadosExames'></div>
    </div> 
@endsection