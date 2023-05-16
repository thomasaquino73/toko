<div class="row">
	<div class="col-sm-4 col-3">
		<h4 class="page-title">Daftar Karyawan</h4>
	</div>
	<div class="col-sm-8 col-9 text-right m-b-20">
		<a href="<?= base_url() ?>master-data/karyawan/add" class="btn btn-primary float-right btn-rounded"><i class="fa fa-plus"></i> Tambah Data</a>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="table-responsive">
			<?php if ($this->session->has_userdata('sukses')) { ?>
				<div class="alert alert-success alert-dismissible fade show" role="alert">
					<strong>Success!</strong> <?= $this->session->flashdata('sukses') ?>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
			<?php }; ?>

			<table id="table" class="table table-border table-striped custom-table nowrap " style="width:100%">
				<thead>
					<tr>
						<th style="">#</th>
						<th style="min-width:200px;">Nama Lengkap</th>
						<th>Nama Panggilan</th>
						<th>Jenis Kelamin</th>
						<th>Alamat</th>
						<th>Nomor Telepon</th>
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
				"url": "<?= base_url() ?>karyawan/table",
			},
			responsive: true,
		});
	})

	function reload_table() {
		table.ajax.reload(null, false); //reload datatable ajax
	}

	function hapus_karyawan(id) {

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
					data: "idKaryawan=" + id,
					url: "karyawan/hapus_id",
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
</script>