<head>
<style type="text/css">
  .boton_personalizado{
    text-decoration: none;
    border: 2px solid #d0ebf5;
	 background: #3a7999;
	 color: #f2f2f2;
	 padding: 10px;
	 font-size: 18px;
	 border-radius: 5px;
	 position: relative;
	 box-sizing: border-box;
	 transition: all 500ms ease;

  }
  .boton_personalizado:hover{
    color: #1883ba;
    background-color: #ffffff;
  }
</style>
</head>
<body>
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
				<h1>SUBDEALERS</h1>
				<br> <br>
				<?php 
	  			foreach ($v5 as $row) { ?>
				<div class="col-xs-4">
					<div class="panel panel-info">
				      <div class="panel-heading">SUBDEALER:</div>
				      <div class="panel-body" align="center">
				      	<STRONG><?php echo $row->Razon_social_proveedor;?>
				      	<BR> NIT: <?php echo $row->NIT;?></STRONG>
				      	<BR>Teléfono: <?php echo $row->Telefono_1_proveedor;?>
				      	<BR>Dirección: <?php echo $row->Direccion_proveedor;?>
				      	<br><?php echo $row->Regional;?>
				      	<br>
				      	<br>
				      	<button type="button" class="boton_personalizado" onclick='lista_subd(<?php echo $row->Id_proveedor;?>)'><i class="fa fa-file-text-o"></i>  PERSONAL</button>
				      </div>
				    </div>

				</div>
				<?php }?>
			</div>
</div>
</body>


