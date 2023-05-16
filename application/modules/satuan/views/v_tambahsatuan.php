<div class="row">
    <div class="col-md-8">
        <form action="<?= base_url() ?>barang/satuan/save" method="post">
            <div class="card-box">
                <div class="row">

                    <div class="col-md-12">
                        <h4 class="card-title">Tambah Data Satuan Barang</h4>
                        <div class="form-group row ">
                            <label class="col-lg-5 col-form-label">Satuan<span class="text-danger">*</span></label>
                            <div class="col-lg-7">
                                <input type="text" name="namasatuan" style="text-transform:uppercase;" placeholder="Satuan Barang" class="form-control <?= form_error('namasatuan') ? 'is-invalid' : null ?>" value="<?= set_value('namasatuan') ?>">
                                <small class="text-danger"> <?= form_error('namasatuan') ?></small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-right">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="<?= base_url() ?>barang/satuan" class="btn btn-danger">Batal</a>
                </div>
            </div>
        </form>
    </div>
</div>
</div>