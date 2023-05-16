<div class="row">
    <div class="col-md-6">
        <form action="" method="post">
            <input type="hidden" name="user_id" value="<?= $header->idUsers ?>">
            <div class="card-box">
                <div class="row">
                    <div class="col-md-12">
                        <h4 class="card-title">Data Pengguna</h4>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Nama Karyawan:</label>
                            <div class="col-lg-9">
                                <div class="row">
                                    <div class="col-md-12">
                                        <select class="combo col-md-12 " disabled>
                                            <option value="<?= $header->idKaryawan ?>"> <?= $header->namaLengkap ?></option>
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
                                        <input type="text" name="username" placeholder="Username" class="form-control" value="<?= $this->input->post('username') ?? $header->username ?>">
                                        <small class="text-danger"> <?= form_error('username') ?></small>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Password:</label>
                            <div class="col-lg-9">
                                <input type="password" name="password" class="form-control" placeholder="" value="<?= $this->encryption->decrypt($header->password) ?>">
                                <small>minimal 5 karakter</small>
                                <small class="text-danger"> <?= form_error('password') ?></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Konfirmasi Password:</label>
                            <div class="col-lg-9">
                                <input type="password" name="password1" class="form-control" value="<?= $this->encryption->decrypt($header->password) ?>">
                                <small>minimal 5 karakter</small>
                                <small class="text-danger"> <?= form_error('password1') ?></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 display-block">Status</label>
                            <div class="col-lg-9">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="statusaktif" id="status_aktif" value="Aktif" <?php if ($header->statusAktif == 'Aktif') {
                                                                                                                                        echo "checked";
                                                                                                                                    } ?>>
                                    <label class="form-check-label" for="employee_active">
                                        Aktif
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="statusaktif" id="status_inactive" value="Tidak Aktif" <?php if ($header->statusAktif == 'Tidak Aktif') {
                                                                                                                                                    echo "checked";
                                                                                                                                                } ?>>
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
                                    <input class="form-check-input" type="radio" name="role" id="role" value="0" <?php if ($header->role == 0) {
                                                                                                                        echo "checked";
                                                                                                                    } ?>>
                                    <label class="form-check-label" for="">
                                        Operator
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="role" id="role" value="1" <?php if ($header->role == 1) {
                                                                                                                        echo "checked";
                                                                                                                    } ?>>
                                    <label class="form-check-label" for="">
                                        Administrator
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="text-right">
                    <button type="submit" class="btn btn-info">Ubah</button>
                    <a href="<?= base_url() ?>master-data/pengguna" class="btn btn-danger">Batal</a>
                </div>
            </div>
        </form>
    </div>
</div>
</div>