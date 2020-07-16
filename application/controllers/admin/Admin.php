<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Admin extends MY_Controller{
        function __construct(){
            parent::__construct();
            $this->load->model('admin_model');
        }
        function index(){
            $this->_check_login();
            $input = array();
            $list = $this->admin_model->get_list($input);
            $this->data['list'] = $list;
            //lay noi dung thong bao cua message
            $message = $this->session->flashdata('message');
            $this->data['message'] = $message;

            $this->data['temp'] = 'admin/admin/index';
            $this->load->view('admin/admin_layout', $this->data);
        }
        /**
         * them moi
         */
        function check_username()
        {
            $username = $this->input->post('username');
            $where = array('username' => $username);
            //kiêm tra xem username đã tồn tại chưa
            if($this->admin_model->check_exists($where))
            {
                //trả về thông báo lỗi
                $this->form_validation->set_message(__FUNCTION__, 'Username was existed');
                return false;
            }
            return true;
        }
        
        /*
        * Thêm mới quản trị viên
        */
        function add(){
            $this->_check_login();
            $this->load->library('form_validation');
            $this->load->helper('form');
            
            //neu ma co du lieu post len thi kiem tra
            if($this->input->post()){
                $this->form_validation->set_rules('name', 'Name', 'required|regex_match[/[^0-9]{1,2}/]');
                $this->form_validation->set_rules('username', 'Username', 'required|regex_match[/^[a-zA-Z0-9]+$/]|callback_check_username');
                $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
                $this->form_validation->set_rules('confirm_password', 'confirm password', 'required|matches[password]');
                
                //nhập liệu chính xác
                if($this->form_validation->run()){
                    //them vao csdl
                    $name     = $this->input->post('name');
                    $username = $this->input->post('username');
                    $password = $this->input->post('password');
                    
                    $data = array(
                        'name'     => $name,
                        'username' => $username,
                        'password' => md5($password)
                    );
                    if($this->admin_model->create($data)){
                        $this->session->set_flashdata('message', 'Add new account successfully');
                    }else{
                        $this->session->set_flashdata('message', 'No successfully, please try again');
                    }
                    redirect(admin_url('admin/index'));
                }
            }
            $this->data['temp'] = 'admin/admin/admin_add';
            $this->load->view('admin/admin_layout', $this->data);
        }
        /**
         * edit thong tin account
         */
        function edit(){
            $this->_check_login();
            //get id
            $this->load->library('form_validation');
            $this->load->helper('form');
            $id = $this->uri->segment('4');
            $id = intval($id);
            $info = $this->admin_model->get_info($id);
            if(!$info){
                $this->session->set_flashdata('message', 'ID no exist');
                redirect(admin_url('admin/index'));
            }
            $this->data['info'] = $info;
            if($this->input->post()){
                $this->form_validation->set_rules('name', 'Name', 'required|regex_match[/[^0-9]{1,2}/]');
                //update username    
                $username = $this->input->post('username');
                if($username<>$info->username){
                    $this->form_validation->set_rules('username', 'Username', 'required|regex_match[/^[a-zA-Z0-9]+$/]|callback_check_username');
                }else{
                    $this->form_validation->set_rules('username', 'Username', 'required');
                }
                //update pass
                $password = $this->input->post('password');
                if($password){
                    $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
                    $this->form_validation->set_rules('confirm_password', 'confirm password', 'required|matches[password]');
                }
                if($this->form_validation->run()){
                    $name = $this->input->post('name');
                    $data = array(
                        'name' => $name,
                    );
                    if($username){
                        $data['username'] = $username;
                    }   
                    if($password){
                       $data['password'] = md5($password);
                    }
                    if($this->admin_model->update($id,$data)){
                        $this->session->set_flashdata('message', 'Update successfully');
                    }else{
                        $this->session->set_flashdata('message', 'Update no successfully, please try again');
                    }
                    redirect(admin_url('admin/index'));
                }
            }
            $this->data['temp'] = 'admin/admin/admin_edit';
            $this->load->view('admin/admin_layout', $this->data);
        }
        function delete(){
            $this->_check_login();
            $id = $this->uri->segment('4');
            $id = intval($id);
            $info = $this->admin_model->get_info($id);
            $this->data['info'] = $info;
            if(!$info){
                $this->session->set_flashdata('message', 'No Id Exist');
                redirect(admin_url('admin'));
            }
            //xoa
            $this->admin_model->delete($id);
            $this->session->set_flashdata('message', 'delete successfully');
            redirect(admin_url('admin'));
        }
        function logout(){
            if($this->session->userdata('login')){
                $this->session->unset_userdata('login');
            }
            redirect(admin_url('login'));
        }
    }
?>