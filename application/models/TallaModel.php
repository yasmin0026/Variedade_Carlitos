<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TallaModel extends CI_Model {

	public function obtener_talla()
	{
		$query = $this->db->get('TBL_TALLA');
		return $query->result();
	}

	public function insert_talla($data)
	{
		if ($this->db->insert('TBL_TALLA',$data))
			return true;
		else
			return false;
	}

	public function delete_talla($ID_TALLA)
	{
		$this->db->where('ID_TALLA', $ID_TALLA);
		$this->db->delete('TBL_TALLA');
	}

	public function editar_update($ID_TALLA)
	{
		$this->db->select('*');
		$this->db->from('TBL_TALLA');
		$this->db->where('ID_TALLA =' .$ID_TALLA);
		$query = $this->db->get();
		return  $query->row();
	}

	public function update_talla($talla)
	{
		$this->db->set('TALLA',$talla['TALLA']);
		$this->db->where('ID_TALLA',$talla['ID_TALLA']);
		$this->db->update('TBL_TALLA');
	}
}