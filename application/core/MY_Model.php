<?php
    class MY_Model extends CI_Model{
        var $table = '';
        var $key = 'id';
        var $order = '';
        var $select = '';

        function create($data){
            if($this->db->insert($this->table,$data)){
                return true;
            }else{
                return false;
            }
        }
        //cap nhat du lieu
        function update($id,$data){
            if(!$id){
                return false;
            }
            $where = array();
            $where[$this->key] = $id;
            $this->update_rule($where, $data);

            return true;
        }
        //cap nhat du lieu tu dieu kien
        function update_rule($where, $data){
            if(!$where){
                return false;
            }
            $this->db->where($where);
            $this->db->update($this->table, $data);
            return true;
        }
        //delete theo id
        function delete($id){
            if(!$id){
                return false;
            }
            if(is_numeric($id)){
                $where = array($this->key=>$id);
            }else{
                $where = $this->key ."IN (".$id.")";
            }
            $this->del_rule($where);
            return true;
        }
        //delete theo dieu kien
        function del_rule($where){
            if(!$where){
                return false;
            }
            $this->db->where($where);
            $this->db->delete($this->table);
            return true;
        }
        //thuc hien cau lenh query
        function query($sql){
            $rows = $this->db->query($sql);
            return $rows->result;
        }
        //lay thong tin cua row tu id
        function get_info($id, $field = ''){
            if(!$id){
                return false;
            }
            $where = array();
            $where[$this->key] = $id;
            return $this->get_info_rule($where,$field);
        }
        /**
         * lay thong tin cua row tu dieu kien
         * $where mang dieu kien
         * $file cac truong muon lay du lieu
         */
        function get_info_rule($where= array(), $field =''){
            if($field){
                $this->db->select($field);
            }
            $this->db->where($where);
            $query = $this->db->get($this->table);
            if($query -> num_rows()){
                return $query->row();
            }
            return false;
        }
        /**
         * lay tong so
         */
        function get_total($input = array()){
            $this->get_list_set_input($input);
            $query = $this->db->get($this->data);
            return $query->num_rows();
        }
        /**
         * lay tong so
         * $field cot muon tinh tong
         */
        function get_sum($field = '', $where = array()){
            $this->db->select_sum($field);
            $this->db->where($where);
            $this->db->from($this->table);
            
            $row = $this->db->get()->row();
            foreach($row as $f => $v){
                $sum = $v;
            }
            return $sum;
        }
        /**
         * lay 1 row
         */
        function get_row($input = array()){
            $this->get_list_set_input($input);
            $query = $this->db->get($this->table);
            return $query->row();
        }
        /**
         * lay danh sach
         * $input: mang cac du lieu dau vao
         */
        function get_list($input = array()){
            $this->get_list_set_input($input);
            $query = $this->db->get($this->table);
            return $query->result();
        }
        /**
         * Gan cac thuoc tinh trong input khi lay danh sach
         * $input : mang du lieu dau vao
         */
        
        protected function get_list_set_input($input = array()){
		
            // Thêm điều kiện cho câu truy vấn truyền qua biến $input['where'] 
            //(vi du: $input['where'] = array('email' => 'hocphp@gmail.com'))
            if ((isset($input['where'])) && $input['where']){
                $this->db->where($input['where']);
            }
            
            //tim kiem like
            // $input['like'] = array('name' => 'abc');
            if ((isset($input['like'])) && $input['like']){
                $this->db->like($input['like'][0], $input['like'][1]); 
            }
            
            // Thêm sắp xếp dữ liệu thông qua biến $input['order'] 
            //(ví dụ $input['order'] = array('id','DESC'))
            if (isset($input['order'][0]) && isset($input['order'][1])){
                $this->db->order_by($input['order'][0], $input['order'][1]);
            }
            else{
                //mặc định sẽ sắp xếp theo id giảm dần 
                $order = ($this->order == '') ? array($this->table.'.'.$this->key, 'desc') : $this->order;
                $this->db->order_by($order[0], $order[1]);
            }
            
            // Thêm điều kiện limit cho câu truy vấn thông qua biến $input['limit'] 
            //(ví dụ $input['limit'] = array('10' ,'0')) 
            if (isset($input['limit'][0]) && isset($input['limit'][1])){
                $this->db->limit($input['limit'][0], $input['limit'][1]);
            }
            
	    }
        /**
         * kiểm tra sự tồn tại của dữ liệu theo 1 điều kiện nào đó
         * $where : mang du lieu dieu kien
         */
        function check_exists($where = array())
        {
            $this->db->where($where);
            //thuc hien cau truy van lay du lieu
            $query = $this->db->get($this->table);
            
            if($query->num_rows() > 0){
                return TRUE;
            }else{
                return FALSE;
            }
        }
    }
?>