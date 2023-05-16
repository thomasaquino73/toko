<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Perusahaan extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->simple_login->cek_login();
	}
	public function index()
	{
		$data = array(
			'konfigurasi' => $this->Model_pengaturan->konfigurasi(),
			'header' => $this->Model_pengaturan->konfigurasi(),
			'provinsi' => $this->Model_lokasi->getProvinsi(),
			'kota' => $this->Model_lokasi->getKota(),
			'kecamatan' => $this->Model_lokasi->getKecamatan(),
			'kelurahan' => $this->Model_lokasi->getKelurahan(),
		);
		$this->template->load('v_template', 'v_perusahaan', $data);
	}
	public function upload()
	{
		$this->form_validation->set_rules(
			'namaperusahaan',
			'Nama Perusahaan',
			'required',
			[
				'required' => '%s Harus Diisi',
			]
		);

		if ($this->form_validation->run() == false) {
			$this->index();
		} else {
			$config['upload_path'] 		= './assets/logo/';
			$config['allowed_types'] 	= 'jpg|jpeg|png|svg';
			$config['max_size'] 		= 3000;
			$config['overwrite']		= 	true;

			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			if ($this->upload->do_upload('fileupload')) {

				$fileData = $this->upload->data();
				$post 		= $this->input->post();
				$data = array(
					'namaPerusahaan'    => $post['namaperusahaan'],
					'noTel'             => $post['notel'],
					'email'             => $post['email'],
					'idProvinsi'        => $post['provinsi'],
					'idKota'            => $post['kota'],
					'idKecamatan'       => $post['kecamatan'],
					'idKelurahan'       => $post['kelurahan'],
					'kodePos'           => $post['kodepos'],
					'alamatLengkap'     => $post['alamatlengkap'],
					'website'           => $post['website'],
					'logo'              => $fileData['file_name'],
					'updated_by'          => $this->session->userdata('idUsers'),
					'updated_at'          => date('Y-m-d,h:i:s'),
				);

				if ($this->Model_pengaturan->update($data)) {
					$this->session->set_flashdata('sukses', '<p>Selamat! Anda berhasil mengunggah file <strong>' . $fileData['file_name'] . '</strong></p>');
				} else {
					$this->session->set_flashdata('error', '<p>Gagal! File ' . $fileData['file_name'] . ' tidak berhasil tersimpan di database anda</p>');
				}

				redirect(base_url('pengaturan/perusahaan'));
			} else {
				$this->session->set_flashdata('error', $this->upload->display_errors());
				redirect(base_url('pengaturan/perusahaan'));
			}
		}
	}
}
