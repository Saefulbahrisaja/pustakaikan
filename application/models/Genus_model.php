<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Genus_model extends CI_Model
{
	public function get_all()
	{
		return $this->db->get('tb_genus')->result();
	}

	public function first_id_or_create($data, $value = [])
	{
		if ($data = $this->db->get_where('tb_genus', $data)->row())
		{
			return $data->id_genus;
		}

		$this->db->insert('tb_genus', $data + $value);

		return $this->db->insert_id();
	}
}
