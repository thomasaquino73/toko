<div class="row">
    <div class="col-md-9">
        <form action="" method="post">
            <div class="card-box">
                <div class="row">
                    <input type="hidden" name="konsumen_id" value="<?= $header->idKonsumen ?>">

                    <div class="col-md-12">
                        <h4 class="card-title">Ubah Data Konsumen</h4>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label"> Nama Toko / Konsumen<span class="text-danger">*</span></label>
                            <div class="col-lg-9">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" name="namakonsumen" placeholder="Nama Toko / Konsumen" style="text-transform:uppercase" class="form-control " value="<?= $this->input->post('namakonsumen') ?? $header->namaKonsumen ?>">
                                        <small class="text-danger"> <?= form_error('namakonsumen') ?></small>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Kontak <span class="text-danger">*</span></label>
                            <div class="col-lg-9">
                                <input type="text" name="namakontak" class="form-control" placeholder="Nama Kontak" value="<?= $header->kontak ?>" style="text-transform:uppercase">
                                <small class="text-danger"> <?= form_error('namakontak') ?></small>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Nomor Telp <span class="text-danger">*</span></label>
                            <div class="col-md-9">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="sizing-addon2">+62</span>
                                    </div>
                                    <input type="number" name="notel" class="form-control" placeholder="contoh : 08xxxxxxx" value="<?= $header->noTel ?>">
                                </div>
                                <small class="text-danger"> <?= form_error('notel') ?></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Kategori<span class="text-danger">*</span></label>
                            <div class="col-md-9">
                                <select class="combo col-md-12 <?= form_error('kategori') ? 'is-invalid' : null ?>" id="kategori" name="kategori" style="">
                                    <option selected hidden <?php echo set_select('kategori', $header->kategori, (!empty($data) && $data == $header->kategori  ? TRUE : FALSE)); ?>><?= $header->kategori ?></option>
                                    <option value="Agen" <?php echo set_select('kategori', 'Agen', (!empty($data) && $data ==  'Agen' ? TRUE : FALSE)); ?>> Agen</option>
                                    <option value="Retail" <?php echo set_select('kategori', 'Retail', (!empty($data) && $data == 'Retail' ? TRUE : FALSE)); ?>> Retail</option>
                                    <option value="Umum" <?php echo set_select('kategori', 'Umum', (!empty($data) && $data == 'Umum' ? TRUE : FALSE)); ?>> Umum</option>
                                </select>
                                <small class="text-danger"> <?= form_error('kategori') ?></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Alamat Lengkap:</label>
                            <div class="col-lg-9">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class=" m-b-20">
                                            <input type="text" style="text-transform:uppercase" class="form-control " name="alamatlengkap" placeholder="masukkan alamat lengkap" value="<?= $header->alamatLengkap ?>">
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
                                                    <input type="text" name="kodepos" class="form-control" placeholder="Kode Pos" value="<?= $header->kodePos ?>">
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
                    <a href="<?= base_url() ?>master-data/konsumen" class="btn btn-danger">Batal</a>
                </div>
            </div>
        </form>
    </div>
</div>
</div>