<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Empleados extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	
	function __construct()
	{
		parent::__construct();
		$this->load->model("empleadosModel");
	}
	public function index()
	{   
		
		$empleados = $this->empleadosModel->getempleados();
		$this->layout->view("empleados", compact('empleados'));
	}

	public function guardar()
	{
		if($this->input->post())
		{
			$nombre = $_POST["nombre"];
			$apellido = $_POST["apellido"];
			$estatura = $_POST["estatura"];
			try
			{
				$this->db->trans_begin();
				$this->empleadosModel->setempleado($_POST);
				$id_empleado = $this->db->insert_id();
				$codigo = 'ES'.$id_empleado;
				$this->empleadosModel->setCodigo($id_empleado, $codigo);
				$this->db->trans_commit();

			}
			catch(PDOException $ex)
			{
				$this->db->trans_rollback();
			}
		
			header("Location:".base_url());
		}
	}

	public function modificar(int $id_empleado = null)
	{
		if (is_null($id_empleado))
		{
			header('location:'.base_url());
		}
		$empleado = $this->empleadosModel->getempleado($id_empleado);
		
		if(!($empleado))
		{
			header('location:'.base_url());
		}
		$this->layout->view('modificar', compact('empleado'));
	}

	public function actualizar()
	{
		if($this->input->post())
		{
			if ($this->empleadosModel->updateempleado($_POST['id_empleado'], $_POST))
			{
				header("Location:".base_url());
			}
			else
			{
				header("Location:".base_url().'empleados/modificar/'.$_POST['id_empleado']);
			}
		}
	}

	public function eliminar(int $id_empleado = null)
	{
		if (is_null($id_empleado))
		{
			header('location:'.base_url());
		}
		$this->empleadosModel->deleteempleado($id_empleado);
		header('location:'.base_url());
	}
}
