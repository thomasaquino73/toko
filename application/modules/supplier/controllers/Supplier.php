<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Supplier extends MY_Controller
{

	public function index()
	{
		$data = array(
			'konfigurasi' => $this->Model_pengaturan->konfigurasi(),

		);
		$this->template->load('v_template', 'supplier/v_daftarsupplier', $data);
	}
	function table()
	{
		$output['data'] = array();
		$data = $this->Model_supplier->getSupplier();
		$no = 1;
		foreach ($data as $dt) {
			$output['data'][] = array(
				$no++,
				'<span style="text-transform:uppercase;">' . $dt->namaperusahaan . '</span>',
				'<span style="text-transform:uppercase;">' . $dt->kontak . '</span>',
				$dt->alamatLengkap  . ', ' . $dt->kelurahan . ', ' .  $dt->kecamatan . ', ' .  $dt->kota . ', ' .  $dt->provinsi . ', ' . '(' . $dt->kodePos . ')',
				'+62 ' . $dt->noTel,
				'
				<a class="dropdown-item" href="' . base_url('master-data/supplier/edit/') . $dt->idSupplier . '"><i class="fa fa-pencil m-r-5"></i> Edit</a>
					<a class="dropdown-item" href="#" onclick="hapus_supplier(' . $dt->idSupplier . ')"><i class=" fa fa-trash-o m-r-5"></i> Delete</a>
					',
				// 	<div class="text-right dropdown dropdown-action">
				// <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
				// <div class="dropdown-menu dropdown-menu-right">
				// 	<a class="dropdown-item" href="' . base_url('master-data/supplier/edit/') . $dt->idSupplier . '"><i class="fa fa-pencil m-r-5"></i> Edit</a>
				// 	<a class="dropdown-item" href="#" onclick="hapus_supplier(' . $dt->idSupplier . ')"><i class=" fa fa-trash-o m-r-5"></i> Delete</a>
				// </div></div>
			);
		}
		echo json_encode($output);
	}
	public function tambah_supplier()
	{
		$data = array(
			'provinsi' => $this->Model_lokasi->getProvinsi(),
			'kota' => $this->Model_lokasi->getKota(),
			'kecamatan' => $this->Model_lokasi->getKecamatan(),
			'kelurahan' => $this->Model_lokasi->getKelurahan(),
			'konfigurasi' => $this->Model_pengaturan->konfigurasi(),

		);
		$this->template->load('v_template', 'supplier/v_tambahsupplier', $data);
	}
	public function edit_supplier($id)
	{
		$this->form_validation->set_rules(
			'namaperusahaan',
			'Nama Perusahaan',
			'required|callback_nmperusahaan_check',
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
			$this->Model_supplier->updatesupplier();
			$this->session->set_flashdata('sukses', 'Data Berhasil Diubah');
			redirect('master-data/supplier');
		} else {
			$header = $this->Model_supplier->editsupplier($id);
			if ($header->num_rows() > 0) {
				$data = array(
					'header' => $header->row(),
					'provinsi' => $this->Model_lokasi->getProvinsi(),
					'kota' => $this->Model_lokasi->getKota(),
					'kecamatan' => $this->Model_lokasi->getKecamatan(),
					'kelurahan' => $this->Model_lokasi->getKelurahan(),
					'konfigurasi' => $this->Model_pengaturan->konfigurasi(),

				);
				$this->template->load('v_template', 'supplier/v_editsupplier', $data);
			} else {
				echo "<script>alert('data tidak ditemukan');";
				echo "window.location='" . site_url('supplier') . "';</script>";
			}
		}
	}
	function save()
	{
		$this->form_validation->set_rules(
			'namaperusahaan',
			'Nama Perusahaan',
			'required|is_unique[supplier.namaperusahaan]',
			[
				'required' => '%s Harus Diisi',
				'is_unique' => '%s Sudah Terdaftar',
			]
		);

		$this->form_validation->set_rules(
			'kontak',
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

			$this->Model_supplier->inssupplier();
			$this->session->set_flashdata('sukses', 'Data Berhasil Disimpan');
			redirect('master-data/supplier');
		} else {
			$this->tambah_supplier();
		}
	}
	// 
	function nmperusahaan_check()
	{
		$post = $this->input->post(null, true);
		$query = $this->db->query("select * from supplier where namaperusahaan='$post[namaperusahaan]' and idSupplier != '$post[supplier_id]'");
		if ($query->num_rows() > 0) {
			$this->form_validation->set_message(
				'nmperusahaan_check',
				'%s Sudah Dipakai, Silahkan Ganti',
			);
			return FALSE;
		} else {
			return TRUE;
		}
	}
	function hapus_id()
	{
		$this->db->query("DELETE FROM supplier WHERE idSupplier='$_GET[idSupplier]'");
		// $this->db->query("DELETE FROM grup_departemen WHERE idSupplier='$_GET[idSupplier]'");
	}
}
