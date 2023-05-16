<div class="row">
    <div class="col-md-8">
        <form action="<?= base_url() ?>barang/daftar-barang/save" method="post">
            <div class="card-box">
                <div class="row">

                    <div class="col-md-12">
                        <h4 class="card-title">Tambah Data Barang</h4>
                        <div class="form-group row ">
                            <label class="col-lg-4 col-form-label">Barcode / Kode Barang<span class="text-danger">*</span></label>
                            <div class="col-lg-8">
                                <input type="text" name="barcode" style="text-transform:uppercase;" placeholder="Barcode" class="form-control <?= form_error('barcode') ? 'is-invalid' : null ?>" value="<?= set_value('barcode') ?>">
                                <small class="text-danger"> <?= form_error('barcode') ?></small>
                            </div>
                        </div>
                        <div class="form-group row ">
                            <label class="col-lg-4 col-form-label">Nama Barang<span class="text-danger">*</span></label>
                            <div class="col-lg-8">
                                <input type="text" name="namabarang" style="text-transform:uppercase;" placeholder="Nama Barang" class="form-control <?= form_error('namabarang') ? 'is-invalid' : null ?>" value="<?= set_value('namabarang') ?>">
                                <small class="text-danger"> <?= form_error('namabarang') ?></small>
                            </div>
                        </div>
                        <div class="form-group row ">
                            <label class="col-lg-4 col-form-label">Harga Jual<span class="text-danger">*</span></label>
                            <div class="col-lg-8">
                                <input type="number" name="hargajual" style="text-transform:uppercase;" placeholder="Harga Jual" class="form-control <?= form_error('hargajual') ? 'is-invalid' : null ?>" value="<?= set_value('hargajual') ?>">
                                <small class="text-danger"> <?= form_error('hargajual') ?></small>
                            </div>
                        </div>
                        <div class="form-group row ">
                            <label class="col-lg-4 col-form-label">Kategori<span class="text-danger">*</span></label>
                            <div class="col-lg-8">
                                <select name="kategori" class="combo col-lg-12">
                                    <option value="" selected hidden disabled>Pilih...</option>
                                    <?php foreach ($kategori as $kategori) { ?>
                                        <option value="<?= $kategori->idKategori ?>"><?= $kategori->namaKategori ?></option>
                                    <?php } ?>
                                </select>
                                <small class="text-danger"> <?= form_error('satuan') ?></small>
                            </div>
                        </div>
                        <div class="form-group row ">
                            <label class="col-lg-4 col-form-label">Satuan<span class="text-danger">*</span></label>
                            <div class="col-lg-8">
                                <select name="satuan" class="combo col-lg-12">
                                    <option value="" selected hidden disabled>Pilih...</option>
                                    <?php foreach ($satuan as $satuan) { ?>
                                        <option value="<?= $satuan->idSatuan ?>"><?= $satuan->namaSatuan ?></option>
                                    <?php } ?>
                                </select>
                                <small class="text-danger"> <?= form_error('satuan') ?></small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-right">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="<?= base_url() ?>barang/daftar-barang" class="btn btn-danger">Batal</a>
                </div>
            </div>
        </form>
    </div>
</div>
</div>