<div class="row">
	<div class="col-md-6 offset-md-3">
		<h4 class="page-title">Ganti Password</h4>
		<?php if ($this->session->flashdata('sukses')) { ?>
			<div class="alert alert-success alert-dismissible fade show" role="alert">
				<strong>Success!</strong> <?= $this->session->flashdata('sukses') ?>

			</div>
		<?php }; ?>


	</div>
</div>