<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Order extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Order_model', 'order');
    }

    public function index()
    {
        if ($this->input->post('search')) {
            $data['orders'] = $this->order->serach($this->input->post('search'));
            $data['title'] = 'Admin Data Orders';
            $this->load->view('layouts/admin/head', $data);
            $this->load->view('admin/order/index');
            $this->load->view('layouts/admin/footer');
        } else {
            $data['orders'] = $this->order->read();
            $data['title'] = 'Admin Data Orders';
            $this->load->view('layouts/admin/head', $data);
            $this->load->view('admin/order/index');
            $this->load->view('layouts/admin/footer');
        }
    }
    public function confirm($invoice)
    {
        $this->order->confirm($invoice);
        $this->session->set_flashdata('alert', alert_admin('success', 'Pembayaran sudah di konfirmasi'));
        redirect('admin/order');
    }
    public function reject($invoice)
    {
        $this->order->reject($invoice);
        $this->session->set_flashdata('alert', alert_admin('success', 'Pembayaran berhasil di batalkan'));
        redirect('admin/order');
    }
    public function detail_order($invoice)
    {
        $data['orders'] = $this->order->detail_order($invoice);
        $data['title'] = 'Admin Data Orders';
        $this->load->view('layouts/admin/head', $data);
        $this->load->view('admin/order/show');
        $this->load->view('layouts/admin/footer');
    }
}
