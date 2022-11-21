<?php
class Order_model extends CI_Model
{
    public function read()
    {
        $this->db->join('user_info', 'orders.user_id = user_info.user_id');
        return $this->db->get('orders')->result();
    }
    public function search($keywords)
    {
        $this->db->like('user_info.first_name', $keywords);
        $this->db->join('user_info', 'orders.user_id = user_info.orders.user_id');
        return $this->db->get('orders')->result();
    }
    public function detail_order($invoice)
    {
        $this->db->join('products', 'order_products.product_id = products.product_id');
        $this->db->join('categories', 'products.product_cat = categories.cat_id');
        return $this->db->get_where('order_products', ['invoice' => $invoice])->result();
    }
    public function confirm($invoice)
    {
        $this->db->update('orders', ['status_pembayaran' => 'confirmed'], ['invoice' => $invoice]);
    }
    public function reject($invoice)
    {
        $this->db->update('orders', ['status_pembayaran' => 'reject'], ['invoice' => $invoice]);
    }
}
