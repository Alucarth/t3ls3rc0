
	<form class="form-horizontal col-lg-12 col-md-12 col-xs-12" method="post" enctype="multipart/form-data" id="form_personal_delete" action="BajaPersonal">
		<div class="form-group">
			<div class="col-xs-6"> 
			

					<label>Nombre Personal: </label>
					<?php echo $v4->Nombre_personal;?><br>
					<label>Apellido Paterno: </label>
					<?php echo $v4->Ap_paterno_personal ;?><br>
					<label>Apellido Materno: </label>
					<?php echo $v4->Ap_materno_personal ;?><br>
					
			</div>
			<div class="col-xs-6"> 
					<label>CI: </label> <?php echo $v4->Ci;?><br>
					<label>Fecha de incorporación: </label> <?php echo $v4->Fecha_incorporacion;?><br>
					<label>Cargo: </label> <?php echo $v4->Nombre_cargo;?><br>
					

			</div>
			<input type="hidden" class="form-control" name="Id_personal" id="Id_personal" value="<?php echo $v4->Id_personal;?>">
			
			<input type="hidden" class="form-control" name="Id_asignacion" id="Id_asignacion" value="<?php echo $v4->Id_asignacion;?>">
			<input type="hidden" class="form-control" id="cargo" name="cargo" value="<?php echo $v4->Id_cargo;?>">
		</div>
		<div class="col-xs-12">

	        <div class="col-xs-7"></div>
	              <button type="button" class="btn btn-danger" data-dismiss="modal">CERRAR</button>
	        <div class="col-xs-3">
	               <input type="submit" class="btn btn-success" value="Guardar datos" />
	        </div>   
	     </div>
	</form>

