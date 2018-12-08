<?php

class Clientes_model extends CI_Model {


    /**
     * insertClientes
     */
    public function insertClientes($options = array())
    {
        $this->db->set($options);
        $this->db->insert('cms_clientes');
        return $this->db->insert_id();
    }
    /**
     * getClientes
     */
    public function getClientes($options = array()) 
    {
        $this->db->select('cms_clientes.*');
        if (isset($options['id_cliente'])) {
            $this->db->where('id_cliente',$options['id_cliente']);
        }
        if (isset($options['email'])) {
            $this->db->where('email',$options['email']);
        }
        if (isset($options['codigo_mudanca_senha'])) {
            $this->db->where('codigo_mudanca_senha',$options['codigo_mudanca_senha']);
        }
        if (isset($options['status'])) {
            $this->db->where($options['status']);
        }
        // $this->db->join('cms_metodos_pagamento','cms_metodos_pagamento.id_metodo_pagamento = cms_clientes.id_metodo_pagamento');
        // $this->db->join('cms_planos','cms_planos.id_plano = cms_clientes.id_metodo_pagamento');
        if (isset($options['order_by'])) {
            $this->db->order_by('id_cliente','DESC');
        }
        $query = $this->db->get('cms_clientes');
        if ($query->num_rows() > 0) {
            if (isset($options['id_cliente']) || isset($options['email']) || isset($options['codigo_mudanca_senha'])) {
                return $query->row_array();
            } else {
                return $query->result();
            }
        }
    }
    /**
     * updateClientes
     */
    public function updateClientes($options = array()) 
    {
        $id_cliente = $options['id_cliente'];
        unset($options['id_cliente']);
        $this->db->set($options);
        $this->db->where('id_cliente',$id_cliente);
        $this->db->update('cms_clientes');
    }

    /**
     * deleteClientes
     */
    public function deleteClientes($options = array())
    {
        if(isset($options['id_cliente'])) {
            $this->db->where('id_cliente',$options['id_cliente']);
            $this->db->delete('cms_clientes');
        }
    }

}