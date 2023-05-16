<ul>
	<li <?php if ($this->uri->segment(1) == "dashboard" | $this->uri->segment(1) == "") {
			echo 'class="active"';
		} else {
			echo 'class=" "';
		} ?>>
		<a href="<?= base_url() ?>dashboard"><i class="fa fa-dashboard"></i> <span>Beranda</span></a>
	</li>
	<li class="menu-title">Master Data</li>
	<li <?php if ($this->uri->segment(2) == "karyawan") {
			echo 'class="active"';
		} else {
			echo 'class=" "';
		} ?>>
		<a href="<?= base_url() ?>master-data/karyawan"><i class="fa fa-users"></i> <span>karyawan</span></a>
	</li>
	<li <?php if ($this->uri->segment(2) == "pengguna") {
			echo 'class="active"';
		} else {
			echo 'class=" "';
		} ?>>
		<a href="<?= base_url() ?>master-data/pengguna"><i class="fa fa-users"></i> <span>Pengguna</span></a>
	</li>
	<li <?php if ($this->uri->segment(2) == "supplier") {
			echo 'class="active"';
		} else {
			echo 'class=" "';
		} ?>>
		<a href="<?= base_url() ?>master-data/supplier"><i class="fa fa-cubes"></i> <span>Supplier</span></a>
	</li>
	<li <?php if ($this->uri->segment(2) == "konsumen") {
			echo 'class="active"';
		} else {
			echo 'class=" "';
		} ?>>
		<a href="<?= base_url() ?>master-data/konsumen"><i class="fa fa-user"></i> <span>Konsumen</span></a>
	</li>
	<!-- <li <?php if ($this->uri->segment(1) == "sales") {
					echo 'class="active"';
				} else {
					echo 'class=" "';
				} ?>>
		<a href="<?= base_url() ?>sales"><i class="fa fa-user"></i> <span>Sales</span></a>
	</li>
	<li <?php if ($this->uri->segment(1) == "kendaraan") {
			echo 'class="active"';
		} else {
			echo 'class=" "';
		} ?>>
		<a href="<?= base_url() ?>kendaraan"><i class="fa fa-user"></i> <span>Kendaraan</span></a>
	</li> -->
	<li class="submenu">
		<a href="#" <?php if ($this->uri->segment(1) == "barang") {
						echo 'class=" active"';
					} else {
						echo 'class=" "';
					} ?>><i class="fa fa-cubes"></i> <span>Barang </span> <span class="menu-arrow"></span></a>
		<ul style="display: none;">
			<li <?php if ($this->uri->segment(2) == "daftar-barang") {
					echo 'class=" active"';
				} else {
					echo 'class=" "';
				} ?>><a href="javascript:void(0);">Daftar Barang</a></li>
			<li <?php if ($this->uri->segment(2) == "satuan") {
					echo 'class=" active"';
				} else {
					echo 'class=" "';
				} ?>><a href="<?= base_url() ?>barang/satuan">Satuan</a></li>
		</ul>
	</li>
	<li class="menu-title">Transaksi</li>
	<li <?php if ($this->uri->segment(2) == "pembelian") {
			echo 'class="active"';
		} else {
			echo 'class=""';
		} ?>>
		<a href="<?= base_url() ?>pembelian"><i class="fa fa-users"></i> <span>Pembelian</span></a>
	</li>
	<li <?php if ($this->uri->segment(1) == "penjualan") {
			echo 'class="active"';
		} else {
			echo 'class=" "';
		} ?>>
		<a href="<?= base_url() ?>penjualan"><i class="fa fa-shopping-cart"></i> <span>Penjualan</span></a>
	</li>
	<li <?php if ($this->uri->segment(1) == "invoice") {
			echo 'class="active"';
		} else {
			echo 'class=" "';
		} ?>>
		<a href="<?= base_url() ?>invoice"><i class="fa fa-credit-card"></i> <span>Invoice</span></a>
	</li>
	<li class="menu-title">Laporan</li>

	<li>
		<a href="<?= base_url() ?>pengaturan"><i class="fa fa-cog"></i> <span>Pengaturan</span></a>
	</li>
	<li>
		<a href=" https://api.whatsapp.com/send/?phone=6281299097474"> <i class="fa fa-whatsapp"></i></i> <span>Bantuan</span></a>
	</li>
</ul>