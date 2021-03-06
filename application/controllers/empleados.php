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

	private function noEsValidoFormulario() {
        return $this->form_validation->run() === false;
    }

    private function validarNombre() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nombre', 'El nombre ', 'is_unique[empleados.nombre]');
    }


	public function guardar()
	{

		if($this->input->post())
		{
			$this->validarNombre();
        if ($this->noEsValidoFormulario()) {
            // var_dump(validation_errors());
            echo "<script>alert('Ya existe un empleado con ese nombre')
             window.location= '".base_url()."'
            </script>";
        } else {
			try
			{
				$this->db->trans_begin();
				$this->empleadosModel->setempleado($_POST);
				$this->db->trans_commit();

			}
			catch(PDOException $ex)
			{
				$this->db->trans_rollback();
			}
		
			header("Location:".base_url());
		}
		}
	}

	public function modificar(string $nombre = null)
	{
		
		if (is_null($nombre))
		{
			header('location:'.base_url());
		}
		$empleado = $this->empleadosModel->getempleado($nombre);

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

			$this->validarNombre();
	        if ($this->noEsValidoFormulario()) {
	            // var_dump(validation_errors());
	            echo "<script>alert('Ya existe un empleado con ese nombre')
	             window.location= '".base_url()."'
	            </script>";
	        } else {
			$nombre_ant=$_POST['nombre_ant'];
			unset($_POST['nombre_ant']);
			if ($this->empleadosModel->updateempleado($nombre_ant, $_POST))
			{
				header("Location:".base_url());
			}
			else
			{
				header("Location:".base_url().'empleados/modificar/'.$_POST['nombre']);
			}
		}
	}
	}

	public function eliminar(string $nombre = null)
	{
		if (is_null($nombre))
		{
			header('location:'.base_url());
		}
		$this->empleadosModel->deleteempleado($nombre);
		header('location:'.base_url());
	}

	public function imprimir()
	{
		// include 'xlsxwriter.php';

		$data = array(
		    array('nombre','apellido','edad','cargo')
		);
		$resultado=$this->db->query("SELECT * FROM empleados")->result_array();

		foreach ($resultado as $row)
		{
		        array_push($data, $row);
		}

		$writer = $this->xlsxwriter;
		$writer->writeSheet($data);
		$writer->writeToFile('listado.xlsx');
		header('location:'.base_url());
	}
}
