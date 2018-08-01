<?php

class empleadosModel extends CI_Model
{
	public function getempleados()
	{
		return $this->db->get('empleados')->result();
	}

	public function setempleado(array $datos)
	{
		return $this->db->insert('empleados', $datos);
	}

	public function updateempleado(int $id_empleado, array $datos)
	{
		return $this->db->where('id_empleado', $id_empleado)->update('empleados', $datos);
	}

	public function getempleado(int $id_empleado)
	{
		return $this->db->where('id_empleado', $id_empleado)->get('empleados')->row();
	}

	public function setCodigo(int $id_empleado, string $codigo)
	{
		$datos = array('codigo' => $codigo);
		return $this->db->where('id_empleado', $id_empleado)->update('empleados', $datos);
	}

	public function deleteempleado(int $id_empleado)
	{
		return $this->db->where('id_empleado', $id_empleado)->delete('empleados');
	}
}