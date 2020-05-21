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
    $("#searchPac").keyup(async function() {
        console.log('teste');
    })

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
                $("#listaMedicos>li").click(function() {
                    let idMed = this.id;
                    data = {
                        id: idMed,
                    };
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
                                /* eventDrop: function(event) {
                                     alert('mudeou')
                                 },*/
                                eventClick: function(ele) {
                                    console.log(ele);
                                    $('#modalAgenda').modal('show');
                                    $("#modalAgenda #tituloAgenda").text('Editar Consulta');
                                    $("#modalAgenda button.delete-event").css("display", "flex");
                                    let nome = ele.event.title;
                                    $("#modalAgenda input[name='nome']").val(nome);

                                    let start = moment(ele.event.start).format("DD/MM/YYYY HH:mm:ss");
                                    $("#modalAgenda input[name='inicio']").val(start);
                                    let end = moment(ele.event.end).format("DD/MM/YYYY HH:mm:ss");
                                    $("#modalAgenda input[name='fim']").val(end);
                                },
                                select: function(event) {
                                    $('#modalAgenda').modal('show')
                                    $("#modalAgenda #tituloAgenda").text('Agendar Consulta');
                                    $("#modalAgenda button.delete-event").css("display", "none");
                                },
                                events: result

                            }) //Primeiro calendario

                        if ($('#calendar').is(':empty')) {
                            ObjetoCalender.render();
                        } else {
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
                                /*eventDrop: function(event) {
                                    alert('mudeou')
                                },*/
                                eventClick: function(ele) {
                                    console.log(event);
                                    $('#modalAgenda').modal('show');
                                    $("#modalAgenda #tituloAgenda").text('Editar Consulta');
                                    let nome = ele.event.title;
                                    $("#modalAgenda input[name='nome']").val(nome);
                                    let start = moment(ele.event.start).format("DD/MM/YYYY HH:mm:ss");
                                    $("#modalAgenda input[name='inicio']").val(start);
                                    let end = moment(ele.event.end).format("DD/MM/YYYY HH:mm:ss");
                                    $("#modalAgenda input[name='fim']").val(end);
                                },
                                select: function(event) {
                                    console.log('dfd')
                                    $('#modalAgenda').modal('show')
                                    $("#modalAgenda #tituloAgenda").text('Agendar Consulta');
                                    $("#modalAgenda button.delete-event").css("display", "none");
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