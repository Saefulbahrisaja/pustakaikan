<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Species_model extends CI_Model
{
	public function get_all()
	{
		return $this->db->get('tb_spesies')->result();
	}

	public function first_id_or_create($data, $value = [])
	{
		if ($data = $this->db->get_where('tb_spesies', $data)->row())
		{
			return $data->id_spesies;
		}

		$this->db->insert('tb_spesies', $data + $value);

		return $this->db->insert_id();
	}
}
