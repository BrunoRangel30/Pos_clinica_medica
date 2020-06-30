@extends('layouts.app')

@section('content')
    <div class='container'>
        <div class='row'>
            <div class='col-md-6 titulosPesquisas'>
                <h4> Cadastro Medicamento </h4>
            </div>
        </div>
        <form class="shadow p-3 mb-5 bg-white rounded" method="POST" action="{{route('cadastro.medicamento.store')}}">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="nome_generico"> Nome genérico</label>
                    <input name='nome_generico' type="text" value="{{ old('nome_generico') }}" class="form-control" id="nome_generico" placeholder="">
                </div>
                <div class="form-group col-md-4">
                    <label for="nome_fabrica"> Nome de fábrica</label>
                    <input name="nome_fabrica" type="text" class="form-control  @error('nome_fabrica') is-invalid @enderror" id="nome_fabrica" value="{{ old('nome_fabrica') }}" id="nome_fabrica" placeholder="">
                    @error('nome_fabrica')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group col-md-4">
                    <label for="laboratorio">Laboratório</label>
                    <input name="laboratorio" type="text" value="{{ old('laboratorio') }}" class="form-control @error('laboratorio') is-invalid @enderror" id="laboratorio" placeholder="">
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
                    <input name="lote_med" type="text" value="{{ old('lote_med') }}" class="form-control @error('lote_med') is-invalid @enderror" id="idLot" placeholder="">
                    @error('lote_med')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group col-md-4">
                    <label for="tarja" value="">Tarja</label>
                    <select name="tarja" id="tarja" class="form-control" value="{{ old('tarja') }}">
                      <option>Livre</option>
                      <option>Preta</option>
                    </select>
                </div>
            </div>
            <div class='form-row'>
                <div class="form-group col-md-10">
                    <label for="descricao">Breve Descrição</label>
                    <textarea name="descricao" type="textArea" class="form-control" id="descricao" placeholder="">{{ old('descricao') }}</textarea>
                </div>
            </div>
            <button type="submit" class="sombraBotao">Salvar</button>
        </form>
    </div>
@endsection