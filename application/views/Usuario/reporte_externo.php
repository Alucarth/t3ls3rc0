 <div class="x_panel">
  <div class="x_title">
     <h2>REPORTE USUARIOS PORTAL</h2>
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

	<div class="embed-container"><iframe id="contenido_reporte_externo" frameborder="0" width="700" height="600"> </iframe></div>
	
  </div>
</div>
<script type="text/javascript">
	
	var usuarios_externo = JSON.parse('<?php echo json_encode($usuarios) ?>');
	console.log(usuarios_externo);
	
</script>

