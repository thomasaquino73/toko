<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['default_controller'] = 'login';
$route['404_override'] = 'error_404';
$route['translate_uri_dashes'] = true;
$route['^(\w{2})$'] = $route['default_controller'];

// route karyawan
$route['master-data/karyawan'] = 'karyawan';
$route['master-data/karyawan/hapus_id'] = 'karyawan/hapus_id';
// $route['master-data/karyawan/table'] = 'karyawan/table';
$route['master-data/karyawan/add'] = 'karyawan/tambah-karyawan';
$route['master-data/karyawan/save'] = 'karyawan/save';
$route['master-data/karyawan/update'] = 'karyawan/update';
$route['master-data/karyawan/edit/(:num)'] = 'karyawan/edit-karyawan/$1';
$route['master-data/karyawan/profile/(:num)'] = 'karyawan/profile_id/$1';

// route pengguna
$route['master-data/pengguna'] = 'pengguna';
$route['master-data/pengguna/hapus_id'] = 'pengguna/hapus_id';
// $route['master-data/pengguna/table'] = 'pengguna/table';
$route['master-data/pengguna/add'] = 'pengguna/tambah-pengguna';
$route['master-data/pengguna/save'] = 'pengguna/save';
$route['master-data/pengguna/update'] = 'pengguna/update';
$route['master-data/pengguna/status_aktif'] = 'pengguna/status_aktif';
$route['master-data/pengguna/status_tidakaktif'] = 'pengguna/status_tidakaktif';
$route['master-data/pengguna/edit/(:num)'] = 'pengguna/edit-pengguna/$1';

// route supplier
$route['master-data/supplier'] = 'supplier';
$route['master-data/supplier/hapus_id'] = 'supplier/hapus_id';
$route['master-data/supplier/add'] = 'supplier/tambah-supplier';
$route['master-data/supplier/save'] = 'supplier/save';
$route['master-data/supplier/update'] = 'supplier/update';
$route['master-data/supplier/edit/(:num)'] = 'supplier/edit-supplier/$1';

// route konsumen
$route['master-data/konsumen'] = 'konsumen';
$route['master-data/konsumen/hapus_id'] = 'konsumen/hapus_id';
$route['master-data/konsumen/add'] = 'konsumen/tambah-konsumen';
$route['master-data/konsumen/save'] = 'konsumen/save';
$route['master-data/konsumen/update'] = 'konsumen/update';
$route['master-data/konsumen/edit/(:num)'] = 'konsumen/edit-konsumen/$1';

// route satuan
$route['barang/satuan'] = 'satuan';
$route['barang/satuan/hapus_id'] = 'satuan/hapus_id';
$route['barang/satuan/table'] = 'satuan/table';
$route['barang/satuan/add'] = 'satuan/tambah-satuan';
$route['barang/satuan/save'] = 'satuan/save';
$route['barang/satuan/edit/(:num)'] = 'satuan/edit-satuan/$1';

// route kategori
$route['barang/kategori'] = 'kategori';
$route['barang/kategori/hapus_id'] = 'kategori/hapus_id';
$route['barang/kategori/table'] = 'kategori/table';
$route['barang/kategori/add'] = 'kategori/tambah-kategori';
$route['barang/kategori/save'] = 'kategori/save';
$route['barang/kategori/edit/(:num)'] = 'kategori/edit-kategori/$1';

// route pengaturan perusahaan
$route['pengaturan/perusahaan'] = 'perusahaan';
$route['pengaturan/perusahaan/upload'] = 'perusahaan/upload';

// route pengaturan perusahaan
$route['pengaturan/lokasi'] = 'lokasi';
$route['pengaturan/lokasi/tableprovinsi']       = 'lokasi/table_provinsi';
$route['pengaturan/lokasi/tablekota']           = 'lokasi/table_kota';
$route['pengaturan/lokasi/tablekecamatan']      = 'lokasi/table_kecamatan';
$route['pengaturan/lokasi/tablekelurahan']      = 'lokasi/table_kelurahan';


$route['pengaturan/lokasi/editkelurahan']       = 'lokasi/ambilIdKelurahan';
$route['pengaturan/lokasi/editkecamatan']       = 'lokasi/ambilIdKecamatan';
$route['pengaturan/lokasi/editkota']            = 'lokasi/ambilIdKota';
$route['pengaturan/lokasi/editprovinsi']        = 'lokasi/ambilIdProvinsi';

$route['pengaturan/lokasi/hapuskota']           = 'lokasi/hapus_kota';
$route['pengaturan/lokasi/hapusprovinsi']       = 'lokasi/hapus_provinsi';
$route['pengaturan/lokasi/hapuskecamatan']      = 'lokasi/hapus_kecamatan';
$route['pengaturan/lokasi/hapuskelurahan']      = 'lokasi/hapus_kelurahan';

$route['pengaturan/lokasi/simpankelurahan']     = 'lokasi/simpankelurahan';
$route['pengaturan/lokasi/simpankecamatan']     = 'lokasi/simpankecamatan';
$route['pengaturan/lokasi/simpankota']          = 'lokasi/simpankota';
$route['pengaturan/lokasi/simpanprovinsi']      = 'lokasi/simpanprovinsi';

$route['pengaturan/lokasi/ubahkelurahan']       = 'lokasi/ubahkelurahan';
$route['pengaturan/lokasi/ubahkecamatan']       = 'lokasi/ubahkecamatan';
$route['pengaturan/lokasi/ubahkota']            = 'lokasi/ubahkota';
$route['pengaturan/lokasi/ubahprovinsi']        = 'lokasi/ubahprovinsi';

// route pengaturan perusahaan
$route['pengaturan/ganti-password']             = 'ganti_password';
$route['pengaturan/ganti-password/sukses']      = 'ganti_password/sukses';

// route barang
$route['barang/daftar-barang']                  = 'barang';
$route['barang/daftar-barang/table']            = 'barang/table';
$route['barang/daftar-barang/add']              = 'barang/tambah-barang';
$route['barang/daftar-barang/save']             = 'barang/save';
$route['barang/daftar-barang/hapus']            = 'barang/hapus_id';
$route['barang/daftar-barang/edit/(:num)']      = 'barang/edit_barang/$1';
$route['barang/daftar-barang/barcode']          = 'barang/barcode';

// route transaksi
// $route['transaksi/pembelian']                   = 'pembelian';
// $route['transaksi/pembelian/lihat/(:num)']      = 'pembelian/lihat/$1';
// $route['transaksi/pembelian/edit/(:num)']       = 'pembelian/edit/$1';
// $route['transaksi/pembelian/hapus/(:num)']       = 'pembelian/hapusdetail/$1';

// route stok
$route['laporan/stok']                          = 'stok';
