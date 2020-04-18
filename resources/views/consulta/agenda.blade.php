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
    <div class='container'>
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
        </div>
        <!-------------Calendario--------------->
        <div id='wrap'>
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
            <form>
              <div class="form-group">
                <label for="nomePaciente" class="col-form-label">Nome do Paciente</label>
                <input type="text" class="form-control" id="nomePaciente">
              </div>
              <div class="form-group">
                <label for="hora-inicial" class="col-form-label">Inicio da Consulta</label>
                <input type="text" class="form-control" id="hora-inicial">
              </div>
              <div class="form-group">
                <label for="fim-consulta" class="col-form-label">Fim da Consulta</label>
                <input type="text" class="form-control" id="fim-consulta">
              </div>
              <div class="form-group">
                <label for="tipo-consulta" value="">Tipo da Consulta</label>
                  <select id="tipo-consulta" class="form-control" >
                    <option>Primeira Consulta</option>
                    <option>Retorno</option>
                  </select>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Salvar</button>
            <button type="button" class="btn btn-primary">Excluir</button>
          </div>
        </div>
      </div>
    </div>
@endsection

