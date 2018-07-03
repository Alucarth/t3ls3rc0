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
	<h1>USUARIOS PERSONAL</h1>
	<div class="form-group">
		<div class="col-xs-12">
			<button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#myModal">REGISTRAR NUEVO</button>
		</div>
	</div>
	<div class="form-group">
		<div id="resultados" class="col-xs-12">
			<br>
			
			<table id="Jtabla" cellpadding="0" cellspacing="0" border="0" class="table table-striped responsive-utilities jambo_table">
				<thead>
				<tr>
					<th align="left">USUARIO</th>
					<th align="left">CONTRASEÑA</th>
					<th align="left">ESTADO</th>
					<th align="left">PERSONAL</th>
					
					<th align="left"></th>
					<th align="left"></th>
	
				</tr>
				</thead>
				<tbody>

		    	<?php foreach ($usuarios as $row) { ?>
		            <tr>
						
			            <td ><?php echo $row->nombreUsuarioP;?></td>
						<td >*************</td>
						<td ><?php echo $row->estado;?></td>
						<td ><?php echo $row->nombrePersonal." ".$row->apPaternoPersonal." ".$row->apMaternoPersonal ;?></td>
						
						<td><button type="button" class="btn btn-primary" onclick='editar(<?php echo $row->idUsuarioPersonal;?>)'>EDITAR</button></td>
		
			            <td><button type="button" class="btn btn-danger" onclick='borrar(<?php echo $row->idUsuarioPersonal;?>)'>BORRAR</button></td>
		            </tr>
		         <?php  } ?>
		        </tbody>
		    </table>
		</div>
	</div>

	</div>
</div>


<!-- Modal -->
<form action="RegistrarUsuario" method="POST">
	

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Nuevo Usuario</h4>
      </div>
      <div class="modal-body">
        
      	 <div class="form-group">
	        <label for="nombre_paciente">Usuario</label>
	        <input type="text" class="form-control" name="nombre" placeholder="Nombre de usuario">
	      </div>

	      <div class="form-group">
	        <label for="nombre_paciente">Contraseña</label>
	        <input type="password" class="form-control" name="contraseña">
	      </div>

	       <div class="form-group">
	        <label for="nombre_paciente">Confirmar Contraseña</label>
	        <input type="password" class="form-control" name="contraseña">
	      </div>
	      
	     
	 
     	   <div class="form-group">
                <label for="Sexo">Asignacion de Personal</label>

                <select  class="form-control" name="idPersonal">
                 <?php foreach($medicos as $medico){ ?>
                  <option value="<?php echo "".$medico->idPersonal; ?>"> <?php echo $medico->nombrePersonal." ".$medico->apPaternoPersonal." ".$medico->apMaternoPersonal ?> </option>
                 
                 <?php }?> 
                </select>

                
            </div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary">Guardar</button>
      </div>
    </div>
  </div>
</div>

</form>