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
			
	</div>
		
	<div class="col-xs-12" >
		<strong>SIGNOS:</strong>	
		<div class="checkbox">
			<label><strong>Come:</strong> </label>
            <label> 
                <input type="checkbox" value="1" name="sc" id="sc">SI
            </label>
            <label> 
                <input type="checkbox" value="1" name="scn" id="scn">NO
            </label>
            <label> 
                <input type="checkbox" value="1" name="sPoco" id="sPoco">Poco
            </label>
            <label> 
                <input type="checkbox" value="1" name="sAnsioso" id="sAnsioso">Ansioso 
            </label>
            <label>&nbsp;Última vez:<input type="TEXT" class="form-control-inline" name="us" id="us" placeholder=" 00:00">
			</label> <br><br>
            <label><strong>Bebe:</strong> </label>
            <label> 
                <input type="checkbox" value="1" name="sb" id="sb">SI
            </label>
            <label> 
                <input type="checkbox" value="1" name="sbn" id="sbn">NO
            </label>
            <label> 
                <input type="checkbox" value="1" name="sbPoco" id="sbPoco">Poco
            </label>
            <label> 
                <input type="checkbox" value="1" name="sbAnsioso" id="sbAnsioso">Constante 
            </label>
            <label>Última vez:<input type="TEXT" class="form-control-inline"  name="ub" id="ub" placeholder=" 00:00">
			</label> <br><br>
			<label><strong>Defecación:</strong> </label>
            <label> 
                <input type="checkbox" value="1" name="di" id="di">Involuntaria
            </label>
            <label> 
                <input type="checkbox" value="1" name="dd" id="dd">Dificultosa
            </label> <br><br>
            <label><strong>Consistencia:</strong> </label>
            <label> 
                <input type="checkbox" value="1" name="dc" id="dc">Dura
            </label>
            <label> 
                <input type="checkbox" value="1" name="dcp" id="dcp">Pastosa
            </label>
            <label> 
                <input type="checkbox" value="1" name="dcd" id="dcd">Diarrea
            </label>
			<label> 
                <input type="checkbox" value="1" name="dcdolor" id="dcdolor">Dolor
            </label>
			<label> 
                <input type="checkbox" value="1" name="dcolor" id="dcolor">Olor
            </label>
            <label>Color: <input type="TEXT" class="form-control-inline" name="uc" id="uc" placeholder=" Color">
			</label> <br><br>
            <label><strong>Micción:</strong> </label>
            <label> 
                <input type="checkbox" value="1" name="mi" id="mi">Involunatria
            </label>
           	<label> 
                <input type="checkbox" value="1" name="mdolor" id="mdolor">con Dolor
            </label>
            <label>
            	Color: <input type="TEXT" class="form-control-inline" name="micolor" id="micolor" placeholder=" Color">
            	Postura: <input type="TEXT" class="form-control-inline" name="mpostura" id="mpostura" placeholder=" Postura"><br><br>
            	Cantidad: <input type="TEXT" class="form-control-inline" name="mcantidad" id="mcantidad" placeholder="Cantidad">
			</label> <br><br>
			<label><strong>Conducta:</strong> </label><br>
            <label> 
                <input type="checkbox" value="1" name="cnn" id="cnn">Normal
            </label>
            <label> 
                <input type="checkbox" value="1" name="cns" id="cns">Sufrió cambios
            </label>
           	<label> 
                <input type="checkbox" value="1" name="cnd" id="cnd">Desganado
            </label>
			<label> 
                <input type="checkbox" value="1" name="cne" id="cne">Se esconde
            </label>
            <label> 
                <input type="checkbox" value="1" name="cna" id="cna">Agresivo
            </label>
            <label> 
                <input type="checkbox" value="1" name="cnm" id="cnm">Muerde objetos
            </label><hr>
			
        </div>
	</div>
	<div class="col-xs-12" >
		<strong>ANTECEDENTES</strong>
		<div class="checkbox">
			<label><strong>Anteriores Enfermedades:</strong> </label>
	        <label> 
	            <input type="checkbox" value="1" name="as" id="as">SI
	        </label>
	        <label> 
	            <input type="checkbox" value="1" name="an" id="an">NO
	        </label>
	        <label>Enfermedades:<input type="TEXT" class="form-control-inline"  name="ae" id="ae" placeholder=" Tratamiento ">
			</label> <br><br>
	        <label><strong>Tratamientos:</strong> </label>
	        <label> 
	           	<input type="checkbox" value="1" name="ats" id="ats">SI
	        </label>
	        <label> 
	            <input type="checkbox" value="1" name="atn" id="atn">NO
	        </label>
	        <label>Tratamiento:<input type="TEXT" class="form-control-inline"  name="att" id="att" placeholder=" Tratamiento ">
			</label>
			<label><strong>Alergías:</strong> </label>
	        <label> 
	            <input type="checkbox" value="1" name="aas" id="aas">SI
	        </label>
	        <label> 
	            <input type="checkbox" value="1" name="aan" id="aan">NO
	        </label><br>
	        <label><strong>Traumatismos:</strong> </label>
	        <label> 
	           	<input type="checkbox" value="" name="atrs" id="atrs">SI
	        </label>
	        <label> 
	            <input type="checkbox" value="" name="atrn" id="atrn">NO
	        </label>
	        <label><strong>Cirugías:</strong> </label>
	        <label> 
	           	<input type="checkbox" value="" name="acs" id="acs">SI
	        </label>
	        <label> 
	            <input type="checkbox" value="" name="acn" id="acn">NO
	        </label> <hr>
		</div>
	</div>
	<div class="col-xs-12" >
		<strong>EXÁMEN FÍSICO</strong>
		<div class="checkbox">
	        <label><strong>Peso:</strong> <input type="TEXT" class="form-control-inline"  name="peso" id="peso" placeholder=" Peso ">&nbsp;Kg.
			</label> 
			<label><strong>Temperatura:</strong> <input type="TEXT" class="form-control-inline"  name="temp" id="temp" placeholder=" Temperatura ">&nbsp;° C 
			</label> <br><br>
			<label><strong>Frecuencia Cardiaca:</strong> <input type="TEXT" class="form-control-inline"  name="frecc" id="frecc" placeholder=" Frec. Cardiaca ">&nbsp;latidos/m.
			</label> <br><br>
			<label><strong>Frecuencia Respiratoria:</strong> <input type="TEXT" class="form-control-inline"  name="frecr" id="frecr" placeholder=" Frec. Respiratoria">&nbsp;respiración/m.
			</label> <br><br>
			<label><strong>Pulso:</strong> <input type="TEXT" class="form-control-inline"  name="pulso" id="pulso" placeholder=" Pulso ">
			</label> 
			<hr>
		</div>
	</div>



</body>
</html>

