<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UsuarioPersonal extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('PersonalModel');
		$this->load->model('UsuarioModel');
		$this->load->library('javascript');
		$this->load->library('javascript/jquery');
	}

	public function very_session()
    {
        if (!isset($this->session->nombres) && !isset($this->session->apellidos) && !isset($this->session->cargo)) {
            redirect(base_url(),'refresh');
        }
    }

	public function ListaUsuarios()
	{
		$this->very_session();
		$data['usuarios'] = $this->UsuarioModel->ListarUsuarios();
		$data['medicos'] = $this->PersonalModel->ListarPersonal();
		$this->load->view('frontend/head');
		$this->load->view('Usuario/listarRegistroUsuarios', $data, FALSE);
		$this->load->view('frontend/footer');
	
	}
	public function RegistrarUsuario()
	{
		$this->very_session();
		$datos = array('nombreUsuarioP' => $this->input->post('nombre'),
						'contraseñaP' =>$this->input->post('contraseña'),
						'estado' => 'Activo',
						'personal_idPersonal' => $this->input->post('idPersonal'),
					 );

		$this->UsuarioModel->guardar_usuario($datos);

		 redirect(base_url()."index.php/UsuarioPersonal/ListaUsuarios");
		// echo json_encode($this->input->post());
		// exit();
	}

	public function reporteUsuarios()
    {
        $this->very_session();

    
        $data['usuarios'] = $this->UsuarioModel->ListarUsuarios();
        // echo json_encode($data);
        // exit();
        $this->load->view('frontend/head');
        $this->load->view('Usuario/reporte', $data);
        $this->load->view('frontend/footer');

    }

}