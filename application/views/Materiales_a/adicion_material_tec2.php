<head>
    <script type="text/javascript">
        $(":input").on("keydown", function(event) {
            if (event.which === 13 && !$(this).is("textarea, :button, :submit")) {
                event.stopPropagation();
                event.preventDefault();
                
                $(this)
                    .nextAll(":input:not(:disabled, [readonly='readonly'])")
                    .first()
                    .focus();
            }
        });
    </script>
</head>
<body>
  <?php
 if($v2!=null){?>
    <form class="form-horizontal col-lg-12 col-md-12 col-xs-12" method="post" enctype="multipart/form-data" id="form_registro_material" name="form_registro_material"  action="RegistrarDatosAdicionSub">
    <div class="col-xs-12"> 
      <div class="form-group">
         <div class="col-xs-8">   
          <label>SUBDEALER A ADICIONAR MATERIAL</label>
          <input class="form-control" type="hidden" id="tecnico" name="tecnico" value="<?php echo $id."-".$nombre;?>">
          <input class="form-control" type="text" id="tecnico1" name="tecnico1" value="<?php echo $id."-".$nombre;?>" DISABLED>
          <br>
      </div>

      <?php 
      echo "Número de Entrega: <strong>".$numero."</strong><br>";
      echo "Fecha: ".$hoy;
     
      //decodificadores
     $num1=50;      $num2=$num_deco[3];
      $modem1=25;      $modem2=$num_modem[3];
      //cable c/portante
      $rg6c=305;      $rg6c1=$rg6c/305;      $rg6c2=$n13[3];      $rg6c3=$rg6c2/305;
      //cable s/portante
      $rg6s=305;      $rg6s1=$rg6s/305;      $rg6s2=$n14[3];      $rg6s3=$rg6s2/305;
      
      $rca1=40;      $rca2=$n2[3];
      //conectores internos
      $coni1=100;      $coni2=$n3[3];
      //conectores externos
      $cone1=100;      $cone2=$n4[3];
      //spliter 1/2
      $s121=40;      $s122=$n5[3];
      //spliter 1/3
      $s131=40;      $s132=$n6[3];
      //clamp
      $clamp1=20;      $clamp2=$n7[3];

      $filtro1=0;      $filtro2=$n8[3];      

      $hdmi1=50;      $hdmi2=$n1[3];


      // switch para saber si encontró el producto en almacen
      $sw1=0;      $sw2=0;      $sw3=0;      $sw4=0;      $sw5=0;      $sw6=0;      $sw7=0;      $sw8=0;      
      $sw9=0;      $sw10=0;     $sw11=0;     $sw12=0;     $sw13=0;     $sw14=0;     $sw15=0;      $sw16=0;    
      $sw17=0;    $sw18=0;      $sw19=0;     $sw001=0;    $sw002=0;

     ?>
      <br><br>
      <div class="col-xs-10">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>#</th>
              <th>ARTÍCULO</th>
              <th>STOCK TÉCNICO</th>
              <th>STOCK ACTUAL</th>
              <th>ENTREGAR</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row" >1</th>
              <td>DECODIFICADOR + CONTROL</td>
                    <?php foreach ($v4 as $row) { 

                      if ($row->Cod_item_interno=="DCODCON"){
                          $sw1=1;
                          $stock=$row->suma;
                          if($stock>=$num1){
                              $sw1=2;?>
                              <td><input type="number" name="num1" value="<?php echo $num1;?>" onchange="cal()" ></td>
                              <td><?php echo $num2;?></td>
                              <td><input type="number" id="sum1" name="sum1" value="<?php echo $num1-$num2;?>" readonly="readonly" disabled></td>
                              <input type="hidden" name="num2" value="<?php echo $num2;?>" onchange="cal()" disabled/>
                      <?php }
                          else{
                            ?>
                              <td><?php echo $num1;?></td> 
                              <td><?php echo $num2;?></td> 
                              <td>NO HAY STOCK</td>
                              <input type="hidden" id="sum1" name="sum1" value="0" readonly="readonly" disabled>
                  <?php } 
                  break;                
                  }
               }
               if ($sw1==0) {
                  ?>
                        <td><?php echo $num1;?></td> 
                        <td><?php echo $num2;?></td> 
                        <td>NO HAY STOCK EN ALMACÉN</td>
                        <input type="hidden" name="sum1" value="0" readonly="readonly" disabled>
                        <?php
                } ?>    
            </tr>
            <tr>
              <th scope="row" >2</th>
              <td>MODEM</td>
                  <?php foreach ($v4 as $row) { 

                    if ($row->Cod_item_interno=="MDWF"){
                          $sw2=1;
                          $stock=$row->suma;
                          if($stock>=$modem1){
                            $sw2=2;?>
                              <td><input type="number" name="num3" value="<?php echo $modem1;?>" onchange="cal1()" ></td>
                              <td><?php echo $modem2;?></td>
                              <td><input type="number" name="sum2" value="<?php echo $modem1-$modem2;?>" readonly="readonly" disabled></td>
                              <input type="hidden" name="num4" value="<?php echo $modem2;?>" onchange="cal1()" disabled/>
                      <?php }
                          else{
                            ?>
                              <td><?php echo $modem1;?></td> 
                              <td><?php echo $modem2;?></td> 
                              <td>NO HAY STOCK</td>
                              <input type="hidden" name="sum2" value="0" readonly="readonly" disabled>
                    <?php } 
                    break;                                
                    }
                   
                 }
                 if ($sw2==0) {
                    ?>
                          <td><?php echo $modem1;?></td> 
                          <td><?php echo $modem2;?></td> 
                          <td>NO HAY STOCK  EN ALMACÉN</td>
                          <input type="hidden" name="sum2" value="0" readonly="readonly" disabled>
                          <?php
                    
                  } ?> 
              
            </tr>

            <tr>
              <th scope="row" >3</th>
              <td>Cable RG6 c/PORTANTE (305 m)</td>
              <?php foreach ($v4 as $row) { 
                       if ($row->Cod_item_interno=="CCRG6CPHFC"){
                          $sw3=1;
                          $stock=$row->suma;
                          if($stock>=$rg6c){?>                          
                            <td><input type="number" name="num40" value="<?php echo $rg6c1;?>" onchange="cal17()" > Carreta(s)</td>
                            <td><?php echo $rg6c3;?> Carreta(s)</td>
                            <td><input type="number" name="sum20" value="<?php echo $rg6c1-$rg6c3;?>" readonly="readonly" disabled>Carreta(s)</td>
                            <input type="hidden" name="num41" value="<?php echo $rg6c3;?>" onchange="cal17()" disabled/>
                            <?php
                            $sw001=1;
                            $sw3=2;
                          }
                          else{
                            ?>
                              <td>1 Carreta (<?php echo $rg6c;?>metros c/u)</td> 
                              <td><?php echo $rg6c2;?> metros</td> 
                              <td>NO HAY STOCK</td>
                              <input type="hidden" name="sum3" value="0" readonly="readonly" >
                    <?php }
                  break;

                        }
                     }
                     if ($sw3==0) {
                        ?>
                              <td>1 Carreta (<?php echo $rg6c;?> metros c/u)</td> 
                              <td><?php echo $rg6c2;?> metros</td>
                              <td>NO HAY STOCK  EN ALMACÉN</td>
                              <input type="hidden" name="sum3" value="0" readonly="readonly" >
                              <?php
                      } ?> 
            </tr>
            <tr>
              <th scope="row" >4</th>
              <td>Cable RG6 s/PORTANTE</td>
              <?php foreach ($v4 as $row) { 

                if ($row->Cod_item_interno=="CCRG6SPHFC"){
                    $sw4=1;
                    $stock=$row->suma;
                    if($stock>=$rg6s){?>                          
                            <td><input type="number" name="num42" value="<?php echo $rg6s1;?>" onchange="cal18()" > Carreta(s)</td>
                            <td><?php echo $rg6s3;?> Carreta(s)</td>
                            <td><input type="number" name="sum21" value="<?php echo $rg6s1-$rg6s3;?>" readonly="readonly" disabled> Carreta(s)</td>
                            <input type="hidden" name="num43" value="<?php echo $rg6s3;?>" onchange="cal18()" disabled/>
                            <?php
                            $sw001=1;
                            $sw3=2;
                          }
                  else{
                    ?>
                      <td>1 Carreta (<?php echo $rg6s;?> metros) c/u</td> 
                      <td><?php echo $rg6s2;?> metros</td> 
                      <td>NO HAY STOCK</td>
                      <input type="hidden" name="sum4" value="0" readonly="readonly" disabled>
            <?php }
              break;
              }
           }
           if ($sw4==0) {
              ?>
                    <td>1 Carreta (<?php echo $rg6s;?> metros) c/u</td> 
                    <td><?php echo $rg6s2;?> metros</td> 
                    <td>NO HAY STOCK  EN ALMACÉN</td>
                    <input type="hidden" name="sum4" value="0" readonly="readonly" disabled>
                    <?php
            } ?>        
            </tr>
            <tr>
              <th scope="row" >5</th>
              <td>RCA</td>
              <?php foreach ($v4 as $row) { 
                if ($row->Cod_item_interno=="CABAVRGC"){
                          $sw5=1;
                          $c1=$row->suma;
                          foreach ($v2 as $row1) { 
                              if ($row->SERIAL==$row1->SERIAL AND $row1->Cod_item_per==$row->SERIAL){
                                    $a1=$row->suma;
                                    $b1=$row1->suma2;
                                    $c1=$a1-$b1;
                                    break;
                              }
                          }
                          if($c1>=$rca1){?>
                              <td><input type="number" name="num5" value="<?php echo $rca1;?>" onchange="cal2()" ></td>
                              <td><?php echo $rca2;?></td>
                              <td><input type="number" name="sum5" value="<?php echo $rca1-$rca2;?>" readonly="readonly" disabled></td>
                              <input type="hidden" name="num6" value="<?php echo $rca2;?>" onchange="cal2()" disabled/>
                      <?php }
                          else{
                            ?>
                              <td><?php echo $rca1;?></td> 
                              <td><?php echo $rca2;?></td> 
                              <td>NO HAY STOCK</td>
                              <input type="hidden" name="sum5" value="0" readonly="readonly" disabled>
                    <?php }
 
                        break;
                        }
                     }
                     if ($sw5==0) {
                        ?>
                              <td><?php echo $rca1;?></td> 
                              <td><?php echo $rca2;?></td> 
                              <td>NO HAY STOCK  EN ALMACÉN</td>
                              <input type="hidden" name="sum5" value="0" readonly="readonly" disabled>
                              <?php
                        
                      } ?> 
            </tr>
            <tr>
              <th scope="row" >6</th>
              <td>CONECTORES INTERNOS</td>
              <?php foreach ($v4 as $row) { 
                if ($row->Cod_item_interno=="CNTINTRG6HFC"){
                          $sw6=1;
                          $c1=$row->suma;
                          foreach ($v2 as $row1) { 
                              if ($row1->Cod_item_per==$row->SERIAL){
                                    $a1=$row->suma;
                                    $b1=$row1->suma2;
                                    $c1=$a1-$b1;
                                    break;
                              }
                          }
                          if($c1>=$coni1){?>
                              <td><input type="number" name="num7" value="<?php echo $coni1;?>" onchange="cal3()" ></td>
                              <td><?php echo $coni2;?></td>
                              <td><input type="number" name="sum6" value="<?php echo $coni1-$coni2;?>" readonly="readonly" disabled></td>
                              <input type="hidden" name="num8" value="<?php echo $coni2;?>" onchange="cal3()" disabled/>
                      <?php }
                          else{
                            ?>
                              <td><?php echo $coni1;?></td> 
                              <td><?php echo $coni2;?></td> 
                              <td>NO HAY STOCK</td>
                              <input type="hidden" name="sum6" value="0" readonly="readonly" disabled>
                    <?php }
                        break;
                        }
                     }
                     if ($sw6==0) {
                        ?>
                              <td><?php echo $coni1;?></td> 
                              <td><?php echo $coni2;?></td> 
                              <td>NO HAY STOCK  EN ALMACÉN</td>
                              <input type="hidden" name="sum6" value="0" readonly="readonly" disabled>
                              <?php
                      } ?>
            </tr>
            <tr>
              <th scope="row" >7</th>
              <td>CONECTORES EXTERNOS</td>
                <?php foreach ($v4 as $row) { 
                       if ($row->Cod_item_interno=="CNTEXTRG6HFC"){
                          $sw7=1;
                          $c1=$row->suma;
                          foreach ($v2 as $row1) { 
                              if ($row1->Cod_item_per==$row->SERIAL){
                                    $a1=$row->suma;
                                    $b1=$row1->suma2;
                                    $c1=$a1-$b1;
                                    break;
                              }
                          }
                          if($c1>=$cone1){?>
                              <td><input type="number" name="num9" value="<?php echo $cone1;?>" onchange="cal4()" ></td>
                              <td><?php echo $cone2;?></td>
                              <td><input type="number" name="sum7" value="<?php echo $cone1-$cone2;?>" readonly="readonly" disabled></td>
                              <input type="hidden" name="num10" value="<?php echo $cone2;?>" onchange="cal4()" disabled/>
                      <?php }
                          else{
                            ?>
                              <td><?php echo $cone1;?></td> 
                              <td><?php echo $cone2;?></td> 
                              <td>NO HAY STOCK</td>
                              <input type="hidden" name="sum7" value="0" readonly="readonly" disabled>
                    <?php }
                      break;
                        }
                     }
                     if ($sw7==0) {
                        ?>
                              <td><?php echo $cone1;?></td> 
                              <td><?php echo $cone2;?></td> 
                              <td>NO HAY STOCK  EN ALMACÉN</td>
                              <input type="hidden" name="sum7" value="0" readonly="readonly" disabled>
                              <?php
                      } ?>
            </tr>
            <tr>
              <th scope="row" >8</th>
              <td>SPLITER 1/2</td>
                <?php foreach ($v4 as $row) { 
                       if ($row->Cod_item_interno=="SPL12HFC"){
                          $sw8=1;
                          $c1=$row->suma;
                          foreach ($v2 as $row1) { 
                              if ($row->SERIAL==$row1->SERIAL){
                                    $a1=$row->suma;
                                    $b1=$row1->suma2;
                                    $c1=$a1-$b1;
                                    break;
                              }
                          }
                          if($c1>=$s121-$s122){?>
                              <td><input type="number" name="num11" value="<?php echo $s121;?>" onchange="cal5()" ></td>
                              <td><?php echo $s122;?></td>
                              <td><input type="number" name="sum8" value="<?php echo $s121-$s122;?>" readonly="readonly" disabled></td>
                              <input type="hidden" name="num12" value="<?php echo $s122;?>" onchange="cal5()" disabled/>
                      <?php }
                          else{
                            ?>
                              <td><?php echo $s121;?></td> 
                              <td><?php echo $s122;?></td> 
                              <td>NO HAY STOCK</td>
                              <input type="hidden" name="sum8" value="0" readonly="readonly" disabled>
                    <?php }
                           break;
                        }
                     }
                     if ($sw8==0) {
                        ?>
                              <td><?php echo $s121;?></td> 
                              <td><?php echo $s122;?></td> 
                              <td>NO HAY STOCK  EN ALMACÉN</td>
                              <input type="hidden" name="sum8" value="0" readonly="readonly" disabled>
                              <?php
                      } ?>
            </tr>
            <tr>
              <th scope="row" >9</th>
              <td>SPLITER 1/3</td>
              <?php foreach ($v4 as $row) { 
                       if ($row->Cod_item_interno=="SPL13HFC"){
                          $sw9=1;
                          $c1=$row->suma;
                          foreach ($v2 as $row1) {
                              if ($row->SERIAL==$row1->SERIAL AND $row1->Cod_item_per==$row->SERIAL){
                                    $a1=$row->suma;
                                    $b1=$row1->suma2;
                                    $c1=$a1-$b1;
                                    break;
                              }
                          }
                        if($c1>=$s131-$s132){?>
                            <td><input type="number" name="num13" value="<?php echo $s131;?>" onchange="cal6()" ></td>
                            <td><?php echo $s132;?></td>
                            <td><input type="number" name="sum9" value="<?php echo $s131-$s132;?>" readonly="readonly" disabled></td>
                            <input type="hidden" name="num14" value="<?php echo $s132;?>" onchange="cal6()" disabled/>
                    <?php }
                        else{
                          ?>
                            <td><?php echo $s131;?></td> 
                            <td><?php echo $s132;?></td> 
                            <td>NO HAY STOCK</td>
                            <input type="hidden" name="sum9" value="0" readonly="readonly" disabled>
                  <?php }
                        break;
                        }
                       
                     }
                     if ($sw9==0) {
                        ?>
                              <td><?php echo $s131;?></td> 
                              <td><?php echo $s132;?></td> 
                              <td>NO HAY STOCK  EN ALMACÉN</td>
                              <input type="hidden" name="sum9" value="0" readonly="readonly" disabled>
                              <?php
                      } ?>
            </tr>
            <tr>
              <th scope="row" >10</th>
              <td>CLAMP'S</td>
                 <?php foreach ($v4 as $row) { 
                       if ($row->Cod_item_interno=="SCLHFC"){
                          $sw10=1;
                          $c1=$row->suma;
                          foreach ($v2 as $row1) { 
                              if ($row->SERIAL==$row1->SERIAL AND $row1->Cod_item_per==$row->SERIAL){
                                    $a1=$row->suma;
                                    $b1=$row1->suma2;
                                    $c1=$a1-$b1;
                                    break;
                              }
                          }
                          if($c1>=$clamp1-$clamp2){?>
                              <td><input type="number" name="num15" value="<?php echo $clamp1;?>" onchange="cal7()" ></td>
                              <td><?php echo $clamp2;?></td>
                              <td><input type="number" name="sum10" value="<?php echo $clamp1-$clamp2;?>" readonly="readonly" disabled></td>
                              <input type="hidden" name="num16" value="<?php echo $clamp2;?>" onchange="cal7()" disabled/>
                      <?php }
                          else{
                            ?>
                              <td><?php echo $clamp1;?></td> 
                              <td><?php echo $clamp2;?></td> 
                              <td>NO HAY STOCK</td>
                              <input type="hidden" name="sum10" value="0" readonly="readonly" disabled>
                    <?php }
                        break;
                        }
                     }
                     if ($sw10==0) {
                        ?>
                              <td><?php echo $clamp1;?></td> 
                              <td><?php echo $clamp2;?></td> 
                              <td>NO HAY STOCK  EN ALMACÉN</td>
                              <input type="hidden" name="sum10" value="0" readonly="readonly" disabled>
                              <?php
                      } ?>
              
            </tr>
            <tr>
              <th scope="row" >11</th>
              <td>FILTROS</td>
              <?php foreach ($v4 as $row) { 
                       if ($row->Cod_item=="FLTARC572BR"){
                          $sw11=1;
                          $c1=$row->suma;
                          foreach ($v2 as $row1) { 
                              if ($row->SERIAL==$row1->SERIAL AND $row1->Cod_item_per==$row->SERIAL){
                                    $a1=$row->suma;
                                    $b1=$row1->suma2;
                                    $c1=$a1-$b1;
                              }
                          }
                          if($c1>=$filtro1){?>
                              <td><input type="number" name="num17" value="<?php echo $filtro1;?>" onchange="cal8()" ></td>
                              <td><?php echo $filtro2;?></td>
                              <td><input type="number" name="sum11" value="<?php echo $filtro1-$filtro2;?>" readonly="readonly" disabled></td>
                              <input type="hidden" name="num18" value="<?php echo $filtro2;?>" onchange="cal8()" disabled/>
                      <?php }
                          else{
                            ?>
                              <td><?php echo $filtro1;?></td> 
                              <td><?php echo $filtro2;?></td> 
                              <td>NO HAY STOCK</td>
                              <input type="hidden" name="sum11" value="0" readonly="readonly" disabled>
                    <?php }
                        break;
                        }
                     }
                     if ($sw11==0) {
                        ?>
                              <td><?php echo $filtro1;?></td> 
                              <td><?php echo $filtro2;?></td> 
                              <td>NO HAY STOCK  EN ALMACÉN</td>
                              <input type="hidden" name="sum11" value="0" readonly="readonly" disabled>
                              <?php
                        
                      } ?>
              
            </tr>

            
            <tr>
              <th scope="row" >17</th>
              <td>CABLE HDMI</td>
                    <?php foreach ($v4 as $row) { 
                      if ($row->Cod_item_interno=="CABAVHDMI"){
                          $sw17=1;
                          $c1=$row->suma; 
                          foreach ($v2 as $row1) {
                             if ($row1->Cod_item_per==$row1->SERIAL){
                                    $a1=$row->suma;
                                    $b1=$row1->suma2;
                                    $c1=$a1-$b1;
                                    break;
                              }
                          }
                        if($c1>=$hdmi1){?>
                            <td><input type="number" name="num29" value="<?php echo $hdmi1;?>" onchange="cal14()" ></td>
                            <td><?php echo $hdmi2;?></td>
                            <td><input type="number" name="sum17" value="<?php echo $hdmi1-$hdmi2;?>" readonly="readonly" disabled></td>
                            <input type="hidden" name="num30" value="<?php echo $hdmi2;?>" onchange="cal14()" disabled/>
                    <?php }
                        else{
                          ?>
                            <td><?php echo $hdmi1;?></td> 
                            <td><?php echo $hdmi2;?></td> 
                            <td>NO HAY STOCK</td>
                            <input type="hidden" name="sum17" id="sum17" value="0"  disabled>
                  <?php }
                  break;
                        }
                       
                     }
                     if ($sw17==0) {
                        ?>
                              <td><?php echo $hdmi1;?></td> 
                              <td><?php echo $hdmi2;?></td> 
                              <td>NO HAY STOCK EN ALMACÉN</td>
                              <input type="hidden" name="sum17" id="sum17" value="0"  disabled>
                              <?php
                        
                      } ?>    
            </tr>
            

          <tbody>
        </table>
        
      </div>
    </div>
  </div>
  <div id="resultado" class="col-xs-4">
    <label>DECODIFICADORES</label><BR>
    <?php if ($sw1==2) {?>
    <input type="text" name="deco1" placeholder="Código decodificador 1" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco2" placeholder="Código decodificador 2" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco3" placeholder="Código decodificador 3" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco4" placeholder="Código decodificador 4" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco5" placeholder="Código decodificador 5" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco6" placeholder="Código decodificador 6" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco7" placeholder="Código decodificador 7" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco8" placeholder="Código decodificador 8" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco9" placeholder="Código decodificador 9" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco10" placeholder="Código decodificador 10" pattern="[A-Za-zñÑ0-9 \-]{5,40}">

    <input type="text" name="deco11" placeholder="Código decodificador 11" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco12" placeholder="Código decodificador 12" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco13" placeholder="Código decodificador 13" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco14" placeholder="Código decodificador 14" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco15" placeholder="Código decodificador 15" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco16" placeholder="Código decodificador 16" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco17" placeholder="Código decodificador 17" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco18" placeholder="Código decodificador 18" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco19" placeholder="Código decodificador 19" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco20" placeholder="Código decodificador 20" pattern="[A-Za-zñÑ0-9 \-]{5,40}">

    <input type="text" name="deco21" placeholder="Código decodificador 21" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco22" placeholder="Código decodificador 22" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco23" placeholder="Código decodificador 23" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco24" placeholder="Código decodificador 24" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco25" placeholder="Código decodificador 25" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco26" placeholder="Código decodificador 26" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco27" placeholder="Código decodificador 27" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco28" placeholder="Código decodificador 28" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco29" placeholder="Código decodificador 29" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco30" placeholder="Código decodificador 30" pattern="[A-Za-zñÑ0-9 \-]{5,40}">

    <input type="text" name="deco31" placeholder="Código decodificador 31" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco32" placeholder="Código decodificador 32" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco33" placeholder="Código decodificador 33" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco34" placeholder="Código decodificador 34" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco35" placeholder="Código decodificador 35" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco36" placeholder="Código decodificador 36" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco37" placeholder="Código decodificador 37" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco38" placeholder="Código decodificador 38" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco39" placeholder="Código decodificador 39" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco40" placeholder="Código decodificador 40" pattern="[A-Za-zñÑ0-9 \-]{5,40}">

    <input type="text" name="deco41" placeholder="Código decodificador 41" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco42" placeholder="Código decodificador 42" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco43" placeholder="Código decodificador 43" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco44" placeholder="Código decodificador 44" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco45" placeholder="Código decodificador 45" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco46" placeholder="Código decodificador 46" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco47" placeholder="Código decodificador 47" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco48" placeholder="Código decodificador 48" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco49" placeholder="Código decodificador 49" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco50" placeholder="Código decodificador 50" pattern="[A-Za-zñÑ0-9 \-]{5,40}">

    <input type="text" name="deco51" placeholder="Código decodificador 51" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco52" placeholder="Código decodificador 52" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco53" placeholder="Código decodificador 53" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco54" placeholder="Código decodificador 54" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco55" placeholder="Código decodificador 55" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco56" placeholder="Código decodificador 56" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco57" placeholder="Código decodificador 57" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco58" placeholder="Código decodificador 58" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco59" placeholder="Código decodificador 59" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco60" placeholder="Código decodificador 60" pattern="[A-Za-zñÑ0-9 \-]{5,40}">

    <input type="text" name="deco61" placeholder="Código decodificador 61" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco62" placeholder="Código decodificador 62" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco63" placeholder="Código decodificador 63" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco64" placeholder="Código decodificador 64" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco65" placeholder="Código decodificador 65" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco66" placeholder="Código decodificador 66" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco67" placeholder="Código decodificador 67" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco68" placeholder="Código decodificador 68" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco69" placeholder="Código decodificador 69" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco70" placeholder="Código decodificador 70" pattern="[A-Za-zñÑ0-9 \-]{5,40}">

    <input type="text" name="deco71" placeholder="Código decodificador 71" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco72" placeholder="Código decodificador 72" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco73" placeholder="Código decodificador 73" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco74" placeholder="Código decodificador 74" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco75" placeholder="Código decodificador 75" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco76" placeholder="Código decodificador 76" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco77" placeholder="Código decodificador 77" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco78" placeholder="Código decodificador 78" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco79" placeholder="Código decodificador 79" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco80" placeholder="Código decodificador 80" pattern="[A-Za-zñÑ0-9 \-]{5,40}">

    <input type="text" name="deco81" placeholder="Código decodificador 81" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco82" placeholder="Código decodificador 82" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco83" placeholder="Código decodificador 83" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco84" placeholder="Código decodificador 84" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco85" placeholder="Código decodificador 85" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco86" placeholder="Código decodificador 86" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco87" placeholder="Código decodificador 87" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco88" placeholder="Código decodificador 88" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco89" placeholder="Código decodificador 89" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco90" placeholder="Código decodificador 90" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    
    <input type="text" name="deco91" placeholder="Código decodificador 91" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco92" placeholder="Código decodificador 92" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco93" placeholder="Código decodificador 93" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco94" placeholder="Código decodificador 94" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco95" placeholder="Código decodificador 95" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco96" placeholder="Código decodificador 96" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco97" placeholder="Código decodificador 97" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco98" placeholder="Código decodificador 98" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco99" placeholder="Código decodificador 99" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco100" placeholder="Código decodificador 100" pattern="[A-Za-zñÑ0-9 \-]{5,40}">

    <input type="text" name="deco101" placeholder="Código decodificador 101" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco102" placeholder="Código decodificador 102" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco103" placeholder="Código decodificador 103" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco104" placeholder="Código decodificador 104" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco105" placeholder="Código decodificador 105" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco106" placeholder="Código decodificador 106" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco107" placeholder="Código decodificador 107" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco108" placeholder="Código decodificador 108" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco109" placeholder="Código decodificador 109" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco110" placeholder="Código decodificador 110" pattern="[A-Za-zñÑ0-9 \-]{5,40}">

    <input type="text" name="deco111" placeholder="Código decodificador 111" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco112" placeholder="Código decodificador 112" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco113" placeholder="Código decodificador 113" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco114" placeholder="Código decodificador 114" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco115" placeholder="Código decodificador 115" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco116" placeholder="Código decodificador 116" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco117" placeholder="Código decodificador 117" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco118" placeholder="Código decodificador 118" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco119" placeholder="Código decodificador 119" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco120" placeholder="Código decodificador 120" pattern="[A-Za-zñÑ0-9 \-]{5,40}">

    <input type="text" name="deco121" placeholder="Código decodificador 121" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco122" placeholder="Código decodificador 122" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco123" placeholder="Código decodificador 123" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco124" placeholder="Código decodificador 124" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco125" placeholder="Código decodificador 125" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco126" placeholder="Código decodificador 126" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco127" placeholder="Código decodificador 127" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco128" placeholder="Código decodificador 128" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco129" placeholder="Código decodificador 129" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco130" placeholder="Código decodificador 130" pattern="[A-Za-zñÑ0-9 \-]{5,40}">

    <input type="text" name="deco131" placeholder="Código decodificador 131" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco132" placeholder="Código decodificador 132" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco133" placeholder="Código decodificador 133" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco134" placeholder="Código decodificador 134" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco135" placeholder="Código decodificador 135" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco136" placeholder="Código decodificador 136" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco137" placeholder="Código decodificador 137" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco138" placeholder="Código decodificador 138" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco139" placeholder="Código decodificador 139" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco140" placeholder="Código decodificador 140" pattern="[A-Za-zñÑ0-9 \-]{5,40}">

    <input type="text" name="deco141" placeholder="Código decodificador 141" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco142" placeholder="Código decodificador 142" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco143" placeholder="Código decodificador 143" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco144" placeholder="Código decodificador 144" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco145" placeholder="Código decodificador 145" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco146" placeholder="Código decodificador 146" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco147" placeholder="Código decodificador 147" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco148" placeholder="Código decodificador 148" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco149" placeholder="Código decodificador 149" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco150" placeholder="Código decodificador 150" pattern="[A-Za-zñÑ0-9 \-]{5,40}">

    <input type="text" name="deco151" placeholder="Código decodificador 151" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco152" placeholder="Código decodificador 152" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco153" placeholder="Código decodificador 153" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco154" placeholder="Código decodificador 154" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco155" placeholder="Código decodificador 155" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco156" placeholder="Código decodificador 156" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco157" placeholder="Código decodificador 157" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco158" placeholder="Código decodificador 158" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco159" placeholder="Código decodificador 159" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco160" placeholder="Código decodificador 160" pattern="[A-Za-zñÑ0-9 \-]{5,40}"> 

     <?php }  ?>
      
  </div>
 
  <div class="col-xs-4">
    <label>MODEMS </label><BR>
    <?php if ($sw2==2) {?>
    <input type="text" name="deco171" placeholder="Código MÓDEM 1" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco172" placeholder="Código MÓDEM 2" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco173" placeholder="Código MÓDEM 3" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco174" placeholder="Código MÓDEM 4" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco175" placeholder="Código MÓDEM 5" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco176" placeholder="Código MÓDEM 6" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco177" placeholder="Código MÓDEM 7" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco178" placeholder="Código MÓDEM 8" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco179" placeholder="Código MÓDEM 9" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco180" placeholder="Código MÓDEM 10" pattern="[A-Za-zñÑ0-9 \-]{5,40}">

    <input type="text" name="deco181" placeholder="Código MÓDEM 11" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco182" placeholder="Código MÓDEM 12" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco183" placeholder="Código MÓDEM 13" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco184" placeholder="Código MÓDEM 14" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco185" placeholder="Código MÓDEM 15" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco186" placeholder="Código MÓDEM 16" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco187" placeholder="Código MÓDEM 17" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco188" placeholder="Código MÓDEM 18" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco189" placeholder="Código MÓDEM 19" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco190" placeholder="Código MÓDEM 20" pattern="[A-Za-zñÑ0-9 \-]{5,40}">

    <input type="text" name="deco191" placeholder="Código MÓDEM 21" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco192" placeholder="Código MÓDEM 22" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco193" placeholder="Código MÓDEM 23" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco194" placeholder="Código MÓDEM 24" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco195" placeholder="Código MÓDEM 25" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco196" placeholder="Código MÓDEM 26" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco197" placeholder="Código MÓDEM 27" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco198" placeholder="Código MÓDEM 28" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco199" placeholder="Código MÓDEM 29" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco200" placeholder="Código MÓDEM 30" pattern="[A-Za-zñÑ0-9 \-]{5,40}">

    <input type="text" name="deco201" placeholder="Código MÓDEM 31" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco202" placeholder="Código MÓDEM 32" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco203" placeholder="Código MÓDEM 33" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco204" placeholder="Código MÓDEM 34" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco205" placeholder="Código MÓDEM 35" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco206" placeholder="Código MÓDEM 36" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco207" placeholder="Código MÓDEM 37" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco208" placeholder="Código MÓDEM 38" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco209" placeholder="Código MÓDEM 39" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco210" placeholder="Código MÓDEM 40" pattern="[A-Za-zñÑ0-9 \-]{5,40}">

    <input type="text" name="deco211" placeholder="Código MÓDEM 41" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco212" placeholder="Código MÓDEM 42" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco213" placeholder="Código MÓDEM 43" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco214" placeholder="Código MÓDEM 44" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco215" placeholder="Código MÓDEM 45" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco216" placeholder="Código MÓDEM 46" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco217" placeholder="Código MÓDEM 47" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco218" placeholder="Código MÓDEM 48" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco219" placeholder="Código MÓDEM 49" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco220" placeholder="Código MÓDEM 50" pattern="[A-Za-zñÑ0-9 \-]{5,40}">

    <input type="text" name="deco221" placeholder="Código MÓDEM 51" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco222" placeholder="Código MÓDEM 52" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco223" placeholder="Código MÓDEM 53" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco224" placeholder="Código MÓDEM 54" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco225" placeholder="Código MÓDEM 55" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco226" placeholder="Código MÓDEM 56" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco227" placeholder="Código MÓDEM 57" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco228" placeholder="Código MÓDEM 58" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco229" placeholder="Código MÓDEM 59" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco230" placeholder="Código MÓDEM 60" pattern="[A-Za-zñÑ0-9 \-]{5,40}">

    <input type="text" name="deco231" placeholder="Código MÓDEM 61" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco232" placeholder="Código MÓDEM 62" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco233" placeholder="Código MÓDEM 63" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco234" placeholder="Código MÓDEM 64" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco235" placeholder="Código MÓDEM 65" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco236" placeholder="Código MÓDEM 66" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco237" placeholder="Código MÓDEM 67" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco238" placeholder="Código MÓDEM 68" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco239" placeholder="Código MÓDEM 69" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco240" placeholder="Código MÓDEM 70" pattern="[A-Za-zñÑ0-9 \-]{5,40}">

    <input type="text" name="deco241" placeholder="Código MÓDEM 71" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco242" placeholder="Código MÓDEM 72" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco243" placeholder="Código MÓDEM 73" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco244" placeholder="Código MÓDEM 74" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco245" placeholder="Código MÓDEM 75" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco246" placeholder="Código MÓDEM 76" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco247" placeholder="Código MÓDEM 77" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco248" placeholder="Código MÓDEM 78" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco249" placeholder="Código MÓDEM 79" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco250" placeholder="Código MÓDEM 80" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <?php }  ?>
  </div>
  <div class="col-xs-4">
    <label>CARRETAS Y OTROS </label><BR>
    <?php if ($sw3==2 or $sw4==2) {?>
    
    <input type="text" name="deco251" placeholder="Código CARRETA" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco252" placeholder="Código CARRETA" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco253" placeholder="Código CARRETA" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco254" placeholder="Código CARRETA" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco255" placeholder="Código CARRETA" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco256" placeholder="Código CARRETA" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco257" placeholder="Código CARRETA" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco258" placeholder="Código CARRETA" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco259" placeholder="Código CARRETA" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco260" placeholder="Código CARRETA" pattern="[A-Za-zñÑ0-9 \-]{5,40}">

    
    <input type="text" name="deco261" placeholder="Código CARRETA" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco262" placeholder="Código CARRETA" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco263" placeholder="Código CARRETA" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco264" placeholder="Código CARRETA" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco265" placeholder="Código CARRETA" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco266" placeholder="Código CARRETA" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco267" placeholder="Código CARRETA" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco268" placeholder="Código CARRETA" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco269" placeholder="Código CARRETA" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco270" placeholder="Código CARRETA" pattern="[A-Za-zñÑ0-9 \-]{5,40}">

    <input type="text" name="deco271" placeholder="Código OTRO" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco272" placeholder="Código OTRO" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco273" placeholder="Código OTRO" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco274" placeholder="Código OTRO" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco275" placeholder="Código OTRO" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <?php }  ?>

  </div>
  <input type="hidden" name="num50" value="<?php echo $num2;?>">
  <input type="hidden" name="num51" value="<?php echo $modem2;?>">
  <input type="hidden" name="num52" value="<?php echo $rca2;?>">
  <input type="hidden" name="num53" value="<?php echo $coni2;?>">
  <input type="hidden" name="num54" value="<?php echo $cone2;?>">
  <input type="hidden" name="num55" value="<?php echo $s122;?>">
  <input type="hidden" name="num56" value="<?php echo $s132;?>">
  <input type="hidden" name="num57" value="<?php echo $clamp2;?>">
  <input type="hidden" name="num58" value="<?php echo $filtro2;?>">
  <input type="hidden" name="num62" value="<?php echo $hdmi2;?>">

  <div class="col-xs-12">
    <br>
      <textarea name="comentarios" placeholder="Escribe aquí las observaciones"></textarea>
      <br>
  </div>

     <div class="col-xs-12">

        <div class="col-xs-6"></div>
              <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        <div class="col-xs-3">
               <input type="submit" class="btn btn-success" value="Guardar datos" />
        </div>   
     </div>
 
          
<!--span>Valor #1</span>
<input type="text" id="txt_campo_1" class="monto" value=10 onkeyup="sumar();" />
<br/>
<span>Valor #2</span>
<input type="text" id="txt_campo_2" class="monto" onkeyup="sumar();" />
<br/>
<span>Valor #3</span>
<input type="text" id="txt_campo_3" class="monto" onkeyup="sumar();" />
<br/>
<span>El resultado es: </span> <span id="spTotal"></span-->
  </form>
  <?php }?>
</body>




<script >

function cal() {
  try {
    var a = parseInt(document.form_registro_material.num1.value),
        b = parseInt(document.form_registro_material.num2.value);       
    document.form_registro_material.sum1.value = (a - b);

  } catch (e) {
  }
   //return (elementos);
}

function cal1() {
  try{
    var c = parseInt(document.form_registro_material.num3.value),
        d = parseInt(document.form_registro_material.num4.value);
    document.form_registro_material.sum2.value = (c - d); 
  }
  catch (e) {
  }
}

function cal2() {
  try{
    var e = parseInt(document.form_registro_material.num5.value),
        f = parseInt(document.form_registro_material.num6.value);
    document.form_registro_material.sum5.value = (e - f);
        
  }
  catch (e) {
  }

}
function cal3() {
  try{
    var g = parseInt(document.form_registro_material.num7.value),
        h = parseInt(document.form_registro_material.num8.value);
    document.form_registro_material.sum6.value = (g - h);
    
  }
  catch (e) {
  }

}
function cal4() {
  try{
    var i = parseInt(document.form_registro_material.num9.value);
        j = parseInt(document.form_registro_material.num10.value);
    document.form_registro_material.sum7.value = (i - j);
      
  }
  catch (e) {
  }

}
function cal5() {
  try{
    var k = parseInt(document.form_registro_material.num11.value);
        l = parseInt(document.form_registro_material.num12.value);
    document.form_registro_material.sum8.value = (k - l);
      
  }
  catch (e) {
  }

}
function cal6() {
  try{
    var m = parseInt(document.form_registro_material.num13.value);
        n = parseInt(document.form_registro_material.num14.value);
    document.form_registro_material.sum9.value = (m - n);
       
  }
  catch (e) {
  }

}
function cal7() {
  try{
    var o = parseInt(document.form_registro_material.num15.value);
        p = parseInt(document.form_registro_material.num16.value);
    document.form_registro_material.sum10.value = (o - p);
 }     
  catch (e) {
  }

}
function cal8() {
  try{
    var q = parseInt(document.form_registro_material.num17.value);
        r = parseInt(document.form_registro_material.num18.value);
    document.form_registro_material.sum11.value = (q - r);
    
  }
  catch (e) {
  }

}
function cal9() {
  try{
    var s = parseInt(document.form_registro_material.num19.value);
        t = parseInt(document.form_registro_material.num20.value);
    document.form_registro_material.sum12.value = (s - t); 
  }
  catch (e) {
  }

}
function cal10() {
  try{
    var u = parseInt(document.form_registro_material.num21.value);
        v = parseInt(document.form_registro_material.num22.value);
    document.form_registro_material.sum13.value = (u - v); 
  }
  catch (e) {
  }

}
function cal11() {
  try{
    var w = parseInt(document.form_registro_material.num23.value);
        x = parseInt(document.form_registro_material.num24.value);
    document.form_registro_material.sum14.value = (w - x); 
  }
  catch (e) {
  }

}
function cal12() {
  try{
    var y = parseInt(document.form_registro_material.num25.value);
        z = parseInt(document.form_registro_material.num26.value);
    document.form_registro_material.sum15.value = (y - z); 
  }
  catch (e) {
  }

}
function cal13() {
  try{
    var a1 = parseInt(document.form_registro_material.num27.value);
        b1 = parseInt(document.form_registro_material.num28.value);
    document.form_registro_material.sum16.value = (a1 - b1); 
  }
  catch (e) {
  }

}
function cal14() {
  try{
    var a2 = parseInt(document.form_registro_material.num29.value);
        b2 = parseInt(document.form_registro_material.num30.value);
    document.form_registro_material.sum17.value = (a2 - b2); 
  }
  catch (e) {
  }

}
function cal15() {
  try{
    var a3 = parseInt(document.form_registro_material.num31.value);
        b3 = parseInt(document.form_registro_material.num32.value);
    document.form_registro_material.sum18.value = (a3 - b3); 
  }
  catch (e) {
  }

}
function cal16() {
  try{
    var a4 = parseInt(document.form_registro_material.num33.value);
        b4 = parseInt(document.form_registro_material.num34.value);
    document.form_registro_material.sum19.value = (a4 - b4); 
  }
  catch (e) {
  }

}
function cal17() {
  try{
    var a5 = parseInt(document.form_registro_material.num40.value);
        b5 = parseInt(document.form_registro_material.num41.value);
    document.form_registro_material.sum20.value = (a5 - b5); 
  }
  catch (e) {
  }

}
function cal18() {
  try{
    var a6 = parseInt(document.form_registro_material.num42.value);
        b6 = parseInt(document.form_registro_material.num43.value);
    document.form_registro_material.sum21.value = (a6 - b6); 
  }
  catch (e) {
  }

}

// material_t.js
</script>