@extends('layouts.app')
@section('content')
  <div class="container">
        <div class="row">
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
                      <tr>
                          <td>33</td>
                          <td>Hemograma</td>
                          <td>22/05/2010</td>
                          <td>Rafael Silva</td>
                          <td><i class="fas fa-cloud-upload-alt"></i></td>
                      </tr>
                      <tr>
                          <td>33</td>
                          <td>Hemograma</td>
                          <td>22/05/2010</td>
                          <td>Rafael Silva</td>
                          <td><i class="fas fa-cloud-upload-alt"></i></td>
                      </tr>
                      <tr>
                          <td>33</td>
                          <td>Hemograma</td>
                          <td>22/05/2010</td>
                          <td>Rafael Silva</td>
                          <td><i class="fas fa-cloud-upload-alt"></i></td>
                      </tr>
                      <tr>
                        <td>33</td>
                        <td>Hemograma</td>
                        <td>22/05/2010</td>
                        <td>Rafael Silva</td>
                        <td><i class="fas fa-cloud-upload-alt"></i></td>
                      </tr>
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
@endsection