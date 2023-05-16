<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kendaraan extends MY_Controller
{

	public function index()
	{
		$data = array(
			'konfigurasi' => $this->Model_pengaturan->konfigurasi(),

		);
		$this->template->load('v_template', 'kendaraan/v_daftarkendaraan', $data);
	}
	function table()
	{
		$output['data'] = array();
		$data = $this->Model_kendaraan->getKendaraan();
		$no = 1;
		foreach ($data as $dt) {
			$output['data'][] = array(
				$no++,
				'<span style="text-transform:uppercase;">' . $dt->kodeKendaraan . '</span>',
				'<span style="text-transform:uppercase;">' . $dt->merkKendaraan . '</span>',
				'<span style="text-transform:uppercase;">' . $dt->noRangka . '</span>',
				'<span style="text-transform:uppercase;">' . $dt->noMesin . '</span>',
				'<span style="text-transform:uppercase;">' . $dt->tipeKendaraan . '</span>',
				'<span style="text-transform:uppercase;">' . $dt->jenisKendaraan . '</span>',
				'<span style="text-transform:uppercase;">' . $dt->modelKendaraan . '</span>',
				'<span style="text-transform:uppercase;">' . $dt->tahunPembuatan . '</span>',
				'<span style="text-transform:uppercase;">' . $dt->isiSilinder . '</span>',
				'<span style="text-transform:uppercase;">' . $dt->warna . '</span>',
				'<div class="text-right dropdown dropdown-action">
				<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
				<div class="dropdown-menu dropdown-menu-right">
					<a class="dropdown-item" href="' . base_url('kendaraan/edit-kendaraan/') . $dt->idKendaraan . '"><i class="fa fa-pencil m-r-5"></i> Edit</a>
					<a class="dropdown-item" href="#" onclick="hapus_kendaraan(' . $dt->idKendaraan . ')"><i class=" fa fa-trash-o m-r-5"></i> Delete</a>
				</div>
			</div>',
			);
		}
		echo json_encode($output);
	}
	public function tambah_kendaraan()
	{
		$data = array(

			'konfigurasi' => $this->Model_pengaturan->konfigurasi(),

		);
		$this->template->load('v_template', 'kendaraan/v_tambahkendaraan', $data);
	}
	public function edit_kendaraan($id)
	{
		$this->form_validation->set_rules(
			'kodekendaraan',
			'Kode / Plat Kendaraan',
			'required|trim|callback_plat_check',
			[
				'required' => '%s Harus Diisi',
			]
		);

		$this->form_validation->set_rules(
			'merkkendaraan',
			'Merk Kendaraan',
			'required',
			[
				'required' => '%s Harus Diisi',
			]
		);

		if ($this->form_validation->run()) {
			$this->Model_kendaraan->updatekendaraan();
			$this->session->set_flashdata('sukses', 'Data Berhasil Diubah');
			redirect('kendaraan');
		} else {
			$header = $this->Model_kendaraan->editkendaraan($id);
			if ($header->num_rows() > 0) {
				$data = array(
					'header' => $header->row(),
					'konfigurasi' => $this->Model_pengaturan->konfigurasi(),
				);
				$this->template->load('v_template', 'kendaraan/v_editkendaraan', $data);
			} else {
				echo "<script>alert('data tidak ditemukan');";
				echo "window.location='" . site_url('kendaraan') . "';</script>";
			}
		}
	}
	function save()
	{
		$this->form_validation->set_rules(
			'kodekendaraan',
			'Kode / Plat Kendaraan',
			'required|trim|is_unique[kendaraan.kodekendaraan]',
			[
				'required' => '%s Harus Diisi',
				'is_unique' => '%s Sudah Terdaftar',
			]
		);

		$this->form_validation->set_rules(
			'merkkendaraan',
			'Merk Kendaraan',
			'required',
			[
				'required' => '%s Harus Diisi',
			]
		);


		if ($this->form_validation->run()) {

			$this->Model_kendaraan->inskendaraan();
			$this->session->set_flashdata('sukses', 'Data Berhasil Disimpan');
			redirect('kendaraan');
		} else {
			$this->tambah_kendaraan();
		}
	}
	// 
	function plat_check()
	{
		$post = $this->input->post(null, true);
		$query = $this->db->query("select * from kendaraan where kodeKendaraan='$post[kodekendaraan]' and idKendaraan != '$post[kendaraan_id]'");
		if ($query->num_rows() > 0) {
			$this->form_validation->set_message(
				'plat_check',
				'%s Sudah Dipakai, Silahkan Ganti',
			);
			return FALSE;
		} else {
			return TRUE;
		}
	}
	function hapus_id()
	{
		$this->db->query("DELETE FROM kendaraan WHERE idKendaraan='$_GET[idKendaraan]'");
		// $this->db->query("DELETE FROM grup_departemen WHERE idKendaraan='$_GET[idKendaraan]'");
	}
}
