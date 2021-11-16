<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class VentaModel extends CI_Model {

	public function obtener_inventario(){

        $this->db->join('TBL_CATEGORIA C','P.ID_CATEGORIA = P.ID_CATEGORIA');
        $this->db->join('TBL_GENERO G','P.ID_GENERO = G.ID_GENERO');
        $this->db->join('TBL_TALLA T','P.ID_TALLA = T.ID_TALLA');
        $this->db->join('TBL_COLORES CO','P.ID_COLORES = CO.ID_COLORES');
        $this->db->join('TBL_MARCA M','P.ID_TALLA = M.ID_MARCA');
        $query = $this->db->get('TBL_PRODUCTOS P');
        return $query->result();
    }
	
}