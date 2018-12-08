<?php

    class Clienteoperadoras_Model extends CI_Model {

        public function insertClienteOperadoras($options = array()) 
        {
            $this->db->set($options);
            $this->db->insert('cms_cliente_operadoras');
        }
        public function getClienteOperadoras($options = array()) 
        {
            $id_cliente = $options['id_cliente'];
            unset($options['id_cliente']);
            $this->db->select('cms_cliente_operadoras.*,
            cms_operadoras.*');
            $this->db->where('id_cliente',$id_cliente);
            $this->db->join('cms_operadoras','cms_operadoras.id_operadora = cms_cliente_operadoras.id_operadora');
            $query = $this->db->get('cms_cliente_operadoras');
            if ($query->num_rows() > 0) {
                return $query->result();
            }
        }
        public function deleteClienteOperadoras($options = array()) 
        {
            $this->db->where('id_cliente',$options['id_cliente']);
            $this->db->delete('cms_cliente_operadoras');
        }
    }

