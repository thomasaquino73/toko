<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sales extends MY_Controller
{

	public function index()
	{
		$data = [
			'sales' => $this->Model_sales->getSales(),
			'konfigurasi' => $this->Model_pengaturan->konfigurasi(),

		];
		$this->template->load('v_template', 'sales/v_daftarsales', $data);
	}
	public function tambah_sales()
	{
		$this->form_validation->set_rules(
			'namasales',
			'Nama Sales',
			'required|is_unique[sales.idKaryawan]',
			[
				'required' => '%s Harus Diisi',
				'is_unique' => '%s Sudah Terdaftar',
			]
		);

		$this->form_validation->set_rules(
			'keterangan',
			'Keterangan',
			'required',
			[
				'required' => '%s Harus Diisi',
			]
		);

		if ($this->form_validation->run()) {

			$this->Model_sales->inskaryawan();
			$this->session->set_flashdata('sukses', 'Data Berhasil Disimpan');
			redirect('sales');
		} else {
			$data = [
				'sales' => $this->Model_sales->getKaryawan(),
				'konfigurasi' => $this->Model_pengaturan->konfigurasi(),

			];
			$this->template->load('v_template', 'sales/v_tambahsales', $data);
		}
	}
	function ubah_sales($id)
	{
		$this->form_validation->set_rules(
			'keterangan',
			'Jabatan',
			'required',
			[
				'required' => '%s Harus Diisi',
			]
		);

		if ($this->form_validation->run()) {

			$this->Model_sales->updatesales();
			$this->session->set_flashdata('sukses', 'Data Berhasil Diubah');
			redirect('master-data/sales');
		} else {
			$header = $this->Model_sales->editsales($id);
			$data = array(
				'header' => $header->row(),
				'konfigurasi' => $this->Model_pengaturan->konfigurasi(),
			);
			$this->template->load('v_template', 'sales/v_ubahsales', $data);
		}
	}
	function hapus_id()
	{
		$this->db->query("DELETE FROM sales WHERE idSales='$_GET[idSales]'");
		// $this->db->query("DELETE FROM grup_departemen WHERE idKendaraan='$_GET[idKendaraan]'");
	}
}
