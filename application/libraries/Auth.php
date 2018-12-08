<?php

    defined('BASEPATH') OR exit('No direct script access allowed');

    class Auth {
        protected $CI;

        public function __construct() 
        {
            $this->CI =& get_instance();
            $this->CI->load->library('session');
            $this->CI->load->model('login_model','login');
        }
        public function login($data)
        {
            $login = $this->CI->login->userLogin($data);
            if($login != false) {
                $this->CI->session->set_userdata('user_painel_data',$login);
                return true;
            }  else return false;
        }
        public function getUserPanelLogged() {
            return  $this->CI->session->userdata('user_painel_data');
        }
        public function loginCustomer($data)
        {
            $login = $this->CI->login->customerLogin($data);
            if($login != false) {
                $this->CI->session->set_userdata('customer_painel_data',$login);
                return true;
            }  else return false;
        }
        public function checkCustomerAuth()
        {
            if($this->CI->session->userdata('customer_painel_data')) return true;
            else return false;
        }
        public function checkAuth()
        {
            if(!$this->CI->session->userdata('user_painel_data') && $this->CI->uri->segment(2) != "login") {
                redirect('painel/login');
            } elseif($this->CI->session->userdata('user_painel_data') && $this->CI->uri->segment(2) == "login") {
                redirect('painel');
            }
        }
        
    }