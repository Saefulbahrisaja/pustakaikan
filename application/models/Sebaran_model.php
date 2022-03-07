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
}