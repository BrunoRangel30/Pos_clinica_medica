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
                        <label for="nome_Paciente">Nome Completo</label>
                        <input type="text" name="nome_Paciente" value="{{$paciente->nome}}" class="form-control @error('nome_Paciente') is-invalid @enderror" id="nome_Paciente" placeholder="" >
                        @error('nome_Paciente')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
                <div class="form-group col-md-3">
                    <label for="sexo" value="">Sexo</label>
                    <select id="sexo" name="sexo"  class="form-control @error('sexo') is-invalid @enderror">
                        <option @if($paciente->sexo == 'Feminino') selected @endif>Feminino</option>
                        <option @if($paciente->sexo == 'Masculino') selected @endif>Masculino</option>
                    </select>
                    @error('sexo')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group col-md-3">
                    <label for="idRg">N° do RG</label>
                    <input type="text" name="idRg" value="{{$paciente->rg }}" class="form-control" id="idRg" placeholder="">
                </div>
            </div>
            <div class='form-row'>
                <div class="form-group col-md-3">
                    <label for="idOrg">Órgão emissor</label>
                    <input type="text" name="idOrg" value="{{$paciente->org_emissor}}" class="form-control" id="idOrg" placeholder="">
                </div>
                <div class="form-group col-md-3">
                    <label for="CPF">CPF</label>
                    <input type="text" name="CPF" value="{{$paciente->cpf}}" class="form-control @error('CPF') is-invalid @enderror" id="CPF" >
                    @error('CPF')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                    @enderror
                </div>
                <div class="form-group col-md-3">
                    <label for="data_de_nascimento">Data de Nascimento</label>
                    <input type="date" name="data_de_nascimento" value="{{$paciente->data_nasc}}" class="form-control @error('data_de_nascimento') is-invalid @enderror" id="data_de_nascimento" >
                    @error('data_de_nascimento')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group col-md-3">
                    <label for="idPlano">N° do Plano de saúde</label>
                    <input type="" name="idPlano" value="{{$paciente->n_plano}}" class="form-control" id="inputAddress" placeholder="">
                </div>
            </div>
            <div class='form-row'>
                <div class="form-group col-md-3">
                    <label for="telefone_celular">Telefone Celular</label>
                    <input type="" name="telefone_celular" value="{{$paciente->tele_cel}}" class="form-control @error('telefone_celular') is-invalid @enderror" id="telefone_celular" placeholder="" >
                    @error('telefone_celular')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group col-md-3">
                    <label for="idFixo">Telefone residencial</label>
                    <input type="" name="idFixo" value="{{$paciente->tele_fixo}}" class="form-control" id="idFixo" placeholder="">
                </div>
                <div class="form-group col-md-3">
                    <label for="idPro">Profissão</label>
                    <input type="" name="idPro" value="{{$paciente->profissao}}" class="form-control" id="inputAddress" placeholder="">
                </div>
                <div class="form-group col-md-3">
                    <label for="email">Email</label>
                    <input type="email" name="email" value="{{$user->email}}" class="form-control @error('email') is-invalid @enderror" id="email" >
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class='row'>
                <div class='col-md-6'>
                    <label> Filiação </label>
                </div>
            </div>
            <div class='form-row'>
                <div class="form-group col-md-4">
                    <label for="nome_da_mae">Nome do Mãe</label>
                    <input type="text" name="nome_da_mae" value="{{$paciente->nome_mae}}" class="form-control @error('nome_da_mae') is-invalid @enderror" id="nome_da_mae" placeholder="">
                    @error('nome_da_mae')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group col-md-4">
                    <label for="idPai">Nome do Pai</label>
                    <input type="text" name="idPai" value="{{$paciente->nome_pai}}" class="form-control" id="idPai" placeholder="">
                </div>
            </div>
            <div class='row'>
                <div class='col-md-6'>
                    <label> Endereço </label>
                </div>
            </div>
            <div class='form-row'>
                <div class="form-group col-md-3">
                    <label for="rua">Rua</label>
                    <input type="text" name="rua" value="{{$paciente->end_rua}}" class="form-control @error('rua') is-invalid @enderror" id="rua" placeholder="" >
                    @error('rua')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group col-md-2">
                    <label for="numero">N°</label>
                    <input type="" name="numero" value="{{$paciente->end_nun_casa}}" class="form-control @error('numero') is-invalid @enderror" id="numero" placeholder="" >
                    @error('numero')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
                <div class="form-group col-md-3">
                    <label for="bairro">Bairro</label>
                    <input type="text" name="bairro" value="{{$paciente->end_bairro}}" class="form-control @error('bairro') is-invalid @enderror" id="bairro" placeholder="" >
                    @error('bairro')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group col-md-3">
                    <label for="cidade">Cidade</label>
                    <input type="text" name='cidade' value="{{$paciente->end_cidade}}" class="form-control @error('cidade') is-invalid @enderror" id="cidade" placeholder="" >
                    @error('cidade')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group col-md-3">
                    <label for="estado">Estado</label>
                    <input type="" name='estado' value="{{$paciente->end_estado}}" class="form-control @error('estado') is-invalid @enderror" id="estado" placeholder="" >
                    @error('estado')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                     @enderror
                </div>
                <div class="form-group col-md-2">
                    <label for="idCep">Cep</label>
                    <input type="text" name='idCep' value="{{$paciente->cep}}" class="form-control" id="idCep" placeholder="" >
                </div>
            </div>
            <div class='form-row'>
                <div class="form-group col-md-10">
                    <label for="idObservacao">Observação</label>
                    <textarea  type="textArea" name="idObservacao" value="{{$paciente->obervacao}}" class="form-control" id="idObservacao" placeholder=""></textarea>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Salvar Alterações</button>
        </form>
    </div>
@endsection