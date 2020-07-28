@extends('layouts.app')
<style>
      body {
      margin-top: 40px;
      font-size: 14px;
      font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
    }
  
   /* #wrap {
      width: 1100px;
      margin: 0 auto;
    }*/
  
    #external-events {
      float: left;
      width: 150px;
      padding: 0 10px;
      border: 1px solid #ccc;
      background: #eee;
      text-align: left;
    }
  
    #external-events h4 {
      font-size: 16px;
      margin-top: 0;
      padding-top: 1em;
    }
  
    #external-events .fc-event {
      margin: 10px 0;
      cursor: pointer;
    }
  
    #external-events p {
      margin: 1.5em 0;
      font-size: 11px;
      color: #666;
    }
  
    #external-events p input {
      margin: 0;
      vertical-align: middle;
    }

    .icone i {
      padding: 5px;
      font-size: 1em;
      text-align: center
    }
    .icone a {
      color: #183153;
      font-size: 1.3em;
      padding-left: 0px;
      padding-right: 0px;
     
    }
  
    /*#calendar {
      float: right;
      width: 900px;
    }*/

    /*CSS botão de pesquisa*/
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

    #custom-search-input button{
        margin: 2px 0 0 0;
        background: none;
        box-shadow: none;
        border: 0;
        color: #666666;
        padding: 0 8px 0 10px;
        border-left: solid 1px #ccc;
    }

    #custom-search-input button:hover{
        border: 0;
        box-shadow: none;
        border-left: solid 1px #ccc;
    }

    #custom-search-input .glyphicon-search{
        font-size: 23px;
    }
</style>
@section('content')
    
<div class="container">
       <div class="flash-message">
            @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                @if(Session::has('alert-' . $msg))
                    <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="fechar">&times;</a></p>
                @endif
            @endforeach
      </div>
      <div class="icone">
            <a href="{{route('resultadosExames')}}" class="nav-link"><i class="fas fa-search"></i></i>Nova Busca</a>
      </div> 
        <div class="row">
            @if(!$resultado->isEmpty())
            <div class="col-lg-12">
                    <label class="subTitulomaisInfo pt-3 pb-3">Paciente: {{$paciente->nome}}</label>
                    <table id="example" class="icone table  table-bordered shadow p-3 mb-5 table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Cod do Exame</th>
                                <th>Nome do Exame</th>
                                <th>Medico que inseriu o resultado do Exame</th>
                                <th>Data da Inclusão</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($resultado as $item)
                                @php
                                    ///dd($item->dataInclusao);
                                    $date = date_create(date($item->dataInclusao));
                                    $date = date_format($date, 'd/m/Y');  
                                @endphp
                                <tr>
                                    <td>{{$item->exame_id}}</td>
                                    <td>{{$item->nome_exame}}</td>
                                    <td>{{$item->medico}} - {{$item->crm}}</td>
                                    <td>{{$date}}</td>
                                    <td>
                                        <a target='_blank' href="{{ENV('APP_URL')}}/storage/{{$item->link}}"><i class="fas fa-file-pdf"></i></a>
                                        <a href="{{route('enviarEmail',['idexame'=>$item->exame_id,'idPa'=>$paciente->paciente_id])}}">
                                            @if($item->publicar)
                                                <i class="fas fa-envelope-open-text"></i>
                                            @else
                                                <i class="fas fa-envelope"></i>
                                            @endif
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>  
                </div>
            @else
            
                <div class="alert alert-danger col-md-8" role="alert">
                    Nenhum arquivo foi inserido!
                </div>
            @endif
        </div> 
       <!--<nav aria-label="Page navigation example">
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