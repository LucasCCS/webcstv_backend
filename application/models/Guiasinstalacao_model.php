<?php

    class Guiasinstalacao_Model extends CI_Model {

        public function insertGuiaInstalacao($options = array()) 
        {
            $this->db->set($options);
            $this->db->insert('cms_guias_instalacao');
        }
        public function getGuiaInstalacao($options = array()) 
        {
            $this->db->select('*');
            if(isset($options['id_guia_instalacao'])) {
                $this->db->where('id_guia_instalacao',$options['id_guia_instalacao']);
            }
            $query = $this->db->get('cms_guias_instalacao');
            if ($query->num_rows() > 0) {
                if(isset($options['id_guia_instalacao'])) {  
                    return $query->row_array();
                }else {            
                    return $query->result();
                }
            }
        }
        public function updateGuiaInstalacao($options = array()) 
        {
            $id_guia_instalacao = $options['id_guia_instalacao'];
            unset($options['id_guia_instalacao']);
            $this->db->set($options);
            $this->db->where('id_guia_instalacao',$id_guia_instalacao);
            $this->db->update('cms_guias_instalacao');
        }
        public function deleteGuiaInstalacao($options = array()) 
        {
            $this->db->where('id_guia_instalacao',$options['id_guia_instalacao']);
            $this->db->delete('cms_guias_instalacao');
        }
    }

