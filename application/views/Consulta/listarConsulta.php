  <div class="x_panel">
  <div class="x_title">
     <h2>Clínica Veterinaria Qhäna</h2>
    <ul class="nav navbar-right panel_toolbox">
      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
      </li>
     
      <li><a class="close-link"><i class="fa fa-close"></i></a>
      </li>
    </ul>
    <div class="clearfix"></div>
  </div>
  <div class="x_content">
    <br />
						<input type="hidden" value="<?=base_url()?>" id ="base_url">
						<h1>CONSULTAS </h1>
						<div class="form-group">
							<div class="col-xs-12">
								<button type="button" class="btn btn-success pull-right" id="nueva_consulta">NUEVA CONSULTA<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button>
							</div>
						</div>
						<div class="form-group">
							<div id="consulta" class="col-xs-12">
								<br>
								<table id="tabla_consulta" cellpadding= "0" cellspacing="0" border="0" class="table table-striped responsive-utilities jambo_table">
									<thead>
									<tr>
										<th align="left">NOMBRE DEL PACIENTE</th>
										<th align="left">FECHA Y HORA DE LA CONSULTA</th>
										<th align="left">MÉDICO TRATANTE</th>
										<th align="left"></th>
										<th align="left"></th>
						
									</tr>
									</thead>
									<tbody>

							    	<?php foreach ($v4 as $row) { ?>
							            <tr>
											<td ><?php echo $row->nombrePaciente;?></td>
											<td ><?php echo $row->fechaConsulta." ".$row->horaInicio." ".$row->horaFin;?></td>
											<td ><?php echo $row->nombrePersonal." ".$row->apPaternoPersonal." ".$row->apMaternoPersonal;?></td>

											<?php if ($row->seguimiento==0) {?>
											<td><button type="button" class="btn btn-primary" onclick="examen(<?php echo $row->idConsultaMedica; ?>,<?php echo $row->idPaciente; ?>)">EXAMEN FÍSICO</button></td>
										    <td><button type="button" class="btn btn-dark" onclick="atencion(<?php echo $row->idConsultaMedica;?>,<?php echo $row->idPaciente; ?>)" disabled="">ATENCIÓN MÉDICA</button></td>
							            
										<?php }
										else {?>
											<td><button type="button" class="btn btn-dark" onclick="examen(<?php echo $row->idConsultaMedica; ?>,<?php echo $row->idPaciente; ?>)" disabled="">EXAMEN FÍSICO</button></td>
										    <td><button type="button" class="btn btn-primary" onclick="atencion(<?php echo $row->idConsultaMedica;?>,<?php echo $row->idPaciente; ?>)">ATENCIÓN MÉDICA</button></td>
							            
										<?php }?>
											</tr>
							         <?php  } ?>
							        </tbody>
							    </table>
							</div>
						</div>
						
      </div>
  </div>

						 <!--====================================================================-->
					<form class="form-horizontal col-lg-12 col-md-12 col-xs-12" method="post" enctype="multipart/form-data" id="form_consulta" action="RegistraNewConsulta">
						<div class="modal fade form_new_consulta" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
						    <div class="modal-dialog" role="document">
						      <div class="modal-content">
						          <div class="modal-header">
						          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						          <span aria-hidden="true">×</span></button>
						          <h4 class="modal-title" id="myLargeModalLabel"><strong>FORMULARIO DE REGISTRO NUEVA CONSULTA</strong></h4> </div>
						          <div class="modal-body">

						           <div class="row ">
						             <div class="row f_n_consulta">

						             </div>
						 			<div class="col-xs-8"></div>
						           	<button type="button" class="btn btn-danger" id ="cancelar_f_consulta_n">Cancelar</button>
									<div class="col-xs-2">
						           		<button type="submit" class="btn btn-success" id="guardar_f_consulta_n">Guardar</button>
						           	</div>

						           </div>
						        </div>
						      </div>
						    </div>
						  <!--====================================================================-->
						</div>
					</form>

					 <!--====================================================================-->
					 		 <!--====================================================================-->
 
					 	<form class="form-horizontal col-lg-12 col-md-12 col-xs-12" method="post" enctype="multipart/form-data" id="form_consulta" action="RegistroPreConsulta">

						<div class="modal fade form_pre_consulta" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
						    <div class="modal-dialog" role="document">
						      <div class="modal-content">
						          <div class="modal-header">
						          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						          <span aria-hidden="true">×</span></button>
						          <h4 class="modal-title" id="myLargeModalLabel"><strong>FORMULARIO DE PRE CONSULTA</strong></h4> </div>
						          <div class="modal-body">


						           <div class="row ">
						           <div class="row f_pre_consulta">

						             </div>
						             
						 			<div class="col-xs-8"></div>
						           	<button type="button" class="btn btn-danger" id ="cancelar_f_pre_consulta">Cancelar</button>
									<div class="col-xs-2">
						           		<button type="submit" class="btn btn-success" id="guardar_f_pre_consulta">Guardar</button>
						           	</div>

						           </div>
						        </div>
						      </div>
						    </div>
						  <!--====================================================================-->
						</div>
						</form>

					 <!--====================================================================-->
					  <!--====================================================================-->
					 		 <!--====================================================================-->
					 <form class="form-horizontal col-lg-12 col-md-12 col-xs-12" method="post" enctype="multipart/form-data" id="form_consulta_medica" action="RegistroConsulta">
						<div class="modal fade form_consulta_medica" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
						    <div class="modal-dialog" role="document">
						      <div class="modal-content">
						          <div class="modal-header">
						          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						          <span aria-hidden="true">×</span></button>
						          <h4 class="modal-title" id="myLargeModalLabel"><strong>CONSULTA MÉDICA</strong></h4> </div>
						          <div class="modal-body">

						           <div class="row ">
						             <div class="row f_consulta_m">

						             </div>
						 			<div class="col-xs-4"></div>
						           	<button type="button" class="btn btn-danger" id ="cancelar_f_consulta_m">Cancelar</button>
									<div class="col-xs-5">
						           		<button type="submit" class="btn btn-success" id="guardar_f_consulta_m">Registrar Consulta Médica</button>
						           	</div>

						           </div>
						        </div>
						      </div>
						    </div>
						  <!--====================================================================-->
						</div>
					</form>

					 <!--====================================================================-->





 
