<div id='calendar'></div>

 <?php //echo json_encode($citas)?>
   <?php //echo json_encode($medicos)?>
  <?php //echo json_encode($tipos)?>
  <?php //echo json_encode($cirugias)?>
    
<div id="fullCalModal" class="modal fade">
    <div class="modal-dialog">
      <form  action="registrarCita" method="post"> 
      
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span> <span class="sr-only">close</span></button>
                <h4 id="modalTitle" class="modal-title"></h4>
            </div>
            <div id="modalBody" class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button class="btn btn-primary" disabled="true" type="submit"> Guardar</button>
            </div>
        </div>
      </form>  
    </div>
</div> 

                <!-- End Calender modal -->

                <!--script type="text/javascript">
                    var citas = <?php echo json_encode($citas)?>;
                    var medicos = <?php echo json_encode($medicos)?>;
                    var tipos = <?php echo json_encode($tipos)?>;
                    var cirugias = <?php echo json_encode($cirugias)?>;
                </script>
               
