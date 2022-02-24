<?php
class M_kategori extends CI_Model
{
    //cek user
    public function get_menu(){
        $this->db->select('*');
        $this->db->from('tb_kategori');
        //$this->db->where('kd_kategori');
        $categories = $this->db->get()->result();
        return $categories;
    }

    function per_kategori($id)
    {
        $id_user = decrypt_url($id);
        $this->db->select("*")
            ->from('tb_ikan')
            ->join('tb_famili', 'tb_ikan.id_famili=tb_famili.id_famili')
            ->join('tb_genus', 'tb_ikan.id_genus=tb_genus.id_genus')
            ->join('tb_ordo', 'tb_ikan.id_ordo=tb_ordo.id_ordo')
            ->join('tb_spesies', 'tb_ikan.id_spesies=tb_spesies.id_spesies')
            ->join('tb_kategori', 'tb_ikan.kd_kategori=tb_kategori.kd_kategori')
            
            ->where('tb_kategori.kd_kategori', $id_user);
        $query = $this->db->get();
        return $query->result();
    }

    
}
?>