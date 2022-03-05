<?php
class Utama extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->model('ikan_model');
        $this->load->model('kategori_model');
        $this->load->model('sebaran_model');
        $this->load->model('hitstat_model');
    }

    function index(int $num = 0)
    {
        $data = $this->get_hitstat();

        $perpage = 2;
        $offset = $num;

        $data['title'] = "Fishpedia";
        $data['menu']  = $this->fetch_sidebar_menu();
        $data['data']  = $this->ikan_model->get_all_by_limit($perpage, $offset);

        $config['base_url'] = site_url();
        $config['total_rows'] = $this->ikan_model->count();
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

        $data['top'] = $this->ikan_model->get_latest_ikan();

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
        $data    = $this->ikan_model->search($keyword);

        $result = $this->load->view('pages/utama/search', [
            'data'    => $data,
            'keyword' => $keyword,
        ], true);

        echo json_encode(['hasil' => $result]);
    }

    function kategori($id)
    {
        $data = $this->get_hitstat();

        $data['title']  = "Kategori";
        $data['detail'] = $this->ikan_model->get_all_by_kategori(decrypt_url($id));
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
        $data = $this->get_hitstat();

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
        $data = $this->get_hitstat();

        $data['title']   = "Selengkapnya";
        $data['detail']  = [
            $this->ikan_model->first_by_id(decrypt_url($id)),
        ];
        $data['menu']    = $this->fetch_sidebar_menu();

        $maps = $this->sebaran_model->get_all_by_ikan(decrypt_url($id));
        $hasil = array_map(fn ($row) => [
            $row->deskripsi_sebaran, $row->latitude, $row->longitude
        ], $maps);

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
        $data = $this->kategori_model->get_all();

        $menu = "";
        foreach ($data as $item) {
            $menu .= "
                <ul class='list-unstyled mb-0'>
                    <li><a href=" . site_url('utama/kategori/' . encrypt_url($item->kd_kategori)) . ">" . $item->nm_kategori . "</a></li>
                </ul>
            ";
        }
        return $menu;
    }

    private function get_hitstat()
    {
        $ip    = $this->input->ip_address(); // Mendapatkan IP user
        $date  = date("Y-m-d"); // Mendapatkan tanggal sekarang

        $this->hitstat_model->increment_visitor($ip, $date);

        $pengunjung_hari_ini = $this->hitstat_model->get_visitor_count(compact('date'));

        $total_pengunjung = $this->hitstat_model->get_visitor_hits_count();

        $pengunjung_online = $this->hitstat_model->get_visitor_online_count();

        return compact('pengunjung_hari_ini', 'total_pengunjung', 'pengunjung_online');
    }

    function login()
    {
        $this->load->view('login');
    }
}
