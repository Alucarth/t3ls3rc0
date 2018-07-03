<head>
	<meta charset="UTF-8">
	<style type="text/css">
		label,input,textarea{
			text-transform: uppercase;
			font-size: 10pt;
			}
		}
		input:valid, textarea:valid {
		  background:green;
		}
		input:invalid, textarea:invalid {
		  background:#f2d7d5;
		}
		.checkbox-success input[type="checkbox"]:checked + label::before {
		  background-color: #5cb85c;
		  border-color: #5cb85c; }
		.checkbox-success input[type="checkbox"]:checked + label::after {
		  color: #fff; }
	</style>
	 <script>
       //Se utiliza para que el campo de texto solo acepte numeros
		function SoloNumeros(evt){
		 if(window.event){//asignamos el valor de la tecla a keynum
		  keynum = evt.keyCode; //IE
		 }
		 else{
		  keynum = evt.which; //FF
		 } 
		 //comprobamos si se encuentra en el rango numérico y que teclas no recibirá.
		 if((keynum > 47 && keynum < 58) || keynum == 8 || keynum == 13 || keynum == 6 ){
		  return true;
		 }
		 else{
		  return false;
		 }
		}
		//Se utiliza para que el campo de texto solo acepte letras
		function soloLetras(e) {
		    key = e.keyCode || e.which;
		    tecla = String.fromCharCode(key).toString();
		    letras = " áéíóúabcdefghijklmnñopqrstuvwxyzÁÉÍÓÚABCDEFGHIJKLMNÑOPQRSTUVWXYZ";//Se define todo el abecedario que se quiere que se muestre.
		    especiales = [8, 37, 39, 46, 6]; //Es la validación del KeyCodes, que teclas recibe el campo de texto.

		    tecla_especial = false
		    for(var i in especiales) {
		        if(key == especiales[i]) {
		            tecla_especial = true;
		            break;
		        }
		    }

		    if(letras.indexOf(tecla) == -1 && !tecla_especial){
		//alert('Tecla no aceptada');
		        return false;
		      }
		}
		
    </script>
</head>
<body>
	<form class="form-horizontal col-lg-12 col-md-12 col-xs-12" method="post" enctype="multipart/form-data" id="form_personal" action="RegistrarDatosNuevoPersonal">
		<div class="col-xs-6"> 
			<div class="form-group">
				<div class="col-xs-12">
					<label>Nombre Personal</label>
					<input type="text" class="form-control" onkeypress="return soloLetras(event);" name="nombre" id="nombre" size="15" maxlength="30" placeholder="Introduzca nombre" required pattern="[a-zA-ZñÑáéíóú. ]+">
					<label>Apellido Paterno</label>
					<input type="text" class="form-control" onkeypress="return soloLetras(event);" name="paterno" id="paterno" placeholder="Introduzca apellido Paterno" pattern="[a-zA-ZñÑáéíóú. ]+">
					<label>Apellido Materno</label>
					<input type="text" class="form-control" onkeypress="return soloLetras(event);" name="materno" id="materno" placeholder="Introduzca apellido Materno" required pattern="[a-zA-ZñÑáéíóú]+">
				</div><br><br><br>
				<div class="col-xs-6">          	
					<label>CI</label>	
					<input size="10" maxlength="15" class="form-control" type="text" required name="ci" id="ci" placeholder="Introduzca Ci" onKeyPress="return SoloNumeros(event);">
				</div>       
				<div class="col-xs-6">		
					<label>Expedido</label>    
					<select id="expedido" name="expedido" class="form-control">      
						<option value="">Seleccione</option>    
						<option value="LP">LP</option>    
						<option value="OR">OR</option>     
						<option value="CBBA">CBBA</option>     
						<option value="CH">CH</option>    
						<option value="PT">PT</option>     
						<option value="SC">SC</option>   
						<option value="BN">BN</option>   
						<option value="TJ">TJ</option>   
						<option value="PD">PND</option>  
						<option value="OTRO">OTRO</option>     
					</select>
				</div>
				<div class="col-xs-12">   
					<label>Dirección del domicilio</label>
					<input type="text" class="form-control" name="direccion" id="direccion" required placeholder="Introduzca dirección">
				</div>
				<div class="col-xs-6"><label>Genero</label>  
					 <select id="genero" name="genero" class="form-control">  
					 	<option value="">Seleccione  </option>  
					 	<option value="M">MASCULINO </option> 
					 	<option value="F">FEMENINO</option> 
					 </select> 
					 <br>
				</div>		
				<div class="col-xs-6">
					<label>Fecha de nacimiento</label>
					<input type="text" class="datepicker" name='fecha_nac'id="fecha_nac" requiered placeholder="Mes-Día-Año"> 
				</div>

				<div class="col-xs-12"></div>
				<div class="col-xs-6">
					 <label>Estado civil</label>   
					 <select id="estado_civil" name="estado_civil" class="form-control">     
					 	<option value="">Seleccione  </option>   
					 	<option value="SOLTERO(A)">SOLTERO(A)</option>   
					 	<option value="CASADO(A)">CASADO(A)</option>  
					 	<option value="VIUDO(A)">VIUDO(A)</option>  
					 	<option value="DIVORCIADO(A)">DIVORCIADO(A)</option>	
					 </select>
					 <label>Telf fijo</label>
			 		<input type="TEXT" class="form-control" name="telefono" id="telefono" onKeyPress="return SoloNumeros(event);" placeholder="Número fijo" pattern="[0-9]+">
				</div>
				<div  class="col-xs-6">
					<label>Número de hijos</label>
			 		<input type="number" class="form-control" name="num_hijos" id="num_hijos" placeholder=" Número de hijos" value="0">
			 		<label>Celular</label>
			 		<input type="TEXT" class="form-control" required name="celular" id="celular" onKeyPress="return SoloNumeros(event);"  placeholder="Número celular">
				</div>

			</div>
		</div>
		<div class="col-xs-6">
			<label>REFERENCIAS</label>
			<div class="form-group">
				
				<div class="col-xs-6">
			 		<label>N° Celular ref -1</label>
			 		<input type="TEXT" class="form-control" name="cel_ref1" id="cel_ref1" required onKeyPress="return SoloNumeros(event);" placeholder="Núm. Ref 1" pattern="[0-9]+">
			 		<label>N° Celular ref -2</label>
			 		<input type="TEXT" class="form-control" name="cel_ref2" id="cel_ref2" required onKeyPress="return SoloNumeros(event);" placeholder="Núm. Ref 2" pattern="[0-9]+">
			 	</div>
			 	<div class="col-xs-6">
			 		<label>Nombre Ref 1</label>
			 		<input type="TEXT" class="form-control" name="ref1" id="ref1" onKeyPress="return soloLetras(event);"  placeholder="Nombre de la ref. 1" >
			 		<label>Nombre Ref 2</label>
			 		<input type="TEXT" class="form-control" name="ref2" id="ref2" onKeyPress="return soloLetras(event);"  placeholder="Nombre de la ref. 2" >
			 	</div>
			 	<div class="col-xs-12">
			 		<hr>
			 		<label>DOCUMENTOS PRESENTADOS</label><br>	
			 	
			 		<font color="#797D7F" >
                        <input id="check1" name="check1" value="1" type="checkbox"/><label for="check1">&nbsp;&nbsp;&nbsp;FELCC&nbsp;&nbsp;&nbsp;</label>
                        <input id="check2" name="check2" value="1" type="checkbox"/><label for="check2">&nbsp;&nbsp;&nbsp;CURRICULUM&nbsp;&nbsp;&nbsp;</label>
                        <input id="check3" name="check3" value="1" type="checkbox"/><label for="check3">&nbsp;&nbsp;&nbsp;CROQUIS&nbsp;&nbsp;&nbsp;</label><BR>
                        <input id="check4" name="check4" value="1" type="checkbox"/><label for="check4">&nbsp;&nbsp;&nbsp;FACT. LUZ&nbsp;&nbsp;&nbsp;</label>
                        <input id="check5" name="check5" value="1" type="checkbox"/><label for="check5">&nbsp;&nbsp;&nbsp;FACT. AGUA&nbsp;&nbsp;&nbsp;</label>
                        <input id="check6" name="check6" value="1" type="checkbox"/><label for="check6">&nbsp;&nbsp;&nbsp;LICENCIA&nbsp;&nbsp;&nbsp;</label><BR>
                        <input id="check7" name="check7" value="1" type="checkbox"/><label for="check7">&nbsp;&nbsp;&nbsp;PRUEBA PSICOTÉCNICA&nbsp;&nbsp;&nbsp;</label>
                        
			 		</font>
		 		</div>	
			 	<div class="col-xs-12">
			 		<label>OBSERVACIONES PERSONALES</label>
			 		<textarea class="form-control" name="obs" id="obs" placeholder="Observación"></textarea>
			 		<label>OBSERVACIONES LABORALES</label>
			 		<textarea class="form-control" name="obs1" id="obs1" placeholder="Observación"></textarea>
			 		<div class="col-xs-8">
					<br>
						<img id="blah" alt="Imagen" width="100" height="100" />

						<input type="file" name="paciente_image" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
					</div>
			 	</div>
		 		 	
			</div>
		</div> 
		<div class="col-xs-12">
			<div class="form-group">
				<hr>
				<label>DATOS DE ASIGNACIÓN LABORAL</label><br>
				<div class="col-xs-6">
					<label>ÁREA DE TRABAJO</label>
					<input class="form-control" list="colores" placeholder="Elegir área a incorporar" name="cargo" style="text-transform:uppercase" required>
		          	<datalist id="colores">
		            <?php foreach ($v5 as $row1) { ?>
		              <option id="cargo" name="cargo" value="<?php echo $row1->Id_cargo."-".$row1->Nombre_cargo;?>"></option>
		            <?php  } ?>     
		            </datalist>
		            <br>
		            <label>EMPRESA REPRESENTANTE</label>
					<input class="form-control" list="colores1" placeholder="Elegir área a incorporar" name="proveedor" style="text-transform:uppercase" required>
		          	<datalist id="colores1">
		            <?php foreach ($v6 as $row1) { ?>
		              <option id="proveedor" name="proveedor" value="<?php echo $row1->Id_proveedor."-".$row1->Razon_social_proveedor." ".$row1->Regional;?>"></option>
		            <?php  } ?>     
		            </datalist>
		            <br>

		            <label>Fecha de incorporación</label><br>
					<input type="text" class="datepicker" name='fecha_inc' id="fecha_inc" requiered placeholder="Mes-Día-Año">  

	       		</div>
	       		<div class="col-xs-6">
	       			<label>DESCRIPCIÓN DE LA FUNCIÓN</label>
	       			<input class="form-control" name="desc" id="desc" placeholder="Descripción de función">
	       			<BR>
	       				<label>REGIONAL</label>    
					<select id="regional" name="regional" class="form-control">      
						<option value="">Seleccione</option>    
						<option value="LA PAZ">LA PAZ</option>    
						<option value="ORURO">ORURO</option>     
						<option value="COCHABAMBA">COCHABAMBA</option>     
						<option value="CHUQUISACA">CHUQUISACA</option>    
						<option value="POTOSÍ">POTOSÍ</option>     
						<option value="SANTA CRUZ">SANTA CRUZ</option>   
						<option value="BENI">BENI</option>   
						<option value="TARIJA">TARIJA</option>   
						<option value="PANDO">PANDO</option>     
					</select>
	       		</div>
       		</div>

		</div>
	<div class="col-xs-12">

        <div class="col-xs-7"></div>
              <button type="button" class="btn btn-danger" data-dismiss="modal">CERRAR</button>
        <div class="col-xs-3">
               <input type="submit" class="btn btn-success" value="Guardar datos" />
        </div>   
     </div>

	</form>
</body>

