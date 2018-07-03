<head>
	<style type="text/css">
		/*label,input,textarea{
			text-transform: uppercase;
			font-size: 10pt;
			color: black;
			}*/
			table th,td {
			  text-align: center;
			}
		}
	</style>
</head>
<body>
	<div class="col-xs-12"> 
		<div class="form-horizontal col-lg-12 col-md-12 col-xs-12">
			<H4 align="center"><label >MATERIAL ASIGNADO</label></H4>
				
				<HR>
		<font color=black>
			<div class="col-xs-1"></div>
			<div class="col-xs-6">
				Técnico: <?php echo $nombre;?> <br>
				<?php echo $cargo;?><br>
				Regional:  <?php echo $regional;?><br>
				Código: &nbsp&nbsp&nbsp<?php echo $cod;?> <br>
				Fecha:<?php echo $hoy;?>
			</div>
			<div class="col-xs-5">
				
				<img  width="80" height="80" src="/../telserco1/uploads/<?php echo $foto;?>"/> 
			</div>

			<div class="col-xs-12"><hr></div>
			<div class="col-xs-12">
				<div class="col-xs-1"></div>
				<table border=1 align=center>
				  <tr >
				  	<th>Nro</th>
				    <th> Código Ítem </th>
				    <th> Nombre Ítem </th>
				    <th> Fecha-Hora Entrega </th>
				    <th> Cantidad </th>
				  </tr>
				  <tr>
				  		<td>1</td>
				  		<?php foreach ($n1 as $row) {?>
				  			<td><?php echo $row ?></td>
				  		<?php }?>
				  </tr>
				  <tr>
				  		<td>2</td>
				  		<?php foreach ($n2 as $row) {?>
				  			<td><?php echo $row ?></td>
				  		<?php }?>
				  </tr>
				  <tr>
				  		<td>3</td>
				  		<?php foreach ($n3 as $row) {?>
				  			<td><?php echo $row ?></td>
				  		<?php }?>
				  </tr>
				  <tr>
				  		<td>4</td>
				  		<?php foreach ($n4 as $row) {?>
				  			<td><?php echo $row ?></td>
				  		<?php }?>
				  </tr>
				  <tr>
				  		<td>5</td>
				  		<?php foreach ($n5 as $row) {?>
				  			<td><?php echo $row ?></td>
				  		<?php }?>
				  </tr>
				  <tr>
				  		<td>6</td>
				  		<?php foreach ($n6 as $row) {?>
				  			<td><?php echo $row ?></td>
				  		<?php }?>
				  </tr>
				  <tr>
				  		<td>7</td>
				  		<?php foreach ($n7 as $row) {?>
				  			<td><?php echo $row ?></td>
				  		<?php }?>
				  </tr>
				  <tr>
				  		<td>8</td>
				  		<?php foreach ($n8 as $row) {?>
				  			<td><?php echo $row ?></td>
				  		<?php }?>
				  </tr>
				 
				   <tr>
				  		<td>9</td>
				  		<?php foreach ($n13 as $row) {?>
				  			<td><?php echo $row ?></td>
				  		<?php }?>
				  </tr>
				  <tr>
				  		<td>10</td>
				  		<?php foreach ($n14 as $row) {?>
				  			<td><?php echo $row ?></td>
				  		<?php }?>
				  </tr>
				  <tr>
				  		<td>11</td>
				  		<?php foreach ($num_deco as $row) {?>
				  			<td><?php echo $row ?></td>
				  		<?php }?>
				  </tr>
				  <tr>
				  		<td>12</td>
				  		<?php foreach ($num_modem as $row) {?>
				  			<td><?php echo $row ?></td>
				  		<?php }?>
				  </tr>
				</table>
			</div>
			<div class="col-xs-12">
				<hr>
				<div class="col-xs-3">
					<?php 
					if ($deco!=null) {
						echo "<label>DECODIFICADORES</label> <BR>";
						foreach ($deco as $row) {
							$fecha = new DateTime($row->Fecha_ingreso); 
							$fecha = $fecha->format("d-m-y");
				  			//echo $fecha.".<strong>".$row->SERIAL."</strong><br>" ;
				  			echo "<strong>".$row->SERIAL."</strong><br>" ;
				  		}
				  	}
				  	else	echo "SIN DECODIFICADORES";?>					
				</div>
				<div class="col-xs-3">
					<?php 
					if ($modem!=null) {
						echo "<label>MODEM</label> <BR>";
						foreach ($modem as $row) {
				  			$fecha = new DateTime($row->Fecha_ingreso); 
							$fecha = $fecha->format("d-m-y");
				  			//echo $fecha.".<strong>".$row->SERIAL."</strong><br>" ;
				  			echo "<strong>".$row->SERIAL."</strong><br>" ;
				  		}
				  	}
				  	else	echo "SIN MODEMS";?>	
				</div>
				<div class="col-xs-3">
					<?php 
					if ($carreta1!=null) {
						echo "<label>CARRETA C/P</label> <BR>";
						foreach ($carreta1 as $row) {
				  			$fecha = new DateTime($row->Fecha_ingreso); 
							$fecha = $fecha->format("d-m-y");
				  			echo $fecha.".<strong>".$row->SERIAL."</strong><br>" ;
				  		}
				  	}
				  	else	echo "SIN CARRETAS C/P";?>	
				</div>
				<div class="col-xs-3">
					<?php 
					if ($carreta2!=null) {
						echo "<label>CARRETA S/P</label> <BR>";
						foreach ($carreta2 as $row) {
				  			$fecha = new DateTime($row->Fecha_ingreso); 
							$fecha = $fecha->format("d-m-y");
				  			echo $fecha.".<strong>".$row->SERIAL."</strong><br>" ;
				  		}
				  	}
				  	else	echo "SIN CARRETAS S/P";?>	
				</div>
			</div>
		</font>
		<br>
		</div>

	</div>
	<div class="col-xs-12">

        <div class="col-xs-10"></div>
              <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        <div class="col-xs-2">
               
        </div>   
     </div>
</body>	