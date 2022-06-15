<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sebaran_model extends CI_Model
{
	public function get_all_by_ikan($kd_ikan)
	{
		$this->db
		->select("*")
        ->from('tb_sebaran')
        ->where('tb_sebaran.kd_ikan', $kd_ikan);
        
        return $this->db->get()->result();
	}

	public function store($data)
	{
		$this->db->insert('tb_sebaran', $data);

		return $this->db->insert_id();
	}

	public function delete($where)
	{
		return $this->db->from('tb_sebaran')->where($where)->delete();
	}

	public function sync($where, $data)
	{
		$this->db->where($where)->delete('tb_sebaran');
		return $this->db->insert('tb_sebaran', $where + $data);
	}
}