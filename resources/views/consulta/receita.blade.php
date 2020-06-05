@extends('layouts.app')


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
        <form method="POST" action="{{route('consulta.receita.store')}}">
            @csrf
            <div class='form-row'>
                <div class="col-md-5">
                    <label class="sr-only" for="buscaMedicamento">Pesquise o medicamento</label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fas fa-search"></i></div>
                        </div>
                        <div id='inputPesqMedicamento'>
                            <input style="width:160%" type="text" class="form-control" id="buscaMedicamento" placeholder="Pesquise o medicamento">
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
                        <div id ="resultMedicamento"class='col-md-5'></div>
                    </div>
                </div>
                <div class="form-group col-md-2" id="qtd">
                    <input name='qtd' type="number" class="form-control" id="idNum" placeholder="Quantidade">
                </div>
                <div class="form-group col-md-2" id="unidade">
                    <input name='unidade' type="" class="form-control" id="idNum" placeholder="Unidade">
                </div>
                <div class="form-group col-md-2" id="via">
                    <input name='via' type="" class="form-control" id="idNum" placeholder="Via">
                </div>
            </div>
            <div class='form-row'>
                <div class="form-group col-md-11" id="procedimento">
                    <label for="idObservacao">Procedimento</label>
                    <textarea name="procedimento" rows="5" type="textArea" class="form-control" id="idObservacao" placeholder=""></textarea>
                </div>
            </div>
            <button type="submit" id="salvarReceita"class="btn btn-primary">Salvar</button>
        </form>
    </div>
   
@endsection