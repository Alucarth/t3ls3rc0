<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>


</head>
<body>
		<div class="col-xs-12">   
				<label>Paciente</label>
				<select id="paciente" class="form-control" name="paciente">
		 		<?php foreach ($v6 as $row1) { ?>
		 			<option value="<?php echo $row1->idPaciente;?>"><?php echo $row1->nombrePaciente;?></option>
				<?php  } ?>
		 	</select> <br>
		</div>
		<div class="col-xs-6">
			<label>Motivo de consulta</label>
			<select id="motivo" class="form-control" name="motivo">
		 		<?php foreach ($v7 as $row2) { ?>
		 			<option value="<?php echo $row2->idMotivoConsulta;?>"><?php echo $row2->motivo;?></option>
				<?php  } ?>
		 	</select>
		</div>
		<div class="col-xs-6">
			<label>Fecha de Consulta</label>
			<input type="TEXT" class="datepicker" name="fecha_con" id="fecha_con" placeholder=" Año-Mes-Dia">
		</div>
		
		<div class="col-xs-12">
			<div class="col-xs-6">
				<label>Hora Inicio </label>
				<input type="TEXT" class="form-control" name="hora_ini" id="hora_ini" placeholder=" 00:00">
			</div>
			<div class="col-xs-6">
				<label>Hora Fin </label>
				<input type="TEXT" class="form-control" name="hora_fin" id="hora_fin" placeholder=" 00:00">
			</div>
		</div>
		

		<div class="col-xs-12">
			<hr>
			<label>Nombre del Médico tratante</label>
			<select id="medico" class="form-control" name="medico">
		 		<?php foreach ($v5 as $row) { ?>
		 			<option value="<?php echo $row->idPersonal;?>"><?php echo $row->nombrePersonal." ".$row->apPaternoPersonal." ".$row->apMaternoPersonal;?></option>
				<?php  } ?>
		 	</select> <br>
		</div>
</body>
</html>

