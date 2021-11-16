<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RolController extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Roles');
		$this->load->model('PermisosModel');
	}
	public function index()
	{
		if ($this->session->userdata('is_logued_in') === TRUE) {
			$data = array(
				'page_title' => 'Roles',
				'view' => 'roles/roles',
				'data_view' => array()
			);

			$data['roles'] = $this->Roles->obtener_roles();
			$this->load->view('template/main_view',$data);
		}else{
			$this->load->view('login');
		}
	}

	public function nuevo_rol()
	{
		if ($this->session->userdata('is_logued_in') === TRUE) {
			$data = array(
				'page_title' => 'Nuevo rol',
				'view' => 'roles/AddRol',
				'data_view' => array()
			);

			$this->load->view('template/main_view',$data);
		}else{
			$this->load->view('login');
		}
	}

	public function insert_rol()
	{
		if ($this->session->userdata('is_logued_in') === TRUE) {
			$data = array(
				'NOMBRE_ROL' => $this->input->post('nombre_rol')
			);

			$this->Roles->insert_rol($data);
			$this->index();
		}else{
			$this->load->view('login');
		}
	}
	//para las vistas normales dejar el template/main_view
	//para los crud de actualizar dejar el template/main porque si no da conflicto el navbar con el css del crud
	public function editar_rol($ID_ROL)
	{
		if ($this->session->userdata('is_logued_in') === TRUE) {
			$data = array(
				'page_title' => 'Editar rol',
				'view' => 'roles/AddRol',
				'data_view' => array()
			);

			$data['update'] = $this->Roles->obtener_rol($ID_ROL);
			$this->load->view('template/main_view',$data);
		}else{
			$this->load->view('login');
		}
	}

	public function update_rol()
	{
		if ($this->session->userdata('is_logued_in') === TRUE) {
			$rol = array(
				'NOMBRE_ROL' => $this->input->post('nombre_rol'),
				'ID_ROL' => $this->input->post('id_rol')
			);

			$this->Roles->editar_rol($rol);
			$this->index();
		}else{
			$this->load->view('login');
		}
	}
//redireccionar al controlador porque si no se friega el diseño tanto del controlador como del navbar
	public function eliminar_rol($ID_ROL)
	{
		$data = $this->Roles->getUsuarios();
		$info;
		foreach($data as $d){
			$info = $d->id_rol;
		}

		if ($this->session->userdata('is_logued_in') === TRUE) {

			if($id_rol == 1){
				echo "No se puede eliminar el usuario administrador";

			}elseif($info === $id_rol){
				echo "No se puede eliminar, Un usuario esta usando este rol";
				redirect('RolController/');

			}else{
				$this->Roles->delete_rol($ID_ROL);
				redirect('RolController/');
			}
			
		}else{
			$this->load->view('login');
		}


		redirect('RolController/');

	}
}