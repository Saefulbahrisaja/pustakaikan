<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
	public function render_view($view, $data = '')
    {
        return $this->load->view($view, $data, true);
    }
}

class Auth_Controller extends MY_Controller
{
	protected $redirect_url = 'admin/auth/login';
    protected $auth_url = 'admin/home';
	protected $except = [];
    protected $guest = [];

 	function __construct()
 	{
 		parent::__construct();

        $this->load->library('authentication');

        if (!$this->authentication->is_logged_in())
        {
        	if (!in_array(uri_string(), $this->except))
        	{
        		redirect($this->redirect_url);
        	}
        }
        else
        {
            if (in_array(uri_string(), $this->guest))
            {
                redirect($this->auth_url);
            }
        }
 	}
}

class Admin_Controller extends Auth_Controller
{
    public function render_page($title, $content, $style = null, $script = null)
    {
        $this->load->view('layouts/admin', [
            'title' => $title,
            'head' => $style ?? $this->get_style_view(),
            'tail' => $script ?? $this->get_script_view(),
            'content' => $content,
            'sidebar' => $this->get_sidebar_view(),
            'navbar' => $this->get_navbar_view(),
            'footer' => $this->get_footer_view(),
        ]);
    }

    public function get_sidebar_view()
    {
        return $this->load->view('admin/components/sidebar', '', true);
    }

    public function get_footer_view()
    {
        return $this->load->view('admin/components/footer', '', true);
    }

    public function get_navbar_view()
    {
        return $this->load->view('admin/components/navbar', '', true);
    }

    public function get_style_view()
    {
        return '';
    }

    public function get_script_view()
    {
        return '';
    }
}