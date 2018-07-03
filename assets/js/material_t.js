var base_url = $("#base_url").val();
$(function () {
		
		$("#nueva_entrega_1").on('click',function () {
			$.ajax({
				url: base_url+"index.php/Almacen/mostrar_f_nueva_entrega_1",
				success: function  (data) {
					$(".form_new_entrega1").modal('show');
					$(".f_n_entrega1").empty();
					//var html = imprime_form_personal();
					$(".f_n_entrega1").html(data);
					/*$.fn.datepicker.dates['esp'] = {
					    days: ["Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado"],
					    daysShort: ["Dom", "Lun", "Mar", "Mie", "Jue", "Vie", "Sab"],
					    daysMin: ["Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa"],
					    months: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
					    monthsShort: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
					    monthsTitle: "Meses",
						clear: "Borrar",
						weekStart: 1,
						format: "yyyy/mm/dd"
					};*/

				}
			});
			
		});
		//$('#Jtabla').DataTable();
		$('#material_t').DataTable({
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

 	
	});
//para mostrar material que debe tener el técnico	
var ver_material_tec = function  (id) {
		//alert(id);
		//alert("Holaaaa");
		$.ajax({
				url:"material_tecnico_total",
				data: ('id='+id),
				//type: 'POST',
				//dataType:'json',
				success: function  (data) {

					$(".form_vista_m").modal('show');
					$(".f_p_v_m").empty();
					$(".f_p_v_m").html(data);
				}
			});
	}
var imprimir_material_tec = function  (id) {
		//alert(id);
		//alert("Holaaaa");
		var id_p= id;
    	 location.href="material_tecnico_total?id=" + id_p;
	}
var adicionar_material=function  (id) {
		//alert(id);
		//alert("Holaaaa");
		$.ajax({
				url:"material_tecnico_total",
				data: ('id='+id),
				//type: 'POST',
				//dataType:'json',
				success: function  (data) {

					$(".form_plus_material1").modal('show');
					$(".f_pp_m").empty();
					$(".f_pp_m").html(data);
				}
			});
	}
var lista_subd= function  (id) {
		//alert(id);
		//alert("Holaaaa");
		var id_p= id;
    	location.href="Sub_dealerPersonal?id=" + id_p;
	}