@extends('layouts.app')

@section('content')
    <div class='container'>
        <div class='row'>
            <div class='col-md-6'>
                    <h4>Editar Paciente </h4>
            </div>
        </div>
        <form  method="POST" action="{{route('cadastro.paciente.update',$paciente->paciente_id)}}">
            @method('PATCH')
            @csrf
            <div class="form-row">
                <div class="form-group col-md-6">
                        <label for="nomePaciente">Nome Completo</label>
                        <input type="text" value='{{$paciente->nome}}' name="nomePaciente" class="form-control" id="nomePaciente" placeholder="">
                </div>
            <div class="form-group col-md-2">
                <label for="idSexo" value="">Sexo</label>
                <select  id="idSexo" name="idSexo"class="form-control" >
                    <option @if($paciente->sexo == 'Feminino') selected="selected" @endif>Feminino</option>
                    <option @if($paciente->sexo == 'Masculino')selected="selected" @endif>Masculino</option>
                </select>
            </div>
            <div class="form-group col-md-3">
                <label for="idRg">N° do RG</label>
                <input value='{{$paciente->rg}}' type="text" name="idRg" class="form-control" id="idRg" placeholder="">
              </div>
            </div>
            <div class='form-row'>
                <div class="form-group col-md-3">
                    <label for="idOrg">Órgão emissor</label>
                    <input value='{{$paciente->org_emissor}}' type="text" name="idOrg" class="form-control" id="idOrg" placeholder="">
                </div>
                <div class="form-group col-md-3">
                    <label for="idCPF">CPF</label>
                    <input type="text" value='{{$paciente->cpf}}' name="idCPF" class="form-control" id="idCPF" placeholder="">
                </div>
                <div class="form-group col-md-2">
                    <label for="idNascimento">Data de Nascimento</label>
                    <input value='{{$paciente->data_nasc}}' type="date" name="idNascimento" class="form-control" id="idNascimento" placeholder="">
                </div>
                <div class="form-group col-md-3">
                    <label for="idEmail">Email</label>
                    <input value='{{$user->email}}' type="email" name="idEmail" class="form-control" id="idEmail" placeholder="">
                </div>
            </div>
            <div class='form-row'>
                <div class="form-group col-md-3">
                    <label for="idCel">Telefone Celular</label>
                    <input type="" value='{{$paciente->tele_cel}}' name="idCel" class="form-control" id="idCel" placeholder="">
                </div>
                <div class="form-group col-md-3">
                    <label for="idFixo">Telefone residencial</label>
                    <input type="" value='{{$paciente->tele_fixo}}' name="idFixo" class="form-control" id="idFixo" placeholder="">
                </div>
                <div class="form-group col-md-2">
                    <label for="idPro">Profissão</label>
                    <input type="" value='{{$paciente->profissao}}' name="idPro" class="form-control" id="inputAddress" placeholder="">
                </div>
                <div class="form-group col-md-3">
                    <label for="idPlano">N° do Plano de saúde</label>
                    <input type="" value='{{$paciente->n_plano}}' name="idPlano" class="form-control" id="inputAddress" placeholder="">
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
                    <input value='{{$paciente->nome_mae}}' type="text" name="idMae" class="form-control" id="idMae" placeholder="">
                </div>
                <div class="form-group col-md-4">
                    <label for="idPai">Nome do Pai</label>
                    <input value='{{$paciente->nome_pai}}' type="text" name="idPai" class="form-control" id="idPai" placeholder="">
                </div>
            </div>
           <!-- <div class='form-row'>
                <div class="form-group col-md-4">
                    <label for="idsenha">Senha</label>
                    <input type="password" name="idsenha" class="form-control" id="idsenha" placeholder="">
                </div>
                <div class="form-group col-md-4">
                    <label for="senhaRepet">Repetir Senha</label>
                    <input type="password" name="senhaRepet" class="form-control" id="senhaRepet" placeholder="">
                </div>
            </div>-->
            <div class='row'>
                <div class='col-md-6'>
                    <label> Endereço </label>
                </div>
            </div>
            <div class='form-row'>
                <div class="form-group col-md-3">
                    <label for="idRua">Rua</label>
                    <input type="text" value='{{$paciente->end_rua}}' name="idRua" class="form-control" id="idRua" placeholder="">
                </div>
                <div class="form-group col-md-2">
                    <label for="idNum">N°</label>
                    <input type="" value='{{$paciente->end_nun_casa}}' name="idNum" class="form-control" id="idNum" placeholder="">
                </div>
                <div class="form-group col-md-3">
                    <label for="idBairro">Bairro</label>
                    <input type="text"  value='{{$paciente->end_bairro}}' name="idBairro" class="form-control" id="idBairro" placeholder="">
                </div>
                <div class="form-group col-md-3">
                    <label for="idCidade">Cidade</label>
                    <input type="text" value='{{$paciente->end_cidade}}' name='idCidade' class="form-control" id="idCidade" placeholder="">
                </div>
                <div class="form-group col-md-3">
                    <label for="idEstado">Estado</label>
                    <input type="" value='{{$paciente->end_estado}}' name='idEstado' class="form-control" id="idEstado" placeholder="">
                </div>
                <div class="form-group col-md-2">
                    <label for="idCep">Cep</label>
                    <input type="text" value='{{$paciente->cep}}' name='idCep' class="form-control" id="idCep" placeholder="">
                </div>
            </div>
            <div class='form-row'>
                <div class="form-group col-md-10">
                    <label for="idObservacao">Observação</label>
                <textarea type="textArea" name="idObservacao" class="form-control" id="idObservacao" placeholder="">{{$paciente->obervacao}}</textarea>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
    </div>
@endsection