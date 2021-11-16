<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CategoriaModel extends CI_Model {

	public function categoriaAll()
	{
		$query = $this->db->get('TBL_CATEGORIA');
		return $query->result();
	}

	public function insertCategoria($data)
	{
		if ($this->db->insert('TBL_CATEGORIA',$data))
			return true;
		else
			return false;
	}

	public function deleteCategoria($ID_CATEGORIA)
	{
		$this->db->where('ID_CATEGORIA', $ID_CATEGORIA);
		$this->db->delete('TBL_CATEGORIA');
	}

	public function obtenerCategoria($ID_CATEGORIA)
	{
		$this->db->select('*');
		$this->db->from('TBL_CATEGORIA');
		$this->db->where('ID_CATEGORIA =' .$ID_CATEGORIA);
		$query = $this->db->get();
		return  $query->row();
	}

	public function updateCategoria($categoria)
	{
		$this->db->set('TIPO_CATEGORIA',$categoria['TIPO_CATEGORIA']);
		$this->db->where('ID_CATEGORIA',$categoria['ID_CATEGORIA']);
		$this->db->update('TBL_CATEGORIA');
	}
}