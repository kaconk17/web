<?php

class Warehouse extends CI_Controller{

   public function __construct(){
        parent::__construct();
        $this->load->model('system_model');
    }
   public function stock_wh(){
        
        $this->load->view('table/stock_list');
        

    }

    

    

    public function datatable_stock(){
        $limit = $this->input->post('length');
        $start = $this->input->post('start');;
        
        $record = $this->system_model->total_allrecord('tb_stock');
        $totalFiltered = $record;
        
        if(empty($this->input->post('search')['value']))
        {            
            $posts = $this->system_model->get_alldata('tb_stock',$limit,$start);
        }
        else {
            $search = $this->input->post('search')['value']; 

            $posts =  $this->system_model->search_alldata('tb_stock',$limit,$start,$search);

            $totalFiltered = $this->system_model->total_search('tb_stock',$search);
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
                $nestedData['min_stock'] = number_format($post->min_stock);
                $nestedData['status'] = $post->status;
                $nestedData['item'] = $post->item;
                $nestedData['spesifikasi'] = $post->spesifikasi;
                $nestedData['end_stock'] = number_format($post->end_stock);
                $nestedData['uom'] = $post->uom;
                $nestedData['class'] = $post->class;
                $nestedData['used'] = $post->used;
                
                
                
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
}