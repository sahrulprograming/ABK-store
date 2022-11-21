<?php
function upload_file($name, $folder, $old_image = null)
{
    $ci3 = get_instance();
    $config['upload_path']          = FCPATH . "/assets/img/$folder";
    $config['allowed_types']        = 'jpg|png|jpeg|jiff|webp';
    $config['max_size']             = 2048;
    $config['file_name']            = $folder . "_" . time();

    $ci3->load->library('upload', $config);

    if (!$ci3->upload->do_upload($name)) {
        $error = [
            'status' => 'error',
            'data' => $ci3->upload->display_errors()
        ];
        return $error;
    } else {
        if ($old_image) {
            $pathImage = FCPATH . '/assets/img/products/' . $old_image;
            unlink($pathImage);
        }
        $data = $ci3->upload->data();
        return [
            'status' => 'success',
            'data' => $data['file_name']
        ];
    }
}

function cekLogin()
{
    $ci3 = get_instance();
    if (!$ci3->session->userdata('user_id')) {
        $ci3->session->set_flashdata('alert', alert('failed', 'harap login terlebih dahulu'));
        redirect(current_url());
    }
}

function total_price_order($products)
{
    $total = 0;
    foreach ($products as $product) {
        $total += $product->product_price * $product->qty;
    }
    return $total;
}


function rupiah($nominal)
{
    return number_format($nominal, 2, ',', '.');
}


function get_count_cart()
{
    $ci3 = get_instance();
    $ci3->load->model('Cart_model', 'cart');
    return $ci3->cart->count_cart($ci3->session->userdata('user_id'));
}
