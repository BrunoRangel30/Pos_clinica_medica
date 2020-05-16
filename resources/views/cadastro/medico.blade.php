@extends('layouts.app')

@section('content')
    <div class='container'>
        <div class='row'>
            <div class='col-md-6'>
                <h4> Cadastro Médico</h4>
            </div>
        </div>
        <form  method="POST" action="{{ route('cadastro.medico.store') }}">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="nomePaciente">Nome Completo</label>
                    <input type="text" name='nome' class="form-control @error('nome') is-invalid @enderror" id="nome" value="{{ old('nome') }}" placeholder="">
                    @error('nome')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group col-md-2">
                    <label for="sexo" value="">Sexo</label>
                    <select id="sexo" name='sexo'class="form-control @error('sexo') is-invalid @enderror" value="{{ old('sexo') }}" >
                        <option>Feminino</option>
                        <option>Masculino</option>
                        <option selected></option>
                    </select>
                    @error('sexo')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group col-md-3">
                    <label for="crm">Nº Conselho</label>
                    <input type="text" name='crm' class="form-control @error('crm')is-invalid @enderror" id="crm" value="{{ old('crm') }}" placeholder="">
                    @error('crm')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class='form-row'>
                <div class="form-group col-md-3">
                    <label for="cpf">CPF</label>
                    <input type="text" name='cpf' class="form-control @error('cpf') is-invalid @enderror" id="cpf" value="{{ old('cpf') }}" placeholder="">
                    @error('cpf')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group col-md-2">
                    <label for="data_nasc">Data de Nascimento</label>
                    <input type="date" name='data_nasc' class="form-control @error('data_nasc') is-invalid @enderror " id="data_nasc" value="{{ old('data_nasc') }}" placeholder="">
                    @error('data_nasc')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group col-md-3">
                    <label for="email">Email</label>
                    <input type="email" name='email' class="form-control @error('email') is-invalid @enderror" id="email" value="{{ old('email') }}" placeholder="">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group col-md-3">
                    <label for="tele_cel">Telefone Celular</label>
                    <input type="" name="tele_cel" class="form-control @error('tele_cel') is-invalid @enderror" id="tele_cel" value="{{ old('tele_cel') }}" placeholder="">
                    @error('tele_cel')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class='form-row'>
                <div class="form-group col-md-3">
                    <label for="tele_fixo">Telefone residencial</label>
                    <input type=""name="tele_fixo" class="form-control @error('tele_fixo') is-invalid @enderror" id="tele_fixo" value="{{ old('tele_fixo') }}" placeholder="">
                    @error('tele_fixo')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group col-md-3">
                    <label for="espec" value="">Especialidade</label>
                    <select id="espec" name='espec' class="form-control  @error('espec') is-invalid @enderror" value="{{ old('espec') }}">
                        <option>Cardiologia</option>
                        <option>Cirurgia geral</option>
                        <option>Dermatologia</option>
                        <option selected></option>
                    </select>
                    @error('espec')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group col-md-3">
                    <label for="espec_sec" value="">Especialidade Secundária</label>
                    <select id="espec_sec" name='espec_sec' class="form-control  @error('espec_sec') is-invalid @enderror" value="{{ old('espec_sec') }}">
                        <option>Cardiologia</option>
                        <option>Cirurgia geral</option>
                        <option>Dermatologia</option>
                        <option selected></option>
                    </select>
                    @error('espec_sec')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class='form-row'>
                <div class="form-group col-md-4">
                    <label for="senha">Senha</label>
                    <input type="password" name="senha" class="form-control  @error('senha') is-invalid @enderror" id="senha" value="{{ old('senha') }}" placeholder="">
                    @error('senha')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group col-md-4">
                    <label for="senha_confirmacao">Repetir Senha</label>
                    <input type="password" name='senha_confirmacao' class="form-control  @error('senha_confirmacao') is-invalid @enderror" id="senha_confirmacao" value="{{ old('senha_confirmacao') }}" placeholder="">
                </div>
                @error('senha_confirmacao')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class='row'>
                <div class='col-md-6'>
                    <label> Endereço </label>
                </div>
            </div>
            <div class='form-row'>
                <div class="form-group col-md-3">
                    <label for="end_rua">Rua</label>
                    <input type="text" name="end_rua"class="form-control @error('end_rua') is-invalid @enderror" id="end_rua" value="{{ old('end_rua') }}" placeholder="">
                    @error('end_rua')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group col-md-2">
                    <label for="end_nun_casa">N°</label>
                    <input type="" name="end_nun_casa" class="form-control @error('end_nun_casa') is-invalid @enderror" id="idNum" value="{{ old('end_nun_casa') }}" placeholder="">
                    @error('end_nun_casa')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group col-md-3">
                    <label for="end_bairro">Bairro</label>
                    <input type="text" name="end_bairro" class="form-control @error('end_bairro') is-invalid @enderror" id="end_bairro" value="{{ old('end_bairro') }}" placeholder="">
                    @error('end_bairro')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group col-md-3">
                    <label for="end_cidade">Cidade</label>
                    <input type="text" name="end_cidade" class="form-control @error('end_cidade') is-invalid @enderror" id="end_cidade" value="{{ old('end_cidade') }}" placeholder="">
                    @error('end_cidade')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group col-md-3">
                    <label for="end_estado">Estado</label>
                    <input type="" name="end_estado"class="form-control @error('end_estado') is-invalid @enderror" id="end_estado" value="{{ old('end_estado') }}" placeholder="">
                    @error('end_estado')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group col-md-2">
                    <label for="cep">Cep</label>
                    <input type="text" name="cep" class="form-control @error('cep') is-invalid @enderror" id="cep" value="{{ old('cep') }}" placeholder="">
                    @error('cep')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class='form-row'>
                <div class="form-group col-md-10">
                    <label for="obervacao">Obervação</label>
                    <textarea  type="textArea" name="obervacao" class="form-control" id="obervacao"  placeholder="">{{ old('obervacao') }}</textarea>
                    @error('obervacao')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
    </div>
@endsection