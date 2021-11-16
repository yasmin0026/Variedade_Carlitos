<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class InventarioController extends CI_Controller {

	
	public function __construct(){

		parent::__construct();
		$this->load->model('Inventario');
		$this->load->model('PermisosModel');
		$this->load->library('cart'); 
		
	}

	public function inicio()
	{

		if ($this->session->userdata('is_logued_in') === TRUE) {	
			$data = array(
				'icon' => '../assets/images/favicon.png',
				'page_title' => 'Sistema de Inventario',
				'view' => 'inventario/inventario',
				'data_view' => array()
			);
			$data['inventario'] = $this->Inventario->obtener_inventario();
			$this->load->view('template/main_view',$data);
		}else{
			$this->load->view('login');
		}
	}


	public function index()
	{

		if ($this->session->userdata('is_logued_in') === TRUE) {	
			$data = array(
				'icon' => '../assets/images/favicon.png',
				'page_title' => 'Sistema de Inventario',
				'view' => 'inventario/verInventario',
				'data_view' => array()
			);

			$data['lista'] = $this->Inventario->getLista();
			$this->load->view('template/main_view',$data);
		}else{
			$this->load->view('login');
		}
	}




	public function nuevoInventario(){
		if ($this->session->userdata('is_logued_in') === TRUE) {	
			
			$data = array(
				'ID_PRODUCTO' => $this->input->post('id_producto'),
				'NOMBRE_PRODUCTO' => $this->input->post('nombre_producto'),
				'TIPO_CATEGORIA' => $this->input->post('tipo_categoria'),
				'NOMBRE_COLOR' => $this->input->post('nombre_color'),
				'TIPO_GENERO' => $this->input->post('tipo_genero'),
				'TALLA' => $this->input->post('talla'),
				'NOMBRE_MARCA' => $this->input->post('nombre_marca'),
				'CANTIDAD' => $this->input->post('cantidad')
			);



			$this->Inventario->insertLista($data);

			redirect(base_url().'InventarioController/index');
		}else{
			$this->load->view('login');
		}

	}

	public function updateInventario(){
		if ($this->session->userdata('is_logued_in') === TRUE) {	
			
			$data = array(
				'CANTIDAD' => $this->input->post('cantidad'),
				'UNITARIO' => $this->input->post('unitario'),
				'TOTAL_DOCENA' => ($this->input->post('cantidad')*$this->input->post('unitario')),
				'ID_LISTA' => $this->input->post('id_lista')
			);

			

			$this->Inventario->updateLista($data);

			redirect(base_url().'InventarioController/index');
		}else{
			$this->load->view('login');
		}

	}



	public function eliminarProd($ID_LISTA)
	{
		if ($this->session->userdata('is_logued_in') === TRUE) {	

			$this->Inventario->eliminarProd($ID_LISTA);
			redirect('InventarioController/');
		}else{
			$this->load->view('login');
		}


	}
	



	

}
