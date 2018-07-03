<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Almacen extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('login_model');
		$this->load->model('PersonalModel');
		$this->load->model('AlmacenModel');
		$this->load->library('javascript');
		$this->load->library('javascript/jquery');
	}
	public function index()
	{
		$this->load->view("login");
	}
	public function very_session()
    {
        if (!isset($this->session->nombres) && !isset($this->session->apellidos) && !isset($this->session->cargo)) {
            redirect(base_url(),'refresh');
        }
    }
    //TODO DE TECNICOS INTERNOS
    public function ListarProductosDinamico()
    { 	
        $value = $_GET["id"];
        $this->very_session();
        $proveedor=$this->AlmacenModel->BuscarProveedor($value);
        $nombre=$this->session->nombres;
        $apellido=$this->session->apellidos;
        $id_e=$this->AlmacenModel->entrega($nombre);
        //REGION A LA QUE PERTENECE
        $regional=$id_e->Regional;
        //$regional='POTOSI';
        $data['v3'] =$proveedor;
		$data['v4'] = $this->AlmacenModel->ListarMaterialUnidad($value);
		$data['v5'] = $this->AlmacenModel->ListarMaterialGrupo($regional);
		$this->load->view('frontend/head');
		$this->load->view('Almacenes/listarRegistroProductos',$data,FALSE);
		$this->load->view('frontend/footer');
    }
    public function ListarProductosGeneral()
    {
        $this->very_session();
        $nombre=$this->session->nombres;
        $apellido=$this->session->apellidos;
        $id_e=$this->AlmacenModel->entrega($nombre);
       //
        //REGION A LA QUE PERTENECE
        $regional=$id_e->Regional; 
        // $regional='POTOSI';
        $cargo=($this->session->cargo);
        if ($cargo=='ÁREA DE OPERACIONES' or $cargo=='GERENTE' ) {
            $data['v5'] = $this->AlmacenModel->ListarProveedorTodo(); 
        }
        else{
            $data['v5'] = $this->AlmacenModel->ListarProveedor($regional);
        }
        
        $this->load->view('frontend/head');
        $this->load->view('Almacenes/listarmaterialTigo',$data,FALSE);
        $this->load->view('frontend/footer');
    }
    
    public function ListarMaterialT()
    {
    	$this->very_session();
        $nombre=$this->session->nombres;
        $apellido=$this->session->apellidos;
        $id_e=$this->AlmacenModel->entrega($nombre);
        //REGION A LA QUE PERTENECE
        $regional=$id_e->Regional; 
		$data['v5'] = $this->AlmacenModel->ListarMaterial(10,12,12,$regional);
		$this->load->view('frontend/head');
		$this->load->view('Almacenes/listarMaterialTecnicos1', $data,FALSE);

		$this->load->view('frontend/footer');
    }
    public function ListarMaterialS()
    {
    	$this->very_session();
        $nombre=$this->session->nombres;
        $apellido=$this->session->apellidos;
        $id_e=$this->AlmacenModel->entrega($nombre);
        //REGION A LA QUE PERTENECE
        $regional=$id_e->Regional; 
		$data['v5'] = $this->AlmacenModel->ListarMaterial(13,13,13,$regional);
		$this->load->view('frontend/head');
		$this->load->view('Almacenes/listarMaterialTecnicos2', $data,FALSE);
		$this->load->view('frontend/footer');
    }
    public function ListarMaterialE()
    {
    	$this->very_session();
        $nombre=$this->session->nombres;
        $apellido=$this->session->apellidos;
        $id_e=$this->AlmacenModel->entrega($nombre);
        //REGION A LA QUE PERTENECE
        $regional=$id_e->Regional; 
		$data['v5'] = $this->AlmacenModel->ListarMaterial(13,13,13,$regional);
		$this->load->view('frontend/head');
		$this->load->view('Almacenes/listarMaterialTecnicos3', $data,FALSE);
		$this->load->view('frontend/footer');
    }
    public function mostrar_f_nueva_entrega_1()
    {
        $this->very_session();
        //
        //mandar el id del proveedor recordar
    	$material['v5'] = $this->PersonalModel->ListarPersonal_material(12,10,1);
        $material['hoy'] = date("d-m-Y"); 
        $nombre=$this->session->nombres;
        $apellido=$this->session->apellidos;
        $id_e=$this->AlmacenModel->entrega($nombre);
        //REGION A LA QUE PERTENECE
        $regional=$id_e->Regional; 
        $next1=$this->AlmacenModel->numero($regional);
        if($regional=='LA PAZ')
        {
            $id_tigo=2;
            $id_interno=1;
        }
        else
        {
            $id_tigo=14;
            $id_interno=13;
        }
        
    	$material['numero']=($next1->maximo)+1; 
        $material['v4'] = $this->AlmacenModel->ListarMaterialUnidad($id_tigo);
        $material['v3'] = $this->AlmacenModel->ListarMaterialUnidad($id_interno);
		$material['v2'] = $this->AlmacenModel->ListarMaterialGrupo($regional);
        $this->load->view('Almacenes/nuevaEntrega1',$material);
    }

    public function RegistrarDatosNuevaEntrega()
    {
    	$this->very_session();
    	//NOMBRE DEL QUE ENTREGA
    	$nombre=$this->session->nombres;
        $apellido=$this->session->apellidos;
    	$id_e=$this->AlmacenModel->entrega($nombre);
        //REGION A LA QUE PERTENECE
        $regional=$id_e->Regional;
        $prov1=1;        $prov2=2;
        //ID DEL QUE ENTREGA
        $id_e1=$id_e->id;
        // REGISTRAR NÚMERO DE ENTREGA CORRELATIVO
        $next1=$this->AlmacenModel->numero($regional);
        $next2=($next1->maximo)+1;         
    	//DATOS DEL FORMULARIO;
    	// datos técnico
    	$ity1=$this->input->post('tecnico');
        $ity = explode("-", $ity1);
        $data['id_p']=$ity[0];
        //ID DEL TECNICO
        $id_p=$ity[0];
        //NUMERO CORRELATIVO DE ENTREGA
        $id1=intval($id_p);
        $num=intval($next2);
        if($id_p>=1){
            $t=0;
            $mal[$t]=0;
            $data['ni']=$next2;
            $data['personal']=$ity[1];
            $data['almacen1']=$nombre;
            $data['almacen2']=$apellido;
            $data['hoy'] = date("d-M-Y"); 
            $data['lugar'] =$regional;
            $comentario=$this->input->post('comentarios');
            $data['comentario'] = $comentario;
            //ALMACENANDO DATOS
             //CANTIDAD DEL RESTO DEL MATERIAL RCA
            $mat1=$this->input->post('num5');
            $cod_i="CABAVRGC";
            $num1=$this->validar($mat1,$cod_i,$prov2,$regional);
            //REGISTRAR EN LA BASE DE DATOS
            $this->registro($num,$cod_i,$num1,$regional,$comentario,$id1,$id_e1);
            $data['num1']=$num1;
            $data['num2']=0;
            //conectores internos
            $mat1=$this->input->post('num7');
            $cod_i="CNTINTRG6HFC";
            $num1=$this->validar($mat1,$cod_i,$prov2,$regional);
            //REGISTRAR EN LA BASE DE DATOS
            $this->registro($num,$cod_i,$num1,$regional,$comentario,$id1,$id_e1);
            $data['num3']=$num1;
            $data['num4']=0;
            //conectores externos
            $mat1=$this->input->post('num9');
            $cod_i="CNTEXTRG6HFC";
            $num1=$this->validar($mat1,$cod_i,$prov2,$regional);
            //REGISTRAR EN LA BASE DE DATOS
            $this->registro($num,$cod_i,$num1,$regional,$comentario,$id1,$id_e1);
            $data['num5']=$num1;
            $data['num6']=0;
            //spliter 1/2
            $mat1=$this->input->post('num11');
            $cod_i="SPL12HFC";
            $num1=$this->validar($mat1,$cod_i,$prov2,$regional);
            //REGISTRAR EN LA BASE DE DATOS
            $this->registro($num,$cod_i,$num1,$regional,$comentario,$id1,$id_e1);
            $data['num7']=$num1;
            $data['num8']=0;
            //spliter 1/3
            $mat2=$this->input->post('num13');
            $cod_i="SPL13HFC";
            $num1=$this->validar($mat2,$cod_i,$prov2,$regional);
            $this->registro($num,$cod_i,$num1,$regional,$comentario,$id1,$id_e1);
            $data['num9']=$num1;
            $data['num10']=0;
            //clamp
            $mat1=$this->input->post('num15');
            $cod_i="SCLHFC";
            $num1=$this->validar($mat1,$cod_i,$prov2,$regional);
            $this->registro($num,$cod_i,$num1,$regional,$comentario,$id1,$id_e1);
            $data['num11']=$num1;
            $data['num12']=0;
            //filtros
            $mat1=$this->input->post('num17');
            $cod_i="FLTARC572BR";
            $num1=$this->validar($mat1,$cod_i,$prov2,$regional);
            //REGISTRAR EN LA BASE DE DATOS
            $this->registro($num,$cod_i,$num1,$regional,$comentario,$id1,$id_e1);
            $data['num21']=$num1;
            $data['num22']=0;

            //precinto
            $mat1=$this->input->post('num19');
            $cod_i="PCTHFC";
            $num1=$this->validar($mat1,$cod_i,$prov1,$regional);
            //REGISTRAR EN LA BASE DE DATOS
            $this->registro($num,$cod_i,$num1,$regional,$comentario,$id1,$id_e1);
            $data['num13']=$num1;
            $data['num14']=0;
            // GRAPAS 5/8
            $mat1=$this->input->post('num21');
            $cod_i="GRP58HFC";
            $num1=$this->validar($mat1,$cod_i,$prov1,$regional);
            //REGISTRAR EN LA BASE DE DATOS
            $this->registro($num,$cod_i,$num1,$regional,$comentario,$id1,$id_e1);
            $data['num15']=$num1;
            $data['num16']=0;
            //GRAPAS CONCRETO
            $mat1=$this->input->post('num23');
            $cod_i="GRPCCTHFC";
            $num1=$this->validar($mat1,$cod_i,$prov1,$regional);
            //REGISTRAR EN LA BASE DE DATOS
            $this->registro($num,$cod_i,$num1,$regional,$comentario,$id1,$id_e1);
            $data['num17']=$num1;
            $data['num18']=0;
            //CINTA AISLANTE
            $mat1=$this->input->post('num25');
            $cod_i="CTASHFC";
            $num1=$this->validar($mat1,$cod_i,$prov1,$regional);
            //REGISTRAR EN LA BASE DE DATOS
            $this->registro($num,$cod_i,$num1,$regional,$comentario,$id1,$id_e1);
            $data['num19']=$num1;
            $data['num20']=0;
            //AUTO SOLD
             $mat1=$this->input->post('num27');
            $cod_i="VLTHFC";
            $num1=$this->validar($mat1,$cod_i,$prov1,$regional);
            //REGISTRAR EN LA BASE DE DATOS
            $this->registro($num,$cod_i,$num1,$regional,$comentario,$id1,$id_e1);
            $data['num23']=$num1;
            $data['num24']=0;
            //CABLE HDMI
            $mat1=$this->input->post('num29');
            $cod_i="CABAVHDMI";
            $num1=$this->validar($mat1,$cod_i,$prov2,$regional);
            //REGISTRAR EN LA BASE DE DATOS
            $this->registro($num,$cod_i,$num1,$regional,$comentario,$id1,$id_e1);
            $data['num25']=$num1;
            $data['num26']=0;
            //PITON
            $mat1=$this->input->post('num31');
            $cod_i="PTLRMPHFC";
            $num1=$this->validar($mat1,$cod_i,$prov1,$regional);
            //REGISTRAR EN LA BASE DE DATOS
            $this->registro($num,$cod_i,$num1,$regional,$comentario,$id1,$id_e1);
            $data['num27']=$num1;
            $data['num28']=0;
            for ($i=1; $i <=25 ; $i++) { 
                $serie=$this->input->post('deco'.$i);
                //VALIDACION DE EXISTENCIA DEL PRODUCTO EN LA BASE DE DATOS
                $ser1=$this->AlmacenModel->BuscarDeco($serie);
                if ($ser1!="" or $ser1!=null)
                {
                    $ser2=$ser1->SERIAL;
                    $ser3=$ser1->CHIP_ID;
                    $id_prod=$ser1->Id_producto;
                    $cod_item=$ser1->codigo;
                    if($cod_item =='CCRG6CPHFC' or $cod_item=='CCRG6SPHFC')  $cant=305;
                    else $cant=1;
                }
                else{
                    if($serie!=""){
                        $ser2="PROBLEMAS";
                        $mal[$t]=$serie;
                        $t++;
                    }
                }
                if($serie!="" and ($ser1!="" or $ser1!=null))
                {
                    $dataEntrega = array(
                        "Numero_entrega" => $num,
                        "Cod_item_per"=>$cod_item,
                        "SERIAL"=>$ser2,
                        "SERIAL_OTRO"=>$ser3,
                        "Cantidad"=>$cant,
                        "Regional"=>$regional,
                        "Observacion"=>$comentario,
                        "Id_asignacion_prod_p"=>$id1,
                        "Id_almacen"=>$id_e1
                    );
                    //echo json_encode($dataEntrega);
                    $this->AlmacenModel->guardar_entrega1($dataEntrega);
                    $dataBaja = array(
                        "Id_estado_prod_e"=>3,
                        ""
                        );
                    $this->AlmacenModel->baja_serie($id_prod,$dataBaja);
                    //echo json_encode($dataBaja);*/
                } 
            }
            //CANTIDAD Y CÓDIGOS DE DECO, MODEMS Y CARRETAS
            $data['deco'] = $this->AlmacenModel->ListarProductosPersonal($num,$id1,'DCODCON');
            $data['num_deco']=sizeof($data['deco']);
            $data['modem'] = $this->AlmacenModel->ListarProductosPersonal($num,$id1,'MDWF');
            $data['num_modem']=sizeof($data['modem']);
            $data['carreta_i'] = $this->AlmacenModel->ListarProductosPersonal($num,$id1,'CCRG6CPHFC');
            $data['num_carreta']=sizeof($data['carreta_i']);
            $data['carreta_e'] = $this->AlmacenModel->ListarProductosPersonal($num,$id1,'CCRG6SPHFC');
            $data['num_carreta_e']=sizeof($data['carreta_e']);

            $hora0=$this->AlmacenModel->HoraForm1($num);           
            $hora1=$hora0->hora;
            if($hora1==null){
                echo '<script language="javascript">alert("Ningún registro");</script>';
                redirect('Almacen/error_registro','refresh');
            }
            else{
                $hora2 = explode(" ", $hora1);
                $data['hora']=$hora2[1];        
                //mandar los datos para imprimir');
                echo '<script language="javascript">
                        alert("DATOS REGISTRADOS CON ÉXITO ");
                    </script>'; 
                $this->session->set_flashdata('registro', $data);
                redirect('Almacen/registro_exitoso','refresh');
             }
        }
        else{
            echo '<script language="javascript">alert("ERROR");</script>';
            /*$this->load->view('frontend/head'); 
            $this->load->view('frontend/footer');
            //redirect('Almacen/ListarMaterialT');*/

        }
    }
    //valida que los materiales existan en almacen
    public function validar($material,$codigo,$prov,$regional)
    {
        
        $this->very_session();
        $v4 = $this->AlmacenModel->ListarMaterialUnidad($prov);
        $v2 = $this->AlmacenModel->ListarMaterialGrupo($regional);
        $num3=0;
        if ($material!="" and $material>0) {
            foreach ($v4 as $row) { 

                if ($row->Cod_item_interno==$codigo){
                    foreach ($v2 as $row1) {
                        if ($row->SERIAL!=$row1->SERIAL)
                        {
                            $stock=$row->suma;
                            if($stock>=$material)
                            {
                                $num3=$material;
                            }    
                        } 
                        else
                        {
                            $a1=$row->suma;
                            $b1=$row1->suma2;
                            $c1=$a1-$b1;
                            if($c1>=$material)
                            {
                                $num3=$material;
                            }  
                        }
                    }
                }
            }
        }
        return $num3;
    }
    //registra entrega de material, el codigo de serie
    public function registro($num,$cod_i,$num1,$regional,$comentario,$id1,$id_a)
    {
        $this->very_session();
        if($num1>0){
            $dataRegistro = array(
                        "Numero_entrega" => $num,
                        "Cod_item_per"=>$cod_i,
                        "SERIAL"=>$cod_i,
                        "Cantidad"=>$num1,
                        "Regional"=>$regional,
                        "Observacion"=>$comentario,
                        "Id_asignacion_prod_p"=>$id1,
                        "Id_almacen"=>$id_a
                    );
                    $this->AlmacenModel->guardar_entrega1($dataRegistro);
                    //echo json_encode($dataRegistro);
        }
    }
    public function error_registro()
    {
        $this->very_session();
        $this->load->view('frontend/head'); 
        $this->load->view('errores/registro');
        $this->load->view('frontend/footer');
    }
    public function registro_exitoso()
    {
        $this->very_session();
        $data= $this->session->flashdata('registro');
        $this->load->view('frontend/head');
        $this->load->view('Almacenes/prueba_modal',$data, FALSE);
        $this->load->view('frontend/footer');
    }
    public function registro_exitoso_adicion()
    {
        $this->very_session();
        $data= $this->session->flashdata('registro');
        $this->load->view('frontend/head');
        $this->load->view('Almacenes/adicion',$data, FALSE);
        $this->load->view('frontend/footer');
    }
    //***********************************ALMACEN TÉCNICOS***********************************
    public function material_tecnico_total()
    {
        $this->very_session();
        $n1 = $this->input->get('id');
        $n2 = explode(".", $n1);
        $n=$n2[0];
        $v5=$this->AlmacenModel->Material_tecnico1($n);
        $data['deco']=$this->AlmacenModel->Material_tecnico2($n,'DCODCON');
        $data['modem']=$this->AlmacenModel->Material_tecnico2($n,'MDWF');
        $data['carreta1']=$this->AlmacenModel->Material_tecnico2($n,'CCRG6CPHFC');
        $data['carreta2']=$this->AlmacenModel->Material_tecnico2($n,'CCRG6SPHFC');
        $num[0]="DCODCON";
        $num[1]="DECODIFICADOR+CONTROL";
        $num[2]="-";
        $num[3]=sizeof($data['deco']);
        $data['num_deco']=$num;
        $num[0]="MDWF";
        $num[1]="MODEM";
        $num[2]="-";
        $num[3]=sizeof($data['modem']);
        $data['num_modem']=$num;

        $datos=$this->PersonalModel->buscar_personal_datos($n);
        $data['nombre']=$datos->Nombre_personal." ".$datos->Ap_paterno_personal." ".$datos->Ap_materno_personal;
        $data['telf']=$datos->Telefono_2_personal;
        $data['cod']=$datos->Cod_asignacion;
        $data['cargo']=$datos->Nombre_cargo.": ".$datos->Descripcion;
        $data['regional']=$datos->Regional;
        $data['foto']=$datos->Foto_personal;
        $CABAVHDMI=$this->AlmacenModel->Material_instalacion($n,"CABAVHDMI");
        $CABAVRGC=$this->AlmacenModel->Material_instalacion($n,"CABAVRGC");
        $CNTINTRG6HFC=$this->AlmacenModel->Material_instalacion($n,"CNTINTRG6HFC");
        $CNTEXTRG6HFC=$this->AlmacenModel->Material_instalacion($n,"CNTEXTRG6HFC");
        $SPL12HFC=$this->AlmacenModel->Material_instalacion($n,"SPL12HFC");
        $SPL13HFC=$this->AlmacenModel->Material_instalacion($n,"SPL13HFC");
        $SCLHFC=$this->AlmacenModel->Material_instalacion($n,"SCLHFC");
        $FLTARC572BR=$this->AlmacenModel->Material_instalacion($n,"FLTARC572BR");
        $PCTHFC=$this->AlmacenModel->Material_instalacion($n,"PCTHFC");
        $GRP58HFC=$this->AlmacenModel->Material_instalacion($n,"GRP58HFC");
        $GRPCCTHFC=$this->AlmacenModel->Material_instalacion($n,"GRPCCTHFC");
        $PTLRMPHFC=$this->AlmacenModel->Material_instalacion($n,"PTLRMPHFC");
        $CCRG6CPHFC=$this->AlmacenModel->Material_instalacion($n,"CCRG6CPHFC");
        $CCRG6SPHFC=$this->AlmacenModel->Material_instalacion($n,"CCRG6SPHFC");
        $num[0]='CABAVHDMI';        $num[1]='CABLE HDMI';           $num[2]='-';        $num[3]=0;
        $data['n1']=$num;        
        $num[0]='CABAVRGC';         $num[1]='RCA';                  $num[2]='-';        $num[3]=0;
        $data['n2']=$num;
        $num[0]='CNTINTRG6HFC';     $num[1]='CONECTORES INTERNOS';  $num[2]='-';        $num[3]=0;
        $data['n3']=$num;
        $num[0]='CNTEXTRG6HFC';     $num[1]='CONECTORES EXTERNOS';  $num[2]='-';        $num[3]=0;
        $data['n4']=$num;
        $num[0]='SPL12HFC';         $num[1]='SPLITTER 1/2';        $num[2]='-';        $num[3]=0;
        $data['n5']=$num;
        $num[0]='SPL13HFC';         $num[1]='SPLITTER 1/3';        $num[2]='-';        $num[3]=0;
        $data['n6']=$num;
        $num[0]='SCLHFC';           $num[1]='CLAMP´S';        $num[2]='-';        $num[3]=0;
        $data['n7']=$num;
        $num[0]='FLTARC572BR';      $num[1]='FILTROS';        $num[2]='-';        $num[3]=0;
        $data['n8']=$num;
        $num[0]='PCTHFC';           $num[1]='PRECINTOS';      $num[2]='-';        $num[3]=0;
        $data['n9']=$num;
        $num[0]='GRP58HFC';         $num[1]='GRAP 5/8 Caja de 100 u.';        $num[2]='-';        $num[3]=0;
        $data['n10']=$num;
        $num[0]='GRPCCTHFC';        $num[1]='GRAP CONCRETO Bolsa 50 u.';      $num[2]='-';        $num[3]=0;
        $data['n11']=$num;
        $num[0]='PTLRMPHFC';        $num[1]='PITÓN L CON RAMPLUG';          $num[2]='-';        $num[3]=0; 
        $data['n12']=$num;
        $num[0]='CCRG6CPHFC';        $num[1]='Cable RG6 c/PORTANTE';        $num[2]='-';        $num[3]=0;
        $data['n13']=$num;
        $num[0]='CCRG6SPHFC';        $num[1]='Cable RG6 s/PORTANTE';        $num[2]='-';        $num[3]=0;
        $data['n14']=$num;

        foreach ($v5 as $row ) {
            switch ($row->Cod_item_per) {
                 case 'CABAVHDMI':
                    if($CABAVHDMI!=null) $resta=($row->suma)-($CABAVHDMI->suma1);                        
                    else $resta=$row->suma;
                    $num[0]=$row->Cod_item_per;                    $num[1]="CABLE HDMI";
                    $num[2]=$row->Fecha_ingreso;                   $num[3]=$resta;
                    $data['n1']=$num;
                    break;
                 case 'CABAVRGC':
                    if($CABAVRGC!=null) $resta=($row->suma)-($CABAVRGC->suma1);                        
                    else $resta=$row->suma;
                    $num[0]=$row->Cod_item_per;                    $num[1]="RCA";
                    $num[2]=$row->Fecha_ingreso;                   $num[3]=$resta;
                    $data['n2']=$num;
                    break;
                 case 'CNTINTRG6HFC':
                    if($CNTINTRG6HFC!=null) $resta=($row->suma)-($CNTINTRG6HFC->suma1);               
                    else $resta=$row->suma;
                    $num[0]=$row->Cod_item_per;                    $num[1]="CONECTORES INTERNOS";
                    $num[2]=$row->Fecha_ingreso;                   $num[3]=$resta;
                    $data['n3']=$num;
                    break;
                 case 'CNTEXTRG6HFC':
                    if($CNTEXTRG6HFC!=null) $resta=($row->suma)-($CNTEXTRG6HFC->suma1);                        
                    else $resta=$row->suma;
                    $num[0]=$row->Cod_item_per;                    $num[1]="CONECTORES EXTERNOS";
                    $num[2]=$row->Fecha_ingreso;                   $num[3]=$resta;
                    $data['n4']=$num;
                    break;
                case 'SPL12HFC':
                    if($SPL12HFC!=null) $resta=($row->suma)-($SPL12HFC->suma1);                        
                    else $resta=$row->suma;
                    $num[0]=$row->Cod_item_per;                    $num[1]="SPLITTER 1/2";
                    $num[2]=$row->Fecha_ingreso;                   $num[3]=$resta;

                    $data['n5']=$num;
                    /*echo json_encode($data);
                    exit();*/
                    break;
                case 'SPL13HFC':
                    if($SPL13HFC!=null) $resta=($row->suma)-($SPL13HFC->suma1);                        
                    else $resta=$row->suma;
                    $num[0]=$row->Cod_item_per;                    $num[1]="SPLITTER 1/3";
                    $num[2]=$row->Fecha_ingreso;                   $num[3]=$resta;
                    $data['n6']=$num;
                    break;
                case 'SCLHFC':
                    if($SCLHFC!=null) $resta=($row->suma)-($SCLHFC->suma1);                        
                    else $resta=$row->suma;
                    $num[0]=$row->Cod_item_per;                    $num[1]="CLAMP´S";
                    $num[2]=$row->Fecha_ingreso;                   $num[3]=$resta;
                    $data['n7']=$num;
                    break;
                case 'FLTARC572BR':
                    if($FLTARC572BR!=null) $resta=($row->suma)-($FLTARC572BR->suma1);                        
                    else $resta=$row->suma;
                    $num[0]=$row->Cod_item_per;                    $num[1]="FILTROS";
                    $num[2]=$row->Fecha_ingreso;                   $num[3]=$resta;
                    $data['n8']=$num;
                    break;
                case 'PCTHFC':
                    if($PCTHFC!=null) $resta=($row->suma)-($PCTHFC->suma1);                        
                    else $resta=$row->suma;
                    $num[0]=$row->Cod_item_per;                    $num[1]="PRECINTOS";
                    $num[2]=$row->Fecha_ingreso;                   $num[3]=$resta;
                    $data['n9']=$num;
                    break;
                case 'GRP58HFC':
                    if($GRP58HFC!=null) $resta=($row->suma)-($GRP58HFC->suma1);                        
                    else $resta=$row->suma;
                    $num[0]=$row->Cod_item_per;                    $num[1]="GRAP 5/8 Caja de 100 u.";
                    $num[2]=$row->Fecha_ingreso;                   $num[3]=$resta;
                    $data['n10']=$num;
                    break;
                case 'GRPCCTHFC':
                    if($GRPCCTHFC!=null) $resta=($row->suma)-($GRPCCTHFC->suma1);                        
                    else $resta=$row->suma;
                    $num[0]=$row->Cod_item_per;                    $num[1]="GRAP CONCRETO Bolsa 50 u.";
                    $num[2]=$row->Fecha_ingreso;                   $num[3]=$resta;
                    $data['n11']=$num;
                    break;
                case 'PTLRMPHFC':
                    if($PTLRMPHFC!=null) $resta=($row->suma)-($PTLRMPHFC->suma1);                        
                    else $resta=$row->suma;
                    $num[0]=$row->Cod_item_per;                    $num[1]="PITÓN L CON RAMPLUG";
                    $num[2]=$row->Fecha_ingreso;                   $num[3]=$resta;
                    $data['n12']=$num;
                    break;
                case 'CCRG6CPHFC':
                    if($CCRG6CPHFC!=null) $resta=($row->suma)-($CCRG6CPHFC->suma1);                        
                    else $resta=$row->suma;
                    $num[0]=$row->Cod_item_per;                    $num[1]="Cable RG6 c/PORTANTE";
                    $num[2]=$row->Fecha_ingreso;                   $num[3]=$resta;
                    $data['n13']=$num;
                    break;
                case 'CCRG6SPHFC':
                    if($CCRG6SPHFC!=null) $resta=($row->suma)-($CCRG6SPHFC->suma1);                        
                    else $resta=$row->suma;
                    $num[0]=$row->Cod_item_per;                    $num[1]="Cable RG6 s/PORTANTE";
                    $num[2]=$row->Fecha_ingreso;                   $num[3]=$resta;
                    $data['n14']=$num;
                    break;
            }
        }
       /*echo json_encode($data);
        exit();*/
        $data['hoy'] = date("d-m-Y"); 
        if($n2[1]==2)  $this->load->view('Materiales_a/Listar_material_tec',$data,FALSE);
        if($n2[1]==1) 
        {
            $this->session->set_flashdata('imprimir', $data);
            redirect('Almacen/imprimir','refresh');
        }
        if ($n2[1]==3) {
            $data['id']=$n;
            
            $nombre=$this->session->nombres;
            $apellido=$this->session->apellidos;
            $id_e=$this->AlmacenModel->entrega($nombre);
            //REGION A LA QUE PERTENECE
            $regional=$id_e->Regional; 
            $next1=$this->AlmacenModel->numero($regional);
            $id_tigo=2;
            if ($regional=='LA PAZ') {
                $id_interno=1;
            }           
            $data['numero']=($next1->maximo)+1; 
            $data['v4'] = $this->AlmacenModel->ListarMaterialUnidad($id_tigo);
            $data['v3'] = $this->AlmacenModel->ListarMaterialUnidad($id_interno);
            $data['v2'] = $this->AlmacenModel->ListarMaterialGrupo($regional);
            $this->load->view('Materiales_a/adicion_material_tec1',$data);
        }
    }
    public function entregar($num1,$num2)
    {
        $c=$num1-$num2;
        if($c<0) $c=0;
        return $c;
    }
    public function RegistrarDatosAdicion()
    {
        $this->very_session();
        //NOMBRE DEL QUE ENTREGA
        $nombre=$this->session->nombres;
        $apellido=$this->session->apellidos;
        $id_e=$this->AlmacenModel->entrega($nombre);
        //REGION A LA QUE PERTENECE
        $regional=$id_e->Regional;
        $prov1=1;
        $prov2=2;
        //ID DEL QUE ENTREGA
        $id_e1=$id_e->id;
        // REGISTRAR NÚMERO DE ENTREGA CORRELATIVO
        $next1=$this->AlmacenModel->numero($regional);
        $next2=($next1->maximo)+1;         
        //DATOS DEL FORMULARIO;
        // datos técnico
        $ity1=$this->input->post('tecnico');
        $ity = explode("-", $ity1);
        $data['id_p']=$ity[0];
        //ID DEL TECNICO
        $id_p=$ity[0];
        $id1=intval($id_p);
        $num=intval($next2);;
        $numero_anterior=$this->AlmacenModel->numero_anterior($id1);
        $num_a=$numero_anterior->maximo;
        $mat_a=$this->AlmacenModel->material_anterior($num_a,$id1,$regional);
        if($id_p>=1){
            $t=0;
            $mal[$t]=0;
            $data['ni']=$next2;
            $data['personal']=$ity[1];
            $data['almacen1']=$nombre;
            $data['almacen2']=$apellido;
            $data['hoy'] = date("d-M-Y"); 
            $data['lugar'] =$regional;
            $comentario=$this->input->post('comentarios');
            $data['comentario'] = $comentario;
            //ALMACENANDO DATOS
             //CANTIDAD DEL RESTO DEL MATERIAL RCA
            $mat1=$this->input->post('num5');
            $cod_i="CABAVRGC";
            $num12=$this->validar($mat1,$cod_i,$prov2,$regional);
            $saldo=$this->input->post('num52');
            $num1=$this->entregar($num12,$saldo);
            $ant1=$this->asignar_anterior($mat_a,$cod_i,$saldo);
            $ant2=$saldo."-".$ant1;
            //REGISTRAR EN LA BASE DE DATOS
            $this->registro_a($num,$cod_i,$num1,$regional,$comentario,$id1,$ant2,$id_e1);
            $data['num1']=$num1;
            $data['num2']=$saldo;
            $data['m1']=$ant1;
            $data['s1']=$num1+$saldo;
            //conectores internos
            $mat1=$this->input->post('num7');
            $cod_i="CNTINTRG6HFC";
            $num12=$this->validar($mat1,$cod_i,$prov2,$regional);
            $saldo=$this->input->post('num53');
            $num1=$this->entregar($num12,$saldo);
            $ant1=$this->asignar_anterior($mat_a,$cod_i,$saldo);
            $ant2=$saldo."-".$ant1;
            //REGISTRAR EN LA BASE DE DATOS
            $this->registro_a($num,$cod_i,$num1,$regional,$comentario,$id1,$ant2,$id_e1);
            $data['num3']=$num1;
            $data['num4']=$saldo;
            $data['m2']=$ant1;
            $data['s2']=$num1+$saldo;
            //conectores externos
            $mat1=$this->input->post('num9');
            $cod_i="CNTEXTRG6HFC";
            $num12=$this->validar($mat1,$cod_i,$prov2,$regional);
            $saldo=$this->input->post('num54');
            $num1=$this->entregar($num12,$saldo);
            $ant1=$this->asignar_anterior($mat_a,$cod_i,$saldo);
            $ant2=$saldo."-".$ant1;
            //REGISTRAR EN LA BASE DE DATOS
            $this->registro_a($num,$cod_i,$num1,$regional,$comentario,$id1,$ant2,$id_e1);
            $data['num5']=$num1;
            $data['num6']=$saldo;
            $data['m3']=$ant1;
            $data['s3']=$num1+$saldo;

            //spliter 1/2
            $mat1=$this->input->post('num11');
            $cod_i="SPL12HFC";
            $num12=$this->validar($mat1,$cod_i,$prov2,$regional);
            $saldo=$this->input->post('num55');
            $num1=$this->entregar($num12,$saldo);
            $ant1=$this->asignar_anterior($mat_a,$cod_i,$saldo);
            $ant2=$saldo."-".$ant1;
            //REGISTRAR EN LA BASE DE DATOS
            $this->registro_a($num,$cod_i,$num1,$regional,$comentario,$id1,$ant2,$id_e1);
            $data['num7']=$num1;
            $data['num8']=$saldo;
            $data['m4']=$ant1;
            $data['s4']=$num1+$saldo;
            //spliter 1/3
            $mat1=$this->input->post('num13');
            $cod_i="SPL13HFC";
            $num12=$this->validar($mat1,$cod_i,$prov2,$regional);
            $saldo=$this->input->post('num56');
            $num1=$this->entregar($num12,$saldo);
            $ant1=$this->asignar_anterior($mat_a,$cod_i,$saldo); $ant2=$saldo."-".$ant1;
            //REGISTRAR EN LA BASE DE DATOS
            $this->registro_a($num,$cod_i,$num1,$regional,$comentario,$id1,$ant2,$id_e1);
            $data['num9']=$num1;
            $data['num10']=$saldo;
            $data['m5']=$ant1;
            $data['s5']=$num1+$saldo;

            //clamp
            $mat1=$this->input->post('num15');
            $cod_i="SCLHFC";
            $num12=$this->validar($mat1,$cod_i,$prov2,$regional);
            $saldo=$this->input->post('num57');
            $num1=$this->entregar($num12,$saldo);
            $ant1=$this->asignar_anterior($mat_a,$cod_i,$saldo);
            $ant2=$saldo."-".$ant1;
            //REGISTRAR EN LA BASE DE DATOS
            $this->registro_a($num,$cod_i,$num1,$regional,$comentario,$id1,$ant2,$id_e1);
            $data['num11']=$num1;
            $data['num12']=$saldo;
            $data['m6']=$ant1;
            $data['s6']=$num1+$saldo;

            //filtros
            $mat1=$this->input->post('num17');
            $cod_i="FLTARC572BR";
            $num12=$this->validar($mat1,$cod_i,$prov2,$regional);
            $saldo=$this->input->post('num58');
            $num1=$this->entregar($num12,$saldo);
            $ant1=$this->asignar_anterior($mat_a,$cod_i,$saldo);
            $ant2=$saldo."-".$ant1;
            //REGISTRAR EN LA BASE DE DATOS
            $this->registro_a($num,$cod_i,$num1,$regional,$comentario,$id1,$ant2,$id_e1);
            $data['num21']=$num1;
            $data['num22']=$saldo;
            $data['m7']=$ant1;
            $data['s7']=$num1+$saldo;

            //precinto
            $mat1=$this->input->post('num19');
            $cod_i="PCTHFC";
            $num12=$this->validar($mat1,$cod_i,$prov1,$regional);
            $saldo=$this->input->post('num59');
            $num1=$this->entregar($num12,$saldo);
            $ant1=$this->asignar_anterior($mat_a,$cod_i,$saldo);
            $ant2=$saldo."-".$ant1;
            //REGISTRAR EN LA BASE DE DATOS
            $this->registro_a($num,$cod_i,$num1,$regional,$comentario,$id1,$ant2,$id_e1);
            $data['num13']=$num1;
            $data['num14']=$saldo;
            $data['m8']=$ant1;
            $data['s8']=$num1+$saldo;

            // GRAPAS 5/8
            $mat1=$this->input->post('num21');
            $cod_i="GRP58HFC";
            $num12=$this->validar($mat1,$cod_i,$prov1,$regional);
            $saldo=$this->input->post('num60');
            $num1=$this->entregar($num12,$saldo);
            $ant1=$this->asignar_anterior($mat_a,$cod_i,$saldo);
            $ant2=$saldo."-".$ant1;
            //REGISTRAR EN LA BASE DE DATOS
            $this->registro_a($num,$cod_i,$num1,$regional,$comentario,$id1,$ant2,$id_e1);
            $data['num15']=$num1;
            $data['num16']=$saldo;
            $data['m9']=$ant1;
            $data['s9']=$num1+$saldo;

            //GRAPAS CONCRETO
            $mat1=$this->input->post('num23');
            $cod_i="GRPCCTHFC";
            $num12=$this->validar($mat1,$cod_i,$prov1,$regional);
            $saldo=$this->input->post('num61');
            $num1=$this->entregar($num12,$saldo);
            $ant1=$this->asignar_anterior($mat_a,$cod_i,$saldo);
            $ant2=$saldo."-".$ant1;
            //REGISTRAR EN LA BASE DE DATOS
            $this->registro_a($num,$cod_i,$num1,$regional,$comentario,$id1,$ant2,$id_e1);
            $data['num17']=$num1;
            $data['num18']=$saldo;
            $data['m10']=$ant1;
            $data['s10']=$num1+$saldo;
            //CINTA AISLANTE
            $mat1=$this->input->post('num25');
            $cod_i="CTASHFC";
            $num1=$this->validar($mat1,$cod_i,$prov1,$regional);
            //REGISTRAR EN LA BASE DE DATOS
            $this->registro_a($num,$cod_i,$num1,$regional,$comentario,$id1,0,$id_e1);
            $data['num19']=$num1;
            $data['num20']=0;
            //AUTO SOLD
             $mat1=$this->input->post('num27');
            $cod_i="VLTHFC";
            $num1=$this->validar($mat1,$cod_i,$prov1,$regional);
            //REGISTRAR EN LA BASE DE DATOS
            $this->registro_a($num,$cod_i,$num1,$regional,$comentario,$id1,0,$id_e1);
            $data['num23']=$num1;
            $data['num24']=0;
            //CABLE HDMI
            $mat1=$this->input->post('num29');
            $cod_i="CABAVHDMI";
            $num12=$this->validar($mat1,$cod_i,$prov2,$regional);
            $saldo=$this->input->post('num62');
            $num1=$this->entregar($num12,$saldo);
            $ant1=$this->asignar_anterior($mat_a,$cod_i,$saldo);
            $ant2=$saldo."-".$ant1;
            //REGISTRAR EN LA BASE DE DATOS
            $this->registro_a($num,$cod_i,$num1,$regional,$comentario,$id1,$ant2,$id_e1);
            $data['num25']=$num1;
            $data['num26']=$saldo;
            $data['m11']=$ant1;
            $data['s11']=$num1+$saldo;
            //PITON
            $mat1=$this->input->post('num31');
            $cod_i="PTLRMPHFC";
            $num12=$this->validar($mat1,$cod_i,$prov1,$regional);
            $saldo=$this->input->post('num63');
            $num1=$this->entregar($num12,$saldo);
            $ant1=$this->asignar_anterior($mat_a,$cod_i,$saldo);
            $ant2=$saldo."-".$ant1;
            //REGISTRAR EN LA BASE DE DATOS
            $this->registro_a($num,$cod_i,$num1,$regional,$comentario,$id1,$ant2,$id_e1);
            $data['num27']=$num1;
            $data['num28']=$saldo;
            $data['m12']=$ant1;
            $data['s12']=$num1+$saldo;

            /*$data['s13']=$this->AlmacenModel->Material_tecnico2($id1,'DCODCON');
            $data['s14']=$this->AlmacenModel->Material_tecnico2($id1,'MDWF');
            $data['s15']=$this->AlmacenModel->Material_tecnico2($id1,'CCRG6CPHFC');
            $data['s16']=$this->AlmacenModel->Material_tecnico2($id1,'CCRG6SPHFC');*/

            $h1['deco5']=$this->AlmacenModel->Material_tecnico2($id1,'DCODCON');
            $h2['modem5']=$this->AlmacenModel->Material_tecnico2($id1,'MDWF');
            $h3['carreta15']=$this->AlmacenModel->Material_tecnico2($id1,'CCRG6CPHFC');
            $h4['carreta25']=$this->AlmacenModel->Material_tecnico2($id1,'CCRG6SPHFC');


            $size1=sizeof($h1['deco5']);
            $data['s13']=$size1;
            $size2=sizeof($h2['modem5']);
            $data['s14']=$size2;


            for ($i=1; $i <=25 ; $i++) { 
                $serie=$this->input->post('deco'.$i);

                //VALIDACION DE EXISTENCIA DEL PRODUCTO EN LA BASE DE DATOS
                $ser1=$this->AlmacenModel->BuscarDeco($serie);
                if ($ser1!="" or $ser1!=null)
                {
                    $ser2=$ser1->SERIAL;
                    $ser3=$ser1->CHIP_ID;
                    $id_prod=$ser1->Id_producto;
                    $cod_item=$ser1->codigo;
                    if($cod_item =='CCRG6CPHFC' or $cod_item=='CCRG6SPHFC')  $cant=305;
                    else $cant=1;
                }
                else{
                    if($serie!=""){
                        $ser2="PROBLEMAS";
                        $mal[$t]=$serie;
                        $t++;
                    }
                }
                if($serie!="" and ($ser1!="" or $ser1!=null))
                {
                    $dataEntrega = array(
                        "Numero_entrega" => $num,
                        "Cod_item_per"=>$cod_item,
                        "SERIAL"=>$ser2,
                        "SERIAL_OTRO"=>$ser3,
                        "Cantidad"=>$cant,
                        "Regional"=>$regional,
                        "Observacion"=>$comentario,
                        "Id_asignacion_prod_p"=>$id1,
                        "Id_almacen"=>$id_e1
                    );
                    //echo json_encode($dataEntrega);
                    $this->AlmacenModel->guardar_entrega1($dataEntrega);
                    $dataBaja = array(
                        "Id_estado_prod_e"=>3
                        );
                    $this->AlmacenModel->baja_serie($id_prod,$dataBaja);
                    //echo json_encode($dataBaja);
                } 
            }

            //CANTIDAD Y CÓDIGOS DE DECO, MODEMS Y CARRETAS
            $data['deco'] = $this->AlmacenModel->ListarProductosPersonal($num,$id1,'DCODCON');
            $data['num_deco']=sizeof($data['deco']);
            $data['modem'] = $this->AlmacenModel->ListarProductosPersonal($num,$id1,'MDWF');
            $data['num_modem']=sizeof($data['modem']);
            $data['carreta_i'] = $this->AlmacenModel->ListarProductosPersonal($num,$id1,'CCRG6CPHFC');
            $data['num_carreta']=sizeof($data['carreta_i']);
            $data['carreta_e'] = $this->AlmacenModel->ListarProductosPersonal($num,$id1,'CCRG6SPHFC');
            $data['num_carreta_e']=sizeof($data['carreta_e']);
            $data['t_deco']=sizeof($data['deco'])+$size1;
            $data['t_modem']=sizeof($data['modem'])+$size2;

            $hora0=$this->AlmacenModel->HoraForm1($num);           
            $hora1=$hora0->hora;
            if($hora1==null){
                echo '<script language="javascript">alert("Ningún registro");</script>';
                redirect('Almacen/error_registro','refresh');
            }
            else{
                $hora2 = explode(" ", $hora1);
                $data['hora']=$hora2[1];        
                //mandar los datos para imprimir');
                echo '<script language="javascript">
                        alert("DATOS REGISTRADOS CON ÉXITO ");
                    </script>'; 
                $this->session->set_flashdata('registro', $data);
                redirect('Almacen/registro_exitoso_adicion','refresh');
             }
        }
        else
        {
            echo '<script language="javascript">alert("ERROR");</script>';
            /*$this->load->view('frontend/head'); 
            $this->load->view('frontend/footer');
            //redirect('Almacen/ListarMaterialT');*/

        }
    }
    public function registro_a($num,$cod_i,$num1,$regional,$comentario,$id1,$anterior,$id_a)
    {
        $this->very_session();
        if($num1>0){
            $dataRegistro = array(
                        "Numero_entrega" => $num,
                        "Cod_item_per"=>$cod_i,
                        "SERIAL"=>$cod_i,
                        "Cantidad"=>$num1,
                        "Anterior"=>$anterior,
                        "Regional"=>$regional,
                        "Observacion"=>$comentario,
                        "Id_asignacion_prod_p"=>$id1,
                        "Id_almacen"=>$id_a
                    );
                    $this->AlmacenModel->guardar_entrega1($dataRegistro);
                    //echo json_encode($dataRegistro);
        }
    }
     public function asignar_anterior($mat,$cod,$saldo)
    {
        
        $this->very_session();
        $num3=0;
        if ($mat!="" and $mat>0) {
            foreach ($mat as $row) { 

                if ($row->Cod_item_per==$cod){
                    $num3=$row->suma_a-$saldo;
                    break;
                }
            }
        }
        return $num3;
    }
    public function imprimir()
    {
        $this->very_session();
        $data= $this->session->flashdata('imprimir');
        $this->load->view('frontend/head');
        $this->load->view('Materiales_a/material_imprimir',$data,FALSE);
       // $this->load->view('Almacenes/prueba_modal',$data, FALSE);
        $this->load->view('frontend/footer');
    }
}