@extends('layouts.app')
<style>

  .botao-hj button{
      margin-top: 30px;
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
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Cod. Paciente</th>
                        <th>Nome</th>
                        <th>CPF</th>
                        <th>Data Nascimento</th>
                        <th>Ações</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Tiger Nixon</td>
                        <td>System Architect</td>
                        <td>Edinburgh</td>
                        <td>61</td>
                        <td>
                            <i class="far fa-play-circle"></i>
                            <i class="fas fa-first-aid"></i>
                            <i class="fas fa-file-medical-alt"></i>
                            <i class="fas fa-file-medical"></i>
                            <i class="far fa-hourglass"></i>
                        </td>
                        
                    </tr>
                    <tr>
                        <td>Garrett Winters</td>
                        <td>Accountant</td>
                        <td>Tokyo</td>
                        <td>63</td>
                        <td>
                            <i class="far fa-play-circle"></i>
                            <i class="fas fa-first-aid"></i>
                            <i class="fas fa-file-medical-alt"></i>
                            <i class="fas fa-file-medical"></i>
                            <i class="far fa-hourglass"></i>
                        </td>
                        
                    </tr>
                    <tr>
                        <td>Ashton Cox</td>
                        <td>Junior Technical Author</td>
                        <td>San Francisco</td>
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
                        <td>Cedric Kelly</td>
                        <td>Senior Javascript Developer</td>
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
                        <td>Airi Satou</td>
                        <td>Accountant</td>
                        <td>Tokyo</td>
                        <td>33</td>
                        <td>
                            <i class="far fa-play-circle"></i>
                            <i class="fas fa-first-aid"></i>
                            <i class="fas fa-file-medical-alt"></i>
                            <i class="fas fa-file-medical"></i>
                            <i class="far fa-hourglass"></i>
                        </td>
                        
                    </tr>
                    <tr>
                        <td>Brielle Williamson</td>
                        <td>Integration Specialist</td>
                        <td>New York</td>
                        <td>61</td>
                        <td>
                            <i class="far fa-play-circle"></i>
                            <i class="fas fa-first-aid"></i>
                            <i class="fas fa-file-medical-alt"></i>
                            <i class="fas fa-file-medical"></i>
                            <i class="far fa-hourglass"></i>
                        </td>
                       
                        
                    </tr>
                    <tr>
                        <td>Herrod Chandler</td>
                        <td>Sales Assistant</td>
                        <td>San Francisco</td>
                        <td>59</td>
                        <td>
                            <i class="far fa-play-circle"></i>
                            <i class="fas fa-first-aid"></i>
                            <i class="fas fa-file-medical-alt"></i>
                            <i class="fas fa-file-medical"></i>
                            <i class="far fa-hourglass"></i>
                        </td>
                       
                        
                    </tr>
                    <tr>
                        <td>Rhona Davidson</td>
                        <td>Integration Specialist</td>
                        <td>Tokyo</td>
                        <td>55</td>
                        <td>
                            <i class="far fa-play-circle"></i>
                            <i class="fas fa-first-aid"></i>
                            <i class="fas fa-file-medical-alt"></i>
                            <i class="fas fa-file-medical"></i>
                            <i class="far fa-hourglass"></i>
                        </td>
                        
                        
                    </tr>
                    <tr>
                        <td>Colleen Hurst</td>
                        <td>Javascript Developer</td>
                        <td>San Francisco</td>
                        <td>39</td>
                        <td>
                            <i class="far fa-play-circle"></i>
                            <i class="fas fa-first-aid"></i>
                            <i class="fas fa-file-medical-alt"></i>
                            <i class="fas fa-file-medical"></i>
                            <i class="far fa-hourglass"></i>
                        </td>
                       
                    </tr>
                    <tr>
                        <td>Sonya Frost</td>
                        <td>Software Engineer</td>
                        <td>Edinburgh</td>
                        <td>23</td>
                        <td>
                            <i class="far fa-play-circle"></i>
                            <i class="fas fa-first-aid"></i>
                            <i class="fas fa-file-medical-alt"></i>
                            <i class="fas fa-file-medical"></i>
                            <i class="far fa-hourglass"></i>
                        </td>
                       
                    </tr>
                    <tr>
                        <td>Jena Gaines</td>
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
    </div>
  
@endsection