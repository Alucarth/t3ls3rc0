<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UsuarioModel extends CI_Model {

	public function ListarUsuarios()
	{
		$r = $this->db->query("select * from usuario_personal inner join personal on usuario_personal.personal_idPersonal=personal.idPersonal  where usuario_personal.estado='Activo'");
		return $r->result();
	}

	public function guardar_usuario($data)
	{
		$this->db->insert("usuario_personal",$data);
	}

	public function ListarUsuariosExterno()
	{
		$r= $this->db->query(" select * from usuario_portal inner join familiar on familiar.idFamiliar=usuario_portal.familiar_idFamiliar where usuario_portal.estado='Activo'");
		return $r->result();
	}

	public function guardar_usuario_externo($data)
	{
		$this->db->insert("usuario_portal",$data);
	}


}
