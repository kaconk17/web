<?php

class Model_user extends CI_Model{

    function login($username, $password){
       $periksa = $this->db->get_where('tb_user', array('user_name'=>$username,'password'=>md5($password)));
        
        
        if ($periksa->num_rows() > 0) {
            return $periksa->result();
        } else {
            return false;
        }
        
    }
}

