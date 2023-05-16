<div class="row">
    <div class="col-md-8">
        <form action="<?= base_url() ?>master-data/karyawan/update" method="post">
            <div class="card-box">
                <div class="row">
                    <input type="hidden" name="id" value="<?= $header->idKaryawan ?>">

                    <div class="col-md-12">
                        <h4 class="card-title">Ubah Data Karyawan</h4>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label"> Nama <span class="text-danger">*</span></label>
                            <div class="col-lg-9">
                                <input type="text" name="namalengkap" placeholder="Nama Lengkap" class="form-control" value="<?= $this->input->post('namalengkap') ?? $header->namaLengkap ?><?= set_value('namalengkap') ?>">
                                <small class="text-danger"> <?= form_error('namalengkap') ?></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Nama Panggilan <span class="text-danger">*</span></label>
                            <div class="col-lg-9">
                                <input type="text" name="namapanggilan" class="form-control" placeholder="Nama Panggilan" value="<?= $header->namaPanggilan ?><?= set_value('namapanggilan') ?>">
                                <small class="text-danger"> <?= form_error('namapanggilan') ?></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Tempat Lahir</label>
                            <div class="col-lg-9">
                                <input type="text" name="tempatlahir" class="form-control" placeholder="Tempat Lahir" value="<?= $header->tempatLahir ?><?= set_value('tempatlahir') ?>">
                                <small class="text-danger"> <?= form_error('tempatlahir') ?></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Tanggal Lahir</label>
                            <div class="col-lg-9">
                                <div class="cal-icon">
                                    <input name="tanggallahir" class="form-control datetimepicker" type="text" value="<?= date('d-m-Y', strtotime($header->tanggalLahir)) ?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Nomor Telp <span class="text-danger">*</span></label>
                            <div class="col-md-9">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="sizing-addon2">+62</span>
                                    </div>
                                    <input type="number" name="notel" class="form-control" placeholder="contoh : 08xxxxxxx" value="<?= $header->noTel ?><?= set_value('notel') ?>">
                                </div>
                                <small class="text-danger"> <?= form_error('notel') ?></small>
                            </div>
                        </div>
                        <div class="form-group row gender-select">
                            <label class="col-lg-3 gen-label">Jenis Kelamin</label>
                            <div class="col-md-9">
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" name="gender" value="Pria" class="form-check-input" <?php if ($header->jenisKelamin == "Pria") {
                                                                                                                    echo "checked";
                                                                                                                } ?>>Pria
                                    </label>
                                </div>
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" name="gender" value="Wanita" class="form-check-input" <?php if ($header->jenisKelamin == "Wanita") {
                                                                                                                        echo "checked";
                                                                                                                    } ?>>Wanita
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Email:</label>
                            <div class="col-lg-9">
                                <input type="email" name="email" class="form-control" placeholder="contoh : example@mail.com" value="<?= $header->email ?><?= set_value('email') ?>">
                                <small class="text-danger"> <?= form_error('email') ?></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Domisili:</label>
                            <div class="col-lg-9">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class=" m-b-20">
                                            <input type="text" class="form-control " name="alamatlengkap" placeholder="masukkan alamat lengkap" value="<?= $header->alamatLengkap ?><?= set_value('alamatlengkap') ?>">
                                            <small class="text-danger"> <?= form_error('alamatlengkap') ?></small>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class=" m-b-20">
                                            <label class=" col-form-label">Provinsi:</label>
                                            <select class="form-control combo col-md-12" id="provinsi" name="provinsi">
                                                <option value="<?= $header->idProvinsi ?>" selected readonly hidden <?php echo set_select('provinsi', $header->idProvinsi, (!empty($data) && $data == $header->idProvinsi  ? TRUE : FALSE)); ?>><?= $header->provinsi ?></option>
                                                <?php foreach ($provinsi as $provinsi) { ?>
                                                    <option value="<?= $provinsi->idProvinsi ?>" <?php if ($header->idProvinsi == $provinsi->idProvinsi) { ?> selected="selected" <?php } ?>><?= $provinsi->provinsi ?> </option>
                                                <?php } ?>
                                            </select>
                                            <small class="text-danger"> <?= form_error('provinsi') ?></small>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class=" m-b-20">
                                            <label class="col-form-label">Kabupaten / Kota:</label>
                                            <select class=" combo col-md-12" id="kota" name="kota">
                                                <option value="<?= $header->idKota ?>" selected readonly hidden <?php echo set_select('kota', $header->idKota, (!empty($data) && $data == $header->idKota  ? TRUE : FALSE)); ?>><?= $header->kota ?></option>
                                                <?php foreach ($kota as $kota) { ?>
                                                    <option value="<?= $kota->idKota ?>" <?php if ($header->idKota == $kota->idKota) { ?> selected="selected" <?php } ?> data-chained="<?= $kota->idProvinsi ?>"><?= $kota->kota ?> </option>
                                                <?php } ?>
                                            </select>
                                            <small class="text-danger"> <?= form_error('kota') ?></small>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class=" m-b-20">
                                            <label class="col-form-label">Kecamatan:</label>
                                            <select class="combo col-md-12" id="kecamatan" name="kecamatan">
                                                <option value="<?= $header->idKecamatan ?>" selected readonly hidden <?php echo set_select('kecamatan', $header->idKecamatan, (!empty($data) && $data == $header->idKecamatan  ? TRUE : FALSE)); ?>><?= $header->kecamatan ?></option>
                                                <?php foreach ($kecamatan as $kecamatan) { ?>
                                                    <option value="<?= $kecamatan->idKecamatan ?>" data-chained="<?= $kecamatan->idKota ?>"><?= $kecamatan->kecamatan ?></option>
                                                <?php } ?>
                                            </select>
                                            <small class="text-danger"> <?= form_error('kecamatan') ?></small>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class=" m-b-20">
                                            <label class="col-form-label">Kelurahan / Desa:</label>
                                            <select class="combo col-md-12" id="kelurahan" name="kelurahan">
                                                <option value="<?= $header->idKelurahan ?>" selected readonly hidden <?php echo set_select('kel', $header->idKelurahan, (!empty($data) && $data == $header->idKelurahan  ? TRUE : FALSE)); ?>><?= $header->kelurahan ?></option>
                                                <?php foreach ($kelurahan as $kelurahan) { ?>
                                                    <option value="<?= $kelurahan->idKelurahan ?>" data-chained="<?= $kelurahan->idKecamatan ?>"><?= $kelurahan->kelurahan ?></option>
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
                                                    <input type="text" name="kodepos" class="form-control" placeholder="Kode Pos" value="<?= $header->kodePos ?><?= set_value('kodepos') ?>">
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
                    <button type="submit" class="btn btn-info">Ubah</button>
                    <a href="<?= base_url() ?>master-data/karyawan" class="btn btn-danger">Batal</a>
                </div>
            </div>
        </form>
    </div>
</div>
</div>