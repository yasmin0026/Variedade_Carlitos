 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProveedorModel extends CI_Model {

	public function allProveedor()
	{
		$query = $this->db->get('TBL_PROVEEDOR');
		return $query->result();
	}

	public function insertProveedor($data)
	{
		if ($this->db->insert('TBL_PROVEEDOR',$data))
			return true;
		else
			return false;
	}

	public function obtenerProveedor($ID_PROVEEDOR)
	{
		$this->db->select('*');
		$this->db->from('TBL_PROVEEDOR');
		$this->db->where('ID_PROVEEDOR =' .$ID_PROVEEDOR);
		$query = $this->db->get();
		return  $query->row();
	}

	public function deleteProveedor($ID_PROVEEDOR)
	{
		$this->db->where('ID_PROVEEDOR', $ID_PROVEEDOR);
		$this->db->delete('TBL_PROVEEDOR');
	}



	public function updateProveedor($proveedor)
	{
		$this->db->set('PROVEEDOR_PRODUCTO',$proveedor['PROVEEDOR_PRODUCTO']);
		$this->db->where('ID_PROVEEDOR',$proveedor['ID_PROVEEDOR']);
		$this->db->update('TBL_PROVEEDOR');
	}
}