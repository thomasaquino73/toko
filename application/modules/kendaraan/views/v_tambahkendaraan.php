<div class="row">
    <div class="col-md-8">
        <form action="<?= base_url() ?>kendaraan/save" method="post">
            <div class="card-box">
                <div class="row">

                    <div class="col-md-12">
                        <h4 class="card-title">Tambah Data Kendaraan</h4>
                        <div class="form-group row ">
                            <label class="col-lg-5 col-form-label">Kode / Plat Kendaraan<span class="text-danger">*</span></label>
                            <div class="col-lg-7">
                                <input type="text" name="kodekendaraan" style="text-transform:uppercase;" placeholder="Kode / Plat Kendaraan" class="form-control <?= form_error('kodekendaraan') ? 'is-invalid' : null ?>" value="<?= set_value('kodekendaraan') ?>">
                                <small class="text-danger"> <?= form_error('kodekendaraan') ?></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-5 col-form-label">Merk <span class="text-danger">*</span></label>
                            <div class="col-lg-7">
                                <input type="text" name="merkkendaraan" style="text-transform:uppercase;" class="form-control <?= form_error('merkkendaraan') ? 'is-invalid' : null ?>" placeholder="Merk Kendaraan" value="<?= set_value('merkkendaraan') ?>">
                                <small class="text-danger"> <?= form_error('merkkendaraan') ?></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-5 col-form-label">Nomor Rangka </label>
                            <div class="col-lg-7">
                                <input type="text" name="norangka" style="text-transform:uppercase;" class="form-control <?= form_error('norangka') ? 'is-invalid' : null ?>" placeholder="Nomor Rangka" value="<?= set_value('norangka') ?>">
                                <small class="text-danger"> <?= form_error('norangka') ?></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-5 col-form-label">Nomor Mesin </label>
                            <div class="col-lg-7">
                                <input type="text" name="nomesin" style="text-transform:uppercase;" class="form-control <?= form_error('nomesin') ? 'is-invalid' : null ?>" placeholder="Nomor Mesin" value="<?= set_value('nomesin') ?>">
                                <small class="text-danger"> <?= form_error('nomesin') ?></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-5 col-form-label">Tipe </label>
                            <div class="col-lg-7">
                                <input type="text" name="tipe" style="text-transform:uppercase;" class="form-control <?= form_error('tipe') ? 'is-invalid' : null ?>" placeholder="Tipe Kendaraan" value="<?= set_value('tipe') ?>">
                                <small class="text-danger"> <?= form_error('tipe') ?></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-5 col-form-label">Jenis </label>
                            <div class="col-lg-7">
                                <input type="text" name="jenis" style="text-transform:uppercase;" class="form-control <?= form_error('jenis') ? 'is-invalid' : null ?>" placeholder="Jenis Kendaraan" value="<?= set_value('jenis') ?>">
                                <small class="text-danger"> <?= form_error('jenis') ?></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-5 col-form-label">model </label>
                            <div class="col-lg-7">
                                <input type="text" name="model" style="text-transform:uppercase;" class="form-control <?= form_error('model') ? 'is-invalid' : null ?>" placeholder="Model Kendaraan" value="<?= set_value('model') ?>">
                                <small class="text-danger"> <?= form_error('model') ?></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-5 col-form-label">Tahun Pembuatan </label>
                            <div class="col-lg-7">
                                <input type="number" name="tahunpembuatan" style="text-transform:uppercase;" class="form-control <?= form_error('tahunpembuatan') ? 'is-invalid' : null ?>" placeholder="Tahun Pembuatan" value="<?= set_value('tahunpembuatan') ?>">
                                <small class="text-danger"> <?= form_error('tahunpembuatan') ?></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-5 col-form-label">Isi Silinder </label>
                            <div class="col-lg-7 input-group">
                                <input type="number" name="isisilinder" style="text-transform:uppercase;" class="form-control <?= form_error('isisilinder') ? 'is-invalid' : null ?>" placeholder="Isi Silinder" value="<?= set_value('isisilinder') ?>">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="sizing-addon2">CC</span>
                                </div>
                                <small class="text-danger"> <?= form_error('isisilinder') ?></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-5 col-form-label">Warna </label>
                            <div class="col-lg-7">
                                <input type="text" name="warna" style="text-transform:uppercase;" class="form-control <?= form_error('warna') ? 'is-invalid' : null ?>" placeholder="Warna" value="<?= set_value('warna') ?>">
                                <small class="text-danger"> <?= form_error('warna') ?></small>
                            </div>
                        </div>



                    </div>

                </div>
                <div class="text-right">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="<?= base_url() ?>kendaraan" class="btn btn-danger">Batal</a>
                </div>
            </div>
        </form>
    </div>
</div>
</div>
<script>
    // $(document).ready(function() {

    $("#kota").chained("#provinsi");
    $("#kecamatan").chained("#kota");
    $("#kelurahan").chained("#kecamatan");

    // });
</script>