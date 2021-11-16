<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PermisosModel extends CI_Model {

	 public function getMenu(){
        $this->db->join('TBL_ROL R','M.ID_ROL = R.ID_ROL');
        $this->db->join('TBL_USUARIO U','R.ID_ROL = U.ID_ROL');
        $this->db->join('MODULOS MO','M.ID_MODULO = MO.ID_MODULO');
        $query = $this->db->get('MENU_ROL_MODULO M');
        return $query->result();
    }


	public function getModulos($id_usuario){
        $query = $this->db->query("SELECT U.ID_USUARIO, U.NICK_USUARIO, MO.ID_MODULO, MO.NOMBRE_MODULO, MO.URL_MODULO, MO.ICONO_MODULO
            FROM MENU_ROL_MODULO M, MODULOS MO, TBL_ROL R, TBL_USUARIO U
            where U.ID_ROL = R.ID_ROL and M.ID_MODULO = MO.ID_MODULO and M.ID_ROL = R.ID_ROL and U.ID_USUARIO = $id_usuario and MO.TIPO = 1;" );
        return $query->result();
    }

    public function getModulos2($id_usuario){
        $query = $this->db->query("SELECT U.ID_USUARIO, U.NICK_USUARIO, MO.ID_MODULO, MO.NOMBRE_MODULO, MO.URL_MODULO
            FROM MENU_ROL_MODULO M, MODULOS MO, TBL_ROL R, TBL_USUARIO U
            where U.ID_ROL = R.ID_ROL and M.ID_MODULO = MO.ID_MODULO and M.ID_ROL = R.ID_ROL and U.ID_USUARIO = $id_usuario and MO.TIPO = 2;");
        return $query->result();
    }

    public function getRol()
    {
        $query = $this->db->get('TBL_ROL');
        return $query->result();
    }

    public function getModuloOp()
    {
        $query = $this->db->get('MODULOS');
        return $query->result();
    }


    public function insertPermiso($datos)
    {
        if ($this->db->insert('MENU_ROL_MODULO',$datos))
            return true;
        else
            return false;
    }


    public function getMenuAll($id_menu)
    {
        $this->db->select('*');
        $this->db->from('MENU_ROL_MODULO');
        $this->db->where('ID_MENU',$id_menu);
        $query = $this->db->get();
        return  $query->row();
    }


    public function updatePermiso($datos)
    {   
       
        $this->db->set('ID_MODULO',$datos['ID_MODULO']);
        $this->db->set('ID_ROL',$datos['ID_ROL']);
        $this->db->where('ID_MENU',$datos['ID_MENU']);
        if($this->db->update('MENU_ROL_MODULO'))
            return true;
        else
            return false;
    }

    public function deletePermiso($id_menu)
    {
        $this->db->where('ID_MENU',$id_menu);
        if ($this->db->delete('MENU_ROL_MODULO'))
            return true;
        else
            return false;
    }
}