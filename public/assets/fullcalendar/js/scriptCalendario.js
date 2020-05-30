document.addEventListener('DOMContentLoaded', function() {
    //chamada ajax
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

    $(".paciente-consulta > i").click(function() {
        let id = this.id
        getDataAjax('../consuta/index', id).then(function(result) {
            console.log('secesso');
        })

    })

    function atualizarCalendar(data) {
        getDataAjax('../api/atualizarAgenda', data).then(function(result) {
                console.log(result, 'resultado')
                var Calendar = FullCalendar.Calendar
                var ObjetoCalender
                var calendarEl = document.getElementById('calendar');
                console.log(result, 'df')
                    //1
                ObjetoCalender = new Calendar(calendarEl, {
                        plugins: ['interaction', 'timeGrid', 'list'],
                        header: {
                            left: 'prev,next today',
                            center: 'title',
                            right: 'timeGridWeek,timeGridDay,listWeek'
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
                            $("#messagem").text('');
                            $("#sucess").text('');
                            $('#modalAgenda').modal('show');
                            $("#modalAgenda #tituloAgenda").text('Remarcar Consulta');
                            $("#modalAgenda button.delete-event").css("display", "block");
                            let nome = ele.event.title;
                            $("#modalAgenda input[name='nome']").val(nome);
                            let start = moment(ele.event.start).format("DD/MM/YYYY HH:mm");
                            $("#modalAgenda input[name='inicio']").val(start);
                            let end = moment(ele.event.end).format("DD/MM/YYYY HH:mm");
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
                            $("#messagem").text('');
                            $("#sucess").text('');
                            $('#modalAgenda').modal('show')
                            $("#modalAgenda #tituloAgenda").text('Agendar Consulta');
                            $("#modalAgenda button.delete-event").css("display", "none");
                            let start = moment(ele.start).format("DD/MM/YYYY HH:mm");
                            $("#modalAgenda input[name='inicio']").val(start);
                            let end = moment(ele.end).format("DD/MM/YYYY HH:mm");
                            $("#modalAgenda input[name='fim']").val(end);
                            let idMedico = $("#medicoSelect input[name='fk_medico']").val();
                            $("#modalAgenda input[name='fk_medico']").val(idMedico);
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
                        plugins: ['interaction', 'timeGrid', 'list'],
                        header: {
                            left: 'prev,next today',
                            center: 'title',
                            right: 'timeGridWeek,timeGridDay,listWeek'
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
                            $("#messagem").text('');
                            $("#sucess").text('');
                            $('#modalAgenda').modal('show');
                            $("#modalAgenda #tituloAgenda").text('Remarcar Consulta');
                            let nome = ele.event.title;
                            $("#modalAgenda input[name='nome']").val(nome);
                            let start = moment(ele.event.start).format("DD/MM/YYYY HH:mm");
                            $("#modalAgenda input[name='inicio']").val(start);
                            let end = moment(ele.event.end).format("DD/MM/YYYY HH:mm");
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
                            $("#messagem").text('');
                            $("#sucess").text('');
                            $('#modalAgenda').modal('show')
                            $("#modalAgenda #tituloAgenda").text('Agendar Consulta');
                            $("#modalAgenda button.delete-event").css("display", "none");
                            let start = moment(ele.start).format("DD/MM/YYYY HH:mm");
                            $("#modalAgenda input[name='inicio']").val(start);
                            let end = moment(ele.end).format("DD/MM/YYYY HH:mm");
                            $("#modalAgenda input[name='fim']").val(end);
                            let idMedico = $("#medicoSelect input[name='fk_medico']").val();
                            $("#modalAgenda input[name='fk_medico']").val(idMedico);

                        },
                        events: result

                    })
                    ObjetoCalender.render();
                }
            }) //fim do ajax
    }

    //Mascaras para os campos de formulario marcacao de consulta
    $('.date-time').mask('00 /00 / 0000 00:00');


    function resetForm(classe) {
        $(`.${classe}`)[0].reset();
    }

    //busca paciente
    $("#searchPac").keyup(async function() {

        let keys = $('#searchPac').val()
        data = {
            key: keys,
        };
        getDataAjax('../api/buscaPaciente', data).then(function(result) {
            let input = '';
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
                $("#inputPesqPac input[name='nome']").val(e.target.innerText); //insere o resultado  no campo
                $("#modalAgenda input[name='fk_paciente']").val(idPac);
                //$('#searchPac').attr('data-paciente', idPac);
                $("#resulPac").html(''); //limpa a div
            })

        })
    });

    function loadErros(response) {
        $("#sucess").text('');
        let boxAlert = `<div class="alert alert-danger error">`
        for (let field in response) {
            console.log(field);
            boxAlert += `<span>${response[field]}</span><br/>`;
        }
        boxAlert += `</div>`
        console.log(boxAlert)
        return boxAlert.replace(/\,/g, "</br>");

    }

    function loadSave(response) {
        $("#messagem").text('');
        let boxAlert = `<div class="alert alert-success success">`
        boxAlert += `<p>${response}</p>`;
        boxAlert += `</div>`
        console.log(boxAlert);
        return boxAlert;
    }
    //delete elementos
    $(".delete-event").click(function() {
            let id = $("#modalAgenda input[name='id_agenda']").val();
            let fk_medico = $("#modalAgenda input[name='fk_medico']").val();
            let agenda = {
                id_agenda: id,
                _method: 'DELETE',
                fk_medico: fk_medico
            }
            getDataAjax('../consulta/ExcluirAgenda', agenda).then(function(resp) {
                let data = {
                    id: resp,
                };
                atualizarCalendar(data);
                $(".success").fadeIn(300).delay(1500).fadeOut(400);
            })
        })
        //Salvar consulta/editar
    $(".delete-save").click(function() {

        let agenda = {
            title: '',
            start: '',
            end: '',
            tipo_consulta: '',
            fk_paciente: '',
            fk_medico: ''
        }
        let id = $("#modalAgenda input[name='id_agenda']").val();
        agenda.title = $("#modalAgenda input[name='nome']").val();
        agenda.start = moment($("#modalAgenda input[name='inicio']").val(), "DD/MM/YYYY HH:mm").format('YYYY/MM/DD HH:mm');
        agenda.end = moment($("#modalAgenda input[name='fim']").val(), "DD/MM/YYYY HH:mm").format('YYYY/MM/DD HH:mm');
        agenda.tipo_consulta = $("#modalAgenda select[name='tipo']").val();
        agenda.fk_paciente = $("#modalAgenda input[name='fk_paciente']").val();
        agenda.fk_medico = $("#modalAgenda input[name='fk_medico']").val();

        if (id == '') {
            getDataAjax('../consulta/InsereAgenda', agenda).then(function(resp) {
                    let data = {
                        id: resp,
                    };
                    atualizarCalendar(data);
                    $('#sucess').html(loadSave('A consulta foi agendada com sucesso!'))
                })
                .catch(function(data) {
                    $('#messagem').html(loadErros(data.responseJSON.errors));
                });

        } else {
            console.log('editar')
            agenda.agenda_id = id;
            agenda._method = "PUT";
            getDataAjax('../consulta/AtualizarAgenda', agenda).then(function(resp) {
                    let data = {
                        id: resp,
                    };

                    atualizarCalendar(data)
                    $('#sucess').html(loadSave('A consulta foi remarcada com sucesso!'))
                })
                .catch(function(data) {
                    $('#messagem').html(loadErros(data.responseJSON.errors));
                });

        }
    });

    /*pesquisa medicos*******************************************************************/
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
                        $('#fk_medico').val(idMed);
                        $("#resultMed").html(''); //limpa a div
                        console.log(data, 'data');
                        atualizarCalendar(data);
                    });
                })
                .catch(function(data) {
                    console.log(data, 'dfd')
                });
        })
        //Pesquisa Medicamento
    $("#buscaMedicamento").keyup(async function() {

            let keys = $('#buscaMedicamento').val()
            data = {
                key: keys,
            };

            //console.log(data)
            getDataAjax('../../api/buscaMedicamento', data).then(function(result) {
                console.log(result, 'fdf')
                let input = '';
                result.map(function(index) {
                    input += `<ul id='listaMedicamentos'>`
                    input += `<li value='${index.med_id}' id='${index.med_id}'>${index.nome_fabrica}</li>`
                    input += `</ul>`
                })

                $("#resultMedicamento").html(input);
                if (keys == '') {
                    $("#resultMedicamento").html('')
                }
                $("#listaMedicamentos>li").click(function(e) {
                    let idMed = this.id;
                    data = {
                        id: idMed,
                    };

                    $("#inputPesqMedicamento > #buscaMedicamento").val(e.target.innerText); //insere o resultado  no campo
                    $("#idMedicamento").val(idMed);
                    $("#resultMedicamento").html(''); //limpa a div

                    //atualizarCalendar(data);
                });
            })
        }) //fechamento de busca medicamento

    //Post Medicamento
    $("#salvarReceita").click(function(e) {
        console.log('salvarCaonsuça');
        data = {
            _method: 'POST',
            qtd: 2,
            unidade: '100mg',
            via: 'oral',
            procedimento: 'tomar de duas em duas horas',
            fk_paciente: 8,
            fk_medico: 3,
            fk_medicamento: 3,
        };
        console.log(data);
        getDataAjax('../receita', data).then(function(result) {
            console.log('response')
        })


    })

});