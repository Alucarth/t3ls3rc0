    <body>
    <form action="#" method="post" class="form-horizontal col-lg-12 col-md-12 col-xs-12">
        Ingreso por: 
        <select id="status" name="status" onChange="mostrar(this.value);">
            <option SELECT>Seleccione una opción</option>
            <option value="HFC">HFC-TIGO</option>
            <option value="FNG">FUNGIBLES</option>
            <option value="UM">ÚLTIMA MILLA</option>
            <option value="EPP">EPP</option>
            <option value="HRR">HERRAMIENTAS</option>
            <option value="OTRO">OTROS</option>
        </select>
    </form>
    <div id="HFC" style="display: none;" class="form-horizontal col-lg-12 col-md-12 col-xs-12">
        <h2>MATERIAL HFC TIGO A ALMACÉN TELSERCO S.R.L.</h2> 
        <form action="GuardarNotaIng" method="post">
            <div class="col-xs-3">
                <label>Fecha: </label>
                <input type="text" class="datepicker"  name='fecha_nac'id="fecha_nac" requiered placeholder="Mes-Día-Año">  <BR> 
                <label>N° de Factura/Traspaso/Nota:</label><input class="form-control" name="nn" placeholder="N° de Factura"><br>
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">Agregar</button>
            </div>
            <div class="col-xs-5">
                <input class="form-control" name="reg" size=10 style="text-transform:uppercase"  value="<?php echo $reg;?>" DISABLED required  style="width : 1px; heigth : 1px">
            </div>
            <br><br>
            
            <table id="TablaPro" class="table">
                <thead>
                    <tr>
                        <th>Id-Producto</th>
                        <th>Cantidad</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody id="ProSelected"><!--Ingreso un id al tbody-->
                    <tr>
                 
                    </tr>
                </tbody>
            </table>
            
            <input type="hidden" name="notaForm" id="notaForm" value="1">
           <label>Detalle: </label><input class="form-control" placeholder="Detalle o concepto de recepción" name="ob1" required><br>                    

           <label>Observación:</label><textarea class="form-control" name="ob2" size=10 placeholder="Observaciones de la recepción"></textarea> 
           <HR>
       
    <!--Agregue un boton en caso de desear enviar los productos para ser procesados-->
            <div class="form-group">
                <button type="submit" id="guardar" name= "guardar" disabled class="btn btn-lg btn-default pull-right">Guardar</button>
            </div>
        </form>
    </div>
                
    <div class="container">
        <div class="modal fade" id="myModal" role="dialog">

            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Agregar producto a la lista</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Producto</label>
                            <select class="selectpicker form-control" id="pro_id" name="pro_id" data-width='100%' >
                                <option value="">Selecciona</option>
                                <?php foreach ($v4 as $row1) { ?>
                                <option id="pro_id" name="pro_id" value="<?php echo $row1->Id_material."--".$row1->Cod_material_ext."---".$row1->Nombre_ext."---".$row1->Cod_material_int."---".$row1->Nombre_int;?>"><?php echo $row1->Cod_material_ext." - ".$row1->Nombre_int;?></option>
                                <?php  } ?> 
                            </select>
                        </div>
                        <div class="modal-footer">
                            <!--Uso la funcion onclick para llamar a la funcion en javascript-->
                            <button type="button" onclick="agregarProducto()" class="btn btn-default" data-dismiss="modal">Agregar</button>
                        </div>
                    </div>

                </div>
            </div>

        </div> 
    </div>
</body>

<script >
    function mostrar(id) {
        if (id == "HFC") {
            $("#HFC").show();
            $("#FNG").hide();
            $("#UM").hide();
            $("#EPP").hide();
            $("#HRR").hide();
            $("#OTRO").hide();
        }

        if (id == "FNG") {
            $("#HFC").hide();
            $("#FNG").show();
            $("#UM").hide();
            $("#EPP").hide();
            $("#HRR").hide();
            $("#OTRO").hide();
        }

        if (id == "UM") {
            $("#HFC").hide();
            $("#FNG").hide();
            $("#UM").show();
            $("#EPP").hide();
            $("#HRR").hide();
            $("#OTRO").hide();
        }

        if (id == "EPP") {
            $("#HFC").hide();
            $("#FNG").hide();
            $("#UM").hide();
            $("#EPP").show();
            $("#HRR").hide();
            $("#OTRO").hide();
        }
        if (id == "HRR") {
            $("#HFC").hide();
            $("#FNG").hide();
            $("#UM").hide();
            $("#EPP").hide();
            $("#HRR").show();
            $("#OTRO").hide();
        }

        if (id == "OTRO") {
            $("#HFC").hide();
            $("#FNG").hide();
            $("#UM").hide();
            $("#EPP").hide();
            $("#HRR").hide();
            $("#OTRO").show();
        }
        

    };

    // Obtiene los valores de los textbox al dar click en el boton "Enviar"
    var divValue, values = '';

    function GetTextValue() {

        $(divValue).empty(); 
        $(divValue).remove(); values = '';

        $('.input').each(function() {
            divValue = $(document.createElement('div')).css({
                padding:'5px', width:'200px'
            });
            values += this.value + '<br />'
        });

        $(divValue).append('<p><b>Tus valores añadidos</b></p>' + values);
        $('body').append(divValue);

    }
    function RefrescaProducto(){
        var ip = [];
        var i = 0;
        $('#guardar').attr('disabled','disabled'); //Deshabilito el Boton Guardar
        $('.iProduct').each(function(index, element) {
            i++;
            ip.push({ id_pro : $(this).val() });
        });
        // Si la lista de Productos no es vacia Habilito el Boton Guardar
        if (i > 0) {
            $('#guardar').removeAttr('disabled','disabled');
        }
        var ipt=JSON.stringify(ip); //Convierto la Lista de Productos a un JSON para procesarlo en tu controlador
        $('#ListaPro').val(encodeURIComponent(ipt));
    }
       function agregarProducto() {

            var sel = $('#pro_id').find(':selected').val(); //Capturo el Value del Producto
            var text = $('#pro_id').find(':selected').text();//Capturo el Nombre del Producto- Texto dentro del Select
           
            
            var sptext = text.split();
            
            var newtr = '<tr class="item"  data-id="'+sel+'">';
            newtr = newtr + '<td class="iProduct" >' + sel + '</td>';
            newtr = newtr + '<td><input  class="form-control" id="2" name="cantidad" value="0" required /></td>';
            newtr = newtr + '<td><button type="button" class="btn btn-danger btn-xs remove-item"><i class="fa fa-times"></i></button></td></tr>';
            
            $('#ProSelected').append(newtr); //Agrego el Producto al tbody de la Tabla con el id=ProSelected
            
            RefrescaProducto();//Refresco Productos
                
            $('.remove-item').off().click(function(e) {
                $(this).parent('td').parent('tr').remove(); //En accion elimino el Producto de la Tabla
                if ($('#ProSelected tr.item').length == 0)
                    $('#ProSelected .no-item').slideDown(300); 
                RefrescaProducto();
            });        
           $('.iProduct').off().change(function(e) {
                RefrescaProducto();
           });
    };


    
</script >