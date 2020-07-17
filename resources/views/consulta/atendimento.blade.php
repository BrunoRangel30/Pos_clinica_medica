@extends('layouts.app')
<style>

  .botao-hj button{
      margin-top: 30px;
  }

  .icone i {
      padding: 5px;
      font-size: 1.5em;
  }
</style>
@section('content')
    <div class="container">
        
        
        <!-- <div class="form-row">
            <div class="col-md-2 botao-hj">
                <button type="text" class="form-control" id="validationCustom01" placeholder="Nome" value="" required>Hoje</button>
            </div>
            <div class="col-md-4 mb-3">
                <label for="validationCustom01">Data Inicial</label>
                <input type="text" class="form-control" id="validationCustom01" placeholder="Nome" value="" required>
                <div class="valid-feedback">
                    Tudo certo!
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <label for="validationCustom01">Data Fim</label>
                <input type="text" class="form-control" id="validationCustom01" placeholder="Nome" value="" required>
                <div class="valid-feedback">
                    Tudo certo!
                </div>
            </div>
        </div>-->
    <div class="row">
        <div class="col-lg-12">
            @if(isset($agenda))
                <h3 class="text-center mb-3">Listagem de Pacientes</h3>
                <table id="example" class="icone table shadow p-3 mb-5 table-bordered table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Horário</th>
                            <th>Nome do Paciente</th>
                            <th>CPF</th>
                            <th>Data Nascimento</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                    @inject('consulta', 'App\Consulta')
                    @foreach ($agenda as $item)
                        <tr>
                            <td>{{$item->nomePaciente}}</td>
                            <td>{{$item->start}} - {{$item->end}}</td>
                            <td>{{$item->cpf}}</td>
                            @php
                                $date = date_create(date($item->data_nasc));
                                $dataAtual = date_format($date, 'd/m/Y');  
                            @endphp
                            <td>{{$dataAtual}}</td>
                        
                            <td>
                                <a href={{route('realizarConsulta',['pa'=>$item->paciente_id])}}><i class="far fa-play-circle"></i></a>
                                @if($consulta->possuiConsulta($item->fk_paciente)->total > 0)
                                    <a data-toggle="modal" data-target="#consulta-{{$item->fk_paciente}}"><i class="far fa-eye"></i></a>
                                @endif
                            </td>
                            
                        </tr>
                        <div class="modal fade" id="consulta-{{$item->fk_paciente}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                </div>
                                <div class="modal-body">
                                    @if(sizeof($consulta->getExamePaciente($item->fk_paciente))!==0)
                                        <div>
                                            <h4>Exames solicitados</h4>
                                            <ul>
                                                @foreach ($consulta->getExamePaciente($item->fk_paciente) as $key)
                                                    <h5>Data da consulta {{$key->created_at}}</h5>
                                                    <hr/>
                                                    @foreach ($consulta->nomeExame($key->fk_consulta) as $j)
                                                        <li>{{$j->exame}}</li>
                                                    @endforeach
                                                    <hr/>
                                                    <a target="_blank" href={{route('pdfExame',['idConsulta'=>$key->fk_consulta])}}><button type="button" class="btn btn-primary">Imprimir</button></a>
                                                @endforeach
                                            </ul>
                                        </div>
                                        <hr/>
                                    @endif
                                    @if(sizeof($consulta->getReceitaPaciente($item->fk_paciente))!==0)
                                        <div>
                                            <h4>Receitas</h4>
                                            <ul>
                                                @foreach ($consulta->getReceitaPaciente($item->fk_paciente) as $item)
                                                    <li>Nome Medicamento: {{$item->nome_fabrica}}</li>
                                                    <li>Quantidade: {{$item->qtd}}</li>
                                                    <li>Unidade: {{$item->unidade}}</li>
                                                    <li>Via: {{$item->via}}</li>
                                                    <li>Procedimento: {{$item->procedimento}}</li>
                                                    <a target="_blank" href={{route('pdfReceita',['idConsulta'=>$item->id])}}><button type="button" class="btn btn-primary">Imprimir</button></a>
                                                    <hr/>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                </div>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                </div>
                            </div>
                            </div>
                        </div>
                    @endforeach
                    </tbody>
                </table>
            @else
                <div class="alert alert-danger" role="alert">
                    Nenhuma consulta agendada!
                </div>
            @endif  
        </div>
    </div> 
     <!--  <nav aria-label="Page navigation example">
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
    
   
  
@endsection

 <script>
   function consultaAtendimento(){
         getDataAjax(url, data) 
   }
</script>
    
