<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ColoresController extends CI_Controller {

	
	public function __construct(){

		parent::__construct();

		$this->load->model('ColoresModel');
		$this->load->helper('form');
		$this->load->model('PermisosModel');
		
	}


	public function index()
	{

		if ($this->session->userdata('is_logued_in') === TRUE) {	
			$data = array(
				'icon' => '../assets/images/favicon.png',
				'page_title' => 'Sistema de Inventario',
				'view' => 'productos',
				'data_view' => array()
			);
			
			$this->load->view('template/main_view',$data);
		}else{
			$this->load->view('login');
		}
	}


	public function vista()
	{
		if ($this->session->userdata('is_logued_in') === TRUE) {
			$data = array(
				'page_title' => 'Colores',
				'view' => 'colores/colores',
				'data_view' => array()
			);

			$data['colores'] = $this->ColoresModel->obtener_colores();
			$this->load->view('template/main_view',$data);
		}else{
			$this->load->view('login');
		}
	}

	public function nuevo_color()
	{
		if ($this->session->userdata('is_logued_in') === TRUE) {
			$data = array(
				'page_title' => 'Nuevo color',
				'view' => 'colores/AddColores',
				'data_view' => array()
			);

			$this->load->view('template/main_view',$data);
		}else{
			$this->load->view('login');
		}
	}

	public function insert_color()
	{	
		if ($this->session->userdata('is_logued_in') === TRUE) {
			$data = array(
				'NOMBRE_COLOR' => $this->input->post('color')
			);

			$this->ColoresModel->insert_color($data);
			redirect('ColoresController/vista');
		}else{
			$this->load->view('login');
		}
	}

	public function editar_color($ID_COLORES)
	{
		if ($this->session->userdata('is_logued_in') === TRUE) {
			$data = array(
				'page_title' => 'Editar color',
				'view' => 'colores/AddColores',
				'data_view' => array()
			);

			$data['update'] = $this->ColoresModel->obtener_color_update($ID_COLORES);
			$this->load->view('template/main_view',$data);
		}else{
			$this->load->view('login');
		}
	}

	public function update_color()
	{
		if ($this->session->userdata('is_logued_in') === TRUE) {
			$colores = array(
				'NOMBRE_COLOR' => $this->input->post('color'),
				'ID_COLORES' => $this->input->post('id_color')
			);

			$this->ColoresModel->editar_color($colores);
			$this->vista();
			redirect('ColoresController/vista');
		}else{
			$this->load->view('login');
		}
	}

	public function eliminar_color($ID_COLORES)
	{
		if ($this->session->userdata('is_logued_in') === TRUE) {
			$this->ColoresModel->delete_color($ID_COLORES);
			$this->vista();
			redirect('ColoresController/vista');
		}else{
			$this->load->view('login');
		}
	}
}
