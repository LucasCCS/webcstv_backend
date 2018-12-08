<?php

class Login_model extends CI_Model {


    /**
     * userLogin
     */
    public function userLogin($options = array())
    {
        $this->db->select('*');
        $this->db->where('usuario',$options['usuario']);
        $this->db->where('senha',md5($options['senha']));
        $query = $this->db->get('cms_usuarios');
        if ($query->num_rows() == 1) {
            return $query->row_array();
        } else return false;
    }

    /**
     * customerLogin
     */
    public function customerLogin($options = array()) {
        $this->db->select('cms_clientes.*,
        cms_planos.*');
        $this->db->where('email',$options['email']);
        $this->db->where('senha',md5($options['senha']));
        $this->db->join('cms_planos','cms_planos.id_plano = cms_clientes.id_plano');
        $query = $this->db->get('cms_clientes');
        if ($query->num_rows() == 1) {
            return $query->row_array();
        } else return false;
    }

}