<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CategoriaController extends CI_Controller {

	
	public function __construct(){

		parent::__construct();
		$this->load->model('CategoriaModel');
		$this->load->model('PermisosModel');
		
	}

	public function index()
	{

		if ($this->session->userdata('is_logued_in') === TRUE) {	
			$data = array(
				'icon' => '../assets/images/favicon.png',
				'page_title' => 'Sistema de Inventario',
				'view' => 'categoria/categoria',
				'data_view' => array()
			);
			$data['categoria'] = $this->CategoriaModel->categoriaAll();
			$this->load->view('template/main_view',$data);
		}else{
			$this->load->view('login');
		}
	}

	public function nuevaCategoria()
	{
		if ($this->session->userdata('is_logued_in') === TRUE) {
			$data = array(
				'page_title' => 'Nueva categoria',
				'view' => 'categoria/addCategoria',
				'data_view' => array()
			);

			$this->load->view('template/main_view',$data);
		}else{
			$this->load->view('login');
		}
	}

	public function insertCategoria()
	{	
		if ($this->session->userdata('is_logued_in') === TRUE) {
			$data = array(
				'TIPO_CATEGORIA' => $this->input->post('tipo_categoria')
			);

			$this->CategoriaModel->insertCategoria($data);
			redirect('CategoriaController/index');
			
		}else{
			$this->load->view('login');
		}
	}

	public function editarCategoria($ID_CATEGORIA)
	{
		if ($this->session->userdata('is_logued_in') === TRUE) {
			$data = array(
				'page_title' => 'Editar categoria',
				'view' => 'categoria/addCategoria',
				'data_view' => array()
			);

			$data['update'] = $this->CategoriaModel->obtenerCategoria($ID_CATEGORIA);
			$this->load->view('template/main_view',$data);
		}else{
			$this->load->view('login');
		}
	}

	public function updateCategoria()
	{
		if ($this->session->userdata('is_logued_in') === TRUE) {
			$categoria = array(
				'TIPO_CATEGORIA' => $this->input->post('tipo_categoria'),
				'ID_CATEGORIA' => $this->input->post('id_categoria')
			);

			$this->CategoriaModel->updateCategoria($categoria);
			
			redirect('CategoriaController/index');
		}else{
			$this->load->view('login');
		}
	}

	public function eliminarCategoria($ID_CATEGORIA)
	{
		if ($this->session->userdata('is_logued_in') === TRUE) {
			$this->CategoriaModel->deleteCategoria($ID_CATEGORIA);
			
			redirect('CategoriaController/index');
		}else{
			$this->load->view('login');
		}
	}
	 
}
