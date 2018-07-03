<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class InstalacionModel extends CI_Model {

	public function tipo_intalacion()
	{
		$r = $this->db->query(
			"SELECT Id_tipo_i,Nombre,Descripcion,Observacion FROM tipo_instalacion1"
		);
		return $r->result();
	}
	


}