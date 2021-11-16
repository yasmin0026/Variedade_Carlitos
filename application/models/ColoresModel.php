<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ColoresModel extends CI_Model {

	public function obtener_colores()
	{
		$query = $this->db->get('TBL_COLORES');
		return $query->result();
	}

	public function insert_color($data)
	{
		if ($this->db->insert('TBL_COLORES',$data))
			return true;
		else
			return false;
	}

	public function delete_color($ID_COLORES)
	{
		$this->db->where('ID_COLORES', $ID_COLORES);
		$this->db->delete('TBL_COLORES');
	}

	public function obtener_color_update($ID_COLORES)
	{
		$this->db->select('*');
		$this->db->from('TBL_COLORES');
		$this->db->where('ID_COLORES =' .$ID_COLORES);
		$query = $this->db->get();
		return  $query->row();
	}

	public function editar_color($color)
	{
		$this->db->set('NOMBRE_COLOR',$color['NOMBRE_COLOR']);
		$this->db->where('ID_COLORES',$color['ID_COLORES']);
		$this->db->update('TBL_COLORES');
	}
}