<?php

    class Operadoras_Model extends CI_Model {

        /**
         * getOperadoras
         */
        public function getOperadoras($options = array()) 
        {
            $this->db->select('*');
            if(isset($options['id_operadora'])) {
                $this->db->where('id_operadora',$options['id_operadora']);
            }
            $query = $this->db->get('cms_operadoras');
            if ($query->num_rows() > 0) {
                if(isset($options['id_operadora'])) {
                    return $query->row_array();
                } else {
                    return $query->result();
                }
                
            }
        }
        /**
         * insertOperadoras
         */
        public function insertOperadoras($options = array())
        {
            $this->db->set($options);
            $this->db->insert('cms_operadoras');
            return $this->db->insert_id();
        }
        /**
         * updateOperadoras
         */
        public function updateOperadoras($options = array())
        {
            $id_operadora = $options['id_operadora'];
            unset($options['id_operadora']);
            $this->db->set($options);
            $this->db->where('id_operadora',$id_operadora);
            $this->db->update('cms_operadoras');
        }

        /**
         * deleteOperadoras
         */
        public function deleteOperadoras($options = array())
        {
            if(isset($options['id_operadora'])) {
                $this->db->where('id_operadora',$options['id_operadora']);
                $this->db->delete('cms_operadoras');
            }
        }
    }

