var base_url = $("#base_url").val();
	
	     

	$(function () {
		
		$("#nuevo_pers_1").on('click',function () {
			$.ajax({
				url: base_url+"index.php/RecursosHumanos/mostrar_f_nuevo_personal",
				success: function  (data) {
					$(".form_new").modal('show');
					$(".f_p").empty();
					//var html = imprime_form_personal();
					$(".f_p").html(data);
					$('.datepicker').datepicker({
					    format: 'yyyy-mm-dd'
					});/*
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
					};*/

				}
			});
			
		});
		
		$('#Jtabla').DataTable({
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
	var imprimir_personal = function  (id) {
		//alert(id);
		//alert("Holaaaa");
		var id_p= id;
    	 location.href="DatosGeneralesPersonal?id=" + id_p;
	}
	var datos_personal = function  (id) {
		//alert(id);
		//alert("Holaaaa");
		$.ajax({
				url:"DatosGeneralesPersonal",
				data: ('id='+id),
				//type: 'POST',
				//dataType:'json',
				success: function  (data) {

					$(".form_vista").modal('show');
					$(".f_p_v").empty();
					$(".f_p_v").html(data);
				}
			});
	}
	var editar_personal = function  (id) {
		/*alert(id);
		alert("Holaaaa");*/
		var data= id;
		$.ajax({
				url: base_url+"index.php/RecursosHumanos/EditarPersonal",
				data: ('id='+id),
				//type: 'POST',
				//dataType:'json',
				success: function  (data) {
					$(".form_edit").modal('show');
					$(".f_p_e").empty();
					//var html = imprime_form_personal();
					$(".f_p_e").html(data);
					$('.datepicker').datepicker({
					    format: 'yyyy/mm/dd',
					    language:'es'
					})
				}
			});
	}
	var borrar_personal = function  (id) {
		var data= id;
		$.ajax({
				url: base_url+"index.php/RecursosHumanos/EditarBajaPersonal",
				data: ('id='+id),
				//type: 'POST',
				//dataType:'json',
				success: function  (data) {

					$(".form_delete").modal('show');
					$(".f_p_d").empty();
					$(".f_p_d").html(data);
				}
			});
	}

$(document).ready(function() {

    // var informe  = <?php echo json_encode($informe); ?>;
    // var nro_recibos = <?php echo json_encode($nro_recibos); ?>;
    // var total = <?php echo json_encode($total); ?>;

     if (typeof personal !== 'undefined') {
    // the variable is defined

    console.log(personal);

    var d = new jsPDF();
    d.text(' Qhana - Reporte Personal Medico',10,10);
     d.setFont('times','normal');
       d.setFontSize(10);
    d.text('Fecha: '+ new Date(),160,10);
    d.setFont('courier','normal');
    d.setFontSize(11);
    d.rect(9,12,190,0);


    var x = 10;
    var y=20;
    // //----cuerpo del informe
  
    // d.text("Nombre:Sara Mabel Siles Calderón",10,30);
     for(i=0;i<personal.length;i++)
	 {
	 	d.text(personal[i].nombrePersonal+' '+personal[i].apPaternoPersonal+' '+personal[i].apMaternoPersonal +' Estado: '+personal[i].estado ,x,y);
	 	d.rect(10,y+2,190,0);
	 	
		y=y+6;
	 	d.text('Numero de Matricula: '+personal[i].numeroMatricula,x,y);
	  	y=y+6;
	 	d.text('CI: '+personal[i].ciPersonal+' '+personal[i].expedido,x,y);
	 	y=y+6;
	 	d.text('Estado Civil: '+personal[i].estadoCivil,x,y);
	 	y=y+6;
	 	d.text('Telefono: '+personal[i].telefonoPersonal,x,y);
	 	y=y+6;
	 	d.text('Celular: '+personal[i].celularPersonal,x,y);
	 	y=y+6;
	 	d.text('Email: '+personal[i].correoPersonal,x,y);
	 	y=y+6;
	 	d.text('Direccion: '+personal[i].direccionPersonal,x,y);
	 	y=y+6;
	 	
	 	d.text('Fecha de Nacimiento: '+personal[i].fechaNacimiento,x,y);
	 	y=y+6;
	 	d.text('Genero: '+personal[i].genero,x,y);
	 	y=y+6;

	 	d.text('Especialidad: '+personal[i].especialidad,x,y);
	 	y=y+8;

	 }


   
    var cadena = d.output('datauristring');
     $('#contenido_reporte').attr('src', cadena);

    // $('iframe').attr('src', cadena);

	}

});
