<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RecoveryController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Usuario');
		$this->load->library('form_validation');
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('PermisosModel');
	}

	public function FormaRequestPassword()
	{
		
		$data = array(
			'icon' => '../assets/images/favicon.png',
			'page_title' => 'Solicitud de recuperación de contraseña',
			'data_view' => array()
		);
		$this->load->view('recovery/request_password',$data);
	}

	public function RequestPassword()
	{
		$form = $this->input->post('forma');
		$data = array(
			'icon' => '../assets/images/favicon.png',
			'page_title' => 'Solicitud de recuperación de contraseña',
			'data_view' => array()
		);
		$data['form'] = $form;
		$this->load->view('recovery/dynamic_filtro',$data);
	}

	public function SecurityQuestion()
	{
		$form = $this->input->post('forma');
		$dato = $this->input->post('dato');
		$data = array(
			'icon' => '../assets/images/favicon.png',
			'page_title' => 'Solicitud de recuperación de contraseña',
			'data_view' => array()
		);

		if ($form == 1) {
			$validacion = $this->Usuario->filtro_correo($dato);
		} else {
			$validacion = $this->Usuario->filtro_nick($dato);
		}

		if ($validacion != null) {
			$data['datos'] = $validacion;
			$this->load->view('recovery/security_question',$data);
		}else{
			echo $this->session->set_flashdata('msg','Error no se pudo encontrar vuelve a intentarlo');
			redirect('RecoveryController/FormaRequestPassword');
		}
		
		
	}

	public function SecurityFinal()
	{
		$id = $this->input->post('id');
		$pregunta = base64_encode($this->input->post('pregunta'));
		$respuesta = base64_encode($this->input->post('respuesta'));

		$data = array(
			'icon' => '../assets/images/favicon.png',
			'page_title' => 'Solicitud de recuperación de contraseña',
			'data_view' => array()
		);

		$validacion = $this->Usuario->filtro_respuesta($id,$pregunta,$respuesta);

		if ($validacion != null) {
			$data['datos'] = $validacion;
			$this->load->view('recovery/new_password',$data);
		}else{
			echo $this->session->set_flashdata('msg','Error no se pudo encontrar vuelve a intentarlo');
			redirect('RecoveryController/FormaRequestPassword');
		}
	}

	public function ChangePassword()
	{
		$originalDate = $this->input->post('fecha_cambios');
		$timestamp = strtotime($originalDate);
		$newDate = date("Y-m-d", $timestamp);

		$usuario = array(
			'NOMBRE_USUARIO' => $this->input->post('nombre'),
			'NICK_USUARIO' => $this->input->post('nick'),
			'CORREO_USUARIO' => $this->input->post('correo'),
			'CONTRASENIA_USUARIO' => $this->input->post('contrasenia'),
			'RECOVERY_PREGUNTA' => $this->input->post('pregunta'),
			'RECOVERY_RESPUESTA' => $this->input->post('respuesta'),
			'FECHA_CAMBIOS' => $newDate,
			'ID_ROL' => $this->input->post('id_rol'),
			'ID_USUARIO' => $this->input->post('id_usuario')
		);

		$this->Usuario->editar_usuario($usuario);
		redirect(base_url());
	}
}