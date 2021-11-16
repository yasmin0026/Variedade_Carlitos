<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MarcaModel extends CI_Model {

	public function obtener_marca()
	{
		$query = $this->db->get('TBL_MARCA');
		return $query->result();
	}

	public function insert_marca($data)
	{
		if ($this->db->insert('TBL_MARCA',$data))
			return true;
		else
			return false;
	}

	public function delete_marca($ID_MARCA)
	{
		$this->db->where('ID_MARCA', $ID_MARCA);
		$this->db->delete('TBL_MARCA');
	}

	public function obtener_marca_update($ID_MARCA)
	{
		$this->db->select('*');
		$this->db->from('TBL_MARCA');
		$this->db->where('ID_MARCA =' .$ID_MARCA);
		$query = $this->db->get();
		return  $query->row();
	}

	public function editar_marcas($marca)
	{
		$this->db->set('NOMBRE_MARCA',$marca['NOMBRE_MARCA']);
		$this->db->where('ID_MARCA',$marca['ID_MARCA']);
		$this->db->update('TBL_MARCA');
	}
}