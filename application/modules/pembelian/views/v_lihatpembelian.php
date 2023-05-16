<div class="row">
    <div class="col-sm-5 col-4">
        <h4 class="page-title">Purchase Order</h4>
    </div>
    <div class="col-sm-7 col-8 text-right m-b-30">
        <div class="btn-group btn-group-sm">
            <button class="btn btn-white">CSV</button>
            <button class="btn btn-white">PDF</button>
            <button class="btn btn-white"><i class="fa fa-print fa-lg"></i> Print</button>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="row custom-invoice">
                    <div class="col-6 col-sm-6 m-b-20">
                        <img src="<?= base_url('assets/img/logo/') . $konfigurasi->logo ?>" class="inv-logo" alt="">
                        <ul class="list-unstyled">
                            <li style="text-transform:uppercase"><?= $konfigurasi->namaPerusahaan ?></li>
                            <li><?= $konfigurasi->alamatLengkap ?>,</li>
                            <li><?= $konfigurasi->kelurahan ?>, <?= $konfigurasi->kecamatan ?>, <?= $konfigurasi->kota ?>, </li>
                            <li><?= $konfigurasi->provinsi ?>, <?= $konfigurasi->kodePos ?></li>
                        </ul>
                    </div>
                    <div class="col-6 col-sm-6 m-b-20">
                        <div class="invoice-details">
                            <h3 class="text-uppercase">Purchase Order #<?= $header->noPo ?></h3>
                            <ul class="list-unstyled">
                                <li>Tanggal: <span><?= date('d', strtotime($header->date)) ?> <?= date('M', strtotime($header->date)) ?>, <?= date('Y', strtotime($header->date)) ?></span></li>
                                <li>Pembayaran: <span><?= $header->pembayaran ?></span></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 col-lg-6 m-b-20">

                        <h5>Kepada Yth:</h5>
                        <ul class="list-unstyled">
                            <li>
                                <h5><strong><?= $header->namaperusahaan ?></strong></h5>
                            </li>
                            <li><?= $header->kelurahan ?>,<?= $header->kecamatan ?></li>
                            <li><?= $header->kota ?>, <?= $header->provinsi ?>, <?= $header->kodePos ?></li>
                            <li><?= $header->noTel ?></li>
                            <li><?= $header->kontak ?></li>
                        </ul>

                    </div>

                </div>
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>KODE - NAMA BARANG</th>
                                <th>JUMLAH</th>
                                <th>HARGA</th>
                                <th>SUB TOTAL</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            $gt = 0; ?>


                            <?php foreach ($detail as $dt) {

                                $subTotal = $dt->jumlahBarang * $dt->hargaBeli;
                                $gt = $gt + $subTotal; ?>
                                <tr>
                                    <td>
                                        <?= $no++ ?>
                                    </td>
                                    <td>
                                        <?= $dt->barcode ?> - <?= $dt->namaBarang ?>
                                    </td>
                                    <td>
                                        <div class="row">
                                            <?= $dt->jumlahBarang ?> <?= $dt->namaSatuan ?>
                                        </div>
                                    </td>
                                    <td>Rp. <?= number_format($dt->hargaBeli, 0, ".", ",") ?></td>
                                    <td>Rp. <?= number_format($subTotal, 0, ".", ",") ?></td>
                                    <!-- <td>
                                        <?= $button ?>
                                    </td> -->
                                </tr>
                            <?php } ?>

                        </tbody>
                    </table>
                </div>
                <div>
                    <div class="row invoice-payment">
                        <div class="col-sm-7">
                        </div>
                        <div class="col-sm-5">
                            <div class="m-b-20">
                                <div class="table-responsive no-border">
                                    <table class="table mb-0">
                                        <tbody>
                                            <tr>
                                                <th>Total:</th>
                                                <td class="text-right">Rp. <?= number_format($gt, 0, ".", ",") ?></td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="invoice-info">
                        <h5>Other information</h5>
                        <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sed dictum ligula, cursus blandit risus. Maecenas eget metus non tellus dignissim aliquam ut a ex. Maecenas sed vehicula dui, ac suscipit lacus. Sed finibus leo vitae lorem interdum, eu scelerisque tellus fermentum. Curabitur sit amet lacinia lorem. Nullam finibus pellentesque libero, eu finibus sapien interdum vel</p>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</div>