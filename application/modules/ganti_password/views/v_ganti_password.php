<div class="row">
	<div class="col-md-6 offset-md-3">
		<h4 class="page-title">Ganti Password</h4>
		<?php if ($this->session->flashdata('sukses')) { ?>
			<div class="alert alert-success alert-dismissible fade show" role="alert">
				<strong>Success!</strong> <?= $this->session->flashdata('sukses') ?>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
		<?php }; ?>
		<?php if ($this->session->flashdata('error')) { ?>
			<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<strong>Error!</strong> <?= $this->session->flashdata('error') ?>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
		<?php }; ?>
		<form class=" form-horizontal" method="POST" action="<?= base_url() ?>pengaturan/ganti-password">
			<div class="row">
				<div class="col-sm-12">
					<div class="form-group">
						<label>Username</label>
						<input type="text" name="username" class="form-control" value="<?= $this->session->userdata('username') ?>">
						<!-- <input type="hidden" name="old_p" class="form-control" value="6"> -->
						<?= form_error('username', '<small class="text-danger">', '</small>') ?>

					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<div class="form-group">
						<label>Password Lama</label>
						<input type="password" name="old_pass" class="form-control">
						<?= form_error('old_pass', '<small class="text-danger">', '</small>') ?>

					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<div class="form-group">
						<label>Password Baru</label>
						<input type="password" name="new_pass" class="form-control">
						<?= form_error('new_pass', '<small class="text-danger ">', '</small>') ?>

					</div>
				</div>
				<div class="col-sm-6">
					<div class="form-group">
						<label>Konfirmasi password</label>
						<input type="password" name="new_pass1" class="form-control">
						<?= form_error('new_pass1', '<small class="text-danger ">', '</small>') ?>

					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12 text-center m-t-20">
					<button type="submit" class="btn btn-primary submit-btn">Update Password</button>
				</div>
			</div>
		</form>
	</div>
</div>