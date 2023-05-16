<div class="row">
    <div class="col-md-8">
        <form action="<?= base_url() ?>barang/kategori/save" method="post">
            <div class="card-box">
                <div class="row">

                    <div class="col-md-12">
                        <h4 class="card-title">Tambah Data Kategori</h4>
                        <div class="form-group row ">
                            <label class="col-lg-5 col-form-label">Kategori<span class="text-danger">*</span></label>
                            <div class="col-lg-7">
                                <input type="text" name="namakategori" style="text-transform:uppercase;" placeholder="Kategori Barang" class="form-control <?= form_error('namakategori') ? 'is-invalid' : null ?>" value="<?= set_value('namakategori') ?>">
                                <small class="text-danger"> <?= form_error('namakategori') ?></small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-right">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="<?= base_url() ?>barang/kategori" class="btn btn-danger">Batal</a>
                </div>
            </div>
        </form>
    </div>
</div>
</div>