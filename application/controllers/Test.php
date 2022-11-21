<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Test extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Auth_model', 'auth');
    }
    public function index()
    {
        // $this->session->sess_destroy();
        var_dump($_SESSION);
    }
}
