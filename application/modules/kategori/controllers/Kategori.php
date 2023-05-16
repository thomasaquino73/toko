<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends MY_Controller
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
		$this->template->load('v_template', 'v_daftarkategori', $data);
	}
	function table()
	{
		$output['data'] = array();
		$data = $this->Model_barang->getKategori();
		$no = 1;
		foreach ($data as $dt) {
			$output['data'][] = array(
				$no++,
				'<span style="text-transform:uppercase;">' . $dt->namaKategori . '</span>',
				'<a class="dropdown-item" href="' . base_url('barang/kategori/edit/') . $dt->idKategori . '"><i class="fa fa-pencil m-r-5"></i> Edit</a>
				<a class="dropdown-item" href="#" onclick="hapus_kategori(' . $dt->idKategori . ')"><i class=" fa fa-trash-o m-r-5"></i> Delete</a>
				',
				// <div class="text-right dropdown dropdown-action">
				// <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
				// <div class="dropdown-menu dropdown-menu-right">
				// 	<a class="dropdown-item" href="' . base_url('barang/kategori/edit/') . $dt->idKategori . '"><i class="fa fa-pencil m-r-5"></i> Edit</a>
				// 	<a class="dropdown-item" href="#" onclick="hapus_kategori(' . $dt->idKategori . ')"><i class=" fa fa-trash-o m-r-5"></i> Delete</a>
				// </div></div>
			);
		}
		echo json_encode($output);
	}
	function hapus_id()
	{
		$this->db->query("DELETE FROM kategori WHERE idKategori='$_GET[idKategori]'");
	}
	public function tambah_kategori()
	{
		$data = array(
			'konfigurasi' => $this->Model_pengaturan->konfigurasi(),
		);
		$this->template->load('v_template', 'kategori/v_tambahkategori', $data);
	}
	function save()
	{
		$this->form_validation->set_rules(
			'namakategori',
			'Kategori Barang',
			'required|is_unique[kategori.namaKategori]',
			[
				'required' => '%s Harus Diisi',
				'is_unique' => '%s Sudah Terdaftar',
			]
		);
		if ($this->form_validation->run()) {
			$this->Model_barang->inskategori();
			$this->session->set_flashdata('sukses', 'Data Berhasil Disimpan');
			redirect('barang/kategori');
		} else {
			$this->tambah_kategori();
		}
	}
	public function edit_kategori($id)
	{
		$this->form_validation->set_rules(
			'namakategori',
			'Kategori Barang',
			'required|trim|callback_kategori_check',
			[
				'required' => '%s Harus Diisi',
			]
		);

		if ($this->form_validation->run()) {
			$this->Model_barang->updatekategori();
			$this->session->set_flashdata('sukses', 'Data Berhasil Diubah');
			redirect('barang/kategori');
		} else {
			$header = $this->Model_barang->editkategori($id);
			if ($header->num_rows() > 0) {
				$data = array(
					'header' => $header->row(),
					'konfigurasi' => $this->Model_pengaturan->konfigurasi(),
				);
				$this->template->load('v_template', 'kategori/v_editkategori', $data);
			} else {
				echo "<script>alert('data tidak ditemukan');";
				echo "window.location='" . site_url('kendaraan') . "';</script>";
			}
		}
	}

	function kategori_check()
	{
		$post = $this->input->post(null, true);
		$query = $this->db->query("select * from kategori where namaKategori='$post[namakategori]' and idKategori != '$post[kategori_id]'");
		if ($query->num_rows() > 0) {
			$this->form_validation->set_message(
				'kategori_check',
				'%s Sudah Dipakai, Silahkan Ganti',
			);
			return FALSE;
		} else {
			return TRUE;
		}
	}
}
