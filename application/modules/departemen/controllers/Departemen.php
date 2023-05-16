<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Departemen extends MY_Controller
{

	public function index()
	{
		$data = array(
			'karyawan' => $this->Model_karyawan->getgrupKaryawan(),
			'departemen' => $this->Model_karyawan->getDepartemen(),
		);
		$this->template->load('v_template', 'departemen/v_grupdepartemen', $data);
	}
	public function grup($id)
	{
		$data = array(
			'listgrup' => $this->Model_karyawan->getlistgrupDepartemen($id),
			'departemen' => $this->Model_karyawan->getDepartemen(),

		);

		$this->template->load('v_template', 'departemen/list_grupdepartemen', $data);
	}
	public function edit($id)
	{
		$list = $this->Model_karyawan->editlistgrupDepartemen($id);
		$data = array(
			'list' => $list,
			'departemen' => $this->Model_karyawan->getDepartemen(),
		);

		$this->template->load('v_template', 'departemen/edit_listgrupdepartemen', $data);
	}
	public function edit_grup($id)
	{
		$list = $this->Model_karyawan->cariDepartemen($id);
		$data = array(
			'list' => $list,
		);

		$this->template->load('v_template', 'departemen/edit_departemen', $data);
	}
	public function add()
	{
		$data = array(
			'karyawan' => $this->Model_karyawan->getgrupKaryawan(),
			'departemen' => $this->Model_karyawan->getDepartemen(),
		);
		$this->template->load('v_template', 'departemen/add_listgrupdepartemen', $data);
	}
	public function ubah()
	{
		$post = $this->input->post(null, true);
		$id = $post['id'];
		$data = array(
			'idDepartemen' => $post['departemen'],
		);
		$where = array('idKaryawan' => $id);
		$this->db->where($where);
		$this->db->update('grup_departemen', $data);
		$this->session->set_flashdata('sukses', 'Data Berhasil Diubah');
		redirect('master-data/departemen');
	}
	public function ubah_grup()
	{
		$post = $this->input->post(null, true);
		$id = $post['id'];
		$data = array(
			'departemen' => $post['departemen'],
		);
		$where = array('idDepartemen' => $id);
		$this->db->where($where);
		$this->db->update('departemen', $data);
		$this->session->set_flashdata('sukses', 'Data Berhasil Diubah');
		redirect('master-data/departemen');
	}
	public function simpan()
	{
		$post = $this->input->post(null, true);
		$data = array(
			'departemen'         => $post['departemen'],
		);
		$this->db->insert('departemen', $data);
		$this->session->set_flashdata('sukses', 'Data Berhasil Disimpan');
		redirect('master-data/departemen');
	}
	function hapus_id()
	{
		$this->db->query("DELETE FROM departemen WHERE idDepartemen='$_GET[idDepartemen]'");
	}
}
