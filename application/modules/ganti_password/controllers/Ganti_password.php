<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ganti_password extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->simple_login->cek_login();
	}
	function sukses()
	{
		$data = array(
			'konfigurasi' => $this->Model_pengaturan->konfigurasi(),
		);
		$this->template->load('v_template', 'v_sukses', $data);
	}
	function index()
	{
		$this->form_validation->set_rules(
			'username',
			'Username',
			'required',
			[
				'required' => '%s Harus Diisi',
			]
		);
		$this->form_validation->set_rules(
			'old_pass',
			'Password Lama',
			'required',
			[
				'required' => '%s Harus Diisi',
			]
		);
		$this->form_validation->set_rules(
			'new_pass',
			'Password Baru',
			'required|min_length[5]',
			[
				'min_length' => 'password kurang dari 5 karakter',
				'required' => '%s Harus Diisi',
			]
		);
		$this->form_validation->set_rules(
			'new_pass1',
			'Konfirmasi Password',
			'required|trim|matches[new_pass]',
			[
				'required' => '%s Harus Diisi',
				'matches' => 'password tidak cocok',
			]
		);
		if ($this->form_validation->run() == false) {
			$data = array(
				'konfigurasi' => $this->Model_pengaturan->konfigurasi(),
			);
			$this->template->load('v_template', 'ganti_password/v_ganti_password', $data);
		} else {
			$post = $this->input->post();
			$idUsers = $this->session->userdata('idUsers');
			// $old_passw = $this->input->post('old_p');
			$password = $post['old_pass'];
			$where = array(
				'idUsers' => $idUsers
			);

			$check = $this->Model_pengaturan->cek_old('users', $where)->num_rows();
			$cekpass = $this->Model_pengaturan->cek_old("users", $where)->result();
			if ($check > 0) {
				foreach ($cekpass as $row) {
					$hasil_dekripsi = $this->encryption->decrypt($row->password);
					if ($hasil_dekripsi == $password) {
						$this->Model_pengaturan->save();
						$this->session->set_flashdata('sukses', ' Password sudah diubah !');
						redirect('pengaturan/ganti-password');
						$this->session->sess_destroy();
					} else {
						$this->session->set_flashdata('error', 'Password Lama Tidak Cocok!');
						$data = array(
							'konfigurasi' => $this->Model_pengaturan->konfigurasi(),
						);
						$this->template->load('v_template', 'ganti_password/v_ganti_password', $data);
					}
				}
			} else {

				$this->session->set_flashdata('error', 'Oopss...! ada yang salah');
				$data = array(
					'konfigurasi' => $this->Model_pengaturan->konfigurasi(),
				);
				$this->template->load('v_template', 'v_ganti_password', $data);
			}
		}
	}
}
