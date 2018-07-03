var base_url = $("#base_url").val();
$(function () {
	
	$("#nuevo_tipo_pac").on('click',function () {
		$.ajax({
			url: base_url+"index.php/Paciente/mostrar_f_nuevo_tipo_pac",
			success: function  (data) {
				$(".form_new_tipo_pac").modal('show');
				$(".f_n_tipo_pac").empty();
				//var html = imprime_form_personal();
				$(".f_n_tipo_pac").html(data);
				
			}
		});
		
	});
	$('#cancelar_f_tipo_pac_n').on('click',function  () {
		$(".form_new_tipo_pac").modal('hide');
		$(".f_n_tipo_pac").empty();
	});
	$('#guardar_f_tipo_pac_n').on('click',function () {
		
		var formulario_tipo_paciente  = new FormData($("#form_tipo_paciente")[0]);
		$.ajax({
			url: base_url+"index.php/Paciente/RegistrarDatosTipoPaciente",
			type: 'POST',
			data: formulario_tipo_paciente,
			dataType:'json',
			contentType: false,
			processData:false,
			success: function  (data) {
				$(".form_new_tipo_pac").modal('hide');
				$(".f_n_tipo_pac").empty();
				html = imprime_tabla_tipo_pac(data);
				tabla_tipo_pac_r.empty();
				tabla_tipo_pac_r.html(html);
				$('#tabla_tipo_pac').DataTable({
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
	$('#tabla_tipo_pac').DataTable({
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
	$('#guardar_f_tipo_pac_e').on('click',function () {
			
			var formulario_tipo_pac_edit  = new FormData($("#form_tipo_pac_edit")[0]);
			$.ajax({
				url: base_url+"index.php/Paciente/editar_tipo_paciente",
				type: 'POST',
				data: formulario_tipo_pac_edit,
				dataType:'json',
				contentType: false,
				processData:false,
				success: function  (data) {
					$(".form_edit_tipo_pac").modal('hide');
					$(".f_tipo_pac_e").empty();
					html = imprime_tabla_tipo_pac(data);
					tabla_tipo_pac_r.empty();
					tabla_tipo_pac_r.html(html);
					$('#tabla_tipo_pac').DataTable({
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
												"sIn_editfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
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
	$('#guardar_f_tipo_pac_d').on('click',function () {
			
			var formulario_tipo_pac_delet = new FormData($("#form_tipo_pac_delete")[0]);
			$.ajax({
				url: base_url+"index.php/Paciente/baja_tipo_paciente",
				type: 'POST',
				data: formulario_tipo_pac_delet,
				dataType:'json',
				contentType: false,
				processData:false, 
				success: function  (data) {
					$(".form_delete_tipo_pac").modal('hide');
					$(".f_tipo_pac_d").empty();
					html = imprime_tabla_tipo_pac(data);
					tabla_tipo_pac_r.empty();
					tabla_tipo_pac_r.html(html);
					$('#tabla_tipo_pac').DataTable({
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
		$('#cancelar_f_tipo_pac_e').on('click',function  () {
			$(".form_edit_tipo_pac").modal('hide');
			$(".f_tipo_pac_e").empty();
		});
			///////////////////////////////////////////////////////////////
		$('#cancelar_f_tipo_pac_d').on('click',function  () {
			$(".form_delete_tipo_pac").modal('hide');
			$(".f_tipo_pac_d").empty();
		});


		
});
var tabla_tipo_pac_r = $("#tipo_pac");
var imprime_tabla_tipo_pac = function  (data) {
	html = '';
	html += '<br> <br>'
	html += '<table id="tabla_tipo_pac" cellpadding="0" cellspacing="0" border="0" class="table table-striped responsive-utilities jambo_table">';
	html += '<thead>';
        html += '<tr> ';
        html += '<th align="left">DESCRIPCIÓN</th>';
        html += '<th align="left">ESTADO</th>';
        html += '<th align="left"></th>';
		html += '<th align="left"></th>';
        html += '</tr> ';
    html += '</thead>';
    html += '<tbody>';
	for (var i = 0 ; i < data.length; i++) {
            html +='<tr>';
				
	            html += '<td >'+data[i]["descripcion"]+'</td>';
				html += '<td >'+data[i]["estado"]+'</td>';
	            html += '<td><button type="button" class="btn btn-primary" onclick="editar_tipo_pac('+data[i]["idTipoPaciente"]+')">EDITAR</button>';
	            html += '<td><button type="button" class="btn btn-danger" onclick="borrar_tipo_pac('+data[i]["idTipoPaciente"]+')">BORRAR</button>';
	         
            html +='</tr>';
	}
	html += '</tbody>';
	html += '</table>';
	return html;
};

var editar_tipo_pac = function  (id) {
		//alert(id);
		//alert("Holaaaa");
		//var data= id;
		$.ajax({
				url: base_url+"index.php/Paciente/Editar_f_tipo_pac",
				data: ('id='+id),
				//type: 'POST',
				//dataType:'json',
				success: function  (data) {
					$(".form_edit_tipo_pac").modal('show');
					$(".f_tipo_pac_e").empty();
					//var html = imprime_form_personal();
					$(".f_tipo_pac_e").html(data);
					
				}
			});
	}
	var borrar_tipo_pac= function  (id) {
		//alert(id);
		//alert("Holaaaa");
		$.ajax({
				url: base_url+"index.php/Paciente/Eliminar_tipo_pac",
				data: ('id='+id),
				//type: 'POST',
				//dataType:'json',
				success: function  (data) {

					$(".form_delete_tipo_pac").modal('show');
					$(".f_tipo_pac_d").empty();
					$(".f_tipo_pac_d").html(data);
				}
			});
	}
