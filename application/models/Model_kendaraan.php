<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_kendaraan extends CI_Model
{
    private $tabelkendaraan = "kendaraan";

    function __construct()
    {
        parent::__construct();
    }
    //kendaraan
    function getKendaraan()
    {
        // $this->db->select('*,SUM(transaksi.jumlahMasuk-transaksi.jumlahKeluar)  as saldo ');
        $this->db->select('*');
        $this->db->from($this->tabelkendaraan);
        $this->db->order_by('kodeKendaraan', 'asc');
        $data = $this->db->get();
        return $data->result();
    }

    // insert
    function editkendaraan($id)
    {
        $this->db->select('*');
        $this->db->from($this->tabelkendaraan);
        $this->db->where('idKendaraan', $id);
        $data = $this->db->get();
        return $data;
    }
    function inskendaraan()
    {
        $post = $this->input->post(null, true);
        $data = array(
            'kodeKendaraan'     => $post['kodekendaraan'],
            'merkKendaraan'     => $post['merkkendaraan'],
            'noRangka'          => $post['norangka'],
            'noMesin'           => $post['nomesin'],
            'tipeKendaraan'     => $post['tipe'],
            'jenisKendaraan'    => $post['jenis'],
            'noMesin'           => $post['nomesin'],
            'modelKendaraan'    => $post['model'],
            'tahunPembuatan'    => $post['tahunpembuatan'],
            'isiSilinder'       => $post['isisilinder'],
            'warna'             => $post['warna'],

        );
        $this->db->insert($this->tabelkendaraan, $data);
    }
    function updatekendaraan()
    {
        $post = $this->input->post(null, true);
        $data = array(
            'kodeKendaraan'     => $post['kodekendaraan'],
            'merkKendaraan'     => $post['merkkendaraan'],
            'noRangka'          => $post['norangka'],
            'noMesin'           => $post['nomesin'],
            'tipeKendaraan'     => $post['tipe'],
            'jenisKendaraan'    => $post['jenis'],
            'noMesin'           => $post['nomesin'],
            'modelKendaraan'    => $post['model'],
            'tahunPembuatan'    => $post['tahunpembuatan'],
            'isiSilinder'       => $post['isisilinder'],
            'warna'             => $post['warna'],
        );
        $id = $this->input->post('kendaraan_id');
        $where = array('idKendaraan' => $id);
        $this->db->where($where);
        $this->db->update($this->tabelkendaraan, $data);
    }

    // end insert
}
