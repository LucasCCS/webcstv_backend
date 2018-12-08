<?php

    defined('BASEPATH') OR exit('No direct script access allowed');

    class clienteStatus {
        /**
         * getStatusCliente
         */
        public function getStatusCliente($status = null)
        {
            switch($status) {
                case CLIENTE_INATIVO: 
                    $status = "Inativo";
                break;
                case CLIENTE_PERIODO_TESTE: 
                    $status = "Período de Teste";
                break;
                case CLIENTE_PAGAMENTO_NORMAL: 
                    $status = "Normal";
                break;
                case CLIENTE_PAGAMENTO_PENDENTE: 
                    $status = "Pagamento Pendente";
                break;
            }
            return $status;
        }
    }