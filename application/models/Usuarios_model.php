<?php

    class Usuarios_model extends CI_Model {

        /**
         * getUsuarios
         */
        public function getUsuarios($options = array()) 
        {
            $this->db->select('*');
            if (isset($options['id_usuario'])) {
                $this->db->where('id_usuario',$options['id_usuario']);
            }
            $query = $this->db->get('cms_usuarios');
            if ($query->num_rows() > 0) {
                if (isset($options['id_usuario'])) {
                    return $query->row_array();
                } else {
                    return $query->result();
                }
            }
        }
        /**
         * insertUsuarios
         */
        public function insertUsuarios($options = array())
        {
            $this->db->set($options);
            $this->db->insert('cms_usuarios');
            return $this->db->insert_id();
        }
        /**
         * updateUsuarios
         */
        public function updateUsuarios($options = array())
        {
            $id_usuario = $options['id_usuario'];
            unset($options['id_usuario']);
            $this->db->set($options);
            $this->db->where('id_usuario',$id_usuario);
            $this->db->update('cms_usuarios');
        }

        /**
         * deleteUsuarios
         */
        public function deleteUsuarios($options = array())
        {
            if(isset($options['id_usuario'])) {
                $this->db->where('id_usuario',$options['id_usuario']);
                $this->db->delete('cms_usuarios');
            }
        }
    }

