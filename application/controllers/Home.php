<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Products_model', 'products');
	}
	public function index()
	{
		$data['electronics'] = $this->products->get_all_by_categories('Electronics');
		$data['ladiesWears'] = $this->products->get_all_by_categories('Ladies Wears');
		$data['menWears'] = $this->products->get_all_by_categories('Mens Wear');
		$data['kidsWears'] = $this->products->get_all_by_categories('Kids Wear');
		$this->load->view('layouts/guest/head', $data);
		$this->load->view('home');
		$this->load->view('layouts/guest/footer');
	}
}
