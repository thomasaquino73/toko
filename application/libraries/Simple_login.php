<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Simple_login
{
    protected $CI;
    public function __construct()
    {
        $this->CI = &get_instance();
    }


    //fungsi cek login
    public function cek_login()
    {
        if ($this->CI->session->userdata('username') == "") {

            $this->CI->session->set_flashdata('warning', 'anda belum login');
            redirect(base_url('login'), 'refresh');
        };
    }
    public function cek_admin()
    {
        if ($this->CI->session->userdata('divisi') != 'office') {

            redirect(base_url('dashboard'), 'refresh');
        };
    }
    public function ganti_password()
    {
        if ($this->CI->session->userdata('username') == "") {
            $this->CI->session->set_flashdata('sukses', 'anda berhasil ganti password, silahkan login kembali');
            redirect(base_url('login'), 'refresh');
        };
    }
    //fungsi logout
    public function logout()
    {

        $this->CI->session->unset_userdata(
            array(
                'idUsers',
                'username',
                'namalengkap'
            )
        );
        $this->CI->session->set_flashdata('sukses', 'anda berhasil logout');
        redirect(base_url('login'), 'refresh');
    }
}
