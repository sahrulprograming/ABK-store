<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Auth_model', 'auth');
    }
    public function login_ajax()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $get_user = $this->auth->login($email);
        if (password_verify($password, $get_user->password)) {
            $ses_user = [
                'user_id' => $get_user->user_id,
                'image' => $get_user->image,
                'user_role' => $get_user->role_name,
                'user_name' => "$get_user->first_name $get_user->last_name",
            ];
            $this->session->set_userdata($ses_user);
            echo 'successfully';
        } else {
            echo alert('filed', 'email / password salah');
        }
    }
    public function register_ajax()
    {
        $password = $this->input->post('password');
        $repassword = $this->input->post('repassword');
        if ($password == $repassword) {
            $user = [
                'role_id' => 2,
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'email' => $this->input->post('email'),
                'password' => password_hash($password, PASSWORD_DEFAULT)
            ];
            $register = $this->auth->register($user);
            if ($register) {
                $get_user = $this->auth->login($this->input->post('email'));
                $ses_user = [
                    'user_id' => $get_user->user_id,
                    'user_role' => $get_user->role_name,
                    'user_name' => "$get_user->first_name $get_user->last_name",
                    'image' => $get_user->image,
                ];
                $this->session->set_userdata($ses_user);
                echo 'successfully';
            } else {
                echo alert('failed', 'ada yang salah coba cek lagi');
            }
        } else {
            echo alert('failed', 'password konfirmasi salah');
        }
    }
    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url());
    }
}
