<ul>
	<li>
		<a href="<?= base_url() ?>"><i class="fa fa-home back-icon"></i> <span>Kembali ke beranda</span></a>
	</li>
	<li class="menu-title">Settings</li>
	<li <?php if ($this->uri->segment(2) == "perusahaan") {
			echo 'class="active"';
		} else {
			echo 'class=" "';
		} ?>>
		<a href="<?= base_url() ?>pengaturan/perusahaan"><i class="fa fa-building"></i> <span>Perusahaan</span></a>
	</li>
	<li <?php if ($this->uri->segment(2) == "hak-akses") {
			echo 'class="active"';
		} else {
			echo 'class=" "';
		} ?>>
		<a href="<?= base_url() ?>pengaturan/hak-akses"><i class="fa fa-key"></i> <span>Grup & Hak Akses</span></a>
	</li>
	<li <?php if ($this->uri->segment(2) == "ganti-password") {
			echo 'class="active"';
		} else {
			echo 'class=" "';
		} ?>>
		<a href="<?= base_url() ?>pengaturan/ganti-password"><i class="fa fa-lock"></i> <span>Ganti Password</span></a>
	</li>
	<li <?php if ($this->uri->segment(2) == "lokasi") {
			echo 'class="active"';
		} else {
			echo 'class=" "';
		} ?>>
		<a href="<?= base_url() ?>pengaturan/lokasi"><i class="fa fa-map-o"></i> <span>Lokasi</span></a>
	</li>
</ul>