<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengguna extends MY_Controller
{

	public function index()
	{
		$data = array(
			'konfigurasi' => $this->Model_pengaturan->konfigurasi(),
		);
		$this->template->load('v_template', 'v_daftarpengguna', $data);
	}
	function table()
	{
		$output['data'] = array();
		$data = $this->Model_users->getusers();
		$no = 1;
		foreach ($data as $dt) {
			if ($dt->statusAktif == 'Aktif') {
				$status = '<div class="dropdown action-label">
					<a class="custom-badge status-green dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false">
						Aktif
					</a>
					<div class="dropdown-menu dropdown-menu-right">
					<a class="dropdown-item" href="#" onclick="status_tidakaktif(' . $dt->idUsers . ')" >Tidak Aktif</a>
				</div>
				</div>';
			} elseif ($dt->statusAktif == 'Tidak Aktif') {
				$status = '<div class="dropdown action-label">
					<a class="custom-badge status-red dropdown-toggle " href="#" data-toggle="dropdown" aria-expanded="false">
						Tidak Aktif
					</a>
					<div class="dropdown-menu dropdown-menu-right">
					<a class="dropdown-item" href="#" onclick="status_aktif(' . $dt->idUsers . ')"> Aktif</a>
				</div>
				</div>';
			};
			if ($dt->role == 1) {
				$role = '<span class="">
				Administrator
				
				</span>';
			} else {
				$role = '<span class="">
					Operator
				</span>';
			};
			$output['data'][] = array(
				$no++,
				'<span style="text-transform:uppercase;">' . $dt->namaLengkap . '</span>',
				$dt->username,
				$status,
				$role,
				$dt->statusLogin,
				'
				<a class="dropdown-item" href="' . base_url('master-data/pengguna/edit/') . $dt->idUsers . '"><i class="fa fa-pencil m-r-5"></i> Edit</a>
					<a class="dropdown-item" href="#" onclick="hapus_pengguna(' . $dt->idUsers . ')"><i class=" fa fa-trash-o m-r-5"></i> Delete</a>
					',
				// <div class="dropdown dropdown-action text-right">
				// <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
				// <div class="dropdown-menu dropdown-menu-right">
				// 	<a class="dropdown-item" href="' . base_url('master-data/pengguna/edit/') . $dt->idUsers . '"><i class="fa fa-pencil m-r-5"></i> Edit</a>
				// 	<a class="dropdown-item" href="#" onclick="hapus_pengguna(' . $dt->idUsers . ')"><i class=" fa fa-trash-o m-r-5"></i> Delete</a>
				// </div></div>
			);
		}
		echo json_encode($output);
	}
	public function tambah_pengguna()
	{
		$this->form_validation->set_rules(
			'karyawan',
			'Karyawan',
			'required',
			[
				'required' => '%s Harus Diisi',
			]
		);

		$this->form_validation->set_rules(
			'username',
			'Username',
			'required|xss_clean|is_unique[users.username]',
			[
				'required' => '%s Harus Diisi',
				'is_unique' => '%s Sudah Terdaftar',
			]
		);
		$this->form_validation->set_rules(
			'password',
			'Password',
			'required|min_length[5]',
			[
				'required' => '%s Harus Diisi',
				'min_length' => 'password kurang dari 5 karakter'
			]
		);
		$this->form_validation->set_rules(
			'password1',
			'Konfirmasi Password',
			'required|trim|min_length[5]|matches[password]',
			[
				'required' => '%s Harus Diisi',
				'matches' => 'password tidak cocok',
				'min_length' => 'password kurang dari 5 karakter'
			]
		);

		if ($this->form_validation->run()) {
			$this->Model_users->inspengguna();
			$this->session->set_flashdata('sukses', 'Data Berhasil Disimpan');
			redirect('master-data/pengguna');
		} else {
			$karyawan = $this->Model_users->getKaryawan();
			if (empty($karyawan)) {
				echo "<script>alert('data karyawan tidak ada lagi');";
				echo "window.location='" . site_url('pengguna') . "';</script>";
			} else {
				$data = array(
					'karyawan' => $karyawan,
					'konfigurasi' => $this->Model_pengaturan->konfigurasi(),
				);
				$this->template->load('v_template', 'v_tambahpengguna', $data);
			}
		}
	}
	public function edit_pengguna($id)
	{
		$this->form_validation->set_rules(
			'username',
			'Username',
			'required|callback_username_check',
			[
				'required' => '%s Harus Diisi',
			]
		);
		if ($this->input->post('password')) {

			$this->form_validation->set_rules(
				'password',
				'Password',
				'min_length[5]',
				[
					'required' => '%s Harus Diisi',
					'min_length' => 'password kurang dari 5 karakter'
				]
			);
		}
		if ($this->input->post('password1')) {
			$this->form_validation->set_rules(
				'password1',
				'Konfirmasi Password',
				'trim|min_length[5]|matches[password]',
				[
					'required' => '%s Harus Diisi',
					'matches' => 'password tidak cocok',
					'min_length' => 'password kurang dari 5 karakter'
				]
			);
		}

		if ($this->form_validation->run()) {

			$this->Model_users->updateusers();
			$this->session->set_flashdata('sukses', 'Data Berhasil Diubah');
			redirect('master-data/pengguna');
		} else {
			$header = $this->Model_users->editusers($id);
			if ($header->num_rows() > 0) {
				$data = array(
					'header' => $header->row(),
					'konfigurasi' => $this->Model_pengaturan->konfigurasi(),

				);
				$this->template->load('v_template', 'pengguna/v_editpengguna', $data);
			} else {
				echo "<script>alert('data tidak ditemukan');";
				echo "window.location='" . site_url('pengguna') . "';</script>";
			}
		}
	}


	function username_check()
	{
		$post = $this->input->post(null, true);
		$query = $this->db->query("select * from users where username='$post[username]' and idUsers != '$post[user_id]'");
		if ($query->num_rows() > 0) {
			$this->form_validation->set_message(
				'username_check',
				'%s Sudah Dipakai, Silahkan Ganti',
			);
			return FALSE;
		} else {
			return TRUE;
		}
	}
	function hapus_id()
	{
		$this->db->query("DELETE FROM users WHERE idUsers='$_GET[idUsers]'");
		// $this->db->query("DELETE FROM grup_departemen WHERE idKaryawan='$_GET[idKaryawan]'");
	}
	function status_aktif()
	{
		$this->Model_users->update_status_aktif();
	}
	function status_tidakaktif()
	{
		$this->Model_users->update_status_tidakaktif();
	}
}
