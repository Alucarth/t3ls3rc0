<div class="x_panel">
  <div class="embed-container">
    

           <iframe frameborder="0" width="500" height="400"></iframe>
           <div class="container-fluid">
              <div class="table-responsive" id="tblreporte" >
              </div>
           </div>
     </div>
</div>

  <!--script
  src="<?=base_url()?>assets/js/jquery-3.2.1.js"
  integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
  crossorigin="anonymous"></script-->
<script  src="<?=base_url()?>assets/js/jquery.min.js"></script>
<script src="<?=base_url()?>assets/lib/jsPDF/dist/jspdf.debug.js"></script>

<script src="<?=base_url()?>assets/lib/jsPDF/dist/jspdf.plugin.autotable.js"></script>
<script src="<?=base_url()?>assets/lib/jsPDF/dist/jspdf.plugin.autotable.min.js"></script>


<!--script src="<?=base_url()?>assets/lib/jspdf/dist/jspdf.min.js"></script-->
<!--script src="<?=base_url()?>assets/lib/jspdf/dist/jspdf.plugin.autotable.js"></script-->
<script type="text/javascript">

  $(document).ready(function() {


    /*var num_deco=<?php echo json_encode($num_deco); ?>;
    var num_modem=<?php echo json_encode($num_modem); ?>;*/
    var nombre=validar(<?php echo json_encode($Nombre_personal); ?>);
    var app=validar(<?php echo json_encode($Ap_paterno_personal); ?>);
    var apm=validar(<?php echo json_encode($Ap_materno_personal); ?>);
    var ci=validar(<?php echo json_encode($Ci); ?>);
    var exp=validar(<?php echo json_encode($Expedicion_ci_personal); ?>);
    var tel=validar(<?php echo json_encode($Telefono_2_personal); ?>);
    var imagen=validar(<?php echo json_encode($Foto_personal);?>);
    var cod=validar(<?php echo json_encode($Cod_asignacion);?>);
    var dir=validar(<?php echo json_encode($Direccion_dom_personal);?>);
    var fec=validar(<?php echo json_encode($Fecha_nacimiento_personal);?>);
    var est=validar(<?php echo json_encode($Estado_civil_personal);?>);
    var tel2=validar(<?php echo json_encode($Telefono_1_personal);?>);
    var hij=validar(<?php echo json_encode($Numero_hijos_personal);?>);
    var ref1=validar(<?php echo json_encode($Referencia_1_personal);?>);
    var telr1=validar(<?php echo json_encode($Telefono_3_personal);?>);
    var ref2=validar(<?php echo json_encode($Referencia_2_personal);?>);
    var telr2=validar(<?php echo json_encode($Telefono_4_personal);?>);
    var fei=validar(<?php echo json_encode($Fecha_incorporacion);?>);
    var carg=validar(<?php echo json_encode($Nombre_cargo);?>);
    var desc=validar(<?php echo json_encode($Descripcion_cargo);?>);
    var obs1=validar(<?php echo json_encode($Observacion_1_personal);?>);
    var obs2=validar(<?php echo json_encode($Observacion_2_personal);?>);
    var region=validar(<?php echo json_encode($Regional);?>);
    var razon=validar(<?php echo json_encode($Razon_social_proveedor);?>);
    var nom_p=validar(<?php echo json_encode($Nombre_rep_proveedor);?>);
    var dir_p=validar(<?php echo json_encode($Direccion_proveedor);?>);
    var nit=validar(<?php echo json_encode($NIT);?>);
    var telf_p1=validar(<?php echo json_encode($Telefono_1_proveedor);?>);
    var telf_p2=validar(<?php echo json_encode($Telefono_2_proveedor);?>);

    var felcc=check(<?php echo json_encode($Felcc);?>);
    var curri=check(<?php echo json_encode($Curriculum_personal);?>);
    var croquis=check(<?php echo json_encode($Croquis_personal);?>);
    var luz=check(<?php echo json_encode($Fac_luz_personal);?>);
    var agua=check(<?php echo json_encode($Fac_agua_personal);?>);
    var cond=check(<?php echo json_encode($Licencia_conducir);?>);
    /*

    ✓
    ✗
      ✔
      ✘*/
    function validar (a) {
      if (a==null)  a="";
      return a;
    }
    function check (b) {
      if (b==1)  b="SI";
      else b="NO";
      return b;
    }
    var pdf = new jsPDF('p','pt','letter');


    style= "border-width: medium; border-style: ridge;  pageBreak: 'auto';";


    pdf.setFontSize(15);
    pdf.setFont('Arial');
    pdf.text(50,13,"PERSONAL  TELSERCO S.R.L. 2018                               Código: "+cod);
    pdf.text(50,40,"DATOS PERSONAL");
    pdf.rect(50,18,280,0)
    pdf.setFontSize(14);
    pdf.setFont('helvetica');
    pdf.text(50,60,"Nombre Personal:"+nombre);
    pdf.text(50,80,"Apellido Paterno: "+app);
    pdf.text(50,100,"Apellido Materno:" +apm);
    pdf.text(50,120,"Carnet Identidad:" +ci+" "+exp);
    pdf.text(50,140,"Celular:" +tel);
    pdf.setFontSize(15);
    pdf.setFont('Arial');
    pdf.text(50,170,"DATOS REFERENCIALES");
    pdf.setFontSize(14);
    pdf.setFont('helvetica');
    pdf.text(50,190,"Dirección:"+dir);
    pdf.text(50,210,"Fecha Nacimiento:"+fec);
    pdf.text(50,230,"Estado Civil:"+est);
    pdf.text(300,210,"Teléfono Fijo:"+tel2);
    pdf.text(300,230,"Número de Hijos:"+hij);
    pdf.setFontSize(15);
    pdf.setFont('Arial');
    pdf.text(50,260,"En caso de emergencia contactarse con:");
    pdf.setFontSize(14);
    pdf.setFont('helvetica');
    pdf.text(50,280,ref1+": "+telr1);
    pdf.text(50,300,ref2+": "+telr2);
    pdf.setFontSize(15);
    pdf.setFont('Arial');
    pdf.text(50,330,"DATOS LABORALES");
    pdf.text(50,350,"Fecha Incorporación: "+fei);
    pdf.text(50,370,"Funciones: "+carg);
    pdf.text(50,390,"Observaciones: "+obs1);
    pdf.text(50,410,obs2);
    pdf.text(300,350,"Regional Asignada:"+region);
    pdf.setFontSize(15);
    pdf.setFont('Arial');
    pdf.text(50,420,"DATOS EMPRESA");
    pdf.text(50,440,"Empresa:"+razon);
    pdf.text(50,460,"Representante:"+nom_p);
    pdf.text(50,480,"Dirección:"+dir_p);
    pdf.text(50,500,"NIT:"+nit);
    pdf.text(50,520,"TELÉFONO(S):"+telf_p1+"  "+telf_p2);
    pdf.text(50,560,"DOCUMENTOS PRESENTADOS");
    pdf.text(50,580,"FELCC:"+felcc);
    pdf.text(300,580,"CROQUIS:"+croquis);
    pdf.text(50,620,"CURRICULUM:"+curri);
    pdf.text(300,620,"LUZ:"+luz);
    pdf.text(50,600,"AGUA:"+agua);
    pdf.text(300,600,"LICENCIA (*):"+cond);
    pdf.text(50,660,"SELLO EMPRESA");
    //pdf.addImage(imagen,'JPEG',150, 15, 40,40);
    var cadena = pdf.output('datauristring');
    

    $('iframe').attr('src', cadena);
    //$('iframe').attr('src', cadena1);
  });

</script>