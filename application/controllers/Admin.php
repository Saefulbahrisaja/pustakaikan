<?php
class Admin extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('belakang/m_ikan'); //load model crud_model
        // $this->load->model('depan/m_kategori');
    }
    
    function home()
    {
        $data['title']="Home";

        $this->load->view('belakang/tampilan/header', $data);
        $this->load->view('belakang/tampilan/menu', $data);
        $this->load->view('belakang/halaman/home', $data);
        $this->load->view('belakang/tampilan/footer', $data);
    }

    function profil()
    {

        $data['title'] = "Profil";

        $this->load->view('belakang/tampilan/header', $data);
        $this->load->view('belakang/tampilan/menu', $data);
        $this->load->view('belakang/halaman/profil', $data);
        $this->load->view('belakang/tampilan/footer', $data);
    }

    function input($num = '')
    {
        //Counter
        
        $perpage = 2;
        $offset = $this->uri->segment(1);
        $data['data'] = $this->m_ikan->get_all_ikan();
        $data['title'] = "Data Ikan";
        $this->load->view('belakang/tampilan/header', $data);
        $this->load->view('belakang/tampilan/menu', $data);
        $this->load->view('belakang/halaman/data_ikan', $data);
        $this->load->view('belakang/tampilan/footer', $data);
    }
    
  
}
