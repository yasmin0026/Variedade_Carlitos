<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Model {

	public function obtener_usuarios()
	{
		$this->db->join('TBL_ROL','TBL_ROL.ID_ROL = TBL_USUARIO.ID_ROL');
		$query = $this->db->get('TBL_USUARIO');
		return $query->result();
	}

	public function insert_usuario($data)
	{
		if ($this->db->insert('TBL_USUARIO',$data))
			return true;
		else
			return false;
	}

	public function delete_usuario($ID_USUARIO)
	{
		$this->db->where('ID_USUARIO', $ID_USUARIO);
		$this->db->delete('TBL_USUARIO');
	}

	public function obtener_usuario($ID_USUARIO)
	{
		$this->db->select('*');
		$this->db->from('TBL_USUARIO');
		$this->db->where('ID_USUARIO =' .$ID_USUARIO);
		$query = $this->db->get();
		return  $query->row()  ;
	}

	public function editar_usuario($usuario)
	{
		$this->db->set('NOMBRE_USUARIO',$usuario['NOMBRE_USUARIO']);
		$this->db->set('NICK_USUARIO',$usuario['NICK_USUARIO']);
		$this->db->set('CORREO_USUARIO',$usuario['CORREO_USUARIO']);
		$this->db->set('CONTRASENIA_USUARIO',$usuario['CONTRASENIA_USUARIO']);
		$this->db->set('RECOVERY_PREGUNTA',$usuario['RECOVERY_PREGUNTA']);
		$this->db->set('RECOVERY_RESPUESTA',$usuario['RECOVERY_RESPUESTA']);
		$this->db->set('FECHA_CAMBIOS',$usuario['FECHA_CAMBIOS']);
		$this->db->set('ID_ROL',$usuario['ID_ROL']);
		$this->db->where('ID_USUARIO',$usuario['ID_USUARIO']);
		$this->db->update('TBL_USUARIO');
	}

	public function filtro_correo($CORREO_USUARIO)
	{
		$this->db->where("CORREO_USUARIO = '" .$CORREO_USUARIO."'");
		$query = $this->db->get('TBL_USUARIO');
		return  $query->row()  ;
	}

	public function filtro_nick($NICK_USUARIO)
	{		
		$this->db->where("NICK_USUARIO ='" .$NICK_USUARIO."'");
		$query = $this->db->get('TBL_USUARIO');
		return  $query->row()  ;
	}

	public function filtro_respuesta($id,$pregunta,$respuesta)
	{		
		$this->db->where("ID_USUARIO = '" .$id."'");
		$this->db->where("RECOVERY_PREGUNTA = '" .$pregunta."'");
		$this->db->where("RECOVERY_RESPUESTA = '" .$respuesta."'");
		$query = $this->db->get('TBL_USUARIO');
		return  $query->row()  ;
	}
}