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
        <div class="row mb-5">
            <div class="col-md-6">
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
                    <i class="fas fa-user-plus"></i>
                </div>
            </div>
        </div>
       <div class="row">
           <div class="col-lg-12">
            <table id="example" class="icone table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Nome do Paciente</th>
                        <th>CPF</th>
                        <th>Data Nascimento</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Dafine de Castro</td>
                        <td>834-334-3434-23</td>
                        <td>23/03/1986</td>
                        <td>
                            <a href="{{route('realizarConsulta')}}"><i class="fas fa-edit"></i></a>
                            <i class="fas fa-user-times"></i>
                        </td>
                    </tr>
                    <tr>
                        <td>Dafine de Castro</td>
                        <td>834-334-3434-23</td>
                        <td>23/03/1986</td>
                        <td>
                            <i class="fas fa-edit"></i>
                            <i class="fas fa-user-times"></i>
                        </td>
                    </tr>
                    <tr>
                        <td>Quinn Flynn</td>
                        <td>112-345-2324-45</td>
                        <td>223/11/1984</td>
                        <td>
                            <i class="fas fa-edit"></i>
                            <i class="fas fa-user-times"></i>
                        </td>
                    </tr>
                    <tr>
                        <td>Charde Marshall</td>
                        <td>457-234-234-56</td>
                        <td>31/05/1957</td>
                        <td>
                            <i class="fas fa-edit"></i>
                            <i class="fas fa-user-times"></i>
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