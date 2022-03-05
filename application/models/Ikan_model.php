<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ikan_model extends CI_Model
{
	public function get_all()
	{
		$this->db
		->select('*')
        ->from('tb_ikan')
        ->join('tb_famili', 'tb_ikan.id_famili=tb_famili.id_famili')
        ->join('tb_genus', 'tb_ikan.id_genus=tb_genus.id_genus')
        ->join('tb_ordo', 'tb_ikan.id_ordo=tb_ordo.id_ordo')
        ->join('tb_kategori', 'tb_ikan.kd_kategori=tb_kategori.kd_kategori')
        ->join('tb_spesies', 'tb_ikan.id_spesies=tb_spesies.id_spesies')
        ->order_by('kd_ikan', 'ASC');

        return $this->db->get()->result();
	}

	public function get_all_by_limit($limit, $offset = 0)
	{
		$this->db
		->select('*')
		->from('tb_ikan')
		->join('tb_kategori', 'tb_kategori.kd_kategori = tb_ikan.kd_ikan')
		->order_by('kd_ikan','ASC')
		->limit($limit, $offset);

		return $this->db->get()->result();
	}

	public function get_all_by_kategori($kd_kategori)
	{
		$this->db
		->select('*')
		->from('tb_ikan')
		->join('tb_kategori', 'tb_kategori.kd_kategori = tb_ikan.kd_ikan')
		->where('tb_ikan.kd_kategori', $kd_kategori);

		return $this->db->get()->result();
	}

	public function get_latest_ikan()
	{
		$this->db
		->select('*')
		->from('tb_ikan')
		->join('tb_kategori', 'tb_kategori.kd_kategori = tb_ikan.kd_ikan')
		->order_by('tgl_post','DESC')
        ->limit('1','1');

        return $this->db->get()->result();
	}

	public function first_by_id($kd_ikan)
	{
		$this->db
		->select("*")
		->from('tb_ikan')
		->join('tb_kategori', 'tb_kategori.kd_kategori = tb_ikan.kd_ikan')
		->join('tb_famili','tb_ikan.id_famili=tb_famili.id_famili')
		->join('tb_genus', 'tb_ikan.id_genus=tb_genus.id_genus')
		->join('tb_ordo','tb_ikan.id_ordo=tb_ordo.id_ordo')
		->join('tb_spesies','tb_ikan.id_spesies=tb_spesies.id_spesies')
		->where('kd_ikan', $kd_ikan);
        
        return $this->db->get()->row();
	}

	public function search($keyword)
	{
		$this->db
		->select('*')
		->from('tb_ikan')
		->join('tb_kategori', 'tb_kategori.kd_kategori = tb_ikan.kd_ikan')
		->like('nama_ikan', $keyword)
        ->or_like('nama_ilmiah', $keyword)
        ->or_like('deskripsi', $keyword);

        return $this->db->get()->result();
	}

	public function count()
	{
		$this->db
		->select('count(*) as total')
		->from('tb_ikan');

		$result = $this->db->get()->row();

		return $result->total;
	}
}