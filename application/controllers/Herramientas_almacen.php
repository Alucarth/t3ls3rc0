
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Herramientas_almacen extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('login_model');
		$this->load->model('PersonalModel');
		$this->load->model('AlmacenModel');
		$this->load->model('HerramientasModel');
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
    public function ListarNotaIng()
    {
        $this->very_session();
        $nombre=$this->session->nombres;
        $apellido=$this->session->apellidos;
        $id_e=$this->AlmacenModel->entrega($nombre);
        //REGION A LA QUE PERTENECE
        $regional=$id_e->Regional; 
        //$regional='POTOSI';
		$data['v4'] = $this->HerramientasModel->ListarNotaEntrada($regional);
		$this->load->view('frontend/head');
		$this->load->view('Almacenes/listarNotaIngreso', $data,FALSE);
		$this->load->view('frontend/footer');
    }
    public function NuevaNotaIng()
    {
    	$this->very_session();
        $nombre=$this->session->nombres;
        $apellido=$this->session->apellidos;
        $id_e=$this->AlmacenModel->entrega($nombre);
        //REGION A LA QUE PERTENECE
        $regional=$id_e->Regional; 
        $data['reg']=$regional;
        $data['v4'] = $this->HerramientasModel->ListarHERR(8);
    	$data['v5'] = $this->HerramientasModel->ListarHERR(9);
    	$data['v6'] = $this->HerramientasModel->ListarHERR(10);
    	$data['v7'] = $this->HerramientasModel->ListarHERR(11);
    	$data['v8'] = $this->HerramientasModel->ListarHERR(12);
    	$data['v9'] = $this->HerramientasModel->ListarHERR(13);
        $this->load->view('frontend/head');
    	$this->load->view('Almacenes/nueva_notai',$data,FALSE);
        $this->load->view('frontend/footer');
    }
    public function GuardarNotaIng()
    {
        //echo "Hola";
        $i1=$this->input->post('notaForm');
        $i=$this->input->post('ipt');

        echo json_encode($i);
        echo $i1;
    }
}