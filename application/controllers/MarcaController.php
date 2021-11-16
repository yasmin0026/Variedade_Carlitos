<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MarcaController extends CI_Controller {

	
	public function __construct(){

		parent::__construct();

		$this->load->model('MarcaModel');
		$this->load->helper('form');
		$this->load->model('PermisosModel');
	}

	public function index()
	{
		if ($this->session->userdata('is_logued_in') === TRUE) {	
			$data = array(
				'page_title' => 'Marca',
				'view' => 'marca/marca',
				'data_view' => array()
			);

			$data['marca'] = $this->MarcaModel->obtener_marca();
			$this->load->view('template/main_view',$data);
		}else{
			$this->load->view('login');
		}
	}

	
	public function nuevo_marca()
	{
		if ($this->session->userdata('is_logued_in') === TRUE) {	
			$data = array(
				'page_title' => 'Nuevo Marca',
				'view' => 'marca/AddMarca',
				'data_view' => array()
			);

			$this->load->view('template/main_view',$data);
		}else{
			$this->load->view('login');
		}
	}

	public function insert_marca()
	{
		if ($this->session->userdata('is_logued_in') === TRUE) {	
			$data = array(
				'NOMBRE_MARCA' => $this->input->post('marca')
			);

			$this->MarcaModel->insert_marca($data);
		$this->index(); //index
		redirect('MarcaController/');
	}else{
		$this->load->view('login');
	}
}

public function editar_marca($ID_MARCA)
{
	if ($this->session->userdata('is_logued_in') === TRUE) {	
		$data = array(
			'page_title' => 'Editar marca',
			'view' => 'marca/AddMarca',
			'data_view' => array()
		);

		$data['update'] = $this->MarcaModel->obtener_marca_update($ID_MARCA);
		$this->load->view('template/main_view',$data);
	}else{
		$this->load->view('login');
	}
}

public function update_marca()
{
	if ($this->session->userdata('is_logued_in') === TRUE) {	
		$marca = array(
			'NOMBRE_MARCA' => $this->input->post('marca'),
			'ID_MARCA' => $this->input->post('id_marca')
		);

		$this->MarcaModel->editar_marcas($marca);
		$this->index();
		redirect('MarcaController/');
	}else{
		$this->load->view('login');
	}
}

public function eliminar_marca($ID_MARCA)
{
	if ($this->session->userdata('is_logued_in') === TRUE) {	
		$this->MarcaModel->delete_marca($ID_MARCA);
		$this->index();
		redirect('MarcaController/');
	}else{
		$this->load->view('login');
	}
}
}
