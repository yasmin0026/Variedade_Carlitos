<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TallaController extends CI_Controller {

	
	public function __construct(){

		parent::__construct();
		$this->load->model('TallaModel');
		$this->load->model('PermisosModel');
	}

	public function index()
	{

		if ($this->session->userdata('is_logued_in') === TRUE) {	
			$data = array(
				'icon' => '../assets/images/favicon.png',
				'page_title' => 'Sistema de Inventario',
				'view' => 'talla/talla',
				'data_view' => array()
			);

			$data['talla'] = $this->TallaModel->obtener_talla();
			$this->load->view('template/main_view',$data);
		}else{
			$this->load->view('login');
		}
	}


	public function nueva_talla()
	{
		if ($this->session->userdata('is_logued_in') === TRUE) {	
			$data = array(
				'page_title' => 'Nueva Talla',
				'view' => 'talla/AddTalla',
				'data_view' => array()
			);

			$this->load->view('template/main_view',$data);
		}else{
			$this->load->view('login');
		}
	}

	public function insert_talla()
	{
		if ($this->session->userdata('is_logued_in') === TRUE) {	
			$data = array(
				'TALLA' => $this->input->post('talla')
			);

			$this->TallaModel->insert_talla($data);
			redirect('TallaController/index');
		}else{
			$this->load->view('login');
		}
	}

	public function editar_talla($ID_TALLA)
	{
		if ($this->session->userdata('is_logued_in') === TRUE) {	
			$data = array(
				'page_title' => 'Editar talla',
				'view' => 'talla/AddTalla',
				'data_view' => array()
			);

			$data['update'] = $this->TallaModel->editar_update($ID_TALLA);
			$this->load->view('template/main_view',$data);
		}else{
			$this->load->view('login');
		}
	}

	public function update_talla()
	{
		if ($this->session->userdata('is_logued_in') === TRUE) {	
			$talla = array(
				'TALLA' => $this->input->post('talla'),
				'ID_TALLA' => $this->input->post('id_talla')
			);

			$this->TallaModel->update_talla($talla);
			redirect('TallaController/index');
		}else{
			$this->load->view('login');
		}
	}

	public function eliminar_talla($ID_TALLA)
	{
		if ($this->session->userdata('is_logued_in') === TRUE) {	
			$this->TallaModel->delete_talla($ID_TALLA);
			
			redirect('TallaController/index');
		}else{
			$this->load->view('login');
		}
	}
	
}