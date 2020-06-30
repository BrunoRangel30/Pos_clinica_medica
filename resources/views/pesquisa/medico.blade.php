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
      font-size: 1.5em;
      text-align: center
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
        <div class="row mb-5">
          <!--  <div class="col-md-6">
                <h3>Pesquise o Médico</h3>
                <div id="custom-search-input">
                    <div class="input-group col-md-12">
                        <input type="text" class="form-control input-lg" placeholder="Buscar" />
                        <span class="input-group-btn">
                            <button class="btn btn-info btn-lg" type="button">
                            </button>
                        </span>
                    </div>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-md-6 mt-5 ">
                <a href=""><i class="fas fa-user-plus"></i></a>
                </div>
            </div>-->
        </div>
       <div class="row">
           <div class="col-lg-12">
            <table id="example" class="icone table  table-bordered shadow p-3 mb-5 table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Nome do Medico</th>
                        <th>CPF</th>
                        <th>Data Nascimento</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($medico as $item)
                        <tr>
                            <td>{{$item->nome}}</td>
                            <td>{{$item->crm}}</td>
                            <td>{{$item->data_nasc}}</td>
                                <td>
                                <a><i class="fas fa-info" data-toggle="modal" data-target="#modal-info-paciente-{{$item->medico_id}}"></i></a>
                                <a href="{{route('cadastro.medico.create')}}"><i class="fas fa-user-plus"></i></a>
                                <a href="{{route('cadastro.medico.edit',$item->medico_id)}}"><i class="fas fa-edit"></i></a>
                                @method('DELETE')
                                <a href=""><i class="fas fa-user-times"></i></a>
                            </td>
                        </tr>
                          <!-- Modal -->
                        <div class="modal fade" id="modal-info-paciente-{{$item->medico_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header TitulomaisInfo">
                                    <h4 class="modal-title" id="exampleModalLabel">Mais informações - ({{$item->nome}})</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body subTitulomaisInfo">
                                        <div class='row'>
                                            <div class='col-md-6'>
                                                <label>Sexo : <span>{{$item->sexo}}</span></label>
                                            </div>
                                            <div class='col-md-6'>
                                                <label>CRM : <span>{{$item->crm}}</span></label>
                                            </div>
                                        </div>
                                        <div class='row'>
                                            <div class='col-md-6'>
                                                <label>Especialidade : <span>{{$item->espec}}</span></label>
                                            </div>
                                            <div class='col-md-6'>
                                                <label>Especialidade Segundaria : <span>{{$item->espec_sec}}</span></label>
                                            </div>
                                        </div>
                                        <div class='row'>
                                            <div class='col-md-6'>
                                                <label>Telefone Celular : <span>{{$item->tele_cel}}</span></label>
                                            </div>
                                            <div class='col-md-6'>
                                                <label>Telefone Fixo : <span>{{$item->tele_fixo}}</span></label>
                                            </div>
                                        </div>
                                        <div class='row'>
                                            <div class='col-md-6'>
                                                <label>Rua : <span>{{$item->end_rua}} N° {{$item->end_nun_casa}}</span></label>
                                            </div>
                                            <div class='col-md-6'>
                                                @if($item->end_bairro)
                                                <label>Bairro : <span>{{$item->end_bairro}}</span></label>
                                                @endif
                                            </div>
                                        </div>
                                        <div class='row'>
                                            <div class='col-md-6'>
                                                <label>Cidade : <span>{{$item->end_cidade}}</span></label>
                                            </div>
                                            <div class='col-md-6'>
                                                @if($item->end_estado)
                                                    <label>Estado : <span>{{$item->end_estado}} - <label>CEP:</label> {{$item->cep}}</span></label>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="sombraBotao iconeModalMaisInfo"><a href=""><i class="fas fa-edit"></i></a></button>
                                    <button type="button" class="sombraBotao" data-dismiss="modal">Fechar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </tbody>
            </table>  
           </div>
       </div> 
       <!--paginacao-->
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