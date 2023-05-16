<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pembelian extends MY_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->simple_login->cek_login();
	}

	public function index()
	{
		// check_not_login();
		$data = array(
			'konfigurasi' => $this->Model_pengaturan->konfigurasi(),
		);
		$this->template->load('v_template', 'v_daftarpembelian', $data);
	}
	public function tampil_po()
	{
		$this->load->view('tampil_editpo');
	}
	function table()
	{
		$output['data'] = array();
		$data = $this->Model_transaksi->getPembelian();
		$no = 1;
		foreach ($data as $dt) {
			$output['data'][] = array(
				$no++,
				date('d-m-Y', strtotime($dt->date)),
				$dt->nopo_pembelian,
				$dt->namaperusahaan,
				$dt->pembayaran,
				'Rp.' . number_format($dt->total, 0, ".", ","),
				'	<a class="dropdown-item" href="' . base_url('pembelian/lihat/') . $dt->norand_pembelian . '"><i class="fa fa-eye m-r-5"></i> Lihat</a>
				<a class="dropdown-item" href="' . base_url('pembelian/edit/') . $dt->norand_pembelian . '"><i class="fa fa-pencil m-r-5"></i> Edit</a>
				<a class="dropdown-item" href="#" onclick="hapus_pembelian(' . $dt->norand_pembelian . ')"><i class=" fa fa-trash-o m-r-5"></i> Delete</a>
				',
				// <div class="text-right dropdown dropdown-action">
				// <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
				// <div class="dropdown-menu dropdown-menu-right">
				// 	<a class="dropdown-item" href="' . base_url('master-data/karyawan/profile/') . $dt->idKaryawan . '"><i class="fa fa-eye m-r-5"></i> Lihat</a>
				// 	<a class="dropdown-item" href="' . base_url('master-data/karyawan/edit/') . $dt->idKaryawan . '"><i class="fa fa-pencil m-r-5"></i> Edit</a>
				// 	<a class="dropdown-item" href="#" onclick="hapus_karyawan(' . $dt->idKaryawan . ')"><i class=" fa fa-trash-o m-r-5"></i> Delete</a>
				// </div></div>
			);
		}
		echo json_encode($output);
	}

	function simpan()
	{
		$qty = $this->input->post('jumlahBarang');
		$hargaBeli = $this->input->post('hargaBeli');

		$data = array(
			'id'      => $this->input->post('idBarang'),
			'qty'     => $qty,
			'price'   => $hargaBeli,
			'name'    => $this->input->post('namaBarang'),
			'amount'  => $hargaBeli * $qty,
			// 'stock'    => $this->input->post('stock')
		);
		$this->cart->insert($data);
	}
	function tambah_pembelian()
	{
		$this->form_validation->set_rules(
			'barcode',
			'Barcode',
			'required',
			[
				'required' => '%s Harus Diisi',
			]
		);
		$this->form_validation->set_rules(
			'namaBarang',
			'Nama Barang',
			'required',
			[
				'required' => '%s Harus Diisi',
			]
		);
		$this->form_validation->set_rules(
			'jumlahBarang',
			'Jumlah Barang',
			'required',
			[
				'required' => '%s Harus Diisi',
			]
		);
		$this->form_validation->set_rules(
			'hargaBeli',
			'Harga',
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

			$this->Model_transaksi->tambahpembelian();
		} else {
			$result = array(
				'error' => true,
				'barcode_error' => form_error('barcode'),
				'namaBarang_error' => form_error('namaBarang'),
				'jumlahBarang_error' => form_error('jumlahBarang'),
				'hargaBeli_error' => form_error('hargaBeli'),

			);
		}
		echo json_encode($result);
	}
	function ubahbeli()
	{ }
	function hapus_detail()
	{
		// $this->db->query("UPDATE detail_pembelian SET status = '0' WHERE iddetailbeli='$_GET[iddetailbeli]'");
		$this->db->query("DELETE FROM detail_pembelian WHERE iddetailbeli='$_GET[iddetailbeli]'");
		$this->db->query("DELETE FROM stock WHERE iddetailbeli='$_GET[iddetailbeli]'");
	}
	function hapusid()
	{
		$this->db->query("DELETE FROM pembelian WHERE noRand='$_GET[noRand]'");
		$this->db->query("DELETE FROM detail_pembelian WHERE noRand='$_GET[noRand]'");
		$this->db->query("DELETE FROM stock WHERE noRandmasuk='$_GET[noRand]'");
	}
	public function lihat($id)
	{
		$header = $this->Model_transaksi->getHeader($id);
		$data = array(
			'header' => $header,
			'konfigurasi' => $this->Model_pengaturan->konfigurasi(),
			'detail' => $this->Model_transaksi->getdetailpenjualan($header->noRand),

		);
		$this->template->load('v_template', 'v_lihatpembelian', $data);
	}
	public function edit($id)
	{
		$this->form_validation->set_rules(
			'supplier',
			'Supplier',
			'required',
			[
				'required' => '%s Harus Diisi',
			]
		);
		$this->form_validation->set_rules(
			'pembayaran',
			'Pembayaran',
			'required',
			[
				'required' => '%s Harus Diisi',
			]
		);
		$this->form_validation->set_rules(
			'tanggal',
			'Tanggal Pembelian',
			'required',
			[
				'required' => '%s Harus Diisi',
			]
		);

		if ($this->form_validation->run()) {
			$post = $this->input->post(null, true);
			$chq_date = str_replace('/', '-', $post['tanggal']);
			$data = array(
				'date' 				=> date('Y-m-d', strtotime($post['tanggal'])),
				'idSupplier' 		=> $post['supplier'],
				'pembayaran' 		=> $post['pembayaran'],
				'updated_by'     	=> $this->session->userdata('idUsers'),
				'updated_at'     	=> date('Y-m-d h:i:s'),
				'date'     			=> date("Y-m-d", strtotime($chq_date)),
				// 'date'     			=> $post['tanggal'],
			);
			$id = $this->input->post('noRand1');
			$where = array('noRand' => $id);
			$this->db->where($where);
			$this->db->update('pembelian', $data);

			$this->cart->destroy();
			$this->session->set_flashdata('sukses', 'Data Berhasil Disimpan');
			redirect('pembelian');
		} else {
			$this->session->set_flashdata('error', 'Data Gagal Disimpan');
			$header = $this->Model_transaksi->getHeader($id);
			$data = array(
				'header' => $header,
				'konfigurasi' => $this->Model_pengaturan->konfigurasi(),
				'detail' => $this->Model_transaksi->getdetailpenjualan($header->noRand),
				'supplier' => $this->Model_supplier->getSupplier(),
				'barang' => $this->Model_barang->getBarang(),
			);
			$this->template->load('v_template', 'v_editpembelian', $data);
		}
	}
}
