var base_url = $("#base_url").val();
	
	     

	$(function () {
		
		$("#new").on('click',function () {
			$.ajax({
				//url: base_url+"index.php/Herramientas_almacen/NuevaNotaIng";
				success: function  (data) {
					$(".form_new").modal('show');
					$(".f_p").empty();
					//var html = imprime_form_personal();
					$(".f_p").html(data);
					
					$('.datepicker').datepicker({
					    format: 'yyyy/mm/dd',
					    language:'es'
					});
				}
			});
			
		});
		$('#cancelar_f').on('click',function  () {
			$(".form_new").modal('hide');
			$(".f_p").empty();
		});
		$('#guardar_f').on('click',function () {
			
			/*var formulario  = new FormData($("#form_personal")[0]);
			$.ajax({
				url: base_url+"index.php/Personal/RegistrarDatosPersonal",
				type: 'POST',
				data: formulario,
				dataType:'json',
				contentType: false,
				processData:false,
				success: function  (data) {
					$(".form_new").modal('hide');
					$(".f_p").empty();
					html = imprime_tabla_personal(data);

					tabla_r.empty();
					tabla_r.html(html);
					$('#Jtabla').DataTable({
						/*responsive:{
				            details: {
				                display: $.fn.dataTable.Responsive.display.childRowImmediate,
				                type: ''
				            }
				        },
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
				/*								}
												}
					});
					//alert(html);
					alert("Los datos fueron guardados");
				}
			});*/
		});

		//$('#Jtabla').DataTable();
		$('#almacen_2').DataTable({
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
		/*$('#edit').on('click',function () {
			//$.ajax({
				//url: base_url+"index.php/Personal/mostrar_f_nuevo_personal",
				//success: function  (data) {
					$(".form_edit").modal('show');
					$(".f_p_e").empty();
					//var html = imprime_form_personal();
					//$(".f_p_e").html(data);
				//}
			//});
			//var id=$(this).attr('value');
			//alert(id);
			//id.empty();
		}) ;*/
		$('#guardar_f_e').on('click',function () {
			
			var formulario1  = new FormData($("#form_personal_edit")[0]);
			$.ajax({
				url: base_url+"index.php/Personal/editar_personal",
				type: 'POST',
				data: formulario1,
				dataType:'json',
				contentType: false,
				processData:false,
				success: function  (data) {
					$(".form_edit").modal('hide');
					$(".f_p_e").empty();
					html = imprime_tabla_personal(data);
					tabla_r.empty();
					tabla_r.html(html);
					$('#almacen_1').DataTable({
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
		$('#guardar_f_d').on('click',function () {
			
			var formulario2  = new FormData($("#form_personal_delete")[0]);
			$.ajax({
				url: base_url+"index.php/Personal/baja_personal",
				type: 'POST',
				data: formulario2,
				dataType:'json',
				contentType: false,
				processData:false, 
				success: function  (data) {
					$(".form_delete").modal('hide');
					$(".f_p_d").empty();
					html = imprime_tabla_personal(data);
					tabla_r.empty();
					tabla_r.html(html);
					$('#almacen_2').DataTable({
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
		$('#cancelar_f_e').on('click',function  () {
			$(".form_edit").modal('hide');
			$(".f_p_e").empty();
		});
			///////////////////////////////////////////////////////////////
		$('#cancelar_f_d').on('click',function  () {
			$(".form_delete").modal('hide');
			$(".f_p_d").empty();
		});

 	
	});
	

