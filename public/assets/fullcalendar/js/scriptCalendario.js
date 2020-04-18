document.addEventListener('DOMContentLoaded', function() {
    var Calendar = FullCalendar.Calendar;
    var Draggable = FullCalendarInteraction.Draggable

    /* initialize the external events
    -----------------------------------------------------------------*/
    var containerEl = document.getElementById('external-events-list');
    new Draggable(containerEl, {
        itemSelector: '.fc-event',
        eventData: function(eventEl) {
            return {
                title: eventEl.innerText.trim()
            }
        }
    });

    var calendarEl = document.getElementById('calendar');
    var calendar = new Calendar(calendarEl, {
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
        events: [{
                "title": "All Day Event",
                "start": "2020-02-01"
            },
            {
                "title": "Long Event",
                "start": "2020-02-07",
                "end": "2020-02-10"
            },
            {
                "id": "999",
                "title": "Repeating Event",
                "start": "2020-02-09T16:00:00-05:00"
            },
            {
                "id": "999",
                "title": "Repeating Event",
                "start": "2020-02-16T16:00:00-05:00"
            },
            {
                "title": "Conference",
                "start": "2020-02-11",
                "end": "2020-02-13"
            },
            {
                "title": "Meeting",
                "start": "2020-02-12T10:30:00-05:00",
                "end": "2020-02-12T12:30:00-05:00"
            },
            {
                "title": "Lunch",
                "start": "2020-02-12T12:00:00-05:00"
            },
            {
                "title": "Meeting",
                "start": "2020-02-12T14:30:00-05:00"
            },
            {
                "title": "Happy Hour",
                "start": "2020-02-12T17:30:00-05:00"
            },
            {
                "title": "Dinner",
                "start": "2020-02-12T20:00:00"
            },
            {
                "title": "Birthday Party",
                "start": "2020-02-13T07:00:00-05:00"
            },
            {
                "title": "Click for Google",
                "url": "http://google.com/",
                "start": "2020-02-28"
            }
        ],

    });
    calendar.render();

});