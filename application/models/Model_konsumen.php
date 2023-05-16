<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_konsumen extends CI_Model
{
    private $tabelkonsumen = "konsumen";

    function __construct()
    {
        parent::__construct();
    }
    //kendaraan

    function getKonsumen()
    {
        $this->db->select('kategori,idKonsumen,namaKonsumen,kontak,konsumen.noTel as notelKonsumen,konsumen.alamatLengkap as alamatKonsumen,kota.kota as kotaKonsumen,kelurahan.kelurahan as kelurahanKonsumen, kecamatan.kecamatan as kecamatanKonsumen, provinsi.provinsi as provinsiKonsumen, konsumen.kodePos as kodePos ');
        $this->db->from($this->tabelkonsumen);
        $this->db->join('provinsi', 'konsumen.idProvinsi=provinsi.idProvinsi', 'left');
        $this->db->join('kota', 'konsumen.idKota=kota.idKota', 'left');
        $this->db->join('kecamatan', 'konsumen.idKecamatan=kecamatan.idKecamatan', 'left');
        $this->db->join('kelurahan', 'konsumen.idKelurahan=kelurahan.idKelurahan', 'left');
        $this->db->order_by('namaKonsumen', 'asc');
        $data = $this->db->get();
        return $data->result();
    }


    function getHeader($id)
    {
        $this->db->select('*');
        $this->db->from('konsumen');
        $this->db->where('idKonsumen', $id);
        $data = $this->db->get();
        return $data;
    }

    // insert
    function editkonsumen($id)
    {
        $this->db->select('*');
        $this->db->from($this->tabelkonsumen);
        $this->db->join('provinsi', 'konsumen.idProvinsi=provinsi.idProvinsi', 'left');

        $this->db->where('idKonsumen', $id);
        $data = $this->db->get();
        return $data;
    }
    function inskonsumen()
    {
        $post = $this->input->post(null, true);
        $data = array(
            'namaKonsumen'      => $post['namakonsumen'],
            'kontak'            => $post['namakontak'],
            'noTel'             => $post['notel'],
            'idProvinsi'        => $post['provinsi'],
            'idKota'            => $post['kota'],
            'idKecamatan'       => $post['kecamatan'],
            'idKelurahan'       => $post['kelurahan'],
            'kodePos'           => $post['kodepos'],
            'alamatLengkap'     => $post['alamatlengkap'],
            'kategori'          => $post['kategori'],
            'created_by'     => $this->session->userdata('idUsers'),
            'created_at'     => date('Y-m-d, h:i:s'),
        );
        $this->db->insert($this->tabelkonsumen, $data);
    }
    function updatekonsumen()
    {
        $post = $this->input->post(null, true);
        $data = array(
            'namaKonsumen'      => $post['namakonsumen'],
            'kontak'            => $post['namakontak'],
            'noTel'             => $post['notel'],
            'idProvinsi'        => $post['provinsi'],
            'idKota'            => $post['kota'],
            'idKecamatan'       => $post['kecamatan'],
            'idKelurahan'       => $post['kelurahan'],
            'kodePos'           => $post['kodepos'],
            'alamatLengkap'     => $post['alamatlengkap'],
            'kategori'          => $post['kategori'],
            'updated_by'     => $this->session->userdata('idUsers'),
            'updated_at'     => date('Y-m-d, h:i:s'),
        );
        $id = $this->input->post('konsumen_id');
        $where = array('idKonsumen' => $id);
        $this->db->where($where);
        $this->db->update($this->tabelkonsumen, $data);
    }

    // end insert
}
