<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Personal extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('PersonalModel');
		$this->load->library('javascript');
		$this->load->library('javascript/jquery');
	}

	public function index()
	{
		echo "Hola Mundo soy controller personal";
		//$this->load->view('contador');
	}
    public function very_session()
    {
        if (!isset($this->session->nombres) && !isset($this->session->apellidos) && !isset($this->session->cargo)) {
            redirect(base_url(),'refresh');
        }
    }
    //*********************PERSONAL********************************
	public function ListarPersonal()
	{
        $this->very_session();
		$data['v4'] = $this->PersonalModel->ListarPersonal();
		$this->load->view('frontend/head');
		$this->load->view('Personal/listarRegistroPersonal', $data, FALSE);
		$this->load->view('frontend/footer');
	}
    public function RegistrarDatosPersonal()
    {
        $this->very_session();
        $dataPersonal = array( 

                        "nombrePersonal" => $this->input->post('nombre'),
                        "ciPersonal" => $this->input->post('ci'),
                        "expedido" =>$this->input->post('expedido'),
                        "apPaternoPersonal" =>$this->input->post('paterno'),
                        "apMaternoPersonal" =>$this->input->post('materno'),
                        "estadoCivil"=>$this->input->post('estado_civil'),
                        "genero"=>$this->input->post('genero'),
                        "direccionPersonal"=>$this->input->post('direccion'),
                        "telefonoPersonal"=>$this->input->post('telefono'),
                        "celularPersonal" =>$this->input->post('celular'),
                        "correoPersonal" =>$this->input->post('correo'),
                        "numeroMatricula" =>$this->input->post('num_matricula'),
                        "fechaNacimiento" =>$this->input->post('fecha_nac'),
                        "fechaTitulo" =>$this->input->post('fecha_tit'),
                        "estado" =>'Activo',
                        "registroPersonal" => date("y/m/d"),
                        "especialidad" =>$this->input->post('especialidad')
                    );

            $this->PersonalModel->guardar_personal($dataPersonal);
            $lista_t = $this->PersonalModel->ListarPersonal();
            echo json_encode($lista_t);
           
        
    }
    public function mostrar_f_nuevo_personal()
    {
        $this->very_session();
        $this->load->view('personal/nuevo_registro_personal');
    }
    public function editar_f_personal()
    {
        $this->very_session();
        $n = $this->input->get('id');
       // var_dump($n);
       // exit();
        $datas = $this->PersonalModel->BuscarPersonal($n);
       /*foreach ($datas as $key) {
            echo $key;
        }
        exit();*/
        //echo json_encode($datas);
        $this->load->view('Personal/editar_registro_personal',$datas);
    }
    public function eliminar_personal()
    {
        $this->very_session();
        $n = $this->input->get('id');
       // var_dump($n);
       // exit();
        
        $datas = $this->PersonalModel->BuscarPersonal($n);
       /*foreach ($datas as $key) {
            echo $key;
        }
        exit();*/
        //echo json_encode($datas);
        $this->load->view('Personal/eliminar_personal',$datas);
    }
    public function editar_personal()
    {
        $this->very_session();
        $n=$this->input->post('id');
        $data = array( 

                        "nombrePersonal" => $this->input->post('nombre'),
                        "ciPersonal" => $this->input->post('ci'),
                        "expedido" =>$this->input->post('expedido'),
                        "apPaternoPersonal" =>$this->input->post('paterno'),
                        "apMaternoPersonal" =>$this->input->post('materno'),
                        "estadoCivil"=>$this->input->post('estado_civil'),
                        "genero"=>$this->input->post('genero'),
                        "direccionPersonal"=>$this->input->post('direccion'),
                        "telefonoPersonal"=>$this->input->post('telefono'),
                        "celularPersonal" =>$this->input->post('celular'),
                        "correoPersonal" =>$this->input->post('correo'),
                        "numeroMatricula" =>$this->input->post('num_matricula'),
                        "fechaNacimiento" =>$this->input->post('fecha_nac'),
                        "fechaTitulo" =>$this->input->post('fecha_tit'),
                        "estado" =>$this->input->post('estado'),
                        //"registroPersonal" => date("y/m/d"),
                        "especialidad" =>$this->input->post('especialidad')
                    );
        

        $this->PersonalModel->modificar_personal($n,$data);
        $lista_t = $this->PersonalModel->ListarPersonal();
        echo json_encode($lista_t);
        //$this->ListarPersonal();
        //redirect('Personal/ListarPersonal','refresh');
    }
    
    public function baja_personal()
    {
        $this->very_session();
        $n=$this->input->post('id');
        $data = array( 

                        "estado" =>'Inactivo',
                        //"registroPersonal" => date("y/m/d"),
                        //"especialidad" =>$this->input->post('especialidad')
         );
      //  $estado="Inactivo"
        $this->PersonalModel->modificar_personal($n,$data);
        $lista_t = $this->PersonalModel->ListarPersonal();
        echo json_encode($lista_t);
        //$this->ListarPersonal();
        //redirect('Personal/ListarPersonal','refresh');
    }
/////////////////////////////////////////////////////////////////////////////
    //*********************CARGO********************************
    public function ListarCargo()
    {
        $this->very_session();
        $data['v4'] = $this->PersonalModel->ListarCargo();
        $this->load->view('frontend/head');
        $this->load->view('Cargo/listarRegistroCargo', $data, FALSE);
        $this->load->view('frontend/footer');
    }
    public function RegistrarDatosCargo()
    {
        $this->very_session();
        $dataCargo = array( 

                    "nombreCargo" => $this->input->post('nom_cargo'),
                    "estado" =>$this->input->post('estado'),
                    "descripcionCargo" =>$this->input->post('desc_cargo')
                );

        $this->PersonalModel->guardar_cargo($dataCargo);
        $lista_cargo = $this->PersonalModel->ListarCargo();
        echo json_encode($lista_cargo);
           
        
    }
    public function mostrar_f_nuevo_cargo()
    {
         $this->very_session();
         $this->load->view('cargo/nuevo_registro_cargo');
    }
    public function Editar_f_cargo()
    {
        $this->very_session();
        $n = $this->input->get('id');
       // var_dump($n);
       // exit();
        $datas = $this->PersonalModel->BuscarCargo($n);
       /*foreach ($datas as $key) {
            echo $key;
        }
        exit();*/
        //echo json_encode($datas);
        $this->load->view('cargo/editar_registro_cargo',$datas);
    }
    public function Eliminar_cargo()
    {
         $this->very_session();
         $n = $this->input->get('id');
       // var_dump($n);
       // exit();
        $datas = $this->PersonalModel->BuscarCargo($n);
       /*foreach ($datas as $key) {
            echo $key;
        }
        exit();*/
        //echo json_encode($datas);
        $this->load->view('Cargo/eliminar_cargo',$datas);
    }
    public function editar_cargo()
    {
        
         $this->very_session();
         $n=$this->input->post('id');
        $data = array( 

                        "nombreCargo" => $this->input->post('nom_cargo'),
                        "estado" =>$this->input->post('estado'),
                        "descripcionCargo" =>$this->input->post('desc_cargo')
                    );
        

        $this->PersonalModel->modificar_cargo($n,$data);
        $lista_cargo = $this->PersonalModel->ListarCargo();
        echo json_encode($lista_cargo);
        //$this->ListarPersonal();
        //redirect('Personal/ListarPersonal','refresh');
    }
    
    public function baja_cargo()
    {
         $this->very_session();
         $n=$this->input->post('id');
        $data = array( 

                        "estado" =>'Inactivo',
                        //"registroPersonal" => date("y/m/d"),
                        //"especialidad" =>$this->input->post('especialidad')
         );
      //  $estado="Inactivo"
        $this->PersonalModel->modificar_cargo($n,$data);
        $lista_cargo = $this->PersonalModel->ListarCargo();
        echo json_encode($lista_cargo);
        //$this->ListarPersonal();
        //redirect('Personal/ListarPersonal','refresh');
    }
    /////////////////////////////////////////////////////////////////////////////
    //*********************TURNO********************************
    public function ListarTurno()
    {
        $this->very_session();
        $data['v5'] = $this->PersonalModel->ListarTurno();
        $this->load->view('frontend/head');
        $this->load->view('Turno/listarRegistroTurno', $data, FALSE);
        $this->load->view('frontend/footer');
    }
    public function RegistrarDatosTurno()
    {
        
         $this->very_session();
             $dataTurno = array( 

                        "nombreTurno" => $this->input->post('nom_turno'),
                        "estado" =>$this->input->post('estado')
                    );

            $this->PersonalModel->guardar_turno($dataTurno);
            $lista_turno = $this->PersonalModel->ListarTurno();
            echo json_encode($lista_turno);
           
        
    }
    public function mostrar_f_nuevo_turno()
    {
         $this->very_session();
         $this->load->view('Turno/nuevo_registro_turno');
    }
    public function Editar_f_turno()
    {
         $this->very_session();
         $n = $this->input->get('id');
       // var_dump($n);
       // exit();
        $datas = $this->PersonalModel->BuscarTurno($n);
       /*foreach ($datas as $key) {
            echo $key;
        }
        exit();*/
        //echo json_encode($datas);
        $this->load->view('Turno/editar_registro_turno',$datas);
    }
    public function Eliminar_turno()
    {
         $this->very_session();
         $n = $this->input->get('id');
       // var_dump($n);
       // exit();
        $datas = $this->PersonalModel->BuscarTurno($n);
       /*foreach ($datas as $key) {
            echo $key;
        }
        exit();*/
        //echo json_encode($datas);
        $this->load->view('Turno/eliminar_turno',$datas);
    }
    public function editar_turno()
    {
        
         $this->very_session();
         $n=$this->input->post('id');
         $dataTurno = array( 

                        "nombreTurno" => $this->input->post('nom_Turno'),
                        "estado" =>$this->input->post('estado')
                    );

            $this->PersonalModel->modificar_turno($n,$dataTurno);
            $lista_turno = $this->PersonalModel->ListarTurno();
            echo json_encode($lista_turno);
        //$this->ListarPersonal();
        //redirect('Personal/ListarPersonal','refresh');
    }
    
    public function baja_turno()
    {
        
        $this->very_session();
        $n=$this->input->post('id');
        $data = array( 

                        "estado" =>'Inactivo',
                        //"registroPersonal" => date("y/m/d"),
                        //"especialidad" =>$this->input->post('especialidad')
         );
      //  $estado="Inactivo"
        $this->PersonalModel->modificar_turno($n,$data);
        $lista_cargo = $this->PersonalModel->ListarTurno();
        echo json_encode($lista_cargo);
        //$this->ListarPersonal();
        //redirect('Personal/ListarPersonal','refresh');
    }
    /////////////////////////////////////////////////////////////////////////////
    //*********************ASIGNAR TURNO********************************
   
    public function ListarAsignarTurno()
    {
        $this->very_session();
        $data['v4'] = $this->PersonalModel->ListarAsignarTurno();
        $this->load->view('frontend/head');
        $this->load->view('Asignar_turnos/listarRegistroAsig_turno', $data, FALSE);
        $this->load->view('frontend/footer');
    }
    public function mostrar_f_nueva_asig_turno()
    {
        $this->very_session();
        $data['v1'] = $this->PersonalModel->ListarTurno();
        $data['v2'] = $this->PersonalModel->ListarCargo();
        $data['v3'] = $this->PersonalModel->ListarPersonal();
        $this->load->view('Asignar_turnos/nuevo_registro_asig_turno',$data);
    }
    public function RegistrarDatosAsignacionTurno()
    {
        
        $this->very_session();
        $dataAsigTurno = array( 

                        "descripcionTurno" => $this->input->post('desc_turno'),
                        "fechaIngreso" =>$this->input->post('fecha_ing'),
                        "registro" => date("y/m/d"),
                        "personal_idPersonal" =>$this->input->post('personal'),
                        "cargo_idCargo" =>$this->input->post('cargo'),
                        "turno_idTurno" =>$this->input->post('turno'),
                        "estado" =>$this->input->post('estado'),
                    );

        $this->PersonalModel->guardar_asig_turno($dataAsigTurno);
        $lista_asig_turno = $this->PersonalModel->ListarAsignarTurno();
        echo json_encode($lista_asig_turno);
       
        
    }
    public function Eliminar_asig_turno()
    {
        $this->very_session();
        $n = $this->input->get('id');
        $datas = $this->PersonalModel->BuscarAsignacionTurno($n);
        $this->load->view('Asignar_turnos/eliminar_asig_turno',$datas);
    }
    public function baja_asig_turno()
    {
        
        $this->very_session();
        $n=$this->input->post('id');
        $data = array( 

                        "estado" =>'Inactivo',
                        "fechaSalida" => date("y/m/d"),
                        //"especialidad" =>$this->input->post('especialidad')
         );
      //  $estado="Inactivo"
        $this->PersonalModel->modificar_asig_turno($n,$data);
        $lista_asig_turno = $this->PersonalModel->ListarAsignarTurno();
        echo json_encode($lista_asig_turno);
    }

    public function reportePersonal()
    {
        $this->very_session();  
        $data['personal'] = $this->PersonalModel->ListarPersonal();
        // echo json_encode($data);
        // exit();
        $this->load->view('frontend/head');
        $this->load->view('Personal/reporte', $data);
        $this->load->view('frontend/footer');
    }

}  