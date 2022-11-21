<?php
// CRUD
class Products_model extends CI_Model
{
    public $product_cat;
    public $product_brand;
    public $product_title;
    public $product_price;
    public $product_desc;
    public $product_image;
    public $product_keywords;

    public function read() // melihat semua data product
    {
        $this->db->select('*');
        $this->db->from('products');
        $this->db->join('categories', 'products.product_cat = categories.cat_id');
        $this->db->order_by('product_id', 'DESC');
        return $this->db->get()->result();
    }
    public function read_by_id($product_id) // melihat semua data product berdasarkan id
    {
        $this->db->select('*');
        $this->db->from('products');
        $this->db->join('categories', 'products.product_cat = categories.cat_id');
        $this->db->where('products.product_id', $product_id);
        return $this->db->get()->row();
    }
    public function serach($keywords)
    {
        $this->db->like('product_title', $keywords);
        $this->db->join('categories', 'products.product_cat = categories.cat_id');
        return $this->db->get('products')->result();
    }
    public function get_last_ten_entries() // melihat data product 10 pertama
    {
        $this->db->select('*');
        $this->db->from('products');
        $this->db->join('categories', 'products.product_cat = categories.cat_id');
        return $this->db->get()->result();
    }

    public function get_all_by_categories($category) // melihat data product berdasarkan categorynya
    {
        $this->db->select('*');
        $this->db->from('products');
        $this->db->join('categories', 'products.product_cat = categories.cat_id');
        $this->db->like('categories.cat_title', $category);
        return $this->db->get()->result();
    }
    public function create($product) // membuat product
    {
        $this->product_cat = $product['category'];
        $this->product_brand = $product['brand'];
        $this->product_title = $product['title'];
        $this->product_desc = $product['desc'];
        $this->product_image = $product['image'];
        $this->product_price = $product['price'];
        $this->product_keywords = $product['keywords'];
        return $this->db->insert('products', $this);
    }
    public function update($product, $id) // merubah data product
    {
        $this->product_cat = $product['category'];
        $this->product_brand = $product['brand'];
        $this->product_title = $product['title'];
        $this->product_desc = $product['desc'];
        $this->product_image = $product['image'];
        $this->product_price = $product['price'];
        $this->product_keywords = $product['keywords'];
        return $this->db->update('products', $this, ['product_id' => $id]);
    }

    public function delete($id) // menghapus data product
    {
        return $this->db->delete('products', ['product_id' => $id]);
    }
}
