<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_transaksi extends CI_Model
{
    private $tabelpembelian = "pembelian";
    private $tabeldetailpembelian = "detail_pembelian";



    function __construct()
    {
        parent::__construct();
    }
    //satuan

    function getPembelian()
    {
        $this->db->select('*,sum(detail_pembelian.hargaBeli*detail_pembelian.jumlahBarang) as total, pembelian.nopo as nopo_pembelian,pembelian.noRand as norand_pembelian');
        $this->db->from($this->tabelpembelian);
        $this->db->join('supplier', 'supplier.idSupplier=pembelian.idSupplier', 'left');
        $this->db->join('detail_pembelian', 'detail_pembelian.noPo=pembelian.noPo', 'left');
        $this->db->join('users', 'users.idUsers=pembelian.created_by', 'left');
        $this->db->order_by('pembelian.noPo', 'desc');
        $this->db->group_by('pembelian.noPo');
        $data = $this->db->get();
        return $data->result();
    }
    function input($databanyak, $table)
    {
        $this->db->insert($databanyak, $table);
    }

    public function po_no()
    {
        $a = 'PO';
        $sql = "select max(mid(noPo,9,4)) as po_no from pembelian where mid(noPo,3,6)=date_format(curdate(),'%y%m%d')";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $row = $query->row();
            $n = ((int) $row->po_no) + 1;
            $no = sprintf("%'.04d", $n);
        } else {
            $no = "0001";
        }
        $po = $a . date('ymd') . $no;
        return $po;
    }
    function generate_code()
    {
        $this->db->select('RIGHT(pembelian.noRand,4) as kode', FALSE);
        // $this->db->order_by('nomor', 'DESC');
        $this->db->limit(1);
        // $this->db->where('abjad', 'SJ');
        $query = $this->db->get('pembelian');      //cek dulu apakah ada sudah ada kode di tabel.
        if ($query->num_rows() <> 0) {
            //jika kode ternyata sudah ada.
            $data = $query->row();
            $kode = intval($data->kode) + 1;
        } else {
            //jika kode belum ada
            $kode = 1;
        }
        //  $tgl=date('dmY');
        $batas = str_pad($kode, 4, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
        // $kodemax = "SAP"."5".$tgl.$batas;  //format kode
        //$kodejadi = "ODJ-9921-".$kodemax;    // hasilnya ODJ-9921-0001 dst.
        return $batas;
    }
    function tambahpembelian()
    {

        $post = $this->input->post(null, true);
        $data = array(
            'noRand' => $post['noRand'],
            'idBarang' => $post['idBarang'],
            'jumlahBarang' => $post['jumlahBarang'],
            'hargaBeli' => $post['hargaBeli'],
            'noPo' => $post['nopo1'],

        );
        $this->db->insert($this->tabeldetailpembelian, $data);
    }
    function inspembelian()
    {
        $post = $this->input->post(null, true);
        $tot =  $this->input->post('id');
        $data = array(
            'date'               => date('Y-m-d', strtotime($post['tanggal'])),
            'idSupplier'        => $_POST['supplier'],
            'pembayaran'        => $_POST['pembayaran'],
            'created_by'          => $this->session->userdata('idUsers'),
            'created_at'          => date('Y-m-d,h:i:s'),

        );
        $this->db->insert($this->tabelpembelian, $data);

        for ($o = 1; $o <= $tot; $o++) {
            $idBarang = $this->input->post('namabarang' . $o);
            $jumlahBarang = $this->input->post('jumlahbarang' . $o);
            $hargaBeli = $this->input->post('hargabeli' . $o);
            $databanyak = array(
                'idBarang' => $idBarang,
                'jumlahBarang' => $jumlahBarang,
                'hargaBeli' => $hargaBeli,
            );
            $this->Model_transaksi->input('detail_pembelian', $databanyak);
        }
    }
    function editsatuan($id)
    {
        $this->db->select('*');
        $this->db->from($this->tabelsatuan);
        $this->db->where('idSatuan', $id);
        $data = $this->db->get();
        return $data;
    }
    function updatesatuan()
    {
        $post = $this->input->post(null, true);
        $data = array(
            'namaSatuan'     => $post['namasatuan'],

        );
        $id = $this->input->post('satuan_id');
        $where = array('idSatuan' => $id);
        $this->db->where($where);
        $this->db->update($this->tabelsatuan, $data);
    }
    // end satuan
    function getHeader($id)
    {
        $this->db->select('*');
        $this->db->from('pembelian');
        $this->db->join('users', 'users.idUsers=pembelian.created_by', '');
        $this->db->join('karyawan', 'users.idKaryawan=karyawan.idKaryawan', '');
        $this->db->join('provinsi', 'provinsi.idProvinsi=karyawan.idProvinsi', '');
        $this->db->join('kota', 'kota.idKota=karyawan.idKota', '');
        $this->db->join('kecamatan', 'kecamatan.idKecamatan=karyawan.idKecamatan', '');
        $this->db->join('kelurahan', 'kelurahan.idKelurahan=karyawan.idKelurahan', '');
        $this->db->join('supplier', 'pembelian.idSupplier=supplier.idSupplier', '');
        $this->db->where('pembelian.noRand', $id);
        $data = $this->db->get();
        return $data->result()[0];
        // return $data->row();
    }
    function getdetailpenjualan($noRand)
    {
        $this->db->select('*');
        $this->db->from('detail_pembelian as dp');
        $this->db->join('barang as br', 'br.idBarang=dp.idBarang', 'left');
        $this->db->join('satuan as sb', 'br.idSatuan=sb.idSatuan', 'left');
        $this->db->where('dp.noRand', $noRand);
        $data = $this->db->get();
        return $data->result();
    }
}
