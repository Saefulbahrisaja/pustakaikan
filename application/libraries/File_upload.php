<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class File_upload
{
	public function __construct()
	{
		$this->ci =& get_instance();
	}

	public function storeAs($file, $dir, $type = '', $options = [])
	{
		$config['upload_path'] = $dir;
        $config['allowed_types'] = $type;
        $config['file_ext_tolower'] = true;
        $config['encrypt_name'] = true;
        // $config['max_size']             = 100;
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $config = array_merge($config, $options);

        $this->ci->load->library('upload', $config);

        if (!$this->ci->upload->do_upload($file))
        {
            return ['error' => $this->ci->upload->display_errors()];
        }
        else
        {
            return ['data' => $this->ci->upload->data()];
        }
	}
}