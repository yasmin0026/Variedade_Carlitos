<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProductosModel extends CI_Model {

	public function obtener_productos()
	{
		$this->db->join('TBL_CATEGORIA','TBL_CATEGORIA.ID_CATEGORIA = TBL_PRODUCTOS.ID_CATEGORIA'); // Categoria
		$this->db->join('TBL_GENERO','TBL_PRODUCTOS.ID_GENERO = TBL_GENERO.ID_GENERO'); // Genero
		$this->db->join('TBL_COLORES','TBL_PRODUCTOS.ID_COLORES = TBL_COLORES.ID_COLORES'); // Talla
		$this->db->join('TBL_TALLA','TBL_PRODUCTOS.ID_TALLA = TBL_TALLA.ID_TALLA'); // Color
		$this->db->join('TBL_MARCA','TBL_PRODUCTOS.ID_MARCA = TBL_MARCA.ID_MARCA'); // Marca
		$query = $this->db->get('TBL_PRODUCTOS');
		return $query->result();
	}

	public function obtener_categoria()
	{
		$query = $this->db->get('TBL_CATEGORIA');
		return $query->result();
	}

	public function obtener_colores()
	{
		$query = $this->db->get('TBL_COLORES');
		return $query->result();
	}

	public function obtener_genero()
	{
		$query = $this->db->get('TBL_GENERO');
		return $query->result();
	}

	public function obtener_talla()
	{
		$query = $this->db->get('TBL_TALLA');
		return $query->result();
	}

	public function obtener_marca()
	{
		$query = $this->db->get('TBL_MARCA');
		return $query->result();
	}


	public function insert_producto($data)
	{
		if ($this->db->insert('TBL_PRODUCTOS',$data))
			return true;
		else
			return false;
	}

	public function obtener_producto_id($ID_PRODUCTO)
	{
		$this->db->select('*');
		$this->db->from('TBL_PRODUCTOS');
		$this->db->where('ID_PRODUCTO =' .$ID_PRODUCTO);
		$query = $this->db->get();
		return  $query->row()  ;
	}

	public function update_producto($productos)
	{
		$this->db->set('NOMBRE_PRODUCTO',$productos['NOMBRE_PRODUCTO']);
		$this->db->set('DESCRIPCION',$productos['DESCRIPCION']);
		$this->db->set('ID_CATEGORIA',$productos['ID_CATEGORIA']);
		$this->db->set('ID_GENERO',$productos['ID_GENERO']);
		$this->db->set('ID_TALLA',$productos['ID_TALLA']);
		$this->db->set('ID_COLORES',$productos['ID_COLORES']);
		$this->db->set('ID_MARCA',$productos['ID_MARCA']);
		$this->db->set('IMAGEN',$productos['IMAGEN']);
		$this->db->where('ID_PRODUCTO',$productos['ID_PRODUCTO']);
		$this->db->update('TBL_PRODUCTOS');
	}


	public function delete_producto($ID_PRODUCTO)
	{
		$this->db->where('ID_PRODUCTO', $ID_PRODUCTO);
		$this->db->delete('TBL_PRODUCTOS');
	}





	
}