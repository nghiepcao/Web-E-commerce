<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    Class MY_Controller extends CI_Controller{
        //bien gui du lieu
        public $data = array();
        public function __construct(){
            parent:: __construct();
            $controller = $this->uri->segment(1);
            switch($controller){
                case 'admin':
                {
                    //xu ly cac du lieu khi truy cap vao trang admin
                    $this->load->helper('admin');
                    //$this->_check_login();
                    break;
                }
                default:
                {
                    //xu ly ngoai trang admin
                }
            }
        }
        function _check_login(){
            // $controller = $this->uri->segment(2);
            // $controller = strtolower($controller);
            $login = $this->session->userdata('login');
            if(!$login){
                redirect(admin_url('login'));
            }
            // if($login && $controller == 'login'){
            //     redirect(admin_url('home'));
            // }
        }
    }
?>