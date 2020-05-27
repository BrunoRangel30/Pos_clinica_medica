<div class='row'>
    <div class='col-md-4'>
        @if(session('medico'))
            <p>Médico(a) : <span> {{session('medico')}} </span></p>
        @endif
    </div>
    <div class='col-md-4'>
        @if(session('crm'))
            <p>CRM : <span>{{session('crm')}}</span></p>
        @endif
    </div>
</div>
<div class='row'>
    <div class='col-md-4'>
        @if(session('paciente'))
            <p>Paciente : <span> {{session('paciente')}} </span></p>
        @endif
    </div>
    <div class='col-md-4'>
        @if(session('cpf'))
            <p>CPF : <span>{{session('cpf')}}</span></p>
        @endif
    </div>
    <div class='col-md-4'>
        @if(session('data_nasc'))
             <p>Data de Nascimento : <span>{{session('data_nasc')}}</span><p>
        @endif
    </div>
</div>