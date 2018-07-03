<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BackOffice extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('login_model');
		$this->load->model('PersonalModel');
		$this->load->model('AlmacenModel');
		$this->load->model('InstalacionModel');
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
    public function ListarOT()
    {
    	$this->very_session();
    	$this->load->view('frontend/head');
		$this->load->view('BackOffice/revision_ot',FALSE);
		$this->load->view('frontend/footer');
    }
    public function EmitirOT()
    {
    	$this->very_session();
    	$this->load->view('frontend/head');
    	$data['v4'] = $this->InstalacionModel->tipo_intalacion();
    	
		$this->load->view('BackOffice/emision_ot',$data,FALSE);
		$this->load->view('frontend/footer');
    }
    public function Importar_confirmacion()
    {
    	
    	$linea = 0;
		//Abrimos nuestro archivo
		$archivo = fopen("C:/xampp/htdocs/telserco1/application/controllers/prueba.csv", "r");
		echo "Hola";
		//echo $archivo;
		//Lo recorremos
		while (($datos = fgetcsv($archivo, ",")) == true) 
		{
		  $num = count($datos);
		  $linea++;
		  //Recorremos las columnas de esa linea
		  for ($columna = 0; $columna > $num; $columna++) 
		      {
		         echo $datos[$columna] . "\n";
		     }
		}
		//Cerramos el archivo
		fclose($archivo);
    	/*echo("alert");
    	exit();

		//obtenemos el archivo .csv
		$tipo = $_FILES['archivo']['type'];
		 
		$tamanio = $_FILES['archivo']['size'];
		 
		$archivotmp = $_FILES['archivo']['tmp_name'];
		 
		//cargamos el archivo
		$lineas = file($archivotmp);
		 
		//inicializamos variable a 0, esto nos ayudará a indicarle que no lea la primera línea
		$i=0;
		 
		//Recorremos el bucle para leer línea por línea
		foreach ($lineas as $linea_num => $linea)
		{ 
		   //abrimos bucle
		   /*si es diferente a 0 significa que no se encuentra en la primera línea 
		   (con los títulos de las columnas) y por lo tanto puede leerla
		   if($i != 0) 
		   { 
		       //abrimos condición, solo entrará en la condición a partir de la segunda pasada del bucle.
		       /* La funcion explode nos ayuda a delimitar los campos, por lo tanto irá 
		       leyendo hasta que encuentre un ; 
		       $datos = explode(";",$linea);
		 
		       //Almacenamos los datos que vamos leyendo en una variable
		       //usamos la función utf8_encode para leer correctamente los caracteres especiales
		       $nombre = utf8_encode($datos[0]);
		       $edad = $datos[1];
		       $profesion = utf8_encode($datos[2]);
		 
		       //guardamos en base de datos la línea leida
		       mysql_query("INSERT INTO datos(nombre,edad,profesion) VALUES('$nombre','$edad','$profesion')");
		 
		       //cerramos condición
		   }
		 
		   /*Cuando pase la primera pasada se incrementará nuestro valor y a la siguiente pasada ya 
		   entraremos en la condición, de esta manera conseguimos que no lea la primera línea.
		   $i++;
		   //cerramos bucle
		}
*/
	}

}