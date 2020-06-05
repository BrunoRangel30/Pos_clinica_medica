
<ul class="nav">
    <li class="nav-item">
        <a class="nav-link active" href="{{route('consulta.receita.create')}}"><i class="fas fa-first-aid"></i> Receitar Medicação</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{route('consulta.exame.create')}}"><i class="fas fa-file-medical-alt"></i> Solicitar Exames</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{route('resumoConsulta')}}"><i class="fas fa-file-medical"></i> Resumo da consulta</a>
    </li>
    @if(session('receita'))
        <a href="{{route('salvarConsulta')}}"><button class="btn btn-outline-success my-2 my-sm-0" type="submit"> Salvar Consulta</button></a>
    @endif
    </li>
</ul>