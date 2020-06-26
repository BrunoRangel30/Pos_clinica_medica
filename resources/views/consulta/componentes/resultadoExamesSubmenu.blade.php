<div class="container">
    <ul class="nav">
        <li class="nav-item">
           
            <a id='inserirResultadosExames' class="nav-link"><i class="fas fa-file-medical"></i>inserir Resultados</a>
          
        </li>
        <li>
           
            <a id='VisualizarResultadosExames' class="nav-link" ><i class="fas fa-file-medical"></i>Visualizar Resultados</a>
            
        </li>
    </ul> 
    <div class="row">
       <div class="col-lg-12">
        <table id="example" class="icone table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>Nome do Exame</th>
                    <th>Medico que inseriu o resultado do Exame</th>
                    <th>Data da Inclusão</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($resultado as $item)
                    <tr>
                        <td>{{$item->nome_exame}}</td>
                        <td>{{$item->medico}} - {{$item->crm}}</td>
                        <td>{{$item->dataInclusao}}</td>
                        <td>
                        <a target='_blank' href="{{ENV('APP_URL')}}/storage/{{$item->link}}"><i class="fas fa-file-pdf"></i></a>
                            <i class="fas fa-edit"></i>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>  
       </div>
   </div> 
   <nav aria-label="Page navigation example">
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
    </nav>
</div>