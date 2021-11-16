<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GeneroModel extends CI_Model {

	public function obtener_genero()
	{
		$query = $this->db->get('TBL_GENERO');
		return $query->result();
	}

	public function insert_genero($data)
	{
		if ($this->db->insert('TBL_GENERO',$data))
			return true;
		else
			return false;
	}

	public function delete_genero($ID_GENERO)
	{
		$this->db->where('ID_GENERO', $ID_GENERO);
		$this->db->delete('TBL_GENERO');
	}

	public function obtener_genero_update($ID_GENERO)
	{
		$this->db->select('*');
		$this->db->from('TBL_GENERO');
		$this->db->where('ID_GENERO =' .$ID_GENERO);
		$query = $this->db->get();
		return  $query->row();
	}

	public function editar_generos($genero)
	{
		$this->db->set('TIPO_GENERO',$genero['TIPO_GENERO']);
		$this->db->where('ID_GENERO',$genero['ID_GENERO']);
		$this->db->update('TBL_GENERO');
	}
}