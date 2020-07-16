@extends('layouts.app')

@section('content')
    <div class='container'>
        <div class='row'>
            <div class='col-md-6 titulosPesquisas'>
                <h4> Editar Cadastro Medicamento </h4>
            </div>
        </div>
        <form class="shadow p-3 mb-5 bg-white rounded" method="POST" action="{{route('cadastro.medicamento.update',$medicamento->med_id)}}">
            @method('PATCH')
            @csrf
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="nome_generico"> Nome genérico</label>
                    <input name='nome_generico' type="text" value="{{ $medicamento->nome_generico }}" class="form-control" id="nome_generico" placeholder="">
                </div>
                <div class="form-group col-md-4">
                    <label for="nome_fabrica"> Nome de fábrica</label>
                    <input name="nome_fabrica" type="text" class="form-control  @error('nome_fabrica') is-invalid @enderror" id="nome_fabrica" value="{{ $medicamento->nome_fabrica }}" id="nome_fabrica" placeholder="">
                    @error('nome_fabrica')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group col-md-4">
                    <label for="laboratorio">Laboratório</label>
                    <input name="laboratorio" type="text" value="{{ $medicamento->laboratorio }}" class="form-control @error('laboratorio') is-invalid @enderror" id="laboratorio" placeholder="">
                    @error('laboratorio')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="lote_med">Lote do medicamento</label>
                    <input name="lote_med" type="text" value="{{ $medicamento->lote_med }}" class="form-control @error('lote_med') is-invalid @enderror" id="idLot" placeholder="">
                    @error('lote_med')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group col-md-4">
                    <label for="tarja" value="">Tarja</label>
                    <select name="tarja" id="tarja" class="form-control" value="{{ $medicamento->tarja }}">
                       <option @if($medicamento->tarja == 'Livre') selected @endif>Livre</option>
                       <option @if($medicamento->tarja == 'Preta') selected @endif>Preta</option>
                    </select>
                </div>
            </div>
            <div class='form-row'>
                <div class="form-group col-md-10">
                    <label for="descricao">Breve Descrição</label>
                    <textarea name="descricao" type="textArea" class="form-control" id="descricao" placeholder="">{{ $medicamento->descricao }}</textarea>
                </div>
            </div>
            <button type="submit" class="sombraBotao">Salvar Alteração</button>
        </form>
    </div>
@endsection