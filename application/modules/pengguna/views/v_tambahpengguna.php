<div class="row">
    <div class="col-md-12">
        <!-- <form action="<?= base_url() ?>master-data/pengguna/save" method="post"> -->
        <form action="" method="post">
            <div class="card-box">
                <div class="row">
                    <div class="col-md-6">
                        <h4 class="card-title">Tambah Data Pengguna</h4>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Nama Karyawan:</label>
                            <div class="col-lg-9">
                                <div class="row">
                                    <div class="col-md-12">
                                        <select class="combo col-md-12 " name="karyawan">
                                            <?php foreach ($karyawan as $karyawan) { ?>
                                                <option value="<?= $karyawan->idKaryawan ?>"> <?= $karyawan->namaLengkap ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Username:</label>
                            <div class="col-lg-9">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" name="username" placeholder="Username" class="form-control <?= form_error('username') ? 'is-invalid' : null ?>" value="<?= set_value('username') ?>">
                                        <small class="text-danger"> <?= form_error('username') ?></small>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Password:</label>
                            <div class="col-lg-9">
                                <input type="password" name="password" class="form-control <?= form_error('password') ? 'is-invalid' : null ?>" placeholder="">
                                <small>minimal 5 karakter</small>
                                <small class="text-danger"> <?= form_error('password') ?></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Konfirmasi Password:</label>
                            <div class="col-lg-9">
                                <input type="password" name="password1" class="form-control <?= form_error('password1') ? 'is-invalid' : null ?>" placeholder="">
                                <small>minimal 5 karakter</small>
                                <small class="text-danger"> <?= form_error('password1') ?></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class=" col-lg-3 display-block">Status</label>
                            <div class="col-lg-9">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="statusaktif" id="status_aktif" value="Aktif" checked>
                                    <label class="form-check-label" for="employee_active">
                                        Aktif
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="statusaktif" id="status_inactive" value="Tidak Aktif">
                                    <label class="form-check-label" for="employee_inactive">
                                        Tidak Aktif
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class=" col-lg-3 display-block">Role</label>
                            <div class="col-lg-9">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="role" id="role" value="0" checked>
                                    <label class="form-check-label" for="">
                                        Operator
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="role" id="role" value="1">
                                    <label class="form-check-label" for="">
                                        Administrator
                                    </label>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="text-right">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="<?= base_url() ?>master-data/pengguna" class="btn btn-danger">Batal</a>
                </div>
            </div>
        </form>
    </div>
</div>
</div>