<div class='shadow-sm p-3 mb-3 bg-white rounded bordaInfo'>
    <div class='row '>
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
                @php
                    $date = date_create(date(session('data_nasc')));
                    $dataAtual = date_format($date, 'd/m/Y');  
                @endphp
                <p>Data de Nascimento : <span>{{$dataAtual}}</span><p>
            @endif
        </div>
    </div>
</div>