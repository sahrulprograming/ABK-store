<?php
class Payment_model extends CI_Model
{
    public function checkout($inputOrder, $products)
    {
        $this->db->trans_begin();
        $invoice = 'INV_' . time();
        $order = [
            'invoice' => $invoice,
            'user_id' => $inputOrder['user_id'],
            'bukti' => $inputOrder['bukti'],
        ];
        $this->db->insert('orders', $order);
        foreach ($products as $product) {
            $order_product = [
                'invoice' => $invoice,
                'product_id' => $product->product_id,
                'qty' => $product->qty,
                'amount' => $product->product_price * $product->qty
            ];
            $this->db->insert('order_products', $order_product);
        }
        $this->db->delete('cart', ['user_id' => $inputOrder['user_id']]);
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
        } else {
            $this->db->trans_commit();
        }
    }
}
