<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home1 extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('common');
    }

    public function index() {
        $data=array();
        $content = $this->load->view('home.php', array('data' => $data), TRUE);
        $this->load->view('template', array('content' => $content));
    }

}
