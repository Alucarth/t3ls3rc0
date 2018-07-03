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
	<h1>TÉCNICOS EDIFICIOS</h1>
	<div class="form-group">
		<div class="col-xs-12">
			<button type="button" class="btn btn-success pull-right" id="new"><span class="glyphicon glyphicon-plus"></span>  REGISTRAR NUEVA ENTREGA</button>
		</div>
	</div>
	<div class="form-group">
		<div id="tabla_mat_tec1" class="col-xs-12">
			<br>
			<table id="material_t" cellpadding="0" cellspacing="0" border="0" class="table table-striped responsive-utilities jambo_table">
				<thead>
				<tr>
					<th align="left">CÓDIGO</th>
					<th align="left">NOMBRE TÉCNICO</th>
					<th align="left">CARGO</th>
					<th align="left"></th>
					<th align="left"></th>
				</tr>
				</thead>
				<tbody>

		         <?php foreach ($v5 as $row) { ?>
		            <tr>
						<td ><?php echo $row->Cod_asignacion;?></td>
						<td ><?php echo $row->Nombre_personal," ",$row->Ap_paterno_personal," ",$row->Ap_materno_personal;?></td>
						<td ><?php echo $row->Nombre_cargo;?></td>
           											
						<td><button type="button" class="btn btn-success" onclick='borrar(<?php echo $row->idPersonal;?>)' disabled ><span class="glyphicon glyphicon-plus"></span>  AÑADIR</button></td>
						<td><button type="button" class="btn btn-dark" onclick='borrar(<?php echo $row->idPersonal;?>)' disabled ><span class="glyphicon glyphicon-file"></span> VER DATOS</button></td>
			            
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
	          <h4 class="modal-title" id="myLargeModalLabel"><strong>FORMULARIO DE REGISTRO DE ASIGNACIÓN DE MATERIAL EDIFICIOS</strong></h4> </div>
	          <div class="modal-body">

	           <div class="row ">
	             <div class="row f_p">

	             </div>

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






 
