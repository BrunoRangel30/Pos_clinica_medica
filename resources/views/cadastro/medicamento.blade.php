@extends('layouts.app')

@section('content')
    <div class='container'>
        <div class='row'>
            <div class='col-md-6'>
                <h4> Cadastro Medicamento </h4>
            </div>
        </div>
        <form>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="nomeGenerico"> Nome genérico</label>
                    <input type="text" class="form-control" id="nomePaciente" placeholder="">
                </div>
                <div class="form-group col-md-4">
                    <label for="nomeFabrica"> Nome de fábrica</label>
                    <input type="text" class="form-control" id="nomePaciente" placeholder="">
                </div>
                <div class="form-group col-md-4">
                    <label for="idLab">Laboratório</label>
                    <input type="text" class="form-control" id="idLab" placeholder="">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="idLot">Lote do medicamento</label>
                    <input type="text" class="form-control" id="idLot" placeholder="">
                </div>
                <div class="form-group col-md-4">
                    <label for="idTarja" value="">Tarja</label>
                    <select id="idTarja" class="form-control" >
                      <option>Livre</option>
                      <option>Preta</option>
                    </select>
                </div>
            </div>
            <div class='form-row'>
                <div class="form-group col-md-10">
                    <label for="idDesc">Breve Descrição</label>
                    <textarea  type="textArea" class="form-control" id="idDesc" placeholder=""></textarea>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
    </div>
@endsection