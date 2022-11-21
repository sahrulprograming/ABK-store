<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Search extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Products_model', 'products');
    }
    public function index()
    {
        $keywords = $this->input->post('search');
        $data['products'] = $this->products->serach($keywords);
        $this->load->view('layouts/guest/head', $data);
        $this->load->view('guest/product/index');
        $this->load->view('layouts/guest/footer');
    }
}
