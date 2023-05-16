<div class="col-lg-8 offset-lg-2">
    <form method="post" action="<?= base_url() ?>karyawan/grup-departemen/simpan">
        <h4>Tambah Grup Departemen </h4>
        <div class="form-group row">
            <label class="col-lg-3 col-form-label">Nama Departemen <span class="text-danger">*</span></label>
            <div class="col-lg-9">
                <input class="form-control" type="text" name="departemen" value="">
                <small class="text-danger"> <?= form_error('departemen') ?></small>

            </div>
        </div>

        <div class="m-t-20 text-center">
            <button type="submit" class="btn btn-primary submit-btn">Tambah</button>
            <a href="<?= base_url() ?>master-data/departemen" type="button" class="btn btn-danger submit-btn">Batal</a>
        </div>
    </form>
</div>