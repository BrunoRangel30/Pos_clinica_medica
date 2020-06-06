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
        <form>
            <div class='row'>
                <div class="col-md-6">
                    <label class="sr-only" for="pesquisaExame">Pesquise o exame</label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fas fa-search"></i></div>
                        </div>
                        <input type="text" class="form-control" id="pesquisaExame" placeholder="Pesquise o exame">
                        </div>
                        <div class='row'>
                            <div class='col-md-12' id="resultExames"></div>
                        </div>
                    </div>
                <div class='row'>
                    <div class='col-md-12'id="examesSelect">
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Finalizar Seleção</button>
        </form>
@endsection