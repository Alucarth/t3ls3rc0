<head>
<style type="text/css">
  .boton_adicion{
    text-decoration: none;
    border: 2px solid #9fea98;
	 background: #3a9945;
	 color: #f2f2f2;
	 padding: 10px;
	 font-size: 12px;
	 border-radius: 5px;
	 position: relative;
	 box-sizing: border-box;
	 transition: all 500ms ease;

  }
  .boton_adicion:hover{
    color: #18ba2b;
    background-color: #ffffff;
  }
  .boton_ver{
    text-decoration: none;
    border: 2px solid #8bc1dc;
	background: #18a6ba;
	color: #f2f2f2;
	padding: 10px;
	font-size: 12px;
	border-radius: 5px;
	position: relative;
	box-sizing: border-box;
	transition: all 500ms ease;

  }
  .boton_ver:hover{
    color: #18a6ba;
    background-color: #ffffff;
  }
  .boton_imprimir{
    text-decoration: none;
    border: 2px solid #b375f4;
	background: #8119EE;
	color: #f2f2f2;
	padding: 10px;
	font-size: 12px;
	border-radius: 5px;
	position: relative;
	box-sizing: border-box;
	transition: all 500ms ease;

  }
  .boton_imprimir:hover{
    color: #8119EE;
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
					      	
					    
						    <button type="button" class="boton_adicion" onclick='adicion_sub(<?php echo $row->Id_proveedor."."."3";?>)'><span class="glyphicon glyphicon-plus"></span>  ADICIÓN</button>
						    <button type="button" class="boton_ver" onclick='ver_sub(<?php echo $row->Id_proveedor."."."2";?>)'><span class="glyphicon glyphicon-list-alt"></span>  VER</button>
						    <button type="button" class="boton_imprimir" onclick='imprimir_sub(<?php echo $row->Id_proveedor."."."1";?>)'><span class="glyphicon glyphicon-print"></span>  IMPRIMIR</button>
					    </div>
					      
				    </div>

				</div>
				<?php }?>
			</div>
</div>
 <!--====================================================================-->
 		 <!--====================================================================-->
	<div class="modal fade form_plus_material2" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
	    <div class="modal-dialog modal-lg" role="document">
	      <div class="modal-content">
	          <div class="modal-header">
	          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">×</span></button>
	          <h4 class="modal-title" id="myLargeModalLabel"><strong>FORMULARIO DE ADICIÓN DE MATERIAL A SUBDEALER</strong></h4> </div>
	          <div class="modal-body">

	           <div class="row ">
	             <div class="row f_pp_m2">

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
	<div class="modal fade form_vista_m2" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
	    <div class="modal-dialog modal-lg" role="document">
	      <div class="modal-content">
	          <div class="modal-header">
	          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">×</span></button>
	          <h4 class="modal-title" id="myLargeModalLabel"><strong>LISTA DE MATERIAL SUBDEALEAR</strong></h4> </div>
	          <div class="modal-body">

	           <div class="row ">
	             <div class="row f_p_v_m2">

	             </div>
	 			
	           

	           </div>
	        </div>
	      </div>
	    </div>
	  <!--====================================================================-->
	</div>

 <!--====================================================================-->
</body>


