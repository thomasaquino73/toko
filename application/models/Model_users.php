<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_users extends CI_Model
{
    private $tabelusers = "users";

    function __construct()
    {
        parent::__construct();
    }
    //kendaraan
    function getusers()
    {
        // $this->db->select('*,SUM(transaksi.jumlahMasuk-transaksi.jumlahKeluar)  as saldo ');
        $this->db->select('*');
        $this->db->from($this->tabelusers);
        $this->db->join('karyawan', 'karyawan.idKaryawan=users.idKaryawan');
        $this->db->where_not_in('idUsers', $this->session->userdata('idUsers'));
        $data = $this->db->get();
        return $data->result();
    }
    function getkaryawan()
    {
        $data = $this->db->query('SELECT * FROM karyawan WHERE NOT EXISTS (SELECT * FROM users WHERE users.idKaryawan = karyawan.idKaryawan)');
        return $data->result();
    }
    function editusers($id)
    {
        $this->db->select('*');
        $this->db->from($this->tabelusers);
        $this->db->join('karyawan', 'karyawan.idKaryawan=users.idKaryawan');
        $this->db->where('idUsers', $id);
        $data = $this->db->get();
        return $data;
    }

    function inspengguna()
    {
        $post = $this->input->post(null, true);
        $data = array(
            'idKaryawan'        => $post['karyawan'],
            'username'          => $post['username'],
            'password'          => $this->encryption->encrypt($post['password']),
            'statusAktif'       => $post['statusaktif'],
            'role'              => $post['role'],
            'created_by'          => $this->session->userdata('idUsers'),
            'created_at'          => date('Y-m-d,h:i:s'),
        );
        $this->db->insert($this->tabelusers, $data);
    }
    function updateusers()
    {
        $post = $this->input->post(null, true);
        $data = array(
            'username'          => $post['username'],
            'password'          => $this->encryption->encrypt($post['password']),
            'statusAktif'       => $post['statusaktif'],
            'role'              => $post['role'],
            'updated_by'          => $this->session->userdata('idUsers'),
            'updated_at'          => date('Y-m-d,h:i:s'),
        );
        $id = $this->input->post('user_id');
        $where = array('idUsers' => $id);
        $this->db->where($where);
        $this->db->update($this->tabelusers, $data);
    }
    function update_status_aktif()
    {
        $this->db->query("UPDATE users  SET  statusAktif = 'Aktif' WHERE idUsers='$_GET[idUsers]'");
    }
    function update_status_tidakaktif()
    {
        $this->db->query("UPDATE users  SET  statusAktif = 'Tidak Aktif' WHERE idUsers='$_GET[idUsers]'");
    }

    function cek_login($where)
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->join('karyawan', 'users.idKaryawan=karyawan.idKaryawan');
        $this->db->where($where);
        return $this->db->get();
    }
}
