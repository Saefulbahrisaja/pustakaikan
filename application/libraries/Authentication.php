<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Authentication
{
    function __construct()
    {
        $this->ci =& get_instance();

        $this->ci->load->model('admin_model');
    }

    public function is_logged_in()
    {
        return $this->ci->session->has_userdata('admin_id');
    }

    public function login($credentials)
    {
        $password = $credentials['password'];
        unset($credentials['password']);

        if ($admin = $this->ci->admin_model->find_by($credentials))
        {
            if (password_verify($password, $admin->password))
            {
                $this->ci->session->set_userdata('admin_id', $admin->id_admin);
                $this->ci->session->set_userdata('admin_name', $admin->name);

                return true;
            }
        }

        return false;
    }

    public function get_user()
    {
        $id_admin = $this->ci->session->userdata('admin_id');

        $admin = $this->ci->admin_model->find_by(compact('id_admin'));

        // Hide password
        unset($admin->password);

        return $admin;
    }

    public function logout()
    {
        $this->ci->session->unset_userdata('admin_id');
        $this->ci->session->unset_userdata('admin_name');
    }
}