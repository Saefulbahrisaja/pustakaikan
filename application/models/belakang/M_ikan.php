<?php
class M_ikan extends CI_Model
{
    
    public function getAll()
    {
        $this->db->select('*');
        $this->db->from('tb_ikan');
        $this->db->order_by('kd_ikan', 'ASC');

        return $this->db->get();
    }
    function get_all_ikan(){
        $this->db->select('*')
            ->from('tb_ikan')
            ->join('tb_famili', 'tb_ikan.id_famili=tb_famili.id_famili')
            ->join('tb_genus', 'tb_ikan.id_genus=tb_genus.id_genus')
            ->join('tb_ordo', 'tb_ikan.id_ordo=tb_ordo.id_ordo')
        ->join('tb_kategori', 'tb_ikan.kd_kategori=tb_kategori.kd_kategori')
            ->join('tb_spesies', 'tb_ikan.id_spesies=tb_spesies.id_spesies')
             ->order_by('kd_ikan','ASC');
        $hasil= $this->db->get();
        return $hasil->result();
    }

    function get_top_ikan()
    {
        $this->db->select('*')
                 ->from('tb_ikan')
                ->join('tb_kategori', 'tb_ikan.kd_kategori=tb_kategori.kd_kategori')
                 ->order_by('tgl_post','DESC')
                 ->limit('1','1');
        $hasil = $this->db->get();
        return $hasil->result();
    }

    function per_id($id)
    {
        $id_user = decrypt_url($id);
        $this->db->select("*")
                 ->from('tb_ikan')
                 ->join('tb_famili','tb_ikan.id_famili=tb_famili.id_famili')
                 ->join('tb_genus', 'tb_ikan.id_genus=tb_genus.id_genus')
                 ->join('tb_ordo','tb_ikan.id_ordo=tb_ordo.id_ordo')
                 ->join('tb_spesies','tb_ikan.id_spesies=tb_spesies.id_spesies')
                 ->where('kd_ikan', $id_user);
        $query=$this->db->get();
        return $query->result();
    }

    public function search($keyword)
    {
        $this->db->like('nama_ikan', $keyword);
        $this->db->or_like('nama_ilmiah', $keyword);
        $this->db->or_like('deskripsi', $keyword);

        $result = $this->db->get('tb_ikan')->result();

        return $result;
    }

    public function sebaran($id)
    {
        $id_user = decrypt_url($id);
        $this->db->select("*")
             ->from('tb_sebaran')
             ->join('tb_ikan', 'tb_ikan.kd_ikan=tb_sebaran.kd_ikan')
             ->where('tb_sebaran.kd_ikan', $id_user);
        $query = $this->db->get();
        return $query->result();
    }
}
?>