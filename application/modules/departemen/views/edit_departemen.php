<div class="col-lg-8 offset-lg-2">
    <form method="post" action="<?= base_url() ?>karyawan/grup-departemen/ubah-grup">
        <?php foreach ($list as $list) { ?>
            <h4>Ubah Departemen </h4>
            <div class="form-group row">
                <label class="col-lg-3 col-form-label">Departemen <span class="text-danger">*</span></label>
                <div class="col-lg-9">
                    <input class="form-control" type="text" name="departemen" value="<?= $list->departemen ?>">
                    <input class="form-control" type="hidden" name="id" value="<?= $list->idDepartemen ?>" readonly>
                </div>
            </div>
        <?php } ?>

        <div class="m-t-20 text-center">
            <button type="submit" class="btn btn-primary submit-btn">Ubah</button>
            <a href="<?= base_url() ?>master-data/departemen" type="button" class="btn btn-danger submit-btn">Batal</a>
        </div>
    </form>
</div>