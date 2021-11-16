<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StockModel extends CI_Model {

	public function allStock()
	{
		$query = $this->db->get('TBL_ESTADO_STOCK');
		return $query->result();
	}

	public function insertStock($data)
	{
		if ($this->db->insert('TBL_ESTADO_STOCK',$data))
			return true;
		else
			return false;
	}

	public function obtenerStock($ID_ESTADO_STOCK)
	{
		$this->db->select('*');
		$this->db->from('TBL_ESTADO_STOCK');
		$this->db->where('ID_ESTADO_STOCK =' .$ID_ESTADO_STOCK);
		$query = $this->db->get();
		return  $query->row();
	}

	public function deleteStock($ID_ESTADO_STOCK)
	{
		$this->db->where('ID_ESTADO_STOCK', $ID_ESTADO_STOCK);
		$this->db->delete('TBL_ESTADO_STOCK');
	}

	

	public function updateStock($stock)
	{
		$this->db->set('ESTADO_STOCK',$stock['ESTADO_STOCK']);
		$this->db->where('ID_ESTADO_STOCK',$stock['ID_ESTADO_STOCK']);
		$this->db->update('TBL_ESTADO_STOCK');
	}
}