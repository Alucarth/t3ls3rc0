<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contador extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('PersonalModel');
	}

	public function index()
	{
		echo "Hola Mundo";
		//$this->load->view('contador');
	}
	public function resultados()
	{
		$n = $this->input->post('nombre');
		$data['v1'] = "mabnar";
		
		$data['v2'] = "68119663";

		$data['v3'] = $n;
		$data['v4'] = $this->Personal->listaPersonal($n);
		$this->load->view('frontend/head');
		$this->load->view('nombre', $data, FALSE);
		$this->load->view('frontend/footer');
	}

}

/* End of file Contador.php */
/* Location: ./application/controllers/Contador.php */