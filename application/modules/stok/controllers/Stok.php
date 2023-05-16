<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Stok extends My_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->simple_login->cek_login();
        // $this->simple_login->cek_admin();
    }
    public function index()
    {
        $data = array(
            'konfigurasi' => $this->Model_pengaturan->konfigurasi(),
        );
        $this->template->load('v_template', 'viewlist_stock', $data);
    }
    function table()
    {
        $output['data'] = array();
        $data =  $this->Model_barang->getStok();
        $no = 1;
        foreach ($data as $dt) {
            $output['data'][] = array(
                $no++,
                $dt->namaBarang,
                $dt->stock,
                '
                <button class="btn btn-sm btn-info"><i class="fa fa-eye"></i> Kartu Stok</button>
                '
            );
        }
        echo json_encode($output);
    }
}
