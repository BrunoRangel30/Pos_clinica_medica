<div class='container'>  
    <ul class="nav">
        <li class="nav-item">
           
            <a id='inserirResultadosExames' class="nav-link"><i class="fas fa-file-medical"></i>inserir Resultados</a>
          
        </li>
        <li>
           
            <a id='VisualizarResultadosExames' class="nav-link" ><i class="fas fa-file-medical"></i>Visualizar Resultados</a>
            
        </li>
    </ul>    
    <div class='row'>
        <form action="{{route('uploadResultados')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="col-lg-12">
                <table id="example" class="icone  table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Cod. Exame</th>
                            <th>Nome do exame</th>
                            <th>Data da solicitação</th>
                            <th>Médico solicitante</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <div class='resultado_exame'>
                            <input name='fk_paciente_exame' id='fk_paciente_exame'  type="hidden">
                        </div>
                        @inject('exame', 'App\resultado_exames')
                        @php
                             $exibirExame = false
                        @endphp
                        @foreach ($exames as $item)
                             @if($exame->possuiExameCadastrado($item->exame_id,$item->id)->totalExame == 0 && $exame->possuiExameCadastrado($item->exame_id,$item->id)->totalConsulta == 0)
                                @php
                                    $exibirExame = true
                                @endphp
                                <tr>
                                    <td>{{$item->exame_id}}</td>
                                    <input name='id[]' value='{{$item->exame_id}}' type="hidden">
                                    <td>{{$item->nome_exame}}</td>
                                    <input name='consulta[]' value='{{$item->id}}' type="hidden">
                                    <input name='fk_medico' value='{{$item->fk_medico}}' type="hidden">
                                    <td>{{$item->dataSolici}}</td>
                                    <td>{{$item->medico}}</td>
                                    <td>   
                                        <input name='exames[]' type="file" id="exampleFormControlFile1">
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>  
            </div>
            @if($exibirExame)
                <button type="submit" class="btn btn-primary">Salvar Arquivos</button>
            @else
            <div class="alert alert-danger" role="alert">
               Sem resultados para serem inseridos!
            </div>
            @endif
        </form>
    </div>
</div>