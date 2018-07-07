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
        
        $this->db->limit(10,$offset);
        $result = $this->db->get()->result();
        return $result;
    }

    public function total_search($table, $cari){
        $query = $this->db->query("SELECT count(*) as row FROM $table WHERE item LIKE '%$cari%' or spesifikasi like '%$cari%'")->row_array();
        
        return $query['row'];
    }

    public function rekap_dept($tanggal_awal, $tanggal_akhir){
        $query = "SELECT dept, sum(price)as total FROM tb_recap WHERE out_date >= '$tanggal_awal' AND out_date <= '$tanggal_akhir' group by dept";
        $result = $this->db->query($query)->result();
        return $result;
    }
    public function list_dept ($dept, $tanggal_awal, $tanggal_akhir){
        $query = "SELECT tb_recap.item_code, tb_recap.item, tb_recap.spesifikasi, tb_quota.quota , sum(tb_recap.qty) as total, tb_recap.uom FROM tb_recap LEFT JOIN tb_quota ON tb_recap.item_code = tb_quota.item_code AND tb_recap.dept=tb_quota.departemen WHERE tb_recap.out_date >= '$tanggal_awal' AND tb_recap.out_date <= '$tanggal_akhir' and tb_recap.dept ='$dept' GROUP BY tb_recap.item_code, tb_recap.item,tb_recap.spesifikasi, tb_quota.quota, tb_recap.uom";
        $result = $this->db->query($query)->result();
        return $result;
    }

    public function details_out($dept, $tanggal_awal, $tanggal_akhir, $item_code){
        $query = "SELECT out_no, out_date, qty, uom FROM tb_recap WHERE out_date >= '$tanggal_awal' AND out_date <= '$tanggal_akhir' AND item_code = '$item_code' AND dept = '$dept'";
        $result = $this->db->query($query)->result();
        return $result;
    }
    
}
