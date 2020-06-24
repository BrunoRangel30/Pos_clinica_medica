@extends('layouts.app')
<style>

    #custom-search-input{
        padding: 3px;
        border: solid 1px #E4E4E4;
        border-radius: 6px;
        background-color: #fff;
    }

    #custom-search-input input{
        border: 0;
        box-shadow: none;
    }

</style>
@section('content')
    <div class='container' id='buscaExame'>
        <h5>Selecione o Paciente</h5>
        <div class='row'>
            <div class='col-md-6'>
                <div id="custom-search-input">
                    <div class="input-group col-md-12" id="InputsearchPacExame">
                        <input name='nome' type="text" data-paciente="" id="searchPacExame" class="form-control input-lg" placeholder="Buscar" />
                        <span class="input-group-btn"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class='row mt-5'>
            <div class='col-md-6'>
              <div id="resulPacExame"></div>
            </div>
        </div>
        <div id='resultadosExames'></div>
    </div> 
@endsection