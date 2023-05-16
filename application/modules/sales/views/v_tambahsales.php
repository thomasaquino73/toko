<div class="row">
    <div class="col-md-8">
        <form action="" method="post">
            <!-- <form action="<?= base_url() ?>master-data/karyawan/save" method="post"> -->
            <div class="card-box">
                <div class="row">

                    <div class="col-md-12">
                        <h4 class="card-title">Tambah Data Sales</h4>
                        <div class="form-group row ">
                            <label class="col-lg-3 col-form-label">Nama Sales<span class="text-danger">*</span></label>
                            <div class="col-lg-9">
                                <select class="combo col-md-12" id="namasales" name="namasales" style="">
                                    <option selected disabled hidden>Pilih Sales</option>
                                    <?php foreach ($sales as $sales) { ?>
                                        <option value="<?= $sales->idKaryawan ?>" <?php echo set_select('namasales', $sales->idKaryawan, (!empty($data) && $data == $sales->idKaryawan ? TRUE : FALSE)); ?>> <?= $sales->namaLengkap ?></option>
                                    <?php } ?>

                                </select>
                                <small class="text-danger"> <?= form_error('namasales') ?></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Jabatan <span class="text-danger">*</span></label>
                            <div class="col-lg-9">
                                <input type="text" name="keterangan" style="text-transform:uppercase;" class="form-control <?= form_error('keterangan') ? 'is-invalid' : null ?>" placeholder="Jabatan" value="<?= set_value('keterangan') ?>">
                                <small class="text-danger"> <?= form_error('keterangan') ?></small>
                            </div>
                        </div>


                    </div>
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="<?= base_url() ?>sales" class="btn btn-danger">Batal</a>
                    </div>
                </div>
        </form>
    </div>
</div>
</div>