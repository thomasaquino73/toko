<div class="row">
    <div class="col-md-8">
        <form action="<?= base_url() ?>purchase-order/tambah-supplier" method="post">
            <div class="card-box">
                <div class="row">

                    <div class="col-md-12">
                        <h4 class="card-title">Tambah Data Supplier</h4>
                        <div class="form-group row ">
                            <label class="col-lg-3 col-form-label">Nama Perusahaan<span class="text-danger">*</span></label>
                            <div class="col-lg-9">
                                <input type="text" name="namaperusahaan" style="text-transform:uppercase;" placeholder="Nama Perusahaan" class="form-control <?= form_error('namaperusahaan') ? 'is-invalid' : null ?>" value="<?= set_value('namaperusahaan') ?>">
                                <small class="text-danger"> <?= form_error('namaperusahaan') ?></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Kontak <span class="text-danger">*</span></label>
                            <div class="col-lg-9">
                                <input type="text" name="kontak" style="text-transform:uppercase;" class="form-control <?= form_error('kontak') ? 'is-invalid' : null ?>" placeholder="Nama Kontak" value="<?= set_value('kontak') ?>">
                                <small class="text-danger"> <?= form_error('kontak') ?></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Nomor Telp <span class="text-danger">*</span></label>
                            <div class="col-md-9">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="sizing-addon2">+62</span>
                                    </div>
                                    <input type="number" name="notel" class="form-control <?= form_error('notel') ? 'is-invalid' : null ?>" placeholder="contoh : 08xxxxxxx" value="<?= set_value('notel') ?>">
                                </div>
                                <small class="text-danger"> <?= form_error('notel') ?></small>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Alamat Perusahaan:</label>
                            <div class="col-lg-9">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class=" m-b-20">
                                            <input type="text" class="form-control <?= form_error('alamatlengkap') ? 'is-invalid' : null ?>" name="alamatlengkap" style="text-transform:uppercase;" placeholder="masukkan alamat lengkap" value="<?= set_value('alamatlengkap') ?>">
                                            <small class="text-danger"> <?= form_error('alamatlengkap') ?></small>
                                        </div>
                                    </div>
                                    <label class="col-lg-3 col-form-label">Provinsi:</label>

                                    <div class="col-md-12 m-b-20 ">
                                        <select class="combo col-md-12" id="provinsi" name="provinsi" style="">
                                            <option selected disabled hidden>Pilih Provinsi</option>
                                            <?php foreach ($provinsi as $provinsi) { ?>
                                                <option value="<?= $provinsi->idProvinsi ?>" <?php echo set_select('provinsi', $provinsi->idProvinsi, (!empty($data) && $data == $provinsi->idProvinsi ? TRUE : FALSE)); ?>> <?= $provinsi->provinsi ?></option>
                                            <?php } ?>

                                        </select>
                                        <small class="text-danger"> <?= form_error('provinsi') ?></small>
                                    </div>

                                    <div class="col-md-12">
                                        <div class=" m-b-20">
                                            <label class="col-form-label">Kabutapen / Kota:</label>
                                            <select class="combo col-md-12 " id="kota" name="kota">
                                                <option selected disabled hidden> Pilih Kota</option>
                                                <?php foreach ($kota as $kota) { ?>
                                                    <option value="<?= $kota->idKota ?>" <?php echo set_select('kota', $kota->idKota, (!empty($data) && $data == $kota->idKota ? TRUE : FALSE)); ?> data-chained="<?php echo $kota->idProvinsi ?>"> <?= $kota->kota ?></option>
                                                <?php } ?>
                                            </select>
                                            <small class="text-danger"> <?= form_error('kota') ?></small>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class=" m-b-20">
                                            <label class="col-form-label">Kecamatan:</label>
                                            <select class="combo col-md-12 <?= form_error('kecamatan') ? 'has-error' : null ?>" id="kecamatan" name="kecamatan" style="width:100%">
                                                <option selected disabled hidden>Pilih Kecamatan</option>
                                                <?php foreach ($kecamatan as $kecamatan) { ?>
                                                    <option value="<?= $kecamatan->idKecamatan ?>" <?php echo set_select('kecamatan', $kecamatan->idKecamatan, (!empty($data) && $data == $kecamatan->idKecamatan ? TRUE : FALSE)); ?> data-chained="<?php echo $kecamatan->idKota ?>" <?php echo set_select('kecamatan', $kecamatan->idKecamatan, (!empty($data) && $data == $kecamatan->idKecamatan ? TRUE : FALSE)); ?>> <?= $kecamatan->kecamatan ?></option>
                                                <?php } ?>
                                            </select>
                                            <small class="text-danger"> <?= form_error('kecamatan') ?></small>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class=" m-b-20">
                                            <label class="col-form-label">Kelurahan / Desa:</label>
                                            <select class="combo col-md-12 <?= form_error('kelurahan') ? 'has-error' : null ?>" id="kelurahan" name="kelurahan" style="width:100%">
                                                <option selected disabled hidden>Pilih Kelurahan</option>
                                                <?php foreach ($kelurahan as $kelurahan) { ?>
                                                    <option value="<?= $kelurahan->idKelurahan ?>" data-chained="<?php echo $kelurahan->idKecamatan ?>" <?php echo set_select('kelurahan', $kelurahan->idKelurahan, (!empty($data) && $data == $kelurahan->idKelurahan ? TRUE : FALSE)); ?>> <?= $kelurahan->kelurahan ?></option>
                                                <?php } ?>
                                            </select>
                                            <small class="text-danger"> <?= form_error('kelurahan') ?></small>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class=" m-b-20">
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Kode Pos:</label>
                                                <div class="col-lg-9">
                                                    <input type="text" name="kodepos" class="form-control <?= form_error('kodepos') ? 'is-invalid' : null ?>" placeholder="Kode Pos" value="<?= set_value('kodepos') ?>">
                                                    <small class="text-danger"> <?= form_error('kodepos') ?></small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="text-right">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="<?= base_url() ?>purchase-order" class="btn btn-danger">Batal</a>
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