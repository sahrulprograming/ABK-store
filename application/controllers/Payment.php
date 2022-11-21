<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Payment extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Cart_model', 'cart');
        $this->load->model('Users_model', 'users');
        $this->load->model('Payment_model', 'payment');
    }
    public function index()
    {
        $this->form_validation->set_rules('address', 'address', 'required');
        $this->form_validation->set_rules('city', 'city', 'required');
        $this->form_validation->set_rules('phone_number', 'phone_number', 'required');
        $cart = $this->cart->read_by_user_id($this->session->userdata('user_id'));
        if ($this->form_validation->run() == FALSE) {
            $data['user'] = $this->users->read_by_id($this->session->userdata('user_id'));
            $data['carts'] = $cart;
            $data['total_price'] = total_price_order($cart);
            $data['title'] = "chackout";
            $this->load->view('layouts/guest/head', $data);
            $this->load->view('guest/product/checkout');
            $this->load->view('layouts/guest/footer');
        } else {
            $gambar = upload_file('bukti', 'bukti');
            if ($gambar['status'] == 'error') {
                $this->session->set_flashdata('alert', alert('failed', $gambar['data']));
                redirect(base_url('product/cart'));
            }
            $orderInput = [
                'user_id' => $this->session->userdata('user_id'),
                'bukti' => $gambar['data'],
            ];
            $this->payment->checkout($orderInput, $cart);
            $this->session->set_flashdata('alert', alert('success', 'Berhasil order menunggu konfirmasi admin'));
            redirect(base_url());
        }
    }
}
