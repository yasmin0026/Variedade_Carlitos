<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ChartModel extends CI_Model {

	public function getTotal()
	{

		$this->db->select("sum(ABONO_PROVEEDOR) AS AbonoTotalProveedor, sum(DEUDA_PROVEEDOR) AS DeudaTotalProveedor");
	    $this->db->from('VEN_MOVIMIENTOS');
	    $this->db->where("ID_ESTADO_PAGO = 2");

	    $query = $this->db->get();
	    return $query->result();
	}

	public function getGrafica()
	{
		$this->db->select("DATENAME(month,  MAX(FECHA_MOVIMIENTO)) + ' ' + CONVERT(nvarchar(4), YEAR(FECHA_MOVIMIENTO)) AS Meses, sum(ABONO_PROVEEDOR) AS AbonoProveedor, sum(DEUDA_PROVEEDOR) AS DeudaProveedor");
	    $this->db->from('VEN_MOVIMIENTOS');
	    $this->db->where("ID_ESTADO_PAGO = 2");
	    $this->db->group_by("DATENAME(month, FECHA_MOVIMIENTO), YEAR(FECHA_MOVIMIENTO)");

	    $query = $this->db->get();
	    return $query->result();
	}

	public function getExistencias()
	{
	    $this->db->select('*');
	    $this->db->from('INTER_ENTRADA_SALIDA');
	    $this->db->where('STOCK_FINAL <= 20');

	    $query = $this->db->get();

	    if($query->num_rows()==0){
	    	return false; //Si es cero es por que no hay productos con < 20
	    }else{
	    	return true; // si es mayor a 0 es por que si hay productos sin existencias
	    }      

	}

	  

}