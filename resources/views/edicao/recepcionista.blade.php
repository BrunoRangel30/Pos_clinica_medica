@extends('layouts.app')

@section('content')
    <div class='container'>
        <div class='row'>
            <div class='col-md-6 titulosPesquisas'>
                <h4> Editar Cadastro Recepcionista </h4>
            </div>
        </div>
        <form class="shadow p-3 mb-5 bg-white rounded" method="POST" action="{{ route('cadastro.recepcionista.update',$recepcionista->recep_id)}}">
            @method('PATCH')
            @csrf
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="nomePaciente">Nome Completo</label>
                    <input name="Nome_Recepcionista" type="text" value="{{ $recepcionista->nome }}" class="form-control @error('Nome_Recepcionista') is-invalid @enderror" id="Nome_Recepcionista" placeholder="">
                    @error('Nome_Recepcionista')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group col-md-2">
                    <label for="sexo" value="">Sexo</label>
                    <select id="sexo" name="sexo" value="{{ $recepcionista->sexo }}" class="form-control @error('sexo') is-invalid @enderror">
                        <option @if($recepcionista->sexo == 'Feminino') selected @endif>Feminino</option>
                        <option @if($recepcionista->sexo == 'Masculino') selected @endif>Masculino</option>
                    </select>
                    @error('sexo')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group col-md-3">
                    <label for="rg">N° do RG</label>
                    <input type="text" name="rg" value="{{ $recepcionista->rg }}" class="form-control" id="rg" placeholder="">
                </div>
            </div>
            <div class='form-row'>
                <div class="form-group col-md-3">
                    <label for="org_emissor">Órgão emissor</label>
                    <input type="text" name="org_emissor" value="{{ $recepcionista->org_emissor }}" class="form-control" id="org_emissor" placeholder="">
                </div>
                <div class="form-group col-md-3">
                    <label for="cpf">CPF</label>
                    <input type="text" name="cpf" value="{{ $recepcionista->cpf }}" class="form-control @error('cpf') is-invalid @enderror" id="cpf" >
                    @error('cpf')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                    @enderror
                </div>
                <div class="form-group col-md-2">
                    <label for="data_de_nascimento">Data de Nascimento</label>
                    <input type="date" name="data_de_nascimento" value="{{ $recepcionista->data_nasc }}" class="form-control @error('data_de_nascimento') is-invalid @enderror" id="data_de_nascimento" >
                    @error('data_de_nascimento')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group col-md-3">
                    <label for="email">Email</label>
                    <input type="email" name="email" value="{{ $user->email}}" class="form-control @error('email') is-invalid @enderror" id="email" >
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class='form-row'>
                <div class="form-group col-md-3">
                    <label for="telefone_celular">Telefone Celular</label>
                    <input type="" name="telefone_celular" value="{{ $recepcionista->tele_cel }}" class="form-control @error('telefone_celular') is-invalid @enderror" id="telefone_celular" placeholder="" >
                    @error('telefone_celular')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group col-md-3">
                    <label for="idFixo">Telefone residencial</label>
                    <input type="" name="idFixo" value="{{ $recepcionista->tele_fixo }}" class="form-control" id="idFixo" placeholder="">
                </div>
                <div class="form-group col-md-3">
                    <label for="idAdmisssao">Data de Admissão</label>
                    <input type="date" name="idAdmisssao" value="{{ $recepcionista->data_adm }}" class="form-control" id="idAdmisssao" placeholder="">
                </div>
            </div>
            <div class='row'>
                <div class='col-md-6'>
                    <label> Filiação </label>
                </div>
            </div>
            <div class='form-row'>
                <div class="form-group col-md-4">
                    <label for="nome_mae">Nome do Mãe</label>
                    <input type="text" name="nome_mae" value="{{ $recepcionista->nome_mae}}" class="form-control @error('nome_mae') is-invalid @enderror" id="nome_mae" placeholder="">
                    @error('nome_da_mae')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group col-md-4">
                    <label for="idPai">Nome do Pai</label>
                    <input type="text" name="idPai" value="{{$recepcionista->nome_pai}}" class="form-control" id="idPai" placeholder="">
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
                    <input type="text" name="rua" value="{{$recepcionista->end_rua}}" class="form-control @error('rua') is-invalid @enderror" id="rua" placeholder="" >
                    @error('rua')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group col-md-2">
                    <label for="numero">N°</label>
                    <input type="" name="numero" value="{{$recepcionista->end_nun_casa}}" class="form-control @error('numero') is-invalid @enderror" id="numero" placeholder="" >
                    @error('numero')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group col-md-3">
                    <label for="bairro">Bairro</label>
                    <input type="text" name="bairro" value="{{$recepcionista->end_bairro}}" class="form-control @error('bairro') is-invalid @enderror" id="bairro" placeholder="" >
                    @error('bairro')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group col-md-3">
                    <label for="cidade">Cidade</label>
                    <input type="text" name='cidade' value="{{$recepcionista->end_cidade}}" class="form-control @error('cidade') is-invalid @enderror" id="cidade" placeholder="" >
                    @error('cidade')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group col-md-3">
                    <label for="estado">Estado</label>
                    <input type="" name='estado' value="{{$recepcionista->end_estado}}" class="form-control @error('estado') is-invalid @enderror" id="estado" placeholder="" >
                    @error('estado')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                     @enderror
                </div>
                <div class="form-group col-md-2">
                    <label for="cep">Cep</label>
                    <input type="text" name='cep' value="{{$recepcionista->cep}}" class="form-control" id="cep" placeholder="" >
                </div>
            </div>
            <div class='form-row'>
                <div class="form-group col-md-10">
                    <label for="obervacao">Observação</label>
                    <textarea  type="textArea" name="obervacao"  class="form-control" id="obervacao" placeholder="">{{$recepcionista->obervacao}}</textarea>
                </div>
            </div>
            <button type="submit" class="sombraBotao">Salvar Alterações</button>
        </form>
    </div>
@endsection