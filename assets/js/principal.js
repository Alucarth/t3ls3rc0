$(window).load(function () {    



                var date = new Date();
                var d = date.getDate();
                var m = date.getMonth();
                var y = date.getFullYear();
                var started;
                var categoryClass;
                // var citas = '';

                var eventos =new Array();

    
                 if(typeof citas !== 'undefined')
                 {
                     for (i = 0; i < citas.length; i++) { 
                    
                        var evento = {
                                      title:'CITA: '+ citas[i].NombrePaciente+ '-' +citas[i].descripcion ,
                                      start: citas[i].fecha +' '+citas[i].hora_inicio ,
                                      end: citas[i].fecha +' '+citas[i].hora_fin,
                                      // backgroundColor: "#f39c12", //red
                                      // borderColor: "#f39c12" //red
                                    };
                         console.log(evento);   
                          //  console.log('clololo,l ');
                         eventos.push(evento);        
                        //text += cars[i] + "<br>";
                    }
                 }

                 if(typeof cirugias !== 'undefined')
                 {
                     for (i = 0; i < cirugias.length; i++) { 
                    
                        var evento = {
                                      title: 'CIRUGÌA: '+cirugias[i].NombrePaciente+ '-' +cirugias[i].descripcion ,
                                      start: cirugias[i].fecha +' '+cirugias[i].hora_inicio ,
                                      end: cirugias[i].fecha +' '+cirugias[i].hora_fin,
                                       backgroundColor: "#f39c12", //red
                                       borderColor: "#f39c12" //red
                                    };
                         console.log(evento);   
                          //  console.log('clololo,l ');
                         eventos.push(evento);        
                        //text += cars[i] + "<br>";
                    }
                 }

               

                var calendar = $('#calendar').fullCalendar({
                    header: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'month,agendaWeek,agendaDay'
                    },
                    selectable: true,
                    selectHelper: true,

                    dayClick: function(date, jsEvent, view) {

                        $('#modalTitle').html('Agendar Cita');
                        $('#modalBody #fecha').val(date.format());

                         $('#fullCalModal').modal();

                        // alert('Clicked on: ' + );

                        // alert('Coordinates: ' + jsEvent.pageX + ',' + jsEvent.pageY);

                        // alert('Current view: ' + view.name);

                        // change the day's background color just for fun
                        // $(this).css('background-color', 'red');

                    },
            
                     eventClick: function(event){
                         $('#modalTitle').html(event.title);
                         $('#modalBody').html(event.description);
                         $('#fullCalModal').modal();
                     },
                    editable: true,
                    events: eventos
                });



});

//console.log('cargando funcionesasdasdasda XD ');

$(document).ready(function() {


    /* llenando los options de los del select de medicos*/


                 

    var medicosTxt = "";

    if(typeof medicos !== 'undefined')
    {
        for (i = 0; i < medicos.length; i++) { 

            medicosTxt = medicosTxt+'<option value='+medicos[i].idPersonal+' > '+medicos[i].nombrePersonal+' '+medicos[i].apPaternoPersonal+' '+medicos[i].apMaternoPersonal+' </option>';
                        
           
             console.log(medicosTxt);   
             
            
        }
    }   
    var tiposTxt = "";

    if(typeof tipos !== 'undefined')
    {    

        for (i = 0; i < tipos.length; i++) { 

            tiposTxt = tiposTxt+'<option value='+tipos[i].idTipoCirugia+' > '+tipos[i].descripcionCirugia+' Bs '+tipos[i].costo+'  </option>';
                        
           
             console.log(tiposTxt);   
             
            
        }
    }   

   $("#id_paciente").select2();

    console.log('cargando funciones XD ');

   $("#test").bind('click', function(){

  var $t = $(this);

    console.log(medicos);

      if($t.is(':checked')){
        // append item
        $('#items').append('<span> <br><label>Personal Medico:</label> <select name="id_medico" id="id_medico">'+medicosTxt+'</select><br><br> <label>Tipo de cirugia:</label> <select name="tipo_cirugia" id="tipo_cirugia">'+tiposTxt+' </select> </span>');
        
          $("#id_medico").select2();
          $("#tipo_cirugia").select2();

      }else{
        // empty div and remove it from DOM (empty helps with memory leak issues with remove() )
        $('span', '#items').empty().remove();
      }
    });


});

