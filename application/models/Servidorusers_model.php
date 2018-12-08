<?php

class Servidorusers_model extends CI_Model {

    public $servidor_users;
    public function __construct() {
        $this->servidor_users = $this->load->database('servidor_users', TRUE);
    }
    /**
     * insertUserTeste
     */
    public function insertUserTeste($options = array()) 
    {
        $this->servidor_users->set($options);
        $this->servidor_users->insert('teste');
        return $this->servidor_users->insert_id();
    }
    /**
     * getUserServidor
     */
    public function getUserServidor($options = array()) 
    {
        $this->servidor_users->select('*');
        if(isset($options['usuario'])) {
            $this->servidor_users->where('usuario',$options['usuario']);
        }
        $teste = $this->servidor_users->get('teste');
        if($teste->num_rows() > 0) {
            return $teste->row_array();
        } else {
            $this->servidor_users->select('*');
            if(isset($options['usuario'])) {
                $this->servidor_users->where('usuario',$options['usuario']);
            }
            $usuario = $this->servidor_users->get('usuario');

            if($usuario->num_rows() > 0) {
                return $usuario->row_array();
            }
        }
    }
    // getUsers
    public function getUsers($options = array())
    {
        $this->servidor_users->select('*');
        $query = $this->servidor_users->get('usuario');
        if(isset($options['order_by'])) {
            $this->servidor_users->order_by('id',$options['order_by']);
        }
        if($query->num_rows() > 0) {
            return $query->result();    
        }
    }
    // getUserTeste
    public function getUserTeste($options = array()) 
    {
        $this->servidor_users->select('*');
        if (isset($options['id_user_servidor'])) {
            $this->servidor_users->where('id',$options['id_user_servidor']);
        }
        if(isset($options['order_by'])) {
            $this->servidor_users->order_by('id',$options['order_by']);
        }
        $query = $this->servidor_users->get('teste');
        if($query->num_rows() > 0) {
            if (isset($options['id_user_servidor'])) {
                return $query->row_array();
            } else {
                return $query->result();
            }
        }
        
    }
    // checkUserTestExists
    public function checkUserTestExists($options = array())
    {
        $this->servidor_users->select('*');
        $this->servidor_users->where('usuario',$options['user']);
        $teste = $this->servidor_users->get('teste');
        $this->servidor_users->select('*');
        $this->servidor_users->where('usuario',$options['user']);
        $usuario = $this->servidor_users->get('usuario');
        if($usuario->num_rows() > 0 || $teste->num_rows() > 0) return true;
        else return false;
    }

}