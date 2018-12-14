<?php

    class Planos_model extends CI_Model {

        /**
         * getPlanos
         */
        public function getPlanos($options = array()) 
        {
            $this->db->select('*');
            if (isset($options['id_plano'])) {
                $this->db->where('id_plano',$options['id_plano']);
            }
            if (isset($options['plano_tipo'])) {
                $this->db->where('plano_tipo',$options['plano_tipo']);
            }
            if (isset($options['periodicidade'])) {
                $this->db->where('periodicidade',$options['periodicidade']);
            }
            $query = $this->db->get('cms_planos');
            if ($query->num_rows() > 0) {
                if (isset($options['id_plano'])) {
                    return $query->row_array();
                } else {
                    return $query->result();
                }
            }
        }
        /**
         * insertPlanos
         */
        public function insertPlanos($options = array())
        {
            $this->db->set($options);
            $this->db->insert('cms_planos');
            return $this->db->insert_id();
        }
        /**
         * updatePlanos
         */
        public function updatePlanos($options = array())
        {
            $id_plano = $options['id_plano'];
            unset($options['id_plano']);
            $this->db->set($options);
            $this->db->where('id_plano',$id_plano);
            $this->db->update('cms_planos');
        }

        /**
         * deletePlanos
         */
        public function deletePlanos($options = array())
        {
            if(isset($options['id_plano'])) {
                $this->db->where('id_plano',$options['id_plano']);
                $this->db->delete('cms_planos');
            }
        }
    }

