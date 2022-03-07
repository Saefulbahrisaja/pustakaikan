<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ikan extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('ikan_model');
    }

    public function index()
    {
        $data = $this->ikan_model->get_all();

        $this->render_page('Kelola Ikan', 
            $this->render_view('admin/ikan/index', [
                'data' => $data,
            ]),
            '',
            $this->render_view('admin/ikan/script')
        );
    }

    public function store()
    {
        
    }
}