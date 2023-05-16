<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_sales extends CI_Model
{
    private $tabelsales = "sales";
    private $tabelkaryawan = "karyawan";


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
        $this->db->join('provinsi', 'karyawan.idProvinsi=provinsi.idProvinsi');
        $this->db->join('kota', 'karyawan.idKota=kota.idKota');
        $this->db->order_by('sales.idKaryawan', 'asc');
        $data = $this->db->get();
        return $data->result();
    }
    function getKaryawan()
    {
        // $this->db->select('*,SUM(transaksi.jumlahMasuk-transaksi.jumlahKeluar)  as saldo ');
        $this->db->select('*');
        $this->db->from($this->tabelkaryawan);
        $this->db->order_by('idKaryawan', 'asc');
        $data = $this->db->get();
        return $data->result();
    }

    function inskaryawan()
    {
        $post = $this->input->post(null, true);
        $data = array(
            'idKaryawan'         => $post['namasales'],
            'keterangan'     => $post['keterangan'],

        );
        $this->db->insert($this->tabelsales, $data);
    }
    function editsales($id)
    {
        $this->db->select('*');
        $this->db->from($this->tabelsales);
        $this->db->join('karyawan', 'sales.idKaryawan=karyawan.idKaryawan');
        $this->db->where('idSales', $id);
        $data = $this->db->get();
        return $data;
    }
    function updatesales()
    {
        $post = $this->input->post(null, true);
        $data = array(
            'keterangan'     => $post['keterangan'],

        );
        $id = $this->input->post('sales_id');
        $where = array('idSales' => $id);
        $this->db->where($where);
        $this->db->update($this->tabelsales, $data);
    }
    // end insert
}
