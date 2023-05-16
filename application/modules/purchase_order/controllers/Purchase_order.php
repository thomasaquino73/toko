<?php
defined('BASEPATH') or exit('No direct script access allowed');

class purchase_order extends MY_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->simple_login->cek_login();
	}
	public function tabel_po()
	{
		$this->load->view('table_po');
	}
	public function tabel_barang()
	{
		$this->load->view('table_barang');
	}
	public function index()
	{
		$data = array(
			'konfigurasi' => $this->Model_pengaturan->konfigurasi(),
			'supplier' => $this->Model_supplier->getSupplier(),
			'barang' => $this->Model_barang->getBarang(),
			// 'po' => $this->Model_transaksi->generate_code(10),
		);
		$this->template->load('v_template', 'v_tambahpo', $data);
	}
	function tambah_supplier()
	{
		$this->form_validation->set_rules(
			'namaperusahaan',
			'Nama Perusahaan',
			'required|is_unique[supplier.namaperusahaan]',
			[
				'required' => '%s Harus Diisi',
				'is_unique' => '%s Sudah Terdaftar',
			]
		);

		$this->form_validation->set_rules(
			'kontak',
			'Nama Kontak',
			'required',
			[
				'required' => '%s Harus Diisi',
			]
		);
		$this->form_validation->set_rules(
			'notel',
			'Nomor Telepon',
			'required',
			[
				'required' => '%s Harus Diisi',
			]
		);
		$this->form_validation->set_rules(
			'provinsi',
			'Provinsi',
			'required',
			[
				'required' => '%s Harus Diisi',
			]
		);
		$this->form_validation->set_rules(
			'kota',
			'Kabupaten / Kota',
			'required',
			[
				'required' => '%s Harus Diisi',
			]
		);
		$this->form_validation->set_rules(
			'kecamatan',
			'Kecamatan',
			'required',
			[
				'required' => '%s Harus Diisi',
			]
		);
		$this->form_validation->set_rules(
			'kelurahan',
			'Kelurahan',
			'required',
			[
				'required' => '%s Harus Diisi',
			]
		);
		$this->form_validation->set_rules(
			'alamatlengkap',
			'Alamat Lengkap',
			'required',
			[
				'required' => '%s Harus Diisi',
			]
		);

		if ($this->form_validation->run()) {

			$this->Model_supplier->inssupplier();
			$this->session->set_flashdata('sukses', 'Data Berhasil Disimpan');
			redirect('purchase-order');
		} else {
			$data = array(
				'konfigurasi' => $this->Model_pengaturan->konfigurasi(),
				'supplier' => $this->Model_supplier->getSupplier(),
				'provinsi' => $this->Model_lokasi->getProvinsi(),
				'kota' => $this->Model_lokasi->getKota(),
				'kecamatan' => $this->Model_lokasi->getKecamatan(),
				'kelurahan' => $this->Model_lokasi->getKelurahan(),
			);
			$this->template->load('v_template', 'v_tambahsupplier', $data);
		}
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
			'barcode'    => $this->input->post('barcode')
		);
		$this->cart->insert($data);
	}
	function simpanbeli()
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
			if ($this->cart->contents()) {
				$nomor = $this->Model_transaksi->generate_code();
				$post = $this->input->post(null, true);
				$data = array(
					'idSupplier'    	=> $post['supplier'],
					'noPo'     			=> $nomor,
					'pembayaran'     	=> $post['pembayaran'],
					'noRand'  			=> $nomor,
					'created_by'     	=> $this->session->userdata('idUsers'),
					'created_at'     	=> date('Y-m-d h:i:s'),
					'date'     			=> date('Y-m-d', strtotime($post['tanggal'])),
				);
				$this->db->insert('pembelian', $data);
				$keranjang = $this->cart->contents();
				foreach ($keranjang as $keranjang) {
					$detailpembelian = array(
						'noPo'     			=> $nomor,
						'idBarang'			=> $keranjang['id'],
						'jumlahBarang'		=> $keranjang['qty'],
						'hargaBeli' 		=> $keranjang['price'],
						'noRand'  			=> $nomor,
					);

					$this->db->insert('detail_pembelian', $detailpembelian);

					// $stock = array(
					// 	'idBarang' => $keranjang['id'],
					// 	'jumlahMasuk' => $keranjang['qty'],
					// 	'noDokumen' => $post['nopo'],
					// 	'noRandmasuk' => $nomor,
					// );

					// $this->db->insert('stock', $stock);
				}
				$this->cart->destroy();
				$this->session->set_flashdata('sukses', 'Data Berhasil Disimpan');
				redirect('pembelian');
			} else {
				$this->session->set_flashdata('error', 'Data Pembelian Masih Kosong');
				$this->index();
			}
		} else {
			$this->session->set_flashdata('error', 'Data Gagal Disimpan');
			$this->index();
		}
	}
	function hapus_cart()
	{ //fungsi untuk menghapus item cart
		$data = array(
			'rowid' => $this->input->post('row_id'),
			'qty' => 0,
		);
		$this->cart->update($data);
		// echo $this->show_cart();
	}
}
