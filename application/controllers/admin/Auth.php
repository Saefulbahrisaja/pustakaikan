<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends Auth_Controller
{
    protected $redirect_url = 'admin/auth/login';
    protected $auth_url = 'admin/home';

    protected $except = [
        'admin/auth/login',
    ];

    protected $guest = [
        'admin/auth/login',
    ];

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        if ($this->authentication->is_logged_in())
        {
            redirect('admin/home');
        }

        redirect('admin/auth/login');
    }

    public function login()
    {
        $errors = [];

        if ($this->session->has_userdata('username_error'))
        {
            $errors['username'] = $this->session->userdata('username_error');
        }

        if ($this->input->method() == 'post')
        {
            $this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');

            if ($this->form_validation->run())
            {
                $credentials = $this->input->post(['username', 'password']);

                if ($this->authentication->login($credentials))
                {
                    redirect('admin/home');
                }
                else
                {
                    $this->session->set_flashdata('username_error', 'Username atau password salah!');

                    redirect('admin/auth/login');
                }
            }
        }

        $data['errors'] = array_merge($errors, $this->form_validation->error_array());

        $this->load->view(
            'layouts/auth', [
                'title' => 'Login',
                'head' => '',
                'tail' => '',
                'content' => $this->load->view('auth/login', $data, true),
            ],
        );
    }

    public function logout()
    {
        $this->authentication->logout();

        redirect('utama');
    }
}
