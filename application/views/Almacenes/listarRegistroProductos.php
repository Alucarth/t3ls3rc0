<div class="x_panel">
  <div class="x_title">
     <h2>TELSERCO S.R.L.</h2>
    <ul class="nav navbar-right panel_toolbox">
      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
      </li>
     
      <li><a class="close-link"><i class="fa fa-close"></i></a>
      </li>
    </ul>
    <div class="clearfix"></div>
  </div>
  <div class="x_content">
    <br>
	<input type="hidden" value="<?=base_url()?>" id ="base_url">
	<h1>MATERIAL DE  <?php echo $v3->Razon_social_proveedor; ?></h1>
	<H3><?php echo $v3->Observacion." - ".$v3->Regional; ?></H3>
	<div class="form-group">
		<!--div class="col-xs-12">
			<button type="button" class="btn btn-success pull-right" id="new"><span class="glyphicon glyphicon-plus"></span>  REGISTRAR NUEVO</button>
		</div-->
	</div>
	<div class="form-group">
		<div id="tabla_almacen" class="col-xs-12">
			<br>
			<table id="almacen_1" cellpadding="0" cellspacing="0" border="0" class="table table-striped responsive-utilities jambo_table">
				<thead>
				<tr>
					<th align="left">CÓDIGO ALMACEN</th>
					<th align="left">NOMBRE EN ALMACÉN</th>
					<th align="left">CANTIDAD ALMACÉN</th>
					<th align="left">UNIDAD</th>
					<th align="left"></th>
				</tr>
				</thead>
				<tbody>

		    	<?php foreach ($v4 as $row) { ?>
		            <tr>
						<td ><?php echo $row->Cod_item_interno;?></td>
						<td ><?php echo $row->Nombre_Item_interno;?></td>
						<?php 
							if($row->Unidad_medida=="METRO(S)")
							{
								$cantidad='/ '.$row->suma/305;
							}
							else{
								$cantidad="";
							}
							$num=$row->suma;

								foreach ($v5 as $row1) { 

									if ($row->Cod_item_interno==$row1->Cod_item_per and $row->Cod_item_interno==$row1->SERIAL)
									{
										$a=$row->suma;
										$b=$row1->suma2;
										//$b=0;
										$c=$a-$b;
										$num=$c;
										break;						
									 }

									else
									{ 
										$num=$row->suma;
									}
								} 
	
							
							$antes="";
							if($num<10){
								$antes='<font color="red"><strong>Quedan Pocos:';

							}

							?>

						<td><?php echo $antes." ".$num." ".$cantidad;?></td>				
						<td><?php echo $row->Unidad_medida;?></td>

						
						<td><button type="button" class="btn btn-dark" onclick='borrar(<?php echo $row->idPersonal;?>)' disabled ><span class="glyphicon glyphicon-file"></span> VER DATOS</button></td>
			            
		            </tr>
		         <?php  } ?>
		        
		        </tbody>
		    </table>
		</div>
	</div>

	</div>
</div>
	





 
