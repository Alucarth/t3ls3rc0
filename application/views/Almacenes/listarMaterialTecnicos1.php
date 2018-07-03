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
	<h1>TÉCNICOS INTERNOS</h1>
	<div class="form-group">
		<div class="col-xs-12">
			<button type="button" class="btn btn-success pull-right" id="nueva_entrega_1"><span class="glyphicon glyphicon-plus"></span>  REGISTRAR NUEVA ENTREGA</button>
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
					<th align="left"></th>
				</tr>
				</thead>
				<tbody>

		         <?php foreach ($v5 as $row) { ?>
		            <tr>
						<td ><?php echo $row->Cod_asignacion;?></td>
						<td ><?php echo $row->Nombre_personal," ",$row->Ap_paterno_personal," ",$row->Ap_materno_personal;?></td>
						<td ><?php echo $row->Nombre_cargo;?></td>
           											
						<td><button type="button" class="btn btn-success" onclick='adicionar_material(<?php echo $row->Id_asignacion."."."3";?>)'><span class="glyphicon glyphicon-plus"></span>  AÑADIR</button></td>
						<td><button type="button" class="btn btn-dark" onclick='ver_material_tec(<?php echo $row->Id_asignacion."."."2";?>)'><span class="glyphicon glyphicon-file"></span> VER DATOS</button></td>
			            <td><button type="button" class="btn btn-dark" onclick='imprimir_material_tec(<?php echo $row->Id_asignacion."."."1";?>)'><i class="fa fa-print"></i></button></td>
		            </tr>
		         <?php  } ?>
		        </tbody>
		    </table>
		</div>
	</div>

	</div>
</div>
	

	 <!--====================================================================-->
	
	<div class="modal fade form_new_entrega1" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
	    <div class="modal-dialog modal-lg" role="document">
	      <div class="modal-content">
	          <div class="modal-header">
	          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">×</span></button>
	          <h4 class="modal-title" id="myLargeModalLabel"><strong>FORMULARIO DE REGISTRO DE ASIGNACIÓN DE MATERIAL INTERNO</strong></h4> </div>
	          <div class="modal-body">

	           <div class="row ">
	             <div class="row f_n_entrega1">

	             </div>
	 			</div>

	           </div>
	        </div>
	      </div>
	    </div>
	  <!--====================================================================-->
	</div>

 <!--====================================================================-->
 		 <!--====================================================================-->
	<div class="modal fade form_plus_material1" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
	    <div class="modal-dialog modal-lg" role="document">
	      <div class="modal-content">
	          <div class="modal-header">
	          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">×</span></button>
	          <h4 class="modal-title" id="myLargeModalLabel"><strong>FORMULARIO DE ADICIÓN DE MATERIAL AL PERSONAL INTERNO</strong></h4> </div>
	          <div class="modal-body">

	           <div class="row ">
	             <div class="row f_pp_m">

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
	<div class="modal fade form_vista_m" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
	    <div class="modal-dialog modal-lg" role="document">
	      <div class="modal-content">
	          <div class="modal-header">
	          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">×</span></button>
	          <h4 class="modal-title" id="myLargeModalLabel"><strong>LISTA DE MATERIAL</strong></h4> </div>
	          <div class="modal-body">

	           <div class="row ">
	             <div class="row f_p_v_m">

	             </div>
	 			
	           

	           </div>
	        </div>
	      </div>
	    </div>
	  <!--====================================================================-->
	</div>

 <!--====================================================================-->






 
