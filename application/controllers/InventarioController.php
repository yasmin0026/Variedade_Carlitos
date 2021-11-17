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
				'view' => 'inventario/Ropa',
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
			$data['proveedor'] = $this->Inventario->getProveedor();
			$data['pago'] = $this->Inventario->getPago();
			$data['stock'] = $this->Inventario->getStock();
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
				'TOTAL_DOCENA' => $this->input->post('costo_docena'),
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
	

	public function registrarInventario(){
		if ($this->session->userdata('is_logued_in') === TRUE) {	
			
			/*----------------------- TBL_ENTRADA --------------------------------*/

			for($i=0; $i < count($_POST['id_producto']); $i++){

				$entrada = array(
					'FECHA_ENTRADA' => $this->input->post('fecha'),
					'PRECIO_UNIDAD' => $this->input->post('unitario')[$i],
					'PRECIO_DOCENA' => $this->input->post('costo_docena')[$i],
					'STOCK_ACTUAL' => $this->input->post('cantidad')[$i]
				);

				$last_entrada = $this->Inventario->insertEntrada($entrada);
				

				/*---------------------- TBL_SALIDA ---------------------------------*/

				$salida = array(
					'FECHA_SALIDA' => $this->input->post('fecha'),
					'VENTA_FINAL' => $this->input->post('salida'),
					'CANTIDAD_SALIDA' => $this->input->post('salida'),

				);

				$last_salida = $this->Inventario->insertSalida($salida);


				/*-------------------- INTER_ENTRADA_SALIDA ------------------------*/


				$intermedia = array(
					'COD_DEUDA' => $this->input->post('cod_deuda'),
					'ID_ENTRADA' => $last_entrada,
					'ID_PRODUCTO' => $this->input->post('id_producto')[$i],
					'ID_SALIDA' => $last_salida,
					'FECHA_SALIDA' => $this->input->post('fecha'),
					'ID_ESTADO_STOCK' => $this->input->post('id_estado_stock'),
					'STOCK_FINAL' => $this->input->post('stock_final')[$i]
				);

				$this->Inventario->insertIntermedia($intermedia);


				/*-------------------- MOVIMIENTOS ------------------------*/


				$movimientos = array(
					'COD_DEUDA' => $this->input->post('cod_deuda'),
					'ID_PRODUCTO' => $this->input->post('id_producto'),
					'ID_PROVEEDOR' => $this->input->post('id_proveedor'),
					'FECHA_MOVIMIENTO' => $this->input->post('fecha'),
					'DEUDA_PROVEEDOR' => $this->input->post('costo_docena'),
					'ABONO_PROVEEDOR' => $this->input->post('ABONO_PROVEEDOR'),
					'TOTAL_A_PAGAR' => ($this->input->post('costo_docena') - $this->input->post('ABONO_PROVEEDOR')),
					'ID_ESTADO_PAGO' => $this->input->post('id_estado_pago'),
					'ID_USUARIO' => $this->session->userdata('id_usuario')
				);

				$this->Inventario->insertMovimientos($movimientos);

			}

			redirect(base_url().'InventarioController/index');
		}else{
			$this->load->view('login');
		}

	}




	/*----------------------------------- VISTAS DE CATEGORIA ----------------------------------------------------------*/


	public function accesorios()
	{

		if ($this->session->userdata('is_logued_in') === TRUE) {	
			$data = array(
				'icon' => '../assets/images/favicon.png',
				'page_title' => 'Sistema de Inventario',
				'view' => 'inventario/Accesorios',
				'data_view' => array()
			);
			$data['inventario'] = $this->Inventario->getAccesorio();
			$this->load->view('template/main_view',$data);
		}else{
			$this->load->view('login');
		}
	}


	public function pantalon()
	{

		if ($this->session->userdata('is_logued_in') === TRUE) {	
			$data = array(
				'icon' => '../assets/images/favicon.png',
				'page_title' => 'Sistema de Inventario',
				'view' => 'inventario/Pantalon',
				'data_view' => array()
			);
			$data['inventario'] = $this->Inventario->getPantalon();
			$this->load->view('template/main_view',$data);
		}else{
			$this->load->view('login');
		}
	}











}
