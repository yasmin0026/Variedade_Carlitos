<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProductosController extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('ProductosModel');
		//$this->load->library('upload');
		$this->load->model('PermisosModel');
	}

	public function index()
	{

		if ($this->session->userdata('is_logued_in') === TRUE) {	
			$data = array(
				'icon' => '../assets/images/favicon.png',
				'page_title' => 'Sistema de Inventario',
				'view' => 'producto/productos',
				'data_view' => array()
			);
			//$this->load->view('template/main_view',$data);

			$data['producto'] = $this->ProductosModel->obtener_productos();
			$this->load->view('template/main_view', $data);

		}else{
			$this->load->view('login');
		}
	}

	public function vistaAddProducto()
	{

		if ($this->session->userdata('is_logued_in') === TRUE) {	
			$data = array(
				'icon' => '../assets/images/favicon.png',
				'page_title' => 'Agregar Productos',
				'view' => 'producto/AddProductos',
				'data_view' => array()
			);

			$data['cate'] = $this->ProductosModel->obtener_categoria();
			$data['ta'] = $this->ProductosModel->obtener_talla();
			$data['ge'] = $this->ProductosModel->obtener_genero();
			$data['co'] = $this->ProductosModel->obtener_colores();
			$data['mar'] = $this->ProductosModel->obtener_marca();

			$this->load->view('template/main_view', $data);

		}else{
			$this->load->view('login');
		}
	}

	public function insert_producto()
	{
		if ($this->session->userdata('is_logued_in') === TRUE) {

			$config['upload_path'] = 'assets/productos/'; //CONFIGURACIONES DE LA IMAGEN
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size'] = '2048';
			$config['max_width'] = '2024';
			$config['max_height'] = '2008';
			$this->load->library('upload',$config);

			if (!$this->upload->do_upload("imagenes")) {

				echo $this->upload->display_errors();

			} else {

				$file_info = $this->upload->data();

				$imgform = $file_info['file_name'];


				$data = array(
					'NOMBRE_PRODUCTO' => $this->input->post('nombre'),
					'DESCRIPCION' => $this->input->post('descripcion'),
					'ID_CATEGORIA' => $this->input->post('categoria'),
					'ID_GENERO' => $this->input->post('genero'),
					'ID_TALLA' => $this->input->post('talla'),
					'ID_COLORES' => $this->input->post('colores'),
					'ID_MARCA' => $this->input->post('marcas'),
					'IMAGEN' => $imgform
				);

				$this->ProductosModel->insert_producto($data);
				redirect('/ProductosController/index', 'refresh');


			}

		}else{
			$this->load->view('login');
		}
	} 
	
	public function editar_producto($ID_PRODUCTO)
	{

		if ($this->session->userdata('is_logued_in') === TRUE) {	
			$data = array(
				'icon' => '../assets/images/favicon.png',
				'page_title' => 'Editar Productos',
				'view' => 'producto/AddProductos',
				'data_view' => array()
			);

			$data['cate'] = $this->ProductosModel->obtener_categoria();
			$data['ta'] = $this->ProductosModel->obtener_talla();
			$data['ge'] = $this->ProductosModel->obtener_genero();
			$data['co'] = $this->ProductosModel->obtener_colores();
			$data['mar'] = $this->ProductosModel->obtener_marca();

			$data['productos'] = $this->ProductosModel->obtener_producto_id($ID_PRODUCTO);

			$this->load->view('template/main_view', $data);

		}else{
			$this->load->view('login');
		}
	}

	public function update_producto()
	{
		if ($this->session->userdata('is_logued_in') === TRUE) {
			$config['upload_path'] = './assets/images/Upload/'; //CONFIGURACIONES DE LA IMAGEN
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size'] = '2048';
			$config['max_width'] = '2024';
			$config['max_height'] = '2008';
			$this->load->library('upload',$config);

			if (!$this->upload->do_upload("imagenes")) {

				// SE EJECUTARA ESTO SI LA IMAGEN SE CONSERVARA

				//$file_info = $this->upload->data();

				//$imgform = $file_info['file_name'];

				$productos = array(
					'NOMBRE_PRODUCTO' => $this->input->post('nombre'),
					'DESCRIPCION' => $this->input->post('descripcion'),
					'ID_CATEGORIA' => $this->input->post('categoria'),
					'ID_GENERO' => $this->input->post('genero'),
					'ID_TALLA' => $this->input->post('talla'),
					'ID_COLORES' => $this->input->post('colores'),
					'ID_MARCA' => $this->input->post('marcas'),
					'IMAGEN' => $this->input->post('imgVieja'),
					'ID_PRODUCTO' => $this->input->post('id_producto')
				);

				$this->ProductosModel->update_producto($productos);
				redirect('ProductosController/index');


			} else {

				// SE EJECUTARA ESTO SI LA IMAGEN SE CAMBIARA

				$file_info = $this->upload->data();

				$imgform = $file_info['file_name'];

				$productos = array(
					'NOMBRE_PRODUCTO' => $this->input->post('nombre'),
					'DESCRIPCION' => $this->input->post('descripcion'),
					'ID_CATEGORIA' => $this->input->post('categoria'),
					'ID_GENERO' => $this->input->post('genero'),
					'ID_TALLA' => $this->input->post('talla'),
					'ID_COLORES' => $this->input->post('colores'),
					'ID_MARCA' => $this->input->post('marcas'),
					'IMAGEN' => $imgform,
					'ID_PRODUCTO' => $this->input->post('id_producto')
				);

				$this->ProductosModel->update_producto($productos);
				redirect('ProductosController/index');

			}
		}else{
			$this->load->view('login');
		}

	}

	public function eliminar_producto($ID_PRODUCTO)
	{if ($this->session->userdata('is_logued_in') === TRUE) {
		$this->ProductosModel->delete_producto($ID_PRODUCTO);
		redirect('ProductosController/index');
	}else{
		$this->load->view('login');
	}
}


}