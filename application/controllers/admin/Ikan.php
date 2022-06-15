<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ikan extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('kategori_model');
        $this->load->model('ikan_model');
        $this->load->model('ordo_model');
        $this->load->model('genus_model');
        $this->load->model('family_model');
        $this->load->model('species_model');
        $this->load->model('sebaran_model');

        $this->load->library('file_upload');
    }

    public function index()
    {
        $data = $this->ikan_model->get_all();

        $this->render_page('Kelola Ikan', 
            $this->render_view('admin/ikan/index', [
                'data' => $data,
            ]),
            '',
            $this->render_view('admin/ikan/script')
        );
    }

    public function store()
    {
        $errors = [];

        if ($this->session->has_userdata('error'))
        {
            $errors = $this->session->userdata('error');
        }

        if ($this->input->method() == 'post')
        {
            $this->form_validation->set_rules('nama_ikan', 'Nama Ikan', 'required');
            $this->form_validation->set_rules('nama_ilmiah', 'Nama Ilmiah', 'required');
            $this->form_validation->set_rules('deskripsi', 'Deskripsi');
            $this->form_validation->set_rules('kategori', 'Kategori', 'required');
            $this->form_validation->set_rules('ordo', 'Ordo', 'required');
            $this->form_validation->set_rules('genus', 'Genus', 'required');
            $this->form_validation->set_rules('famili', 'Family', 'required');
            $this->form_validation->set_rules('spesies', 'Spesies', 'required');

            if ($this->form_validation->run())
            {
                $data = $this->input->post();

                $photo = $this->file_upload->storeAs('photo', './profil/uploads', 'jpg|png|jpeg|gif');

                if (isset($photo['error']))
                {
                    $errors['photo'] = $photo['error'];
                }
                else
                {
                    $photo = '/profil/uploads/' . $photo['data']['file_name'];
                    $kd_kategori = $this->kategori_model->first_id_or_create(['nm_kategori' => $data['kategori']]);
                    $id_ordo = $this->ordo_model->first_id_or_create(['ordo' => $data['ordo']]);
                    $id_genus = $this->genus_model->first_id_or_create(['genus' => $data['genus']]);
                    $id_famili = $this->family_model->first_id_or_create(['famili' => $data['famili']]);
                    $id_spesies = $this->species_model->first_id_or_create(['spesies' => $data['spesies']]);

                    $kd_ikan = $this->ikan_model->store([
                        'photo' => $photo,
                        'nama_ikan' => $data['nama_ikan'],
                        'nama_ilmiah' => $data['nama_ilmiah'],
                        'deskripsi' => $data['deskripsi'],
                        'id_ordo' => $id_ordo,
                        'id_genus' => $id_genus,
                        'id_famili' => $id_famili,
                        'id_spesies' => $id_spesies,
                        'kd_kategori' => $kd_kategori,
                    ]);

                    if (isset($data['penyebaran']) && !empty($data['penyebaran']) && is_array($data['penyebaran']))
                    {
                        foreach ($data['penyebaran'] as $penyebaran)
                        {
                            if (empty($penyebaran['latitude']) && empty($penyebaran['longitude']) && empty($penyebaran['deskripsi_sebaran']))
                            {
                                continue;
                            }

                            $this->sebaran_model->store([
                                'latitude' => $penyebaran['latitude'],
                                'longitude' => $penyebaran['longitude'],
                                'deskripsi_sebaran' => $penyebaran['deskripsi_sebaran'],
                                'kd_ikan' => $kd_ikan,
                            ]);
                        }
                    }

                    $this->session->set_flashdata('status', 'Berhasil tambah ikan');

                    redirect('admin/ikan');
                }
            }

            $this->session->set_flashdata('error', $this->form_validation->error_array() + $errors);

            redirect('admin/ikan/store');
        }

        $errors = array_merge($errors, $this->form_validation->error_array());

        $this->render_page('Tambah Ikan',
            $this->render_view('admin/ikan/create', [
                'ordos' => $this->ordo_model->get_all(),
                'genusses' => $this->genus_model->get_all(),
                'families' => $this->family_model->get_all(),
                'speciesses' => $this->species_model->get_all(),
                'kategoris' => $this->kategori_model->get_all(),
                'errors' => $errors,
            ]),
            '',
            $this->render_view('admin/ikan/create_script')
        );
    }

    public function update($kd_ikan)
    {
        $errors = [];


        if ($this->session->has_userdata('error'))
        {
            $errors = $this->session->userdata('error');
        }

        if ($ikan = $this->ikan_model->first_by_id($kd_ikan))
        {
            $ikan->sebarans = (array) $this->sebaran_model->get_all_by_ikan($ikan->kd_ikan);
            // dd((array) $ikan);
            if ($this->input->method() == 'post')
            {
                $this->form_validation->set_rules('nama_ikan', 'Nama Ikan', 'required');
                $this->form_validation->set_rules('nama_ilmiah', 'Nama Ilmiah', 'required');
                $this->form_validation->set_rules('deskripsi', 'Deskripsi');
                $this->form_validation->set_rules('kategori', 'Kategori', 'required');
                $this->form_validation->set_rules('ordo', 'Ordo', 'required');
                $this->form_validation->set_rules('genus', 'Genus', 'required');
                $this->form_validation->set_rules('famili', 'Family', 'required');
                $this->form_validation->set_rules('spesies', 'Spesies', 'required');

                if ($this->form_validation->run())
                {
                    $data = $this->input->post();

                    $optional_attribute = [];

                    if (isset($_FILES['photo']) && $_FILES['photo']['error'] != 4)
                    {
                        $photo = $this->file_upload->storeAs('photo', './profil/uploads', 'jpg|png|jpeg|gif');

                        if (isset($photo['error']))
                        {
                            $errors['photo'] = $photo['error'];
                        }
                        else
                        {
                            $optional_attribute['photo'] = '/profil/uploads/' . $photo['data']['file_name'];
                        }
                    }

                    $kd_kategori = $this->kategori_model->first_id_or_create(['nm_kategori' => $data['kategori']]);
                    $id_ordo = $this->ordo_model->first_id_or_create(['ordo' => $data['ordo']]);
                    $id_genus = $this->genus_model->first_id_or_create(['genus' => $data['genus']]);
                    $id_famili = $this->family_model->first_id_or_create(['famili' => $data['famili']]);
                    $id_spesies = $this->species_model->first_id_or_create(['spesies' => $data['spesies']]);

                    $kd_ikan = $this->ikan_model->update([
                        'kd_ikan' => $ikan->kd_ikan,
                    ], [
                        'nama_ikan' => $data['nama_ikan'],
                        'nama_ilmiah' => $data['nama_ilmiah'],
                        'deskripsi' => $data['deskripsi'],
                        'id_ordo' => $id_ordo,
                        'id_genus' => $id_genus,
                        'id_famili' => $id_famili,
                        'id_spesies' => $id_spesies,
                        'kd_kategori' => $kd_kategori,
                    ] + $optional_attribute);

                    if (isset($data['penyebaran']) && !empty($data['penyebaran']) && is_array($data['penyebaran']))
                    {
                        foreach ($data['penyebaran'] as $penyebaran)
                        {
                            if (empty($penyebaran['latitude']) && empty($penyebaran['longitude']) && empty($penyebaran['deskripsi_sebaran']))
                            {
                                continue;
                            }

                            $this->sebaran_model->sync([
                                'kd_ikan' => $kd_ikan,
                            ],[
                                'latitude' => $penyebaran['latitude'],
                                'longitude' => $penyebaran['longitude'],
                                'deskripsi_sebaran' => $penyebaran['deskripsi_sebaran'],
                            ]);
                        }
                    }

                    $this->session->set_flashdata('status', 'Berhasil edit ikan');

                    redirect('admin/ikan');
                }

                $this->session->set_flashdata('error', $this->form_validation->error_array() + $errors);

                redirect('admin/ikan/update/' . $kd_ikan);
            }

            $errors = array_merge($errors, $this->form_validation->error_array());

            return $this->render_page('Tambah Ikan',
                $this->render_view('admin/ikan/edit', [
                    'ordos' => $this->ordo_model->get_all(),
                    'genusses' => $this->genus_model->get_all(),
                    'families' => $this->family_model->get_all(),
                    'speciesses' => $this->species_model->get_all(),
                    'kategoris' => $this->kategori_model->get_all(),
                    'data' => (array) $ikan,
                    'errors' => $errors,
                ]),
                '',
                $this->render_view('admin/ikan/edit_script')
            );
        }

        $this->session->set_flashdata('status', 'Kode ikan tidak ditemukan');

        redirect('admin/ikan');
    }

    public function destroy($kd_ikan)
    {
        if ($ikan = $this->ikan_model->first_by_id($kd_ikan))
        {
            $this->sebaran_model->delete(compact('kd_ikan'));
            $this->ikan_model->delete(compact('kd_ikan'));

            $this->session->set_flashdata('status', 'Berhasil hapus ikan');
        }
        else
        {
            $this->session->set_flashdata('status', 'Gagal hapus ikan');
        }

        redirect('admin/ikan');
    }
}