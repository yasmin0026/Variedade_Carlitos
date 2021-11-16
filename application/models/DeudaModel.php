<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DeudaModel extends CI_Model {

	public function getMovimientos()
	{	

		$query = $this->db->get('VEN_MOVIMIENTOS');
		return $query->result();
	}
 
	public function obtenerMovimiento($ID_MOVIMIENTO)
	{
		$this->db->select('*');
		$this->db->from('VEN_MOVIMIENTOS');
		$this->db->where('ID_MOVIMIENTO =' .$ID_MOVIMIENTO);
		$query = $this->db->get();
		return  $query->row();
	}

	public function obtenerDeuda($COD_DEUDA)
	{
		$this->db->select('*');
		$this->db->from('INTER_ENTRADA_SALIDA');
		$this->db->where('COD_DEUDA =' .$COD_DEUDA);
		$this->db->join("TBL_PRODUCTOS","TBL_PRODUCTOS.ID_PRODUCTO = INTER_ENTRADA_SALIDA.ID_PRODUCTO");
		$this->db->join("TBL_CATEGORIA","TBL_CATEGORIA.ID_CATEGORIA = TBL_PRODUCTOS.ID_CATEGORIA");
		$this->db->join("TBL_COLORES","TBL_COLORES.ID_COLORES = TBL_PRODUCTOS.ID_COLORES");
		$this->db->join("TBL_TALLA","TBL_TALLA.ID_TALLA = TBL_PRODUCTOS.ID_TALLA");
		$this->db->join("TBL_GENERO","TBL_GENERO.ID_GENERO = TBL_PRODUCTOS.ID_GENERO");
		$this->db->join("TBL_MARCA","TBL_MARCA.ID_MARCA = TBL_PRODUCTOS.ID_MARCA");
		$this->db->join("TBL_ENTRADA","TBL_ENTRADA.ID_ENTRADA = INTER_ENTRADA_SALIDA.ID_ENTRADA");
		$query = $this->db->get();
		return  $query->row();
	}

	public function updateCategoria($categoria)
	{
		$this->db->set('TIPO_CATEGORIA',$categoria['TIPO_CATEGORIA']);
		$this->db->where('ID_CATEGORIA',$categoria['ID_CATEGORIA']);
		$this->db->update('TBL_CATEGORIA');
	}

	public function updateAbono($abono)
	{
		$this->db->set('ABONO_PROVEEDOR',$abono['ABONO_PROVEEDOR']);
		$this->db->where('COD_DEUDA',$abono['COD_DEUDA']);
		$this->db->where('ID_MOVIMIENTO',$abono['ID_MOVIMIENTO']);
		$this->db->update('VEN_MOVIMIENTOS');
	}
}