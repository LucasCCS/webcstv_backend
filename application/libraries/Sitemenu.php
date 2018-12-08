<?php

    defined('BASEPATH') OR exit('No direct script access allowed');

    class siteMenu {
        protected $CI;

        public function __construct() 
        {
            $this->CI =& get_instance();
            $this->CI->load->model('paginas_model','paginas');
        }
        public function showMenu()
        {
            $paginas_navbar = $this->CI->paginas->getPaginas(['nav_menu' => 1]);
            if (isset($paginas_navbar)) {
                foreach($paginas_navbar as $key) {
                    $active = "";
                    if($this->CI->uri->segment(1) == $key->slug) $active = 'class="active"';             
                    echo '  
                        <li '.$active.'>
                            <a href="'.base_url().$key->slug.'">'.$key->titulo.'</a>
                        </li>
                        ';
                        
                }
            }
        }
    }