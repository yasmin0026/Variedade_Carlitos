<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Inventario extends CI_Model{

    public function obtener_inventario(){
        $this->db->select('*');
        $this->db->join('TBL_CATEGORIA C','P.ID_CATEGORIA = P.ID_CATEGORIA');
        $this->db->join('TBL_GENERO G','P.ID_GENERO = G.ID_GENERO');
        $this->db->join('TBL_TALLA T','P.ID_TALLA = T.ID_TALLA');
        $this->db->join('TBL_COLORES CO','P.ID_COLORES = CO.ID_COLORES');
        $this->db->join('TBL_MARCA M','P.ID_TALLA = M.ID_MARCA');
        $this->db->where('C.ID_CATEGORIA =', 1);
        $query = $this->db->get('TBL_PRODUCTOS P');
        return $query->result();
    }


    public function getAccesorio(){
        $this->db->select('*');
        $this->db->join('TBL_CATEGORIA C','P.ID_CATEGORIA = P.ID_CATEGORIA');
        $this->db->join('TBL_GENERO G','P.ID_GENERO = G.ID_GENERO');
        $this->db->join('TBL_TALLA T','P.ID_TALLA = T.ID_TALLA');
        $this->db->join('TBL_COLORES CO','P.ID_COLORES = CO.ID_COLORES');
        $this->db->join('TBL_MARCA M','P.ID_TALLA = M.ID_MARCA');
        $this->db->where('C.ID_CATEGORIA =', 2);
        $query = $this->db->get('TBL_PRODUCTOS P');
        return $query->result();
    }

    public function getPantalon(){
        $this->db->select('*');
        $this->db->join('TBL_CATEGORIA C','P.ID_CATEGORIA = P.ID_CATEGORIA');
        $this->db->join('TBL_GENERO G','P.ID_GENERO = G.ID_GENERO');
        $this->db->join('TBL_TALLA T','P.ID_TALLA = T.ID_TALLA');
        $this->db->join('TBL_COLORES CO','P.ID_COLORES = CO.ID_COLORES');
        $this->db->join('TBL_MARCA M','P.ID_TALLA = M.ID_MARCA');
        $this->db->where('C.ID_CATEGORIA =', 3);
        $query = $this->db->get('TBL_PRODUCTOS P');
        return $query->result();
    }

    public function getLista(){


        $query = $this->db->get('LISTA_PRODUCTOS');
        return $query->result();
    }

    public function insertLista($data)
    {
        if ($this->db->insert('LISTA_PRODUCTOS',$data))
            return true;
        else
            return false;
    }

    public function updateLista($data)
    {   

        $this->db->set('TOTAL_DOCENA',$data['TOTAL_DOCENA']);
        $this->db->set('CANTIDAD',$data['CANTIDAD']);
        $this->db->set('UNITARIO',$data['UNITARIO']);
        $this->db->where('ID_LISTA',$data['ID_LISTA']);
        $this->db->update('LISTA_PRODUCTOS');
    }


    public function eliminarProd($ID_LISTA)
    {
        $this->db->where('ID_LISTA', $ID_LISTA);
        $this->db->delete('LISTA_PRODUCTOS');
    }


    public function getProveedor()
    {
        $query = $this->db->get('TBL_PROVEEDOR');
        return $query->result();
    }

    public function getPago()
    {
        $query = $this->db->get('TBL_ESTADO_PAGO');
        return $query->result();
    }

    public function getStock()
    {
        $query = $this->db->get('TBL_ESTADO_STOCK');
        return $query->result();
    }



    /*------------------INSERT TBL_ENTRADA ----------------------*/

    public function insertEntrada($entrada)
    {
        if ($this->db->insert('TBL_ENTRADA',$entrada)){
            $last_entrada = $this->db->insert_id();
            return $last_entrada;
        }
        
    }

    /*----------------- INSERT TBL_SALIDA -----------------------*/

    public function insertSalida($salida)
    {
        if ($this->db->insert('TBL_SALIDA',$salida)){
            $last_salida = $this->db->insert_id();
            return $last_salida;
        }
        
    }

    /*----------------- INSERT INTERMEDIA -----------------------*/

    public function insertIntermedia($intermedia)
    {
        if ($this->db->insert('INTER_ENTRADA_SALIDA',$intermedia)) 
            return true;
        else
            return false;
    }

     /*----------------- INSERT MOVIMIENTOS -----------------------*/

    public function insertMovimientos($movimientos)
    {
        if ($this->db->insertMovimientos('VEN_MOVIMIENTOS',$movimientos)) 
            return true;
        else
            return false;
    }





} 