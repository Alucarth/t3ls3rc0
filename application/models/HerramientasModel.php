<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HerramientasModel extends CI_Model {

	
	public function ListarNotaIngreso()
	{
		$r = $this->db->query(
		);
		return $r->result();
	}
	
	public function ListarNotaEntrada($prov2)
	{
		$r = $this->db->query(
			"SELECT n.Id_nota_i, n.Codigo_entrega, p.Razon_social_proveedor,p.Observacion, n.Fecha_ingreso_nota, n.Observacion_1
			from nota_ingreso n, proveedor p
			where n.Id_proveedor_nota=p.Id_proveedor
			and n.Regional like '$prov2'"
		);
		return $r->result();
	}
	public function ListarHERR($a)
	{
		$r = $this->db->query(
			"SELECT * FROM herramientas WHERE Estado=$a"
		);
		return $r->result();
	}
	
}