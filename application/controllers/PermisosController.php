<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PermisosController extends CI_Controller {

	
	public function __construct(){

		parent::__construct();
		$this->load->model('PermisosModel');
		
	}

	public function index()
	{

		if ($this->session->userdata('is_logued_in') === TRUE) {	
			$data = array(
				'icon' => '../assets/images/favicon.png',
				'page_title' => 'Sistema de Inventario',
				'view' => 'Permisos/permisos',
				'data_view' => array()
			);
			
			$data['menu'] = $this->PermisosModel->getMenu();
			$this->load->view('template/main_view',$data);
		}else{
			$this->load->view('login');
		}
	}

	public function nuevoPermiso(){
		if($this->session->userdata('is_logued_in') === TRUE){
			$data = array(
				'page_title' => 'Nuevo Permiso',
				'view' => 'Permisos/formPermiso',
				'data_view' => array()
			);

			$data['menu'] = $this->PermisosModel->getMenu();

			$data['rol'] = $this->PermisosModel->getRol();
			$data['modulo'] = $this->PermisosModel->getModuloOp();
			$this->load->view('template/main_view',$data);
		}else{
			$this->load->view('login');
		}
	}

	
	public function insertPermiso(){
		$datos = array(
			'ID_ROL' => $this->input->post('id_rol'),
			'ID_MODULO' => $this->input->post('id_modulo')
			
		);

		$this->PermisosModel->insertPermiso($datos);
		redirect('PermisosController/');
	}

	public function editarPermiso($id_menu)
	{
		if ($this->session->userdata('is_logued_in') === TRUE) {	
			$data = array(
				'page_title' => 'Actualizar Permiso',
				'view' => 'permisos/formPermiso',
				'data_view' => array()
			);

			$data['rol'] = $this->PermisosModel->getRol();
			$data['modulo'] = $this->PermisosModel->getModuloOp();
			$data['update'] = $this->PermisosModel->getMenuAll($id_menu);

			$this->load->view('template/main_view',$data);
		}else{
			$this->load->view('login');
		}
	}

	public function updatePermiso()
	{
		$datos = array(
			'ID_ROL' => $this->input->post('id_rol'),
			'ID_MODULO' => $this->input->post('id_modulo'),
			'ID_MENU' => $this->input->post('id_menu')
			
		);

		$this->PermisosModel->updatePermiso($datos);
		redirect('PermisosController/');
	}

	public function deletePermiso($id_menu)
	{
		$this->PermisosModel->deletePermiso($id_menu);
		redirect('PermisosController/');
	}

}
