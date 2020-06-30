document.addEventListener('DOMContentLoaded', function() {
    //chamada ajax

    function getDataAjax(url, data) {

        return new Promise(function(resolve, reject) {
            return request = $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                // dataType: 'json',
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

        var Calendar = FullCalendar.Calendar
        var calendarEl = document.getElementById('calendar');
        //1
        ObjetoCalender = new Calendar(calendarEl, {
                plugins: ['interaction', 'timeGrid', 'list'],
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'timeGridWeek,timeGridDay,listWeek'
                },
                locale: 'pt-br',
                minTime: "07:00:00",
                maxTime: "22:00:00",
                hiddenDays: [0],
                contentHeight: 'auto',
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
                //Ja possui algo
                eventClick: function(ele) {
                    ObjetoCalender.refetchEvents()
                    console.log('clicou 1');
                    resetForm('formAgenda');
                    $('#modalAgendaEdicao').modal('show');
                    $("#messagemEdicao").text('');
                    $("#modalAgenda #tituloAgenda").text('Remarcar Consulta');
                    //  $("#modalAgenda button.delete-event").css("display", "block");
                    let nome = ele.event.title;
                    $("#modalAgendaEdicao input[name='nome']").val(nome);
                    let start = moment(ele.event.start).format("DD/MM/YYYY HH:mm");
                    $("#modalAgendaEdicao input[name='inicio']").val(start);
                    let end = moment(ele.event.end).format("DD/MM/YYYY HH:mm");
                    $("#modalAgendaEdicao input[name='fim']").val(end);
                    let tipo = ele.event.extendedProps.tipo_consulta;
                    $("#modalAgendaEdicao select[name='tipo'][option]").val(tipo);
                    let fk_paciente = ele.event.extendedProps.fk_paciente;
                    // $('#searchPac').attr('data-paciente', fk_paciente);
                    $("#modalAgendaEdicao input[name='fk_paciente']").val(fk_paciente);
                    let id = ele.event.id;
                    $("#modalAgendaEdicao input[name='id_agenda']").val(id);
                    let fk_medico = ele.event.extendedProps.fk_medico;
                    $("#modalAgendaEdicao input[name='fk_medico']").val(fk_medico);
                },
                //Clica em lugar vazio
                select: function(ele) {
                    ObjetoCalender.refetchEvents()
                    resetForm('formAgenda');
                    // $("#messagemEdicao").text('');
                    //$("#sucess").text('');
                    $('#modalAgenda').modal('show')
                    $("#modalAgenda #tituloAgenda").text('Agendar Consulta');
                    // $("#modalAgenda button.delete-event").css("display", "none");
                    let start = moment(ele.start).format("DD/MM/YYYY HH:mm");
                    $("#modalAgenda input[name='inicio']").val(start);
                    let end = moment(ele.end).format("DD/MM/YYYY HH:mm");
                    $("#modalAgenda input[name='fim']").val(end);
                    let idMedico = $("#medicoSelect input[name='fk_medico']").val();
                    $("#modalAgenda input[name='fk_medico']").val(idMedico);
                },
                eventSources: [{
                        url: '../atualizarAgenda',
                        extraParams: {
                            data: data.id,
                        },
                        color: '#183153',
                    },

                ],
            }) //Primeiro calendario
            //Veridica se ja existe um objeto calendar
        if ($('#calendar').is(':empty')) {
            ObjetoCalender.render();
        } else {
            //Cria e destroi novamente calendar
            ObjetoCalender.destroy();
            $('#calendar').html('');
            //2*************************************************************22222222*********************************************
            ObjetoCalender = new Calendar(calendarEl, {
                plugins: ['interaction', 'timeGrid', 'list'],
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'timeGridWeek,timeGridDay,listWeek'
                },
                locale: 'pt-br',
                minTime: "07:00:00",
                maxTime: "22:00:00",
                contentHeight: 'auto',
                handleWindowResize: true,
                navLinks: true,
                hiddenDays: [0],
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
                    // console.log('clicou 1');
                    resetForm('formAgenda');
                    $("#messagemEdicao").text('');
                    $('#modalAgendaEdicao').modal('show');
                    $("#modalAgenda #tituloAgenda").text('Remarcar Consulta');
                    //  $("#modalAgenda button.delete-event").css("display", "block");
                    let nome = ele.event.title;
                    $("#modalAgendaEdicao input[name='nome']").val(nome);
                    let start = moment(ele.event.start).format("DD/MM/YYYY HH:mm");
                    $("#modalAgendaEdicao input[name='inicio']").val(start);
                    let end = moment(ele.event.end).format("DD/MM/YYYY HH:mm");
                    $("#modalAgendaEdicao input[name='fim']").val(end);
                    let tipo = ele.event.extendedProps.tipo_consulta;
                    $("#modalAgendaEdicao select[name='tipo'][option]").val(tipo);
                    let fk_paciente = ele.event.extendedProps.fk_paciente;
                    // $('#searchPac').attr('data-paciente', fk_paciente);
                    $("#modalAgendaEdicao input[name='fk_paciente']").val(fk_paciente);
                    let id = ele.event.id;
                    $("#modalAgendaEdicao input[name='id_agenda']").val(id);
                    let fk_medico = ele.event.extendedProps.fk_medico;
                    $("#modalAgendaEdicao input[name='fk_medico']").val(fk_medico);
                },
                //quando não tem nada
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
                eventSources: [{
                    url: '../atualizarAgenda',
                    extraParams: {
                        data: data.id,
                    },
                    color: '#183153',
                }],
            })

            ObjetoCalender.render();
        }
        // }) //fim do ajax
    }

    //Mascaras para os campos de formulario marcacao de consulta
    $('.date-time').mask('00 /00 / 0000 00:00');


    function resetForm(classe) {
        $(`.${classe}`)[0].reset();
    }

    //Edicao paciente
    $(".searchPac").keyup(async function() {

        let keys = $('.searchPac').val()
        data = {
            key: keys,
        };
        getDataAjax('../api/buscaPaciente', data).then(function(result) {
            let input = '';
            //  console.log(keys, 'tamanho')
            input += `<ul id='listaPacientes'>`
            result.map(function(index) {
                input += `<li value='${index.paciente_id}' id='${index.paciente_id}'> <i class="far fa-circle"></i> ${index.nome} </li>`
            })
            input += `</ul>`
            $(".resulPac").html(input);
            $(".resulPac").show();
            if (keys == '') {
                $(".resulPac").html('');
                $(".resulPac").hide();
            }
            $("#listaPacientes>li").click(function(e) {
                let idPac = this.id;
                $("#inputPesqPac input[name='nome']").val(e.target.innerText); //insere o resultado  no campo
                $("#modalAgenda input[name='fk_paciente']").val(idPac);
                //$('#searchPac').attr('data-paciente', idPac);
                $(".resulPac").html(''); //limpa a div
                $(".resulPac").hide();
            })

        })
    });
    //Adicao  Agenda
    $(".searchPacAdicao").keyup(async function() {

        let keys = $('.searchPacAdicao').val()
        data = {
            key: keys,
        };
        getDataAjax('../api/buscaPaciente', data).then(function(result) {
            let input = '';
            input += `<ul id='listaPacientes'>`
            result.map(function(index) {
                input += `<li value='${index.paciente_id}' id='${index.paciente_id}'> <i class="far fa-circle"></i> ${index.nome}</li>`
            })
            input += `</ul>`
            $(".resulPacAdicao").html(input);
            $(".resulPacAdicao").show();
            if (keys == '') {
                $(".resulPacAdicao").html('');
                $(".resulPacAdicao").hide();
            }
            $("#listaPacientes>li").click(function(e) {
                let idPac = this.id;
                $("#inputPesqPac input[name='nome']").val(e.target.innerText); //insere o resultado  no campo
                $("#modalAgenda input[name='fk_paciente']").val(idPac);
                $(".resulPacAdicao").hide();
                //$('#searchPacEdicao').attr('data-paciente', idPac);
                $(".resulPacAdicao").html(''); //limpa a div
            })

        })
    });

    function menuResultadoExame(dadosId) {
        console.log('aqui ja existe o meu')
        let dados = {
            id: dadosId,
        };
        $("#inserirResultadosExames").click(function() {
            getDataAjax('buscaResultados', dados).then(function(result) {
                $('#resultadosExames').html(result);
                $(`#fk_paciente_exame`).val(dados.id)
                menuResultadoExame(dados.id);
            })
        })
        $("#VisualizarResultadosExames").click(function() {
                getDataAjax('VisualizarResultadosMenu', dados).then(function(result) {
                    $('#resultadosExames').html(result);
                    $(`#fk_paciente_exame`).val(dados.id)
                    menuResultadoExame(dados.id);
                })
            })
            //VisualizarResultadosMenu
    }
    //Busca Paciente Exame
    $("#searchPacExame").keyup(async function() {

        let keys = $('#searchPacExame').val()

        let data = {
            key: keys,
        };
        getDataAjax('api/buscaPaciente', data).then(function(result) {

            let input = '';
            result.map(function(index) {
                input += `<ul id='listaPacientesExame'>`
                input += `<li value='${index.paciente_id}' id='${index.paciente_id}'>${index.nome}</li>`
                input += `</ul>`
            })
            $("#resulPacExame").html(input);
            if (keys == '') {
                $("#resulPacExame").html('');
            }
            $("#listaPacientesExame>li").click(function() {
                let dados = {
                    id: this.id,
                };
                $("#resulPacExame").html(''); //limpa a div
                getDataAjax('buscaResultados', dados).then(function(result) {
                    $('#resultadosExames').html(result);
                    $(`#fk_paciente_exame`).val(dados.id)
                    menuResultadoExame(dados.id)
                })
            })
        })
    });

    //Controle de erros da agenda
    function loadErros(div, response) {
        $(`${div}`).text('');
        console.log(response);
        let boxAlert = `<div class="alert alert-danger error">`
        for (let field in response) {

            boxAlert += `<span>${response[field]}</span><br/>`;
        }
        boxAlert += `</div>`
            // console.log(boxAlert)
        return boxAlert.replace(/\,/g, "</br>");

    }

    //delete elementos
    $("#excluirAgenda").click(function() {
        let id = $("#modalAgendaEdicao input[name='id_agenda']").val();
        let fk_medico = $("#modalAgendaEdicao input[name='fk_medico']").val();
        let agenda = {
            id_agenda: id,
            _method: 'DELETE',
            fk_medico: fk_medico
        }
        getDataAjax('../consulta/ExcluirAgenda', agenda).then(function(resp) {
            let data = {
                id: resp,
            };
            $('#modalAgendaEdicao').modal('hide')
            atualizarCalendar(data);
            $(".success").html("Consulta excluída com sucesso!")
            $(".success").fadeIn(300).delay(1700).fadeOut(400);
        })
    })

    //Salvar consulta Agenda
    $(".saveConsulta").click(function() {
        let agenda = {
            title: '',
            start: '',
            end: '',
            tipo_consulta: '',
            fk_paciente: '',
            fk_medico: ''
        }
        agenda.title = $("#modalAgenda input[name='nome']").val();
        agenda.start = moment($("#modalAgenda input[name='inicio']").val(), "DD/MM/YYYY HH:mm").format('YYYY/MM/DD HH:mm');
        agenda.end = moment($("#modalAgenda input[name='fim']").val(), "DD/MM/YYYY HH:mm").format('YYYY/MM/DD HH:mm');
        agenda.tipo_consulta = $("#modalAgenda select[name='tipo']").val();
        agenda.fk_paciente = $("#modalAgenda input[name='fk_paciente']").val();
        agenda.fk_medico = $("#modalAgenda input[name='fk_medico']").val();

        getDataAjax('../consulta/InsereAgenda', agenda).then(function(resp) {
                let data = {
                    id: resp,
                };
                atualizarCalendar(data);
                $('#modalAgenda').modal('hide');
                $(".success").html("Consulta agendada com sucesso!")
                $(".success").fadeIn(300).delay(1700).fadeOut(400);

            })
            .catch(function(data) {
                $('#messagem').html(loadErros('#sucess', data.responseJSON.errors));
            });
    });
    //Edicao consulta Agenda
    $(".atualizarConsulta").click(function() {
        let id = $("#modalAgendaEdicao input[name='id_agenda']").val();
        let url;
        let agenda = {
            title: '',
            start: '',
            end: '',
            tipo_consulta: '',
            fk_paciente: '',
            fk_medico: ''
        }
        agenda.title = $("#modalAgendaEdicao input[name='nome']").val();
        agenda.start = moment($("#modalAgendaEdicao input[name='inicio']").val(), "DD/MM/YYYY HH:mm").format('YYYY/MM/DD HH:mm');
        agenda.end = moment($("#modalAgendaEdicao input[name='fim']").val(), "DD/MM/YYYY HH:mm").format('YYYY/MM/DD HH:mm');
        agenda.tipo_consulta = $("#modalAgendaEdicao select[name='tipo']").val();
        agenda.fk_paciente = $("#modalAgendaEdicao input[name='fk_paciente']").val();
        agenda.fk_medico = $("#modalAgendaEdicao input[name='fk_medico']").val();
        console.log(id);
        agenda.agenda_id = id;
        agenda._method = "PUT";
        console.log(agenda)
        getDataAjax('../consulta/AtualizarAgendaEdicao', agenda).then(function(resp) {
                let data = {
                    id: resp,
                };
                $(".success").html("Consulta remarcada com sucesso!")
                $(".success").fadeIn(300).delay(1700).fadeOut(400);
                $('#modalAgendaEdicao').modal('hide')
                atualizarCalendar(data);
            })
            .catch(function(data) {
                $('#messagemEdicao').html(loadErros('#sucessEdicao', data.responseJSON.errors));
            });
    })

    /*pesquisa medicos*******************************************************************/
    $("#searchMed").keyup(async function() {

            let keys = $('#searchMed').val()
            let url
            data = {
                key: keys,
            };
            getDataAjax('../api/buscaMedicos', data)
                .then(function(result) {
                    let input = '';
                    result.map(function(index) {
                        input += `<ul id='listaMedicos'>`
                        input += `<li value='${index.medico_id}' id='${index.medico_id}'> <i class="far fa-circle"></i>  ${index.nome}</li>`
                        input += `</ul>`
                    })
                    $("#resultMed").html(input);
                    //Limpa se não houver resultados
                    $('.resultadoMedicos').show(); //mostra a div com a pesquisa
                    if (keys == '') {
                        $("#resultMed").html('');
                        $('.resultadoMedicos').hide()
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
                        $('.resultadoMedicos').hide()
                            /// console.log(data, 'data');
                            // url = '../atualizarAgenda',
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

                let input = '';
                input += `<ul id='listaMedicamentos'>`
                result.map(function(index) {
                    input += `<li value='${index.med_id}' id='${index.med_id}'>${index.nome_fabrica}</li>`
                })
                input += `</ul>`
                $("#resultMedicamento").html(input);
                $(".resultPesqMed").show();

                if (keys == '') {
                    $("#resultMedicamento").html('')
                    $(".resultPesqMed").hide();
                }
                $("#listaMedicamentos>li").click(function(e) {
                    let idMed = this.id;
                    data = {
                        id: idMed,
                    };

                    $("#inputPesqMedicamento > #buscaMedicamento").val(e.target.innerText); //insere o resultado  no campo
                    $("#idMedicamento").val(idMed);
                    $(".resultPesqMed").hide();
                    $("#resultMedicamento").html(''); //limpa a div

                    //atualizarCalendar(data);
                });
            })
        }) //fechamento de busca medicamento


    let listExames = [];


    $("#pesquisaExame").keyup(async function() {

        $('#resultExames').show();
        let keys = $('#pesquisaExame').val()
        data = {
            key: keys,
        };

        getDataAjax('../../api/buscaExame', data).then(function(result) {

            let input = '';
            let li = '';

            result.map(function(index) {
                input += `<ul id='listaExames'>`
                input += `<li value='${index.exame_id}' id='${index.exame_id}'>  ${index.nome_exame}</li>`
                input += `</ul>`
            })

            $("#resultExames").html(input);
            if (keys == '') {
                $("#resultExames").html('')
                $('#resultExames').hide();
            }

            $("#listaExames>li").click(function(e) {

                li = ''
                let exame = {
                    id: this.id,
                    nome: e.target.innerText
                }
                if (!listExames.some(entry => entry.id == this.id)) {
                    listExames.push(exame)
                } else {
                    for (i = 0; i < listExames.length; i++) {
                        if (listExames[i].id == this.id) {
                            listExames.splice(i, 1);
                        }
                    }
                }
                // li += `<div class='exclusao-exame'>`
                li += `<h4>Exame(s) selecionado(s)</h4>`
                listExames.map(function(item) {

                    li += `<input  type='hidden' name='exames-${item.id}'><li> <i id="${item.id}" class="fas fa-times-circle"></i> ${item.nome}</li></input>`


                })
                li += '';
                $('#examesSelect').html(li)
                $('#examesSelect').show();
                if (listExames == null || listExames.length == 0) {
                    $('#examesSelect').hide();
                }
                listExames.map(function(item, i) {
                    $(`#examesrequest input[name='exames-${item.id}']`).val(item.id);
                })
            })
        })
    });

    document.getElementById("examesSelect").addEventListener("click", function(e) {
        li = '';
        listExames.map(function(valor, i) {
            if (valor.id == e.target.childNodes[1].id) {
                listExames.splice(i, 1);
            }
        })
        li += `<h4>Exame(s) selecionado(s)</h4>`
        listExames.map(function(item) {
            li += `<input  type='hidden' name='exames-${item.id}'><li> <i id="${item.id}" class="fas fa-times-circle"></i> ${item.nome}</li></input>`
        })
        $('#examesSelect').html(li)
        if (listExames == null || listExames.length == 0) {
            $('#examesSelect').hide();
        }
    });




});