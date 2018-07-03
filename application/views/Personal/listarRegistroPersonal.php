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
	<h1>PERSONAL <?php echo $v1;  ?></h1>
	<div class="form-group">
		<div class="col-xs-12">
			<button type="button" class="btn btn-success pull-right" id="nuevo_pers_1"><span class="glyphicon glyphicon-plus"></span>  REGISTRAR NUEVO</button>
		</div>
	</div>
	<div class="form-group">
		<div id="resultados" class="col-xs-12">
			<br>
			<table id="Jtabla" cellpadding="0" cellspacing="0" border="0" class="table table-striped responsive-utilities jambo_table">
				<thead>
				<tr>
					<th align="left"></th>
					<th align="left">CÓDIGO</th>
					<th align="left">NOMBRE</th>
					<th align="left">CI</th>
					<th align="left">ÁREA-REGIÓN</th>
					<th align="left">FUNCIONES</th>
					<th align="left">CELULAR</th>
					<th align="left"></th>
					<th align="left"></th>
					<th align="left"></th>
					<th align="left"></th>
					
	
				</tr>
				</thead>
				<tbody>

		    	<?php foreach ($v4 as $row) { ?>
		            <tr>
						<td ><?php $row->Nombre_cargo;?></td>
						<td ><?php echo $row->Cod_asignacion;?></td>
			            <td ><?php echo $row->Nombre_personal," ",$row->Ap_paterno_personal," ",$row->Ap_materno_personal;?></td>
						<td ><?php echo $row->Ci," ",$row->Expedicion_ci_personal;?></td>
						<td ><?php echo $row->Nombre_cargo,"<br> ",$row->Regional;?></td>
						<td ><?php echo $row->Descripcion;?></td>
						<td ><?php echo $row->Telefono_2_personal;?></td>
						<td><button type="button" class="btn btn-dark" onclick='datos_personal(<?php echo $row->Id_asignacion."."."1";?>)'><span class="glyphicon glyphicon-file"></span> VER</button></td>
			            <td><button type="button" class="btn btn-primary" onclick='editar_personal(<?php echo $row->Id_asignacion;?>)'><span class="glyphicon glyphicon-edit"></span> EDITAR</button></td>
			            <td><button type="button" class="btn btn-danger" onclick='borrar_personal(<?php echo $row->Id_asignacion;?>)'><span class="glyphicon glyphicon-remove"></span> BORRAR</button></td>
			            <td><button type="button" class="btn btn-dark" onclick='imprimir_personal(<?php echo $row->Id_asignacion."."."2";?>)' ><i class="fa fa-print"></i></button></td>
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
	          <h4 class="modal-title" id="myLargeModalLabel"><strong>FORMULARIO DE REGISTRO NUEVO PERSONAL</strong></h4> </div>
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
		          <h4 class="modal-title" id="myLargeModalLabel"><strong>ELIMINACIÓN DE PERSONAL</strong></h4> 
	      	</div>
	          <div class="modal-body">

	           <div class="row ">
	             <div class="row f_p_d">

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
 		 <!--====================================================================-->
	<div class="modal fade form_vista" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
	    <div class="modal-dialog modal-lg" role="document">
	      <div class="modal-content">
	          <div class="modal-header">
	          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">×</span></button>
	          <h4 class="modal-title" id="myLargeModalLabel"><strong>DATOS DEL PERSONAL </strong></h4> </div>
	          <div class="modal-body">

	           <div class="row ">
	             <div class="row f_p_v">

	             </div>
	 			<div class="col-xs-8"></div>
	           	<button type="button" class="btn btn-danger" data-dismiss="modal">CERRAR</button>
				<div class="col-xs-2">
	           		
	           	</div>

	           </div>
	        </div>
	      </div>
	    </div>
	  <!--====================================================================-->
	</div>

 <!--====================================================================-->


