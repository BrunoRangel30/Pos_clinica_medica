@extends('layouts.app')
<style>
    .SelecaoDrop .form-control select option:hover{
            color: #16181b;
            text-decoration: none;
            background-color:#ffd43b !important;
        }
</style>
@section('content')
    <div class='container'>
        <div class='row'>
            <div class='col-md-6 titulosPesquisas'>
                <h4> Editar Cadastro Médico</h4>
            </div>
        </div>
        <form class='shadow p-3 mb-5 bg-white rounded' method="POST" action="{{ route('cadastro.medico.update',$medico->medico_id)}}">
            @method('PATCH')
            @csrf
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="nomePaciente">Nome Completo</label>
                    <input type="text" name='nome' class="form-control @error('nome') is-invalid @enderror" id="nome" value="{{$medico->nome }}" placeholder="">
                    @error('nome')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="SelecaoDrop form-group col-md-2">
                    <label for="sexo" value="">Sexo</label>
                    <select id="sexo" name='sexo'class="form-control @error('sexo') is-invalid @enderror" >
                        <option @if($medico->sexo == 'Feminino') selected @endif>Feminino</option>
                        <option @if($medico->sexo == 'Masculino') selected @endif>Masculino</option>
                    </select>
                    @error('sexo')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group col-md-3">
                    <label for="crm">Nº Conselho</label>
                    <input type="text" name='crm' class="form-control @error('crm')is-invalid @enderror" id="crm" value="{{ $medico->crm }}" placeholder="">
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
                    <input type="text" name='cpf' class="form-control @error('cpf') is-invalid @enderror" id="cpf" value="{{$medico->cpf }}" placeholder="">
                    @error('cpf')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group col-md-3">
                    <label for="data_de_nascimento">Data de Nascimento</label>
                    <input type="date" name='data_de_nascimento' class="form-control @error('data_de_nascimento') is-invalid @enderror " id="data_de_nascimento" value="{{$medico->data_nasc}}" placeholder="">
                    @error('data_de_nascimento')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group col-md-3">
                    <label for="email">Email</label>
                    <input type="email" name='email' class="form-control @error('email') is-invalid @enderror" id="email" value="{{$user->email}}" placeholder="">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group col-md-3">
                    <label for="telefone_celular">Telefone Celular</label>
                    <input type="" name="telefone_celular" class="form-control @error('telefone_celular') is-invalid @enderror" id="telefone_celular" value="{{$medico->tele_cel}}" placeholder="">
                    @error('telefone_celular')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class='form-row'>
                <div class="form-group col-md-3">
                    <label for="telefone_fixo">Telefone residencial</label>
                    <input type=""name="telefone_fixo" class="form-control @error('telefone_fixo') is-invalid @enderror" id="telefone_fixo" value="{{$medico->tele_fixo}}" placeholder="">
                    @error('telefone_fixo')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group col-md-3">
                    <label for="especialidade" value="">Especialidade</label>
                    <select id="especialidade" name='especialidade' class="form-control  @error('especialidade') is-invalid @enderror">
                        <option>Cardiologia</option>
                        <option>Cirurgia geral</option>
                        <option>Dermatologia</option>
                        <option selected></option>
                    </select>
                    @error('especialidade')
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
            <div class='row'>
                <div class='col-md-6'>
                    <label> Endereço </label>
                </div>
            </div>
            <div class='form-row'>
                <div class="form-group col-md-3">
                    <label for="rua">Rua</label>
                    <input type="text" name="rua"class="form-control @error('rua') is-invalid @enderror" id="rua" value="{{ $medico->end_rua }}" placeholder="">
                    @error('rua')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group col-md-2">
                    <label for="numero">N°</label>
                    <input type="" name="numero" class="form-control @error('numero') is-invalid @enderror" id="idNum" value="{{ $medico->end_nun_casa }}" placeholder="">
                    @error('numero')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group col-md-3">
                    <label for="bairro">Bairro</label>
                    <input type="text" name="bairro" class="form-control @error('bairro') is-invalid @enderror" id="bairro" value="{{ $medico->end_bairro }}" placeholder="">
                    @error('bairro')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group col-md-3">
                    <label for="cidade">Cidade</label>
                    <input type="text" name="cidade" class="form-control @error('cidade') is-invalid @enderror" id="cidade" value="{{ $medico->end_cidade }}" placeholder="">
                    @error('cidade')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group col-md-3">
                    <label for="estado">Estado</label>
                    <input type="" name="estado"class="form-control @error('estado') is-invalid @enderror" id="estado" value="{{ $medico->end_estado }}" placeholder="">
                    @error('estado')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group col-md-2">
                    <label for="cep">Cep</label>
                    <input type="text" name="cep" class="form-control @error('cep') is-invalid @enderror" id="cep" value="{{ $medico->cep }}" placeholder="">
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
                    <textarea  type="textArea" name="obervacao" class="form-control" id="obervacao"  placeholder="">{{  $medico->obervacao }}</textarea>
                    @error('obervacao')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <button type="submit" class="sombraBotao">Salvar Alterações</button>
        </form>
    </div>
@endsection