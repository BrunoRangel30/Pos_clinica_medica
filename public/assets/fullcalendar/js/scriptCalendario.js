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

    function getDataAjax(url, data) {
        return new Promise(function(resolve, reject) {
            return request = $.ajax({
                type: 'post',
                dataType: 'json',
                url: url,
                data: data,
                success: resolve,
                error: reject
            });
        });
    }

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
                        var ObjetoCalender
                        var calendarEl = document.getElementById('calendar');
                        var eventObject = {
                            "title": result,
                            "start": "2020-05-19",
                            "end": "2020-05-19"
                        };

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
                                editable: true,
                                droppable: true, // this allows things to be dropped onto the calendar
                                drop: function(arg) {
                                    // is the "remove after drop" checkbox checked?
                                    if (document.getElementById('drop-remove').checked) {
                                        // if so, remove the element from the "Draggable Events" list
                                        arg.draggedEl.parentNode.removeChild(arg.draggedEl);
                                    }
                                },
                                eventDrop: function(event) {
                                    alert('mudeou')
                                },
                                eventClick: function(event) {
                                    $('#modalAgenda').modal('show')
                                },
                                select: function(event) {
                                    $('#modalAgenda').modal('show')
                                },
                                events: [eventObject]

                            }) //Primeiro calendario
                        if ($('#calendar').is(':empty')) {
                            ObjetoCalender.render();
                        } else {
                            ObjetoCalender.destroy();
                            $('#calendar').html('');
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
                                editable: true,
                                droppable: true, // this allows things to be dropped onto the calendar
                                drop: function(arg) {
                                    // is the "remove after drop" checkbox checked?
                                    if (document.getElementById('drop-remove').checked) {
                                        // if so, remove the element from the "Draggable Events" list
                                        arg.draggedEl.parentNode.removeChild(arg.draggedEl);
                                    }
                                },
                                eventDrop: function(event) {
                                    alert('mudeou')
                                },
                                eventClick: function(event) {
                                    $('#modalAgenda').modal('show')
                                },
                                select: function(event) {
                                    $('#modalAgenda').modal('show')
                                },
                                events: [eventObject]

                            })
                            ObjetoCalender.render();
                        }
                    })
                });
            })
    })
});