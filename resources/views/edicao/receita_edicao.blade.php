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
        cursor: pointer;
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
        <form method="POST" action="{{route('consulta.receita.update', $data['id'])}}">
            @csrf
            @method('PATCH')
            <div class='form-row campo'>
                <div class="col-md-5">
                    <label class="sr-only" for="buscaMedicamento">Pesquise o medicamento</label>
                    <label for="medicamento">Medicamento</label>
                    <div class="input-group">
                        <div class="input-group-prepend iconePesquisa">
                            <div class="input-group-text"><i class="fas fa-search"></i></div>
                        </div>
                        <div id='inputPesqMedicamento'>
                        <input style="width:184%" name="nome_fabrica" value="{{$data['nome_fabrica']}}"type="text" class="form-control @error('fk_medicamento') is-invalid @enderror" id="buscaMedicamento" placeholder="Pesquise o medicamento">
                             @error('fk_medicamento')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <input name='fk_medicamento' type="hidden" value="" class="form-control" id="idMedicamento">
                            @if(session('idMedico'))
                                 <input name='fk_medico' type="hidden" value="{{session('idMedico')}}" class="form-control">
                            @endif
                            @if(session('Idpaciente'))
                                 <input name='fk_paciente' value={{session('Idpaciente')}} type="hidden" class="form-control">
                            @endif
                            <input name='id' value="{{$data['id']}}" type="hidden" class="form-control">
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-md-10 resultPesqMed shadow-sm  mb-5 bg-white rounded'>
                            <div id ="resultMedicamento"class='col-md-5'></div>
                        </div>
                    </div>
                </div>
                <div class="form-group col-md-2" id="qtd">
                    <label for="Quantidade">Quantidade</label>
                    <input name='qtd' value="{{$data['qtd']}}" type="" class="form-control @error('qtd') is-invalid @enderror" id="qtd" placeholder="Quantidade">
                    @error('qtd')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group col-md-2" id="unidade">
                    <label for="Quantidade">Unidade</label>
                    <input name='unidade' value="{{$data['unidade']}}" type="" class="form-control @error('unidade') is-invalid @enderror" id="unidade" placeholder="Unidade">
                    @error('unidade')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group col-md-2" id="via">
                    <label for="via">Via</label>
                    <input name='via' type="" value = {{$data['via']}} class="form-control @error('via') is-invalid @enderror" id="via" placeholder="Via">
                    @error('via')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class='form-row divReceita campo'>
                <div class="form-group col-md-11" id="procedimento">
                    <label for="idObservacao">Procedimento</label>
                    <textarea name="procedimento"  rows="5" type="textArea" class="form-control @error('procedimento') is-invalid @enderror" id="idObservacao" placeholder="">{{$data['procedimento']}}</textarea>
                    @error('procedimento')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <button type="submit" id="salvarReceita"class="sombraBotao">Atualizar</button>
        </form>
    </div>
   
@endsection