<?php
// CRUD
class Categories_model extends CI_Model
{
    public $cat_title;

    public function read() // melihat semua data category
    {
        return $this->db->get('categories')->result();
    }
    public function read_by_id($category_id) // melihat semua data category berdasarkan id
    {
        $this->db->select('*');
        $this->db->from('categories');
        $this->db->where('categories.cat_id', $category_id);
        return $this->db->get()->row();
    }
    public function create($category) // membuat category
    {
        $this->cat_title = $category['cat_title'];
        $this->db->insert('categories', $this);
    }
    public function update($category, $id) // merubah data category
    {
        $this->cat_title = $category['cat_title'];
        return $this->db->update('categories', $this, ['cat_id' => $id]);
    }

    public function delete($id) // menghapus data category
    {
        return $this->db->delete('categories', ['cat_id' => $id]);
    }
}
