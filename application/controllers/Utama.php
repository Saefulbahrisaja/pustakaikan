<?php
class Utama extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->model('depan/m_utama'); //load model crud_model
        $this->load->model('depan/m_kategori');
        $this->load->model('m_hitstat');

        $this->load->library('tampilan');
    }

    function index(int $num = 0)
    {
        $data = [];
        $data = array_merge($data, $this->get_hitstat());

        $perpage = 2;
        $offset = $num;

        $data['title'] = "Fishpedia";
        $data['menu']  = $this->fetch_sidebar_menu();
        $data['data']  = $this->m_utama->get_all_ikan($perpage, $offset);

        $config['base_url'] = site_url();
        $config['total_rows'] = $this->m_utama->getAll()->num_rows();
        $config['per_page'] = $perpage;
        $config['next_link'] = 'Selanjutnya';
        $config['prev_link'] = 'Sebelumnya';
        $config['first_link'] = 'Awal';
        $config['last_link'] = 'Akhir';
        $config['full_tag_open'] = '<ul class="pagination justify-content-center my-4">';
        $config['full_tag_close'] = '</ul>';
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active" aria-current="page"><a href="#" class="page-link">';
        $config['cur_tag_close'] = '</a></li>';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';
        $config['attributes'] = ['class' => "page-link"];

        $this->pagination->initialize($config);

        $data['top'] = $this->m_utama->get_top_ikan();

        // Compose View
        $this->load->view('layouts/app', [
            'head' => '',
            'tail' => '',
            'content' => $this->load->view('pages/utama/layout', [
                'content' => $this->load->view('pages/utama/home', $data, true),
                'sidebar' => $this->load->view('pages/utama/sidebar', $data, true),
            ], true)
        ]);
    }

    public function search()
    {
        $keyword = $this->input->post('keyword');
        $data = $this->m_utama->search($keyword);

        $result = $this->load->view('pages/utama/search', [
            'data' => $data,
            'keyword' => $keyword,
        ], true);

        echo json_encode(['hasil' => $result]);
    }

    function kategori($id)
    {
        $data = [];
        $data = array_merge($data, $this->get_hitstat());

        $data['title']  = "Kategori";
        $data['detail'] = $this->m_kategori->per_kategori($id);
        $data['menu']   = $this->fetch_sidebar_menu();

        // Compose View
        $this->load->view('layouts/app', [
            'head' => '',
            'tail' => '',
            'content' => $this->load->view('pages/utama/layout', [
                'content' => $this->load->view('pages/utama/kategori', $data, true),
                'sidebar' => $this->load->view('pages/utama/sidebar', $data, true),
            ], true)
        ]);
    }

    function tentangkami()
    {
        $data = [];
        $data = array_merge($data, $this->get_hitstat());

        $data['title'] = "Tentang Kami";
        $data['menu']  = $this->fetch_sidebar_menu();

        // Compose View
        $this->load->view('layouts/app', [
            'head' => '',
            'tail' => '',
            'content' => $this->load->view('pages/utama/layout', [
                'content' => $this->load->view('pages/utama/about', $data, true),
                'sidebar' => $this->load->view('pages/utama/sidebar', $data, true),
            ], true)
        ]);
    }

    function detail($id)
    {
        $data = [];
        $data = array_merge($data, $this->get_hitstat());

        $data['title']   = "Selengkapnya";
        $data['detail']  = $this->m_utama->per_id($id);
        $data['menu']    = $this->fetch_sidebar_menu();

        $maps = $this->m_utama->sebaran($id);
        $hasil = array_map(fn ($row) => [
            $row->deskripsi_sebaran, $row->latitude, $row->longitude
        ], $maps);
        // $hasil = array();
        // foreach ($maps as $row) {
        //     $hasil[] = array($row->deskripsi_sebaran, $row->latitude, $row->longitude);
        // }

        $data['lokasi'] = $hasil;

        // Compose View
        $this->load->view('layouts/app', [
            'head' => '',
            'tail' => $this->load->view('pages/utama/map', $data, true),
            'content' => $this->load->view('pages/utama/layout', [
                'content' => $this->load->view('pages/utama/detail', $data, true),
                'sidebar' => $this->load->view('pages/utama/sidebar', $data, true),
            ], true)
        ]);
    }

    public function fetch_sidebar_menu()
    {
        $data = $this->m_utama->get_menu();

        $menu = "";
        foreach ($data as $item) {
            $menu .= "
                <ul class='list-unstyled mb-0'>
                    <li><a href=" . site_url('Utama/kategori/' . encrypt_url($item->kd_kategori)) . ">" . $item->nm_kategori . "</a></li>
                </ul>
            ";
        }
        return $menu;
    }

    private function get_hitstat()
    {
        //Counter
        $ip    = $this->input->ip_address(); // Mendapatkan IP user
        $date  = date("Y-m-d"); // Mendapatkan tanggal sekarang

        // Naikan Jumlah Visitor berdasar ip dan tanggal
        $this->m_hitstat->increment_visitor($ip, $date);

        // Hitung Pengunjung Hari Ini
        $pengunjung_hari_ini = $this->m_hitstat->get_visitor_count(compact('date'));

        // Hitung Pengunjung
        $total_pengunjung = $this->m_hitstat->get_visitor_hits_count();

        // Hitung Pengunjung Online
        $pengunjung_online = $this->m_hitstat->get_visitor_online_count();

        return compact('pengunjung_hari_ini', 'total_pengunjung', 'pengunjung_online');
    }

    function login()
    {
        $this->load->view('login');
    }
}
