<?php
// CRUD
class Brands_model extends CI_Model
{
    public $cat_title;

    public function read() // melihat semua data brand
    {
        return $this->db->get('brands')->result();
    }
    public function read_by_id($brand_id) // melihat semua data brand berdasarkan id
    {
        $this->db->select('*');
        $this->db->from('brands');
        $this->db->where('brands.cat_id', $brand_id);
        return $this->db->get()->row();
    }
    public function create($brand) // membuat brand
    {
        $this->cat_title = $brand['cat_title'];
        $this->db->insert('brands', $this);
    }
    public function update($brand, $id) // merubah data brand
    {
        $this->cat_title = $brand['cat_title'];
        return $this->db->update('brands', $this, ['cat_id' => $id]);
    }

    public function delete($id) // menghapus data brand
    {
        return $this->db->delete('brands', ['cat_id' => $id]);
    }
}
