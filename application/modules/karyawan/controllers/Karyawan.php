<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Karyawan extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->simple_login->cek_login();
	}

	public function index()
	{

		$data = array(
			'karyawan' => $this->Model_karyawan->getKaryawan(),
			'konfigurasi' => $this->Model_pengaturan->konfigurasi(),

		);
		$this->template->load('v_template', 'v_daftarkaryawan', $data);
	}
	function table()
	{
		$output['data'] = array();
		$data = $this->Model_karyawan->getKaryawan();
		$no = 1;
		foreach ($data as $dt) {
			$output['data'][] = array(
				$no++,
				'<span style="text-transform:uppercase;">' . $dt->namaLengkap . '</span>',
				$dt->namaPanggilan,
				$dt->jenisKelamin,
				$dt->alamatLengkap  . ', ' . $dt->kelurahan . ', ' .  $dt->kecamatan . ', ' .  $dt->kota . ', ' .  $dt->provinsi . ', ' . '(' . $dt->kodePos . ')',
				'+62 ' . $dt->noTel,
				'<a class="dropdown-item" href="' . base_url('master-data/karyawan/profile/') . $dt->idKaryawan . '"><i class="fa fa-eye m-r-5"></i> Lihat</a>
				<a class="dropdown-item" href="' . base_url('master-data/karyawan/edit/') . $dt->idKaryawan . '"><i class="fa fa-pencil m-r-5"></i> Edit</a>
					<a class="dropdown-item" href="#" onclick="hapus_karyawan(' . $dt->idKaryawan . ')"><i class=" fa fa-trash-o m-r-5"></i> Delete</a>
					',
				// <div class="text-left dropdown dropdown-action">
				// <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
				// <div class="dropdown-menu dropdown-menu-right">
				// 	<a class="dropdown-item" href="' . base_url('master-data/karyawan/profile/') . $dt->idKaryawan . '"><i class="fa fa-eye m-r-5"></i> Lihat</a>
				// 	<a class="dropdown-item" href="' . base_url('master-data/karyawan/edit/') . $dt->idKaryawan . '"><i class="fa fa-pencil m-r-5"></i> Edit</a>
				// 	<a class="dropdown-item" href="#" onclick="hapus_karyawan(' . $dt->idKaryawan . ')"><i class=" fa fa-trash-o m-r-5"></i> Delete</a>
				// </div></div>
			);
		}
		echo json_encode($output);
	}
	public function tambah_karyawan()
	{
		$data = array(
			'provinsi' => $this->Model_lokasi->getProvinsi(),
			'kota' => $this->Model_lokasi->getKota(),
			'kecamatan' => $this->Model_lokasi->getKecamatan(),
			'kelurahan' => $this->Model_lokasi->getKelurahan(),
			'konfigurasi' => $this->Model_pengaturan->konfigurasi(),
		);
		$this->template->load('v_template', 'v_tambahkaryawan', $data);
	}
	public function edit_karyawan($id)
	{
		$header = $this->Model_karyawan->getHeader($id);
		$data = array(
			'header' => $header,
			'provinsi' => $this->Model_lokasi->getProvinsi(),
			'kota' => $this->Model_lokasi->getKota(),
			'kecamatan' => $this->Model_lokasi->getKecamatan(),
			'kelurahan' => $this->Model_lokasi->getKelurahan(),
			'konfigurasi' => $this->Model_pengaturan->konfigurasi(),

		);

		$this->template->load('v_template', 'v_editkaryawan', $data);
	}
	public function profile_id($id)
	{
		$header = $this->Model_karyawan->getdetail($id);
		$data = array(
			'header' => $header,
			'konfigurasi' => $this->Model_pengaturan->konfigurasi(),

		);

		$this->template->load('v_template', 'v_profile', $data);
	}
	function save()
	{
		$this->form_validation->set_rules(
			'namalengkap',
			'Nama Lengkap',
			'required',
			[
				'required' => '%s Harus Diisi',
			]
		);

		$this->form_validation->set_rules(
			'namapanggilan',
			'Nama Panggilan',
			'required',
			[
				'required' => '%s Harus Diisi',
			]
		);
		$this->form_validation->set_rules(
			'notel',
			'Nomor Telepon',
			'required',
			[
				'required' => '%s Harus Diisi',
			]
		);
		$this->form_validation->set_rules(
			'provinsi',
			'Provinsi',
			'required',
			[
				'required' => '%s Harus Diisi',
			]
		);
		$this->form_validation->set_rules(
			'kota',
			'Kabupaten / Kota',
			'required',
			[
				'required' => '%s Harus Diisi',
			]
		);
		$this->form_validation->set_rules(
			'kecamatan',
			'Kecamatan',
			'required',
			[
				'required' => '%s Harus Diisi',
			]
		);
		$this->form_validation->set_rules(
			'kelurahan',
			'Kelurahan',
			'required',
			[
				'required' => '%s Harus Diisi',
			]
		);
		$this->form_validation->set_rules(
			'alamatlengkap',
			'Alamat Lengkap',
			'required',
			[
				'required' => '%s Harus Diisi',
			]
		);

		$this->form_validation->set_rules(
			'tempatlahir',
			'Tempat Lahir',
			'required',
			[
				'required' => '%s Harus Diisi',
			]
		);
		$this->form_validation->set_rules(
			'tanggallahir',
			'Tanggal Lahir',
			'required',
			[
				'required' => '%s Harus Diisi',
			]
		);


		if ($this->form_validation->run()) {

			$this->Model_karyawan->inskaryawan();
			$this->session->set_flashdata('sukses', 'Data Berhasil Disimpan');
			redirect('master-data/karyawan');
		} else {
			$this->tambah_karyawan();
		}
	}
	function update()
	{
		$this->form_validation->set_rules(
			'namalengkap',
			'Nama Lengkap',
			'required',
			[
				'required' => '%s Harus Diisi',
			]
		);

		$this->form_validation->set_rules(
			'namapanggilan',
			'Nama Panggilan',
			'required',
			[
				'required' => '%s Harus Diisi',
			]
		);
		$this->form_validation->set_rules(
			'notel',
			'Nomor Telepon',
			'required',
			[
				'required' => '%s Harus Diisi',
			]
		);
		$this->form_validation->set_rules(
			'provinsi',
			'Provinsi',
			'required',
			[
				'required' => '%s Harus Diisi',
			]
		);
		$this->form_validation->set_rules(
			'kota',
			'Kabupaten / Kota',
			'required',
			[
				'required' => '%s Harus Diisi',
			]
		);
		$this->form_validation->set_rules(
			'kecamatan',
			'Kecamatan',
			'required',
			[
				'required' => '%s Harus Diisi',
			]
		);
		$this->form_validation->set_rules(
			'kelurahan',
			'Kelurahan',
			'required',
			[
				'required' => '%s Harus Diisi',
			]
		);
		$this->form_validation->set_rules(
			'alamatlengkap',
			'Alamat Lengkap',
			'required',
			[
				'required' => '%s Harus Diisi',
			]
		);

		$this->form_validation->set_rules(
			'tempatlahir',
			'Tempat Lahir',
			'required',
			[
				'required' => '%s Harus Diisi',
			]
		);
		$this->form_validation->set_rules(
			'tanggallahir',
			'Tanggal Lahir',
			'required',
			[
				'required' => '%s Harus Diisi',
			]
		);


		if ($this->form_validation->run()) {

			$this->Model_karyawan->updatekaryawan();
			$this->session->set_flashdata('sukses', 'Data Berhasil Diubah');
			redirect('master-data/karyawan');
		} else {
			$this->tambah_karyawan();
		}
	}
	function hapus_id()
	{
		$this->db->query("DELETE FROM karyawan WHERE idKaryawan='$_GET[idKaryawan]'");
		$this->db->query("DELETE FROM users WHERE idKaryawan='$_GET[idKaryawan]'");
	}
}
