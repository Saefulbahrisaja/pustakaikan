<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{
	public function find_by($where)
	{
		return $this->db->get_where('tb_admin', $where)->row();
	}
}