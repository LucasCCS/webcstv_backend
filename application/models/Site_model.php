<?php

class Site_model extends CI_Model {

    /**
     * getSiteConfig
     */
    public function getSiteConfig() 
    {
        $this->db->select('*')
                ->from('site_config')
                ->limit(1);              
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row_array();
        }
    }

    public function updateSiteConfig($options = array())
    {
        $this->db->set($options);
        $this->db->update('site_config');
    }
}