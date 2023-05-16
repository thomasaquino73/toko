<div class="col-lg-8 offset-lg-2">
    <form method="post" action="<?= base_url() ?>karyawan/grup-departemen/ubah">
        <?php foreach ($list as $list) { ?>
            <h4>Ubah Departemen </h4>
            <div class="form-group row">
                <label class="col-lg-3 col-form-label">Nama Karyawan <span class="text-danger">*</span></label>
                <div class="col-lg-9">
                    <input class="form-control" type="text" value="<?= $list->namaLengkap ?>" readonly>
                    <input class="form-control" type="hidden" name="id" value="<?= $list->idKaryawan ?>" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-lg-3 col-form-label">Nama Departemen <span class="text-danger">*</span></label>
                <div class="col-lg-9">
                    <select name="departemen" id="departemen" class="select" style="width:100%">
                        <option value="<?= $list->idDepartemen ?>" selected hidden disabled <?php echo set_select('departemen', $list->idDepartemen, (!empty($data) && $data == $list->idDepartemen  ? TRUE : FALSE)); ?>><?= $list->departemen ?></option>
                        <?php foreach ($departemen as $departemen) { ?>
                            <option value="<?= $departemen->idDepartemen ?>"><?= $departemen->departemen ?></option>

                        <?php } ?>
                    </select>
                <?php } ?>
                </div>
            </div>
            <div class="m-t-20 text-center">
                <button type="submit" class="btn btn-primary submit-btn">Ubah</button>
                <a href="<?= base_url() ?>master-data/departemen" type="button" class="btn btn-danger submit-btn">Batal</a>
            </div>
    </form>
</div>