<div class="row">
	<div class="col-md-8">
		<form action="<?= base_url('perusahaan/upload') ?>" enctype="multipart/form-data" method="post">
			<div class="card-box">
				<div class="row">
					<div class="col-md-12">
						<h4 class="card-title">Data Perusahaan</h4>
						<?php if ($this->session->flashdata('sukses')) { ?>
							<div class="alert alert-success alert-dismissible fade show" role="alert">
								<strong>Success!</strong> <?= $this->session->flashdata('sukses') ?>
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
						<?php } elseif ($this->session->flashdata('error')) { ?>
							<div class="alert alert-danger alert-dismissible fade show" role="alert">
								<strong>Error!</strong> <?= $this->session->flashdata('error') ?>
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
						<?php }; ?>
						<div class="form-group row ">
							<label class="col-lg-3 col-form-label">Nama Perusahaan<span class="text-danger">*</span></label>
							<div class="col-lg-9">
								<input type="text" name="namaperusahaan" placeholder="Nama Perusahaan" style="text-transform:uppercase;" class="form-control <?= form_error('namaperusahaan') ? 'is-invalid' : null ?>" value="<?= $header->namaPerusahaan ?>">
								<input type="hidden" name="ambilnikkaryawan" value="1">
								<small class="text-danger"> <?= form_error('namaperusahaan') ?></small>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-lg-3 col-form-label">Nomor Telp <span class="text-danger">*</span></label>
							<div class="col-md-9">
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text" id="sizing-addon2">+62</span>
									</div>
									<input type="number" name="notel" class="form-control <?= form_error('notel') ? 'is-invalid' : null ?>" placeholder="contoh : 08xxxxxxx" value="<?= $header->noTel ?>">
								</div>
								<small class="text-danger"> <?= form_error('notel') ?></small>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-lg-3 col-form-label">Email:</label>
							<div class="col-lg-9">
								<input type="text" name="email" class="form-control " placeholder="contoh : example@mail.com" value="<?= $header->email ?>">
								<small class="text-danger"> <?= form_error('email') ?></small>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-lg-3 col-form-label">Website:</label>
							<div class="col-lg-9">
								<input type="text" name="website" class="form-control " placeholder="" value="<?= $header->website ?>">
								<small class="text-danger"> <?= form_error('website') ?></small>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-lg-3 col-form-label">Logo :</label>
							<div class="col-lg-7">
								<!-- <input  type="file"> -->
								<input type="file" name="fileupload" id="preview_gambar" />
								<!-- <span class="form-text text-muted">Recommended image size is 40px x 40px</span> -->
							</div>
							<div class="col-lg-2">
								<div class="img-thumbnail float-right"><img src="<?= base_url('assets/img/logo/') . $header->logo ?>" alt="" width="40" height="40"></div>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-lg-3 col-form-label">Alamat Perusahaan:</label>
							<div class="col-lg-9">
								<div class="row">
									<div class="col-md-12">
										<div class=" m-b-20">
											<input type="text" style="text-transform:uppercase;" class="form-control <?= form_error('alamatlengkap') ? 'is-invalid' : null ?>" name="alamatlengkap" placeholder="masukkan alamat lengkap" value="<?= $header->alamatLengkap ?>">
											<small class="text-danger"> <?= form_error('alamatlengkap') ?></small>
										</div>
									</div>
									<label class="col-lg-3 col-form-label">Provinsi:</label>

									<div class="col-md-12 m-b-20 ">
										<select class="form-control combo col-md-12" id="provinsi" name="provinsi">
											<option value="<?= $header->idProvinsi ?>" selected readonly hidden <?php echo set_select('provinsi', $header->idProvinsi, (!empty($data) && $data == $header->idProvinsi  ? TRUE : FALSE)); ?>><?= $header->provinsi ?></option>
											<?php foreach ($provinsi as $provinsi) { ?>
												<option value="<?= $provinsi->idProvinsi ?>" <?php if ($header->idProvinsi == $provinsi->idProvinsi) { ?> selected="selected" <?php } ?>><?= $provinsi->provinsi ?> </option>
											<?php } ?>
										</select>
										<small class="text-danger"> <?= form_error('provinsi') ?></small>
									</div>

									<div class="col-md-12">
										<div class=" m-b-20">
											<label class="col-form-label">Kabupaten / Kota:</label>
											<select class=" combo col-md-12" id="kota" name="kota">
												<option value="<?= $header->idKota ?>" selected readonly hidden <?php echo set_select('kota', $header->idKota, (!empty($data) && $data == $header->idKota  ? TRUE : FALSE)); ?>><?= $header->kota ?></option>
												<?php foreach ($kota as $kota) { ?>
													<option value="<?= $kota->idKota ?>" <?php if ($header->idKota == $kota->idKota) { ?> selected="selected" <?php } ?> data-chained="<?= $kota->idProvinsi ?>"><?= $kota->kota ?> </option>
												<?php } ?>
											</select>
											<small class="text-danger"> <?= form_error('kota') ?></small>
										</div>
									</div>
									<div class="col-md-12">
										<div class=" m-b-20">
											<label class="col-form-label">Kecamatan:</label>
											<select class="combo col-md-12" id="kecamatan" name="kecamatan">
												<option value="<?= $header->idKecamatan ?>" selected readonly hidden <?php echo set_select('kecamatan', $header->idKecamatan, (!empty($data) && $data == $header->idKecamatan  ? TRUE : FALSE)); ?>><?= $header->kecamatan ?></option>
												<?php foreach ($kecamatan as $kecamatan) { ?>
													<option value="<?= $kecamatan->idKecamatan ?>" data-chained="<?= $kecamatan->idKota ?>"><?= $kecamatan->kecamatan ?></option>
												<?php } ?>
											</select>
											<small class="text-danger"> <?= form_error('kecamatan') ?></small>
										</div>
									</div>
									<div class="col-md-12">
										<div class=" m-b-20">
											<label class="col-form-label">Kelurahan / Desa:</label>
											<select class="combo col-md-12" id="kelurahan" name="kelurahan">
												<option value="<?= $header->idKelurahan ?>" selected readonly hidden <?php echo set_select('kel', $header->idKelurahan, (!empty($data) && $data == $header->idKelurahan  ? TRUE : FALSE)); ?>><?= $header->kelurahan ?></option>
												<?php foreach ($kelurahan as $kelurahan) { ?>
													<option value="<?= $kelurahan->idKelurahan ?>" data-chained="<?= $kelurahan->idKecamatan ?>"><?= $kelurahan->kelurahan ?></option>
												<?php } ?>
											</select>
											<small class="text-danger"> <?= form_error('kelurahan') ?></small>
										</div>
									</div>
									<div class="col-md-12">
										<div class=" m-b-20">
											<div class="form-group row">
												<label class="col-lg-3 col-form-label">Kode Pos:</label>
												<div class="col-lg-9">
													<input type="text" name="kodepos" class="form-control <?= form_error('kodepos') ? 'is-invalid' : null ?>" placeholder="Kode Pos" value="<?= $header->kodePos ?>">
													<small class="text-danger"> <?= form_error('kodepos') ?></small>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

				</div>
				<div class="text-right">
					<button type="submit" class="btn btn-primary">Simpan</button>
				</div>
			</div>
		</form>
	</div>
</div>
</div>
<script>
	// $(document).ready(function() {

	$("#kota").chained("#provinsi");
	$("#kecamatan").chained("#kota");
	$("#kelurahan").chained("#kecamatan");

	// });
</script>