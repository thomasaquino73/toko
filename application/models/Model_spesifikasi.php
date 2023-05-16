<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_spesifikasi extends CI_Model
{
    private $tabelsatuan_barang = "satuan_barang";


    function __construct()
    {
        parent::__construct();
    }
    //kendaraan
    function getSatuan()
    {
        // $this->db->select('*,SUM(transaksi.jumlahMasuk-transaksi.jumlahKeluar)  as saldo ');
        $this->db->select('*');
        $this->db->from($this->tabelsatuan_barang);
        $data = $this->db->get();
        return $data->result();
    }


    // end insert
}
