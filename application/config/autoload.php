<?php
defined('BASEPATH') or exit('No direct script access allowed');


$autoload['packages'] = array();


$autoload['libraries'] = array('form_validation', 'encryption', 'session', 'database', 'template', 'my_form_validation', 'upload', 'user_agent', 'Simple_login', 'cart');


$autoload['drivers'] = array();


$autoload['helper'] = array('url', 'form', 'download', 'string', 'file', 'security', 'date', 'fungsi');


$autoload['config'] = array();


$autoload['language'] = array();


$autoload['model'] = array('Model_karyawan', 'Model_sales', 'Model_users', 'Model_supplier', 'Model_dashboard', 'Model_konsumen', 'Model_lokasi', 'Model_pengaturan', 'Model_kendaraan', 'Model_barang', 'Model_transaksi');
