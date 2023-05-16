<div class="row">
	<div class="col-sm-4 col-3">
		<h4 class="page-title">Daftar Barang</h4>
	</div>
	<div class="col-sm-8 col-9 text-right m-b-20">
		<a href="<?= base_url() ?>barang/daftar-barang/add" class="btn btn-primary float-right btn-rounded"><i class="fa fa-plus"></i> Tambah Data</a>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="table-responsive">
			<?php if ($this->session->flashdata('sukses')) { ?>
				<div class="alert alert-success alert-dismissible fade show" role="alert">
					<strong>Success!</strong> <?= $this->session->flashdata('sukses') ?>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
			<?php }; ?>
			<table id="table" class="display nowrap " style="width:100%">
				<thead>
					<tr>
						<th style="">#</th>
						<th>Barcode</th>
						<th>Kode Barang - Nama Barang</th>
						<th>Kategori</th>
						<th>Satuan</th>
						<th>Harga Jual</th>
						<th class="text-right">Aksi</th>
					</tr>
				</thead>
				<tbody>
				</tbody>
			</table>
		</div>
	</div>
</div>
<script>
	var table;
	jQuery(document).ready(function() {
		table = $('#table').DataTable({
			"ajax": {
				"url": "<?= base_url() ?>barang/daftar-barang/table",
			},
			responsive: true
		});
	})

	function reload_table() {
		table.ajax.reload(null, false); //reload datatable ajax
	}

	function hapus_barang(id) {

		Swal.fire({
			title: 'Yakin Mau Dihapus?',
			text: ` `,
			icon: '',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Hapus Data'
		}).then((result) => {
			if (result.isConfirmed) {
				$.ajax({
					data: "idBarang=" + id,
					url: "daftar-barang/hapus",
					type: "GET",
					success: function(data) {
						Swal.fire({
							position: 'center',
							icon: 'success',
							title: 'Data sudah dihapus',
							showConfirmButton: false,
							timer: 5000
						});
						setTimeout(function() {
							reload_table()
						}, 1000);
					},
					error: function(jqXHR, textStatus, errorThrown) {
						Swal.fire({
							position: 'center',
							icon: 'error',
							title: 'Gagal Dihapus Karena Data sudah terpakai di tabel lain',
							showConfirmButton: false,
							timer: 5000
						});
					}
				});
			}
		})
	}

	function status_aktif(id) {
		Swal.fire({
			title: 'Apakah ingin diganti menjadi Aktif?',
			text: ` `,
			icon: '',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Ya',
			cancelButtonText: 'Tidak'
		}).then((result) => {
			if (result.isConfirmed) {
				$.ajax({
					data: "idUsers=" + id,
					url: "pengguna/status_aktif",
					type: "GET",
					success: function(data) {
						Swal.fire({
							position: 'center',
							icon: 'success',
							title: 'Status sudah menjadi Aktif',
							showConfirmButton: false,
							timer: 5000
						});
						setTimeout(function() {
							reload_table()
						}, 1000);
					},
					error: function(jqXHR, textStatus, errorThrown) {
						Swal.fire({
							position: 'center',
							icon: 'error',
							title: 'Gagal Dihapus Karena Data sudah terpakai di tabel lain',
							showConfirmButton: false,
							timer: 5000
						});
					}
				});
			}
		})
	}

	function status_tidakaktif(id) {
		Swal.fire({
			title: 'Apakah ingin diganti menjadi Tidak Aktif?',
			text: ` `,
			icon: '',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Ya',
			cancelButtonText: 'Tidak'
		}).then((result) => {
			if (result.isConfirmed) {
				$.ajax({
					data: "idUsers=" + id,
					url: "pengguna/status_tidakaktif",
					type: "GET",
					success: function(data) {
						Swal.fire({
							position: 'center',
							icon: 'success',
							title: 'Status sudah menjadi Tidak Aktif',
							showConfirmButton: false,
							timer: 5000
						});
						setTimeout(function() {
							reload_table()
						}, 1000);
					},
					error: function(jqXHR, textStatus, errorThrown) {
						Swal.fire({
							position: 'center',
							icon: 'error',
							title: 'Gagal Dihapus Karena Data sudah terpakai di tabel lain',
							showConfirmButton: false,
							timer: 5000
						});
					}
				});
			}
		})
	}
</script>