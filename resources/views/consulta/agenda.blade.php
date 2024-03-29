@extends('layouts.app')


<style>

   /* body {
      margin-top: 40px;
      font-size: 14px;
      font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
    }*/
  
  @font-face {
      font-family: 'roundproblackegular';
      src: local('assets/Fonte/roundproblackegular.ttf');
  }

    /*#external-events {
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
    }*/

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

   /* #custom-search-input button:hover{
        border: 0;
        box-shadow: none;
        border-left: solid 1px #ccc;
    }

    #custom-search-input .glyphicon-search{
        font-size: 23px;
    }*/

  .success {
      color: #3c763d;
      background-color: #dff0d8;
      border-color: #d6e9c6;
      text-align: center;
      padding: 10px;
      font-size: 1em;
      font-weight: 700;
      display: none;
      position: absolute;
  }
  .success-cadastro{
      color: #3c763d;
      background-color: #dff0d8;
      border-color: #d6e9c6;
      display: none;
  }
  /*configurações do calendario*/
  .cssCustomCalendar .fc-time-grid .fc-slats td{
      height: 4.5em;
      padding:2px;
       /* background-color: #183153;*/
       
  }
  .cssCustomCalendar .fc-content .fc-time{
      font-weight: bold;
  }

  .cssCustomCalendar .fc-unthemed td.fc-today {
      background: #63e6be6e;
  }

    /*CSS botão de pesquisa*/
  #custom-search-input{
      padding: 3px;
      border: solid 1px #183153;
      border-radius: 8px;
      background-color: #fff;
      color: #183153;
      -webkit-box-shadow: 0 0.375em 0 currentColor;
  }
  .cssCustomCalendar .fc-time-grid-event .fc-time, .fc-time-grid-event .fc-title {
      color:white;
      font-size:1.2em;
      padding:2px;
       /*font-family: 'TypeMatesCeraRoundProMedium', "HelveticaNeueBold"*/  
  }
  /*barra com resultados de pesquisa*/
  .resultadoMedicos{
      border: solid 1px #183153;
      border-radius: 8px;
      display:none;
  }
    
  .bordaPesq .col-md-6{
      padding-left: 0px !important;
      padding-right: 0px !important;
  }

  .resultadoMedicos #resultMed ul li{
      list-style-type: none;
      padding-top: 2px;
  }
   /*medicos*/
  .resultadoMedicos #resultMed ul li i{
      font-size:9px;
  }

  /*pacientes*/
  .resulPac  ul li i{
      font-size:9px !important;
  }
  .resulPacAdicao  ul li i{
      font-size:9px !important;
  }

  .resultadoMedicos #resultMed ul{
      padding: 0px;
  }

  .titulosPesquisas h4{
      color: #183153;
  }
  /*modal Agenda Insercao*/
  .modalCamposInsercao{
      z-index: 0;
      position: relative;
  }
  .modalCamposInsercaoAdicao{
      z-index: 0;
      position: relative;
  }
  .resulPac{
      z-index: 999999;
      position: absolute !important;
      border: solid 1px #183153;
      margin-left: 17px !important;
      display: none;
  }
  .resulPacAdicao{
      z-index: 999999;
      position: absolute !important;
      border: solid 1px #183153;
      margin-left: 17px !important;
      display: none;
  }

  .formAgendaSuperior .form-group{
      margin-bottom: 5px; 
  }
  .formAgendaSuperiorAdicao .form-group{
      margin-bottom: 5px; 
  }
 
  .resulPacAdicao ul li {
      padding: 0px;
      list-style-type: none;
  }
  .resulPac ul li {
      padding: 0px;
      list-style-type: none;
  }

  .resulPac ul{
      padding: 0px;
  }
  
  .resulPacAdicao ul{
      padding: 0px;
  }

    /*bordas formulario*/
  .bordas{
       border: solid 1px #183153 !important;
  }
  .subtitulosForm{
     color: #183153;
     font-weight: 500;
  }

  .TitulosForm{
     color: #183153;
     font-weight: 700;
  }

</style>
@section('content')
    <div class='container'>
        <div class="row mb-1 bordaPesq">
            <div class="col-md-6 titulosPesquisas">
                <h4>Pesquise o Médico</h4>
                <div id="custom-search-input">
                    <div class="input-group col-md-12" id="inputPesqMed">
                        <input type="text" name="pesquisaMedico" data-medico="" id="searchMed" class="form-control input-lg bordaBotao" placeholder="" />
                        <span class="input-group-btn">
                            <button class="btn btn-info btn-lg" type="button">
                            </button>
                        </span>
                    </div>
                </div>
            </div>
            <div class='row'>
              <div class='col-md-6' id="medicoSelect">
                <input type="hidden" id="fk_medico" name='fk_medico' />
              </div>
            </div>
        </div>
        <div class='row'>
          <div class='col-md-6 resultadoMedicos'>
            <div id='resultMed'></div>
          </div>
        </div>
        <!--espaços entre o resultado e o calendario-->
        <br>
        <br>
        <br>
        <div class='row'>
            <div class="alert-box success col-md-12">Consulta agendada com sucesso!</div>
        </div>
        <br>
        <br>
        <!-------------Calendario--------------->
        <div class='cssCustomCalendar' id='wrap'>
                <div id='external-events-list'></div>
                <div id='calendar'></div>
                <div style='clear:both'></div>
        </div>
    <div>
    <!--Modal-->
    <div class="modal fade" id="modalAgenda" tabindex="-1" role="dialog" aria-labelledby="tituloAgenda" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                     <h5 class="modal-title TitulosForm" id="tituloAgenda">Agendar uma Consulta</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                          <span aria-hidden="true">&times;</span>
                     </button>
                </div>
                <div class="modal-body formAgendaSuperiorAdicao">
                    <form class='formAgenda'>
                        <div class="form-group">
                            <div class='row'>
                              <div class="col-md-12" id='messagem'></div>
                            </div>
                            <div class='row'>
                              <div class="col-md-12" id='sucess'></div>
                            </div>
                            <label class='subtitulosForm'>Selecione o Paciente</label>
                            <div id="custom-search-input">
                                <div class="input-group col-md-12" id="inputPesqPac">
                                    <input name='nome' type="text"  class="form-control input-lg searchPacAdicao" placeholder="Buscar" />
                                    <span class="input-group-btn">
                                        <button class="btn btn-info btn-lg" type="button">
                                        </button>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class='row'>
                              <div class="col-md-11 shadow-sm  mb-5 bg-white rounded resulPacAdicao"></div>
                        </div>
                        <div class='modalCamposInsercaoAdicao'>
                            <input type="hidden" name='fk_paciente'class="form-control">
                            <input type="hidden" name='fk_medico'class="form-control">
                            <input type="hidden" name='id_agenda'class="form-control">
                              <div class="form-group">
                                  <label for="hora-inicial" class="col-form-label subtitulosForm">Inicio da Consulta</label>
                                  <input type="text" name='inicio'class="form-control date-time bordas" id="hora-inicial">
                              </div>
                              <div class="form-group">
                                  <label for="fim-consulta" class="col-form-label subtitulosForm">Fim da Consulta</label>
                                  <input type="text" name='fim' class="form-control date-time bordas" id="fim-consulta">
                              </div>
                              <div class="form-group">
                                  <label for="tipo-consulta" class="subtitulosForm" value="">Tipo da Consulta</label>
                                  <select name='tipo' id="tipo-consulta" class="form-control bordas" >
                                      <option>Primeira Consulta</option>
                                      <option>Retorno</option>
                                    </select>
                              </div>
                        </div>
                    </form>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="sombraBotao" data-dismiss="modal">Fechar</button>
                    <button type="button" class="sombraBotao saveConsulta">Salvar</button>
                  </div>
            </div>
        </div>
    </div>
     <!--ModalEdicao-->
     <div class="modal fade" id="modalAgendaEdicao" tabindex="-1" role="dialog" aria-labelledby="tituloAgenda" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                   <h5 class="modal-title TitulosForm" id="tituloAgenda">Remarcar uma Consulta</h5>
                   <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                   </button>
              </div>
              <div class="modal-body formAgendaSuperior">
                  <form class='formAgenda'>
                      <div class="form-group">
                          <div class='row'>
                            <div class="col-md-12" id='messagemEdicao'></div>
                          </div>
                          <div class='row'>
                            <div class="col-md-12" id='sucessEdicao'></div>
                          </div>
                          <label class='subtitulosForm'>Selecione o Paciente</label>
                          <div class='col-md-12'id="custom-search-input">
                              <div class="input-group" id="inputPesqPac">
                                  <input name='nome' type="text"   class="form-control input-lg searchPac" placeholder="Buscar" />
                                  <span class="input-group-btn">
                                      <button class="btn btn-info btn-lg" type="button">
                                      </button>
                                  </span>
                              </div>
                          </div>
                      </div>
                      <div class='row'>
                          <div class=" col-md-11 shadow-sm  mb-5 bg-white rounded resulPac"></div>
                      </div>
                      <div class='modalCamposInsercao'>
                        <input type="hidden" name='fk_paciente'class="form-control">
                        <input type="hidden" name='fk_medico'class="form-control">
                        <input type="hidden" name='id_agenda'class="form-control">
                        <div class="form-group">
                            <label for="hora-inicial" class="col-form-label subtitulosForm">Inicio da Consulta</label>
                            <input type="text" name='inicio'class="form-control date-time bordas" id="hora-inicial">
                        </div>
                        <div class="form-group">
                            <label for="fim-consulta" class="col-form-label subtitulosForm">Fim da Consulta</label>
                            <input type="text" name='fim' class="form-control date-time bordas" id="fim-consulta">
                        </div>
                        <div class="form-group">
                            <label for="tipo-consulta" class='subtitulosForm' value="">Tipo da Consulta</label>
                            <select name='tipo' id="tipo-consulta" class="form-control bordas" >
                                <option>Primeira Consulta</option>
                                <option>Retorno</option>
                              </select>
                        </div>
                    </div>
                  </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="sombraBotao" data-dismiss="modal">Fechar</button>
                  <button type="button" class="sombraBotao atualizarConsulta">Atualizar</button>
                  <button type="button"  id="excluirAgenda" class="sombraBotao">Excluir</button>
                </div>
          </div>
      </div>
  </div>
@endsection







