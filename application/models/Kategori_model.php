<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori_model extends CI_Model
{
	public function get_all()
	{
		return $this->db->get('tb_kategori')->result();
	}

	public function first_by_kd($kd_kategori)
	{
		$this->db
		->select("*")
        ->from('tb_ikan')
        ->where('tb_kategori.kd_kategori', $kd_kategori);

        return $this->db->get()->row();
	}

	public function first_id_or_create($data, $value = [])
	{
		if ($data = $this->db->get_where('tb_kategori', $data)->row())
		{
			return $data->kd_kategori;
		}

		$this->db->insert('tb_kategori', $data + $value);

		return $this->db->insert_id();
	}
}