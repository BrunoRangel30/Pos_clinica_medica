@extends('layouts.app')
<style>
  
</style>

@section('content')
    <div class='container'>
        <div class='row'>
            <div class='col-md-12 mb-3'>
                @component('consulta.componentes.dadosPaciente')@endcomponent
            </div>
        </div>
        <div class='row'>
            <div class='col-md-12 mb-3'>
                @component('consulta.componentes.menuConsulta')@endcomponent
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
    </div>
@endsection