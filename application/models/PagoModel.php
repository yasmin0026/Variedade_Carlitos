<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PagoModel extends CI_Model {

	public function allPago()
	{
		$query = $this->db->get('TBL_ESTADO_PAGO');
		return $query->result();
	}

	public function insertPago($data)
	{
		if ($this->db->insert('TBL_ESTADO_PAGO',$data))
			return true;
		else
			return false;
	}

	public function obtenerPago($ID_ESTADO_PAGO)
	{
		$this->db->select('*');
		$this->db->from('TBL_ESTADO_PAGO');
		$this->db->where('ID_ESTADO_PAGO =' .$ID_ESTADO_PAGO);
		$query = $this->db->get();
		return  $query->row();
	}

	public function deletePago($ID_ESTADO_PAGO)
	{
		$this->db->where('ID_ESTADO_PAGO', $ID_ESTADO_PAGO);
		$this->db->delete('TBL_ESTADO_PAGO');
	}



	public function updatePago($pago)
	{
		$this->db->set('ESTADO_PAGO',$pago['ESTADO_PAGO']);
		$this->db->where('ID_ESTADO_PAGO',$pago['ID_ESTADO_PAGO']);
		$this->db->update('TBL_ESTADO_PAGO');
	}
}