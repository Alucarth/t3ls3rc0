var base_url = $("#base_url").val();
$(function () {
	
	$("#nuevo_turno").on('click',function () {
		$.ajax({
			url: base_url+"index.php/Personal/mostrar_f_nuevo_turno",
			success: function  (data) {
				$(".form_new_turno").modal('show');
				$(".f_n_turno").empty();
				//var html = imprime_form_personal();
				$(".f_n_turno").html(data);
				
			}
		});
		
	});
	$('#cancelar_f_turno_n').on('click',function  () {
		$(".form_new_turno").modal('hide');
		$(".f_n_turno").empty();
	});
	$('#guardar_f_turno_n').on('click',function () {
		
		var formulario_turno  = new FormData($("#form_turno")[0]);
		$.ajax({
			url: base_url+"index.php/Personal/RegistrarDatosTurno",
			type: 'POST',
			data: formulario_turno,
			dataType:'json',
			contentType: false,
			processData:false,
			success: function  (data) {
				$(".form_new_turno").modal('hide');
				$(".f_n_turno").empty();
				html = imprime_tabla_turno(data);

				tabla_turno_r.empty();
				tabla_turno_r.html(html);
				$('#tabla_turno').DataTable({
					/*responsive:{
			            details: {
			                display: $.fn.dataTable.Responsive.display.childRowImmediate,
			                type: ''
			            }
			        },*/
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
		});
	});
	$('#tabla_turno').DataTable({
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
	$('#guardar_f_turno_e').on('click',function () {
			
			var formulario_turno_edit  = new FormData($("#form_turno_edit")[0]);
			$.ajax({
				url: base_url+"index.php/Personal/editar_turno",
				type: 'POST',
				data: formulario_turno_edit,
				dataType:'json',
				contentType: false,
				processData:false,
				success: function  (data) {
					$(".form_edit_turno").modal('hide');
					$(".f_turno_e").empty();
					html = imprime_tabla_turno(data);
					tabla_turno_r.empty();
					tabla_turno_r.html(html);
					$('#tabla_turno').DataTable({
						/*responsive:{
				            details: {
				                display: $.fn.dataTable.Responsive.display.childRowImmediate,
				                type: ''
				            }
				        },*/
						"language": {"sProcessing":     "Procesando...",
												"sLengthMenu":     "Mostrar _MENU_ registros",
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
			});


		});
	$('#guardar_f_turno_d').on('click',function () {
			
			var formulario_turno_delet = new FormData($("#form_turno_delete")[0]);
			$.ajax({
				url: base_url+"index.php/Personal/baja_turno",
				type: 'POST',
				data: formulario_turno_delet,
				dataType:'json',
				contentType: false,
				processData:false, 
				success: function  (data) {
					$(".form_delete_turno").modal('hide');
					$(".f_turno_d").empty();
					html = imprime_tabla_turno(data);
					tabla_turno_r.empty();
					tabla_turno_r.html(html);
					$('#tabla_turno').DataTable({
						/*responsive:{
				            details: {
				                display: $.fn.dataTable.Responsive.display.childRowImmediate,
				                type: ''
				            }
				        },*/
						"language": {"sProcessing":     "Procesando...",
												"sLengthMenu":     "Mostrar _MENU_ registros",
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
					alert("Los datos fueron eliminados");
				}
			});


		});
		$('#cancelar_f_turno_e').on('click',function  () {
			$(".form_edit_turno").modal('hide');
			$(".f_turno_e").empty();
		});
			///////////////////////////////////////////////////////////////
		$('#cancelar_f_turno_d').on('click',function  () {
			$(".form_delete_turno").modal('hide');
			$(".f_turno_d").empty();
		});


		
});
var tabla_turno_r = $("#turno");
var imprime_tabla_turno = function  (data) {
	html = '';
	html += '<br> <br>'
	html += '<table id="tabla_turno" cellpadding="0" cellspacing="0" border="0" class="table table-striped responsive-utilities jambo >';
	html += '<thead>';
        html += '<tr> ';
        html += '<th align="left">NOMBRE TURNO</th>';
        html += '<th align="left">ESTADO</th>';
        html += '<th align="left"></th>';
		html += '<th align="left"></th>';
        html += '</tr> ';
    html += '</thead>';
    html += '<tbody>';
	for (var i = 0 ; i < data.length; i++) {
            html +='<tr>';
				
	            html += '<td >'+data[i]["nombreTurno"]+'</td>';
				html += '<td >'+data[i]["estado"]+'</td>';
	            html += '<td><button type="button" class="btn btn-primary" onclick="editar_turno('+data[i]["idTurno"]+')">EDITAR</button>';
	            html += '<td><button type="button" class="btn btn-danger" onclick="borrar_turno('+data[i]["idTurno"]+')">BORRAR</button>';
	         
            html +='</tr>';
	}
	html += '</tbody>';
	html += '</table>';
	return html;
};

var editar_turno = function  (id) {
		//alert(id);
		//alert("Holaaaa");
		//var data= id;
		$.ajax({
				url: base_url+"index.php/Personal/Editar_f_turno",
				data: ('id='+id),
				//type: 'POST',
				//dataType:'json',
				success: function  (data) {
					$(".form_edit_turno").modal('show');
					$(".f_turno_e").empty();
					//var html = imprime_form_personal();
					$(".f_turno_e").html(data);
					
				}
			});
	}
	var borrar_turno = function  (id) {
		//alert(id);
		//alert("Holaaaa");
		$.ajax({
				url: base_url+"index.php/Personal/Eliminar_turno",
				data: ('id='+id),
				//type: 'POST',
				//dataType:'json',
				success: function  (data) {

					$(".form_delete_turno").modal('show');
					$(".f_turno_d").empty();
					$(".f_turno_d").html(data);
				}
			});
	}
