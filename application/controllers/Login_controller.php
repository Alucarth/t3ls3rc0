<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_controller extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('login_model');
		$this->output->nocache();
/*		$this->load->model('PacienteModel');
		$this->load->model('CitaModel');
		$this->load->model('PersonalModel');
		$this->load->model('TipoCirugiaModel');
		$this->load->model('FamiliarModel');
		$this->load->model('CirugiaModel');
		$this->load->model('ConsultaModel');*/
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
  /*  public function loginAndroid()
    {
    	//echo json_encode($_POST['usuario']);
    	$user = $_POST['usuario'];
		$pass = $_POST['password'];

  //   	echo 'usuario: '.$user;
  //   	echo "password: ".$password;
    	//exit();
    	
		if ($this->login_model->login($user,$pass) != false) {
			$r = $this->login_model->login($user,$pass);
			// foreach ($r as $row) {
			// 	$this->session->set_userdata("nombres",$row->nombrePersonal);
			// 	$this->session->set_userdata("apellidos",$row->apPaternoPersonal." ".$row->apMaternoPersonal);
			// 	$this->session->set_userdata("cargo",$row->nombreCargo);
			// }
			//$datos = array('mensaje' => 'ok', );
			//echo json_encode($datos);
			echo 'ok';
			//redirect(base_url()."index.php/Login_controller/Principal",'refresh');
		}
		else {
			$datos = array('mensaje' => 'error' );
			echo json_encode($datos);
			//redirect(base_url(),'refresh');	
		}

    }*/
	public function login()
	{
		$user = $this->input->post("usuario");
		$pass = $this->input->post("password");
		/*$user = 'admin';
		$pass = 'admin';*/

		/*if(isset($_POST["portal"]))
		{

			if ($this->login_model->loginPortal($user,$pass) != false) {
			$r = $this->login_model->loginPortal($user,$pass);
				

				foreach ($r as $row) {
					$this->session->set_userdata("nombres",$row->nombreFamiliar);
					$this->session->set_userdata("apellidos",$row->apPaternoFamiliar." ".$row->apMaternoFamiliar);
					$this->session->set_userdata("id",$row->idFamiliar);
				}
				redirect(base_url()."index.php/Login_controller/Familiar",'refresh');
			}
			else {
				redirect(base_url(),'refresh');	
			}

		}
		else
		{*/
			if ($this->login_model->login($user,$pass) != false) {
			$r = $this->login_model->login($user,$pass);
				foreach ($r as $row) {
					$this->session->set_userdata("nombres",$row->Nombre_personal);
					$this->session->set_userdata("apellidos",$row->Ap_paterno_personal." ".$row->Ap_materno_personal);
					$this->session->set_userdata("cargo",$row->Nombre_cargo);
					$this->session->set_userdata("labor",$row->Descripcion);

				}
				redirect(base_url()."index.php/Login_controller/Principal",'refresh');
			}
			else {
				redirect(base_url(),'refresh');	
			}
	//	}

		
	}
	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url(),'refresh');	
	}

	public function FichaClinica()
    {   
        $paciente = $this->PacienteModel->BuscarPaciente($this->input->post('id'));

        $consultas = $this->ConsultaModel->Consultas($this->input->post('id'));

        $path = './uploads/'.$paciente->Foto;
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data); 


         $datos =array('paciente'=>$paciente,'imagen'=>$base64,'consultas'=>$consultas);

        echo json_encode($datos); 

    }
	public function Principal($value='')
	{
		//$this->very_session();

		// $data['pacientes'] = $this->PacienteModel->ListarPaciente();

		/*$datos = array('pacientes'=> $this->PacienteModel->ListarPaciente() ,
					   'citas' => $this->CitaModel->Citas(),
					   'medicos' => $this->PersonalModel->ListarPersonal(),
					   'tipos' => $this->TipoCirugiaModel->TiposCirugias(),
					   'cirugias' => $this->CirugiaModel->Cirugias()
					   );*/

		$this->load->view('frontend/head');
		$this->load->view('frontend/principal');
		$this->load->view('frontend/footer');

	}
	public function registrarCita()
	{
		echo json_encode($this->input->post());

		$this->very_session();

		if(isset($_POST["isCirugia"])){
			//echo "existe";
			//es cirugia
			$data = array('fecha'=> $this->input->post('fecha'),
					  'descripcion' => $this->input->post('descripcion'),
					  'estado' => 'Activo',
					  'paciente_idPaciente' => $this->input->post('id_paciente'),
					  'hora_inicio' => $this->input->post('hora_inicio'),
					  'hora_fin' => $this->input->post('hora_fin'),
					  'personal_idPersonal' => $this->input->post('id_medico'),
					  'tipoCirugia_idTipoCirugia' => $this->input->post('tipo_cirugia')

			);

			$this->CirugiaModel->registrarCirugia($data);
			//exit(0);



		}else
		{
			//no es cirugia
			//echo "no existe entonces es cita";ç
			$data = array('fecha'=> $this->input->post('fecha'),
					  'descripcion' => $this->input->post('descripcion'),
					  'estado' => 'Activo',
					  'paciente_idPaciente' => $this->input->post('id_paciente'),
					  'hora_inicio' => $this->input->post('hora_inicio'),
					  'hora_fin' => $this->input->post('hora_fin')
			);
		
			// return  echo $id;
			//exit(0);

			$this->CitaModel->registrar_cita($data);



		}

		redirect(base_url()."index.php/Login_controller/Principal");

	}
}