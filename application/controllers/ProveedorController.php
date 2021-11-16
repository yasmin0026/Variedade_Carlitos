<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProveedorController extends CI_Controller {

	
	public function __construct(){

		parent::__construct();
		$this->load->model('ProveedorModel');
		$this->load->model('PermisosModel');
		
	}

	public function index()
	{

		if ($this->session->userdata('is_logued_in') === TRUE) {	
			$data = array(
				'icon' => '../assets/images/favicon.png',
				'page_title' => 'Sistema de Inventario',
				'view' => 'proveedores/proveedor',
				'data_view' => array()
			);

			$data['proveedor'] = $this->ProveedorModel->allProveedor();
			$this->load->view('template/main_view',$data);
		}else{
			$this->load->view('login');
		}
	}

	public function nuevoProveedor()
	{
		if ($this->session->userdata('is_logued_in') === TRUE) {	
			$data = array(
				'page_title' => 'Editar Estado de Pago',
				'view' => 'proveedores/addProveedor',
				'data_view' => array()
			);

			
			$this->load->view('template/main_view',$data);
		}else{
			$this->load->view('login');
		}
	}

	public function insertProveedor()
	{
		if ($this->session->userdata('is_logued_in') === TRUE) {	
			$data = array(
				'PROVEEDOR_PRODUCTO' => $this->input->post('proveedor')
			);

			$this->ProveedorModel->insertProveedor($data);
			redirect('ProveedorController/index');
		}else{
			$this->load->view('login');
		}
	}

	public function editarProveedor($ID_PROVEEDOR)
	{
		if ($this->session->userdata('is_logued_in') === TRUE) {	
			$data = array(
				'page_title' => 'Editar proveedor',
				'view' => 'proveedores/addProveedor',
				'data_view' => array()
			);

			$data['update'] = $this->ProveedorModel->obtenerProveedor($ID_PROVEEDOR);
			$this->load->view('template/main_view',$data);
		}else{
			$this->load->view('login');
		}
	}

	public function updateProveedor()
	{
		if ($this->session->userdata('is_logued_in') === TRUE) {	
			$stock = array(
				'PROVEEDOR_PRODUCTO' => $this->input->post('proveedor'),
				'ID_PROVEEDOR' => $this->input->post('id_proveedor')
			);

			$this->ProveedorModel->updateProveedor($stock);
			redirect('ProveedorController/index');
		}else{
			$this->load->view('login');
		}
	}

	public function eliminarProveedor($ID_PROVEEDOR)
	{
		if ($this->session->userdata('is_logued_in') === TRUE) {	
			$this->ProveedorModel->deleteProveedor($ID_PROVEEDOR);
			
			redirect('ProveedorController/index');
		}else{
			$this->load->view('login');
		}
	}
	
}