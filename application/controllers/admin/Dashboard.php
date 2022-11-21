<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $data['title'] = 'Admin Dashboard';
        $this->load->view('layouts/admin/head', $data);
        $this->load->view('admin/dashboard');
        $this->load->view('layouts/admin/footer');
    }
    public function show($product_id)
    {
    }
}
