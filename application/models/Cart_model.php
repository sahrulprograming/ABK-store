<?php
// CRUD
class Cart_model extends CI_Model
{
    public $product_id;
    public $ip_address;
    public $user_id;
    public $qty;

    public function read() // melihat semua data cart
    {
        $this->db->select('*');
        $this->db->from('cart');
        $this->db->join('user_info', 'cart.user_id = user_info.user_id');
        $this->db->join('products', 'cart.product_id = products.product_id');
        $this->db->join('categories', 'products.product_cat = categories.cat_id');
        return $this->db->get()->result();
    }
    public function read_by_user_id($user_id) // melihat semua data cart berdasarkan user id
    {
        $this->db->select('*');
        $this->db->from('cart');
        $this->db->join('user_info', 'cart.user_id = user_info.user_id');
        $this->db->join('products', 'cart.product_id = products.product_id');
        $this->db->join('categories', 'products.product_cat = categories.cat_id');
        $this->db->where('cart.user_id', $user_id);
        return $this->db->get()->result();
    }

    public function count_cart($user_id)
    {
        $this->db->select_sum('qty');
        $this->db->where('user_id', $user_id);
        return $this->db->get('cart')->row()->qty;
    }
    public function create($cart) // membuat cart
    {
        $this->product_id = $cart['product_id'];
        $this->ip_address = $_SERVER['REMOTE_ADDR'];
        $this->user_id = $cart['user_id'];
        $cek_barang = $this->db->get_where('cart', ['product_id' => $cart['product_id'], 'user_id' => $cart['user_id']])->row();
        if ($cek_barang) {
            $this->qty = (int)$cart['qty'] + (int)$cek_barang->qty;
            return $this->db->update('cart', $this);
        } else {
            $this->qty = $cart['qty'];
            return $this->db->insert('cart', $this);
        }
    }
    public function update($cart, $cart_id) // membuat cart
    {
        $this->product_id = $cart['product_id'];
        $this->ip_address = $_SERVER['REMOTE_ADDR'];
        $this->user_id = $cart['user_id'];
        $this->qty = (int)$cart['qty'];
        return $this->db->update('cart', $this, ['id' => $cart_id]);
    }

    public function delete($product_id, $user_id) // menghapus data cart
    {
        return $this->db->delete('cart', ['product_id' => $product_id, 'user_id' => $user_id]);
    }
}
