<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

	public function index()
    {
        $this->render_page('Home', 
            $this->render_view('admin/dashboard/index', ''),
        );
    }

    public function profile()
    {
        $this->render_page('Profile', 
            $this->render_view('admin/profile/index', ''),
        );
    }
}