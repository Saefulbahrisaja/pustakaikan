<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ordo_model extends CI_Model
{
	public function get_all()
	{
		return $this->db->get('tb_ordo')->result();
	}

	public function first_id_or_create($data, $value = [])
	{
		if ($data = $this->db->get_where('tb_ordo', $data)->row())
		{
			return $data->id_ordo;
		}

		$this->db->insert('tb_ordo', $data + $value);

		return $this->db->insert_id();
	}
}
