<?php
    class Product_model extends MY_Model{
        var $table = 'product';
        function __construct() {
            parent::__construct();
        }
    
        public function get_current_page_records($limit, $start) {
            $this->db->limit($limit, $start);
            $query = $this->db->get('product');
    
            if ($query->num_rows() > 0) 
            {
                return $query->result();
            }
    
            return false;
        }
        
        public function pget_total() {
            return $this->db->count_all('product');
        }
        public function search($key){
            $this->db->like('name', $key);
            $query = $this->db->get('product');
            return $query->result();
        }
    }
?>