<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>


</head>
<body>
	
	<div class="col-xs-12">

		<!--label>Nombre Paciente: <?php echo $datas->nombreFamiliar ;?></label-->
		<table>
			
			<thead>
				<tr>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td><label > Nombre Paciente:&nbsp;&nbsp;</label><?php echo $NombrePaciente;?></td>
					<td><label > Nombre Familiar: &nbsp;</label><?php echo $nombreFamiliar ;?></td>
				</tr>
				<tr>
					<td><label >Médico tratante:</label> <?php echo $nombrePersonal." ".$apPaternoPersonal;?>&nbsp;&nbsp;&nbsp;&nbsp;</td>
					<td><label > Fecha:</label> <?php echo $fechaConsulta;?></td>
					<input type="hidden" name="id_con"  id="id_con" value="<?php echo $idConsultaMedica;?>"> 
				</tr>
			</tbody>
		</table>
		<hr>
		<strong>DIAGNÓSTICO MÉDICO</strong><br>

		 <label><strong>Enfermedad Actual:</strong> </label> 
		 <textarea class="form-control" row="4" name="enfact" id="enfact" placeholder="Descripción de la enfermedad Actual "></textarea> 
		 <div class="col-xs-6">
		 	 <label><strong>Diagnóstico Principal: </strong> </label> 
			 <textarea class="form-control" row="2" name="diagP" id="diagP" placeholder=" Diagnóstico Principal "></textarea> 
		 </div>
		 <div class="col-xs-6">
			 <label><strong>Diagnóstico Secundario: </strong> </label> 
			 <textarea class="form-control" row="2" name="diagS" id="diagS" placeholder="Diagnóstico Secundario  "></textarea>
		 </div>
		<div class="col-xs-12">
			 <hr>
		</div>
		<label><strong>Examenes Complementarios:</strong> </label> <br>
		<label>Rayos X: </label> 
		<input class="form-control" row="4" name="rx" id="rx" placeholder="Rayos X ">
		<label>Ecografía: </label> 
		<input class="form-control" row="4" name="eco" id="eco" placeholder="Ecografía "> 
		<label>Laboratorio: </label> 
		<input class="form-control" row="4" name="lab" id="lab" placeholder="Laboratorio "><hr>
		<label><strong>Pronóstico:</strong> </label> 
		<input class="form-control" row="4" name="pro" id="pro" placeholder="Pronóstico">
		<label><strong>Medicación:</strong> </label> 
		<input class="form-control" row="4" name="med" id="med" placeholder="Medicación">
		<label><strong>Indicación:</strong> </label> 
		<input class="form-control" row="4" name="ind" id="ind" placeholder="Indicación">
		<label><strong>Días tratamiento:</strong> </label> 
		<select id="dias" name="dias" class="form-control"> 
					 	<option value="">Seleccione</option>   
					 	<option value="3">3 Días  </option>   
					 	<option value="5">5 Días</option>  
					 	<option value="7">7 Días</option>  
					 	<option value="10">10 Días</option>
					 	<option value="30">1 mes</option>	
		</select>
		<hr>

	
	</div>


</body>
</html>