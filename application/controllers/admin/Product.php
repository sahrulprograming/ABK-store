<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Products_model', 'products');
        $this->load->model('Categories_model', 'categories');
        $this->load->model('Brands_model', 'brands');
    }
    public function index()
    {
        if ($this->input->post('search')) {
            $data['products'] = $this->products->serach($this->input->post('search'));
            $data['title'] = 'Admin Data Products';
            $this->load->view('layouts/admin/head', $data);
            $this->load->view('admin/product/index');
            $this->load->view('layouts/admin/footer');
        } else {
            $data['products'] = $this->products->read();
            $data['title'] = 'Admin Data Products';
            $this->load->view('layouts/admin/head', $data);
            $this->load->view('admin/product/index');
            $this->load->view('layouts/admin/footer');
        }
    }
    public function show($product_id)
    {
    }
    public function create($product_id = null)
    {
        $this->form_validation->set_rules('category', 'Category', 'required');
        $this->form_validation->set_rules('brand', 'Brand', 'required');
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('price', 'Price', 'required');
        $this->form_validation->set_rules('desc', 'Desc', 'required');
        $this->form_validation->set_rules('keywords', 'Keywords', 'required');
        if ($this->form_validation->run() == FALSE) {
            $data['categories'] = $this->categories->read();
            $data['brands'] = $this->brands->read();
            $data['product'] = $this->products->read_by_id($product_id);
            $data['title'] = 'Admin Data Products';
            $this->load->view('layouts/admin/head', $data);
            $this->load->view('admin/product/create');
            $this->load->view('layouts/admin/footer');
        } else {
            unset($_POST['pathImage']);
            $output_upload = upload_file('image', 'products');
            if ($output_upload['status'] == 'error') {
                var_dump($output_upload['data']);
            } else {
                $_POST += ['image' => $output_upload['data']];
                $insert = $this->products->create($_POST);
                if ($insert) {
                    $this->session->set_flashdata('alert', alert_admin('success', 'Produk Berhasil di tambahkan'));
                    return redirect('admin/product');
                }
            }
        }
    }
    public function update($product_id = null)
    {
        $this->form_validation->set_rules('category', 'Category', 'required');
        $this->form_validation->set_rules('brand', 'Brand', 'required');
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('price', 'Price', 'required');
        $this->form_validation->set_rules('desc', 'Desc', 'required');
        $this->form_validation->set_rules('keywords', 'Keywords', 'required');
        if ($this->form_validation->run() == FALSE) {
            $data['categories'] = $this->categories->read();
            $data['brands'] = $this->brands->read();
            $data['product'] = $this->products->read_by_id($product_id);
            $data['title'] = 'Admin Data Products';
            $this->load->view('layouts/admin/head', $data);
            $this->load->view('admin/product/update');
            $this->load->view('layouts/admin/footer');
        } else {
            if ($_FILES['image']['name'] != '') {
                $old_image = $this->input->post('old_image');
                $output_upload = upload_file('image', 'products', $old_image);
                if ($output_upload['status'] == 'error') {
                    var_dump($output_upload['data']);
                    die;
                } else {
                    $_POST += ['image' => $output_upload['data']];
                }
            } else {
                $_POST += ['image' => $this->input->post('old_image')];
            }
            unset($_POST['pathImage']);
            $insert = $this->products->update($_POST, $product_id);
            if ($insert) {
                $this->session->set_flashdata('alert', alert_admin('success', 'Produk Berhasil di rubah'));
                return redirect('admin/product');
            }
        }
    }
    public function delete($product_id, $image)
    {
        $delete = $this->products->delete($product_id);
        if ($delete) {
            $pathImage = FCPATH . '/assets/img/products/' . $image;
            unlink($pathImage);
            $this->session->set_flashdata('alert', alert_admin('success', 'Produk Berhasil di hapus'));
            return redirect('admin/product');
        }
    }
}
