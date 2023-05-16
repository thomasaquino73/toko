<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barang extends MY_Controller
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
		$this->template->load('v_template', 'v_daftarbarang', $data);
	}
	function table()
	{
		$output['data'] = array();
		$data = $this->Model_barang->getBarang()->result();
		$no = 1;

		foreach ($data as $dt) {
			$generator = new Picqer\Barcode\BarcodeGeneratorHTML();
			// $gen = $generator = new Picqer\Barcode\BarcodeGeneratorHTML();
			// echo $generator->getBarcode($dt->barcode, $generator::TYPE_CODE_128);
			$output['data'][] = array(
				$no++,
				// '<span style="">' . $dt->barcode . '<a href="' . base_url('barang/barcode/' . $dt->barcode) . '" class="btn btn-sm btn-default" ><small>generate</small><i class="fa fa-barcode"></i></a>' . '</span>',
				'<span style="">' . $generator->getBarcode($dt->barcode, $generator::TYPE_CODE_128) . '</span>',
				'<span style="text-transform:uppercase;">' . $dt->barcode . ' - ' . $dt->namaBarang . '</span>',
				'<span style="text-transform:uppercase;">' . $dt->namaKategori . '</span>',
				'<span style="text-transform:uppercase;">' . $dt->namaSatuan . '</span>',
				'<span style="text-transform:uppercase;"> Rp. ' . number_format($dt->hargaJual, 0, ".", ",")  . '</span>',
				'	<a class="dropdown-item" href="' . base_url('barang/daftar-barang/edit/') . $dt->idBarang . '"><i class="fa fa-pencil m-r-5"></i> Edit</a>
				<a class="dropdown-item" href="#" onclick="hapus_barang(' . $dt->idBarang . ')"><i class=" fa fa-trash-o m-r-5"></i> Delete</a>
				',
				// <div class="text-right dropdown dropdown-action">
				// <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
				// <div class="dropdown-menu dropdown-menu-right">
				// 	<a class="dropdown-item" href="' . base_url('barang/daftar-barang/edit/') . $dt->idBarang . '"><i class="fa fa-pencil m-r-5"></i> Edit</a>
				// 	<a class="dropdown-item" href="#" onclick="hapus_barang(' . $dt->idBarang . ')"><i class=" fa fa-trash-o m-r-5"></i> Delete</a>
				// </div></div>
			);
		}
		echo json_encode($output);
	}
	function hapus_id()
	{
		$this->db->query("DELETE FROM barang WHERE idBarang='$_GET[idBarang]'");
	}
	public function tambah_barang()
	{
		$data = array(
			'konfigurasi' => $this->Model_pengaturan->konfigurasi(),
			'satuan' => $this->Model_barang->getSatuan(),
			'kategori' => $this->Model_barang->getKategori(),
		);
		$this->template->load('v_template', 'barang/v_tambahbarang', $data);
	}
	function save()
	{
		$this->form_validation->set_rules(
			'barcode',
			'Barcode',
			'required|is_unique[barang.barcode]',
			[
				'required' => '%s Harus Diisi',
				'is_unique' => '%s Sudah Terdaftar',
			]
		);
		$this->form_validation->set_rules(
			'namabarang',
			'Nama Barang',
			'required|is_unique[barang.namaBarang]',
			[
				'required' => '%s Harus Diisi',
				'is_unique' => '%s Sudah Terdaftar',
			]
		);
		$this->form_validation->set_rules(
			'hargajual',
			'Harga Jual',
			'required',
			[
				'required' => '%s Harus Diisi',
			]
		);
		$this->form_validation->set_rules(
			'satuan',
			'Satuan',
			'required',
			[
				'required' => '%s Harus Diisi',
			]
		);
		if ($this->form_validation->run()) {
			$this->Model_barang->insbarang();
			$this->session->set_flashdata('sukses', 'Data Berhasil Disimpan');
			redirect('barang/barang');
		} else {
			$this->tambah_barang();
		}
	}
	public function edit_barang($id)
	{
		$this->form_validation->set_rules(
			'barcode',
			'Barcode',
			'required|trim|callback_barang_check',
			[
				'required' => '%s Harus Diisi',
			]
		);
		$this->form_validation->set_rules(
			'namabarang',
			'Nama Barang',
			'required',
			[
				'required' => '%s Harus Diisi',
			]
		);
		$this->form_validation->set_rules(
			'hargajual',
			'Harga Jual',
			'required',
			[
				'required' => '%s Harus Diisi',
			]
		);
		$this->form_validation->set_rules(
			'satuan',
			'Satuan',
			'required',
			[
				'required' => '%s Harus Diisi',
			]
		);

		if ($this->form_validation->run()) {
			$this->Model_barang->updatebarang();
			$this->session->set_flashdata('sukses', 'Data Berhasil Diubah');
			redirect('barang/daftar-barang');
		} else {
			$header = $this->Model_barang->editbarang($id);
			if ($header->num_rows() > 0) {
				$data = array(
					'header' => $header->row(),
					'konfigurasi' => $this->Model_pengaturan->konfigurasi(),
					'satuan' => $this->Model_barang->getSatuan(),
					'kategori' => $this->Model_barang->getKategori(),

				);
				$this->template->load('v_template', 'v_editbarang', $data);
			} else {
				echo "<script>alert('data tidak ditemukan');";
				echo "window.location='" . site_url('kendaraan') . "';</script>";
			}
		}
	}

	function barang_check()
	{
		$post = $this->input->post(null, true);
		$query = $this->db->query("select * from barang where barcode='$post[barcode]' and idBarang != '$post[barang_id]'");
		if ($query->num_rows() > 0) {
			$this->form_validation->set_message(
				'barang_check',
				'%s Sudah Dipakai, Silahkan Ganti',
			);
			return FALSE;
		} else {
			return TRUE;
		}
	}
}
