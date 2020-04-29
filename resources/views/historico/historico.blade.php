@extends('layouts.app')
@section('content')
  <div class="container">
        <div class='row'>
            <div class='col-md-12 mb-3'>
                @component('consulta.componentes.menuConsulta')@endcomponent
            </div>
        </div>
        <div class='row'>
            <div class='col-md-12 mb-3'>
               <h3> Dados do Paciente<h3>
            </div>
        </div>
        <div class='row'>
            <div class='col-md-12 mb-3'>
               <h3>Consultas Realizadas<h3>
            </div>
        </div>
        <div class='row'>
            <div class="col-lg-12">
                <table class="table icone table table-striped table-bordered" style="width:100%">
                    <thead>
                      <tr>
                        <th scope="col">Medico responsável pelo Atendimento</th>
                        <th scope="col">Data da consulta</th>
                        <th scope="col">Exames solicitados</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">Bruno</th>
                        <td>23/04/2019</td>
                        <td>Hemograma</td>
                      </tr>
                    </tbody>
                  </table>
            </div>
        </div>
        <div class='row'>
            <div class='col-md-12 mb-3'>
               <h3>Resultados de Exames<h3>
            </div>
        </div>
        <div class='row'>
            <div class='col-md-12 mb-3'>
               <h3>Observações<h3>
            </div>
        </div>
    </div>
@endsection