<?php

    class Paginas_model extends CI_Model {

        public function getPaginas($options = array()) 
        {
            $this->db->select('*');
            /**
             * nav_menu
             * - verifica se a página está fixada no menu
             */
            if (isset($options['nav_menu'])) {
                $this->db->where('nav_menu',$options['nav_menu']);
            }
            // slug
            if (isset($options['slug'])) {
                $this->db->where('slug',$options['slug']);
            }
            if (isset($options['id_page'])) {
                $this->db->where('id_page',$options['id_page']);
            }
            $this->db->order_by('posicao','asc');
            $query = $this->db->get('cms_paginas');
            if($query->num_rows() > 0) {
                if (isset($options['slug']) || isset($options['id_page'])) {
                    return $query->row_array();
                } else {
                    return $query->result();
                }          
            }
        }

        /**
         * insertPaginas
         */
        public function insertPaginas($options = array())
        {
            $this->db->set($options);
            $this->db->insert('cms_paginas');
        }
        /**
         * updatePaginas
         */
        public function updatePaginas($options = array())
        {

            $id_page = $options['id_page'];
            unset($options['id_page']);
            $this->db->set($options);
            if(isset($id_page)) {
                $this->db->where('id_page',$id_page);
                $this->db->update('cms_paginas');
            }      

        }
        /**
         * deletePaginas
         */
        public function deletePaginas($options = array())
        {
            if (isset($options['id_page'])) {
                $this->db->where('id_page',$options['id_page']);
                $this->db->delete('cms_paginas');
            }
        }
    }

