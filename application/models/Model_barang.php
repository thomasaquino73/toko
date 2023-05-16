<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_barang extends CI_Model
{
    private $tabelsatuan = "satuan";
    private $tabelbarang = "barang";
    private $tabelkategori = "kategori";


    function __construct()
    {
        parent::__construct();
    }
    //satuan
    function getSatuan()
    {
        $this->db->select('*');
        $this->db->from($this->tabelsatuan);
        $this->db->order_by('namaSatuan', 'asc');
        $data = $this->db->get();
        return $data->result();
    }
    function inssatuan()
    {
        $post = $this->input->post(null, true);
        $data = array(
            'namaSatuan'     => $post['namasatuan'],
        );
        $this->db->insert($this->tabelsatuan, $data);
    }
    function editsatuan($id)
    {
        $this->db->select('*');
        $this->db->from($this->tabelsatuan);
        $this->db->where('idSatuan', $id);
        $data = $this->db->get();
        return $data;
    }
    function updatesatuan()
    {
        $post = $this->input->post(null, true);
        $data = array(
            'namaSatuan'     => $post['namasatuan'],

        );
        $id = $this->input->post('satuan_id');
        $where = array('idSatuan' => $id);
        $this->db->where($where);
        $this->db->update($this->tabelsatuan, $data);
    }
    // end satuan

    function getBarang()
    {
        $this->db->select('*');
        $this->db->from($this->tabelbarang);
        $this->db->join('kategori', 'barang.idKategori=kategori.idKategori', 'left');
        $this->db->join('satuan', 'barang.idSatuan=satuan.idSatuan', 'left');
        $this->db->order_by('namaBarang', 'asc');
        $data = $this->db->get();
        // return $data->result();
        return $data;
    }
    function getStok()
    {
        $this->db->select('*,(sum(jumlahMasuk-jumlahKeluar)) as stock');
        $this->db->from('stock');
        $this->db->join($this->tabelbarang, 'stock.idBarang=barang.idBarang', 'left');
        $this->db->group_by('stock.idBarang');
        $data = $this->db->get();

        if (!empty($data)) {
            return $data->result();
        } else {
            echo '';
        }
    }
    function insbarang()
    {
        $post = $this->input->post(null, true);
        $data = array(
            'barcode'     => $post['barcode'],
            'namaBarang'     => $post['namabarang'],
            'idSatuan'     => $post['satuan'],
            'idKategori'     => $post['kategori'],
            'hargaJual'     => $post['hargajual'],
            'created_by'     => $this->session->userdata('idUsers'),
            'created_at'     => date('Y-m-d, h:i:s'),
        );
        $this->db->insert($this->tabelbarang, $data);
    }
    function editbarang($id)
    {
        $this->db->select('*');
        $this->db->from($this->tabelbarang);
        $this->db->where('idBarang', $id);
        $data = $this->db->get();
        return $data;
    }
    function updatebarang()
    {
        $post = $this->input->post(null, true);
        $data = array(
            'barcode'     => $post['barcode'],
            'namaBarang'     => $post['namabarang'],
            'idSatuan'     => $post['satuan'],
            'idKategori'     => $post['kategori'],
            'hargaJual'     => $post['hargajual'],
            'updated_by'     => $this->session->userdata('idUsers'),
            'updated_at'     => date('Y-m-d, h:i:s'),

        );
        $id = $this->input->post('barang_id');
        $where = array('idBarang' => $id);
        $this->db->where($where);
        $this->db->update($this->tabelbarang, $data);
    }
    // end barang

    //satuan
    function getKategori()
    {
        $this->db->select('*');
        $this->db->from($this->tabelkategori);
        $this->db->order_by('namaKategori', 'asc');
        $data = $this->db->get();
        return $data->result();
    }
    function inskategori()
    {
        $post = $this->input->post(null, true);
        $data = array(
            'namaKategori'     => $post['namakategori'],
            'created_by'     => $this->session->userdata('idUsers'),
            'created_at'     => date('Y-m-d, h:i:s'),
        );
        $this->db->insert($this->tabelkategori, $data);
    }
    function editkategori($id)
    {
        $this->db->select('*');
        $this->db->from($this->tabelkategori);
        $this->db->where('idKategori', $id);
        $data = $this->db->get();
        return $data;
    }
    function updateKategori()
    {
        $post = $this->input->post(null, true);
        $data = array(
            'namaKategori'     => $post['namakategori'],
            'updated_by'     => $this->session->userdata('idUsers'),
            'updated_at'     => date('Y-m-d, h:i:s'),

        );
        $id = $this->input->post('kategori_id');
        $where = array('idKategori' => $id);
        $this->db->where($where);
        $this->db->update($this->tabelkategori, $data);
    }
    // end kategori
}
