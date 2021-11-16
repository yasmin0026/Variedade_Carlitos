<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StockController extends CI_Controller {

	
	public function __construct(){

		parent::__construct();
		$this->load->model('StockModel');
		$this->load->model('PermisosModel');
	}

	public function index()
	{

		if ($this->session->userdata('is_logued_in') === TRUE) {	
			$data = array(
				'icon' => '../assets/images/favicon.png',
				'page_title' => 'Sistema de Inventario',
				'view' => 'stock/stock',
				'data_view' => array()
			);

			$data['stock'] = $this->StockModel->allStock();
			$this->load->view('template/main_view',$data);
		}else{
			$this->load->view('login');
		}
	}

	public function nuevoStock()
	{
		if ($this->session->userdata('is_logued_in') === TRUE) {
			$data = array(
				'page_title' => 'Editar Estado de Pago',
				'view' => 'stock/addStock',
				'data_view' => array()
			);

			
			$this->load->view('template/main_view',$data);
		}else{
			$this->load->view('login');
		}
	}

	public function insertStock()
	{
		if ($this->session->userdata('is_logued_in') === TRUE) {
			$data = array(
				'ESTADO_STOCK' => $this->input->post('estado_stock')
			);

			$this->StockModel->insertStock($data);
			redirect('StockController/index');
		}else{
			$this->load->view('login');
		}
	}

	public function editarStock($ID_ESTADO_STOCK)
	{
		if ($this->session->userdata('is_logued_in') === TRUE) {
			$data = array(
				'page_title' => 'Editar Estado de Pago',
				'view' => 'stock/addStock',
				'data_view' => array()
			);

			$data['update'] = $this->StockModel->obtenerStock($ID_ESTADO_STOCK);
			$this->load->view('template/main_view',$data);
		}else{
			$this->load->view('login');
		}
	}

	public function updateStock()
	{
		if ($this->session->userdata('is_logued_in') === TRUE) {
			$stock = array(
				'ESTADO_STOCK' => $this->input->post('estado_stock'),
				'ID_ESTADO_STOCK' => $this->input->post('id_estado_stock')
			);

			$this->StockModel->updateStock($stock);
			redirect('StockController/index');
		}else{
			$this->load->view('login');
		}
	}

	public function eliminarStock($ID_ESTADO_STOCK)
	{
		if ($this->session->userdata('is_logued_in') === TRUE) {
			$this->StockModel->deleteStock($ID_ESTADO_STOCK);
			
			redirect('StockController/index');
		}else{
			$this->load->view('login');
		}
	}
	
}