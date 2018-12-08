<?php

    class Clientehistoricopagamentos_Model extends CI_Model {

        public function insertClienteHistoricoPagamentos($options = array()) 
        {
            $this->db->set($options);
            $this->db->insert('cms_clientes_historico_pagamentos');
        }
        public function getClienteHistoricoPagamentos($options = array()) 
        {
            $id_cliente = $options['id_cliente'];
            unset($options['id_cliente']);
            $this->db->select('cms_clientes_historico_pagamentos.*,
            cms_planos.*');
            $this->db->where('id_cliente',$id_cliente);
            $this->db->order_by('id_cliente_historico_pagamento','DESC');
            $this->db->join('cms_planos','cms_planos.id_plano = cms_clientes_historico_pagamentos.id_plano');
            $query = $this->db->get('cms_clientes_historico_pagamentos');
            if ($query->num_rows() > 0) {
                return $query->result();
            }
        }
        public function updateClienteHistoricoPagamentos($options = array()) 
        {
            $id_cliente_historico_pagamento = $options['id_cliente_historico_pagamento'];
            unset($options['id_cliente_historico_pagamento']);
            $this->db->set($options);
            $this->db->where('id_cliente_historico_pagamento',$id_cliente_historico_pagamento);
            $this->db->update('cms_clientes_historico_pagamentos');
        }
        public function deleteClienteHistoricoPagamentos($options = array()) 
        {
            $this->db->where('id_cliente',$options['id_cliente']);
            $this->db->delete('cms_clientes_historico_pagamentos');
        }
    }

