<?php

    class Faq_model extends CI_Model {

        /**
         * getFaq
         */
        public function getFaq($options = array()) 
        {
            $this->db->select('*');

            if(isset($options['id_faq'])) {
                $this->db->where('id_faq',$options['id_faq']);
            }
            $query = $this->db->get('cms_faq');
            if ($query->num_rows() > 0) {   

                if(isset($options['id_faq'])) {
                    return $query->row_array();  
                } else {
                    return $query->result();  
                }                      
            }
        }
        /**
         * insertFaq
         */
        public function insertFaq($options = array())
        {
            $this->db->set($options);
            $this->db->insert('cms_faq');
            return $this->db->insert_id();
        }
        /**
         * updateFaq
         */
        public function updateFaq($options = array())
        {
            $id_faq = $options['id_faq'];
            unset($options['id_faq']);
            $this->db->set($options);
            $this->db->where('id_faq',$id_faq);
            $this->db->update('cms_faq');
        }

        /**
         * deleteFaq
         */
        public function deleteFaq($options = array())
        {
            if(isset($options['id_faq'])) {
                $this->db->where('id_faq',$options['id_faq']);
                $this->db->delete('cms_faq');
            }
        }
    }

