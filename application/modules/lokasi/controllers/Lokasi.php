<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lokasi extends MY_Controller
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
			'provinsi' => $this->Model_lokasi->getProvinsi(),
			'kota' => $this->Model_lokasi->getKota(),
			'kecamatan' => $this->Model_lokasi->getKecamatan(),
			'kelurahan' => $this->Model_lokasi->getKelurahan(),
		);

		$this->template->load('v_template', 'lokasi/v_lokasi', $data);
	}
	function table_provinsi()
	{
		$output['data'] = array();
		$data = $this->Model_lokasi->getProvinsi();
		$no = 1;
		foreach ($data as $dt) {
			$output['data'][] = array(
				$no++,
				$dt->provinsi,
				'<div class="text-right dropdown dropdown-action">
				<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
				<div class="dropdown-menu dropdown-menu-right">
				<button class="btn btn-sm dropdown-item" data-bs-toggle="modal" data-bs-target="#modal_provinsi" onclick="tombol_provinsi(' . $dt->idProvinsi . ')""> <i class="fa fa-pencil" aria-hidden="true"></i> Edit</button>
					<a class="dropdown-item" onclick="hapus_provinsi(' . $dt->idProvinsi . ')"><i class=" fa fa-trash-o m-r-5"></i> Hapus</a>
				</div>
			</div>',
			);
		}
		echo json_encode($output);
	}
	function table_kota()
	{
		$output['data'] = array();
		$data = $this->Model_lokasi->getKota();
		$no = 1;
		foreach ($data as $dt) {
			$output['data'][] = array(
				$no++,
				$dt->kota,
				$dt->provinsi,
				'<div class="text-right dropdown dropdown-action">
				<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
				<div class="dropdown-menu dropdown-menu-right">
				<button class="btn btn-sm dropdown-item" data-bs-toggle="modal" data-bs-target="#modal_kota" onclick="tombol_kota(' . $dt->idKota . ')""> <i class="fa fa-pencil" aria-hidden="true"></i> Edit</button>
					<a class="dropdown-item"  onclick="hapus_kota(' . $dt->idKota . ')"><i class=" fa fa-trash-o m-r-5"></i> Delete</a>
				</div>
			</div>',
			);
		}
		echo json_encode($output);
	}
	function table_kecamatan()
	{
		$output['data'] = array();
		$data = $this->Model_lokasi->getKecamatan();
		$no = 1;
		foreach ($data as $dt) {
			$output['data'][] = array(
				$no++,
				$dt->kecamatan,
				$dt->kota,
				'<div class="text-right dropdown dropdown-action">
				<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
				<div class="dropdown-menu dropdown-menu-right">
				<button class="btn btn-sm dropdown-item" data-bs-toggle="modal" data-bs-target="#modal_kecamatan" onclick="tombol_kecamatan(' . $dt->idKecamatan . ')""> <i class="fa fa-pencil" aria-hidden="true"></i> Edit</button>
					<a class="dropdown-item" onclick="hapus_kecamatan(' . $dt->idKecamatan . ')"><i class=" fa fa-trash-o m-r-5"></i> Hapus</a>
				</div>
			</div>',
			);
		}
		echo json_encode($output);
	}
	function table_kelurahan()
	{
		$output['data'] = array();
		$data = $this->Model_lokasi->getKelurahan();
		$no = 1;
		foreach ($data as $dt) {
			$output['data'][] = array(
				$no++,
				$dt->kelurahan,
				$dt->kecamatan,
				'
				<div class="text-right dropdown dropdown-action">
				<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
				<div class="dropdown-menu dropdown-menu-right">
				<button class="btn btn-sm dropdown-item" data-bs-toggle="modal" data-bs-target="#modal_kelurahan" onclick="tombol_kelurahan(' . $dt->idKelurahan . ')""> <i class="fa fa-pencil" aria-hidden="true"></i> Edit</button>
				<a class="dropdown-item" onclick="hapus_kelurahan(' . $dt->idKelurahan . ')"><i class=" fa fa-trash-o m-r-5"></i> Hapus</a>
				</div>
			</div>
				',
			);
		}
		echo json_encode($output);
	}

	// simpan data
	public function simpankelurahan()
	{
		$this->form_validation->set_rules(
			'kecamatan',
			'Kecamatan',
			'required',
			[
				'required' => '%s Harus Diisi',
			]
		);
		if ($this->form_validation->run()) {
			$result = array(
				'success' => '<div class="alert alert-success alert-dismissible">
			
				</div>'
			);
			$c = $this->input->post('kelurahan');
			$kel = array();
			foreach ($c as $key => $val) {
				$kel[] = array(
					'idKecamatan'	=> $_POST['kecamatan'],
					'kelurahan' 	=>	$_POST['kelurahan'][$key],
				);
			}
			$this->db->insert_batch('kelurahan', $kel);
		} else {
			$result = array(
				'error' => true,
				'kecamatan_error' => form_error('kecamatan'),
			);
		}
		echo json_encode($result);
	}
	public function ubahkelurahan()
	{
		$this->form_validation->set_rules(
			'kecamatan',
			'Kecamatan',
			'required',
			[
				'required' => '%s Harus Diisi',
			]
		);
		$this->form_validation->set_rules(
			'kel',
			'Kelurahan',
			'required',
			[
				'required' => '%s Harus Diisi',
			]
		);
		if ($this->form_validation->run()) {
			$result = array(
				'success' => '<div class="alert alert-success alert-dismissible">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<h4><i class="icon fa fa-check"></i> Tambah Data !</h4>
			Data Berhasil Ditambah.
			</div>'
			);
			$this->Model_lokasi->updatekelurahan();
		} else {
			$result = array(
				'error' => true,
				'kecamatan_error' => form_error('kecamatan'),
				'kel_error' => form_error('kel'),
			);
		}
		echo json_encode($result);
	}

	// ambil id
	function ambilIdKelurahan()
	{
		$data = $this->Model_lokasi->ambilidkelurahan()->result();
		echo json_encode($data);
	}

	function hapus_kelurahan()
	{
		$this->db->query("DELETE FROM kelurahan WHERE idKelurahan='$_GET[idKelurahan]'");
	}

	// kecamatan
	public function simpankecamatan()
	{
		$this->form_validation->set_rules(
			'kota',
			'Kota',
			'required',
			[
				'required' => '%s Harus Diisi',
			]
		);
		if ($this->form_validation->run()) {
			$result = array(
				'success' => '<div class="alert alert-success alert-dismissible">
			
				</div>'
			);
			$kecamatan = $this->input->post('kecamatan');
			$kec = array();
			foreach ($kecamatan as $key => $val) {
				$kec[] = array(
					'idKota'	=> 	$_POST['kota'],
					'kecamatan' 	=>	$_POST['kecamatan'][$key],
				);
			}
			$this->db->insert_batch('kecamatan', $kec);
		} else {
			$result = array(
				'error' => true,
				'kota_error' => form_error('kota'),
			);
		}
		echo json_encode($result);
	}
	public function ubahkecamatan()
	{
		$this->form_validation->set_rules(
			'kota',
			'Kota',
			'required',
			[
				'required' => '%s Harus Diisi',
			]
		);
		$this->form_validation->set_rules(
			'kec',
			'Kecamatan',
			'required',
			[
				'required' => '%s Harus Diisi',
			]
		);
		if ($this->form_validation->run()) {
			$result = array(
				'success' => '<div class="alert alert-success alert-dismissible">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<h4><i class="icon fa fa-check"></i> Tambah Data !</h4>
			Data Berhasil Ditambah.
			</div>'
			);
			$this->Model_lokasi->updateKecamatan();
		} else {
			$result = array(
				'error' => true,
				'kota_error' => form_error('kota'),
				'kec_error' => form_error('kec'),
			);
		}
		echo json_encode($result);
	}
	function hapus_kecamatan()
	{
		$this->db->query("DELETE FROM kecamatan WHERE idKecamatan='$_GET[idKecamatan]'");
	}
	function ambilIdKecamatan()
	{
		$data = $this->Model_lokasi->ambilidkecamatan()->result();
		echo json_encode($data);
	}

	// kota
	public function simpankota()
	{
		$this->form_validation->set_rules(
			'provinsi',
			'Provinsi',
			'required',
			[
				'required' => '%s Harus Diisi',
			]
		);
		if ($this->form_validation->run()) {
			$result = array(
				'success' => '<div class="alert alert-success alert-dismissible">
			
				</div>'
			);
			$kota = $this->input->post('kota');
			$kec = array();
			foreach ($kota as $key => $val) {
				$kec[] = array(
					'idProvinsi'	=> 	$_POST['provinsi'],
					'kota' 	=>	$_POST['kota'][$key],
				);
			}
			$this->db->insert_batch('kota', $kec);
		} else {
			$result = array(
				'error' => true,
				'provinsi_error' => form_error('provinsi'),
				// 'kota[]_error' => form_error('kota[]'),
			);
		}
		echo json_encode($result);
	}
	public function ubahkota()
	{
		$this->form_validation->set_rules(
			'provinsi',
			'provinsi',
			'required',
			[
				'required' => '%s Harus Diisi',
			]
		);
		$this->form_validation->set_rules(
			'kot',
			'Kota',
			'required',
			[
				'required' => '%s Harus Diisi',
			]
		);
		if ($this->form_validation->run()) {
			$result = array(
				'success' => '<div class="alert alert-success alert-dismissible">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<h4><i class="icon fa fa-check"></i> Tambah Data !</h4>
			Data Berhasil Ditambah.
			</div>'
			);
			$this->Model_lokasi->updateKota();
		} else {
			$result = array(
				'error' => true,
				'provinsi_error' => form_error('provinsi'),
				'kot_error' => form_error('kot'),
			);
		}
		echo json_encode($result);
	}
	function ambilIdKota()
	{
		$data = $this->Model_lokasi->ambilidkota()->result();
		echo json_encode($data);
	}
	function hapus_kota()
	{
		$this->db->query("DELETE FROM kota WHERE idKota='$_GET[idKota]'");
	}


	// provinsi
	public function simpanprovinsi()
	{
		$this->form_validation->set_rules(
			'provinsi',
			'Provinsi',
			'required',
			[
				'required' => '%s Harus Diisi',
			]
		);
		if ($this->form_validation->run()) {
			$result = array(
				'success' => '<div class="alert alert-success alert-dismissible">
			
				</div>'
			);
			$this->Model_lokasi->simpanprovinsi();
		} else {
			$result = array(
				'error' => true,
				'provinsi_error' => form_error('provinsi'),
				// 'kota[]_error' => form_error('kota[]'),
			);
		}
		echo json_encode($result);
	}
	public function ubahprovinsi()
	{
		$this->form_validation->set_rules(
			'provinsi',
			'Provinsi',
			'required',
			[
				'required' => '%s Harus Diisi',
			]
		);

		if ($this->form_validation->run()) {
			$result = array(
				'success' => '<div class="alert alert-success alert-dismissible">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<h4><i class="icon fa fa-check"></i> Tambah Data !</h4>
			Data Berhasil Ditambah.
			</div>'
			);
			$this->Model_lokasi->updateprovinsi();
		} else {
			$result = array(
				'error' => true,
				'provinsi_error' => form_error('provinsi'),
			);
		}
		echo json_encode($result);
	}
	function ambilIdprovinsi()
	{
		$data = $this->Model_lokasi->ambilidprovinsi()->result();
		echo json_encode($data);
	}
	function hapus_provinsi()
	{
		$this->db->query("DELETE FROM provinsi WHERE idProvinsi='$_GET[idProvinsi]'");
	}
}
