<?php 
    class Home extends MY_Controller{
        function index(){
            $this->_check_login();
            $this->data['temp'] = 'admin/home/index';
            $this->load->view('admin/admin_layout', $this->data);
        }
    }
?>