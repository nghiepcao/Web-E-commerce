<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller{
    function index(){
        $data = array(
            'temp',
            'right',
        );
        $data['temp'] = 'site/home/index';
        $this->load->view('site/layout',$data);
    }
    function products(){
        $data = array(
            'temp',
        );
        $data['temp'] = 'site/home/products';
        $this->load->view('site/layout',$data);
    }
    function products_details(){
        $data = array(
            'temp',
        );
        $data['temp'] = 'site/home/products_details';
        $this->load->view('site/layout',$data);
    }
    function checkout(){
        $data = array(
            'temp',
        );
        $data['temp'] = 'site/home/home_checkout';
        $this->load->view('site/layout',$data);
    }
    function cart(){
        $data = array(
            'temp',
        );
        $data['temp'] = 'site/home/home_cart';
        $this->load->view('site/layout',$data);
    }
    function login(){
        $data = array(
            'temp',
        );
        $data['temp'] = 'site/home/home_login';
        $this->load->view('site/layout',$data);
    }
    function blog_list(){
        $data = array(
            'temp',
        );
        $data['temp'] = 'site/home/home_bloglist';
        $this->load->view('site/layout',$data);
    }
    function blog_single(){
        $data = array(
            'temp',
        );
        $data['temp'] = 'site/home/home_blogsingle';
        $this->load->view('site/layout',$data);
    }
    function contact_us(){
        $data = array(
            'temp',
        );
        $data['temp'] = 'site/home/home_contact';
        $this->load->view('site/layout',$data);
    }    
}
?>