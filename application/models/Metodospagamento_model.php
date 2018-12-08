<?php

    class Metodospagamento_model extends CI_Model {

        public function getMetodosPagamento($options = array()) 
        {
            $this->db->select('*');
            $query = $this->db->get('cms_metodos_pagamento');
            if ($query->num_rows() > 0) {
                return $query->result();
            }
        }
    }

