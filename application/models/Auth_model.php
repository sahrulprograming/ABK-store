<?php
class Auth_model extends CI_Model
{
    public function login($email)
    {
        $this->db->join('role', 'user_info.role_id = role.id');
        return $this->db->get_where('user_info', ['email' => $email])->row();
    }
    public function register($user)
    {
        return $this->db->insert('user_info', $user);
    }
}
