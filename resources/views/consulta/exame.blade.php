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
        <fieldset>
            <legend>Selecione o(s) exame(s)</legend>
            <label>Sangue</label>
            <p><input type="checkbox" name="OPCAO" value="op1"> Clicemia de Jejum</p>
            <p><input type="checkbox" name="OPCAO" value="op2"> Ácidos úricos</p>
            <p><input type="checkbox" name="OPCAO" value="op3"> Colesterol Total e Frações </p>
        </fieldset>
        <button type="submit" class="btn btn-primary">Salvar Alterações</button>
    </form>
@endsection