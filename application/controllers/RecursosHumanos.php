<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RecursosHumanos extends CI_Controller {

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
    //****************************************************PERSONAL INTERNO******************************************
    public function ListarPersonal()
	{
        $this->very_session();
        $nombre=$this->session->nombres;
        $id_e=$this->AlmacenModel->entrega($nombre);
        //REGION A LA QUE PERTENECE
        $regional=$id_e->Regional;
		$data['v4'] = $this->PersonalModel->ListarPersonal(1,2,$regional);
		$data['v1'] ="GERENCIA"; 
		$this->load->view('frontend/head');
		$this->load->view('Personal/listarRegistroPersonal', $data,FALSE);
		$this->load->view('frontend/footer');
	}
    public function ListarPersonalA()
    {
        $this->very_session();
        $nombre=$this->session->nombres;
        $id_e=$this->AlmacenModel->entrega($nombre);
        //REGION A LA QUE PERTENECE
        $regional=$id_e->Regional;
        $data['v4'] = $this->PersonalModel->ListarPersonal(5,5,$regional);
        $data['v1'] ="ALMACÉN"; 
        $this->load->view('frontend/head');
        $this->load->view('Personal/listarRegistroPersonal', $data,FALSE);
        $this->load->view('frontend/footer');
    }
	public function ListarPersonalO()
	{
        $this->very_session();
        $data['v4'] = $this->PersonalModel->ListarPersonalTodo(3,3);
		$data['v1'] = "OPERATIVO"; 
		$this->load->view('frontend/head');
		$this->load->view('Personal/listarRegistroPersonal', $data, FALSE);
		$this->load->view('frontend/footer');
	}
	public function ListarPersonalT()
	{
        $this->very_session();
        $data['v4'] = $this->PersonalModel->ListarPersonalTodo(10,12);
		$data['v1'] ="TÉCNICO"; 
		$this->load->view('frontend/head');
		$this->load->view('Personal/listarRegistroPersonal', $data, FALSE);
		$this->load->view('frontend/footer');
	}
	public function ListarPersonalB()
	{
		$this->very_session();
        $data['v4'] = $this->PersonalModel->ListarPersonalTodo(4,4);
		$data['v1'] ="BACK OFFICE"; 
		$this->load->view('frontend/head');
		$this->load->view('Personal/listarRegistroPersonal', $data, FALSE);
		$this->load->view('frontend/footer');
	}

    public function ListarPersonalE()
    {
        $this->very_session();
        $data['v4'] = $this->PersonalModel->ListarPersonalTodo(13,13);
        $data['v1'] ="EDIFICIOS (Instalaciones en edificios y otros)"; 
        $this->load->view('frontend/head');
        $this->load->view('Personal/listarRegistroPersonal', $data, FALSE);
        $this->load->view('frontend/footer');
    }
	public function mostrar_f_nuevo_personal()
    {
        $this->very_session();
        $data['v5'] = $this->PersonalModel->ListarCargos();
        $data['v6'] = $this->AlmacenModel->ListarProveedorTodo();
        $this->load->view('Personal/nuevo_registro_personal',$data, FALSE);
    }
    public function RegistrarDatosNuevoPersonal()
    {
    	$this->very_session();
    	$nombre=strtoupper($this->input->post('nombre'));
    	$paterno=strtoupper($this->input->post('paterno'));
    	$materno=strtoupper($this->input->post('materno'));
    	$ci=$this->input->post('ci');
    	$expedido=$this->input->post('expedido');
    	$direccion=strtoupper($this->input->post('direccion'));
    	$genero=$this->input->post('genero');
    	$fecha_nac=$this->formato($this->input->post('fecha_nac'));    	
    	$civil=$this->input->post('estado_civil');
    	$telf=$this->input->post('telefono');
    	$cel=$this->input->post('celular');
    	$ref1=$this->input->post('cel_ref1');
    	$ref2=$this->input->post('cel_ref2');
    	$n_ref1=strtoupper($this->input->post('ref1'));
    	$n_ref2=strtoupper($this->input->post('ref2'));
    	$incorporacion=$this->formato($this->input->post('fecha_inc'));
    	$hijos=$this->input->post('num_hijos');
    	$felcc=$curri=$croquis=$luz=$agua=$lic=$psico="1";
    	if(!isset($_POST['check1'])){
			$felcc="0";
		}
		if(!isset($_POST['check2'])){
			$curri="0";
		}
		if(!isset($_POST['check3'])){
			$croquis="0";
		}
		if(!isset($_POST['check4'])){
			$luz="0";
		}
		if(!isset($_POST['check5'])){
			$agua="0";
		}
		if(!isset($_POST['check6'])){
			$lic="0";
		}
		if(!isset($_POST['check7'])){
			$psico="0";
		}
		$ob1=strtoupper($this->input->post('obs'));
		$ob2=strtoupper($this->input->post('obs1'));
		//IMAGEN
		$config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 1000*1000;
        $config['max_width']            = 1024;
        $config['max_height']           = 1024;
        $this->load->library('upload', $config);
            //$this->upl oad->initialize($config);
        $error="";
      if ( ! $this->upload->do_upload('paciente_image'))
        {
                $error = array('error' => $this->upload->display_errors());
                //echo json_encode($error);
        }
        else
        {
              $data = array('upload_data' => $this->upload->data());
        }

        $filename = $this->upload->data('file_name');


    	$dataPersonal = array(
                        "Nombre_personal" => $nombre,
                        "Ap_paterno_personal"=>$paterno,
                        "Ap_materno_personal"=>$materno,
                        "Ci"=>$ci,
                        "Expedicion_ci_personal"=>$expedido,
                        "Genero"=>$genero,
                        "Fecha_nacimiento_personal"=>$fecha_nac,
                        "Fecha_incorporacion"=>$incorporacion,
                        "Telefono_1_personal"=>$telf,
                        "Telefono_2_personal"=>$cel,
                        "Telefono_3_personal"=>$ref1,
                        "Telefono_4_personal"=>$ref2,
                        "Referencia_1_personal"=>$n_ref1,
                        "Referencia_2_personal"=>$n_ref2,
                        "Direccion_dom_personal"=>$direccion,
                        "Estado_civil_personal"=>$civil,
                        "Numero_hijos_personal"=>$hijos,
                        "Observacion_1_personal"=>$ob1,
                        "Observacion_2_personal"=>$ob2,
                        "Felcc"=>$felcc,
                        "Curriculum_personal"=>$curri,
                        "Croquis_personal"=>$croquis,
                        "Fac_luz_personal"=>$luz,
                        "Fac_agua_personal"=>$agua,
                        "Licencia_conducir"=>$lic,
                        "Prueba_psic"=>$psico,  
                        "Foto_personal" => $filename,
                    );
        $this->PersonalModel->guardar_personal($dataPersonal);
        //ASIGNACIÓN DE CARGO
        $id_e=$this->AlmacenModel->entrega1($nombre);
        $id_per=$id_e->id;
        $ity0=$this->input->post('cargo');
        $ity = explode("-", $ity0);
        $id_cargo=$ity[0];
        //ASIGNAR CÓDIGO
        $cod_1=$this->PersonalModel->Cod_asignacion();
        $a=$cod_1[0]->co;
       // echo $a;
        foreach ($cod_1 as $row) {
            $b=$row->co;
            echo $b." ";
            if($a<$b){
                $a=$b;
            }
        }
        if ($cod_1==null) {
            $codigo="TLP-1";
        }
        else{
	        $cod1="TLP";
	        $cod2=$a;
	        $cod2=$cod2+1;
	        $codigo=$cod1."-".$cod2;
        }
        //PROVEEDOR
        $ity0=$this->input->post('proveedor');
        $ity = explode("-", $ity0);
        $id_prov=$ity[0];
        $desc=ucwords(strtolower($this->input->post('desc')));
        $region=$this->input->post('regional');
        $dataAsignacion = array(
                        "Cod_asignacion" => $codigo,
                        "Descripcion"=>$desc,
                        "Fecha_ingreso"=>$incorporacion,
                        "Regional"=>$region,
                        "Id_proveedor_a"=>$id_prov,
                        "Id_personal_a"=>$id_per,
                        "Id_cargo_a"=>$id_cargo
                    );
        /*echo json_encode($dataPersonal);
        echo json_encode($dataAsignacion);
        exit();*/
         $this->PersonalModel->guardar_asig_turno($dataAsignacion);
         echo '<script language="javascript">
                        alert("DATOS REGISTRADOS CON ÉXITO ");
                    </script>';
        $this->listar($id_cargo); 
    }
    public function EditarPersonal()
    {
        $this->very_session();
        $n = $this->input->get('id');
        $data['v4']=$this->PersonalModel->buscar_personal_datos($n);
        $data['v5'] = $this->PersonalModel->ListarCargos();
        $data['v6'] = $this->AlmacenModel->ListarProveedorTodo();
        $this->load->view('Personal/editar_registro_personal',$data, FALSE);
    }
    public function GuardarEdicionDatosPersonal()
    {
        $this->very_session();
        $id=$this->input->post('Id_personal');
        $nombre=strtoupper($this->input->post('nombre'));
        $paterno=strtoupper($this->input->post('paterno'));
        $materno=strtoupper($this->input->post('materno'));
        $ci=$this->input->post('ci');
        $expedido=$this->input->post('expedido');
        $direccion=strtoupper($this->input->post('direccion'));
        $genero=$this->input->post('genero');
        $fecha_nac=$this->formato($this->input->post('fecha_nac'));     
        $civil=$this->input->post('estado_civil');
        $telf=$this->input->post('telefono');
        $cel=$this->input->post('celular');
        $ref1=$this->input->post('cel_ref1');
        $ref2=$this->input->post('cel_ref2');
        $n_ref1=strtoupper($this->input->post('ref1'));
        $n_ref2=strtoupper($this->input->post('ref2'));
        $incorporacion=$this->formato($this->input->post('fecha_inc'));
        $hijos=$this->input->post('num_hijos');
        $felcc=$curri=$croquis=$luz=$agua=$lic=$psico="1";
        if(!isset($_POST['check1'])){
            $felcc="0";
        }
        if(!isset($_POST['check2'])){
            $curri="0";
        }
        if(!isset($_POST['check3'])){
            $croquis="0";
        }
        if(!isset($_POST['check4'])){
            $luz="0";
        }
        if(!isset($_POST['check5'])){
            $agua="0";
        }
        if(!isset($_POST['check6'])){
            $lic="0";
        }
        if(!isset($_POST['check7'])){
            $psico="0";
        }
        $ob1=strtoupper($this->input->post('obs'));
        $ob2=strtoupper($this->input->post('obs1'));
        $filename=$this->input->post('foto');
        if ($filename==null) {
            //IMAGEN
                $config['upload_path']          = './uploads/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 1000*1000;
                $config['max_width']            = 1024;
                $config['max_height']           = 1024;
                $this->load->library('upload', $config);
                    //$this->upl oad->initialize($config);
                $error="";
              if ( ! $this->upload->do_upload('paciente_image'))
                {
                        $error = array('error' => $this->upload->display_errors());
                        //echo json_encode($error);
                }
                else
                {
                      $data = array('upload_data' => $this->upload->data());
                }
                $filename = $this->upload->data('file_name');     
        }        
        $dataPersonal = array(
                        "Nombre_personal" => $nombre,
                        "Ap_paterno_personal"=>$paterno,
                        "Ap_materno_personal"=>$materno,
                        "Ci"=>$ci,
                        "Expedicion_ci_personal"=>$expedido,
                        "Genero"=>$genero,
                        "Fecha_nacimiento_personal"=>$fecha_nac,
                        "Fecha_incorporacion"=>$incorporacion,
                        "Telefono_1_personal"=>$telf,
                        "Telefono_2_personal"=>$cel,
                        "Telefono_3_personal"=>$ref1,
                        "Telefono_4_personal"=>$ref2,
                        "Referencia_1_personal"=>$n_ref1,
                        "Referencia_2_personal"=>$n_ref2,
                        "Direccion_dom_personal"=>$direccion,
                        "Estado_civil_personal"=>$civil,
                        "Numero_hijos_personal"=>$hijos,
                        "Observacion_1_personal"=>$ob1,
                        "Observacion_2_personal"=>$ob2,
                        "Felcc"=>$felcc,
                        "Curriculum_personal"=>$curri,
                        "Croquis_personal"=>$croquis,
                        "Fac_luz_personal"=>$luz,
                        "Fac_agua_personal"=>$agua,
                        "Licencia_conducir"=>$lic,
                        "Prueba_psic"=>$psico,  
                        "Foto_personal" => $filename,
                    );

        $this->PersonalModel->editar_personal($id,$dataPersonal);
        //ASIGNACIÓN DE CARGO
        $id_e=$this->AlmacenModel->entrega1($nombre);
        $id_per=$id_e->id;
        $ity0=$this->input->post('cargo');
        $ity = explode("-", $ity0);
        $id_cargo=$ity[0];
        //ASIGNAR CÓDIGO
        //PROVEEDOR
        $id_a=$this->input->post('Id_asignacion');
        $ity0=$this->input->post('proveedor');
        $ity = explode("-", $ity0);
        $id_prov=$ity[0];
        $desc=ucwords(strtolower($this->input->post('desc')));
        $region=$this->input->post('regional');
        $dataAsignacion = array(
                        "Descripcion"=>$desc,
                        "Fecha_ingreso"=>$incorporacion,
                        "Regional"=>$region,
                        "Id_proveedor_a"=>$id_prov,
                        "Id_personal_a"=>$id,
                        "Id_cargo_a"=>$id_cargo
                    );
        $this->PersonalModel->editar_asig_turno($id_a,$dataAsignacion);
         echo '<script language="javascript">
                        alert("DATOS REGISTRADOS CON ÉXITO ");
                    </script>';
        $this->listar($id_cargo); 
    }
    public function EditarBajaPersonal()
    {
        $n = $this->input->get('id');
        $data['v4'] = $this->PersonalModel->buscar_personal_datos($n);
        $data['v5'] = $this->PersonalModel->ListarCargos();
        $data['v6'] = $this->AlmacenModel->ListarProveedorTodo();
        $this->load->view('Personal/eliminar_personal',$data, FALSE);
    }
    public function BajaPersonal()
    {
        $this->very_session();
        $id=$this->input->post('Id_personal');
        $id_a=$this->input->post('Id_asignacion');
        $dataPersonal = array(
                        "Id_estado_personal"=>2
                    );
       $this->PersonalModel->editar_personal($id,$dataPersonal);
        $dataAsignacion = array(
                        "Id_estado_a"=>2
                    );
        $this->PersonalModel->editar_asig_turno($id_a,$dataAsignacion);
        $id_cargo=$this->input->post('cargo');
         echo '<script language="javascript">
                        alert("DATOS ELIMINADOS CON ÉXITO ");
                    </script>';
        $this->listar($id_cargo); 

    }
    public function listar($id_cargo)
    {
            switch ($id_cargo) {
               case 1:
                     redirect('RecursosHumanos/ListarPersonal','refresh');
                     break; 
               case 2:
                     redirect('RecursosHumanos/ListarPersonal','refresh');
                     break;
               case 3:
                     redirect('RecursosHumanos/ListarPersonalO','refresh');
                     break;
               case 4:
                     redirect('RecursosHumanos/ListarPersonalB','refresh');
                     break;
               case 10:
                     redirect('RecursosHumanos/ListarPersonalT','refresh');
                     break;
               case 12:
                     redirect('RecursosHumanos/ListarPersonalT','refresh');
                     break;
               case 13:
                     redirect('RecursosHumanos/ListarPersonalE','refresh');
                     break;
               case 14:
                     redirect('RecursosHumanos/ListarPersonalS','refresh');
                     break;
                case 5:
                     redirect('RecursosHumanos/ListarPersonalA','refresh');
                     break;
            }
    }

    public function formato($date)
    {
    	$fecha="";
    	if($date!=null){
            $aa= explode("-",$date);
            if($aa[0]>999){
	           $fecha=$date;
            }
            else{
                $ity = explode("\/", $date);
                $fecha1=$ity[0];
                $it = explode("/", $fecha1);
                $fecha=$it[2]."-".$it[0]."-".$it[1];
            }
    	}
    	return $fecha;
    }
    public function DatosGeneralesPersonal()
    { 
        $this->very_session();
        $n1 = $this->input->get('id');
        $n2 = explode(".", $n1);
        $n=$n2[0];
        $datos['v4']=$this->PersonalModel->buscar_personal_datos($n);
        $data=$this->PersonalModel->buscar_personal_datos($n);
        if ($n2[1]==1) $this->load->view('Personal/datos_generales',$datos);
        if ($n2[1]==2) 
        {
            /*$this->session->set_flashdata('imprimir', $data);
            redirect('RecursosHumanos/imprimir_personal','refresh');*/
            $this->load->view('frontend/head');
            $this->load->view('Personal/reporte',$data,FALSE);
            $this->load->view('frontend/footer');
        }

        
    }
    public function imprimir_personal()
    {
        $this->very_session();
        $data= $this->session->flashdata('imprimir');
        echo json_encode($data);
        exit();
        $this->load->view('frontend/head');
        $this->load->view('Personal/reporte',$data,FALSE);
       // $this->load->view('Almacenes/prueba_modal',$data, FALSE);
        $this->load->view('frontend/footer');
    }
//SUBDEALEAR
    public function ListarPersonalS()
    {
        $this->very_session();
        $nombre=$this->session->nombres;
        $apellido=$this->session->apellidos;
        $id_e=$this->AlmacenModel->entrega($nombre);
        //REGION A LA QUE PERTENECE
        $regional=$id_e->Regional; 
        $data['v5'] = $this->AlmacenModel->Listar_subd_entrega_mat($regional);
        $this->load->view('frontend/head');
        $this->load->view('Personal/Listar_subd',$data,FALSE);
        $this->load->view('frontend/footer');
    }
    public function Sub_dealerPersonal()
    {
        $this->very_session();
        $prov = $_GET["id"];
        $data['v4'] = $this->PersonalModel->ListarPersonal_subd(14,14,$prov);
        $data['v1'] ="SUBDEALER"; 
        $this->load->view('frontend/head');
        $this->load->view('Personal/listarRegistroPersonal', $data, FALSE);
        $this->load->view('frontend/footer');
    }
    

}