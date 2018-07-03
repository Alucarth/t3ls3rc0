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

		
		var nom = <?php echo json_encode($nombre); ?>;
		var cod = <?php echo json_encode($cod); ?>;

		var region = <?php echo json_encode($regional); ?>;
		var fecha=<?php echo json_encode($hoy); ?>;
		var hdmi0=<?php echo json_encode($n1[0]); ?>;
		var hdmi1=<?php echo json_encode($n1[1]); ?>;
		var hdmi2=<?php echo json_encode($n1[2]); ?>;
		var hdmi3=<?php echo json_encode($n1[3]); ?>;

		var rca0=<?php echo json_encode($n2[0]); ?>;
		var rca1=<?php echo json_encode($n2[1]); ?>;
		var rca2=<?php echo json_encode($n2[2]); ?>;
		var rca3=<?php echo json_encode($n2[3]); ?>;

		var coni0=<?php echo json_encode($n3[0]); ?>;
		var coni1=<?php echo json_encode($n3[1]); ?>;
		var coni2=<?php echo json_encode($n3[2]); ?>;
		var coni3=<?php echo json_encode($n3[3]); ?>;

		var cone0=<?php echo json_encode($n4[0]); ?>;
		var cone1=<?php echo json_encode($n4[1]); ?>;
		var cone2=<?php echo json_encode($n4[2]); ?>;
		var cone3=<?php echo json_encode($n4[3]); ?>;

		var sp120=<?php echo json_encode($n5[0]); ?>;
		var sp121=<?php echo json_encode($n5[1]); ?>;
		var sp122=<?php echo json_encode($n5[2]); ?>;
		var sp123=<?php echo json_encode($n5[3]); ?>;

		var sp130=<?php echo json_encode($n6[0]); ?>;
		var sp131=<?php echo json_encode($n6[1]); ?>;
		var sp132=<?php echo json_encode($n6[2]); ?>;
		var sp133=<?php echo json_encode($n6[3]); ?>;

		var clamp0=<?php echo json_encode($n7[0]); ?>;
		var clamp1=<?php echo json_encode($n7[1]); ?>;
		var clamp2=<?php echo json_encode($n7[2]); ?>;
		var clamp3=<?php echo json_encode($n7[3]); ?>;

		var filtro0=<?php echo json_encode($n8[0]); ?>;
		var filtro1=<?php echo json_encode($n8[1]); ?>;
		var filtro2=<?php echo json_encode($n8[2]); ?>;
		var filtro3=<?php echo json_encode($n8[3]); ?>;

		var prec0=<?php echo json_encode($n9[0]); ?>;
		var prec1=<?php echo json_encode($n9[1]); ?>;
		var prec2=<?php echo json_encode($n9[2]); ?>;
		var prec3=<?php echo json_encode($n9[3]); ?>;

		var grapi0=<?php echo json_encode($n10[0]); ?>;
		var grapi1=<?php echo json_encode($n10[1]); ?>;
		var grapi2=<?php echo json_encode($n10[2]); ?>;
		var grapi3=<?php echo json_encode($n10[3]); ?>;

		var grape0=<?php echo json_encode($n11[0]); ?>;
		var grape1=<?php echo json_encode($n11[1]); ?>;
		var grape2=<?php echo json_encode($n11[2]); ?>;
		var grape3=<?php echo json_encode($n11[3]); ?>;

		var piton0=<?php echo json_encode($n12[0]); ?>;
		var piton1=<?php echo json_encode($n12[1]); ?>;
		var piton2=<?php echo json_encode($n12[2]); ?>;
		var piton3=<?php echo json_encode($n12[3]); ?>;

		var cp0=<?php echo json_encode($n13[0]); ?>;
		var cp1=<?php echo json_encode($n13[1]); ?>;
		var cp2=<?php echo json_encode($n13[2]); ?>;
		var cp3=<?php echo json_encode($n13[3]); ?>;

		var sp0=<?php echo json_encode($n14[0]); ?>;
		var sp1=<?php echo json_encode($n14[1]); ?>;
		var sp2=<?php echo json_encode($n14[2]); ?>;
		var sp3=<?php echo json_encode($n14[3]); ?>;

		var deco0=<?php echo json_encode($num_deco[0]); ?>;
		var deco1=<?php echo json_encode($num_deco[1]); ?>;
		var deco2=<?php echo json_encode($num_deco[2]); ?>;
		var deco3=<?php echo json_encode($num_deco[3]); ?>;

		var modem0=<?php echo json_encode($num_modem[0]); ?>;
		var modem1=<?php echo json_encode($num_modem[1]); ?>;
		var modem2=<?php echo json_encode($num_modem[2]); ?>;
		var modem3=<?php echo json_encode($num_modem[3]); ?>;

		var columns = ["N", "CÓDIGO ÍTEM", "NOMBRE ÍTEM", "FECHA-HORA","CANTIDAD","N", "CÓDIGO ÍTEM", "NOMBRE ÍTEM", "FECHA-HORA","CANTIDAD"];
		var rows = [
		    [1,hdmi0,hdmi1,hdmi2,"  "+hdmi3,1,hdmi0,hdmi1,hdmi2,"  "+hdmi3],
		    [2,rca0,rca1,rca2,"  "+rca3,2,rca0,rca1,rca2,"  "+rca3],
		    [3,coni0,coni1,coni2,"  "+coni3,3,coni0,coni1,coni2,"  "+coni3],
		    [4,cone0,cone1,cone2,"  "+cone3,4,cone0,cone1,cone2,"  "+cone3],
		    [5,sp120,sp121,sp122,"  "+sp123,5,sp120,sp121,sp122,"  "+sp123],
		    [6,sp130,sp131,sp132,"  "+sp133,6,sp130,sp131,sp132,"  "+sp133],
		    [7,clamp0,clamp1,clamp2,"  "+clamp3,7,clamp0,clamp1,clamp2,"  "+clamp3],
		    [8,filtro0,filtro1,filtro2,"  "+filtro3,8,filtro0,filtro1,filtro2,"  "+filtro3],
		    [9,prec0,prec1,prec2,"  "+prec3,9,prec0,prec1,prec2,"  "+prec3],
		    [10,grapi0,grapi1,grapi2,"  "+grapi3,10,grapi0,grapi1,grapi2,"  "+grapi3],
		    [11,grape0,grape1,grape2,"  "+grape3,11,grape0,grape1,grape2,"  "+grape3],
		    [12,piton0,piton1,piton2,"  "+piton3,12,piton0,piton1,piton2,"  "+piton3],
		    [13,cp0,cp1,cp2,"  "+cp3,13,cp0,cp1,cp2,"  "+cp3],
		    [14,sp0,sp1,sp2,"  "+sp3,14,sp0,sp1,sp2,"  "+sp3],

		    [15,deco0,deco1,deco2,"  "+deco3,15,deco0,deco1,deco2,"  "+deco3],
		    [16,modem0,modem1,modem2,"  "+modem3,16,modem0,modem1,modem2,"  "+modem3]
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


        pdf.setFontSize(10);
        pdf.setFont('helvetica');
		pdf.text(30,10,"TELSERCO S.R.L. 2018   ");
		pdf.text(30,20,"		*****INVENTARIO DIARIO******        FECHA:"+fecha);
		pdf.setFontSize(8.7);
		pdf.text(30,30,"TÉCNICO:"+nom+"           CÓDIGO:"+cod);
		pdf.setFontSize(10);
		pdf.text(395,10,"TELSERCO S.R.L. 2018 ");
    	pdf.text(395,20,"		*****INVENTARIO DIARIO******        FECHA:"+fecha);
    	pdf.setFontSize(8.7);
    	pdf.text(395,30,"TÉCNICO:"+nom+"           CÓDIGO:"+cod);
    	
    	var xx1=30;
		var yy1=300;

		var xx2=400;
		var yy2=300;
		// modem
		var xx3=170
		var yy3=300;

		var xx4=540;
		var yy4=300;

        // carretas         
        var xx5=260;         
        var yy5=300;

		var xx6=640;
		var yy6=300;

		var xx7=330;         
        var yy7=300;

		var xx8=700;
		var yy8=300;

		pdf.addFont('ComicSansMS', 'Comic Sans', 'normal');
		pdf.setFont('Comic Sans');
		pdf.setFontType("bold");

		pdf.text(xx1,yy1,"DECODIFICADORES");
		pdf.text(xx3,yy3,"MODEM");
		pdf.text(xx5,yy5,"S/P");
		pdf.text(xx7,yy7,"C/P");
		pdf.text(xx2,yy2,"DECODIFICADORES");
		pdf.text(xx4,yy4,"MODEM");
		pdf.text(xx6,yy6,"S/P");
		pdf.text(xx8,yy8,"C/P");
		pdf.rect(xx1,yy1+1,720,0);

		yy1=yy1+10;
		yy2=yy2+10;

		yy3=yy3+10;
		yy4=yy4+10;

		yy5=yy5+10;
		yy6=yy6+10;

		yy7=yy7+10;
		yy8=yy8+10;
		
		var deco = JSON.parse('<?php echo json_encode($deco) ?>');
		var modem = JSON.parse('<?php echo json_encode($modem) ?>');
		//c/p
		var carreta = JSON.parse('<?php echo json_encode($carreta1) ?>');
		//s/p
		var carreta1 = JSON.parse('<?php echo json_encode($carreta2) ?>');
		pdf.setFontType("normal");
		var pagina1=1;
		var pagina2=1;

		var cc=1;
		var cs=1;
		
		for(i=0;i<carreta1.length;i++)
	 	{
		 	//pdf.rect(xx1,yy1+1,190,0);
		 	//yy1=yy1+3;
		 	pdf.text(cs+"-",xx5-10,yy5);
		 	pdf.text(cs+"-",xx6-10,yy6);
		 	pdf.text(carreta1[i].SERIAL,xx5,yy5);
		 	pdf.text(carreta1[i].SERIAL,xx6,yy6);
		 	cs=cs+1;
		 	//d.rect(10,y+2,190,0);
			
			if(yy5>=570){
				pdf.addPage();
				pdf.setFontSize(10);
		        pdf.setFont('helvetica');
				pdf.text(30,10,"TELSERCO S.R.L. 2018   ");
				pdf.text(30,20,"		*****INVENTARIO DIARIO******        FECHA:"+fecha);
				pdf.setFontSize(8.7);
				pdf.text(30,30,"TÉCNICO:"+nom+"           CÓDIGO:"+cod);
				pdf.setFontSize(10);
				pdf.text(395,10,"TELSERCO S.R.L. 2018 ");
		    	pdf.text(395,20,"		*****INVENTARIO DIARIO******        FECHA:"+fecha);
		    	pdf.setFontSize(8.7);
		    	pdf.text(395,30,"TÉCNICO:"+nom+"           CÓDIGO:"+cod);

				

				xx5=270;
				yy5=50;
				xx6=625;
				yy6=50;
				pdf.addFont('ComicSansMS', 'Comic Sans', 'normal');
				pdf.setFont('Comic Sans');
				pdf.setFontType("bold");
				pdf.text(xx5,yy5,"S/P");
				pdf.text(xx6,yy6,"S/P");
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


		for(i=0;i<carreta.length;i++)
	 	{
		 	//pdf.rect(xx1,yy1+1,190,0);
		 	//yy1=yy1+3;
		 	pdf.text(cc+"-",xx7-10,yy7);
		 	pdf.text(cc+"-",xx8-10,yy8);
		 	pdf.text(carreta[i].SERIAL,xx7,yy7);
		 	pdf.text(carreta[i].SERIAL,xx8,yy8);
		 	cc=cc+1;
		 	//d.rect(10,y+2,190,0);
			
			if(yy7>=570){
				pdf.addPage();
				pdf.setFontSize(10);
		        pdf.setFont('helvetica');
				pdf.text(30,10,"TELSERCO S.R.L. 2018   ");
				pdf.text(30,20,"		*****INVENTARIO DIARIO******        FECHA:"+fecha);
				pdf.setFontSize(8.7);
				pdf.text(30,30,"TÉCNICO:"+nom+"           CÓDIGO:"+cod);
				pdf.setFontSize(10);
				pdf.text(395,10,"TELSERCO S.R.L. 2018 ");
		    	pdf.text(395,20,"		*****INVENTARIO DIARIO******        FECHA:"+fecha);
		    	pdf.setFontSize(8.7);
		    	pdf.text(395,30,"TÉCNICO:"+nom+"           CÓDIGO:"+cod);

				

				xx7=270;
				yy7=50;
				xx8=625;
				yy8=50;
				pdf.addFont('ComicSansMS', 'Comic Sans', 'normal');
				pdf.setFont('Comic Sans');
				pdf.setFontType("bold");
				pdf.text(xx7,yy7,"C/P");
				pdf.text(xx8,yy8,"C/P");
				//pdf.rect(xx1,yy1+1,720,0);
				yy7=yy7+10;
				yy8=yy8+10;
				pdf.setFontType("normal");

			}
			else{
				yy7=yy7+10;
				yy8=yy8+10;
			}

		}
		
		var dd=1;
		for(i=0;i<deco.length;i++)
	 	{
		 	pdf.text(dd+"-",xx1-10,yy1);
		 	pdf.text(dd+"-",xx2-10,yy2);
		 	pdf.text(deco[i].SERIAL,xx1,yy1);
		 	pdf.text(deco[i].SERIAL,xx2,yy2);
		 	dd=dd+1;
		 	//d.rect(10,y+2,190,0);
			
			if(yy1>=570){
				pagina1++;
				pdf.addPage();
				pdf.setFontSize(10);
		        pdf.setFont('helvetica');
				pdf.text(30,10,"TELSERCO S.R.L. 2018   ");
				pdf.text(30,20,"		*****INVENTARIO DIARIO******        FECHA:"+fecha);
				pdf.setFontSize(8.7);
				pdf.text(30,30,"TÉCNICO:"+nom+"           CÓDIGO:"+cod);
				pdf.setFontSize(10);
				pdf.text(395,10,"TELSERCO S.R.L. 2018 ");
		    	pdf.text(395,20,"		*****INVENTARIO DIARIO******        FECHA:"+fecha);
		    	pdf.setFontSize(8.7);
		    	pdf.text(395,30,"TÉCNICO:"+nom+"           CÓDIGO:"+cod);

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
	 		pdf.text(mm+"-",xx3-10,yy3);
	 		pdf.text(mm+"-",xx4-10,yy4);
		 	pdf.text(modem[i].SERIAL,xx3,yy3);
		 	pdf.text(modem[i].SERIAL,xx4,yy4);
		 	mm=mm+1;
		 	//d.rect(10,y+2,190,0);

			if(yy3>=570){
				pdf.addPage();
				pdf.setFontSize(10);
		        pdf.setFont('helvetica');
				pdf.text(30,10,"TELSERCO S.R.L. 2018   ");
				pdf.text(30,20,"		*****INVENTARIO DIARIO******        FECHA:"+fecha);
				pdf.setFontSize(8.7);
				pdf.text(30,30,"TÉCNICO:"+nom+"           CÓDIGO:"+cod);
				pdf.setFontSize(10);
				pdf.text(395,10,"TELSERCO S.R.L. 2018 ");
		    	pdf.text(395,20,"		*****INVENTARIO DIARIO******        FECHA:"+fecha);
		    	pdf.setFontSize(8.7);
		    	pdf.text(395,30,"TÉCNICO:"+nom+"           CÓDIGO:"+cod);

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




		pdf.text(30,580,"------------------------------- 		                    ------------------------------");
		pdf.text(30,590,"   FIRMA INSPECCIÓN 					FIRMA TÉCNICO");
		pdf.text(400,580," ---------------------------------                           ------------------------------");
    	pdf.text(400,590,"   FIRMA INSPECCIÓN 				 FIRMA TÉCNICO");
    	pdf.text(30,605," REGIONAL:"+region);
		pdf.text(400,605," REGIONAL:"+region);


		
		var cadena = pdf.output('datauristring');
		

		$('iframe').attr('src', cadena);
		//$('iframe').attr('src', cadena1);
	});

</script>


