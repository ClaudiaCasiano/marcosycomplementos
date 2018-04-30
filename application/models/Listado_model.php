<?php

class Listado_model extends CI_Model {


	public function getfilas()
	{
		$queryString = "CALL `sp_servicios_select`()";
		$query = $this->db->query($queryString);

		$r[0] = $this->db->error();
		$r[1] = $query->result_array();

		return $r;
	}

	public function buscar_custodio($v1)
	{
		$queryString = "CALL `sp_custodio_select`($v1)";
		$query = $this->db->query($queryString);

		$r[0] = $this->db->error();
		$r[1] = $query->result_array();

		return $r;
	}

	public function buscar_recurso($v1)
	{
		$queryString = "CALL `sp_recurso_select`($v1)";
		$query = $this->db->query($queryString);

		$r[0] = $this->db->error();
		$r[1] = $query->result_array();

		return $r;
	}

	public function guardar_servicio($v1, $v2)
	{
		$queryString = "CALL `sp_servicio_guardar`('$v1', '$v2')";
		$query = $this->db->query($queryString);

		$r[0] = $this->db->error();
		$r[1] = $query->result_array();

		return $r;
	}

	public function modificar_servicio($v1, $v2, $v3)
	{
		$queryString = "CALL `sp_servicio_modifica`('$v1', '$v2', '$v3')";
		$query = $this->db->query($queryString);

		$r[0] = $this->db->error();

		return $r;
	}

	public function eliminar_servicio($v1)
	{
		$queryString = "CALL `sp_servicio_delete`('$v1')";
		$query = $this->db->query($queryString);

		$r[0] = $this->db->error();

		return $r;
	}

	public function guardar_detalles($v1, $v2,$v3, $v4)
	{
		$queryString = "CALL `sp_detalle_servicio_insert`('$v1', '$v2',$v3, $v4)";
		$query = $this->db->query($queryString);

		$r[0] = $this->db->error();
		return $r;
	}
}