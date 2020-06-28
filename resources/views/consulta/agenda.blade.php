@extends('layouts.app')


<style>

    body {
      margin-top: 40px;
      font-size: 14px;
      font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
    }
  
    @font-face {
        font-family: 'TypeMatesCeraRoundProMedium';
        src: local('assets/Fonte/TypeMatesCeraRoundProMedium.woff');
    }

    @font-face {
        font-family: 'HelveticaNeueBold';
        src: local('assets/Fonte/HelveticaNeueBold.woff');
    }

  
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

    .success {
        color: #3c763d;
        background-color: #dff0d8;
        border-color: #d6e9c6;
        display: none;
    }
    .success-cadastro{
        color: #3c763d;
        background-color: #dff0d8;
        border-color: #d6e9c6;
        display: none;
    }

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
    .resultadoMedicos{
      border: solid 1px #183153;
      border-radius: 8px;
      display:none;
    }
    .cssCustomCalendar .fc-time-grid-event .fc-time, .fc-time-grid-event .fc-title {
        color:white;
        font-size:1.2em;
        padding:2px;
       /*font-family: 'TypeMatesCeraRoundProMedium', "HelveticaNeueBold"*/  
    }
    
    .bordaPesq .col-md-6{
       padding-left: 0px !important;
       padding-right: 0px !important;
    }
    .resultadoMedicos #resultMed ul li{
        list-style-type: none;
        padding-top: 2px;
    }
    .resultadoMedicos #resultMed ul li i{
        font-size:9px;
    }
    .resultadoMedicos #resultMed ul{
        padding: 0px;
    }
    .titulosPesquisas h4{
        color: #183153;
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
        <div class='row mb-5'>
            <div class="alert-box success col-md-6">Consulta excluída com sucesso!</div>
        </div>
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
                     <h5 class="modal-title" id="tituloAgenda">Agendar uma Consulta</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                          <span aria-hidden="true">&times;</span>
                     </button>
                </div>
                <div class="modal-body">
                    <form class='formAgenda'>
                        <div class="form-group">
                            <div class='row'>
                              <div class="col-md-12" id='messagem'></div>
                            </div>
                            <div class='row'>
                              <div class="col-md-12" id='sucess'></div>
                            </div>
                            <h5>Selecione o Paciente</h5>
                            <div id="custom-search-input">
                                <div class="input-group col-md-12" id="inputPesqPac">
                                    <input name='nome' type="text"  class="form-control input-lg searchPacEdicao" placeholder="Buscar" />
                                    <span class="input-group-btn">
                                        <button class="btn btn-info btn-lg" type="button">
                                        </button>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class='row'>
                            <div class='col-md-12'>
                              <div class="resulPacEdicao"></div>
                            </div>
                        </div>
                        <input type="hidden" name='fk_paciente'class="form-control">
                        <input type="hidden" name='fk_medico'class="form-control">
                        <input type="hidden" name='id_agenda'class="form-control">
                        <div class="form-group">
                            <label for="hora-inicial" class="col-form-label">Inicio da Consulta</label>
                            <input type="text" name='inicio'class="form-control date-time" id="hora-inicial">
                        </div>
                        <div class="form-group">
                            <label for="fim-consulta" class="col-form-label">Fim da Consulta</label>
                            <input type="text" name='fim' class="form-control date-time" id="fim-consulta">
                        </div>
                        <div class="form-group">
                            <label for="tipo-consulta" value="">Tipo da Consulta</label>
                             <select name='tipo' id="tipo-consulta" class="form-control" >
                                <option>Primeira Consulta</option>
                                <option>Retorno</option>
                              </select>
                        </div>
                    </form>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button type="button" class="btn btn-primary saveConsulta">Salvar</button>
                  </div>
            </div>
        </div>
    </div>
     <!--ModalEdicao-->
     <div class="modal fade" id="modalAgendaEdicao" tabindex="-1" role="dialog" aria-labelledby="tituloAgenda" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                   <h5 class="modal-title" id="tituloAgenda">Remarcar uma Consulta</h5>
                   <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                   </button>
              </div>
              <div class="modal-body">
                  <form class='formAgenda'>
                      <div class="form-group">
                          <div class='row'>
                            <div class="col-md-12" id='messagemEdicao'></div>
                          </div>
                          <div class='row'>
                            <div class="col-md-12" id='sucessEdicao'></div>
                          </div>
                          <h5>Selecione o Paciente</h5>
                          <div id="custom-search-input">
                              <div class="input-group col-md-12" id="inputPesqPac">
                                  <input name='nome' type="text"   class="form-control input-lg searchPac" placeholder="Buscar" />
                                  <span class="input-group-btn">
                                      <button class="btn btn-info btn-lg" type="button">
                                      </button>
                                  </span>
                              </div>
                          </div>
                      </div>
                      <div class='row'>
                          <div class='col-md-12'>
                            <div class="resulPac"></div>
                          </div>
                      </div>
                      <input type="hidden" name='fk_paciente'class="form-control">
                      <input type="hidden" name='fk_medico'class="form-control">
                      <input type="hidden" name='id_agenda'class="form-control">
                      <div class="form-group">
                          <label for="hora-inicial" class="col-form-label">Inicio da Consulta</label>
                          <input type="text" name='inicio'class="form-control date-time" id="hora-inicial">
                      </div>
                      <div class="form-group">
                          <label for="fim-consulta" class="col-form-label">Fim da Consulta</label>
                          <input type="text" name='fim' class="form-control date-time" id="fim-consulta">
                      </div>
                      <div class="form-group">
                          <label for="tipo-consulta" value="">Tipo da Consulta</label>
                           <select name='tipo' id="tipo-consulta" class="form-control" >
                              <option>Primeira Consulta</option>
                              <option>Retorno</option>
                            </select>
                      </div>
                  </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                  <button type="button" class="btn btn-primary atualizarConsulta">Atualizar</button>
                  <button type="button"  id="excluirAgenda" class="btn btn-warning">Excluir</button>
                </div>
          </div>
      </div>
  </div>
@endsection







