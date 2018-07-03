$(document).ready(function() {

    // var informe  = <?php echo json_encode($informe); ?>;
    // var nro_recibos = <?php echo json_encode($nro_recibos); ?>;
    // var total = <?php echo json_encode($total); ?>;
    if (typeof usuarios !== 'undefined') {
    // the variable is defined
  
    console.log(usuarios);

    var d = new jsPDF();
    d.text(' Qhana - Reporte Usuarios',10,10);
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
     for(i=0;i<usuarios.length;i++)
	 {
	 	d.text(usuarios[i].nombrePersonal+' '+usuarios[i].apMaternoPersonal+' '+usuarios[i].apPaternoPersonal +' Estado: '+usuarios[i].estado ,x,y);
	 	d.rect(10,y+2,190,0);
	 	
		y=y+6;
	 	d.text('Nombre de Usuario: '+usuarios[i].nombreUsuarioP,x,y);
	  	y=y+6;
	 	d.text('CI: '+usuarios[i].ciPersonal+' '+usuarios[i].expedido,x,y);
	 	y=y+6;
	 	d.text('Estado Civil: '+usuarios[i].estadoCivil,x,y);
	 	y=y+6;
	 	d.text('Telefono: '+usuarios[i].telefonoPersonal,x,y);
	 	y=y+6;
	 	d.text('Celular: '+usuarios[i].celularPersonal,x,y);
	 	y=y+6;
	 	d.text('Email: '+usuarios[i].correoPersonal,x,y);
	 	y=y+6;
	 	d.text('Direccion: '+usuarios[i].direccionPersonal,x,y);
	 	y=y+6;
	 	
	 	d.text('Fecha de Nacimiento: '+usuarios[i].fechaNacimiento,x,y);
	 	y=y+6;
	 	d.text('Genero: '+usuarios[i].genero,x,y);
	 	y=y+6;

	 	d.text('Especialidad: '+usuarios[i].especialidad,x,y);
	 	y=y+8;

	 }


   
    var cadena = d.output('datauristring');
     $('#contenido_reporte').attr('src', cadena);

    // $('iframe').attr('src', cadena);


    }


    if (typeof usuarios_externo !== 'undefined') {
    // the variable is defined
  
    console.log(usuarios_externo);

    var d = new jsPDF();
    d.text(' Qhana - Reporte Usuarios',10,10);
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
     for(i=0;i<usuarios_externo.length;i++)
	 {
	 	d.text(usuarios_externo[i].nombreFamiliar+' '+usuarios_externo[i].apPaternoFamiliar+' '+usuarios_externo[i].apMaternoFamiliar +' Estado: '+usuarios_externo[i].estado ,x,y);
	 	d.rect(10,y+2,190,0);
	 	
		y=y+6;
	 	d.text('Nombre de Usuario: '+usuarios_externo[i].nombreUsuarioF,x,y);
	  	y=y+6;
	 	d.text('Direcicon: '+usuarios_externo[i].direccionFamiliar,x,y);
	
	 	y=y+8;

	 }


   
    var cadena = d.output('datauristring');
     $('#contenido_reporte_externo').attr('src', cadena);

    // $('iframe').attr('src', cadena);


    }


  
});