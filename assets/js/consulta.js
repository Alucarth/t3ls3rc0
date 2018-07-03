var base_url = $("#base_url").val();
$(function () {
	
	$("#nueva_consulta").on('click',function () {
		$.ajax({
			url: base_url+"index.php/Ficha_clinica/mostrar_f_nueva_consulta",
			success: function  (data) {
				$(".form_new_consulta").modal('show');
				$(".f_n_consulta").empty();
				//var html = imprime_form_personal();
				$(".f_n_consulta").html(data);
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
	$('#cancelar_f_consulta_n').on('click',function  () {
		$(".form_new_consulta").modal('hide');
		$(".f_n_consulta").empty();
	});
	$('#guardar_f_consulta_n').on('click',function () {
		
		/*var formulario_paciente  = new FormData($("#form_paciente")[0]);
		$.ajax({
			url: base_url+"index.php/Paciente/RegistrarDatosPaciente",
			type: 'POST',
			data: formulario_paciente,
			dataType:'json',
			contentType: false,
			processData:false,
			success: function  (data) {
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
//pre-consulta 
$('#cancelar_f_pre_consulta').on('click',function  () {
		$(".form_pre_consulta").modal('hide');
		$(".f_pre_consulta").empty();
	});
	$('#guardar_f_pre_consulta').on('click',function () {
		
		/*var formulario_especie  = new FormData($("#form_especie")[0]);
		$.ajax({
			url: base_url+"index.php/Paciente/RegistrarDatosEspecie",
			type: 'POST',
			data: formulario_especie,
			dataType:'json',
			contentType: false,
			processData:false,
			success: function  (data) {
				$(".form_new_especie").modal('hide');
				$(".f_n_especie").empty();
				html = imprime_tabla_especie(data);

				tabla_especie_r.empty();
				tabla_especie_r.html(html);
				$('#tabla_paciente').DataTable({
					/*responsive:{
			            details: {
			                display: $.fn.dataTable.Responsive.display.childRowImmediate,
			                type: ''
			            }
			        },*/
				/*	"language": {"sProcessing":     "Procesando...",
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
	
	$('#cancelar_f_consulta_m').on('click',function  () {
		$(".form_consulta_medica").modal('hide');
		$(".f_consulta_m").empty();
	});
	$('#guardar_f_consulta_m').on('click',function () {
		
		/*var formulario_especie  = new FormData($("#form_especie")[0]);
		$.ajax({
			url: base_url+"index.php/Paciente/RegistrarDatosEspecie",
			type: 'POST',
			data: formulario_especie,
			dataType:'json',
			contentType: false,
			processData:false,
			success: function  (data) {
				$(".form_new_especie").modal('hide');
				$(".f_n_especie").empty();
				html = imprime_tabla_especie(data);

				tabla_especie_r.empty();
				tabla_especie_r.html(html);
				$('#tabla_paciente').DataTable({
					/*responsive:{
			            details: {
			                display: $.fn.dataTable.Responsive.display.childRowImmediate,
			                type: ''
			            }
			        },*/
				/*	"language": {"sProcessing":     "Procesando...",
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
	$('#tabla_consulta').DataTable({
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
var tabla_consulta_r = $("#paciente");
var imprime_tabla_consulta = function  (data) {
	html = '';
	html += '<br> <br>'
	html += '<table id="tabla_consulta" cellpadding="0" cellspacing="0" border="0" class="table table-striped responsive-utilities jambo_table">';
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
	           
	         
            html +='</tr>';
	}
	html += '</tbody>';
	html += '</table>';
	return html;
};

var examen = function  (id,pac) {
		///alert(id);
		//alert("Holaaaa");
		//var data= id;
		$.ajax({
				url: base_url+"index.php/Ficha_clinica/preConsulta",
				data: ('id='+id+'&pac='+pac),
				type: 'POST',
				success: function  (data) {
					$(".form_pre_consulta").modal('show');
			        $(".f_pre_consulta").empty();
					//var html = imprime_form_personal();
					$(".f_pre_consulta").html(data);
					
				}
			});
	}

var atencion = function  (id,pac) {
		//alert(id);
		//alert("Holaaaa");
		//var data= id;
		$.ajax({
				url: base_url+"index.php/Ficha_clinica/ConsultaMedica",
				data: ('id='+id+'&pac='+pac),
				type: 'POST',
				//dataType:'json',
				success: function  (data) {
					$(".form_consulta_medica").modal('show');
					$(".f_consulta_m").empty();
					//var html = imprime_form_personal();
					$(".f_consulta_m").html(data);
					
				}
			});
	}

