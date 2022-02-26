<?php
class Utama extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('depan/m_utama'); //load model crud_model
        $this->load->model('depan/m_kategori');
    }

    function index($num = '')
    {
        //Counter
        $ip    = $this->input->ip_address(); // Mendapatkan IP user
        $date  = date("Y-m-d"); // Mendapatkan tanggal sekarang
        $waktu = time(); //
        $timeinsert = date("Y-m-d H:i:s");
        $s = $this->db->query("SELECT * FROM visitor WHERE ip='" . $ip . "' AND date='" . $date . "'")->num_rows();
        $ss = isset($s) ? ($s) : 0;
        if (
            $ss == 0
        ) {
            $this->db->query("INSERT INTO visitor(ip, date, hits, online, time) VALUES('" . $ip . "','" . $date . "','1','" . $waktu . "','" . $timeinsert . "')");
        } else {
            $this->db->query("UPDATE visitor SET hits=hits+1, online='" . $waktu . "' WHERE ip='" . $ip . "' AND date='" . $date . "'");
        }

        $pengunjunghariini  = $this->db->query("SELECT * FROM visitor WHERE date='" . $date . "' GROUP BY ip")->num_rows(); // Hitung jumlah pengunjung

        $dbpengunjung = $this->db->query("SELECT COUNT(hits) as hits FROM visitor")->row();

        $totalpengunjung = isset($dbpengunjung->hits) ? ($dbpengunjung->hits) : 0;
        $bataswaktu = time() - 300;
        $pengunjungonline  = $this->db->query("SELECT * FROM visitor WHERE online > '" . $bataswaktu . "'")->num_rows(); // hitung pengunjung online
        $data['pengunjunghariini'] = $pengunjunghariini;
        $data['totalpengunjung'] = $totalpengunjung;
        $data['pengunjungonline'] = $pengunjungonline;
        //Endcounter

        $perpage = 2;
        $offset = $this->uri->segment(1);
        $data['title']   = "Pustaka Ikan";
        $menu = $this->m_utama->get_menu();
        $data['menu'] = $this->fetch_menu($menu);
        
        $data['data'] = $this->m_utama->get_all_ikan($perpage, $offset);
        $config['base_url'] = site_url();
        $config['total_rows'] = $this->m_utama->getAll()->num_rows();
        $config['per_page'] = $perpage;
        $config['next_link'] = 'Selanjutnya';
        $config['prev_link'] = 'Sebelumnya';
        $config['first_link'] = 'Awal';
        $config['last_link'] = 'Akhir';
        $config['full_tag_open'] = '<ul class="pagination justify-content-center my-4">';
        $config['full_tag_close'] = '</ul>';
        $config['num_tag_open'] = '<li class="page-item page-link">';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item page-link active" aria-current="page">';
        $config['cur_tag_close'] = '</li>';
        $config['prev_tag_open'] = '<li class="page-item page-link">';
        $config['prev_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li class="page-item page-link">';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li class="page-item page-link">';
        $config['last_tag_close'] = '</li>';
        $config['first_tag_open'] = '<li class="page-item page-link">';
        $config['first_tag_close'] = '</li>';
        $this->pagination->initialize($config);

        $data['top'] = $this->m_utama->get_top_ikan();

        
        $this->load->view('depan/tampilan/header', $data);
        $this->load->view('depan/halaman/utama', $data);
        $this->load->view('depan/tampilan/kanan', $data);
        $this->load->view('depan/tampilan/footer');
    }
    public function search()
    {
        $keyword = $this->input->post('keyword');
        $ikan = $this->m_utama->search($keyword);

        $hasil = $this->load->view('depan/halaman/utama', array('ikan' => $ikan), true);
        $callback = array(
            'hasil' => $hasil, // Set array hasil dengan isi dari view.php yang diload tadi
        );
        echo json_encode($callback); // konversi varibael $callback menjadi JSON
    }
    function kategori()
    {
        $ip    = $this->input->ip_address(); // Mendapatkan IP user
        $date  = date("Y-m-d"); // Mendapatkan tanggal sekarang
        $waktu = time(); //
        $timeinsert = date("Y-m-d H:i:s");
        $s = $this->db->query("SELECT * FROM visitor WHERE ip='" . $ip . "' AND date='" . $date . "'")->num_rows();
        $ss = isset($s) ? ($s) : 0;
        if (
            $ss == 0
        ) {
            $this->db->query("INSERT INTO visitor(ip, date, hits, online, time) VALUES('" . $ip . "','" . $date . "','1','" . $waktu . "','" . $timeinsert . "')");
        } else {
            $this->db->query("UPDATE visitor SET hits=hits+1, online='" . $waktu . "' WHERE ip='" . $ip . "' AND date='" . $date . "'");
        }

        $pengunjunghariini  = $this->db->query("SELECT * FROM visitor WHERE date='" . $date . "' GROUP BY ip")->num_rows(); // Hitung jumlah pengunjung

        $dbpengunjung = $this->db->query("SELECT COUNT(hits) as hits FROM visitor")->row();

        $totalpengunjung = isset($dbpengunjung->hits) ? ($dbpengunjung->hits) : 0;
        $bataswaktu = time() - 300;
        $pengunjungonline  = $this->db->query("SELECT * FROM visitor WHERE online > '" . $bataswaktu . "'")->num_rows(); // hitung pengunjung online
        $data['pengunjunghariini'] = $pengunjunghariini;
        $data['totalpengunjung'] = $totalpengunjung;
        $data['pengunjungonline'] = $pengunjungonline;
        //EndCounter
        $data['title']   = "Kategori";
        $id = $this->uri->segment(3);
        $menu = $this->m_utama->get_menu();
        $data['detail'] = $this->m_kategori->per_kategori($id);

        $data['menu'] = $this->fetch_menu($menu);
        $this->load->view('depan/tampilan/header', $data);
        $this->load->view('depan/halaman/kategori', $data);
        $this->load->view('depan/tampilan/kanan', $data);
        $this->load->view('depan/tampilan/footer');
    }

    function tentangkami()
    {
        $ip    = $this->input->ip_address(); // Mendapatkan IP user
        $date  = date("Y-m-d"); // Mendapatkan tanggal sekarang
        $waktu = time(); //
        $timeinsert = date("Y-m-d H:i:s");
        $s = $this->db->query("SELECT * FROM visitor WHERE ip='" . $ip . "' AND date='" . $date . "'")->num_rows();
        $ss = isset($s) ? ($s) : 0;
        if (
            $ss == 0
        ) {
            $this->db->query("INSERT INTO visitor(ip, date, hits, online, time) VALUES('" . $ip . "','" . $date . "','1','" . $waktu . "','" . $timeinsert . "')");
        } else {
            $this->db->query("UPDATE visitor SET hits=hits+1, online='" . $waktu . "' WHERE ip='" . $ip . "' AND date='" . $date . "'");
        }

        $pengunjunghariini  = $this->db->query("SELECT * FROM visitor WHERE date='" . $date . "' GROUP BY ip")->num_rows(); // Hitung jumlah pengunjung

        $dbpengunjung = $this->db->query("SELECT COUNT(hits) as hits FROM visitor")->row();

        $totalpengunjung = isset($dbpengunjung->hits) ? ($dbpengunjung->hits) : 0;
        $bataswaktu = time() - 300;
        $pengunjungonline  = $this->db->query("SELECT * FROM visitor WHERE online > '" . $bataswaktu . "'")->num_rows(); // hitung pengunjung online
        $data['pengunjunghariini'] = $pengunjunghariini;
        $data['totalpengunjung'] = $totalpengunjung;
        $data['pengunjungonline'] = $pengunjungonline;

        $data['title']   = "Tentang Kami";
        $menu = $this->m_utama->get_menu();
        $data['menu'] = $this->fetch_menu($menu);
        $this->load->view('depan/tampilan/header', $data);
        $this->load->view('depan/halaman/tentangkami', $data);
        $this->load->view('depan/tampilan/kanan', $data);
        $this->load->view('depan/tampilan/footer');
    }

    function detail()
    {
        $ip    = $this->input->ip_address(); // Mendapatkan IP user
        $date  = date("Y-m-d"); // Mendapatkan tanggal sekarang
        $waktu = time(); //
        $timeinsert = date("Y-m-d H:i:s");
        $s = $this->db->query("SELECT * FROM visitor WHERE ip='" . $ip . "' AND date='" . $date . "'")->num_rows();
        $ss = isset($s) ? ($s) : 0;
        if (
            $ss == 0
        ) {
            $this->db->query("INSERT INTO visitor(ip, date, hits, online, time) VALUES('" . $ip . "','" . $date . "','1','" . $waktu . "','" . $timeinsert . "')");
        } else {
            $this->db->query("UPDATE visitor SET hits=hits+1, online='" . $waktu . "' WHERE ip='" . $ip . "' AND date='" . $date . "'");
        }

        $pengunjunghariini  = $this->db->query("SELECT * FROM visitor WHERE date='" . $date . "' GROUP BY ip")->num_rows(); // Hitung jumlah pengunjung

        $dbpengunjung = $this->db->query("SELECT COUNT(hits) as hits FROM visitor")->row();

        $totalpengunjung = isset($dbpengunjung->hits) ? ($dbpengunjung->hits) : 0;
        $bataswaktu = time() - 300;
        $pengunjungonline  = $this->db->query("SELECT * FROM visitor WHERE online > '" . $bataswaktu . "'")->num_rows(); // hitung pengunjung online
        $data['pengunjunghariini'] = $pengunjunghariini;
        $data['totalpengunjung'] = $totalpengunjung;
        $data['pengunjungonline'] = $pengunjungonline;
        //EndCounter
        $data['title']   = "Selengkapnya";
        $id = $this->uri->segment(3);
        $menu = $this->m_utama->get_menu();
        $data['detail'] = $this->m_utama->per_id($id);
        $data['menu'] = $this->fetch_menu($menu);

        $maps = $this->m_utama->sebaran($id);
        $hasil = array();
        foreach ($maps as $row) {
            $hasil[] = array($row->deskripsi_sebaran, $row->latitude, $row->longitude);
        }

        $this->data = array(
                'daftar'    => $data,
                'lokasi'    => $hasil,
            );

        //$data=$this->stat();
        $this->load->view('depan/tampilan/header', $data);
        $this->load->view('depan/halaman/detail', $data);
        $this->load->view('depan/tampilan/kanan', $data);
        $this->load->view('depan/tampilan/footer', $this->data);
    }

    public function fetch_menu($data)
    {
        $menu1 = "";
        foreach ($data as $menu) {
            $menu1 .= "
                <ul class='list-unstyled mb-0'>
                    <li><a href=" . site_url('Utama/kategori/' .encrypt_url($menu->kd_kategori)) . ">" . $menu->nm_kategori . "</a></li>
                </ul>
            ";
        }
        return $menu1;
    }

    function login()
    {
        $this->load->view('login');
    }
}
