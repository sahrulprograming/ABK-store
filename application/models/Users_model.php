<?php
// CRUD
class Users_model extends CI_Model
{
    public $role_id;
    public $first_name;
    public $last_name;
    public $image;
    public $email;
    public $password;
    public $phone_number;
    public $address;
    public $city;

    public function read() // melihat semua data user
    {
        return $this->db->get('user_info')->result();
    }
    public function read_by_id($user_id) // melihat data user berdasarkan id
    {
        $this->db->select('*');
        $this->db->from('user_info');
        $this->db->where('user_id', $user_id);
        return $this->db->get()->row();
    }
    public function create($user) // membuat user
    {
        $this->role_id = $user['role_id'];
        $this->first_name = $user['first_name'];
        $this->last_name = $user['last_name'];
        $this->image = $user['image'];
        $this->email = $user['email'];
        $this->password = password_hash($user['password'], PASSWORD_DEFAULT);
        $this->phone_number = $user['phone_number'];
        $this->address = $user['address'];
        $this->city = $user['city'];
        $this->db->insert('user_info', $this);
    }
    public function update($user, $user_id) // merubah data user
    {
        $this->role_id = $user['role_id'];
        $this->first_name = $user['first_name'];
        $this->last_name = $user['last_name'];
        $this->image = $user['image'];
        $this->email = $user['email'];
        $this->password = password_hash($user['password'], PASSWORD_DEFAULT);
        $this->phone_number = $user['phone_number'];
        $this->address = $user['address'];
        $this->city = $user['city'];
        return $this->db->update('user_info', $this, ['user_id' => $user_id]);
    }

    public function delete($user_id) // menghapus data brand
    {
        return $this->db->delete('user_info', ['user_id' => $user_id]);
    }
}
