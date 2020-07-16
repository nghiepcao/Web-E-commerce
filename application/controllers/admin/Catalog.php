<?php
    class Catalog extends MY_Controller{
        function __construct(){
            parent::__construct();
            $this->load->model('catalog_model');
        }
        
        function index(){
            $this->_check_login();
            $list = $this->catalog_model->get_list();
            $this->data['list'] = $list;
            
            $message = $this->session->flashdata('message');
            $this->data['message'] = $message;
            
            $this->data['temp'] = 'admin/catalog/index';
            $this->load->view('admin/admin_layout', $this->data);
        }

        function check_catalog()
        {
            $name = $this->input->post('name');
            $where = array('name' => $name);
            //kiêm tra xem catalog name đã tồn tại chưa
            if($this->catalog_model->check_exists($where))
            {
                //trả về thông báo lỗi
                $this->form_validation->set_message(__FUNCTION__, 'Catalog name was existed');
                return false;
            }
            return true;
        }

        function add(){
            $this->_check_login();
            $this->load->library('form_validation');
            $this->load->helper('form');
            
            //neu ma co du lieu post len thi kiem tra
            if($this->input->post()){
                
                $this->form_validation->set_rules('name', 'Name', 'required|regex_match[/^[a-zA-Z0-9\s]+$/]|callback_check_catalog');
                $this->form_validation->set_rules('parent_id', 'Parent ID');
                $this->form_validation->set_rules('sort_order', 'Sort Order', 'required');

                
                //nhập liệu chính xác
                if($this->form_validation->run()){
                    //them vao csdl
                    $name      = $this->input->post('name');
                    $parent_id = $this->input->post('parent_id');
                    $sort_order = $this->input->post('sort_order');

                    $data = array(
                        'name'       => $name,
                        'parent_id'  => $parent_id,
                        'sort_order' => intval($sort_order)
                    );
                    if($this->catalog_model->create($data)){
                        $this->session->set_flashdata('message', 'Add new account successfully');
                    }else{
                        $this->session->set_flashdata('message', 'No successfully, please try again');
                    }
                    redirect(admin_url('catalog/index'));
                }
            }
            //lay danh muc cha
            $input = array();
            $input['where'] = array('parent_id' => 0);
            $list = $this->catalog_model->get_list($input);
            $this->data['list'] = $list;
            
            $this->data['temp'] = 'admin/catalog/add';
            $this->load->view('admin/admin_layout', $this->data);
        }
        function delete(){
            $this->_check_login();
            $id = $this->uri->segment('4');
            $id = intval($id);
            $info = $this->catalog_model->get_info($id);
            $this->data['info'] = $info;
            if(!$info){
                $this->session->set_flashdata('message', 'No Id Exist');
                redirect(admin_url('catalog'));
            }
            //xoa
            $this->catalog_model->delete($id);
            $this->session->set_flashdata('message', 'delete successfully');
            redirect(admin_url('catalog'));
        }
        function edit(){
            $this->_check_login();
            $this->load->library('form_validation');
            $this->load->helper('form');
            $id = $this->uri->segment(4);
            $id = intval($id);
            $info = $this->catalog_model->get_info($id);
            if(!$info){
                $this->session->set_flashdata('message', 'ID no exist');
                redirect(admin_url('catalog/index'));
            }
            $this->data['info'] = $info;
            if($this->input->post()){
                
                $this->form_validation->set_rules('parent_id','Parent ID');
                $this->form_validation->set_rules('sort_order','Sort Order');
                $name = $this->input->post('name');
                if($name<>$info->name){
                    $this->form_validation->set_rules('name', 'Name', 'required|regex_match[/^[a-zA-Z0-9\s]+$/]|callback_check_catalog');
                }else{
                    $this->form_validation->set_rules('name', 'Name', 'required');
                }
                if($this->form_validation->run()){
                    $parent_id = $this->input->post('parent_id');
                    $sort_order = $this->input->post('sort_order');
                    $data = array(
                        'name' => $name,
                        'parent_id' => $parent_id,
                        'sort_order' => intval($sort_order)
                    );
                    if($this->catalog_model->update($id,$data)){
                        $this->session->set_flashdata('message', 'Update Catalog Successfully');
                    }else{
                        $this->session->set_flashdata('message', 'Updata Catalog failed');
                    }
                    redirect(admin_url('catalog/index'));
                }
            }
            //lay danh muc cha
            $input = array();
            $input['where'] = array('parent_id' => 0);
            $list = $this->catalog_model->get_list($input);
            $this->data['list'] = $list;
            $this->data['temp'] = 'admin/catalog/edit';
            $this->load->view('admin/admin_layout',$this->data);
        }
    }
?>