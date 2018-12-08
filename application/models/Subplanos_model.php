<?php

    class Subplanos_model extends CI_Model {

        /**
         * getSubPlanos
         */
        public function getSubPlanos($options = array()) 
        {
            $this->db->select('cms_planos.*,cms_sub_planos.*');
            if (isset($options['id_sub_plano'])) {
                $this->db->where('id_sub_plano',$options['id_sub_plano']);
            }
            if (isset($options['id_plano'])) {
                $this->db->where('cms_sub_planos.id_plano',$options['id_plano']);
            }
            $this->db->join('cms_planos','cms_planos.id_plano = cms_sub_planos.id_plano');
            $query = $this->db->get('cms_sub_planos');
            if ($query->num_rows() > 0) {
                if (isset($options['id_sub_plano'])) {
                    return $query->row_array();
                } else {
                    return $query->result();
                }
            }
        }
        /**
         * insertSubPlanos
         */
        public function insertSubPlanos($options = array())
        {
            $this->db->set($options);
            $this->db->insert('cms_sub_planos');
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
         * deleteSubPlanos
         */
        public function deleteSubPlanos($options = array())
        {
            if(isset($options['id_sub_plano'])) {
                $this->db->where('id_sub_plano',$options['id_sub_plano']);
                $this->db->delete('cms_sub_planos');
            }
        }
    }

