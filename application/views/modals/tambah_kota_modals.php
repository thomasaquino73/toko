<div class="modal fade " id="modal_kota">
    <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title fs-5" id="title_modal_kota"></h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" id="form_kota">
                    <input type="hidden" name="id" id="id" value="">
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Provinsi :</label>
                        <!-- <select class="form-control selectprovinsi " name="provinsi" style="width:100%"> -->
                        <select class="form-control " name="provinsi" style="width:100%">
                            <option selected disabled hidden>Pilih Provinsi</option>
                            <?php foreach ($provinsi as $provinsi) { ?>
                                <option value="<?= $provinsi->idProvinsi ?>" <?php echo set_select('provinsi', $provinsi->idProvinsi, (!empty($data) && $data == $provinsi->idProvinsi ? TRUE : FALSE)); ?>> <?= $provinsi->provinsi ?></option>
                            <?php } ?>
                        </select>
                        <span id="provinsi_error" class="text-danger"></span>

                    </div>
                    <div class="mb-3 formkota ">
                        <label for=" recipient-name" class="col-form-label">Kabupaten / Kota :</label>
                        <div class="row">
                            <div class="col-lg-10">
                                <input type="text" class="form-control" name="kota[]">
                                <input type="text" class="form-control" name="kot">
                                <span id="kota[]_error" class="text-danger"></span>
                                <span id="kot_error" class="text-danger"></span>
                            </div>
                            <div class="col-lg-2">
                                <!-- <button type="button" class="btn btn-danger btn-sm "><i class="fa fa-trash"></i></button> -->
                            </div>
                        </div>
                    </div>
                    <div id="formkota">
                    </div>
                    <button type="button" id="tombol-tambah-kota" class="btn btn-primary btnaddkota"><i class="fa fa-plus"></i></button>
            </div>
            <div class="modal-footer">
                <button type="button" onclick="simpan_kota('add_kota')" id="tombol-simpan-kota" class="btn btn-primary">Simpan</button>
                <button type="button" onclick="simpan_kota('update_kota')" id="tombol-ubah-kota" class="btn btn-success">Ubah</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
            </form>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('.btnaddkota').click(function(e) {
            e.preventDefault();
            $('#formkota').append(
                ` <div class="mb-3 kota">
                        <label for="recipient-name" class="col-form-label">Kabupaten / Kota :</label>
                        <div class="row">
                            <div class="col-lg-10">
                                <input type="text" class="form-control" id="recipient-name">
                            </div>
                            <div class="col-lg-2">
                                <button type="button" class="btn btn-danger btn-sm btnhapusform"><i class="fa fa-trash"></i></button>
                            </div>
                        </div>
                    </div>
                `);
        });

    });
    $(document).on('click', '.btnhapusform', function(e) {
        e.preventDefault();
        $(this).parents('.kota').remove();
    });
</script>