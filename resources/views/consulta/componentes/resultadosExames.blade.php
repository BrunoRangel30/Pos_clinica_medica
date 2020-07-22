<style>
      input[type=file]::-webkit-file-upload-button {
            padding-left:15px;
            padding-right: 15px;
            padding-top: 5px;
            padding-bottom: 5px;
            border: solid 1px #183153;
            border-radius: 8px;
            background-color:#ffd43b;
            color: #214450;
            /* font-family: 'roundproblackegular'; /* fonte */
            font-weight: 700;
            font-size: 1em;
            /* text-transform: uppercase;*/
           
     }
</style>
<div class='container'>
    <div class='bordaGeral border-bottom rounded-bottom pt-5'>  
        <ul class="nav MenuConsulta">
            <li class="nav-item">
                <a id='inserirResultadosExames' class="nav-link"> <i class="fas fa-file-medical"></i> Inserir Resultados</a>
            </li>
            <li>
                <a id='VisualizarResultadosExames' class="nav-link" > <i class="fas fa-file-medical"></i> Visualizar Resultados</a>
            </li>
        </ul>  
    </div>
    <label class='subTitulomaisInfo pt-3 pb-3'>Paciente: {{$paciente->nome}}</label>
    <div class='row'>
        <form action="{{route('uploadResultados')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="col-lg-12">
                @inject('exame', 'App\resultado_exames')
                <table id="example" class="icone table  table-bordered shadow p-3 mb-5 table-bordered" style="width:100%">
                    <tbody>
                        <div class='resultado_exame'>
                            <input name='fk_paciente_exame' id='fk_paciente_exame'  type="hidden">
                        </div>
                        @php
                             $exibirExame = false;
                        @endphp
                        <thead>
                            <tr>
                                <th>Cod. Exame</th>
                                <th>Nome do exame</th>
                                <th>Data da solicitação</th>
                                <th>Médico solicitante</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        @foreach ($exames as $item)
                            @if($exame->possuiExameCadastrado($item->exame_id,$item->id)->totalExame == 0 && $exame->possuiExameCadastrado($item->exame_id,$item->id)->totalConsulta == 0)
                                @php
                                    $exibirExame = true;
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
                                        <input  name='exames[]' type="file" id="exampleFormControlFile1">
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>  
            </div>
            @if($exibirExame)
                <button type="submit" class="sombraBotao">Salvar Arquivos</button>
            @else
                <div class="alert alert-danger semExames" role="alert">
                    Sem exames para serem inseridos!
                </div>
            @endif
        </form>
    </div>
</div>