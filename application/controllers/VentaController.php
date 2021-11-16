<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class VentaController extends CI_Controller {

	
	public function __construct(){

		parent::__construct();
		$this->load->model('VentaModel');
		$this->load->model('PermisosModel');
		
	}

	public function index()
	{

		if ($this->session->userdata('is_logued_in') === TRUE) {	
			$data = array(
				'icon' => '../assets/images/favicon.png',
				'page_title' => 'Sistema de Inventario',
				'view' => 'venta/nuevaVenta',
				'data_view' => array()
			);

			$data['inventario'] = $this->VentaModel->obtener_inventario();
			$this->load->view('template/main_view',$data);
		}else{
			$this->load->view('login');
		}
	}

	
}