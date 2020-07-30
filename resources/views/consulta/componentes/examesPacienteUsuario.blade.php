@extends('layouts.app')
<style>
        .header td{
            color:black;
            font-weight: 600;
        }
       
</style>
@section('content')
<div class="container">
    <div class="row">
       <div class="col-lg-12">
        @if(!$resultado->isEmpty())
            <table>
                @php
                    $date = date_create(date($idPaciente->data_nasc));
                    $date = date_format($date, 'd/m/Y');  
                @endphp
                <tr class='header'>
                    <td class='dadosPaciente'>
                        <p>Nome do paciente: {{$idPaciente->nome}}</p>
                        <p>Data de Nascimento: {{$date}}</p>
                        <p>Nome da Mãe: {{$idPaciente->nome_mae}}</p>
                    </td>
                </tr>
            </table>
            <table id="example" class="icone table  table-bordered shadow p-3 mb-5 table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Cod. do Exame</th>
                        <th>Nome do Exame</th>
                        <th>Medico que inseriu o resultado do Exame</th>
                        <th>Data da Inclusão</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($resultado as $item)
                        <tr>
                            @php
                                $date = date_create(date($item->dataInclusao));
                                $date = date_format($date, 'd/m/Y');  
                            @endphp
                             <td>{{$item->exame_id}}</td>
                            <td>{{$item->nome_exame}}</td>
                            <td>{{$item->medico}} - {{$item->crm}}</td>
                            <td>{{$date}}</td>
                            <td>
                                <a target='_blank' href="{{$item->link}}"><i class="fas fa-file-pdf"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @else
                <div class="alert alert-danger semExames" role="alert">
                    Sem resultados cadastrados!
                </div> 
            @endif 
       </div>
   </div> 
  <!-- <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
        <li class="page-item disabled">
            <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
        </li>
        <li class="page-item"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item">
            <a class="page-link" href="#">Next</a>
        </li>
        </ul>
    </nav>-->
</div>
@endsection