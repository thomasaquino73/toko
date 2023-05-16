<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengaturan extends MY_Controller
{

	public function index()
	{
		$data = array(
			'konfigurasi' => $this->Model_pengaturan->konfigurasi(),

		);
		$this->template->load('v_template', 'v_blankpage', $data);
	}
	public function perusahaan()
	{
		$data = array(
			'konfigurasi' => $this->Model_pengaturan->konfigurasi(),

		);
		$this->template->load('v_template', 'v_blankpage', $data);
	}
}
