<form>
     <div class='container'>       
        <div class='row'>
            <div class="col-lg-12">
                <table id="example" class="icone table table-striped table-bordered" style="width:100%">
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
                        @foreach ($exames as $item)
                        <tr>
                            <td>{{$item->exame_id}}</td>
                            <td>{{$item->nome_exame}}</td>
                            <td>{{$item->dataSolici}}</td>
                            <td>{{$item->medico}}</td>
                            <td>
                              
                                 
                                  <input type="file" id="exampleFormControlFile1">
                                
                              
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>  
            </div>
        </div>
    </div>
</form>