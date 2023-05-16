<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends my_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index1()
	{

		$data = array(
			'konfigurasi' => $this->Model_pengaturan->konfigurasi(),
		);
		// check_already_login();

		$this->load->view('v_login', $data);
	}
	public function index()
	{
		check_already_login();

		$this->form_validation->set_rules(
			'username',
			'Username',
			'required',
			[
				'required' => '%s Harus Diisi',
			]
		);
		$this->form_validation->set_rules(
			'password',
			'Password',
			'required',
			[
				'required' => '%s Harus Diisi',
			]
		);
		if ($this->form_validation->run()) {

			$post = $this->input->post();
			$username = $post['username'];
			$password = $post['password'];
			$where = array(
				'users.username' => $username
			);

			$check = $this->Model_users->cek_login($where)->num_rows();
			$cekpass = $this->Model_users->cek_login($where)->result();
			if ($check > 0) {
				foreach ($cekpass as $row) {
					$namalengkap = $row->namaLengkap;
					$idUsers = $row->idUsers;
					$idKaryawan = $row->idKaryawan;
					$hasil_dekripsi = $this->encryption->decrypt($row->password);
					if ($hasil_dekripsi == $password) {


						if ($row->statusAktif == 'Aktif') {
							$this->session->set_userdata(
								array(
									'namalengkap' => $namalengkap,
									'username' => $username,
									'idUsers' => $idUsers,
									'idKaryawan' => $idKaryawan,
								)
							);
							$data = array(
								'statusLogin'     => 'on',
							);
							$id =  $this->session->userdata('idUsers');
							$where = array('idUsers' => $id);
							$this->db->where($where);
							$this->db->update('users', $data);
							redirect(base_url('dashboard'), 'refresh');
						} else {
							$this->session->set_flashdata('warning', ' Status Anda Tidak Aktif, Silahkan Tanya Ke Admin Anda');
							$data = array(
								'konfigurasi' => $this->Model_pengaturan->konfigurasi(),
							);
							$this->load->view('v_login', $data);
							// redirect(base_url('login'), 'refresh');
						}
					} else {
						$this->session->set_flashdata('error', ' Username / Password salah');
						$data = array(
							'konfigurasi' => $this->Model_pengaturan->konfigurasi(),
						);
						$this->load->view('v_login', $data);
						// redirect(base_url('login'), 'refresh');
					}
				}
			} else {
				$this->session->set_flashdata('error', ' Username atau password tidak terdaftar....');
				$data = array(
					'konfigurasi' => $this->Model_pengaturan->konfigurasi(),
				);
				$this->load->view('v_login', $data);
			}
			//$this->form_validation->run()==false
		} else {
			// echo 'salah';
			$data = array(
				'konfigurasi' => $this->Model_pengaturan->konfigurasi(),
			);
			$this->load->view('v_login', $data);
		}
	}
	function logout()
	{
		$data = array(
			'statusLogin'     => 'off',
		);
		$id =  $this->session->userdata('idUsers');
		$where = array('idUsers' => $id);
		$this->db->where($where);
		$this->db->update('users', $data);
		$this->session->set_flashdata('sukses', 'anda berhasil logout');
		$this->simple_login->logout();
	}
}
