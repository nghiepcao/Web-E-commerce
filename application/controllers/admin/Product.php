<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Product extends MY_Controller{
        function __construct(){
            parent::__construct();
            $this->load->model('product_model');
        }
        function index(){
            $this->_check_login();
            // $input = array();
            // $list = $this->product_model->get_list($input);
            // $this->data['list'] = $list;

            // $this->data['temp'] = 'admin/product/index';
            // $this->load->view('admin/admin_layout', $this->data);
            $total_records =  $this->product_model->pget_total();
            $perpage	=  5; /* Số books hiển thị trên một page*/
            
                # Tải bộ thư viện Pagination Class của CodeIgniter
            $this->load->library('pagination');
            $config['total_rows']  =  $total_records;
            $config['per_page']  =  $perpage;
            $config['next_link'] =  'Next »';
            $config['prev_link'] =  '« Prev';
            $config['num_tag_open'] =  '';
            $config['num_tag_close'] =  '';
            $config['num_links']	=  5;
            $config['cur_tag_open'] =  '<a class="currentpage">';
            $config['cur_tag_close'] =  '</a>';
            $config['base_url'] =  base_url().'/index.php/admin/product/index/';
            $config['uri_segment']	 =  4;
                
            // Khởi tạo phân trang
            $this->pagination->initialize($config); 
                                  
            // Tạo link phân trang
            $pagination =  $this->pagination->create_links();

            //Lấy offset
            $offset  =  ($this->uri->segment(4)=='') ? 0 : $this->uri->segment(4); 
            //tim kiem theo ten
            if(isset($_GET['name'])){
                $key = $this->input->get('name');
                $this->data['list'] = $this->product_model->search($key);
                $this->data['pagination'] = $pagination;
                $this->data['temp'] = 'admin/product/index';
                $this->load->view('admin/admin_layout', $this->data);
            }else{
                //Đẩy dữ liệu ra view
                $this->data['list'] =  $this->product_model->get_current_page_records($perpage, $offset);
                $this->data['pagination'] = $pagination;
                $this->data['temp'] = 'admin/product/index';
                $this->load->view('admin/admin_layout', $this->data);   
            }
        }
    }
?>