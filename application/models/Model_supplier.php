<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_supplier extends CI_Model
{
    private $tabelsupplier = "supplier";

    function __construct()
    {
        parent::__construct();
    }
    //kendaraan
    function getSupplier()
    {
        // $this->db->select('*,SUM(transaksi.jumlahMasuk-transaksi.jumlahKeluar)  as saldo ');
        $this->db->select('*');
        $this->db->from($this->tabelsupplier);
        $this->db->join('provinsi', 'supplier.idProvinsi=provinsi.idProvinsi', 'left');
        $this->db->join('kota', 'supplier.idKota=kota.idKota', 'left');
        $this->db->join('kecamatan', 'supplier.idKecamatan=kecamatan.idKecamatan', 'left');
        $this->db->join('kelurahan', 'supplier.idKelurahan=kelurahan.idKelurahan', 'left');
        $this->db->order_by('namaperusahaan', 'asc');
        $data = $this->db->get();
        return $data->result();
    }

    // insert
    function editsupplier($id)
    {
        $this->db->select('*');
        $this->db->from($this->tabelsupplier);
        $this->db->join('provinsi', 'supplier.idProvinsi=provinsi.idProvinsi', 'left');
        $this->db->where('idSupplier', $id);
        $data = $this->db->get();
        return $data;
    }
    function inssupplier()
    {
        $post = $this->input->post(null, true);
        $data = array(
            'namaperusahaan'    => $post['namaperusahaan'],
            'kontak'            => $post['kontak'],
            'noTel'             => $post['notel'],
            'idProvinsi'        => $post['provinsi'],
            'idKota'            => $post['kota'],
            'idKecamatan'       => $post['kecamatan'],
            'idKelurahan'       => $post['kelurahan'],
            'kodePos'           => $post['kodepos'],
            'alamatLengkap'     => $post['alamatlengkap'],
            'created_by'     => $this->session->userdata('idUsers'),
            'created_at'     => date('Y-m-d, h:i:s'),
        );
        $this->db->insert($this->tabelsupplier, $data);
    }
    function updatesupplier()
    {
        $post = $this->input->post(null, true);
        $data = array(
            'namaperusahaan'    => $post['namaperusahaan'],
            'kontak'            => $post['namakontak'],
            'noTel'             => $post['notel'],
            'idProvinsi'        => $post['provinsi'],
            'idKota'            => $post['kota'],
            'idKecamatan'       => $post['kecamatan'],
            'idKelurahan'       => $post['kelurahan'],
            'kodePos'           => $post['kodepos'],
            'alamatLengkap'     => $post['alamatlengkap'],
            'updated_by'     => $this->session->userdata('idUsers'),
            'updated_at'     => date('Y-m-d, h:i:s'),
        );
        $id = $this->input->post('supplier_id');
        $where = array('idSupplier' => $id);
        $this->db->where($where);
        $this->db->update($this->tabelsupplier, $data);
    }

    // end insert
}
