<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_lokasi extends CI_Model
{
    private $tabelprovinsi = "provinsi";
    private $tabelkota = "kota";
    private $tabelkecamatan = "kecamatan";
    private $tabelkelurahan = "kelurahan";


    function __construct()
    {
        parent::__construct();
    }
    //kendaraan
    function getProvinsi()
    {
        // $this->db->select('*,SUM(transaksi.jumlahMasuk-transaksi.jumlahKeluar)  as saldo ');
        $this->db->select('*');
        $this->db->from($this->tabelprovinsi);
        $this->db->order_by('provinsi', 'asc');
        $data = $this->db->get();
        return $data->result();
    }
    function getallKota()
    {
        // $this->db->select('*,SUM(transaksi.jumlahMasuk-transaksi.jumlahKeluar)  as saldo ');
        $this->db->select('*');
        $this->db->from($this->tabelkota);
        $this->db->order_by('idKota', 'asc');
        $data = $this->db->get();
        return $data->result();
    }
    function getKota()
    {
        // $this->db->select('*,SUM(transaksi.jumlahMasuk-transaksi.jumlahKeluar)  as saldo ');
        $this->db->select('*');
        $this->db->from($this->tabelkota);
        $this->db->join('provinsi', 'provinsi.idProvinsi=kota.idProvinsi');
        $this->db->order_by('idKota', 'asc');
        $data = $this->db->get();
        return $data->result();
    }
    function getKecamatan()
    {
        // $this->db->select('*,SUM(transaksi.jumlahMasuk-transaksi.jumlahKeluar)  as saldo ');
        $this->db->select('*');
        $this->db->from($this->tabelkecamatan);
        $this->db->join('kota', 'kota.idKota=kecamatan.idKota');
        $this->db->order_by('kecamatan.idKecamatan', 'asc');
        $data = $this->db->get();
        return $data->result();
    }
    function getKelurahan()
    {
        // $this->db->select('*,SUM(transaksi.jumlahMasuk-transaksi.jumlahKeluar)  as saldo ');
        $this->db->select('*');
        $this->db->from($this->tabelkelurahan);
        $this->db->join('kecamatan', 'kelurahan.idKecamatan=kecamatan.idKecamatan');
        $this->db->order_by('idKelurahan', 'asc');
        $data = $this->db->get();
        return $data->result();
    }


    // end insert

    function ambilidkelurahan()
    {
        $id = $this->input->post('id');
        $where = array('idKelurahan' => $id);
        return $this->db->get_where($this->tabelkelurahan, $where);
    }

    function updatekelurahan()
    {

        $post = $this->input->post(null, true);
        $data = array(
            'idKecamatan'   => $post['kecamatan'],
            'kelurahan'     => $post['kel'],
        );
        $id = $this->input->post('id');
        $where = array('idKelurahan' => $id);
        $this->db->where($where);
        $this->db->update($this->tabelkelurahan, $data);
    }

    // kecamatan
    function ambilidkecamatan()
    {
        $id = $this->input->post('id');
        $where = array('idKecamatan' => $id);
        return $this->db->get_where($this->tabelkecamatan, $where);
    }

    function updatekecamatan()
    {

        $post = $this->input->post(null, true);
        $data = array(
            'idKota'   => $post['kota'],
            'kecamatan'     => $post['kec'],
        );
        $id = $this->input->post('id');
        $where = array('idKecamatan' => $id);
        $this->db->where($where);
        $this->db->update($this->tabelkecamatan, $data);
    }

    // kota
    function updateKota()
    {

        $post = $this->input->post(null, true);
        $data = array(
            'idProvinsi'   => $post['provinsi'],
            'kota'     => $post['kot'],
        );
        $id = $this->input->post('id');
        $where = array('idKota' => $id);
        $this->db->where($where);
        $this->db->update($this->tabelkota, $data);
    }
    function ambilidkota()
    {
        $id = $this->input->post('id');
        $where = array('idKota' => $id);
        return $this->db->get_where($this->tabelkota, $where);
    }



    // provinsi
    function simpanprovinsi()
    {
        $post = $this->input->post(null, true);
        $data = array(
            'provinsi'         => $post['provinsi'],
        );
        $this->db->insert($this->tabelprovinsi, $data);
    }
    function updateprovinsi()
    {

        $post = $this->input->post(null, true);
        $data = array(
            'provinsi'   => $post['provinsi'],
        );
        $id = $this->input->post('id');
        $where = array('idprovinsi' => $id);
        $this->db->where($where);
        $this->db->update($this->tabelprovinsi, $data);
    }
    function ambilidprovinsi()
    {
        $id = $this->input->post('id');
        $where = array('idprovinsi' => $id);
        return $this->db->get_where($this->tabelprovinsi, $where);
    }
}
