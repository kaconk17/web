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

    public function rekap_pemakaian(){
        $tanggal_awal = $this->input->post('tgl_awal');
        $tanggal_akhir = $this->input->post('tgl_akhir');

        if (empty($tanggal_awal) || empty($tanggal_akhir)) {
            
            $tanggal_akhir = date('Y-m-d');
            $tanggal_awal = date('Y-m').'-01';
        }

        $table = $this->system_model->rekap_dept($tanggal_awal, $tanggal_akhir);
        $rekap['html']= $this->load->view('table/rekap_dept', compact('table','tanggal_awal','tanggal_akhir'),true);
       /* $data=array();
        foreach ($table as $row) {
            

                $track['y']= $row->dept; //y sebagai kata kunci nya (tahun)    
                $track['jumlah']=$row->total; //jumlah penjualan
              
            $data[]=$track;
        }
        $json_data = array( 'html' => $this->load->view('table/rekap_used', compact('table','tanggal_awal','tanggal_akhir'),true), 'data'=>$data);
        */
        echo json_encode($rekap);
        //$this->load->view('rekap_pemakaian',compact('table'));


    }

    public function rekap_page(){
        $this->load->view('rekap_pemakaian');
    }
    public function chart_rekap(){
        $tanggal_awal = $this->input->post('tgl_awal');
        $tanggal_akhir = $this->input->post('tgl_akhir');

        if (empty($tanggal_awal) || empty($tanggal_akhir)) {
            
            $tanggal_akhir = date('Y-m-d');
            $tanggal_awal = date('Y-m').'-01';
            //$tanggal_awal = '2018-05-01';
            //$tanggal_akhir = '2018-05-30';
        }
        $tgl_str = date('Y-m').'-01';
        $tanggal_avg = date('Y-m-d', strtotime('-3 month', strtotime($tgl_str)));
        
        $table = $this->system_model->rekap_dept($tanggal_awal, $tanggal_akhir);
        //$table2 = $this->system_model->avg_pemakaian($tanggal_avg, $tgl_str);
       //$table['tanggal']= $tanggal_awal;
       //$table['tanggal']->tanggal_akhir= $tanggal_akhir;
       $data = array();
       foreach ($table as $row){
            $data[]= array('dept1'=>$row->dept, 'total1'=>$row->total,);
       }
       /*foreach ($table2 as $key) {
           $data[]= array('dept1'=>$key->dept, 'total2'=>$key->total,);
       }*/
        echo json_encode($data);
    }

    
}