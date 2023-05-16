<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_dashboard extends CI_Model
{
    private $tabelsales = "sales";


    function __construct()
    {
        parent::__construct();
    }
    //kendaraan
    function getSales()
    {
        // $this->db->select('*,SUM(transaksi.jumlahMasuk-transaksi.jumlahKeluar)  as saldo ');
        $this->db->select('*');
        $this->db->from($this->tabelsales);
        $this->db->join('karyawan', 'karyawan.idKaryawan=sales.idKaryawan');
        $this->db->order_by('sales.idKaryawan', 'asc');
        $data = $this->db->get();
        return $data->result();
    }
    function countsupplier()
    {
        // $this->db->select('*,SUM(transaksi.jumlahMasuk-transaksi.jumlahKeluar)  as saldo ');
        $this->db->select('*');
        $data =  $this->db->from('supplier');
        return $data->count_all_results();
    }
    function countkonsumen()
    {
        // $this->db->select('*,SUM(transaksi.jumlahMasuk-transaksi.jumlahKeluar)  as saldo ');
        $this->db->select('*');
        $data =  $this->db->from('konsumen');
        return $data->count_all_results();
    }
    function countstatus()
    {
        // $this->db->select('*,SUM(transaksi.jumlahMasuk-transaksi.jumlahKeluar)  as saldo ');
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('statusAktif', 'Aktif');
        return $this->db->count_all_results();
    }
    function countproduk()
    {
        // $this->db->select('*,SUM(transaksi.jumlahMasuk-transaksi.jumlahKeluar)  as saldo ');
        $this->db->select('*');
        $this->db->from('barang');
        return $this->db->count_all_results();
    }


    // end insert
}
