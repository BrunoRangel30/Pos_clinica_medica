@extends('layouts.app')
<style>

    body {
      margin-top: 40px;
      font-size: 14px;
      font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
    }
  
   /* #wrap {
      width: 1100px;
      margin: 0 auto;
    }*/
  
    #external-events {
      float: left;
      width: 150px;
      padding: 0 10px;
      border: 1px solid #ccc;
      background: #eee;
      text-align: left;
    }
  
    #external-events h4 {
      font-size: 16px;
      margin-top: 0;
      padding-top: 1em;
    }
  
    #external-events .fc-event {
      margin: 10px 0;
      cursor: pointer;
    }
  
    #external-events p {
      margin: 1.5em 0;
      font-size: 11px;
      color: #666;
    }
  
    #external-events p input {
      margin: 0;
      vertical-align: middle;
    }
  
    /*#calendar {
      float: right;
      width: 900px;
    }*/

    /*CSS botão de pesquisa*/
    #custom-search-input{
        padding: 3px;
        border: solid 1px #E4E4E4;
        border-radius: 6px;
        background-color: #fff;
    }

    #custom-search-input input{
        border: 0;
        box-shadow: none;
    }

    #custom-search-input button{
        margin: 2px 0 0 0;
        background: none;
        box-shadow: none;
        border: 0;
        color: #666666;
        padding: 0 8px 0 10px;
        border-left: solid 1px #ccc;
    }

    #custom-search-input button:hover{
        border: 0;
        box-shadow: none;
        border-left: solid 1px #ccc;
    }

    #custom-search-input .glyphicon-search{
        font-size: 23px;
    }
  
</style>
<script>

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

    //// the individual way to do it
    // var containerEl = document.getElementById('external-events-list');
    // var eventEls = Array.prototype.slice.call(
    //   containerEl.querySelectorAll('.fc-event')
    // );
    // eventEls.forEach(function(eventEl) {
    //   new Draggable(eventEl, {
    //     eventData: {
    //       title: eventEl.innerText.trim(),
    //     }
    //   });
    // });

    /* initialize the calendar
    -----------------------------------------------------------------*/

    var calendarEl = document.getElementById('calendar');
    var calendar = new Calendar(calendarEl, {
      plugins: [ 'interaction', 'dayGrid', 'timeGrid', 'list' ],
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
      },
      editable: true,
      droppable: true, // this allows things to be dropped onto the calendar
      drop: function(arg) {
        // is the "remove after drop" checkbox checked?
        if (document.getElementById('drop-remove').checked) {
          // if so, remove the element from the "Draggable Events" list
          arg.draggedEl.parentNode.removeChild(arg.draggedEl);
        }
      }
    });
    calendar.render();

  });

</script>

@section('content')
    
    
    <div class='container'>
        <div class="row mb-5">
            <div class="col-md-6">
                <h3>Pesquise o Médico</h3>
                <div id="custom-search-input">
                    <div class="input-group col-md-12">
                        <input type="text" class="form-control input-lg" placeholder="Buscar" />
                        <span class="input-group-btn">
                            <button class="btn btn-info btn-lg" type="button">
                            </button>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <!-------------Calendario--------------->
        <div id='wrap'>
                <div id='external-events-list'></div>
                <div id='calendar'></div>
                <div style='clear:both'></div>
        </div>
    <div>
@endsection

