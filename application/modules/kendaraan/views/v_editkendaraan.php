<div class="row">
    <div class="col-md-8">
        <form action="" method="post">
            <input type="hidden" name="kendaraan_id" value="<?= $header->idKendaraan ?>">
            <div class="card-box">
                <div class="row">

                    <div class="col-md-12">
                        <h4 class="card-title">Tambah Data Kendaraan</h4>
                        <div class="form-group row ">
                            <label class="col-lg-5 col-form-label">Kode / Plat Kendaraan<span class="text-danger">*</span></label>
                            <div class="col-lg-7">
                                <input type="text" name="kodekendaraan" style="text-transform:uppercase;" placeholder="Kode / Plat Kendaraan" class="form-control <?= form_error('kodekendaraan') ? 'is-invalid' : null ?>" value="<?= $this->input->post('kodekendaraan') ?? $header->kodeKendaraan ?>">
                                <small class=" text-danger"> <?= form_error('kodekendaraan') ?></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-5 col-form-label">Merk <span class="text-danger">*</span></label>
                            <div class="col-lg-7">
                                <input type="text" name="merkkendaraan" style="text-transform:uppercase;" class="form-control <?= form_error('merkkendaraan') ? 'is-invalid' : null ?>" placeholder="Merk Kendaraan" value="<?= $this->input->post('merkkendaraan') ?? $header->merkKendaraan ?>">
                                <small class=" text-danger"> <?= form_error('merkkendaraan') ?></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-5 col-form-label">Nomor Rangka </label>
                            <div class="col-lg-7">
                                <input type="text" name="norangka" style="text-transform:uppercase;" class="form-control <?= form_error('norangka') ? 'is-invalid' : null ?>" placeholder="Nomor Rangka" value="<?= $this->input->post('norangka') ?? $header->noRangka ?>">
                                <small class=" text-danger"> <?= form_error('norangka') ?></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-5 col-form-label">Nomor Mesin </label>
                            <div class="col-lg-7">
                                <input type="text" name="nomesin" style="text-transform:uppercase;" class="form-control <?= form_error('nomesin') ? 'is-invalid' : null ?>" placeholder="Nomor Mesin" value="<?= $this->input->post('nomesin') ?? $header->noMesin ?>">
                                <small class=" text-danger"> <?= form_error('nomesin') ?></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-5 col-form-label">Tipe </label>
                            <div class="col-lg-7">
                                <input type="text" name="tipe" style="text-transform:uppercase;" class="form-control <?= form_error('tipe') ? 'is-invalid' : null ?>" placeholder="Tipe Kendaraan" value="<?= $this->input->post('tipe') ?? $header->tipeKendaraan ?>">
                                <small class=" text-danger"> <?= form_error('tipe') ?></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-5 col-form-label">Jenis </label>
                            <div class="col-lg-7">
                                <input type="text" name="jenis" style="text-transform:uppercase;" class="form-control <?= form_error('jenis') ? 'is-invalid' : null ?>" placeholder="Jenis Kendaraan" value="<?= $this->input->post('jenis') ?? $header->jenisKendaraan ?>">
                                <small class=" text-danger"> <?= form_error('jenis') ?></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-5 col-form-label">model </label>
                            <div class="col-lg-7">
                                <input type="text" name="model" style="text-transform:uppercase;" class="form-control <?= form_error('model') ? 'is-invalid' : null ?>" placeholder="Model Kendaraan" value="<?= $this->input->post('model') ?? $header->modelKendaraan ?>">
                                <small class=" text-danger"> <?= form_error('model') ?></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-5 col-form-label">Tahun Pembuatan </label>
                            <div class="col-lg-7">
                                <input type="number" name="tahunpembuatan" style="text-transform:uppercase;" class="form-control <?= form_error('tahunpembuatan') ? 'is-invalid' : null ?>" placeholder="Tahun Pembuatan" value="<?= $this->input->post('tahunpembuatan') ?? $header->tahunPembuatan ?>">
                                <small class=" text-danger"> <?= form_error('tahunpembuatan') ?></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-5 col-form-label">Isi Silinder </label>
                            <div class="col-lg-7 input-group">
                                <input type="number" name="isisilinder" style="text-transform:uppercase;" class="form-control <?= form_error('isisilinder') ? 'is-invalid' : null ?>" placeholder="Isi Silinder" value="<?= $this->input->post('isisilinderr') ?? $header->isiSilinder ?>">
                                <div class=" input-group-prepend">
                                    <span class="input-group-text" id="sizing-addon2">CC</span>
                                </div>
                                <small class="text-danger"> <?= form_error('isisilinder') ?></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-5 col-form-label">Warna </label>
                            <div class="col-lg-7">
                                <input type="text" name="warna" style="text-transform:uppercase;" class="form-control <?= form_error('warna') ? 'is-invalid' : null ?>" placeholder="Warna" value="<?= $this->input->post('wana') ?? $header->warna ?>">
                                <small class=" text-danger"> <?= form_error('warna') ?></small>
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