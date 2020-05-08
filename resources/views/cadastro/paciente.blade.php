@extends('layouts.app')

@section('content')
    <div class='container'>
        <div class='row'>
            <div class='col-md-6'>
                <h4> Cadastro Paciente </h4>
            </div>
        </div>
        <form  method="POST" action="{{ route('cadastro.paciente.store') }}">
            @csrf
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="nomePaciente">Nome Completo</label>
                <input type="text" name="nomePaciente" class="form-control" id="nomePaciente" placeholder="">
              </div>
              <div class="form-group col-md-2">
                <label for="idSexo" value="">Sexo</label>
                <select id="idSexo" name="idSexo"class="form-control" >
                  <option>Feminino</option>
                  <option>Masculino</option>
                </select>
              </div>
              <div class="form-group col-md-3">
                <label for="idRg">N° do RG</label>
                <input type="text" name="idRg" class="form-control" id="idRg" placeholder="">
              </div>
            </div>
            <div class='form-row'>
                <div class="form-group col-md-3">
                    <label for="idOrg">Órgão emissor</label>
                    <input type="text" name="idOrg" class="form-control" id="idOrg" placeholder="">
                </div>
                <div class="form-group col-md-3">
                    <label for="idCPF">CPF</label>
                    <input type="text" name="idCPF" class="form-control" id="idCPF" placeholder="">
                </div>
                <div class="form-group col-md-2">
                    <label for="idNascimento">Data de Nascimento</label>
                    <input type="date" name="idNascimento" class="form-control" id="idNascimento" placeholder="">
                </div>
                <div class="form-group col-md-3">
                    <label for="idEmail">Email</label>
                    <input type="email" name="idEmail" class="form-control" id="idEmail" placeholder="">
                </div>
            </div>
            <div class='form-row'>
                <div class="form-group col-md-3">
                    <label for="idCel">Telefone Celular</label>
                    <input type="" name="idCel" class="form-control" id="idCel" placeholder="">
                </div>
                <div class="form-group col-md-3">
                    <label for="idFixo">Telefone residencial</label>
                    <input type="" name="idFixo" class="form-control" id="idFixo" placeholder="">
                </div>
                <div class="form-group col-md-2">
                    <label for="idPro">Profissão</label>
                    <input type="" name="idPro" class="form-control" id="inputAddress" placeholder="">
                </div>
                <div class="form-group col-md-3">
                    <label for="idPlano">N° do Plano de saúde</label>
                    <input type="" name="idPlano" class="form-control" id="inputAddress" placeholder="">
                </div>
            </div>
            <div class='row'>
                <div class='col-md-6'>
                    <label> Filiação </label>
                </div>
            </div>
            <div class='form-row'>
                <div class="form-group col-md-4">
                    <label for="idMae">Nome do Mãe</label>
                    <input type="text" name="idMae" class="form-control" id="idMae" placeholder="">
                </div>
                <div class="form-group col-md-4">
                    <label for="idPai">Nome do Pai</label>
                    <input type="text" name="idPai" class="form-control" id="idPai" placeholder="">
                </div>
            </div>
            <div class='form-row'>
                <div class="form-group col-md-4">
                    <label for="idsenha">Senha</label>
                    <input type="password" name="idsenha" class="form-control" id="idsenha" placeholder="">
                </div>
                <div class="form-group col-md-4">
                    <label for="senhaRepet">Repetir Senha</label>
                    <input type="password" name="senhaRepet" class="form-control" id="senhaRepet" placeholder="">
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
                    <input type="text" name="idRua" class="form-control" id="idRua" placeholder="">
                </div>
                <div class="form-group col-md-2">
                    <label for="idNum">N°</label>
                    <input type="" name="idNum" class="form-control" id="idNum" placeholder="">
                </div>
                <div class="form-group col-md-3">
                    <label for="idBairro">Bairro</label>
                    <input type="text" name="idBairro" class="form-control" id="idBairro" placeholder="">
                </div>
                <div class="form-group col-md-3">
                    <label for="idCidade">Cidade</label>
                    <input type="text" name='idCidade' class="form-control" id="idCidade" placeholder="">
                </div>
                <div class="form-group col-md-3">
                    <label for="idEstado">Estado</label>
                    <input type="" name='idEstado' class="form-control" id="idEstado" placeholder="">
                </div>
                <div class="form-group col-md-2">
                    <label for="idCep">Cep</label>
                    <input type="text" name='idCep' class="form-control" id="idCep" placeholder="">
                </div>
            </div>
            <div class='form-row'>
                <div class="form-group col-md-10">
                    <label for="idObservacao">Observação</label>
                    <textarea  type="textArea" name="idObservacao" class="form-control" id="idObservacao" placeholder=""></textarea>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
    </div>
@endsection