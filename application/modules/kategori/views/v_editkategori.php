<div class="row">
    <div class="col-md-8">
        <form action="" method="post">
            <input type="hidden" name="kategori_id" value="<?= $header->idKategori ?>">

            <div class="card-box">
                <div class="row">

                    <div class="col-md-12">
                        <h4 class="card-title">Ubah Data Kategori</h4>
                        <div class="form-group row ">
                            <label class="col-lg-5 col-form-label">Kategori<span class="text-danger">*</span></label>
                            <div class="col-lg-7">
                                <input type="text" name="namakategori" style="text-transform:uppercase;" placeholder="Satuan Barang" class="form-control <?= form_error('namakategori') ? 'is-invalid' : null ?>" value="<?= $this->input->post('namakategori') ?? $header->namaKategori ?>">
                                <small class="text-danger"> <?= form_error('namakategori') ?></small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-right">
                    <button type="submit" class="btn btn-primary">Ubah</button>
                    <a href="<?= base_url() ?>barang/satuan" class="btn btn-danger">Batal</a>
                </div>
            </div>
        </form>
    </div>
</div>
</div>