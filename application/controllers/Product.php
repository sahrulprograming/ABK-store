<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Products_model', 'products');
        $this->load->model('Cart_model', 'cart');
    }
    public function index()
    {
    }
    public function show($product_id = null)
    {
        if ($product_id) {
            $data['product'] = $this->products->read_by_id($product_id);
            $this->load->view('layouts/guest/head', $data);
            $this->load->view('guest/product/show');
            $this->load->view('layouts/guest/footer');
        } else {
            redirect(base_url());
        }
    }

    public function addToCart()
    {
        if (!$this->session->userdata('user_id')) {
            $respown = [
                'status' => 'not login',
                'data' => false
            ];
        } else {
            $cart = [
                'qty' => $this->input->post('qty'),
                'product_id' => $this->input->post('productId'),
                'user_id' => $this->session->userdata('user_id'),
            ];
            $addToCart = $this->cart->create($cart);
            if ($addToCart) {
                $count_cart = $this->cart->count_cart($this->session->userdata('user_id'));
                $respown = [
                    'status' => 'success',
                    'data' => $count_cart
                ];
            }
        }
        echo json_encode($respown);
    }
    public function removeToCart()
    {
        if (!$this->session->userdata('user_id')) {
            $respown = [
                'status' => 'not login',
                'data' => false
            ];
        } else {
            $cart = [
                'qty' => $this->input->post('qty'),
                'product_id' => $this->input->post('productId'),
                'user_id' => $this->session->userdata('user_id'),
            ];
            $addToCart = $this->cart->update($cart, $this->input->post('cartId'));
            if ($addToCart) {
                $count_cart = $this->cart->count_cart($this->session->userdata('user_id'));
                $respown = [
                    'status' => 'success',
                    'data' => $count_cart
                ];
            }
        }
        echo json_encode($respown);
    }

    public function cart()
    {
        if ($this->session->userdata('user_id')) {
            $data['carts'] = $this->cart->read_by_user_id($this->session->userdata('user_id'));
            $this->load->view('layouts/guest/head', $data);
            $this->load->view('guest/product/cart');
            $this->load->view('layouts/guest/footer');
        } else {
            redirect(base_url());
        }
    }

    public function delete_cart($product_id)
    {
        $delete = $this->cart->delete($product_id, $this->session->userdata('user_id'));
        if ($delete) {
            redirect(base_url('product/cart'));
        }
    }
}
