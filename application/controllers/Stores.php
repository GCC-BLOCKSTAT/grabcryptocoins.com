<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Stores extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Coin');
        $this->load->library('pagination');
        $this->load->helper('common');
    }

    public function index($id=false) {
        $limit_per_page = 6;

        $start_index = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
        if($id != ''){
        $params["results"] = $this->Coin->get_current_page_records($limit_per_page, $id); 
        }else{
            $params["results"] = $this->Coin->get_current_page_records($limit_per_page, $start_index); 
        }
        $params["categoriesData"] = $this->Coin->get_table_data("tbl_store");
        $store['data'] = $this->Coin->get_data_where('tbl_store',array('status'=>'1'))->result();
            $total_records = count($store['data']);
            
            $config['base_url'] = base_url("stores"); 
            $config['total_rows'] = $total_records;
            $config['per_page'] = 6;
            $config["uri_segment"] = 2;
             
            // custom paging configuration
             
            $config['full_tag_open'] = '<ul class="pagination">';
            $config['full_tag_close'] = '</ul>';
             
            $config['first_link'] = 'First Page';
            $config['first_tag_open'] = '<li>';
            $config['first_tag_close'] = '</li>';
             
            $config['last_link'] = 'Last Page';
            $config['last_tag_open'] = '<li>';
            $config['last_tag_close'] = '</li>';
             
            $config['next_link'] = '>';
            $config['next_tag_open'] = '<li>';
            $config['next_tag_close'] = '</li>';
 
            $config['prev_link'] = '<';
            $config['prev_tag_open'] = '<li>';
            $config['prev_tag_close'] = '</li>';
 
            $config['cur_tag_open'] = '<li>';
            $config['cur_tag_close'] = '</li>';
 
            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = '</li>';
             
            $rt = $this->pagination->initialize($config);
                
            // build paging links
            $params["links"] = $this->pagination->create_links();
            $content = $this->load->view('store.php', $params, TRUE);
            $this->load->view('template', array('content' => $content));
        }
}

?>