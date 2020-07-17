@extends('layouts.app')
<style>

  #resultExames{
     height:200px;
     overflow-y: scroll;
     display: none;
     border: solid 1px #183153;
     border-radius: 10px; 
   }

  #resultExames::-webkit-scrollbar-track {
     background-color:  #f0f1f3;
     border: solid 1px #183153;
  }

  #resultExames::-webkit-scrollbar {
     width: 6px;
     background: #F4F4F4;
  }
  #resultExames::-webkit-scrollbar-thumb {
    background:  #183153;
  }
  #examesSelect::-webkit-scrollbar-track {
     background-color:  #f0f1f3;
     border: solid 1px #183153;
  }
  #examesSelect::-webkit-scrollbar {
     width: 6px;
     background: #F4F4F4;
  }
  #examesSelect::-webkit-scrollbar-thumb {
    background:  #183153;
  }

  #resultExames ul li {
     list-style-type: none;
     padding-top: 5px;
     padding-left: 10px;
     font-size: 1.2em;
     color:  #183153;
     font-weight: 700;
     text-transform:lowercase;
     cursor:pointer;
  }

  #resultExames  ul {
     padding: 0px !important;
  }
  #examesSelect{
     border-width: medium;
     height: 231px;
     margin-left: 30px;
     width: 100%;
     border: solid 1px #183153;
     border-radius: 10px;
     display: none;
     overflow-y: scroll;
  }
  #examesSelect  li{
     list-style-type: none;
     padding-top: 5px;
     padding-left: 10px;
     font-size: 1.2em;
     color:  #183153;
     font-weight: 700;
     text-transform:lowercase;
     cursor: pointer;
  }
  #examesSelect  h4{
     color:  #183153;
     font-weight: 800;
     padding: 5px;

  }
  
</style>

@section('content')
    <div class='container'>
        <div class='row'>
            <div class='col-md-12 mb-3'>
                @component('consulta.componentes.dadosPaciente')@endcomponent
            </div>
        </div>
        <div class='row'>
            <div class='col-md-12 mb-3'>
                @component('consulta.componentes.menuConsulta')@endcomponent
            </div>
        </div>
        <form method="POST" action="{{route('consulta.exame.store')}}">
            @csrf
            <div class='row'>
                <div class="col-md-6 campo">
                    <label class="sr-only" for="pesquisaExame">Pesquise o exame</label>
                    <div class="input-group">
                        <div class="input-group-prepend iconePesquisa">
                            <div class="input-group-text"><i class="fas fa-search"></i></div>
                        </div>
                        <input type="text"  class="form-control" id="pesquisaExame" placeholder="Pesquise o exame">
                        </div> 
                        <div class='row'>
                            <div class='col-md-12'>
                                <div id ="resultExames"></div>
                            </div>
                        </div>
                    </div>
                <div class='row' id='examesrequest'>
                    <div class='col-md-12' id="examesSelect">
                    </div>
                </div>
            </div>
            <div id='salvarExame'>
               <button type="submit" class="sombraBotao mt-5">Finalizar Seleção</button>
            </div>
        </form>
@endsection