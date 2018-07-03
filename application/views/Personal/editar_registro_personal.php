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
	<form class="form-horizontal col-lg-12 col-md-12 col-xs-12" method="post" enctype="multipart/form-data" id="form_personal" action="GuardarEdicionDatosPersonal">
		<div class="col-xs-6"> 
			<div class="form-group">
				<div class="col-xs-12">
					<label>Nombre Personal</label>
					<input type="text" class="form-control" onkeypress="return soloLetras(event);" name="nombre" id="nombre" size="15" maxlength="30" placeholder="Introduzca nombre" required value="<?php echo $v4->Nombre_personal;?>">
					<label>Apellido Paterno</label>
					<input type="text" class="form-control" onkeypress="return soloLetras(event);" name="paterno" id="paterno" placeholder="Introduzca apellido Paterno" value="<?php echo $v4->Ap_paterno_personal ;?>">
					<label>Apellido Materno</label>
					<input type="text" class="form-control" onkeypress="return soloLetras(event);" name="materno" id="materno" placeholder="Introduzca apellido Materno" required value="<?php echo $v4->Ap_materno_personal ;?>">
					<input type="hidden" class="form-control" onkeypress="return soloLetras(event);" name="Id_personal" id="Id_personal" size="15" maxlength="30" placeholder="Introduzca nombre" required value="<?php echo $v4->Id_personal;?>">
				</div><br><br><br>
				<div class="col-xs-6">          	
					<label>CI</label>	
					<input size="10" maxlength="15" class="form-control" type="text" required name="ci" id="ci" placeholder="Introduzca Ci" onKeyPress="return SoloNumeros(event);" value="<?php echo $v4->Ci ;?>">
				</div>       
				<div class="col-xs-6">		
					<label>Expedido</label>    
					<select id="expedido" name="expedido" class="form-control">      
						<option value="<?php echo $v4->Expedicion_ci_personal;?>"><?php echo $v4->Expedicion_ci_personal;?></option>    
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
					<input type="text" class="form-control" name="direccion" id="direccion" required placeholder="Introduzca dirección" value="<?php echo $v4->Direccion_dom_personal ;?>" >
				</div>
				<div class="col-xs-6"><label>Género</label>  
					 <select id="genero" name="genero" class="form-control"> 
					 	<option value="<?php echo $v4->Genero;?>"><?php echo $v4->Genero;?></option>      
					 	<option value="M">MASCULINO </option> 
					 	<option value="F">FEMENINO</option> 
					 </select> 
					 <br>
				</div>		
				<div class="col-xs-6">
					<label>Fecha de nacimiento</label>
					<input type="text" class="datepicker" name='fecha_nac'id="fecha_nac" requiered placeholder="Mes-Día-Año" value="<?php echo $v4->Fecha_nacimiento_personal;?>"> 
				</div>

				<div class="col-xs-12"></div>
				<div class="col-xs-6">
					 <label>Estado civil</label>   
					 <select id="estado_civil" name="estado_civil" class="form-control">     
					 	<option value="<?php echo $v4->Estado_civil_personal;?>"><?php echo $v4->Estado_civil_personal;?></option>   

					 	<option value="SOLTERO(A)">SOLTERO(A)</option>   
					 	<option value="CASADO(A)">CASADO(A)</option>  
					 	<option value="VIUDO(A)">VIUDO(A)</option>  
					 	<option value="DIVORCIADO(A)">DIVORCIADO(A)</option>	
					 </select>
					 <label>Telf fijo</label>
			 		<input type="TEXT" class="form-control" name="telefono" id="telefono" onKeyPress="return SoloNumeros(event);" placeholder="Número fijo" pattern="[0-9]+" value="<?php echo $v4->Telefono_1_personal;?>">
				</div>
				<div  class="col-xs-6">
					<label>Número de hijos</label>
			 		<input type="number" class="form-control" name="num_hijos" id="num_hijos" placeholder=" Número de hijos" value="<?php echo $v4->Numero_hijos_personal;?>">
			 		<label>Celular</label>
			 		<input type="TEXT" class="form-control" required name="celular" id="celular" onKeyPress="return SoloNumeros(event);"  placeholder="Número celular" value="<?php echo $v4->Telefono_2_personal;?>">
				</div>

			</div>
		</div>
		<div class="col-xs-6">
			<label>REFERENCIAS</label>
			<div class="form-group">
				
				<div class="col-xs-6">
			 		<label>N° Celular ref -1</label>
			 		<input type="TEXT" class="form-control" name="cel_ref1" id="cel_ref1" onKeyPress="return SoloNumeros(event);" placeholder="Núm. Ref 1"  value="<?php echo $v4->Telefono_3_personal;?>">
			 		<label>N° Celular ref -2</label>
			 		<input type="TEXT" class="form-control" name="cel_ref2" id="cel_ref2" onKeyPress="return SoloNumeros(event);" placeholder="Núm. Ref 2" value="<?php echo $v4->Telefono_4_personal;?>">
			 	</div>
			 	<div class="col-xs-6">
			 		<label>Nombre Ref 1</label>
			 		<input type="TEXT" class="form-control" name="ref1" id="ref1" onKeyPress="return soloLetras(event);"  placeholder="Nombre de la ref. 1" value="<?php echo $v4->Referencia_1_personal;?>">
			 		<label>Nombre Ref 2</label>
			 		<input type="TEXT" class="form-control" name="ref2" id="ref2" onKeyPress="return soloLetras(event);"  placeholder="Nombre de la ref. 2" value="<?php echo $v4->Referencia_2_personal;?>">
			 	</div>
			 	<div class="col-xs-12">
			 		<hr>
			 		<label>DOCUMENTOS PRESENTADOS</label><br>	
			 	
			 		<font color="#797D7F" >
			 			<?php if ($v4->Felcc==1) { ?>
			 				<input id="check1" name="check1" value="1" checked type="checkbox"/><label for="check1">&nbsp;&nbsp;&nbsp;FELCC&nbsp;&nbsp;&nbsp;</label>
			 			<?php }
			 			else{ ?>
                        	<input id="check1" name="check1" value="1" type="checkbox"/><label for="check1">&nbsp;&nbsp;&nbsp;FELCC&nbsp;&nbsp;&nbsp;</label>
                        <?php } 
                        if ($v4->Curriculum_personal==1) { ?>
                        	<input id="check2" name="check2" value="1" checked type="checkbox"/><label for="check2">&nbsp;&nbsp;&nbsp;CURRICULUM&nbsp;&nbsp;&nbsp;</label>
                        <?php }
			 			else{ ?>
			 				<input id="check2" name="check2" value="1" type="checkbox"/><label for="check2">&nbsp;&nbsp;&nbsp;CURRICULUM&nbsp;&nbsp;&nbsp;</label>	
                        <?php } 
                        if ($v4->Croquis_personal==1) { ?>
                        	<input id="check3" name="check3" value="1" checked type="checkbox"/><label for="check3">&nbsp;&nbsp;&nbsp;CROQUIS&nbsp;&nbsp;&nbsp;</label><BR>
                        <?php }
			 			else{ ?>
			 				<input id="check3" name="check3" value="1" type="checkbox"/><label for="check3">&nbsp;&nbsp;&nbsp;CROQUIS&nbsp;&nbsp;&nbsp;</label><BR>
			 			<?php } 
                        if ($v4->Fac_luz_personal==1) { ?>
                        	<input id="check4" name="check4" value="1" checked type="checkbox"/><label for="check4">&nbsp;&nbsp;&nbsp;FACT. LUZ&nbsp;&nbsp;&nbsp;</label>
                        <?php }
			 			else{ ?>
			 				<input id="check4" name="check4" value="1" type="checkbox"/><label for="check4">&nbsp;&nbsp;&nbsp;FACT. LUZ&nbsp;&nbsp;&nbsp;</label>
			 			<?php } 
                        if ($v4->Fac_agua_personal==1) { ?>
                        	<input id="check5" name="check5" value="1" checked type="checkbox"/><label for="check5">&nbsp;&nbsp;&nbsp;FACT. AGUA&nbsp;&nbsp;&nbsp;</label>
                        <?php }
			 			else{ ?>
			 				<input id="check5" name="check5" value="1" type="checkbox"/><label for="check5">&nbsp;&nbsp;&nbsp;FACT. AGUA&nbsp;&nbsp;&nbsp;</label>
			 			<?php } 
                        if ($v4->Licencia_conducir==1) { ?>
                        	<input id="check6" name="check6" value="1" checked type="checkbox"/><label for="check6">&nbsp;&nbsp;&nbsp;LICENCIA&nbsp;&nbsp;&nbsp;</label><BR>
                        <?php }
			 			else{ ?>
			 				<input id="check6" name="check6" value="1" type="checkbox"/><label for="check6">&nbsp;&nbsp;&nbsp;LICENCIA&nbsp;&nbsp;&nbsp;</label><BR>
			 			<?php } 
                        if ($v4->Prueba_psic==1) { ?>
                        	<input id="check7" name="check7" value="1" checked type="checkbox"/><label for="check7">&nbsp;&nbsp;&nbsp;PRUEBA PSICOTÉCNICA&nbsp;&nbsp;&nbsp;</label>
                        	<?php }
			 			else{ ?>
			 				<input id="check7" name="check7" value="1" type="checkbox"/><label for="check7">&nbsp;&nbsp;&nbsp;PRUEBA PSICOTÉCNICA&nbsp;&nbsp;&nbsp;</label>
			 			<?php } ?>
                        
			 		</font>
		 		</div>	
			 	<div class="col-xs-12">
			 		<label>OBSERVACIONES PERSONALES</label>
			 		<textarea class="form-control" name="obs" id="obs" placeholder="Observación"><?php echo $v4->Observacion_1_personal;?></textarea>
			 		<label>OBSERVACIONES LABORALES</label>
			 		<textarea class="form-control" name="obs1" id="obs1" placeholder="Observación"><?php echo $v4->Observacion_2_personal;?></textarea>
			 		<div class="col-xs-8">
					<br>
						<img id="blah" alt="Imagen" width="100" height="100" src="/../telserco1/uploads/<?php echo $v4->Foto_personal;?>"/>
						<input type="hidden" id="foto" name="foto" value="<?php echo $v4->Foto_personal;?>"/>


						<input type="file" name="paciente_image" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])" >
					</div>
			 	</div>
		 		 	
			</div>
		</div> 
		<div class="col-xs-12">
			<div class="form-group">
				<hr>
				<label>DATOS DE ASIGNACIÓN LABORAL</label><br>
				<input type="hidden" class="form-control" name="Id_asignacion" id="Id_asignacion" required value="<?php echo $v4->Id_asignacion;?>">
				<div class="col-xs-6">
					<label>ÁREA DE TRABAJO</label>
					<input class="form-control" list="colores" placeholder="Elegir área a incorporar" name="cargo" style="text-transform:uppercase" required value="<?php echo $v4->Id_cargo."-".$v4->Nombre_cargo;?>">
		          	<datalist id="colores">
		            <?php foreach ($v5 as $row1) { ?>
		              <option id="cargo" name="cargo" value="<?php echo $row1->Id_cargo."-".$row1->Nombre_cargo;?>"></option>
		            <?php  } ?>     
		            </datalist>
		            <br>
		            <label>EMPRESA REPRESENTANTE</label>
					<input class="form-control" list="colores1" placeholder="Elegir área a incorporar" name="proveedor" style="text-transform:uppercase" required value="<?php echo $v4->Id_proveedor_a."-".$v4->Razon_social_proveedor." ".$v4->Regional;?>">
		          	<datalist id="colores1">
		            <?php foreach ($v6 as $row1) { ?>
		              <option id="proveedor" name="proveedor" value="<?php echo $row1->Id_proveedor."-".$row1->Razon_social_proveedor." ".$row1->Regional;?>"></option>
		            <?php  } ?>     
		            </datalist>
		            <br>

		            <label>Fecha de incorporación</label><br>
					<input type="text" class="datepicker" name='fecha_inc' id="fecha_inc" requiered placeholder="Mes-Día-Año" value="<?php echo $v4->Fecha_ingreso;?>">  

	       		</div>
	       		<div class="col-xs-6">
	       			<label>DESCRIPCIÓN DE LA FUNCIÓN</label>
	       			<input class="form-control" name="desc" id="desc" placeholder="Descripción de función" value="<?php echo $v4->Descripcion;?>">
	       			<BR>
	       				<label>REGIONAL</label>    
					<select id="regional" name="regional" class="form-control">      
						<option value="<?php echo $v4->Regional;?>"><?php echo $v4->Regional;?></option>    
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


