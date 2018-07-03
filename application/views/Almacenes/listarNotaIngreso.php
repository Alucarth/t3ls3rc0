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
	<h1>NOTAS DE ENTRADA</h1>
	<div class="form-group">
		<div class="col-xs-12">
			<a href="<?=base_url()?>index.php/Herramientas_almacen/NuevaNotaIng" class="btn btn-success pull-right"><span class="glyphicon glyphicon-plus"></span> NUEVA NOTA DE INGRESO</a>
		</div>
	</div>
	<div class="form-group">
		<div id="tabla_nota" class="col-xs-12">
			<br>
			<table id="almacen_2" cellpadding="0" cellspacing="0" border="0" class="table table-striped responsive-utilities jambo_table">
				<thead>
				<tr>
					<th align="left">N°</th>
					<th align="left">CÓDIGO</th>
					<th align="left">RAZÓN SOCIAL</th>
					<th align="left">DESCRIPCIÓN</th>
					<th align="left">FECHA INGRESO</th>
					<th align="left">OBSERVACIÓN</th>
					<th align="left"></th>
					<th align="left"></th>
					<th align="left"></th>
				</tr>
				</thead>
				<tbody>

	         <?php foreach ($v4 as $row) { ?>
		            <tr>
						<td ><?php echo $row->Id_nota_i;?></td>
						<td ><?php echo $row->Codigo_entrega;?></td>
						<td ><?php echo $row->Razon_social_proveedor;?></td>
						<td ><?php echo $row->Observacion;?></td>
						<td ><?php echo $row->Fecha_ingreso_nota;?></td>
						<td ><?php echo $row->Observacion_1;?></td>			            
												

						<td><button type="button" class="btn btn-dark" onclick='borrar(<?php echo $row->idPersonal;?>)' disabled ><span class="glyphicon glyphicon-file"></span> VER DATOS</button></td>
			            <td><button type="button" class="btn btn-primary" onclick='borrar(<?php echo $row->idPersonal;?>)' disabled ><span class="glyphicon glyphicon-file"></span> AÑADIR</button></td>
			            <td><button type="button" class="btn btn-danger" onclick='borrar(<?php echo $row->idPersonal;?>)' disabled ><span class="glyphicon glyphicon-file"></span> FINALIZAR</button></td>
		            </tr>
		         <?php  } ?>
		        </tbody>
		    </table>
		</div>
	</div>

	</div>
</div>
	

	 <!--====================================================================-->
	<div class="modal fade form_new" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
	    <div class="modal-dialog modal-lg" role="document">
	      <div class="modal-content">
	          <div class="modal-header">
	          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">×</span></button>
	          <h4 class="modal-title" id="myLargeModalLabel"><strong>FORMULARIO DE REGISTRO NUEVA ENTREGA</strong></h4> </div>
	          <div class="modal-body">

	           <div class="row ">
	             <div class="row f_p">

	             </div>
	 			<div class="col-xs-8"></div>
	           	

	           </div>
	        </div>
	      </div>
	    </div>
	  <!--====================================================================-->
	</div>

 <!--====================================================================-->
 		 <!--====================================================================-->
	<div class="modal fade form_edit" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
	    <div class="modal-dialog modal-lg" role="document">
	      <div class="modal-content">
	          <div class="modal-header">
	          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">×</span></button>
	          <h4 class="modal-title" id="myLargeModalLabel"><strong>FORMULARIO DE EDICIÓN DE PERSONAL</strong></h4> </div>
	          <div class="modal-body">

	           <div class="row ">
	             <div class="row f_p_e">

	             </div>
	 			<div class="col-xs-8"></div>
	           	<button type="button" class="btn btn-danger" id ="cancelar_f_e">Cancelar</button>
				<div class="col-xs-2">
	           		<button type="button" class="btn btn-success" id="guardar_f_e">Guardar</button>
	           	</div>

	           </div>
	        </div>
	      </div>
	    </div>
	  <!--====================================================================-->
	</div>

 <!--====================================================================-->
  <!--====================================================================-->
 		 <!--====================================================================-->
	<div class="modal fade form_delete" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
	    <div class="modal-dialog modal-lg" role="document">
	      <div class="modal-content">
	          <div class="modal-header">
	          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">×</span></button>
	          <h4 class="modal-title" id="myLargeModalLabel"><strong>ELIMINACIÓN DE PERSONAL</strong></h4> </div>
	          <div class="modal-body">

	           <div class="row ">
	             <div class="row f_p_d">

	             </div>
	 			<div class="col-xs-8"></div>
	           	<button type="button" class="btn btn-danger" id ="cancelar_f_d">Cancelar</button>
				<div class="col-xs-2">
	           		<button type="button" class="btn btn-success" id="guardar_f_d">Eliminar</button>
	           	</div>

	           </div>
	        </div>
	      </div>
	    </div>
	  <!--====================================================================-->
	</div>

 <!--====================================================================-->






 
