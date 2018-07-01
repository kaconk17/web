<?php

class System_model extends CI_Model{

    public function getAlldata($table,$limit){
        $this->db->select('*');
        $this->db->from($table);
        //$this->db->limit(10);
        $result = $this->db->get()->result();
        return $result;

        /*$perpage = 10;
        if (isset($page)) {
            $page = $page;
        } else {
            $page = 1;
        }
        $offset = ($page - 1) * $perpage;

        

        

        $this->db->select('*');
        $this->db->from($table);
        $this->db->limit($perpage,$offset);
        $result = $this->db->get()->result();
        return $result;*/
    }

    public function search_item($table,$con,$cari){
        $this->db->select('*');
        $this->db->from($table);
        $this->db->like($con,$cari);
        $this->db->limit(10);
        $result = $this->db->get()->result();
        return $result;
    }

    public function pagination($table, $con, $cari, $page){

        $perpage = 10;
        if (isset($page)) {
            $page = $page;
        } else {
            $page = 1;
        }
        $offset = ($page - 1) * $perpage;

        

        

        $this->db->select('*');
        $this->db->from($table);
        $this->db->like($con,$cari);
        $this->db->limit($perpage,$offset);
        $result = $this->db->get()->result();
        return $result;
    }

    public function total_record($table, $con, $cari){
        $query = $this->db->query("SELECT count(*) as row FROM $table WHERE $con LIKE '%$cari%'")->row_array();
        //$query = $this->db->get('tb_masteritem')->num_rows();
        return $query['row'];
    }

    public function total_allrecord($table){
        $query = $this->db->query("SELECT count(*) as row FROM $table")->row_array();
        
        return $query['row'];
    }

    public function get_alldata($table,$perpage,$offset){
        $this->db->select('*');
        $this->db->from($table);
        if ($perpage != -1) {
            $this->db->limit(10,$offset);
        $result = $this->db->get()->result();
        return $result;
        }
        
    }

    public function search_alldata($table,$perpage,$offset,$search){
        $this->db->select('*');
        $this->db->from($table);
        $this->db->like('item',$search,'both');
        $this->db->or_like('spesifikasi',$search,'both');
        //$sql ="SELECT * from tb_masteritem WHERE item LIKE '%$cari%'";
        $this->db->limit(10,$offset);
        $result = $this->db->get()->result();
        return $result;
    }

    public function total_search($table, $cari){
        $query = $this->db->query("SELECT count(*) as row FROM $table WHERE item LIKE '%$cari%' or spesifikasi like '%$cari%'")->row_array();
        //$query = $this->db->get('tb_masteritem')->num_rows();
        return $query['row'];
    }
    
}
