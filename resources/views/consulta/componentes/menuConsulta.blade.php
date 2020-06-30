<div class='bordaGeral border-bottom rounded-bottom'>
<ul class="nav MenuConsulta">
    <li class="nav-item">
        <a class="nav-link  MenuConsulta" href="{{route('consulta.receita.create')}}"><i class="fas fa-first-aid"></i> Receitar Medicação</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{route('consulta.exame.create')}}"><i class="fas fa-file-medical-alt"></i> Solicitar Exames</a>
    </li>
    <li class="nav-item">
        @if(session('receita') || session('exames'))
            <a class="nav-link" href="{{route('resumoConsulta')}}"><i class="fas fa-file-medical"></i> Resumo da consulta</a>
        @endif
    </li>
        @if(session('receita') || session('exames'))
            <a href="{{route('salvarConsulta')}}"><button  class="btn btn-outline-success my-2 my-sm-0" id='resumoConsulta' type="submit"> Salvar Consulta</button></a>
        @endif
    </li>
</ul>
</div>


