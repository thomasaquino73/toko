<div class="row">
	<div class="col-md-4 col-sm-4 col-lg-4 col-xl-4">
		<div class="dash-widget">
			<span class="dash-widget-bg1"><i class="fa fa-cube" aria-hidden="true"></i></span>
			<div class="dash-widget-info text-right">
				<h3><?= $produk ?></h3>
				<span class="widget-title1">Produk <i class="fa fa-check" aria-hidden="true"></i></span>
			</div>
		</div>
	</div>
	<div class="col-md-4 col-sm-4 col-lg-4 col-xl-4">
		<div class="dash-widget">
			<span class="dash-widget-bg2"><i class="fa fa-users"></i></span>
			<div class="dash-widget-info text-right">
				<h3><?= $status ?></h3>
				<span class="widget-title2">Pengguna Aktif<i class="fa fa-check" aria-hidden="true"></i></span>
			</div>
		</div>
	</div>
	<div class="col-md-4 col-sm-4 col-lg-4 col-xl-4">
		<div class="dash-widget">
			<span class="dash-widget-bg3"><i class="fa fa-handshake-o" aria-hidden="true"></i></span>
			<div class="dash-widget-info text-right">
				<h3><?= $konsumen ?></h3>
				<span class="widget-title3">Konsumen <i class="fa fa-check" aria-hidden="true"></i></span>
			</div>
		</div>
	</div>
	<div class="col-md-4 col-sm-4 col-lg-4 col-xl-4">
		<div class="dash-widget">
			<span class="dash-widget-bg4"><i class="fa fa-building-o" aria-hidden="true"></i></span>
			<div class="dash-widget-info text-right">
				<h3><?= $supplier ?></h3>
				<span class="widget-title4">Supplier <i class="fa fa-check" aria-hidden="true"></i></span>
			</div>
		</div>
	</div>
</div>
<!-- <div class="row">
	<div class="col-12 col-md-6 col-lg-6 col-xl-6">
		<div class="card">
			<div class="card-body">
				<div class="chart-title">
					<h4>Patient Total</h4>
					<span class="float-right"><i class="fa fa-caret-up" aria-hidden="true"></i> 15% Higher than Last Month</span>
				</div>
				<canvas id="linegraph"></canvas>
			</div>
		</div>
	</div>
	<div class="col-12 col-md-6 col-lg-6 col-xl-6">
		<div class="card">
			<div class="card-body">
				<div class="chart-title">
					<h4>Patients In</h4>
					<div class="float-right">
						<ul class="chat-user-total">
							<li><i class="fa fa-circle current-users" aria-hidden="true"></i>ICU</li>
							<li><i class="fa fa-circle old-users" aria-hidden="true"></i> OPD</li>
						</ul>
					</div>
				</div>
				<canvas id="bargraph"></canvas>
			</div>
		</div>
	</div>
</div>
<!-- <div class="row">
	<div class="col-12 col-md-6 col-lg-8 col-xl-8">
		<div class="card">
			<div class="card-header">
				<h4 class="card-title d-inline-block">Sales Order</h4> <a href="appointments.html" class="btn btn-primary float-right">View all</a>
			</div>
			<div class="card-body p-0">
				<div class="table-responsive">
					<table class="table mb-0">
						<thead class="d-none">
							<tr>
								<th>Patient Name</th>
								<th>Doctor Name</th>
								<th>Timing</th>
								<th class="text-right">Status</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td style="min-width: 200px;">
									<a class="avatar" href="profile.html">P</a>
									<h2><a href="profile.html">PT. A<span>Tangerang</span></a></h2>
								</td>
								<td>
									<h5 class="time-title p-0">Tanggal Pengiriman</h5>
									<p>03-03-2023</p>
								</td>
								<td>
									<h5 class="time-title p-0">Tanggal Dibuat</h5>
									<p>03-03-2023</p>
								</td>
								<td>
									<h5 class="time-title p-0">Dibuat Oleh</h5>
									<p>Nama</p>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 col-md-6 col-lg-4 col-xl-4">
		<div class="card member-panel">
			<div class="card-header bg-white">
				<h4 class="card-title mb-0">Sales</h4>
			</div>
			<div class="card-body">
				<ul class="contact-list">
					<?php foreach ($sales as $sales) { ?>
						<li>
							<div class="contact-cont">
								<div class="float-left user-img m-r-10">
									<a href="<?= base_url() ?>" title="John Doe"><img src="<?= base_url() ?>assets/img/avatar_default.png" alt="" class="w-40 rounded-circle"><span class="status offline"></span></a>
								</div>
								<div class="contact-info">
									<span class="contact-name text-ellipsis"><?= $sales->namaLengkap ?></span>
									<span class="contact-date"><?= $sales->keterangan ?></span>
								</div>
							</div>
						</li>
					<?php } ?>
				</ul>
			</div>
			<div class="card-footer text-center bg-white">
				<a href="<?= base_url() ?>master-data/sales" class="text-muted">Lihat Semua</a>
			</div>
		</div>
	</div>
</div> -->
<!-- <div class="row">
	<div class="col-12 col-md-6 col-lg-8 col-xl-8">
		<div class="card">
			<div class="card-header">
				<h4 class="card-title d-inline-block">New Patients </h4> <a href="patients.html" class="btn btn-primary float-right">View all</a>
			</div>
			<div class="card-block">
				<div class="table-responsive">
					<table class="table mb-0 new-patient-table">
						<tbody>
							<tr>
								<td>
									<img width="28" height="28" class="rounded-circle" src="assets/img/user.jpg" alt="">
									<h2>John Doe</h2>
								</td>
								<td>Johndoe21@gmail.com</td>
								<td>+1-202-555-0125</td>
								<td><button class="btn btn-primary btn-primary-one float-right">Fever</button></td>
							</tr>
							<tr>
								<td>
									<img width="28" height="28" class="rounded-circle" src="assets/img/user.jpg" alt="">
									<h2>Richard</h2>
								</td>
								<td>Richard123@yahoo.com</td>
								<td>202-555-0127</td>
								<td><button class="btn btn-primary btn-primary-two float-right">Cancer</button></td>
							</tr>
							<tr>
								<td>
									<img width="28" height="28" class="rounded-circle" src="assets/img/user.jpg" alt="">
									<h2>Villiam</h2>
								</td>
								<td>Richard123@yahoo.com</td>
								<td>+1-202-555-0106</td>
								<td><button class="btn btn-primary btn-primary-three float-right">Eye</button></td>
							</tr>
							<tr>
								<td>
									<img width="28" height="28" class="rounded-circle" src="assets/img/user.jpg" alt="">
									<h2>Martin</h2>
								</td>
								<td>Richard123@yahoo.com</td>
								<td>776-2323 89562015</td>
								<td><button class="btn btn-primary btn-primary-four float-right">Fever</button></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 col-md-6 col-lg-4 col-xl-4">
		<div class="hospital-barchart">
			<h4 class="card-title d-inline-block">Hospital Management</h4>
		</div>
		<div class="bar-chart">
			<div class="legend">
				<div class="item">
					<h4>Level1</h4>
				</div>

				<div class="item">
					<h4>Level2</h4>
				</div>
				<div class="item text-right">
					<h4>Level3</h4>
				</div>
				<div class="item text-right">
					<h4>Level4</h4>
				</div>
			</div>
			<div class="chart clearfix">
				<div class="item">
					<div class="bar">
						<span class="percent">16%</span>
						<div class="item-progress" data-percent="16">
							<span class="title">OPD Patient</span>
						</div>
					</div>
				</div>
				<div class="item">
					<div class="bar">
						<span class="percent">71%</span>
						<div class="item-progress" data-percent="71">
							<span class="title">New Patient</span>
						</div>
					</div>
				</div>
				<div class="item">
					<div class="bar">
						<span class="percent">82%</span>
						<div class="item-progress" data-percent="82">
							<span class="title">Laboratory Test</span>
						</div>
					</div>
				</div>
				<div class="item">
					<div class="bar">
						<span class="percent">67%</span>
						<div class="item-progress" data-percent="67">
							<span class="title">Treatment</span>
						</div>
					</div>
				</div>
				<div class="item">
					<div class="bar">
						<span class="percent">30%</span>
						<div class="item-progress" data-percent="30">
							<span class="title">Discharge</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div> -->