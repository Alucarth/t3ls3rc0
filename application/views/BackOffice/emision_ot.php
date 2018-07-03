
<head>

</head>
<body>

	<div class="container">
	<h2>FORMULARIO DE EMISIÓN DE ÓRDENES DE TRABAJO</h2>
	<form method="post" action="" enctype="multipart/form-data" >
	   
	    <div class="form-group">
	   		
	   		<div class="col-xs-6">
					<label>Código de Cliente: </label><input class="form-control" type="text" id="id_cliente" name="id_cliente" value="123456" disabled><BR>
					<label>Número OT:</label> <input class="form-control" type="text" id="ot_cliente" name="ot_cliente" value="165422" disabled><BR>
			   		<label>Nombre Cliente:</label>	<input class="form-control" type="text" id="nom_cliente" name="nom_cliente" value="PRUEBA CLIENTE" disabled><BR>
			   		<label>Zona:</label><input type="text" class="form-control" name="zona_c" id="zona_c" required=""  value="zONA SOPOCACHI" placeholder="Introduzca Datos"><BR>
			   		<label>Dirección: </label><input type="text" class="form-control" name="dirección_c" id="dirección_c" required=""  value="CA ACHUMANI AV STRONGER 100" placeholder="Introduzca Datos"><BR>
			   		<label>Referencia:</label> <textarea class="form-control" name="referencia_c" id="referencia_c" required=""  value="CALLE 34 Y 35 FRENTE AL COMPLEJO STRONGER MISMA ROTICERIA ACHUMANI 00-CASA 1P-MOSTAZA-PUERTA" placeholder="Introduzca Datos">CALLE 34 Y 35 FRENTE AL COMPLEJO STRONGER MISMA ROTICERIA ACHUMANI 00-CASA 1P-MOSTAZA-PUERTA</textarea><BR>
			   		<div class="col-xs-6">
			   			<label>Teléfono 1:</label><input type="text" class="form-control" name="num1_c" id="num1_c" required=""  placeholder="Introduzca Número de Ref"><BR>
			   		</div>
			   		<div class="col-xs-6">
			   			<label>Teléfono 2:</label><input type="text" class="form-control" name="num2_c" id="num2_c" required=""  placeholder="Introduzca Número de Ref"><BR>
			   		</div>
			</div> 
			<div class="col-xs-6">  		
			   		<label>Turno:</label>
			   		<select id="turno_c" name="turno_c" class="form-control">      
						<option value="">Seleccione</option>    
						<option value="TM">MAÑANA</option>    
						<option value="TMM"> MEDIO DÍA</option>     
						<option value="TT">TARDE</option>          
					</select>
			   		<label>Hora: </label><input type="text" class="form-control" name="hora_c" id="hora_c" required=""  value="" placeholder="00:00"><BR>
					<label>Sub Área:</label> <input class="form-control" list="colores" placeholder="Elegir área de domicilio del cliente" name="cargo" style="text-transform:uppercase" required>
					<datalist id="colores">
						<option id="ALTO NORTE" name="ALTO NORTE" value="ALTO NORTE">ZONA NORTE DE LA CIUDAD DE EL ALTO (LOS ANDES, RIO SECO, BALLIVIÁN, ALTO LIMA, 16 DE JULIO) </option>
						<option id="ALTO ESTE" name="ALTO ESTE" value="ALTO ESTE">ZONA ESTE DE LA CIUDAD DE EL ALTO (COSMOS, SANTIAGO II, VILLA BOLÍVAR D) </option>    
						<option id="ALTO SUR" name="ALTO SUR" value="ALTO SUR">ZONA SUR DE LA CIUDAD DE EL ALTO (SATÉLITE, SANTIAGO I, ALPACOMA, SANTA ROSA, TEJADA TRIANGULAR) </option>    
						<option id="MIRAFLORES" name="MIRAFLORES" value="MIRAFLORES">VILLA SAN ANTONIO, VILLA SALOMÉ, VILLA FATIMA, VILLA EL CARMEN, PAMPAHASI, TEJADA SORZANO, MIRAFLORES </option>     
						<option id="SUR" name="SUR" value="SUR LA PAZ"> OBRAJES, ACHUMANI, SAN MIGUEL, LOS PINOS, SEGÜENCOMA,CHASQUIPAMPA, LLOJETA</option>
						<option id="CENTRO" name="CENTRO" value="CENTRO ">SOPOCACHI, LANDAETA, SAN PEDRO, BUENOS AIRES, TEJAR, CHIJINI</option>
						<option id="OTRO" name="OTRO" value="ZONA OTRA">OTRA ZONA</option>
					</datalist>
					<label>Estado: </label><input class="form-control" list="colores1" placeholder="Elegir estado" name="cargo" style="text-transform:uppercase" required>
					<datalist id="colores1">
						<option id="NORMAL" name="NORMAL" value="NORMAL">ESTADO: NORMAL </option>
						<option id="URGENTE" name="URGENTE" value="URGENTE">ESTADO: URGENTE  </option>    
						
					</datalist>
					<label>Tipo instalación: </label><input class="form-control" list="colores2" placeholder="Elegir Tipo de instalación" name="instalacion" style="text-transform:uppercase" required>
					<datalist id="colores2">
			            <?php foreach ($v4 as $row1) { ?>
			              <option id="tecnico" name="tecnico" value="<?php echo $row1->Id_tipo_i."-".$row1->Nombre." ".$row1->Descripcion;?>"><?php echo $row1->Observacion;?></option>
			              
			            <?php  } ?>     
          			</datalist> 
					<label>Observaciones:</label>
			 		<textarea class="form-control" name="obs" id="obs" placeholder="Observación"></textarea>
			
	   		<input class="form-control" type="hidden" id="tecnico" name="tecnico" value="PRUEBA">
	   		

	  	</div>

		</div>	 
	</form>
	</div>

</body>