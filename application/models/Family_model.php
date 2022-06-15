<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Family_model extends CI_Model
{
	public function get_all()
	{
		return $this->db->get('tb_famili')->result();
	}

	public function first_id_or_create($data, $value = [])
	{
		if ($data = $this->db->get_where('tb_famili', $data)->row())
		{
			return $data->id_famili;
		}

		$this->db->insert('tb_famili', $data + $value);

		return $this->db->insert_id();
	}
}
