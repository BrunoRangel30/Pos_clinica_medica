@extends('layouts.app')
<style>
    .tamanho .card{
        min-height: 300px;
    }
</style>
@section('content')
    
<div class='container'>
    <div class='row mt-5'>
        <div class='col-md-4 p-3 tamanho'>
            <div class="card" style="width: 18rem;">
                <h5 class="card-title pl-3 pt-4">Cadastros</h5>
                <ul class="list-group list-group-flush pt-3">
                    <li class="list-group-item">Paciente</li>
                    <li class="list-group-item">Médico</li>
                    <li class="list-group-item">Recepcionista</li>
                    <li class="list-group-item">Medicamento</li>
                </ul>
            </div>
        </div>
        <div class='col-md-4 p-3'>
            <div class="card" style="width: 18rem;">
                <!--<img class="card-img-top" src="..." alt="Card image cap">-->
                <div class="card-body">
                <h5 class="card-title">Pesquisas</h5>
                <!--<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>-->
                </div>
                <ul class="list-group list-group-flush">
                <li class="list-group-item">Cras justo odio</li>
                <li class="list-group-item">Dapibus ac facilisis in</li>
                <li class="list-group-item">Vestibulum at eros</li>
                </ul>
              <!--  <div class="card-body">
                <a href="#" class="card-link">Card link</a>
                <a href="#" class="card-link">Another link</a>
                </div>-->
            </div>
        </div>
        <div class='col-md-4 p-3'>
            <div class="card" style="width: 18rem;">
               <!-- <img class="card-img-top" src="..." alt="Card image cap">-->
                <div class="card-body">
                <h5 class="card-title">Consulta</h5>
               <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>-->
                </div>
                <ul class="list-group list-group-flush">
                <li class="list-group-item">Cras justo odio</li>
                <li class="list-group-item">Dapibus ac facilisis in</li>
                <li class="list-group-item">Vestibulum at eros</li>
                </ul>
               <!-- <div class="card-body">
                <a href="#" class="card-link">Card link</a>
                <a href="#" class="card-link">Another link</a>
                </div>-->
            </div>
        </div>
    </div>
</div>
  
@endsection
<script>

</script>
