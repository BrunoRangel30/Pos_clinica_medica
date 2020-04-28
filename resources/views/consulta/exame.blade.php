@extends('layouts.app')
<style>
  
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
        <form>
            <div class='form-row'>
                <div class="col-md-5">
                    <label class="sr-only" for="inlineFormInputGroup">Pesquise o exame</label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fas fa-search"></i></div>
                        </div>
                        <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Pesquise o exame">
                    </div>
                </div>
                <div class='col-md-7 shadow-sm  mb-5 bg-white rounded'>
                    <label> Exames Selecionados </label>
                    <li> Glicemia </li>
                    <li> Hemograma </li>
                    <li> Colesterol </li>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Finalizar Seleção</button>
        </form>
@endsection