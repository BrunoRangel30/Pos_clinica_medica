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
        <div class="row">
            <div class="col-sm-6">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Formulários de Exames </h5>
                  <p class="card-text">Selecione o exame para preencher os dados.</p>
                  <a href="#" class="btn btn-primary">Selecionar</a>
                </div>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Upload de Arquivos</h5>
                  <p class="card-text">Insira arquivos (PDF, fotos) referentes aos pacientes</p>
                  <a href="#" class="btn btn-primary">Inserir</a>
                </div>
              </div>
            </div>
          </div>
        <!--<form>
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
            </div>
        </form>-->
    </div>
@endsection