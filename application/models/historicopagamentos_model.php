<?php

    class Historicopagamentos_Model extends CI_Model {

        public function insertHistoricoPagamentos($options = array()) 
        {
            $this->db->set($options);
            $this->db->insert('cms_clientes_historico_pagamentos');
        }
        public function getHistoricoPagamentos($options = array()) 
        {
            $this->db->select('cms_clientes_historico_pagamentos.*,
            cms_planos.*,
            cms_clientes.nome,
            cms_clientes.email,');
            if(isset($options['id_cliente_historico_pagamento'])) {
                $this->db->where('id_cliente_historico_pagamento',$options['id_cliente_historico_pagamento']);
            }
            $this->db->order_by('id_cliente_historico_pagamento','DESC');
            $this->db->join('cms_planos','cms_planos.id_plano = cms_clientes_historico_pagamentos.id_plano');
            $this->db->join('cms_clientes','cms_clientes.id_cliente = cms_clientes_historico_pagamentos.id_cliente');
            $query = $this->db->get('cms_clientes_historico_pagamentos');
            if ($query->num_rows() > 0) {
                if(isset($options['id_cliente_historico_pagamento'])) {
                    return $query->row_array();
                } else {
                    return $query->result();
                }
                
            }
        }
        public function updateHistoricoPagamentos($options = array()) 
        {
            $id_cliente_historico_pagamento = $options['id_cliente_historico_pagamento'];
            unset($options['id_cliente_historico_pagamento']);
            $this->db->set($options);
            $this->db->where('id_cliente_historico_pagamento',$id_cliente_historico_pagamento);
            $this->db->update('cms_clientes_historico_pagamentos');
        }
        public function deleteHistoricoPagamentos($options = array()) 
        {
            $this->db->where('id_cliente_historico_pagamento',$options['id_cliente_historico_pagamento']);
            $this->db->delete('cms_clientes_historico_pagamentos');
        }
    }

