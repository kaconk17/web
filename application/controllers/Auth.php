<?php
class Auth extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('model_user');
    }
    function login(){
        
           $username = $this->input->post('username');
           $password = $this->input->post('password');

            $hasil = $this->model_user->login($username,$password);
            
            if ($hasil) {
                $sess_array = array();
                foreach ($hasil as $row) {
                    $sess_array = array('NAMA'=>$row->user_name,'DEPT'=>$row->dept,'LEVEL'=>$row->user_class, 'login_status'=>TRUE,);
                    $this->session->set_userdata($sess_array);
                    
                    echo "success";
                }
            } else {
                echo "gagal";
                
                
            
            }
            
          
    }
    function logout(){
        $this->session->unset_userdata('NAMA');
        $this->session->unset_userdata('DEPT');
        $this->session->unset_userdata('LEVEL');
        $this->session->unset_userdata('login_status');
        redirect('');
    }
    function index(){
        if ($this->session->userdata('login_status')!= TRUE) {
            $this->load->view('login');
        } elseif ($this->session->userdata('login_status')== TRUE && $this->session->userdata('LEVEL') == 'guest') {
            
            $this->template->load('guest/index','dashboard');
            //$this->load->view('guest/index');
        }else{
            
            $this->template->load('index','dashboard');
        }
    }

    function price_list(){
       $this->template->load('index','price_list');
    }

    function guest(){
        $sess_array = array('NAMA'=>'guest','DEPT'=>'guest','LEVEL'=>'guest', 'login_status'=>TRUE,);
                    $this->session->set_userdata($sess_array);
                    echo "success";
    }
    public function dashboard(){
        $this->load->view('dashboard');
    }
}