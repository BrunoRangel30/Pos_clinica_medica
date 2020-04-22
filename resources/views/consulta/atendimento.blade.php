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
        
    <h3 class="text-center">Listagem de Pacientes</h3>
    <div class="container">
      
        <div class="form-row">
            <div class="col-md-2 botao-hj">
                <button type="text" class="form-control" id="validationCustom01" placeholder="Nome" value="" required>Hoje</button>
              </div>
            <div class="col-md-4 mb-3">
                <label for="validationCustom01">Data Inicial</label>
                <input type="text" class="form-control" id="validationCustom01" placeholder="Nome" value="" required>
                <!--<div class="valid-feedback">
                  Tudo certo!
                </div>-->
              </div>
            <div class="col-md-4 mb-3">
                <label for="validationCustom01">Data Fim</label>
                <input type="text" class="form-control" id="validationCustom01" placeholder="Nome" value="" required>
                <!--<div class="valid-feedback">
                  Tudo certo!
                </div>-->
            </div>
        </div>
       <div class="row">
           <div class="col-lg-12">
            <table id="example" class="icone table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Cod. Paciente</th>
                        <th>Horário</th>
                        <th>Nome do Paciente</th>
                        <th>CPF</th>
                        <th>Data Nascimento</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Sonya Frost</td>
                        <td>09:30 - 10:00</td>
                        <td>Software Engineer</td>
                        <td>Edinburgh</td>
                        <td>23</td>
                        <td>
                            <i class="far fa-play-circle"></i>
                            <a href="{{route('consulta.receita.index')}}"><i class="fas fa-first-aid"></i></a>
                            <a href="{{route('consulta.exame.index')}}"><i class="fas fa-file-medical-alt"></i></a>
                            <a href="{{route('exame.index.index')}}"><i class="fas fa-file-medical"></i></a>
                            <i class="far fa-hourglass"></i>
                        </td>
                    </tr>
                    <tr>
                        <td>Jena Gaines</td>
                        <td>10:30 - 10:00</td>
                        <td>Office Manager</td>
                        <td>London</td>
                        <td>30</td>
                        <td>
                            <i class="far fa-play-circle"></i>
                            <i class="fas fa-first-aid"></i>
                            <i class="fas fa-file-medical-alt"></i>
                            <i class="fas fa-file-medical"></i>
                            <i class="far fa-hourglass"></i>
                        </td>
                    </tr>
                    <tr>
                        <td>Quinn Flynn</td>
                        <td>11:30 - 10:00</td>
                        <td>Support Lead</td>
                        <td>Edinburgh</td>
                        <td>22</td>
                        <td>
                            <i class="far fa-play-circle"></i>
                            <i class="fas fa-first-aid"></i>
                            <i class="fas fa-file-medical-alt"></i>
                            <i class="fas fa-file-medical"></i>
                            <i class="far fa-hourglass"></i>
                        </td>
                    </tr>
                    <tr>
                        <td>Charde Marshall</td>
                        <td>11:30 - 10:00</td>
                        <td>Regional Director</td>
                        <td>San Francisco</td>
                        <td>36</td>
                        <td>
                            <i class="far fa-play-circle"></i>
                            <i class="fas fa-first-aid"></i>
                            <i class="fas fa-file-medical-alt"></i>
                            <i class="fas fa-file-medical"></i>
                            <i class="far fa-hourglass"></i>
                        </td>
                    </tr>
                    <tr>
                        <td>Haley Kennedy</td>
                        <td>11:30 - 10:00</td>
                        <td>Senior Marketing Designer</td>
                        <td>London</td>
                        <td>43</td>
                        <td>
                            <i class="far fa-play-circle"></i>
                            <i class="fas fa-first-aid"></i>
                            <i class="fas fa-file-medical-alt"></i>
                            <i class="fas fa-file-medical"></i>
                            <i class="far fa-hourglass"></i>
                        </td>
                    </tr>
                    <tr>
                        <td>Tatyana Fitzpatrick</td>
                        <td>11:30 - 10:00</td>
                        <td>Regional Director</td>
                        <td>London</td>
                        <td>19</td>
                        <td>
                            <i class="far fa-play-circle"></i>
                            <i class="fas fa-first-aid"></i>
                            <i class="fas fa-file-medical-alt"></i>
                            <i class="fas fa-file-medical"></i>
                            <i class="far fa-hourglass"></i>
                        </td>
                    </tr>
                    <tr>
                        <td>Michael Silva</td>
                        <td>11:30 - 10:00</td>
                        <td>Marketing Designer</td>
                        <td>London</td>
                        <td>66</td>
                        <td>
                            <i class="far fa-play-circle"></i>
                            <i class="fas fa-first-aid"></i>
                            <i class="fas fa-file-medical-alt"></i>
                            <i class="fas fa-file-medical"></i>
                            <i class="far fa-hourglass"></i>
                        </td>
                    </tr>
                    <tr>
                        <td>Paul Byrd</td>
                        <td>11:30 - 10:00</td>
                        <td>Chief Financial Officer (CFO)</td>
                        <td>New York</td>
                        <td>64</td>
                        <td>
                            <i class="far fa-play-circle"></i>
                            <i class="fas fa-first-aid"></i>
                            <i class="fas fa-file-medical-alt"></i>
                            <i class="fas fa-file-medical"></i>
                            <i class="far fa-hourglass"></i>
                        </td>
                    </tr>
                    <tr>
                        <td>Gloria Little</td>
                        <td>11:30 - 10:00</td>
                        <td>Systems Administrator</td>
                        <td>New York</td>
                        <td>59</td>
                        <td>
                            <i class="far fa-play-circle"></i>
                            <i class="fas fa-first-aid"></i>
                            <i class="fas fa-file-medical-alt"></i>
                            <i class="fas fa-file-medical"></i>
                            <i class="far fa-hourglass"></i>
                        </td>
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
@push('scripts')
 <script>
   
</script>
    
@endpush