<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PagoController extends CI_Controller {

	
	public function __construct(){

		parent::__construct();
		$this->load->model('PagoModel');
		$this->load->model('PermisosModel');
	}

	public function index()
	{

		if ($this->session->userdata('is_logued_in') === TRUE) {	
			$data = array(
				'icon' => '../assets/images/favicon.png',
				'page_title' => 'Sistema de Inventario',
				'view' => 'estado_pago/pago',
				'data_view' => array()
			);

			$data['pago'] = $this->PagoModel->allPago();
			$this->load->view('template/main_view',$data);
		}else{
			$this->load->view('login');
		}
	}


	public function nuevoPago()
	{
		if ($this->session->userdata('is_logued_in') === TRUE) {	
			$data = array(
				'page_title' => 'Nueva estado de pago',
				'view' => 'estado_pago/addPago',
				'data_view' => array()
			);

			$this->load->view('template/main_view',$data);
		}else{
			$this->load->view('login');
		}
	}


	public function insertPago()
	{
		if ($this->session->userdata('is_logued_in') === TRUE) {	
			$data = array(
				'ESTADO_PAGO' => $this->input->post('pago')
			);

			$this->PagoModel->insertPago($data);
			redirect('PagoController/index');
		}else{
			$this->load->view('login');
		}
	}


	public function editarPago($ID_ESTADO_PAGO)
	{
		if ($this->session->userdata('is_logued_in') === TRUE) {	
			$data = array(
				'page_title' => 'Editar estado de pago',
				'view' => 'estado_pago/addPago',
				'data_view' => array()
			);

			$data['update'] = $this->PagoModel->obtenerPago($ID_ESTADO_PAGO);
			$this->load->view('template/main_view',$data);
		}else{
			$this->load->view('login');
		}
	}


	public function updatePago()
	{
		if ($this->session->userdata('is_logued_in') === TRUE) {	
			$pago = array(
				'ESTADO_PAGO' => $this->input->post('pago'),
				'ID_ESTADO_PAGO' => $this->input->post('id_estado_pago')
			);

			$this->PagoModel->updatePago($pago);
			redirect('PagoController/index');
		}else{
			$this->load->view('login');
		}
	}



	public function eliminarPago($ID_ESTADO_PAGO)
	{
		if ($this->session->userdata('is_logued_in') === TRUE) {	
			$this->PagoModel->deletePago($ID_ESTADO_PAGO);

			redirect('PagoController/index');
		}else{
			$this->load->view('login');
		}
	}
	
}