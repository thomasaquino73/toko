<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Satuan extends MY_Controller
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
		$this->template->load('v_template', 'v_daftarsatuan', $data);
	}
	function table()
	{
		$output['data'] = array();
		$data = $this->Model_barang->getSatuan();
		$no = 1;
		foreach ($data as $dt) {
			$output['data'][] = array(
				$no++,
				'<span style="text-transform:uppercase;">' . $dt->namaSatuan . '</span>',
				'
				<a class="dropdown-item" href="' . base_url('barang/satuan/edit/') . $dt->idSatuan . '"><i class="fa fa-pencil m-r-5"></i> Edit</a>
					<a class="dropdown-item" href="#" onclick="hapus_satuan(' . $dt->idSatuan . ')"><i class=" fa fa-trash-o m-r-5"></i> Delete</a>
					',
				// 	<div class="text-right dropdown dropdown-action">
				// <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
				// <div class="dropdown-menu dropdown-menu-right">
				// 	<a class="dropdown-item" href="' . base_url('barang/satuan/edit/') . $dt->idSatuan . '"><i class="fa fa-pencil m-r-5"></i> Edit</a>
				// 	<a class="dropdown-item" href="#" onclick="hapus_satuan(' . $dt->idSatuan . ')"><i class=" fa fa-trash-o m-r-5"></i> Delete</a>
				// </div></div>
			);
		}
		echo json_encode($output);
	}
	function hapus_id()
	{
		$this->db->query("DELETE FROM satuan WHERE idSatuan='$_GET[idSatuan]'");
	}
	public function tambah_satuan()
	{
		$data = array(
			'konfigurasi' => $this->Model_pengaturan->konfigurasi(),
		);
		$this->template->load('v_template', 'satuan/v_tambahsatuan', $data);
	}
	function save()
	{
		$this->form_validation->set_rules(
			'namasatuan',
			'Satuan Barang',
			'required|is_unique[satuan.namaSatuan]',
			[
				'required' => '%s Harus Diisi',
				'is_unique' => '%s Sudah Terdaftar',
			]
		);
		if ($this->form_validation->run()) {
			$this->Model_barang->inssatuan();
			$this->session->set_flashdata('sukses', 'Data Berhasil Disimpan');
			redirect('barang/satuan');
		} else {
			$this->tambah_satuan();
		}
	}
	public function edit_satuan($id)
	{
		$this->form_validation->set_rules(
			'namasatuan',
			'Satuan Barang',
			'required|trim|callback_satuan_check',
			[
				'required' => '%s Harus Diisi',
			]
		);

		if ($this->form_validation->run()) {
			$this->Model_barang->updatesatuan();
			$this->session->set_flashdata('sukses', 'Data Berhasil Diubah');
			redirect('barang/satuan');
		} else {
			$header = $this->Model_barang->editsatuan($id);
			if ($header->num_rows() > 0) {
				$data = array(
					'header' => $header->row(),
					'konfigurasi' => $this->Model_pengaturan->konfigurasi(),
				);
				$this->template->load('v_template', 'satuan/v_editsatuan', $data);
			} else {
				echo "<script>alert('data tidak ditemukan');";
				echo "window.location='" . site_url('kendaraan') . "';</script>";
			}
		}
	}

	function satuan_check()
	{
		$post = $this->input->post(null, true);
		$query = $this->db->query("select * from satuan where namaSatuan='$post[namasatuan]' and idSatuan != '$post[satuan_id]'");
		if ($query->num_rows() > 0) {
			$this->form_validation->set_message(
				'satuan_check',
				'%s Sudah Dipakai, Silahkan Ganti',
			);
			return FALSE;
		} else {
			return TRUE;
		}
	}
}
