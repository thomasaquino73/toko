<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Konsumen extends MY_Controller
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
		);
		$this->template->load('v_template', 'konsumen/v_daftarkonsumen', $data);
	}
	function table()
	{
		$output['data'] = array();
		$data = $this->Model_konsumen->getKonsumen();
		$no = 1;
		foreach ($data as $dt) {
			$output['data'][] = array(
				$no++,
				'<span style="text-transform:uppercase;">' . $dt->namaKonsumen . '</span>',
				'<span style="text-transform:uppercase;">' . $dt->kontak . '</span>',
				$dt->alamatKonsumen  . ', ' . $dt->kelurahanKonsumen . ', ' .  $dt->kecamatanKonsumen . ', ' .  $dt->kotaKonsumen . ', ' .  $dt->provinsiKonsumen . ', ' . '(' . $dt->kodePos . ')',
				'+62' . $dt->notelKonsumen,
				$dt->kategori,
				'
				<a class="dropdown-item" href="' . base_url('master-data/konsumen/edit/') . $dt->idKonsumen . '"><i class="fa fa-pencil m-r-5"></i> Edit</a>
					<a class="dropdown-item" href="#" onclick="hapus_konsumen(' . $dt->idKonsumen . ')"><i class=" fa fa-trash-o m-r-5"></i> Delete</a>
					',
				// 		<div class="text-right dropdown dropdown-action">
				// 	<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
				// 	<div class="dropdown-menu dropdown-menu-right">
				// 		<a class="dropdown-item" href="' . base_url('master-data/konsumen/edit/') . $dt->idKonsumen . '"><i class="fa fa-pencil m-r-5"></i> Edit</a>
				// 		<a class="dropdown-item" href="#" onclick="hapus_konsumen(' . $dt->idKonsumen . ')"><i class=" fa fa-trash-o m-r-5"></i> Delete</a>
				// 	</div>
				// </div>
			);
		}
		echo json_encode($output);
	}
	public function tambah_konsumen()
	{
		$data = array(
			'provinsi' => $this->Model_lokasi->getProvinsi(),
			'kota' => $this->Model_lokasi->getKota(),
			'kecamatan' => $this->Model_lokasi->getKecamatan(),
			'kelurahan' => $this->Model_lokasi->getKelurahan(),
			'konfigurasi' => $this->Model_pengaturan->konfigurasi(),

		);
		$this->template->load('v_template', 'konsumen/v_tambahkonsumen', $data);
	}
	public function edit_konsumen($id)
	{
		$this->form_validation->set_rules(
			'namakonsumen',
			'Nama Toko / Konsumen',
			'required|callback_nmkonsumen_check',
			[
				'required' => '%s Harus Diisi',
			]
		);

		$this->form_validation->set_rules(
			'namakontak',
			'Nama Kontak',
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
			'kategori',
			'Kategori Konsumen',
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

		if ($this->form_validation->run()) {
			$this->Model_konsumen->updatekonsumen();
			$this->session->set_flashdata('sukses', 'Data Berhasil Diubah');
			redirect('master-data/konsumen');
		} else {
			$header = $this->Model_konsumen->editkonsumen($id);
			if ($header->num_rows() > 0) {
				$data = array(
					'header' => $header->row(),
					'provinsi' => $this->Model_lokasi->getProvinsi(),
					'kota' => $this->Model_lokasi->getKota(),
					'kecamatan' => $this->Model_lokasi->getKecamatan(),
					'kelurahan' => $this->Model_lokasi->getKelurahan(),
					'konfigurasi' => $this->Model_pengaturan->konfigurasi(),

				);
				$this->template->load('v_template', 'v_editkonsumen', $data);
			} else {
				echo "<script>alert('data tidak ditemukan');";
				echo "window.location='" . site_url('konsumen') . "';</script>";
			}
		}
	}
	function save()
	{
		$this->form_validation->set_rules(
			'namakonsumen',
			'Nama Toko / Konsumen',
			'required|is_unique[konsumen.namaKonsumen]',
			[
				'required' => '%s Harus Diisi',
				'is_unique' => '%s Sudah Terdaftar',
			]
		);

		$this->form_validation->set_rules(
			'namakontak',
			'Nama Kontak',
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
			'kategori',
			'Kategori Konsumen',
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

		if ($this->form_validation->run()) {

			$this->Model_konsumen->inskonsumen();
			$this->session->set_flashdata('sukses', 'Data Berhasil Disimpan');
			redirect('master-data/konsumen');
		} else {
			$this->tambah_konsumen();
		}
	}
	// 
	function nmkonsumen_check()
	{
		$post = $this->input->post(null, true);
		$query = $this->db->query("select * from konsumen where namaKonsumen='$post[namakonsumen]' and idKonsumen != '$post[konsumen_id]'");
		if ($query->num_rows() > 0) {
			$this->form_validation->set_message(
				'nmkonsumen_check',
				'%s Sudah Dipakai, Silahkan Ganti',
			);
			return FALSE;
		} else {
			return TRUE;
		}
	}
	function hapus_id()
	{
		$this->db->query("DELETE FROM konsumen WHERE idKonsumen='$_GET[idKonsumen]'");
		// $this->db->query("DELETE FROM grup_departemen WHERE idKonsumen='$_GET[idKonsumen]'");
	}
}
