<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AlmacenModel extends CI_Model {

	
	public function ListarNotaIngreso()
	{
		$r = $this->db->query(
		);
		return $r->result();
	}
	public function ListarMaterialUnidad($prov){
		$r = $this->db->query(
			"SELECT pe.SERIAL, ni.Cod_item, ni.Nombre_item, ni.Nombre_Item_interno,sum(pe.Cantidad ) as 'suma', ni.Unidad_medida, ni.Cod_item_interno
			from producto_entrada pe, ni_descripcion ni, nota_ingreso n
            where (pe.Id_ni_des_prod_e=ni.Id_ni
			       and pe.Id_estado_prod_e=1
                  and ni.Id_nota_ni=n.Id_nota_i
                  and n.Id_proveedor_nota=$prov)
			GROUP BY ni.Cod_item_interno"
		);
		return $r->result();
	}

	public function ListarMaterialGrupo($region)
	{
		$r = $this->db->query(
			"SELECT pp.Cod_item_per, pp.SERIAL,sum(pp.Cantidad) as 'suma2'
			from producto_personal pp
			where (pp.Cantidad>=1
                   AND pp.Id_estado_prod_p=3
                   )
			GROUP by pp.SERIAL"
		);
		return $r->result();
	}
	
//*************************************************************************************************************
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
	 public function ListarMaterial($a,$b,$c,$region)
	 {
	 	$r = $this->db->query(
			"SELECT `ap`.`Cod_asignacion` AS `Cod_asignacion`,`p`.`Nombre_personal` AS `Nombre_personal`,`p`.`Ap_paterno_personal` AS `Ap_paterno_personal`,`p`.`Ap_materno_personal` AS `Ap_materno_personal`,`c`.`Nombre_cargo` AS `Nombre_cargo`,`pr`.`Razon_social_proveedor` AS `Razon_social_proveedor`,`ap`.`Id_asignacion` AS `Id_asignacion`,`ap`.`Regional` AS `Regional`,`ap`.`Id_cargo_a` AS `Id_cargo_a` 

			from ((((`producto_personal` `pp` join `personal` `p`) join `asignacion_personal` `ap`) join `cargo` `c`) join `proveedor` `pr`) 

			where ((`p`.`Id_personal` = `ap`.`Id_personal_a`) and (`pp`.`Id_asignacion_prod_p` = `ap`.`Id_asignacion`) and (`ap`.`Id_cargo_a` = `c`.`Id_cargo`) and (`pr`.`Id_proveedor` = `ap`.`Id_proveedor_a`)
				and (`ap`.`Id_cargo_a`=$a or `ap`.`Id_cargo_a`=$b or `ap`.`Id_cargo_a`=$c) and `ap`.Regional like '$region') 

			group by `ap`.`Id_asignacion` "
		);
		return $r->result();
	 }
	 
// FORMULARIO Y PDF
//*************************************************************************************************************
	public function HoraForm1($hora)
	{
		$r = $this->db->query(
			"SELECT MAX(pp.Fecha_ingreso) as hora
			FROM producto_personal pp
			where pp.Numero_entrega=$hora"
		);
		return $r->row();
	}
	 //PARA ASIGNAR EL NUEVO NÚMERO DE  ENTREGA (ÚLTIMO NUMERO INGRESADO)
	 public function numero($region)
	 {
	 	$r = $this->db->query(
			" SELECT MAX(pp.Numero_entrega) as maximo
			FROM producto_personal pp
			where Regional LIKE '$region'"
			);
		return $r->row();
	 }

	
	 //DATOS DEL QUE ENTREGA

	 public function entrega($nombre)
	 {
	 	$r = $this->db->query(
			" SELECT a.Id_asignacion as id, a.Regional
			FROM asignacion_personal a, personal p
			where p.Nombre_personal LIKE '$nombre'
			and a.Id_personal_a=p.Id_personal"
			);
		return $r->row();
	 }
	 public function entrega1($nombre)
	 {
	 	$r = $this->db->query(
			" SELECT p.Id_personal as id
			FROM personal p
			where p.Nombre_personal LIKE '$nombre'"
			);
		return $r->row();
	 }

	 // FUNCION QUE BUSCA TODOS LOS DECOS SEGUN UNA ORDEN DE ENTREGA	
	 public function ListarProductosPersonal($num_entrega,$per, $codigo)
	 {
	 	$r = $this->db->query(
			" SELECT pp.SERIAL
			FROM producto_personal pp
			where pp.Numero_entrega=$num_entrega and pp.Cod_item_per LIKE '$codigo' and pp.Id_asignacion_prod_p=$per"
			);
		return $r->result();
	 }
	
	 //FUNCION QUE BUSCA EL DECO EN ALMACEN PARA ENTREGAR
	 public function BuscarDeco($deco)
	 {
	 	$r = $this->db->query(
			"SELECT pe.SERIAL,pe.CHIP_ID, pe.Id_producto, ni.Cod_item_interno as codigo
			FROM producto_entrada pe, ni_descripcion ni
			where (pe.SERIAL LIKE '$deco' 
                   or pe.CHIP_ID LIKE '$deco'
                   or pe.Otro LIKE '$deco')
	 	    and pe.Id_estado_prod_e=1 and pe.Id_ni_des_prod_e=ni.Id_ni "
			);
		return $r->row();
	 }
	 public function guardar_entrega1($data)
	 {
	 	$this->db->insert("producto_personal",$data);
	 }	 //DA DE BAJA UN SERIAL ESTADO=3
	 public function baja_serie($id,$serie)
	 {
	 	$this->db->where('Id_producto', $id);
		$this->db->update('producto_entrada', $serie);
	 }

	 //para comparar el anterior
	 //numero del ultimo registro del personal
	 public function numero_anterior($asignacion)
	 {
	 	$r = $this->db->query(
			" SELECT MAX(pp.Numero_entrega) as maximo
			FROM producto_personal pp
			where Id_asignacion_prod_p=$asignacion"
			);
		return $r->row();
	 }
	 public function material_anterior($num,$id,$region)
	 {
	 	$r = $this->db->query(
			" SELECT pp.Cod_item_per, pp.Anterior,sum(pp.Cantidad) as suma_a
			FROM producto_personal pp
			where pp.Numero_entrega=$num
			and pp.Id_asignacion_prod_p=$id
			and pp.Regional='$region'
			GROUP by pp.Cod_item_per"
			);
		return $r->result();
	 }
	 

	 ////////////////////////////////////////////////////////////////////////////////////////////////
	 public function ListarProveedor($region)
	 {
	 	$r = $this->db->query(
			" SELECT *
				FROM proveedor
				INNER JOIN nota_ingreso on proveedor.Id_proveedor=nota_ingreso.Id_proveedor_nota
				where Id_estado_proveedor=1
				and nota_ingreso.Regional LIKE '$region'
				GROUP BY Id_proveedor"
			);
		return $r->result();
	 }
	 public function ListarProveedorTodo()
	 {
	 	$r = $this->db->query(
			" SELECT *
			FROM proveedor
			Where Id_estado_proveedor=1
			GROUP BY Id_proveedor"
						);
		return $r->result();
	 }
	 public function BuscarProveedor($id)
	 {
	 	$r = $this->db->query("select * from proveedor where Id_proveedor=".$id);
		return $r->row();
	 }
	 ////////////////////////////////////

	 //FORMULARIO DE CUANTO TIENE Y QUE TIENE MATERIAL TÉCNICO
	 public function Material_tecnico1($id)
	 {
	 	$r = $this->db->query("SELECT pp.Cod_item_per, pp.SERIAL,sum(pp.Cantidad) as 'suma',pp.Fecha_ingreso
			from producto_personal pp
			where (pp.Cantidad>=1
                   AND pp.Id_estado_prod_p=3
                   and pp.Id_asignacion_prod_p=$id)
			GROUP by pp.Cod_item_per"
						);
		return $r->result();
	 }
	 public function Material_tecnico2($id,$cod)
	 {
	 	$r = $this->db->query("SELECT p.Razon_social_proveedor, p.NIT, n.Codigo_entrega, ni.Nombre_Item_interno, pp.SERIAL, per.Nombre_personal, pp.Cantidad,pp.Fecha_ingreso,pp.Cod_item_per
			from proveedor p, producto_entrada pe, producto_personal pp, ni_descripcion ni, nota_ingreso n, asignacion_personal ap, personal per
			where (p.Id_proveedor=n.Id_proveedor_nota
			       and n.Id_nota_i=ni.Id_nota_ni
			       and ni.Id_ni=pe.Id_ni_des_prod_e
			       and pp.Id_asignacion_prod_p=ap.Id_asignacion
			       and ap.Id_personal_a=per.Id_personal
			       and pp.SERIAL=pe.SERIAL
			      and ap.Id_asignacion=$id
			      and pp.SERIAL!=pp.Cod_item_per
			      and pp.Id_estado_prod_p=3
			      and pp.Cod_item_per='$cod')
			      GROUP by pp.SERIAL
			 ORDER BY pp.Cod_item_per"
						);
		return $r->result();
	 }
	 public function Material_instalacion($id,$prod)
	 {
	 	$r = $this->db->query("SELECT sum(pi.$prod) as 'suma1'
		FROM producto_instalacion pi, producto_ot1 po, asignacion_personal ap
		where  pi.Id_prod_OT_instalacion=po.Id_prod_OT
		and po.Id_asig_personal_prod_OT=ap.Id_asignacion
		and ap.Id_asignacion=$id");
		return $r->row();
	 }
	 // SUBDEALEAR
	public function Listar_subd_entrega_mat($regional)
	 {
	 	$r = $this->db->query("SELECT p.Id_proveedor,p.Razon_social_proveedor, p.NIT, p.Regional, p.Nombre_rep_proveedor, p.Direccion_proveedor,p.Actividad, p.Telefono_1_proveedor
			FROM proveedor p, asignacion_personal a
			Where p.Id_estado_proveedor=1
            AND a.Id_proveedor_a=p.Id_proveedor
			and p.Id_proveedor!=1
			and p.Regional='$regional'
			GROUP BY Id_proveedor");
		return $r->result();
	 }
}