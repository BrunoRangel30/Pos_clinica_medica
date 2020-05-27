@extends('layouts.app')

@section('content')
    <div class='container'>
        <div class='row'>
            <div class='col-md-6'>
                <h4> Cadastro Medicamento </h4>
            </div>
        </div>
        <form method="POST" action="{{route('cadastro.medicamento.store')}}">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="nome_generico"> Nome genérico</label>
                    <input name='nome_generico' type="text" class="form-control" id="nome_generico" placeholder="">
                </div>
                <div class="form-group col-md-4">
                    <label for="nome_fabrica"> Nome de fábrica</label>
                    <input name="nome_fabrica" type="text" class="form-control" id="nome_fabrica" placeholder="">
                </div>
                <div class="form-group col-md-4">
                    <label for="laboratorio">Laboratório</label>
                    <input name="laboratorio" type="text" class="form-control" id="laboratorio" placeholder="">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="lote_med">Lote do medicamento</label>
                    <input name="lote_med" type="text" class="form-control" id="idLot" placeholder="">
                </div>
                <div class="form-group col-md-4">
                    <label for="tarja" value="">Tarja</label>
                    <select name="tarja" id="tarja" class="form-control" >
                      <option>Livre</option>
                      <option>Preta</option>
                    </select>
                </div>
            </div>
            <div class='form-row'>
                <div class="form-group col-md-10">
                    <label for="descricao">Breve Descrição</label>
                    <textarea name="descricao" type="textArea" class="form-control" id="descricao" placeholder=""></textarea>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
    </div>
@endsection