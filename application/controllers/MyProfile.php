<?php
defined('BASEPATH') or exit('No direct script access allowed');


class MyProfile extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('Usuario');
		$this->load->model('Roles');
		$this->load->model('PermisosModel');
	}

	//para las vistas normales dejar el template/main_view
	//para los crud de actualizar dejar el template/main porque si no da conflicto el navbar con el css del crud
	public function setting_user($ID_USUARIO)
	{
		if ($this->session->userdata('is_logued_in') === TRUE) {	
			$data = array(
				'page_title' => 'Editar usuario',
				'view' => 'Perfil/profile',
				'data_view' => array()
			);
			$data['roles'] = $this->Roles->obtener_roles();
			$data['update'] = $this->Usuario->obtener_usuario($ID_USUARIO);
			$this->load->view('template/main_view', $data);
		}else{
			$this->load->view('login');
		}
	}

	public function about_me($ID_USUARIO)
	{
		if ($this->session->userdata('is_logued_in') === TRUE) {	
			$data = array(
				'page_title' => 'Editar usuario',
				'view' => 'Perfil/about_me',
				'data_view' => array()
			);
			$data['roles'] = $this->Roles->obtener_roles();
			$data['update'] = $this->Usuario->obtener_usuario($ID_USUARIO);
			$this->load->view('template/main_view', $data);
		}else{
			$this->load->view('login');
		}
	}

	public function update_my_profile()
	{
		if ($this->session->userdata('is_logued_in') === TRUE) {	
			$originalDate = $this->input->post('fecha_cambios');
			$timestamp = strtotime($originalDate);
			$newDate = date("Y-m-d", $timestamp);

			$usuario = array(
				'NOMBRE_USUARIO' => $this->input->post('nombre'),
				'NICK_USUARIO' => $this->input->post('nick'),
				'CORREO_USUARIO' => $this->input->post('correo'),
				'CONTRASENIA_USUARIO' => $this->input->post('contrasenia'),
				'FECHA_CAMBIOS' => $newDate,
				'RECOVERY_PREGUNTA' => base64_encode($this->input->post('pregunta')),
				'RECOVERY_RESPUESTA' => base64_encode($this->input->post('respuesta')),
				'ID_ROL' => $this->input->post('id_rol'),
				'ID_USUARIO' => $this->input->post('id_usuario')
			);

			$this->Usuario->editar_usuario($usuario);
			redirect('LoginController/inicio');
		}else{
			$this->load->view('login');
		}
	}
	
}