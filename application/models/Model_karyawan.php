<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_karyawan extends CI_Model
{
    private $tabelkaryawan = "karyawan";
    private $tabeldepartemen = "departemen";
    private $tabelgrupdepartemen = "grup_departemen";

    function __construct()
    {
        parent::__construct();
    }
    //kendaraan

    function getKaryawan()
    {
        // $this->db->select('*,SUM(transaksi.jumlahMasuk-transaksi.jumlahKeluar)  as saldo ');
        $this->db->select('*');
        $this->db->from($this->tabelkaryawan);
        $this->db->join('provinsi', 'karyawan.idProvinsi=provinsi.idProvinsi', 'left');
        $this->db->join('kota', 'karyawan.idKota=kota.idKota', 'left');
        $this->db->join('kecamatan', 'karyawan.idKecamatan=kecamatan.idKecamatan', 'left');
        $this->db->join('kelurahan', 'karyawan.idKelurahan=kelurahan.idKelurahan', 'left');
        $this->db->order_by('namaLengkap', 'asc');
        $data = $this->db->get();
        return $data->result();
    }

    // GRUP KARYAWAN
    function getgrupKaryawan()
    {
        // $this->db->select('*,SUM(transaksi.jumlahMasuk-transaksi.jumlahKeluar)  as saldo ');
        $this->db->select('*');
        $this->db->from($this->tabelkaryawan);
        $this->db->join('grup_departemen', 'karyawan.idKaryawan=grup_departemen.idKaryawan', 'left');
        $this->db->join('departemen', 'departemen.idDepartemen=grup_departemen.idDepartemen', 'left');
        $this->db->order_by('namaLengkap', 'asc');
        $data = $this->db->get();
        return $data->result();
    }
    function cariDepartemen($id)
    {
        $this->db->select('*');
        $this->db->from($this->tabeldepartemen);
        $this->db->where('idDepartemen', $id);
        $data = $this->db->get();
        return $data->result();
    }
    function getlistgrupDepartemen($id)
    {
        $this->db->select('*');
        $this->db->from($this->tabelgrupdepartemen);
        $this->db->join('karyawan', 'karyawan.idKaryawan=grup_departemen.idKaryawan');
        $this->db->join('departemen', 'departemen.idDepartemen=grup_departemen.idDepartemen');
        $this->db->where('grup_departemen.idDepartemen', $id);
        $data = $this->db->get();
        return $data->result();
    }
    function editlistgrupDepartemen($id)
    {
        $this->db->select('*');
        $this->db->from($this->tabelgrupdepartemen);
        $this->db->join('karyawan', 'karyawan.idKaryawan=grup_departemen.idKaryawan', 'left');
        $this->db->join('departemen', 'departemen.idDepartemen=grup_departemen.idDepartemen', 'left');
        $this->db->where('grup_departemen.idKaryawan', $id);
        $data = $this->db->get();
        return $data->result();
    }
    // END GRUP KARYAWAN


    function getHeader($id)
    {
        $this->db->select('*');
        $this->db->from('karyawan');
        $this->db->join('provinsi', 'karyawan.idProvinsi=provinsi.idProvinsi', 'left');
        // $this->db->join('kota', 'karyawan.idKota=kota.idKota', 'left');
        // $this->db->join('kecamatan', 'karyawan.idKecamatan=kecamatan.idKecamatan', 'left');
        // $this->db->join('kelurahan', 'karyawan.idKelurahan=kelurahan.idKelurahan', 'left');
        // $this->db->join('grup_departemen', 'karyawan.idKaryawan=grup_departemen.idKaryawan', 'left');
        // $this->db->join('departemen', 'departemen.idDepartemen=grup_departemen.idDepartemen', 'left');
        $this->db->where('karyawan.idKaryawan', $id);
        $data = $this->db->get();
        // return $data->result()[0];
        return $data->row();
    }
    function getdetail($id)
    {
        $this->db->select('*');
        $this->db->from('karyawan');
        $this->db->join('provinsi', 'karyawan.idProvinsi=provinsi.idProvinsi', 'left');
        $this->db->join('kota', 'karyawan.idKota=kota.idKota', 'left');
        $this->db->join('kecamatan', 'karyawan.idKecamatan=kecamatan.idKecamatan', 'left');
        $this->db->join('kelurahan', 'karyawan.idKelurahan=kelurahan.idKelurahan', 'left');
        $this->db->join('grup_departemen', 'karyawan.idKaryawan=grup_departemen.idKaryawan', 'left');
        $this->db->join('departemen', 'departemen.idDepartemen=grup_departemen.idDepartemen', 'left');
        $this->db->where('karyawan.idKaryawan', $id);
        $data = $this->db->get();
        // return $data->result()[0];
        return $data->row();
    }
    function getDepartemen()
    {
        // $this->db->select('*,SUM(transaksi.jumlahMasuk-transaksi.jumlahKeluar)  as saldo ');
        $this->db->select('*');
        $this->db->from($this->tabeldepartemen);
        $this->db->order_by('departemen', 'asc');
        $data = $this->db->get();
        return $data->result();
    }
    // insert

    function inskaryawan()
    {
        $post = $this->input->post(null, true);
        $chq_date = str_replace('/', '-', $post['tanggallahir']);
        $data = array(
            'namaLengkap'         => $post['namalengkap'],
            'namaPanggilan'     => $post['namapanggilan'],
            'noTel'             => $post['notel'],
            'idProvinsi'        => $post['provinsi'],
            'idKota'            => $post['kota'],
            'idKecamatan'       => $post['kecamatan'],
            'idKelurahan'       => $post['kelurahan'],
            'kodePos'           => $post['kodepos'],
            'alamatLengkap'     => $post['alamatlengkap'],
            'tempatLahir'       => $post['tempatlahir'],
            'tanggalLahir'      =>  date("Y-m-d", strtotime($chq_date)),
            'jenisKelamin'      => $post['gender'],
            'email'             => $post['email'],
            'created_by'          => $this->session->userdata('idUsers'),
            'created_at'          => date('Y-m-d,h:i:s'),

        );
        $this->db->insert($this->tabelkaryawan, $data);
    }
    function updatekaryawan()
    {
        $post = $this->input->post(null, true);
        $chq_date = str_replace('/', '-', $post['tanggallahir']);
        $data = array(
            'namaLengkap'         => $post['namalengkap'],
            'namaPanggilan'     => $post['namapanggilan'],
            'noTel'             => $post['notel'],
            'idProvinsi'        => $post['provinsi'],
            'idKota'            => $post['kota'],
            'idKecamatan'       => $post['kecamatan'],
            'idKelurahan'       => $post['kelurahan'],
            'kodePos'           => $post['kodepos'],
            'alamatLengkap'     => $post['alamatlengkap'],
            'tempatLahir'       => $post['tempatlahir'],
            'tanggalLahir'      =>  date("Y-m-d", strtotime($chq_date)),
            'jenisKelamin'      => $post['gender'],
            'email'             => $post['email'],
            'updated_by'          => $this->session->userdata('idUsers'),
            'updated_at'          => date('Y-m-d,h:i:s'),

        );
        $id = $this->input->post('id');
        $where = array('idKaryawan' => $id);
        $this->db->where($where);
        $this->db->update($this->tabelkaryawan, $data);
    }

    // end insert
}
