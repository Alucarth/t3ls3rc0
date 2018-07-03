<div class="x_panel">
	<div class="embed-container">
		

           <iframe frameborder="0" width="500" height="400"></iframe>
           <div class="container-fluid">
	            
           </div>
     </div>
</div>
<!--script
  src="https://code.jquery.com/jquery-3.2.1.js"
  integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
  crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.debug.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/2.3.2/jspdf.plugin.autotable.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/2.3.2/jspdf.plugin.autotable.min.js"></script-->

<script  src="<?=base_url()?>assets/js/jquery.min.js"></script>
<script src="<?=base_url()?>assets/lib/jsPDF/dist/jspdf.debug.js"></script>

<script src="<?=base_url()?>assets/lib/jsPDF/dist/jspdf.plugin.autotable.js"></script>
<script src="<?=base_url()?>assets/lib/jsPDF/dist/jspdf.plugin.autotable.min.js"></script>
<!--script src="<?=base_url()?>assets/lib/jspdf/dist/jspdf.min.js"></script-->
<!--script src="<?=base_url()?>assets/lib/jspdf/dist/jspdf.plugin.autotable.js"></script-->
<script type="text/javascript">


	$(document).ready(function() {
		var items = <?php echo json_encode($id_p); ?>;
		var nom = <?php echo json_encode($almacen1); ?>;
		var ape = <?php echo json_encode($almacen2); ?>;
		var per = <?php echo json_encode($personal); ?>;
		var ni = <?php echo json_encode($ni); ?>;
		var fecha = <?php echo json_encode($hoy); ?>;
		var region = <?php echo json_encode($lugar); ?>;
		var num_deco=<?php echo json_encode($num_deco); ?>;
		var num_modem=<?php echo json_encode($num_modem); ?>;
		var num_carreta=<?php echo json_encode($num_carreta); ?>;
		var num_carreta_e=<?php echo json_encode($num_carreta_e); ?>;
		var hora=<?php echo json_encode($hora); ?>;
		var nota=<?php echo json_encode($comentario); ?>;
		//articulos a entregar

		var num1=<?php echo json_encode($num1); ?>;
		var num2=<?php echo json_encode($num2); ?>;
		var num3=<?php echo json_encode($num3); ?>;
		var num4=<?php echo json_encode($num4); ?>;
		var num5=<?php echo json_encode($num5); ?>;
		var num6=<?php echo json_encode($num6); ?>;
		var num7=<?php echo json_encode($num7); ?>;
		var num8=<?php echo json_encode($num8); ?>;
		var num9=<?php echo json_encode($num9); ?>;
		var num10=<?php echo json_encode($num10); ?>;
		var num11=<?php echo json_encode($num11); ?>;
		var num12=<?php echo json_encode($num12); ?>;
		
		var num21=<?php echo json_encode($num21); ?>;
		var num22=<?php echo json_encode($num22); ?>;
		
		var num25=<?php echo json_encode($num25); ?>;
		var num26=<?php echo json_encode($num26); ?>;



		var sum1=<?php echo json_encode($s1); ?>;
		var sum2=<?php echo json_encode($s2); ?>;
		var sum3=<?php echo json_encode($s3); ?>;
		var sum4=<?php echo json_encode($s4); ?>;
		var sum5=<?php echo json_encode($s5); ?>;
		var sum6=<?php echo json_encode($s6); ?>;
		var sum7=<?php echo json_encode($s7); ?>;

		var sum11=<?php echo json_encode($s11); ?>;


		
		var columns = ["N","ARTÍCULO","Stock\n Actual","Entregar","STOCK\nTOTAL","N", "ARTÍCULO","Stock \nActual","Entregar","STOCK \nTOTAL"];
		var rows = [
		    [1,"DECODIFICADOR+CONTROL","0",num_deco,num_deco,1,"DECODIFICADOR+CONTROL","0",num_deco,num_deco],
		    [2,"MODEM","0",num_modem,num_modem,2,"MODEM","0",num_modem,num_modem],
		    [3,"CABLE RG6 C/PORTANTE 305 Metros","0",num_carreta,num_carreta*305,3,"CABLE RG6 C/PORTANTE 305 Metros", "0",num_carreta,num_carreta*305],
		    [4,"CABLE RG6 S/PORTANTE 305 Metros","0",num_carreta_e,num_carreta_e*305,4,"CABLE RG6 S/PORTANTE 305 Metros","0",num_carreta_e,num_carreta_e*305],
		    [5,"RCA",num2,num1,sum1,5,"RCA",num2,num1,sum1],
		    [6,"CONECTORES INTERNOS",num4,num3,sum2,6,"CONECTORES INTERNOS",num4,num3,sum2],
		    [7,"CONECTORES EXTERNOS",num6,num5,sum3,7,"CONECTORES EXTERNOS",num6,num5,sum3],
		    [8,"SPLITTER 1/2",num8,num7,sum4,8,"SPLITTER 1/2",num8,num7,sum4],
		    [9,"SPLITTER 1/3",num10,num9,sum5,9,"SPLITTER 1/3",num10,num9,sum5],
		    [10,"CLAMP´S",num12,num11,sum6,10,"CLAMP´S",num12,num11,sum6],
		    [11,"FILTRO",num22,num21,sum7,11,"FILTRO",num22,num21,sum7],
		    [12,"HDMI",num26,num25,sum11,12,"HDMI",num26,num25,sum11]
		    


		];
		
        var pdf = new jsPDF('l','pt','letter');

         pdf.autoTable(columns,rows,{
		 	theme: 'grid',
		 	styles: {
		 		fillColor: [255, 255, 255],
		 		fontSize: 9,
    			font: "helvetica",
    			cellPadding: 2,
    			tableLineColor: 200,
    			textColor: 20
		 	},
		 	headerStyles: {
		 		fillColor: [230, 230, 230],

		 	},
		    columnStyles: {
		    	id: {fillColor: 255},
		    	0: {columnWidth: '15%'}
		    },
		    margin: {
		    	 	top: 45,
			        bottom: 50,
			        left: 30,
			        width: 30
		    },

		}) ;
		style= "border-width: medium; border-style: ridge;  pageBreak: 'auto';";


        pdf.setFontSize(8.7);
        pdf.setFont('helvetica');
        //COLOR DE LETRA
        //pdf.setTextColor(0,0,255);
		pdf.text(30,10,"FORMULARIO 001:SOLICITUD DE MATERIAL	TELSERCO S.R.L. 2018   NOTA N°"+ni);
		pdf.text(30,20,"FECHA: "+fecha+" "+hora+"						COPIA/ALMACÉN");
		pdf.text(30,30,"ENTREGADO POR:"+nom+" "+ape);
		pdf.setFontSize(10);
		pdf.text(30,40,"ENTREGADO A:"+per);

		pdf.setFontSize(8.7);
		pdf.text(395,10,"FORMULARIO 001:SOLICITUD DE MATERIAL	TELSERCO S.R.L. 2018	NOTA N°"+ni);
		pdf.text(395,20,"FECHA: "+fecha+" "+hora+"						COPIA/TÉCNICO");
		pdf.text(395,30,"ENTREGADO POR:"+nom+" "+ape);
		pdf.setFontSize(10);
		pdf.text(395,40,"ENTREGADO A:"+per);

		var deco = JSON.parse('<?php echo json_encode($deco) ?>');
		var modem = JSON.parse('<?php echo json_encode($modem) ?>');
		var carreta = JSON.parse('<?php echo json_encode($carreta_i) ?>');
		var carreta1 = JSON.parse('<?php echo json_encode($carreta_e) ?>');

		//console.log(deco);
		//deco
		var xx1=50;
		var yy1=260;

		var xx2=420;
		var yy2=260;
		// modem
		var xx3=170;
		var yy3=260;

		var xx4=540;
		var yy4=260;

        // carretas         
        var xx5=280;         
        var yy5=260;

		var xx6=650;
		var yy6=260;

		pdf.addFont('ComicSansMS', 'Comic Sans', 'normal');
		pdf.setFont('Comic Sans');
		pdf.setFontType("bold");

		pdf.text(xx1,yy1,"DECODIFICADORES");
		pdf.text(xx3,yy3,"MODEM");
		pdf.text(xx5,yy5,"CARRETA");
		pdf.text(xx2,yy2,"DECODIFICADORES");
		pdf.text(xx4,yy4,"MODEM");
		pdf.text(xx6,yy6,"CARRETA");
		pdf.rect(xx1-20,yy1+1,720,0);

		yy1=yy1+10;
		yy2=yy2+10;

		yy3=yy3+10;
		yy4=yy4+10;

		yy5=yy5+10;
		yy6=yy6+10;
		
		pdf.setFontType("normal");
		var pagina1=1;
		var pagina2=1;

		var cc=1;
		
		for(i=0;i<carreta.length;i++)
	 	{
		 	//pdf.rect(xx1,yy1+1,190,0);
		 	//yy1=yy1+3;
		 	pdf.text(cc+"-",xx5-20,yy5);
		 	pdf.text(cc+"-",xx6-20,yy6);
		 	pdf.text(carreta[i].SERIAL,xx5,yy5);
		 	pdf.text(carreta[i].SERIAL,xx6,yy6);
		 	cc=cc+1;
		 	//d.rect(10,y+2,190,0);
			
			if(yy5>=570){
				pdf.addPage();
				pdf.setFontSize(8.7);
		        pdf.setFont('helvetica');
				pdf.text(30,10,"FORMULARIO 001:SOLICITUD DE MATERIAL	TELSERCO S.R.L. 2018   NOTA N°"+ni);
				pdf.text(30,20,"FECHA: "+fecha+" 										  COPIA/TÉCNICO");
				pdf.text(30,30,"ENTREGADO POR:"+nom+" "+ape);
				pdf.setFontSize(10);
				pdf.text(30,40,"ENTREGADO A:"+per);

				pdf.setFontSize(8.7);
				pdf.text(395,10,"FORMULARIO 001:SOLICITUD DE MATERIAL	TELSERCO S.R.L. 2018	NOTA N°"+ni);
				pdf.text(395,20,"FECHA: "+fecha+" 										     COPIA/ALMACÉN");
				pdf.text(395,30,"ENTREGADO POR:"+nom+" "+ape);
				pdf.setFontSize(10);
				pdf.text(395,40,"ENTREGADO A:"+per);

				xx5=270;
				yy5=50;
				xx6=625;
				yy6=50;
				pdf.addFont('ComicSansMS', 'Comic Sans', 'normal');
				pdf.setFont('Comic Sans');
				pdf.setFontType("bold");
				pdf.text(xx5,yy5,"CARRETA");
				pdf.text(xx6,yy6,"CARRETA");
				//pdf.rect(xx1,yy1+1,720,0);
				yy5=yy5+10;
				yy6=yy6+10;
				pdf.setFontType("normal");

			}
			else{
				yy5=yy5+10;
				yy6=yy6+10;
			}

		}
		
		var dd=1;
		for(i=0;i<deco.length;i++)
	 	{
		 	pdf.text(dd+"-",xx1-20,yy1);
		 	pdf.text(dd+"-",xx2-20,yy2);
		 	pdf.text(deco[i].SERIAL,xx1,yy1);
		 	pdf.text(deco[i].SERIAL,xx2,yy2);
		 	dd=dd+1;
		 	//d.rect(10,y+2,190,0);
			
			if(yy1>=570){
				pagina1++;
				pdf.addPage();
				pdf.setFontSize(8.7);
		        pdf.setFont('helvetica');
				pdf.text(30,10,"FORMULARIO 001:SOLICITUD DE MATERIAL	TELSERCO S.R.L. 2018   NOTA N°"+ni);
				pdf.text(30,20,"FECHA: "+fecha+" 										  COPIA/TÉCNICO");
				pdf.text(30,30,"ENTREGADO POR:"+nom+" "+ape);
				pdf.setFontSize(10);
				pdf.text(30,40,"ENTREGADO A:"+per);

				pdf.setFontSize(8.7);
				pdf.text(395,10,"FORMULARIO 001:SOLICITUD DE MATERIAL	TELSERCO S.R.L. 2018	NOTA N°"+ni);
				pdf.text(395,20,"FECHA: "+fecha+" 										     COPIA/ALMACÉN");
				pdf.text(395,30,"ENTREGADO POR:"+nom+" "+ape);
				pdf.setFontSize(10);
				pdf.text(395,40,"ENTREGADO A:"+per);

				xx1=30;
				yy1=50;
				xx2=395;
				yy2=50;
				pdf.addFont('ComicSansMS', 'Comic Sans', 'normal');
				pdf.setFont('Comic Sans');
				pdf.setFontType("bold");
				pdf.text(xx1,yy1,"DECODIFICADORES");
				pdf.text(xx2,yy2,"DECODIFICADORES");
				//pdf.rect(xx1,yy1+1,720,0);
				yy1=yy1+10;
				yy2=yy2+10;
				pdf.setFontType("normal");

			}
			else{
				yy1=yy1+10;
				yy2=yy2+10;
			}

		}
		//}
		if(pagina1>1){
				
				xx3=150;
				yy3=50;
				xx4=515;
				yy4=50;
				pdf.addFont('ComicSansMS', 'Comic Sans', 'normal');
				pdf.setFont('Comic Sans');
				pdf.setFontType("bold");
				pdf.text(xx3,yy3,"MODEM");
				pdf.text(xx4,yy4,"MODEM");
				//pdf.rect(xx1,yy1+1,720,0);
				yy3=yy3+10;
				yy4=yy4+10;
				pdf.setFontType("normal");
				pdf.pageBreak;
		
		}
		var mm=1;

			
		
		for(i=0;i<modem.length;i++)
	 	{
	 		pdf.text(mm+"-",xx3-20,yy3);
	 		pdf.text(mm+"-",xx4-20,yy4);
		 	pdf.text(modem[i].SERIAL,xx3,yy3);
		 	pdf.text(modem[i].SERIAL,xx4,yy4);
		 	mm=mm+1;
		 	//d.rect(10,y+2,190,0);

			if(yy3>=570){
				pdf.addPage();
				pdf.setFontSize(8.7);
		        pdf.setFont('helvetica');
				pdf.text(30,10,"FORMULARIO 001:SOLICITUD DE MATERIAL	TELSERCO S.R.L. 2018   NOTA N°"+ni);
				pdf.text(30,20,"FECHA: "+fecha+" 										  COPIA/TÉCNICO");
				pdf.text(30,30,"ENTREGADO POR:"+nom+" "+ape);
				pdf.setFontSize(10);
				pdf.text(30,40,"ENTREGADO A:"+per);

				pdf.setFontSize(8.7);
				pdf.text(395,10,"FORMULARIO 001:SOLICITUD DE MATERIAL	TELSERCO S.R.L. 2018	NOTA N°"+ni);
				pdf.text(395,20,"FECHA: "+fecha+" 										     COPIA/ALMACÉN");
				pdf.text(395,30,"ENTREGADO POR:"+nom+" "+ape);
				pdf.setFontSize(10);
				pdf.text(395,40,"ENTREGADO A:"+per);

				xx3=150;
				yy3=50;
				xx4=515;
				yy4=50;
				pdf.addFont('ComicSansMS', 'Comic Sans', 'normal');
				pdf.setFont('Comic Sans');
				pdf.setFontType("bold");
				pdf.text(xx3,yy3,"MODEM");
				pdf.text(xx4,yy4,"MODEM");
				//pdf.rect(xx1,yy1+1,720,0);
				yy3=yy3+10;
				yy4=yy4+10;
				pdf.setFontType("normal");

			}
			else{
				yy3=yy3+10;
				yy4=yy4+10;
			}
			
		}


		pdf.text(30,580,"-------------------------- 		              	------------------------------");
		pdf.text(30,590," FIRMA ENTREGA 					FIRMA RECEPCIÓN");
		pdf.text(400,580," ------------------------- 		               	------------------------------");
		pdf.text(400,590," FIRMA ENTREGA 					FIRMA RECEPCIÓN");
		pdf.text(30,605," REGIONAL:"+region);
		pdf.text(400,605," REGIONAL:"+region);

		
		var cadena = pdf.output('datauristring');
		

		$('iframe').attr('src', cadena);
		//$('iframe').attr('src', cadena1);
	});

</script>


