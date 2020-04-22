@extends('layouts.app')
<style>
  
</style>
@section('content')
    <div class='container'>
        <div class='row'>
            <div class='col-md-4'>
                <p>Médico(a) : <span> Fátima Nogueira  </span></p>
            </div>
            <div class='col-md-4'>
                <p>CRM : <span> 12344634  </span></p>
            </div>
        </div>
        <div class='row'>
            <div class='col-md-4'>
                <p>Paciente : <span> Candece Faria </span></p>
            </div>
            <div class='col-md-4'>
                <p>CPF : <span>98745837439 </span></p>
            </div>
            <div class='col-md-4'>
                <p>Data de Nascimento : <span>23/12/1967 </span><p>
            </div>
        </div>
        <form>
            <div class='form-row'>
                <div class="col-md-5">
                    <label class="sr-only" for="inlineFormInputGroup">Pesquise o medicamento</label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fas fa-search"></i></div>
                        </div>
                        <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Pesquise o medicamento">
                    </div>
                </div>
                <div class="form-group col-md-2">
                    <input type="number" class="form-control" id="idNum" placeholder="Quantidade">
                </div>
                <div class="form-group col-md-2">
                    <input type="" class="form-control" id="idNum" placeholder="Unidade">
                </div>
                <div class="form-group col-md-2">
                    <input type="" class="form-control" id="idNum" placeholder="Via">
                </div>
            </div>
            <div class='form-row'>
                <div class="form-group col-md-11">
                    <label for="idObservacao">Procedimento</label>
                    <textarea rows="5" type="textArea" class="form-control" id="idObservacao" placeholder=""></textarea>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
    </div>
@endsection