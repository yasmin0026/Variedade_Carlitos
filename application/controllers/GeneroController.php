<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GeneroController extends CI_Controller {

	
	public function __construct(){

		parent::__construct();

		$this->load->model('GeneroModel');
		$this->load->helper('form');
		$this->load->model('PermisosModel');
		
	}

	public function index()
	{	
		if ($this->session->userdata('is_logued_in') === TRUE) {	
			$data = array(
				'page_title' => 'Genero',
				'view' => 'genero/genero',
				'data_view' => array()
			);

			$data['genero'] = $this->GeneroModel->obtener_genero();
			$this->load->view('template/main_view',$data);
		}else{
			$this->load->view('login');
		}
	}
	
	public function nuevo_genero()
	{
		if ($this->session->userdata('is_logued_in') === TRUE) {	
			$data = array(
				'page_title' => 'Nuevo Genero',
				'view' => 'genero/AddGenero',
				'data_view' => array()
			);

			$this->load->view('template/main_view',$data);
		}else{
			$this->load->view('login');
		}
	}

	public function insert_genero()
	{
		if ($this->session->userdata('is_logued_in') === TRUE) {	
			$data = array(
				'TIPO_GENERO' => $this->input->post('genero')
			);

			$this->GeneroModel->insert_genero($data);
			redirect('GeneroController/');
		}else{
			$this->load->view('login');
		}
	}

	public function editar_genero($ID_GENERO)
	{
		if ($this->session->userdata('is_logued_in') === TRUE) {	
			$data = array(
				'page_title' => 'Editar Genero',
				'view' => 'genero/AddGenero',
				'data_view' => array()
			);

			$data['update'] = $this->GeneroModel->obtener_genero_update($ID_GENERO);
			$this->load->view('template/main_view',$data);
		}else{
			$this->load->view('login');
		}
	}

	public function update_genero()
	{
		if ($this->session->userdata('is_logued_in') === TRUE) {	
			$marca = array(
				'TIPO_GENERO' => $this->input->post('genero'),
				'ID_GENERO' => $this->input->post('id_genero')
			);

			$this->GeneroModel->editar_generos($marca);
			redirect('GeneroController/');
		}else{
			$this->load->view('login');
		}
	}

	public function eliminar_genero($ID_GENERO)
	{
		if ($this->session->userdata('is_logued_in') === TRUE) {	
			$this->GeneroModel->delete_genero($ID_GENERO);
			redirect('GeneroController/');}else{
				$this->load->view('login');
			}
		}
	}
