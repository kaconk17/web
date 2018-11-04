<?php

class Purchasing extends CI_Controller{

   public function __construct(){
        parent::__construct();
        $this->load->model('system_model');
    }
   public function price_list(){
        
        $this->load->view('table/price_list');
        

    }

    public function cari_item(){
        $table = 'tb_masteritem';
        $con = $this->input->post('con');
        $cari= $this->input->post('cari');
        $table = $this->system_model->search_item($table,$con,$cari);

        $harga['html'] = $this->load->view('table/price_list', compact('table'),true);
        echo json_encode($harga);
    }

    public function pagination(){
        $table = $this->input->post('table');
        $con = $this->input->post('con');
        $cari= $this->input->post('cari');
        $page = $this->input->post('page');
        $record = $this->system_model->total_record($table,$con,$cari);
        $result = $this->system_model->pagination($table,$con,$cari,$page);
        $pages = ceil($record/20);
        
        $harga['pages'] = $pages;
        $harga['html'] = $this->load->view('table/price_list', compact('result'),true);
        echo json_encode($harga);
        
    }

    public function datatable_price(){
        $limit = $this->input->post('length');
        $start = $this->input->post('start');;
        
        $record = $this->system_model->total_allrecord('tb_masteritem');
        $totalFiltered = $record;
        
        if(empty($this->input->post('search')['value']))
        {            
            $posts = $this->system_model->get_alldata('tb_masteritem',$limit,$start);
        }
        else {
            $search = $this->input->post('search')['value']; 

            $posts =  $this->system_model->search_alldata('tb_masteritem',$limit,$start,$search);

            $totalFiltered = $this->system_model->total_search('tb_masteritem',$search);
        }
        $no = $start;
        $data = array();
        if(!empty($posts))
        {
            
                foreach ($posts as $post)
            {
                $no++;
                $nestedData['no'] = $no;
                $nestedData['item_code'] = $post->item_code;
                $nestedData['class'] = $post->class;
                $nestedData['item'] = $post->item;
                $nestedData['spesifikasi'] = $post->spesifikasi;
                $nestedData['uom'] = $post->uom;
                $nestedData['price'] = $post->price;
                $nestedData['currency'] = $post->currency;
                $nestedData['supplier'] = $post->supplier;
                
                
                
                $data[] = $nestedData;

            } 
            
            
        }

        $json_data = array(
            'draw'            => intval($this->input->post('draw')),  
            'recordsTotal'    => intval($record),  
            'recordsFiltered' => intval($totalFiltered), 
            'data'            => $data   
            );
    
        echo json_encode($json_data); 
    }
    public function table_request(){
        $limit = $this->input->post('length');
        $start = $this->input->post('start');;
        
        $record = $this->system_model->total_allrecord('tb_request');
        $totalFiltered = $record;
        
        if(empty($this->input->post('search')['value']))
        {            
            $posts = $this->system_model->get_alldata('tb_request',$limit,$start);
        }
        else {
            $search = $this->input->post('search')['value']; 

            $posts =  $this->system_model->search_alldata('tb_request',$limit,$start,$search);

            $totalFiltered = $this->system_model->total_search('tb_request',$search);
        }
        $no = $start;
        $data = array();
        if(!empty($posts))
        {
            foreach ($posts as $post)
            {
                $no++;
                $nestedData['no'] = $no;
                $nestedData['request_date'] = $post->request_date;
                $nestedData['request_no'] = $post->request_no;
                $nestedData['item'] = $post->item;
                $nestedData['spesifikasi'] = $post->spesifikasi;
                $nestedData['item_code'] = $post->item_code;
                $nestedData['qty'] = number_format($post->qty);
                $nestedData['uom'] = $post->uom;
                $nestedData['reason'] = $post->reason;
                $nestedData['po_no'] = $post->po_np;
                $nestedData['status_po'] = $post->status_po;
                
                
                
                $data[] = $nestedData;

            }
        }

        $json_data = array(
            'draw'            => intval($this->input->post('draw')),  
            'recordsTotal'    => intval($record),  
            'recordsFiltered' => intval($totalFiltered), 
            'data'            => $data   
            );
    
        echo json_encode($json_data); 
    }
    public function request_table(){
        $this->load->view('table/request_list');
    }
}