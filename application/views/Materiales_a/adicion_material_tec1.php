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
 {?>
    <form class="form-horizontal col-lg-12 col-md-12 col-xs-12" method="post" enctype="multipart/form-data" id="form_registro_material" name="form_registro_material"  action="RegistrarDatosAdicion">
    <div class="col-xs-12"> 
      <div class="form-group">
        <div class="col-xs-8">   
          <label>TÉCNICO A ADICIONAR MATERIAL</label>
          <input class="form-control" type="hidden" id="tecnico" name="tecnico" value="<?php echo $id."-".$nombre;?>">
          <input class="form-control" type="text" id="tecnico1" name="tecnico1" value="<?php echo $id."-".$nombre;?>" DISABLED>
          <br>
      </div>

      <?php 
      echo "Número de Entrega: <strong>".$numero."</strong><br>";
      echo "Fecha: ".$hoy;
     
      //decodificadores
      $num1=10;      $num2=$num_deco[3];
      $modem1=5;      $modem2=$num_modem[3];
      //cable c/portante
      $rg6c=305;      $rg6c1=$rg6c/305;      $rg6c2=$n13[3];      $rg6c3=$rg6c2/305;
      //cable s/portante
      $rg6s=305;      $rg6s1=$rg6s/305;      $rg6s2=$n14[3];      $rg6s3=$rg6s2/305;
      
      $rca1=10;      $rca2=$n2[3];
      //conectores internos
      $coni1=25;      $coni2=$n3[3];
      //conectores externos
      $cone1=25;      $cone2=$n4[3];
      //spliter 1/2
      $s121=7;      $s122=$n5[3];
      //spliter 1/3
      $s131=7;      $s132=$n6[3];
      //clamp
      $clamp1=7;      $clamp2=$n7[3];

      $filtro1=0;      $filtro2=$n8[3];

      $precinto1=20;      $precinto2=$n9[3];

      //grap 5/8 100 u
      $grap1=100;      $grap2=$n10[3];
      //grap concreto 50u
      $gcpn1=50;      $gcpn2=$n11[3];
      //cinta aislante
      $cinta1=0;      $cinta2=0;
      //cinta auto 
      $cintas1=0;      $cintas2=0;

      $hdmi1=10;      $hdmi2=$n1[3];

      $piton1=0;      $piton2=$n12[3];



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
                              <input type="hidden" name="num50" value="<?php echo $num2;?>">
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
                              <input type="hidden" name="num51" value="<?php echo $modem2;?>">

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
              <td>Cable RG6 c/PORTANTE</td>
              <?php foreach ($v4 as $row) { 
                       if ($row->Cod_item_interno=="CCRG6CPHFC"){
                          $sw3=1;
                          $stock=$row->suma;
                          if($stock>=$rg6c){?>
                            <td>1 Carreta (<?php echo $rg6c;?> metros c/u)</td>
                            <td><?php echo $rg6c2?> metros </td>
                      <?php if($rg6c2<40){ ?>
                               <td><input type="number" name="sum3" value="1" readonly="readonly" disabled> Carreta</td>
                              <?php
                              $sw001=1;
                              $sw3=2;

                             }
                            else{?>
                                <td><input type="hidden" name="sum3" value="0" readonly="readonly" >MATERIAL EXISTENTE</td>
                            <?php }?> 
                    <?php }
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
                              <td>1 Carreta (<?php echo $rg6s;?> metros) c/u</td>
                              <td><?php echo $rg6s2;?> metros</td>
                       
                       <?php if($rg6s2<40){ ?>
                                    <td><input type="number" name="sum4" value="1" readonly="readonly" disabled> carreta</td>
                                    <?php 
                                    $sw002=1; 
                                    $sw4=2;
                              }
                              else{?>
                                  <td><input type="hidden" name="sum4" value="0" readonly="readonly" disabled>MATERIAL EXISTENTE</td>
                       <?php }?> 
                <?php }
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
                              <input type="hidden" name="num52" value="<?php echo $rca2;?>">
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
                              <input type="hidden" name="num53" value="<?php echo $coni2;?>">
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
                              <input type="hidden" name="num54" value="<?php echo $cone2;?>">
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
                          if($c1>=$s121){?>
                              <td><input type="number" name="num11" value="<?php echo $s121;?>" onchange="cal5()" ></td>
                              <td><?php echo $s122;?></td>
                              <td><input type="number" name="sum8" value="<?php echo $s121-$s122;?>" readonly="readonly" disabled></td>
                              <input type="hidden" name="num12" value="<?php echo $s122;?>" onchange="cal5()" disabled/>
                              <input type="hidden" name="num55" value="<?php echo $s122;?>">
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
                        if($c1>=$s131){?>
                            <td><input type="number" name="num13" value="<?php echo $s131;?>" onchange="cal6()" ></td>
                            <td><?php echo $s132;?></td>
                            <td><input type="number" name="sum9" value="<?php echo $s131-$s132;?>" readonly="readonly" disabled></td>
                            <input type="hidden" name="num14" value="<?php echo $s132;?>" onchange="cal6()" disabled/>
                            <input type="hidden" name="num56" value="<?php echo $s132;?>">
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
                          if($c1>=$clamp1){?>
                              <td><input type="number" name="num15" value="<?php echo $clamp1;?>" onchange="cal7()" ></td>
                              <td><?php echo $clamp2;?></td>
                              <td><input type="number" name="sum10" value="<?php echo $clamp1-$clamp2;?>" readonly="readonly" disabled></td>
                              <input type="hidden" name="num16" value="<?php echo $clamp2;?>" onchange="cal7()" disabled/>
                              <input type="hidden" name="num57" value="<?php echo $clamp2;?>">
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
                              <input type="hidden" name="num58" value="<?php echo $filtro2;?>">
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
              <th scope="row" >12</th>
              <td>PRECINTOS</td>
              <?php foreach ($v3 as $row) { 
                       if ($row->Cod_item_interno=="PCTHFC"){
                          $sw12=1;
                          $c1=$row->suma;
                          foreach ($v2 as $row1) { 
                              if ($row->SERIAL==$row1->SERIAL AND $row1->Cod_item_per==$row->SERIAL){
                                    $a1=$row->suma;
                                    $b1=$row1->suma2;
                                    $c1=$a1-$b1; 
                                    break;                                
                               }
                            }
                          if($c1>=$precinto1){?>
                              <td><input type="number" name="num19" value="<?php echo $precinto1;?>" onchange="cal9()" ></td>
                              <td><?php echo $precinto2;?></td>
                              <td><input type="number" name="sum12" value="<?php echo $precinto1-$precinto2;?>" readonly="readonly" disabled></td>
                              <input type="hidden" name="num20" value="<?php echo $precinto2;?>" onchange="cal9()" disabled/>
                              <input type="hidden" name="num59" value="<?php echo $precinto2;?>">

                      <?php }
                          else{
                            ?>
                              <td><?php echo $precinto1;?></td> 
                              <td><?php echo $precinto2;?></td> 
                              <td>NO HAY STOCK</td>
                              <input type="hidden" name="sum12" value="0" readonly="readonly" disabled>
                    <?php }
                          break;
                        }
                     }
                     if ($sw12==0) {
                        ?>
                              <td><?php echo $precinto1;?></td> 
                              <td><?php echo $precinto2;?></td> 
                              <td>NO HAY STOCK  EN ALMACÉN</td>
                              <input type="hidden" name="sum12" value="0" readonly="readonly" disabled>
                              <?php
                      } ?>
            </tr>
            <tr>
              <th scope="row" >13</th>
              <td>GRAP 5/8 Caja de 100 u.</td>
              <?php foreach ($v3 as $row) { 
                  if ($row->Cod_item_interno=="GRP58HFC"){
                          $sw13=1;
                          $c1=$row->suma; 
                          foreach ($v2 as $row1) {
                              if ($row1->Cod_item_per==$row->SERIAL){
                                    $a1=$row->suma;
                                    $b1=$row1->suma2;
                                    $c1=$a1-$b1;
                                    break;
                                }
                          }
                          if($c1>=$grap1){?>
                              <td><input type="number" name="num21" value="<?php echo $grap1;?>" onchange="cal10()" ></td>
                              <td><?php echo $grap2;?></td>
                              <td><input type="number" name="sum13" value="<?php echo $grap1-$grap2;?>" readonly="readonly" disabled></td>
                              <input type="hidden" name="num22" value="<?php echo $grap2;?>" onchange="cal10()" disabled/>
                              <input type="hidden" name="num60" value="<?php echo $grap2;?>">
                      <?php }
                          else{
                            ?>
                              <td><?php echo $grap1;?></td> 
                              <td><?php echo $grap2;?></td> 
                              <td>NO HAY STOCK</td>
                              <input type="hidden" name="sum13" value="0" readonly="readonly" disabled>
                    <?php }
                        break;

                    }
                 }
                 if ($sw13==0) {
                    ?>
                          <td><?php echo $grap1;?></td> 
                          <td><?php echo $grap2;?></td> 
                          <td>NO HAY STOCK  EN ALMACÉN</td>
                          <input type="hidden" name="sum13" value="0" readonly="readonly" disabled>
                          <?php
                    
                  } ?>
            </tr>
            <tr>
              <th scope="row" >14</th>
              <td>GRAP CONCRETO Bolsa 50 u.</td>
              <?php foreach ($v3 as $row) { 
                       if ($row->Cod_item_interno=="GRPCCTHFC"){
                          $sw14=1;
                          $c1=$row->suma; 
                          foreach ($v2 as $row1) {
                              if ($row1->Cod_item_per==$row->SERIAL){
                                    $a1=$row->suma;
                                    $b1=$row1->suma2;
                                    $c1=$a1-$b1;
                                    break;
                              }
                          }
                          if($c1>=$gcpn1){?>
                              <td><input type="number" name="num23" value="<?php echo $gcpn1;?>" onchange="cal11()" ></td>
                              <td><?php echo $gcpn2;?></td>
                              <td><input type="number" name="sum14" value="<?php echo $gcpn1-$gcpn2;?>" readonly="readonly" disabled></td>
                              <input type="hidden" name="num24" value="<?php echo $gcpn2;?>" onchange="cal11()" disabled/>
                              <input type="hidden" name="num61" value="<?php echo $gcpn2;?>">
                      <?php }
                          else{
                            ?>
                              <td><?php echo $gcpn1;?></td> 
                              <td><?php echo $gcpn2;?></td> 
                              <td>NO HAY STOCK</td>
                              <input type="hidden" name="sum14" value="0" readonly="readonly" disabled>
                    <?php }
                          break;
                        }
                     }
                     if ($sw14==0) {
                        ?>
                              <td><?php echo $gcpn1;?></td> 
                              <td><?php echo $gcpn2;?></td> 
                              <td>NO HAY STOCK  EN ALMACÉN</td>
                              <input type="hidden" name="sum14" value="0" readonly="readonly" disabled>
                              <?php
                        
                      } ?>
            </tr>
            <tr>
              <th scope="row" >15</th>
              <td>CINTA AISLANTE</td>
              <?php foreach ($v3 as $row) { 
                       if ($row->Cod_item=="CTASHFC"){
                          $sw15=1;
                          $c1=$row->suma; 
                          foreach ($v2 as $row1) { 
                              if ($row1->Cod_item_per==$row->SERIAL){
                                    $a1=$row->suma;
                                    $b1=$row1->suma2;
                                    $c1=$a1-$b1;
                                    break;
                              }
                          }
                          if($c1>=$cinta1){?>
                              <td><input type="number" name="num25" value="<?php echo $cinta1;?>" onchange="cal12()" ></td>
                              <td><?php echo $cinta2;?></td>
                              <td><input type="number" name="sum15" value="<?php echo $cinta1-$cinta2;?>" readonly="readonly" disabled></td>
                              <input type="hidden" name="num26" value="<?php echo $cinta2;?>" onchange="cal12()" disabled/>
                      <?php }
                          else{
                            ?>
                              <td><?php echo $cinta1;?></td> 
                              <td><?php echo $cinta2;?></td> 
                              <td>NO HAY STOCK</td>
                              <input type="hidden" name="sum15" value="0" readonly="readonly" disabled>
                    <?php }
                        break;
                        }
                     }
                     if ($sw15==0) {
                        ?>
                              <td><?php echo $cinta1;?></td> 
                              <td><?php echo $cinta2;?></td> 
                              <td>NO HAY STOCK  EN ALMACÉN</td>
                              <input type="hidden" name="sum15" value="0" readonly="readonly" disabled>
                              <?php
                      } ?>
            </tr>

            <tr>
              <th scope="row" >16</th>
              <td>CINT. ELECT. AUTO SOLD. 1 m.</td>
              <?php foreach ($v3 as $row) { 
                  if ($row->Cod_item=="BLTHFC"){
                          $sw16=1;
                          $c1=$row->suma; 
                          foreach ($v2 as $row1) { 
                              if ($row1->Cod_item_per==$row1->SERIAL){
                                    $a1=$row->suma;
                                    $b1=$row1->suma2;
                                    $c1=$a1-$b1;
                                    break;
                                }
                            }
                          if($c1>=$cintas1){?>
                              <td><input type="number" name="num27" value="<?php echo $cintas1;?>" onchange="cal13()" ></td>
                              <td><?php echo $cintas2;?></td>
                              <td><input type="number" name="sum16" value="<?php echo $cintas1-$cintas2;?>" readonly="readonly" disabled></td>
                              <input type="hidden" name="num28" value="<?php echo $cintas2;?>" onchange="cal13()" disabled/>
                      <?php }
                          else{
                            ?>
                              <td><?php echo $cintas1;?></td> 
                              <td><?php echo $cintas2;?></td> 
                              <td>NO HAY STOCK</td>
                              <input type="hidden" name="sum16" value="0" readonly="readonly" disabled>
                    <?php }
                    break;
                        }
                     }
                     if ($sw16==0) {
                        ?>
                              <td><?php echo $cintas1;?></td> 
                              <td><?php echo $cintas2;?></td> 
                              <td>NO HAY STOCK  EN ALMACÉN</td>
                              <input type="hidden" name="sum16" value="0" readonly="readonly" disabled>
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
                            <input type="hidden" name="num62" value="<?php echo $hdmi2;?>">

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
            <tr>
              <th scope="row" >18</th>
              <td>PITÓN L CON RAMPLUG</td>
                    <?php foreach ($v3 as $row) { 
                       if ($row->Cod_item=="PTLRMPHFC
"){
                          $sw18=1;
                          $c1=$row->suma; 
                          foreach ($v2 as $row1) {
                              if ($row1->Cod_item_per==$row1->SERIAL){
                                    $a1=$row->suma;
                                    $b1=$row1->suma2;
                                    $c1=$a1-$b1;
                                    break;
                                }
                            }
                          if($c1>=$piton1){?>
                              <td><input type="number" name="num31" value="<?php echo $piton1;?>" onchange="cal15()" ></td>
                              <td><?php echo $piton2;?></td>
                              <td><input type="number" name="sum18" value="<?php echo $piton1-$piton2;?>" readonly="readonly" disabled></td>
                              <input type="hidden" name="num32" value="<?php echo $piton2;?>" onchange="cal15()" disabled/>
                              <input type="hidden" name="num63" value="<?php echo $piton2;?>">
                      <?php }
                          else{
                            ?>
                              <td><?php echo $piton1;?></td> 
                              <td><?php echo $piton2;?></td> 
                              <td>NO HAY STOCK</td>
                              <input type="hidden" name="sum18" id="sum18" value="0"  disabled>
                    <?php }
                    break;
                        }
                       
                     }
                     if ($sw18==0) {
                        ?>
                              <td><?php echo $piton1;?></td> 
                              <td><?php echo $piton2;?></td> 
                              <td>NO HAY STOCK EN ALMACÉN</td>
                              <input type="hidden" name="sum18" id="sum18" value="0"  disabled>
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
     <?php }  ?>
      
  </div>
 
  <div class="col-xs-4">
    <label>MODEMS </label><BR>
    <?php if ($sw2==2) {?>
    <input type="text" name="deco11" placeholder="Código MÓDEM 1" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco12" placeholder="Código MÓDEM 2" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco13" placeholder="Código MÓDEM 3" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco14" placeholder="Código MÓDEM 4" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco15" placeholder="Código MÓDEM 5" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco16" placeholder="Código MÓDEM 6" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco17" placeholder="Código MÓDEM 7" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco18" placeholder="Código MÓDEM 8" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco19" placeholder="Código MÓDEM 9" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco20" placeholder="Código MÓDEM 10" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <?php }  ?>
  </div>
  <div class="col-xs-4">
    <label>CARRETAS Y OTROS </label><BR>
    <?php if ($sw3==2 or $sw4==2) {?>
    <input type="text" name="deco21" placeholder="Código CARRETA" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco22" placeholder="Código OTRO" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco23" placeholder="Código OTRO" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco24" placeholder="Código OTRO" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
    <input type="text" name="deco25" placeholder="Código OTRO" pattern="[A-Za-zñÑ0-9 \-]{5,40}">
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
  <input type="hidden" name="num59" value="<?php echo $precinto2;?>">
  <input type="hidden" name="num60" value="<?php echo $grap2;?>">
  <input type="hidden" name="num61" value="<?php echo $gcpn2;?>">
  <input type="hidden" name="num62" value="<?php echo $hdmi2;?>">
  <input type="hidden" name="num63" value="<?php echo $piton2;?>">
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

// material_t.js
</script>