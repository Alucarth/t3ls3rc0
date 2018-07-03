var base_url = $("#base_url").val();

$('#fecha_nac').datepicker({
					    format: 'yyyy/mm/dd',
					    language:'es'
					});


$(function () {
	
	$("#nuevo_pac").on('click',function () {
		$.ajax({
			url: base_url+"index.php/Paciente/mostrar_f_nuevo_paciente",
			success: function  (data) {
				$(".form_new_pac").modal('show');
				$(".f_n_pac").empty();
				//var html = imprime_form_personal();
				$(".f_n_pac").html(data);
				$('.datepicker').datepicker({
					    format: 'yyyy/mm/dd',
					    language:'es'
					});
				$.fn.datepicker.dates['es'] = {
					    days: ["Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado"],
					    daysShort: ["Dom", "Lun", "Mar", "Mie", "Jue", "Vie", "Sab"],
					    daysMin: ["Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa"],
					    months: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
					    monthsShort: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
					    monthsTitle: "Meses",
						clear: "Borrar",
						weekStart: 1,
						format: "yyyy/mm/dd"
					};

				
			}
		});
		
	});
	$('#cancelar_f_pac_n').on('click',function  () {
		$(".form_new_pac").modal('hide');
		$(".f_n_pac").empty();
	});
	$('#guardar_f_pac_n').on('click',function () {
		
		/*var formulario_paciente  = new FormData($("#form_paciente")[0]);
		$.ajax({
			url: base_url+"index.php/Paciente/RegistrarDatosPaciente",
			type: 'POST',
			data: formulario_paciente,
			dataType:'json',
			contentType: false,
			processData:false,
				$(".form_new_pac").modal('hide');
				$(".f_n_pac").empty();
				html = imprime_tabla_paciente(data);
				tabla_paciente_r.empty();
				tabla_paciente_r.html(html);
				$('#tabla_paciente').DataTable({
					/*responsive:{
			            details: {
			                display: $.fn.dataTable.Responsive.display.childRowImmediate,
			                type: ''
			            }
			        },*//*
					"language": {"sProcessing":     "Procesando...",
											"sLengthMenu":     "Mostrar  _MENU_  registros",
											"sZeroRecords":    "No se encontraron resultados",
											"sEmptyTable":     "Ningún dato disponible en esta tabla",
											"sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
											"sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
											"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
											"sInfoPostFix":    "",
											"sSearch":         "Buscar:",
											"sUrl":            "",
											"sInfoThousands":  ",",
											"sLoadingRecords": "Cargando...",
											"oPaginate": {
													"sFirst":    "Primero",
													"sLast":     "Último",
													"sNext":     "Siguiente",
													"sPrevious": "Anterior"
											},
											"oAria": {
													"sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
													"sSortDescending": ": Activar para ordenar la columna de manera descendente"
											}
											}
				});
				//alert(html);
				alert("Los datos fueron guardados");
			}
		});*/
	});
	$("#nuevo_fam").on('click',function () {
		$.ajax({
			url: base_url+"index.php/Paciente/mostrar_f_nuevo_familiar",
			success: function  (data) {
				$(".form_new_familiar").modal('show');
				$(".f_n_familiar").empty();
				//var html = imprime_form_personal();
				$(".f_n_familiar").html(data);
				
			}
		});
		
	});
	$('#cancelar_f_fam_n').on('click',function  () {
		$(".form_new_familiar").modal('hide');
		$(".f_n_familiar").empty();
	});
	$('#guardar_f_fam_n').on('click',function () {
		
		var formulario_familiar  = new FormData($("#form_familiar")[0]);
		$.ajax({
			url: base_url+"index.php/Paciente/RegistrarDatosFamiliar",
			type: 'POST',
			data: formulario_familiar,
			//dataType:'json',
			contentType: false,
			processData:false,
			success: function  (data) {
				$(".form_new_familiar").modal('hide');
				$(".f_n_familiar").empty();
				//html = imprime_tabla_familiar(data);
				//tabla_paciente_r.empty();
				//tabla_paciente_r.html(html);
				/*$('#tabla_paciente').DataTable({
					/*responsive:{
			            details: {
			                display: $.fn.dataTable.Responsive.display.childRowImmediate,
			                type: ''
			            }
			        },*/
					/*"language": {"sProcessing":     "Procesando...",
											"sLengthMenu":     "Mostrar  _MENU_  registros",
											"sZeroRecords":    "No se encontraron resultados",
											"sEmptyTable":     "Ningún dato disponible en esta tabla",
											"sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
											"sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
											"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
											"sInfoPostFix":    "",
											"sSearch":         "Buscar:",
											"sUrl":            "",
											"sInfoThousands":  ",",
											"sLoadingRecords": "Cargando...",
											"oPaginate": {
													"sFirst":    "Primero",
													"sLast":     "Último",
													"sNext":     "Siguiente",
													"sPrevious": "Anterior"
											},
											"oAria": {
													"sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
													"sSortDescending": ": Activar para ordenar la columna de manera descendente"
											}
											}
				});*/
				//alert(html);
				alert("Los datos fueron guardados");
			}
		});
	});
	$('#tabla_paciente').DataTable({
		/*responsive:{
			            details: {
			                display: $.fn.dataTable.Responsive.display.childRowImmediate,
			                type: ''
			            }
			        },*/
		"language": {
			"sProcessing":     "Procesando...",
			"sLengthMenu":     "Mostrar  _MENU_  registros",
			"sZeroRecords":    "No se encontraron resultados",
			"sEmptyTable":     "Ningún dato disponible en esta tabla",
			"sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
			"sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
			"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
			"sInfoPostFix":    "",
			"sSearch":         "Buscar:",
			"sUrl":            "",
			"sInfoThousands":  ",",
			"sLoadingRecords": "Cargando...",
			"oPaginate": {
					"sFirst":    "Primero",
					"sLast":     "Último",
					"sNext":     "Siguiente",
					"sPrevious": "Anterior"
			},
			"oAria": {
					"sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
					"sSortDescending": ": Activar para ordenar la columna de manera descendente"
			}
		}
	});
	
			
});
var tabla_paciente_r = $("#paciente");
var imprime_tabla_paciente = function  (data) {
	html = '';
	html += '<br> <br>'
	html += '<table id="tabla_paciente" cellpadding="0" cellspacing="0" border="0" class="table table-striped responsive-utilities jambo_table">';
	html += '<thead>';
        html += '<tr> ';
        html += '<th align="left"PACIENTE</th>';
        html += '<th align="left">ESPECIE</th>';
        html += '<th align="left">GÉNERO</th>';
        html += '<th align="left">CARACTERÍSTICA</th>';
        html += '<th align="left">FAMILIAR DEL PACIENTE</th>';
        html += '<th align="left"></th>';
		html += '<th align="left"></th>';
		html += '<th align="left"></th>';
        html += '</tr> ';
    html += '</thead>';
    html += '<tbody>';
	for (var i = 0 ; i < data.length; i++) {
            html +='<tr>';
				
	            html += '<td >'+data[i]["nombrePaciente"]+'</td>';
				html += '<td >'+data[i]["nombreAnimal"]+'</td>';
				html += '<td >'+data[i]["sexo"]+'</td>';
				html += '<td >'+data[i]["RasgoEspecifico1"]+'</td>';
				html += '<td >'+data[i]["nombreFamiliar"]+" "+data[i]["apPaternoFamiliar"]+" "+data[i]["apMaternoFamiliar"]+'</td>';
				if (data[i]["estado"]=='Activo') {
					html += '<td><button type="button" class="btn btn-danger" onclick="dar_baja('+data[i]["idPaciente"]+')">DAR BAJA</button></td>';
					html += '<td><button type="button" class="btn btn-danger" onclick="editar_paciente('+data[i]["idPaciente"]+')">Editar Paciente</button></td>';
					html += '<td><button type="button" class="btn btn-danger" onclick="editar_familiar('+data[i]["idPaciente"]+')">Editar Familiar</button></td>';
				}
				else{
					html += '<td><button type="button" class="btn" disable="">INACTIVO</button></td>';
				}
				html += '<td><button type="button" class="btn btn-danger" onclick="editar_familiar('+data[i]["idPaciente"]+')">Editar Familiar</button></td>';
	           
	         
            html +='</tr>';
	}
	html += '</tbody>';
	html += '</table>';
	return html;
};

var dar_baja = function  (id) {
		alert(id);
		/*//alert("Holaaaa");
		//var data= id;
		$.ajax({
				url: base_url+"index.php/Paciente/Editar_f_especie",
				data: ('id='+id),
				//type: 'POST',
				//dataType:'json',
				success: function  (data) {
					$(".form_edit_especie").modal('show');
					$(".f_especie_e").empty();
					//var html = imprime_form_personal();
					$(".f_especie_e").html(data);
					
				}
			});*/
	}

var editar_paciente = function  (id) {
		alert(id);
		/*//alert("Holaaaa");
		//var data= id;
		$.ajax({
				url: base_url+"index.php/Paciente/Editar_f_paciente",
				data: ('id='+id),
				//type: 'POST',
				//dataType:'json',
				success: function  (data) {
					$(".form_edit_pac").modal('show');
					$(".f_paciente_e").empty();
					//var html = imprime_form_personal();
					$(".f_paciente_e").html(data);
					
				}
			});*/
	}
var editar_familiar= function  (id) {
		//alert(id);
		alert("Holaaaa");

		//var data= id;
		/*$.ajax({
				url: base_url+"index.php/Paciente/Editar_f_familiar",
				data: ('id='+id),
				//type: 'POST',
				//dataType:'json',
				success: function  (data) {
					$(".form_edit_fam").modal('show');
					$(".f_familiar_e").empty();
					//var html = imprime_form_personal();
					$(".f_familiar_e").html(data);
					
				}
			});*/
	}

function FichaClinica (id)
{	
	//$('#modal_ficha_clinica').modal('show');
	//console.log('abriendo pinche modal');
	//$(".modal_ficha_clinica").modal('show');
	//alert("Este es el id"+id);
	console.log(direccion);
	console.log('ficha clinica n'+id);
	$.ajax({
				url: base_url+"index.php/Paciente/FichaClinica",
				data: ('id='+id),
				type: 'POST',
				//dataType:'json',
				success: function  (data) {

					console.log('Respuesta del servidor'+data);
					var resultado = JSON.parse(data);
					
					var paciente = resultado.paciente;
					var imagen = resultado.imagen;
					var consultas = resultado.consultas;
					//console.log(data);
					console.log('Datos------------------------> consultas '+consultas.length);
					console.log(consultas);
					//console.log(imagen);
					console.log(paciente);
					$("#modal_ficha_clinica").modal('show');
					console.log('Abriendo MOdals');

					$(".f_ficha_clinica").empty();

					$(".f_ficha_clinica").append('<div class="embed-container"><iframe id="contenido_ficha" frameborder="0" width="500" height="400"> </iframe></div>');

					// var imgData = 'data:image/jpeg;base64,'+ Base64.encode(direccion+'/uploads/'+paciente.Foto);
					// console.log(imgData);

					 var d = new jsPDF();
					    d.text(' Qhana ',10,10);
					    d.setFont('times','normal');
					    d.setFontSize(10);
					    d.text('Fecha: ',160,10);
					    d.setFont('courier','normal');
					    d.setFontSize(11);
					    d.rect(9,12,190,0);

					    //----cuerpo del informe
					    d.text("FICHA CLÍNICA",10,20);
					    d.text("Nombre:"+paciente.NombrePaciente,10,30);
					    d.text("Sexo:"+paciente.Sexo,10,40);
					    d.text("Edad "+calcularEdad(paciente.Edad),10,50);
					    d.addImage(imagen,'JPEG',150, 15, 40,40);
					    var x,y;
					    x= 10;
					    y=60;
					    //d.text('_____________________________________________',x,y);
					    for(i=0;i<consultas.length;i++)
					    {	
					    	console.log("iterando "+i);
					    	d.text('Consulta',x,y-2);
					    	d.text('_______________________________________________________________________________',x,y);
					    	y=y+7;
					    	d.text('Peso: '+consultas[i].peso,x,y);
					    	d.text('Temperatura: '+consultas[i].peso,x+100,y);
					    	y=y+7;
					    	d.text('Motivo: '+consultas[i].motivo,x,y);
					    	d.text('Dias de Tratamiento: '+consultas[i].diasTratamiento,x+100,y);
					    	y=y+7;
					    	d.text('Enfermedad Actual: '+consultas[i].enfermedadActual,x,y);
					    	y=y+7;
					    	d.text('Diagnostico Principal: '+consultas[i].diagnosticoPrincipal,x,y);
					    	y=y+7;
					    	d.text('Diagnostico Secundario: '+consultas[i].diagnosticoSecundario,x,y);
					    	y=y+7;
					    	d.text('Radiografia: '+consultas[i].radiografia,x,y);
					    	y=y+7;
					    	d.text('Ecografia: '+consultas[i].ecografia,x,y);
					    	y=y+7;
					    	d.text('Laboratorio: '+consultas[i].laboratorio,x,y);
					    	y=y+7;
					    	d.text('Medicacion: '+consultas[i].medicacion,x,y);
					    	y=y+7;
					    	d.text('Indicacion: '+consultas[i].indicacion,x,y);
					    	y=y+7;
					    	d.text('Ecografia: '+consultas[i].ecografia,x,y);
					    	y=y+7;
					    	d.text('Medico Tratande: '+consultas[i].nombrePersonal+' '+consultas[i].apPaternoPersonal+' '+consultas[i].apMaternoPersonal,x,y);
					    	y=y+7;
					    }

					   
					    var cadena = d.output('datauristring');

					    $('#contenido_ficha').attr('src', cadena);

					//var html = imprime_form_personal();
					//$(".f_ficha_clinica").html(data);
					
				}
			});
	

}

function ControlPaciente(id)
{
	console.log(direccion );
	console.log('ficha clinica n'+id);
	$.ajax({
				url: base_url+"index.php/Paciente/ControlPaciente",
				data: ('id='+id),
				type: 'POST',
				//dataType:'json',
				success: function  (data) {

					console.log('Respuesta del servidor'+data);
					var resultado = JSON.parse(data);
					
					var paciente = resultado.paciente;
					var imagen = resultado.imagen;
					var consultas = resultado.consultas;
					//console.log(data);
					console.log('Datos------------------------> consultas '+consultas.length);
					console.log(consultas);

					var despar = new Array();
					var vacunas = new Array();
					var control = new Array();

					for(i=0;i<consultas.length;i++)
					{
						switch(consultas[i].motivo)
						{
							case 'vacuna':
								vacunas.push(consultas[i]);
							break;
							case 'desparasitacion':
								despar.push(consultas[i]);
							break;
							case 'control de celo':
								control.push(consultas[i]);
								break;
						}
						
					}	
					console.log(vacunas);
					console.log(despar);
					console.log(control);
					//console.log(imagen);
					console.log(paciente);
					$("#modal_ficha_clinica").modal('show');
					console.log('Abriendo MOdals');

					$(".f_ficha_clinica").empty();

					$(".f_ficha_clinica").append('<div class="embed-container"><iframe id="contenido_ficha" frameborder="0" width="500" height="400"> </iframe></div>');

					// var imgData = 'data:image/jpeg;base64,'+ Base64.encode(direccion+'/uploads/'+paciente.Foto);
					// console.log(imgData);

					 var d = new jsPDF();
					    d.text(' Qhana ',10,10);
					    d.setFont('times','normal');
					    d.setFontSize(10);
					    d.text('Fecha: ',160,10);
					    d.setFont('courier','normal');
					    d.setFontSize(11);
					    d.rect(9,12,190,0);

					    //----cuerpo del informe
					    d.text("FICHA CLÍNICA",10,20);
					    d.text("Nombre:"+paciente.NombrePaciente,10,30);
					    d.text("Sexo:"+paciente.Sexo,10,40);
					    d.text("Edad "+calcularEdad(paciente.Edad),10,50);
					    d.addImage(imagen,'JPEG',150, 15, 40,40);
					    var x,y;
					    x= 10;
					    y=60;


					    //encabezado
				    	d.rect(x,y,170,6);
				    	d.text('DESPARASITACIÓN',x+50,y+4);
				    	y=y+6;

				    	d.rect(x,y,58,6);
					    d.rect(x+58,y,90,6);
					    d.rect(x+90+58,y,22,6);

					    d.text('Fecha',x+4,y+4)
					    d.text('Observacion',x+4+58,y+4);
					    d.text('Peso ',x+58+4+90,y+4);
					    y = y+6;
						  //  d.rect(x+90+22+90,y,35,6);

					    //d.text('_____________________________________________',x,y);
					    for(i=0;i<despar.length;i++)
					    {	
					    	console.log("iterando "+i);
					    	d.rect(x,y,58,6);
						    d.rect(x+58,y,90,6);
						    d.rect(x+90+58,y,22,6);

						    d.text(''+despar[i].fechaConsulta,x+4,y+4)
						    d.text(''+despar[i].observaciones,x+4+58,y+4);
						    d.text(''+despar[i].peso ,x+58+4+90,y+4);
						    y = y+6;
					    
					    }
					    y=y+6;

					    d.rect(x,y,170,6);
				    	d.text('Control de Celo',x+50,y+4);
				    	y=y+6;

				    	d.rect(x,y,58,6);
					    d.rect(x+58,y,90,6);
					    d.rect(x+90+58,y,22,6);

					    d.text('Fecha',x+4,y+4)
					    d.text('Observacion',x+4+58,y+4);
					    d.text('Peso ',x+58+4+90,y+4);
					    y = y+6;
					    for(i=0;i<control.length;i++)
					    {	
					    	console.log("iterando "+i);
					    	d.rect(x,y,58,6);
						    d.rect(x+58,y,90,6);
						    d.rect(x+90+58,y,22,6);

						    d.text(''+control[i].fechaConsulta,x+4,y+4)
						    d.text(''+control[i].observaciones,x+4+58,y+4);
						    d.text(''+control[i].peso ,x+58+4+90,y+4);
						    y = y+6;
					    
					    }
					   	

					     y=y+6;

					    d.rect(x,y,170,6);
				    	d.text('Vacunas',x+50,y+4);
				    	y=y+6;

				    	d.rect(x,y,58,6);
					    d.rect(x+58,y,90,6);
					    d.rect(x+90+58,y,22,6);

					    d.text('Fecha',x+4,y+4)
					    d.text('Observacion',x+4+58,y+4);
					    d.text('Peso ',x+58+4+90,y+4);
					    y = y+6;

					    for(i=0;i<vacunas.length;i++)
					    {	
					    	console.log("iterando "+i);
					    	d.rect(x,y,58,6);
						    d.rect(x+58,y,90,6);
						    d.rect(x+90+58,y,22,6);

						    d.text(''+vacunas[i].fechaConsulta,x+4,y+4)
						    d.text(''+vacunas[i].observaciones,x+4+58,y+4);
						    d.text(''+vacunas[i].peso ,x+58+4+90,y+4);
						    y = y+6;
					    
					    }

					    var cadena = d.output('datauristring');

					    $('#contenido_ficha').attr('src', cadena);

					//var html = imprime_form_personal();
					//$(".f_ficha_clinica").html(data);
					
				}
			});
}

function QrImage(id)
{
	console.log(direccion );
	console.log('ficha clinica n'+id);
	$.ajax({
				url: base_url+"index.php/Paciente/Qr",
				data: ('id='+id),
				type: 'POST',
				//dataType:'json',
				success: function  (data) {

					console.log('Respuesta del servidor'+data);
					var resultado = JSON.parse(data);
					
					var paciente = resultado.paciente;
					var imagen = resultado.imagen;
					
					$("#modal_ficha_clinica").modal('show');
					console.log('Abriendo MOdals');

					$(".f_ficha_clinica").empty();

					$(".f_ficha_clinica").append('<div class="embed-container"><iframe id="contenido_ficha" frameborder="0" width="500" height="400"> </iframe></div>');

					// var imgData = 'data:image/jpeg;base64,'+ Base64.encode(direccion+'/uploads/'+paciente.Foto);
					// console.log(imgData);

					 var d = new jsPDF();
					    d.text(' Qhana ',10,10);
					    d.setFont('times','normal');
					   // d.setFontSize(10);
					   //d.text('Fecha: ',160,10);
					    d.setFont('courier','normal');
					    d.setFontSize(11);
					    d.rect(9,12,190,0);

					    //----cuerpo del informe
					    d.text("Codigo QR",10,20);
					    d.text("Nombre:"+paciente.NombrePaciente,10,30);
					    d.text("Sexo:"+paciente.Sexo,10,40);
					    d.text("Familiar "+paciente.nombreFamiliar+" "+paciente.apPaternoFamiliar+" "+paciente.apMaternoFamiliar ,10,50);
					    d.addImage(imagen,'PNG',150, 15, 0,0);
					    var x,y;
					    x= 10;
					    y=60;


					    //encabezado
				    	

					    var cadena = d.output('datauristring');

					    $('#contenido_ficha').attr('src', cadena);

					//var html = imprime_form_personal();
					//$(".f_ficha_clinica").html(data);
					
				}
			});
}



$(document).ready(function() {

    // var informe  = <?php echo json_encode($informe); ?>;
    // var nro_recibos = <?php echo json_encode($nro_recibos); ?>;
    // var total = <?php echo json_encode($total); ?>;
    //console.log(items);

    // var d = new jsPDF();
    // d.text(' Qhana ',10,10);
    //  d.setFont('times','normal');
    //    d.setFontSize(10);
    // d.text('Fecha: ',160,10);
    // d.setFont('courier','normal');
    // d.setFontSize(11);
    // d.rect(9,12,190,0);

    // //----cuerpo del informe
    // d.text("FICHA CLÍNICA",10,20);
    // d.text("Nombre:Sara Mabel Siles Calderón",10,30);




   
    // var cadena = d.output('datauristring');

    // $('iframe').attr('src', cadena);



});

/* funciones adcionales para el calculo de la edad */

function calcularEdad(fecha) {
        // Si la fecha es correcta, calculamos la edad

        if (typeof fecha != "string" && fecha && esNumero(fecha.getTime())) {
            fecha = formatDate(fecha, "yyyy-MM-dd");
        }

        var values = fecha.split("-");
        var dia = values[2];
        var mes = values[1];
        var ano = values[0];

        // cogemos los valores actuales
        var fecha_hoy = new Date();
        var ahora_ano = fecha_hoy.getYear();
        var ahora_mes = fecha_hoy.getMonth() + 1;
        var ahora_dia = fecha_hoy.getDate();

        // realizamos el calculo
        var edad = (ahora_ano + 1900) - ano;
        if (ahora_mes < mes) {
            edad--;
        }
        if ((mes == ahora_mes) && (ahora_dia < dia)) {
            edad--;
        }
        if (edad > 1900) {
            edad -= 1900;
        }

        // calculamos los meses
        var meses = 0;

        if (ahora_mes > mes && dia > ahora_dia)
            meses = ahora_mes - mes - 1;
        else if (ahora_mes > mes)
            meses = ahora_mes - mes
        if (ahora_mes < mes && dia < ahora_dia)
            meses = 12 - (mes - ahora_mes);
        else if (ahora_mes < mes)
            meses = 12 - (mes - ahora_mes + 1);
        if (ahora_mes == mes && dia > ahora_dia)
            meses = 11;

        // calculamos los dias
        var dias = 0;
        if (ahora_dia > dia)
            dias = ahora_dia - dia;
        if (ahora_dia < dia) {
            ultimoDiaMes = new Date(ahora_ano, ahora_mes - 1, 0);
            dias = ultimoDiaMes.getDate() - (dia - ahora_dia);
        }

        return edad + " años, " + meses + " meses y " + dias + " días";
    }
    function esNumero(strNumber) {
    if (strNumber == null) return false;
    if (strNumber == undefined) return false;
    if (typeof strNumber === "number" && !isNaN(strNumber)) return true;
    if (strNumber == "") return false;
    if (strNumber === "") return false;
    var psInt, psFloat;
    psInt = parseInt(strNumber);
    psFloat = parseFloat(strNumber);
    return !isNaN(strNumber) && !isNaN(psFloat);
}