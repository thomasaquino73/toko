<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends MY_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->simple_login->cek_login();
	}
	public function index()
	{
		check_not_login();
		$data = array(
			'sales' => $this->Model_dashboard->getSales(),
			'konfigurasi' => $this->Model_pengaturan->konfigurasi(),
			'supplier' => $this->Model_dashboard->countsupplier(),
			'konsumen' => $this->Model_dashboard->countkonsumen(),
			'status' => $this->Model_dashboard->countstatus(),
			'produk' => $this->Model_dashboard->countproduk(),
		);
		$this->template->load('v_template', 'v_dashboard', $data);
	}
}
