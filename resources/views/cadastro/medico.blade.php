@extends('layouts.app')

@section('content')
    <div class='container'>
        <div class='row'>
            <div class='col-md-6'>
                <h4> Cadastro Médico </h4>
            </div>
        </div>
        <form>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="nomePaciente">Nome Completo</label>
                <input type="text" class="form-control" id="nomePaciente" placeholder="">
              </div>
              <div class="form-group col-md-2">
                <label for="idSexo" value="">Sexo</label>
                <select id="idSexo" class="form-control" >
                  <option>Feminino</option>
                  <option>Masculino</option>
                </select>
              </div>
              <div class="form-group col-md-1">
                <label for="idRg">Nº Conselho</label>
                <input type="text" class="form-control" id="idRg" placeholder="">
              </div>
              <div class="form-group col-md-1">
                <label for="idRg">N° do RG</label>
                <input type="text" class="form-control" id="idRg" placeholder="">
              </div>
              <div class="form-group col-md-2">
                <label for="idRg">Órgão emissor</label>
                <input type="text" class="form-control" id="idRg" placeholder="">
              </div>
            </div>
            <div class='form-row'>
                <div class="form-group col-md-3">
                    <label for="idCPF">CPF</label>
                    <input type="text" class="form-control" id="idCPF" placeholder="">
                </div>
                <div class="form-group col-md-3">
                    <label for="idNascimento">Data de Nascimento</label>
                    <input type="date" class="form-control" id="idNascimento" placeholder="">
                </div>
                <div class="form-group col-md-3">
                    <label for="idEmail">Email</label>
                    <input type="email" class="form-control" id="idEmail" placeholder="">
                </div>
                <div class="form-group col-md-3">
                    <label for="idCel">Telefone Celular</label>
                    <input type="" class="form-control" id="idCel" placeholder="">
                </div>
            </div>
            <div class='form-row'>
                <div class="form-group col-md-3">
                    <label for="idFixo">Telefone residencial</label>
                    <input type="" class="form-control" id="idFixo" placeholder="">
                </div>
                <div class="form-group col-md-3">
                <label for="idSexo" value="">Especialidade</label>
                    <select id="idSexo" class="form-control" >
                      <option>Cardiologia</option>
                      <option>Cirurgia geral</option>
                      <option>Dermatologia</option>
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="idSexo" value="">Especialidade Secundária</label>
                    <select id="idSexo" class="form-control" >
                      <option>Cardiologia</option>
                      <option>Dermatologia</option>
                    </select>
                </div>
            </div>
            <div class='row'>
                <div class='col-md-6'>
                    <label> Endereço </label>
                </div>
            </div>
            <div class='form-row'>
                <div class="form-group col-md-3">
                    <label for="idRua">Rua</label>
                    <input type="text" class="form-control" id="idRua" placeholder="">
                </div>
                <div class="form-group col-md-2">
                    <label for="idNum">N°</label>
                    <input type="" class="form-control" id="idNum" placeholder="">
                </div>
                <div class="form-group col-md-3">
                    <label for="idBairro">Bairro</label>
                    <input type="text" class="form-control" id="idBairro" placeholder="">
                </div>
                <div class="form-group col-md-3">
                    <label for="idCidade">Cidade</label>
                    <input type="text" class="form-control" id="idCidade" placeholder="">
                </div>
                <div class="form-group col-md-3">
                    <label for="idEstado">Estado</label>
                    <input type="" class="form-control" id="idEstado" placeholder="">
                </div>
                <div class="form-group col-md-2">
                    <label for="idCep">Cep</label>
                    <input type="text" class="form-control" id="idCep" placeholder="">
                </div>
            </div>
            <div class='form-row'>
                <div class="form-group col-md-10">
                    <label for="idObservacao">Obervação</label>
                    <textarea  type="textArea" class="form-control" id="idObservacao" placeholder=""></textarea>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
    </div>
@endsection