<div class="row">
	<div class="col-sm-4 col-3">
		<h4 class="page-title">Sales</h4>

	</div>
	<div class="col-sm-8 col-9 text-right m-b-20">
		<a href="<?= base_url() ?>sales/tambah-sales" class="btn btn-primary btn-rounded float-right"><i class="fa fa-plus"></i> Tambah Data</a>
	</div>
</div>
<?php if ($this->session->flashdata('sukses')) { ?>
	<div class="alert alert-success alert-dismissible fade show" role="alert">
		<strong>Success!</strong> <?= $this->session->flashdata('sukses') ?>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
<?php }; ?>
<div class="row doctor-grid">

	<?php foreach ($sales as $sales) { ?>
		<div class="col-md-4 col-sm-4  col-lg-3">
			<div class="profile-widget">
				<div class="doctor-img">
					<a class="avatar" href="profile.html"><img alt="" src="<?= base_url() ?>assets/img/avatar_default.png"></a>
				</div>
				<div class="dropdown profile-action">
					<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
					<div class="dropdown-menu dropdown-menu-right">
						<a class="dropdown-item" href="<?= base_url('master-data/sales/ubah-sales/') . $sales->idSales ?>"><i class="fa fa-pencil m-r-5"></i> Edit</a>
						<a class="dropdown-item" href="#" onclick="hapus_sales(<?= $sales->idSales ?>)"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
					</div>
				</div>
				<h4 class="doctor-name text-ellipsis"><a href="profile.html"><?= $sales->namaLengkap ?></a></h4>
				<div class="doc-prof"><?= $sales->keterangan ?></div>
				<div class="user-country">
					<i class="fa fa-map-marker"></i> <?= $sales->kota ?>, <?= $sales->provinsi ?>
				</div>
			</div>
		</div>
	<?php } ?>
</div>
<div class="row">
	<div class="col-sm-12">
		<div class="see-all">
			<a class="see-all-btn" href="javascript:void(0);">Load More</a>
		</div>
	</div>
</div>
<script>
	function reload_table() {
		window.location.reload();
	}

	function hapus_sales(id) {
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
					data: "idSales=" + id,
					url: "sales/hapus_id",
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