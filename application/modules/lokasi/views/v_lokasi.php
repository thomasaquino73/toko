				<div class="row">
					<div class="col-12 col-md-6 col-lg-6 col-xl-6">
						<div class="card">
							<div class="card-body">
								<div class="chart-title">
									<h4>Provinsi</h4>
									<div class="float-right">
										<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal_provinsi" onclick="tombol_provinsi('tambah-provinsi')"> <i class="fa fa-plus" aria-hidden="true"></i> Tambah Data</button>
										</span>
									</div>
								</div>
								<div class="table-responsive">
									<table id="table_provinsi" class="display compact " style="width:100%">
										<thead>
											<tr>
												<th style="">#</th>
												<th style="min-width:200px;">Nama Provinsi</th>
												<th class="text-right">Aksi</th>
											</tr>
										</thead>
										<tbody>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
					<div class="col-12 col-md-6 col-lg-6 col-xl-6">
						<div class="card">
							<div class="card-body">
								<div class="chart-title">
									<h4>Kabupaten / Kota</h4>
									<div class="float-right">
										<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal_kota" onclick="tombol_kota('tambah-kota')"> <i class="fa fa-plus" aria-hidden="true"></i> Tambah Data</button>
									</div>
								</div>
								<div class="table-responsive">
									<table id="table_kota" class="display compact " style="width:100%">
										<thead>
											<tr>
												<th style="">#</th>
												<th style="min-width:200px;">Nama Kabupaten / Kota</th>
												<th style="min-width:200px;">Nama Provinsi</th>
												<th class="text-right">Aksi</th>
											</tr>
										</thead>
										<tbody>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
					<div class="col-12 col-md-6 col-lg-6 col-xl-6">
						<div class="card">
							<div class="card-body">
								<div class="chart-title">
									<h4>Kecamatan</h4>
									<div class="float-right">
										<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal_kecamatan" onclick="tombol_kecamatan('tambah-kecamatan')"> <i class="fa fa-plus" aria-hidden="true"></i> Tambah Data</button>
									</div>
								</div>
								<div class="table-responsive">
									<table id="table_kecamatan" class="display compact " style="width:100%">
										<thead>
											<tr>
												<th style="">#</th>
												<th style="min-width:200px;">Nama Kecamatan</th>
												<th style="min-width:200px;">Nama Kabupaten / Kota</th>
												<th class="text-right">Aksi</th>
											</tr>
										</thead>
										<tbody>
										</tbody>
									</table>
								</div>

							</div>
						</div>
					</div>
					<div class="col-12 col-md-6 col-lg-6 col-xl-6">
						<div class="card">
							<div class="card-body">
								<div class="chart-title">
									<h4>Kelurahan / Desa</h4>
									<div class="float-right">
										<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal_kelurahan" onclick="tombol_kelurahan('tambah-kelurahan')"> <i class="fa fa-plus" aria-hidden="true"></i> Tambah Data</button>
									</div>
								</div>
								<div class="table-responsive">
									<table id="table_kelurahan" class="display compact " style="width:100%">
										<thead>
											<tr>
												<th style="">#</th>
												<th style="min-width:200px;">Nama Kelurahan</th>
												<th style="min-width:200px;">Nama Kecamatan</th>
												<th class="text-right">Aksi</th>
											</tr>
										</thead>
										<tbody>
										</tbody>
									</table>
								</div>

							</div>
						</div>
					</div>
				</div>
				<?php $this->load->view('modals/tambah_provinsi_modals') ?>
				<?php $this->load->view('modals/tambah_kota_modals') ?>
				<?php $this->load->view('modals/tambah_kecamatan_modals') ?>
				<?php $this->load->view('modals/tambah_kelurahan_modals') ?>
				<script>
					var table_provinsi;
					var table_kota;
					var table_kecamatan;
					var table_kelurahan;
					jQuery(document).ready(function() {
						table_provinsi = $('#table_provinsi').DataTable({
							"ajax": {
								"url": "<?= base_url() ?>pengaturan/lokasi/tableprovinsi",
							}
						});
						table_kota = $('#table_kota').DataTable({
							"ajax": {
								"url": "<?= base_url() ?>pengaturan/lokasi/tablekota",
							}
						});
						table_kecamatan = $('#table_kecamatan').DataTable({
							"ajax": {
								"url": "<?= base_url() ?>pengaturan/lokasi/tablekecamatan",
							}
						});
						table_kelurahan = $('#table_kelurahan').DataTable({
							"ajax": {
								"url": "<?= base_url() ?>pengaturan/lokasi/tablekelurahan",
							}
						});
					})

					function reload_table() {
						table_provinsi.ajax.reload(null, false); //reload datatable ajax
						table_kota.ajax.reload(null, false); //reload datatable ajax
						table_kecamatan.ajax.reload(null, false); //reload datatable ajax
						table_kelurahan.ajax.reload(null, false); //reload datatable ajax
					}

					// KELURAHAN
					function tombol_kelurahan(a) {
						if (a == 'tambah-kelurahan') {
							$('#tombol-simpan-kelurahan').show();
							$('#tombol-ubah-kelurahan').hide();
							$('#tombol-tambah-kelurahan').show();
							$('[name="kelurahan[]"]').show('');
							$('[name="kel"]').hide('');
							$('#title_modal_kelurahan').html('Tambah Kelurahan');
							$('.kelurahan').remove();
							$('[name="kelurahan[]"]').val('');
							$('#kec').addClass('selectkecamatan');
							$('#formkelurahan').show('');

						} else {
							$('#tombol-simpan-kelurahan').hide();
							$('#tombol-ubah-kelurahan').show();
							$('#tombol-tambah-kelurahan').hide();
							$('[name="kelurahan[]"]').hide('');
							$('[name="kel"]').show('');
							$('#formkelurahan').hide('');
							$('#title_modal_kelurahan').html('Ubah Kelurahan');
							$('#kec').removeClass('selectkecamatan');
							$('#kec').addClass('form-control');


							$.ajax({
								type: 'POST',
								data: 'id=' + a,
								url: 'lokasi/editkelurahan',
								dataType: 'json',
								success: function(hasil) {
									$('[name="id"]').val(hasil[0].idKelurahan);
									$('[name="kecamatan"]').val(hasil[0].idKecamatan);
									$('[name="kel"]').val(hasil[0].kelurahan);
								}
							});
						}
					}

					function simpan_kelurahan(e) {
						var datastring = $("#form_kelurahan").serialize();
						var spin
						if (e == "add_kelurahan") mesej = 'ditambah', url = "lokasi/simpankelurahan";
						else if (e == "update_kelurahan") mesej = 'diubah', url = "lokasi/ubahkelurahan";
						$.ajax({
							type: 'POST',
							data: datastring,
							url: url,
							dataType: 'JSON',
							beforeSend: function(e) {
								$('#tombol-simpan-kelurahan').html('<i class="fa fa-spin fa-spinner"></i>');
								$('#tombol-ubah-kelurahan').html('<i class="fa fa-spin fa-spinner"></i>');
							},
							complete: function(e) {
								$('#tombol-simpan-kelurahan').html('Simpan');
								$('#tombol-ubah-kelurahan').html('Ubah');
							},
							success: function(hasil) {
								if (hasil.error) {
									if (hasil.kecamatan_error != '') {
										$('#kecamatan').addClass('is-invalid');
										$('#kecamatan_error').html(hasil.kecamatan_error);
									} else {
										$('#kecamatan').removeClass('is-invalid');
										$('#kecamatan').addClass('is-valid');
										$('#kecamatan_error').html('');
									}
								}
								if (hasil.error) {
									if (hasil.kel_error != '') {
										$('#kel').addClass('is-invalid');
										$('#kel_error').html(hasil.kel_error);
									} else {
										$('#kel').removeClass('is-invalid');
										$('#kel').addClass('is-valid');
										$('#kel_error').html('');
									}
								}

								if (hasil.success) {
									$('#modal_kelurahan').modal('hide');
									Swal.fire({
										position: 'center',
										icon: 'success',
										title: 'Data sudah ' + mesej,
										showConfirmButton: false,
										timer: 5000
									});
									setTimeout(function() {
										reload_table()
									}, 1000);
								}
							}
						})
					}

					function hapus_kelurahan(id) {
						Swal.fire({
							title: 'Yakin Mau Hapus Data Kelurahan?',
							text: ` `,
							icon: '',
							showCancelButton: true,
							confirmButtonColor: '#3085d6',
							cancelButtonColor: '#d33',
							confirmButtonText: 'Hapus Data'
						}).then((result) => {
							if (result.isConfirmed) {
								$.ajax({
									data: "idKelurahan=" + id,
									url: "lokasi/hapuskelurahan",
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
					// 

					// kecamatan
					function tombol_kecamatan(a) {
						if (a == 'tambah-kecamatan') {
							$('#tombol-simpan-kecamatan').show();
							$('#tombol-ubah-kecamatan').hide();
							$('#title_modal_kecamatan').html('Tambah Kecamatan');
							$('.kecamatan').remove();
							$('[name="kecamatan[]"]').val('');
							$('[name="kecamatan[]"]').show('');
							$('[name="kec"]').hide('');
							$('#tombol-tambah-kecamatan').show();


						} else {
							$('#tombol-simpan-kecamatan').hide();
							$('#tombol-ubah-kecamatan').show();
							$('#title_modal_kecamatan').html('Ubah Kecamatan');
							$('[name="kecamatan[]"]').hide('');
							$('[name="kec"]').show('');
							$('#tombol-tambah-kecamatan').hide();


							$.ajax({
								type: 'POST',
								data: 'id=' + a,
								url: 'lokasi/editkecamatan',
								dataType: 'json',
								success: function(hasil) {
									$('[name="id"]').val(hasil[0].idKecamatan);
									$('[name="kota"]').val(hasil[0].idKota);
									$('[name="kec"]').val(hasil[0].kecamatan);
								}
							});
						}
					}

					function simpan_kecamatan(e) {
						var datastring = $("#form_kecamatan").serialize();
						var spin
						if (e == "add_kecamatan") mesej = 'ditambah', url = "lokasi/simpankecamatan";
						else if (e == "update_kecamatan") mesej = 'diubah', url = "lokasi/ubahkecamatan";
						$.ajax({
							type: 'POST',
							data: datastring,
							url: url,
							dataType: 'JSON',
							beforeSend: function(e) {
								$('#tombol-simpan-kecamatan').html('<i class="fa fa-spin fa-spinner"></i>');
								$('#tombol-ubah-kecamatan').html('<i class="fa fa-spin fa-spinner"></i>');
							},
							complete: function(e) {
								$('#tombol-simpan-kecamatan').html('Simpan');
								$('#tombol-ubah-kecamatan').html('Ubah');
							},
							success: function(hasil) {
								if (hasil.error) {
									if (hasil.namakota_error != '') {
										$('#namakota').addClass('is-invalid');
										$('#namakota_error').html(hasil.namakota_error);
									} else {
										$('#namakota').removeClass('is-invalid');
										$('#namakota').addClass('is-valid');
										$('#namakota_error').html('');
									}
								}
								if (hasil.error) {
									if (hasil.kec_error != '') {
										$('#kec').addClass('is-invalid');
										$('#kec_error').html(hasil.kec_error);
									} else {
										$('#kec').removeClass('is-invalid');
										$('#kec').addClass('is-valid');
										$('#kec_error').html('');
									}
								}
								if (hasil.success) {
									$('#modal_kecamatan').modal('hide');
									Swal.fire({
										position: 'center',
										icon: 'success',
										title: 'Data sudah ' + mesej,
										showConfirmButton: false,
										timer: 5000
									});
									setTimeout(function() {
										reload_table()
									}, 1000);
								}
							}
						})
					}

					function hapus_kecamatan(id) {
						Swal.fire({
							title: 'Yakin Mau Hapus Data Kecamatan?',
							text: ` `,
							icon: '',
							showCancelButton: true,
							confirmButtonColor: '#3085d6',
							cancelButtonColor: '#d33',
							confirmButtonText: 'Hapus Data'
						}).then((result) => {
							if (result.isConfirmed) {
								$.ajax({
									data: "idKecamatan=" + id,
									url: "lokasi/hapuskecamatan",
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


					// kota
					function tombol_kota(a) {
						if (a == 'tambah-kota') {
							$('#tombol-simpan-kota').show();
							$('#tombol-ubah-kota').hide();
							$('#tombol-tambah-kota').show();
							$('[name="kota[]"]').show('');
							$('[name="kot"]').hide('');
							$('#title_modal_kota').html('Tambah Kabupaten / Kota');
							$('.kota').remove();
							$('[name="kota[]"]').val('');
							$('#kot').addClass('selectkecamatan');
							$('#formkota').show('');
							$('[name="kota[]"]').show('');
							$('[name="kot"]').hide('');
						} else {
							$('#tombol-simpan-kota').hide();
							$('#tombol-ubah-kota').show();
							$('#tombol-tambah-kota').hide();
							$('[name="kota[]"]').hide('');
							$('[name="kel"]').show('');
							$('#formkota').hide('');
							$('#title_modal_kota').html('Ubah Kabupaten / Kota');
							$('[name="kota[]"]').hide('');
							$('[name="kot"]').show('');

							$.ajax({
								type: 'POST',
								data: 'id=' + a,
								url: 'lokasi/editkota',
								dataType: 'json',
								success: function(hasil) {
									$('[name="id"]').val(hasil[0].idKota);
									$('[name="provinsi"]').val(hasil[0].idProvinsi);
									$('[name="kot"]').val(hasil[0].kota);
								}
							});
						}
					}

					function simpan_kota(e) {
						var datastring = $("#form_kota").serialize();
						var spin
						if (e == "add_kota") mesej = 'ditambah', url = "lokasi/simpankota";
						else if (e == "update_kota") mesej = 'diubah', url = "lokasi/ubahkota";
						$.ajax({
							type: 'POST',
							data: datastring,
							url: url,
							dataType: 'JSON',
							beforeSend: function(e) {
								$('#tombol-simpan-kota').html('<i class="fa fa-spin fa-spinner"></i>');
								$('#tombol-ubah-kota').html('<i class="fa fa-spin fa-spinner"></i>');
							},
							complete: function(e) {
								$('#tombol-simpan-kota').html('Simpan');
								$('#tombol-ubah-kota').html('Ubah');
							},
							success: function(hasil) {
								if (hasil.error) {
									if (hasil.provinsi_error != '') {
										$('#provinsi').addClass('is-invalid');
										$('#provinsi_error').html(hasil.provinsi_error);
									} else {
										$('#provinsi').removeClass('is-invalid');
										$('#provinsi').addClass('is-valid');
										$('#provinsi_error').html('');
									}
								}
								if (hasil.error) {
									if (hasil.kot_error != '') {
										$('#kot').addClass('is-invalid');
										$('#kot_error').html(hasil.kot_error);
									} else {
										$('#kot').removeClass('is-invalid');
										$('#kot').addClass('is-valid');
										$('#kot_error').html('');
									}
								}
								if (hasil.success) {
									$('#modal_kota').modal('hide');
									Swal.fire({
										position: 'center',
										icon: 'success',
										title: 'Data sudah ' + mesej,
										showConfirmButton: false,
										timer: 5000
									});
									setTimeout(function() {
										reload_table()
									}, 1000);
								}
							}
						})
					}

					function hapus_kota(id) {
						Swal.fire({
							title: 'Yakin Mau Hapus Data Kota?',
							text: ` `,
							icon: '',
							showCancelButton: true,
							confirmButtonColor: '#3085d6',
							cancelButtonColor: '#d33',
							confirmButtonText: 'Hapus Data'
						}).then((result) => {
							if (result.isConfirmed) {
								$.ajax({
									data: "idKota=" + id,
									url: "lokasi/hapuskota",
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
					// provinsi
					function tombol_provinsi(a) {
						if (a == 'tambah-provinsi') {
							$('#tombol-simpan-provinsi').show();
							$('#tombol-ubah-provinsi').hide();
							$('#tombol-tambah-provinsi').show();
							$('#title_modal_provinsi').html('Tambah provinsi');
						} else {
							$('#tombol-simpan-provinsi').hide();
							$('#tombol-ubah-provinsi').show();
							$('#tombol-tambah-provinsi').hide();
							$('#title_modal_provinsi').html('Ubah provinsi');
							$.ajax({
								type: 'POST',
								data: 'id=' + a,
								url: 'lokasi/editprovinsi',
								dataType: 'json',
								success: function(hasil) {
									$('[name="id"]').val(hasil[0].idProvinsi);
									$('[name="provinsi"]').val(hasil[0].provinsi);
								}
							});
						}
					}

					function simpan_provinsi(e) {
						var datastring = $("#form_provinsi").serialize();
						var spin
						if (e == "add_provinsi") mesej = 'ditambah', url = "lokasi/simpanprovinsi";
						else if (e == "update_provinsi") mesej = 'diubah', url = "lokasi/ubahprovinsi";
						$.ajax({
							type: 'POST',
							data: datastring,
							url: url,
							dataType: 'JSON',
							beforeSend: function(e) {
								$('#tombol-simpan-provinsi').html('<i class="fa fa-spin fa-spinner"></i>');
								$('#tombol-ubah-provinsi').html('<i class="fa fa-spin fa-spinner"></i>');
							},
							complete: function(e) {
								$('#tombol-simpan-provinsi').html('Simpan');
								$('#tombol-ubah-provinsi').html('Ubah');
							},
							success: function(hasil) {
								if (hasil.error) {
									if (hasil.provinsi_error != '') {
										$('#provinsi').addClass('is-invalid');
										$('#provinsi_error').html(hasil.provinsi_error);
									} else {
										$('#provinsi').removeClass('is-invalid');
										$('#provinsi').addClass('is-valid');
										$('#provinsi_error').html('');
									}
								}

								if (hasil.success) {
									$('#modal_provinsi').modal('hide');
									Swal.fire({
										position: 'center',
										icon: 'success',
										title: 'Data sudah ' + mesej,
										showConfirmButton: false,
										timer: 5000
									});
									setTimeout(function() {
										reload_table()
									}, 1000);
								}
							}
						})
					}

					function hapus_provinsi(id) {
						Swal.fire({
							title: 'Yakin Mau Hapus Data Provinsi?',
							text: ` `,
							icon: '',
							showCancelButton: true,
							confirmButtonColor: '#3085d6',
							cancelButtonColor: '#d33',
							confirmButtonText: 'Hapus Data'
						}).then((result) => {
							if (result.isConfirmed) {
								$.ajax({
									data: "idProvinsi=" + id,
									url: "lokasi/hapusprovinsi",
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