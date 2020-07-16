@extends('layouts.app')
<style>
    .resultPesqMed{
        border: solid 1px #183153;
        border-radius: 10px;
        margin-left: 15px;
        display: none; 
        position: absolute !important;
        z-index: 1;
    }
    .divReceita{
        position: relative;
        z-index: 0;
    }
    .resultPesqMed ul li {
        list-style-type: none;
        padding-top: 5px;
    }
    .resultPesqMed  ul {
        padding: 0px !important;
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
        <!--consulta.receita.store-->
        <form  method="POST" action="{{route('consulta.receita.store')}}">
            @csrf
            <div class='form-row campo'>
                <div class="col-md-5">
                    <label class="sr-only" for="buscaMedicamento">Pesquise o medicamento</label>
                    <label for="medicamento">Medicamento</label>
                    <div class="input-group">
                        <div class="input-group-prepend iconePesquisa">
                            <div class="input-group-text"><i class="fas fa-search"></i></div>
                        </div>
                        <div id='inputPesqMedicamento'>
                            <input style="width:184%" type="text" class="form-control" id="buscaMedicamento" placeholder="Pesquise o medicamento">
                            <input name='fk_medicamento' type="hidden" value="" class="form-control" id="idMedicamento">
                            @if(session('idMedico'))
                                 <input name='fk_medico' type="hidden" value="{{session('idMedico')}}" class="form-control">
                            @endif
                            @if(session('Idpaciente'))
                                 <input name='fk_paciente' value={{session('Idpaciente')}} type="hidden" class="form-control">
                            @endif
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-md-10 resultPesqMed shadow-sm  mb-5 bg-white rounded'>
                            <div id ="resultMedicamento"></div>
                        </div>
                    </div>
                </div>
                <div class="form-group col-md-2" id="qtd">
                    <label for="Quantidade">Quantidade</label>
                    <input name='qtd' type="" class="form-control" id="idNum" placeholder="">
                </div>
                <div class="form-group col-md-2" id="unidade">
                    <label for="Unidade">Unidade</label>
                    <input name='unidade' type="" class="form-control" id="idNum" placeholder="">
                </div>
                <div class="form-group col-md-2" id="via">
                    <label for="via">Via</label>
                    <input name='via' type="" class="form-control" id="idNum" placeholder="">
                </div>
            </div>
            <div class='form-row divReceita campo'>
                <div class="form-group col-md-11" id="procedimento">
                    <label for="idObservacao">Procedimento</label>
                    <textarea name="procedimento" rows="5" type="textArea" class="form-control" id="idObservacao" placeholder=""></textarea>
                </div>
            </div>
            <button type="submit" id="salvarReceita"class="sombraBotao">Salvar</button>
        </form>
    </div>
   
@endsection