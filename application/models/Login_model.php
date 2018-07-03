<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

	public function login($user,$password)
	{
		$r = $this->db->query("SELECT * from usuario_personal u, personal p, asignacion_personal a, cargo c 
where (u.Username like '$user' and u.Password like '$password') 
									and (u.Id_personal_usuario = a.Id_asignacion) 
									and (a.Id_personal_a = p.Id_personal) 
									and (a.Id_cargo_a = c.Id_cargo) 
									and (c.Id_estado_cargo= 1 
										and p.Id_estado_personal = 1 
										and u.Id_estado_usuario= 1 
										and a.Id_estado_a = 1)");
		if (isset($r)) {
			return $r->result();
		}
		else
		{
			return false;
		}
	}

	/*public function loginPortal($user,$password)
	{
		$r = $this->db->query("select * from usuario_portal join familiar on familiar.idFamiliar= usuario_portal.familiar_idFamiliar where nombreUsuarioF like '$user' and contraseñaF like '$password' and usuario_portal.estado='Activo'; ");
		if (isset($r)) {
			return $r->result();
		}
		else
		{
			return false;
		}
	}*/
	// public function loginAndroid($user,$pass)
	// {
	// 	$r = $this->db->query("");
	// 	return 
	// }
}