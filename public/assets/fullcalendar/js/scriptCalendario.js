document.addEventListener('DOMContentLoaded', function() {
    /*var Calendar = FullCalendar.Calendar;
    var Draggable = FullCalendarInteraction.Draggable/*

    /* initialize the external events
    -----------------------------------------------------------------
    var containerEl = document.getElementById('external-events-list');
    new Draggable(containerEl, {
        itemSelector: '.fc-event',
        eventData: function(eventEl) {
            return {
                title: eventEl.innerText.trim()
            }
        }
    });*/
    //Mascaras para os campos de formulario marcacao de consulta

    $('.date-time').mask('00/00/0000 00:00');

    function getDataAjax(url, data) {
        return new Promise(function(resolve, reject) {
            return request = $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                dataType: 'json',
                url: url,
                data: data,
                success: resolve,
                error: reject
            });
        });
    }

    function resetForm(classe) {
        $(`.${classe}`)[0].reset();
    }
    //busca paciente
    $("#searchPac").keyup(async function() {

        let keys = $('#searchPac').val()
        data = {
            key: keys,
        };
        //console.log(data)
        getDataAjax('../api/buscaPaciente', data).then(function(result) {
            let input = '';
            // console.log(result, 'result')
            console.log(keys, 'tamanho')
            result.map(function(index) {
                input += `<ul id='listaPacientes'>`
                input += `<li value='${index.paciente_id}' id='${index.paciente_id}'>${index.nome}</li>`
                input += `</ul>`
            })
            $("#resulPac").html(input);
            if (keys == '') {
                $("#resulPac").html('');
            }
            $("#listaPacientes>li").click(function(e) {
                let idPac = this.id;
                console.log(idPac);
                $("#inputPesqPac input[name='nome']").val(e.target.innerText); //insere o resultado  no campo
                $("#modalAgenda input[name='fk_paciente']").val(idPac);
                //$('#searchPac').attr('data-paciente', idPac);
                $("#resulPac").html(''); //limpa a div
            })

        })
    });

    //Salvar consulta/editar
    $(".delete-save").click(function() {

        let agenda = {
            nome: '',
            start: '',
            fim: '',
            tipo: '',
            fk_paciente: '',
            fk_medico: ''
        }
        agenda.id = $("#modalAgenda input[name='id_agenda']").val();
        agenda.nome = $("#modalAgenda input[name='nome']").val();
        agenda.start = moment($("#modalAgenda input[name='inicio']").val(), "DD/MM/YYYY HH:mm:ss").format('YYYY/MM/DD HH:mm:ss');
        agenda.fim = moment($("#modalAgenda input[name='fim']").val(), "DD/MM/YYYY HH:mm:ss").format('YYYY/MM/DD HH:mm:ss');
        agenda.tipo = $("#modalAgenda select[name='tipo']").val();
        agenda.fk_paciente = $("#modalAgenda input[name='fk_paciente']").val();
        agenda.fk_medico = $("#searchMed").data('medico');

        let url;
        if (agenda.id == '') {
            url = "";

        } else {
            agenda.id = agenda.id;
            agenda._method = "PUT";
            url = "";
        }
        console.log(agenda, 'agenda');


    });
    //pesquisa medicos
    $("#searchMed").keyup(async function() {

        let keys = $('#searchMed').val()
        data = {
            key: keys,
        };
        getDataAjax('../api/buscaMedicos', data)
            .then(function(result) {
                let input = '';
                result.map(function(index) {
                    input += `<ul id='listaMedicos'>`
                    input += `<li value='${index.medico_id}' id='${index.medico_id}'>${index.nome}</li>`
                    input += `</ul>`
                })
                $("#resultMed").html(input);
                //Limpa se não houver resultados
                if (keys == '') {
                    $("#resultMed").html('');
                }
                //seleciona agenda por medico
                $("#listaMedicos>li").click(function(e) {
                    let idMed = this.id;
                    data = {
                        id: idMed,
                    };

                    $("#inputPesqMed input[name='pesquisaMedico']").val(e.target.innerText); //insere o resultado  no campo
                    $('#searchMed').attr('data-medico', idMed);
                    $("#resultMed").html(''); //limpa a div


                    getDataAjax('../api/atualizarAgenda', data).then(function(result) {

                        var Calendar = FullCalendar.Calendar
                        console.log(result, 'fdf')
                        var ObjetoCalender
                        var calendarEl = document.getElementById('calendar');
                        //1
                        ObjetoCalender = new Calendar(calendarEl, {
                                plugins: ['interaction', 'dayGrid', 'timeGrid', 'list'],
                                header: {
                                    left: 'prev,next today',
                                    center: 'title',
                                    right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
                                },
                                locale: 'pt-br',
                                navLinks: true,
                                selectable: true,
                                editable: false,
                                droppable: false, // this allows things to be dropped onto the calendar
                                drop: function(arg) {
                                    // is the "remove after drop" checkbox checked?
                                    if (document.getElementById('drop-remove').checked) {
                                        // if so, remove the element from the "Draggable Events" list
                                        arg.draggedEl.parentNode.removeChild(arg.draggedEl);
                                    }
                                },
                                eventClick: function(ele) {
                                    resetForm('formAgenda');
                                    $('#modalAgenda').modal('show');
                                    $("#modalAgenda #tituloAgenda").text('Remarcar Consulta');
                                    $("#modalAgenda button.delete-event").css("display", "flex");
                                    let nome = ele.event.title;
                                    $("#modalAgenda input[name='nome']").val(nome);
                                    let start = moment(ele.event.start).format("DD/MM/YYYY HH:mm:ss");
                                    $("#modalAgenda input[name='inicio']").val(start);
                                    let end = moment(ele.event.end).format("DD/MM/YYYY HH:mm:ss");
                                    $("#modalAgenda input[name='fim']").val(end);
                                    let tipo = ele.event.extendedProps.tipo_consulta;
                                    $("#modalAgenda select[name='tipo'][option]").val(tipo);
                                    let fk_paciente = ele.event.extendedProps.fk_paciente;
                                    // $('#searchPac').attr('data-paciente', fk_paciente);
                                    $("#modalAgenda input[name='fk_paciente']").val(fk_paciente);
                                    let id = ele.event.id;
                                    $("#modalAgenda input[name='id_agenda']").val(id);
                                    let fk_medico = ele.event.extendedProps.fk_medico;
                                    $("#modalAgenda input[name='fk_medico']").val(fk_medico);
                                },
                                select: function(ele) {
                                    resetForm('formAgenda');
                                    console.log(ele)
                                    $('#modalAgenda').modal('show')
                                    $("#modalAgenda #tituloAgenda").text('Agendar Consulta');
                                    $("#modalAgenda button.delete-event").css("display", "none");
                                    let start = moment(ele.start).format("DD/MM/YYYY HH:mm:ss");
                                    $("#modalAgenda input[name='inicio']").val(start);
                                    let end = moment(ele.end).format("DD/MM/YYYY HH:mm:ss");
                                    $("#modalAgenda input[name='fim']").val(end);


                                },
                                events: result

                            }) //Primeiro calendario
                            //Veridica se ja existe um objeto calendar
                        if ($('#calendar').is(':empty')) {
                            ObjetoCalender.render();
                        } else {
                            //Cria e destroi novamente calendar
                            ObjetoCalender.destroy();
                            $('#calendar').html('');
                            //2
                            ObjetoCalender = new Calendar(calendarEl, {
                                plugins: ['interaction', 'dayGrid', 'timeGrid', 'list'],
                                header: {
                                    left: 'prev,next today',
                                    center: 'title',
                                    right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
                                },
                                locale: 'pt-br',
                                navLinks: true,
                                selectable: true,
                                editable: false,
                                disableDragging: true,
                                droppable: false, // this allows things to be dropped onto the calendar
                                drop: function(arg) {
                                    // is the "remove after drop" checkbox checked?
                                    if (document.getElementById('drop-remove').checked) {
                                        // if so, remove the element from the "Draggable Events" list
                                        arg.draggedEl.parentNode.removeChild(arg.draggedEl);
                                    }
                                },
                                eventClick: function(ele) {
                                    resetForm('formAgenda');
                                    $('#modalAgenda').modal('show');
                                    $("#modalAgenda #tituloAgenda").text('Remarcar Consulta');
                                    let nome = ele.event.title;
                                    $("#modalAgenda input[name='nome']").val(nome);
                                    let start = moment(ele.event.start).format("DD/MM/YYYY HH:mm:ss");
                                    $("#modalAgenda input[name='inicio']").val(start);
                                    let end = moment(ele.event.end).format("DD/MM/YYYY HH:mm:ss");
                                    $("#modalAgenda input[name='fim']").val(end);
                                    let tipo = ele.event.extendedProps.tipo_consulta;
                                    $("#modalAgenda select[name='tipo']").val(tipo);
                                    let fk_paciente = ele.event.extendedProps.fk_paciente;
                                    $('#searchPac').attr('data-paciente', fk_paciente);
                                    $("#modalAgenda input[name='fk_paciente']").val(fk_paciente);
                                    let id = ele.event.id;
                                    $("#modalAgenda input[name='id_agenda']").val(id);
                                    let fk_medico = ele.event.extendedProps.fk_medico;
                                    $("#modalAgenda input[name='fk_medico']").val(fk_medico);
                                },
                                select: function(ele) {
                                    resetForm('formAgenda');
                                    $('#modalAgenda').modal('show')
                                    $("#modalAgenda #tituloAgenda").text('Agendar Consulta');
                                    $("#modalAgenda button.delete-event").css("display", "none");
                                    let start = moment(ele.start).format("DD/MM/YYYY HH:mm:ss");
                                    $("#modalAgenda input[name='inicio']").val(start);
                                    let end = moment(ele.end).format("DD/MM/YYYY HH:mm:ss");
                                    $("#modalAgenda input[name='fim']").val(end);

                                },
                                events: result

                            })
                            ObjetoCalender.render();
                        }
                    })
                });
            })
    })
});