<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PersonalModel extends CI_Model {

	public function ListarPersonal($a,$b,$c)
	{
		$r = $this->db->query(
		"SELECT `asignacion_personal`.`Id_asignacion`,`personal`.`Nombre_personal`, `personal`.`Ap_paterno_personal`,
		`personal`.`Ap_materno_personal`,`personal`.`Telefono_1_personal`,`personal`.`Telefono_2_personal`,`cargo`.`Nombre_cargo`,
		`personal`.`Id_personal`,`personal`.`Ci`,`personal`.`Expedicion_ci_personal`,`asignacion_personal`.`Cod_asignacion`,
		`proveedor`.`Razon_social_proveedor`,`proveedor`.`Nombre_rep_proveedor`,`asignacion_personal`.`Descripcion`,
		`asignacion_personal`.`Id_estado_a`,`asignacion_personal`.`Id_proveedor_a`,`asignacion_personal`.`Id_cargo_a`,
		`proveedor`.`Regional`
		from (((`personal` join `asignacion_personal` on((`asignacion_personal`.`Id_personal_a` =`personal`.`Id_personal`))) join `cargo` on((`asignacion_personal`.`Id_cargo_a` = `cargo`.`Id_cargo`))) join `proveedor` on((`proveedor`.`Id_proveedor` = `asignacion_personal`.`Id_proveedor_a`)))
		WHERE (asignacion_personal.Id_estado_a=1
        and (asignacion_personal.Id_cargo_a=$a OR asignacion_personal.Id_cargo_a=$b)
        and asignacion_personal.Regional='$c')
         ORDER BY asignacion_personal.Cod_asignacion "
		);
		return $r->result();
	}
	//*********************AÑADIR PERSONAL*****************************

	public function guardar_personal($personal)
	{
		$this->db->insert("personal",$personal);
	}
	public function guardar_asig_turno($data)
	{
		$this->db->insert("asignacion_personal",$data);
	}
	///////////////////////////////////////////////////////////////
	public function ListarPersonalMaterial($c)
	{
		$r = $this->db->query(
		"SELECT `asignacion_personal`.`Id_asignacion`,`personal`.`Nombre_personal`, `personal`.`Ap_paterno_personal`,
		`personal`.`Ap_materno_personal`,`personal`.`Telefono_1_personal`,`personal`.`Telefono_2_personal`,`cargo`.`Nombre_cargo`,
		`personal`.`Id_personal`,`personal`.`Ci`,`personal`.`Expedicion_ci_personal`,`asignacion_personal`.`Cod_asignacion`,
		`proveedor`.`Razon_social_proveedor`,`proveedor`.`Nombre_rep_proveedor`,`asignacion_personal`.`Descripcion`,
		`asignacion_personal`.`Id_estado_a`,`asignacion_personal`.`Id_proveedor_a`,`asignacion_personal`.`Id_cargo_a`,
		`proveedor`.`Regional`
		from (((`personal` join `asignacion_personal` on((`asignacion_personal`.`Id_personal_a` =`personal`.`Id_personal`))) join `cargo` on((`asignacion_personal`.`Id_cargo_a` = `cargo`.`Id_cargo`))) join `proveedor` on((`proveedor`.`Id_proveedor` = `asignacion_personal`.`Id_proveedor_a`)))
		WHERE asignacion_personal.Id_estado_a =1
        and asignacion_personal.Id_proveedor_a=$c"
		);
		return $r->result();
	}
	public function ListarPersonal_material($a,$b,$c)
	{
		$r = $this->db->query(
		"SELECT `asignacion_personal`.`Id_asignacion`,`personal`.`Nombre_personal`, `personal`.`Ap_paterno_personal`,
		`personal`.`Ap_materno_personal`,`personal`.`Telefono_1_personal`,`personal`.`Telefono_2_personal`,`cargo`.`Nombre_cargo`,
		`personal`.`Id_personal`,`personal`.`Ci`,`personal`.`Expedicion_ci_personal`,`asignacion_personal`.`Cod_asignacion`,
		`proveedor`.`Razon_social_proveedor`,`proveedor`.`Nombre_rep_proveedor`,`asignacion_personal`.`Descripcion`,
		`asignacion_personal`.`Id_estado_a`,`asignacion_personal`.`Id_proveedor_a`,`asignacion_personal`.`Id_cargo_a`,
		`proveedor`.`Regional`
		from (((`personal` join `asignacion_personal` on((`asignacion_personal`.`Id_personal_a` =`personal`.`Id_personal`))) join `cargo` on((`asignacion_personal`.`Id_cargo_a` = `cargo`.`Id_cargo`))) join `proveedor` on((`proveedor`.`Id_proveedor` = `asignacion_personal`.`Id_proveedor_a`)))
		
		WHERE asignacion_personal.Id_estado_a =1
        and (asignacion_personal.Id_cargo_a=$a OR asignacion_personal.Id_cargo_a=$b)
        and asignacion_personal.Id_proveedor_a=$c
         and not exists (select 1
					from producto_personal p1
                                      where p1.Id_asignacion_prod_p=asignacion_personal.Id_asignacion
                                      )"
		);
		return $r->result();
	}
	public function ListarPersonalTodo($a,$b)
	{
		$r = $this->db->query(
		"SELECT `asignacion_personal`.`Id_asignacion`,`personal`.`Nombre_personal`, `personal`.`Ap_paterno_personal`,
		`personal`.`Ap_materno_personal`,`personal`.`Telefono_1_personal`,`personal`.`Telefono_2_personal`,`cargo`.`Nombre_cargo`,
		`personal`.`Id_personal`,`personal`.`Ci`,`personal`.`Expedicion_ci_personal`,`asignacion_personal`.`Cod_asignacion`,
		`proveedor`.`Razon_social_proveedor`,`proveedor`.`Nombre_rep_proveedor`,`asignacion_personal`.`Descripcion`,
		`asignacion_personal`.`Id_estado_a`,`asignacion_personal`.`Id_proveedor_a`,`asignacion_personal`.`Id_cargo_a`,
		`proveedor`.`Regional`
		from (((`personal` join `asignacion_personal` on((`asignacion_personal`.`Id_personal_a` =`personal`.`Id_personal`))) join `cargo` on((`asignacion_personal`.`Id_cargo_a` = `cargo`.`Id_cargo`))) join `proveedor` on((`proveedor`.`Id_proveedor` = `asignacion_personal`.`Id_proveedor_a`)))
		

		WHERE (asignacion_personal.Id_estado_a=1

        and (asignacion_personal.Id_cargo_a=$a OR asignacion_personal.Id_cargo_a=$b))
         ORDER BY asignacion_personal.Cod_asignacion "
		);
		return $r->result();
	}
	public function ListarPersonal_subd($a,$b,$prov)
	{
		$r = $this->db->query(
		"SELECT `asignacion_personal`.`Id_asignacion`,`personal`.`Nombre_personal`, `personal`.`Ap_paterno_personal`,
		`personal`.`Ap_materno_personal`,`personal`.`Telefono_1_personal`,`personal`.`Telefono_2_personal`,`cargo`.`Nombre_cargo`,
		`personal`.`Id_personal`,`personal`.`Ci`,`personal`.`Expedicion_ci_personal`,`asignacion_personal`.`Cod_asignacion`,
		`proveedor`.`Razon_social_proveedor`,`proveedor`.`Nombre_rep_proveedor`,`asignacion_personal`.`Descripcion`,
		`asignacion_personal`.`Id_estado_a`,`asignacion_personal`.`Id_proveedor_a`,`asignacion_personal`.`Id_cargo_a`,
		`proveedor`.`Regional`
		from (((`personal` join `asignacion_personal` on((`asignacion_personal`.`Id_personal_a` =`personal`.`Id_personal`))) join `cargo` on((`asignacion_personal`.`Id_cargo_a` = `cargo`.`Id_cargo`))) join `proveedor` on((`proveedor`.`Id_proveedor` = `asignacion_personal`.`Id_proveedor_a`)))
		

		WHERE (asignacion_personal.Id_estado_a=1
        AND asignacion_personal.Id_proveedor_a=$prov
        and (asignacion_personal.Id_cargo_a=$a OR asignacion_personal.Id_cargo_a=$b))
         ORDER BY asignacion_personal.Cod_asignacion "
		);
		return $r->result();
	}
//************************************************CARGO********************************************
	public function ListarCargos()
	{
		$r = $this->db->query(
		"SELECT * 
		FROM cargo
		where Id_cargo!=1"
		);
		return $r->result();
	}
//*******************************************************CODIGOS PERSONAL**********************
	public function Cod_asignacion()
	{
		$r = $this->db->query(
		"SELECT (SUBSTRING_INDEX(`Cod_asignacion`, '-', -1)) as co
		from asignacion_personal"
		);
		return $r->result();
	}

//**********************************PERSONAL///////////////////////////////////////////////
	public function buscar_personal_datos($id)
	{
		
		$r = $this->db->query("SELECT `p`.`Id_personal` AS `Id_personal`,
			`p`.`Nombre_personal` AS `Nombre_personal`,
			`p`.`Ap_paterno_personal` AS `Ap_paterno_personal`,
			`p`.`Ap_materno_personal` AS `Ap_materno_personal`,
			`p`.`Ci` AS `Ci`,
			`p`.`Expedicion_ci_personal` AS `Expedicion_ci_personal`,
			`p`.`Genero` AS `Genero`,
			`p`.`Fecha_nacimiento_personal` AS `Fecha_nacimiento_personal`,
			`p`.`Fecha_incorporacion` AS `Fecha_incorporacion`,
			`p`.`Fecha_retiro` AS `Fecha_retiro`,`p`.`Telefono_1_personal` AS `Telefono_1_personal`,
			`p`.`Telefono_2_personal` AS `Telefono_2_personal`,
			`p`.`Telefono_3_personal` AS `Telefono_3_personal`,
			`p`.`Telefono_4_personal` AS `Telefono_4_personal`,`p`.`Referencia_1_personal` AS `Referencia_1_personal`,
			`p`.`Referencia_2_personal` AS `Referencia_2_personal`,
			`p`.`Direccion_dom_personal` AS `Direccion_dom_personal`,
			`p`.`Estado_civil_personal` AS `Estado_civil_personal`,
			`p`.`Numero_hijos_personal` AS `Numero_hijos_personal`,
			`p`.`Observacion_1_personal` AS `Observacion_1_personal`,
			`p`.`Observacion_2_personal` AS `Observacion_2_personal`,
			`p`.`Felcc` AS `Felcc`,`p`.`Curriculum_personal` AS `Curriculum_personal`,
			`p`.`Croquis_personal` AS `Croquis_personal`,
			`p`.`Fac_luz_personal` AS `Fac_luz_personal`,`p`.`Fac_agua_personal` AS `Fac_agua_personal`,
			`p`.`Licencia_conducir` AS `Licencia_conducir`,
			`p`.`Foto_personal` AS `Foto_personal`,`p`.`Prueba_psic` AS `Prueba_psic`,
			`p`.`Id_estado_personal` AS `Id_estado_personal`,`a`.`Id_asignacion` AS `Id_asignacion`,
			`a`.`Cod_asignacion` AS `Cod_asignacion`,`a`.`Descripcion` AS `Descripcion`,`a`.`Fecha_ingreso` AS `Fecha_ingreso`,
			`a`.`Fecha_salida` AS `Fecha_salida`,`a`.`Registro` AS `Registro`,`a`.`Id_proveedor_a` AS `Id_proveedor_a`,
			`a`.`Id_personal_a` AS `Id_personal_a`,`a`.`Id_cargo_a` AS `Id_cargo_a`,`a`.`Id_estado_a` AS `Id_estado_a`,
			`a`.`Regional` AS `Regional`,`c`.`Id_cargo` AS `Id_cargo`,`c`.`Nombre_cargo` AS `Nombre_cargo`,
			`c`.`Descripcion_cargo` AS `Descripcion_cargo`,`c`.`Id_estado_cargo` AS `Id_estado_cargo`,
			`pr`.`Razon_social_proveedor` AS `Razon_social_proveedor`,`pr`.`NIT` AS `NIT`,
			`pr`.`Nombre_rep_proveedor` AS `Nombre_rep_proveedor`,`pr`.`Direccion_proveedor` AS `Direccion_proveedor`,
			`pr`.`Telefono_1_proveedor` AS `Telefono_1_proveedor`,`pr`.`Telefono_2_proveedor` AS `Telefono_2_proveedor` 
			from (((`personal` `p` join `asignacion_personal` `a`) join `cargo` `c`) join `proveedor` `pr`) 
			where ((`p`.`Id_personal` = `a`.`Id_personal_a`) and (`a`.`Id_estado_a` = 1) 
				and (`a`.`Id_cargo_a` = `c`.`Id_cargo`) and (`pr`.`Id_proveedor` = `a`.`Id_proveedor_a`) AND `a`.`Id_asignacion`=$id)");
		return $r->row();
	
	}
	public function editar_personal($id,$data)
	{
		$this->db->where('Id_personal', $id);
		$this->db->update('personal', $data);
	}
	public function editar_asig_turno($id,$data)
	{
		$this->db->where('Id_asignacion', $id);
		$this->db->update('asignacion_personal', $data);
	}





















	



//*************************************CARGO*********************************************
	public function ListarCargo()
	{
		$r = $this->db->query("select * from cargo where estado='Activo'");
		return $r->result();
	}
	public function guardar_cargo($data)
	{
		$this->db->insert("cargo",$data);
	}
	public function BuscarCargo($id)
	{
		$r = $this->db->query("select * from cargo where idCargo=$id");
		return $r->row();
	}
	public function modificar_cargo($id,$data)
	{
		$this->db->where('idCargo', $id);
		$this->db->update('cargo', $data);
	}
	
	//*************************************ASIGNAR TURNO*********************************************

	public function ListarAsignarTurno()
	{
		
		$r = $this->db->query(
			"SELECT  `cargo`.`nombreCargo` ,  `asignacion_turnos`.`estado`,`asignacion_turnos`.`descripcionTurno`, `asignacion_turnos`.`idAsignacionTurnos` , `asignacion_turnos`.`fechaIngreso`, `asignacion_turnos`.`fechaSalida` ,`personal`.`nombrePersonal` ,  `personal`.`apPaternoPersonal` ,  `personal`.`apMaternoPersonal` ,  `personal`.`especialidad` ,  `turno`.`nombreTurno` 
			FROM  `asignacion_turnos` 
			INNER JOIN  `cargo` ON  `asignacion_turnos`.`cargo_idCargo` =  `cargo`.`idCargo` 
			INNER JOIN  `personal` ON  `asignacion_turnos`.`personal_idPersonal` =  `personal`.`idPersonal` 
			INNER JOIN  `turno` ON  `asignacion_turnos`.`turno_idTurno` =  `turno`.`idTurno` 
			");
		return $r->result();
	} 
	
	public function BuscarAsignacionTurno($id)
	{
		$r = $this->db->query("select `cargo`.`nombreCargo` ,  `asignacion_turnos`.`estado`,`asignacion_turnos`.`descripcionTurno`, `asignacion_turnos`.`idAsignacionTurnos` , `asignacion_turnos`.`fechaIngreso`, `asignacion_turnos`.`fechaSalida` ,`personal`.`nombrePersonal` ,  `personal`.`apPaternoPersonal` ,  `personal`.`apMaternoPersonal` ,  `personal`.`especialidad` ,  `turno`.`nombreTurno` 
			FROM  `asignacion_turnos`,`cargo`,`personal`,`turno` where `idAsignacionTurnos`=$id and `idCargo`= `cargo_idCargo` and `idPersonal`=`personal_idPersonal` and `idTurno`=`turno_idTurno`");
		return $r->row();
	}
	public function modificar_asig_turno($id,$data)
	{
		$this->db->where('idAsignacionTurnos', $id);
		$this->db->update('asignacion_turnos', $data);
	}

	
}

/* End of file Personal.php */
/* Location: ./application/models/Personal.php */