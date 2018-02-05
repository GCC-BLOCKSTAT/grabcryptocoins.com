<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Coin');
        $this->load->helper('common');
    }

    public function index($slug) {
        if ($slug != "") {
            $page = $this->Coin->get_data_where('tbl_pages', array('slug' => $slug));
            $data = $this->Coin->get_data_row($page);
            $content = $this->load->view('page-list.php', array('data' => $data), TRUE);
            $this->load->view('template', array('content' => $content));
        }
    }

}

?>