<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_pengaturan extends CI_Model
{
    private $tabelkonfigurasi = "konfigurasi";

    function __construct()
    {
        parent::__construct();
    }

    public function cek_old($table, $where)
    {

        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($where);
        return $this->db->get();
    }
    function save()
    {
        $pass = $this->encryption->encrypt($this->input->post('new_pass'));
        $username = $this->input->post('username');
        $data = array(
            'password' => $pass,
            'username' => $username,
            'statusLogin' => 'on',
            'updated_by'          => $this->session->userdata('idUsers'),
            'updated_at'          => date('Y-m-d,h:i:s'),
        );
        $this->db->where('idUsers', $this->session->userdata('idUsers'));
        // $this->db->where('idUsers', '6');
        $this->db->update('users', $data);
    }

    // 
    function konfigurasi()
    {
        $this->db->select('*');
        $this->db->from('konfigurasi');
        $this->db->join('provinsi', 'konfigurasi.idProvinsi=provinsi.idProvinsi', 'left');
        $this->db->join('kota', 'konfigurasi.idKota=kota.idKota', 'left');
        $this->db->join('kecamatan', 'konfigurasi.idKecamatan=kecamatan.idKecamatan', 'left');
        $this->db->join('kelurahan', 'konfigurasi.idKelurahan=kelurahan.idKelurahan', 'left');

        $dt = $this->db->get();
        return $dt->row();
    }
    // function updateperusahaan()
    // {
    //     $post = $this->input->post(null, true);
    //     // $uploaded_data = $this->upload->data();
    //     $data = array(
    //         'namaPerusahaan'    => $post['namaperusahaan'],
    //         'noTel'             => $post['notel'],
    //         'email'             => $post['email'],
    //         'idProvinsi'        => $post['provinsi'],
    //         'idKota'            => $post['kota'],
    //         'idKecamatan'       => $post['kecamatan'],
    //         'idKelurahan'       => $post['kelurahan'],
    //         'kodePos'           => $post['kodepos'],
    //         'alamatLengkap'     => $post['alamatlengkap'],
    //         'website'           => $post['website'],
    //     );
    //     $where = array('id' => 0);
    //     $this->db->where($where);
    //     $this->db->update($this->tabelkonfigurasi, $data);
    // }
    public function update($data)
    {
        $where = array('id' => 0);
        $this->db->where($where);
        $this->db->update($this->tabelkonfigurasi, $data);

        return ($this->db->affected_rows() > 0) ? true : false;
    }
}
