<head>
	<style type="text/css">
		label,input,textarea{
			text-transform: uppercase;
			/*font-size: 10pt;*/
			color: black;
			}
		}
	</style>
</head>
<body>
	<div class="form-horizontal col-lg-12 col-md-12 col-xs-12">
			<H5 align="center"><label >DATOS GENERALES</label></H5>
			<HR>
		<div class="col-xs-2"></div>
		<div class="col-xs-10">
		<font color=black>


			<h5><label>&nbsp;&nbsp;&nbsp;DATOS PERSONALES</label></h5>
			<div class="col-xs-6">
				Nombre Personal: <?php echo $v4->Nombre_personal;?> <br>
				Apellido Paterno: <?php echo $v4->Ap_paterno_personal;?><br>
				Apellido Materno: <?php echo $v4->Ap_materno_personal;?><br>
				Carnet Identidad: <?php echo $v4->Ci." ".$v4->Expedicion_ci_personal;?><br>
				Celular: <?php echo $v4->Telefono_2_personal;?><br>
			</div>
			<div class="col-xs-4">
				Código: <?php echo $v4->Cod_asignacion;?> 
				<img  width="100" height="100" src="/../telserco1/uploads/<?php echo $v4->Foto_personal;?>"/>
			</div>

			<h5><label>&nbsp;&nbsp;&nbsp;DATOS REFERENCIALES</label></h5>
			<div class="col-xs-6">
				Dirección: <?php echo $v4->Direccion_dom_personal;?> <br>
				Fecha Nacimiento: <?php $fecha = new DateTime($v4->Fecha_nacimiento_personal); 
										$fecha = $fecha->format("d-m-Y");   
										echo $fecha;?> <br>
				Estado Civil: <?php echo $v4->Estado_civil_personal;?> <br>
			</div>
			<div class="col-xs-6">
				Teléfono Fijo: <?php echo $v4->Telefono_1_personal;?> <br>
				Edad: <?php $cumpleanos = new DateTime($v4->Fecha_nacimiento_personal);
					    $hoy = new DateTime();
					    $annos = $hoy->diff($cumpleanos);
					    echo $annos->y;?><br>
				Número de Hijos: <?php echo $v4->Numero_hijos_personal;?> <br><br>
			</div>

			<div  class="col-xs-12">
				<label>En caso de emergencia contactarse con:</label><br>

				<?php echo $v4->Referencia_1_personal.": ".$v4->Telefono_3_personal;?><br>

				<?php echo $v4->Referencia_2_personal.": ".$v4->Telefono_4_personal;?> <br><br>
			</div>

			<h5><label>&nbsp;&nbsp;&nbsp;DATOS LABORALES</label></h5>
			<div class="col-xs-6">
				Fecha Incorporación: <?php  $fecha = new DateTime($v4->Fecha_incorporacion); 
											$fecha = $fecha->format("d-m-Y");   
											echo $fecha;?> <br>
				DEPARTAMENTO: <?php echo $v4->Nombre_cargo;?><br>
				<?php echo $v4->Descripcion_cargo;?><br>
				Observaciones: <?php echo $v4->Observacion_1_personal;?><br>
			</div>
			<div class="col-xs-6">
				Fecha Registro: <?php  $fecha = new DateTime($v4->Registro); 
											$fecha = $fecha->format("d-m-Y H:i:s");   
											echo $fecha;?> <br>
				Cargo: <?php echo $v4->Descripcion;?><br>
				Regional Asignada: <?php echo $v4->Regional;?><br>
				<?php echo $v4->Observacion_2_personal;?><br><br><br>
			</div>
			<h5><label>&nbsp;&nbsp;&nbsp;DATOS EMPRESA</label></h5>
			<div class="col-xs-6">
				
				Empresa: <?php echo $v4->Razon_social_proveedor;?><br>
				Representante:<?php echo $v4->Nombre_rep_proveedor;?><br>
				Dirección: <?php echo $v4->Direccion_proveedor;?><br>
			</div>

			
			<div class="col-xs-6">
				
				NIT: <?php echo $v4->NIT;?><br>
				TELÉFONO(S): <?php echo $v4->Telefono_1_proveedor." ".$v4->Telefono_2_proveedor;?><BR><br><br><br>
				
			</div>
			<div class="col-xs-12"></div>

			<h5><label>&nbsp;&nbsp;&nbsp;DOCUMENTOS PRESENTADOS</label></h5>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CERTIFICADO FELCC:<?php 
					if ($v4->Felcc==1) echo 'SI <i class="fa fa-check"></i>';
					else echo 'NO <i class="fa fa-close"></i>'; ?><br>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CURRICULUM VITAE:<?php 
					if ($v4->Curriculum_personal==1) echo 'SI <i class="fa fa-check"></i>';
					else echo 'NO <i class="fa fa-close"></i>'; ?><br>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CROQUIS DE DOMICILIO:<?php 
					if ($v4->Croquis_personal==1) echo 'SI <i class="fa fa-check"></i>';
					else echo 'NO <i class="fa fa-close"></i>'; ?><br>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;FACTURA DE LUZ:<?php 
					if ($v4->Fac_luz_personal==1) echo 'SI <i class="fa fa-check"></i>';
					else echo 'NO <i class="fa fa-close"></i>'; ?><br>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;FACTURA DE AGUA:<?php 
					if ($v4->Fac_agua_personal==1) echo 'SI <i class="fa fa-check"></i>';
					else echo 'NO <i class="fa fa-close"></i>'; ?><br>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;LICENCIA DE CONDUCIR (Opcional):<?php 
					if ($v4->Licencia_conducir==1) echo 'SI <i class="fa fa-check"></i>';
					else echo 'NO <i class="fa fa-close"></i>'; ?><br>

		</font>
		</div>
	</div>

</body>