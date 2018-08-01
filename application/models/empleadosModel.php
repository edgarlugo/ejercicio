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

	public function updateempleado(string $nombre, array $datos)
	{
		return $this->db->where('nombre', $nombre)->update('empleados', $datos);
	}

	public function getempleado(string $nombre)
	{
		return $this->db->where('nombre', $nombre)->get('empleados')->row();
	}


	public function deleteempleado(string $nombre)
	{
		return $this->db->where('nombre', $nombre)->delete('empleados');
	}
}