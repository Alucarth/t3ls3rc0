var base_url = $("#base_url").val();
	
	$(function () {
		


		//$('#Jtabla').DataTable();
		$('#almacen_1').DataTable({
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
//	
var datos_material = function  (id) {
		//alert(id);
		//alert("Holaaaa");
		var id_p= id;
    	 location.href="ListarProductosDinamico?id=" + id_p;
	}
// para añadir material a un subdeal 
var adicion_sub = function  (id) {
		//alert(id);
		//alert("Holaaaa");
		$.ajax({
				url:"material_subd_total",
				data: ('id='+id),
				//type: 'POST',
				//dataType:'json',
				success: function  (data) {

					$(".form_plus_material2").modal('show');
					$(".f_pp_m2").empty();
					$(".f_pp_m2").html(data);
				}
			});
    	// location.href="ListarProductosDinamico?id=" + id_p;
}
var ver_sub = function  (id) {
		//alert(id);
		//alert("Holaaaa");
		$.ajax({
				url:"material_subd_total",
				data: ('id='+id),
				//dataType:'json',
				success: function  (data) {

					$(".form_vista_m2").modal('show');
					$(".f_p_v_m2").empty();
					$(".f_p_v_m2").html(data);
				}
			});
}
var imprimir_sub = function  (id) {
		//alert(id);
		//alert("Holaaaa");
				//type: 'POST',
		var id_p= id;
    	location.href="material_subd_total?id=" + id_p;
}