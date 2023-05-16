<div class="modal fade " id="modal_kelurahan">
    <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title fs-5" id="title_modal_kelurahan"></h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" id="form_kelurahan">
                    <input type="hidden" name="id" id="id" value="">
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Kecamatan :</label>
                        <!-- <select class="selectkecamatan form-control " name="kecamatan" id="kec" style="width:100%"> -->
                        <select class=" form-control " name="kecamatan" id="kec" style="width:100%">
                            <option disabled selected>Pilih kecamatan</option>
                            <?php foreach ($kecamatan as $kecamatan) { ?>
                                <option value="<?= $kecamatan->idKecamatan ?>" <?php echo set_select('kecamatan', $kecamatan->idKecamatan, (!empty($data) && $data == $kecamatan->idKecamatan ? TRUE : FALSE)); ?>> <?= $kecamatan->kecamatan ?></option>
                            <?php } ?>
                        </select>
                        <span id="kecamatan_error" class="text-danger"></span>

                    </div>
                    <div class="mb-3 formkelurahan ">
                        <label for=" recipient-name" class="col-form-label">Kelurahan :</label>
                        <div class="row">
                            <div class="col-lg-10">
                                <!-- <input type="text" class="form-control" name="kelurahan1"> -->
                                <input type="text" class="form-control" name="kelurahan[]">
                                <span id="kelurahan[]_error" class="text-danger"></span>

                            </div>
                            <div class="col-lg-2">
                                <!-- <button type="button" class="btn btn-danger btn-sm "><i class="fa fa-trash"></i></button> -->
                            </div>
                        </div>
                    </div>

                    <div id="formkelurahan">
                    </div>
                    <button type="button" id="tombol-tambah-kelurahan" onclick="tambahkelurahan()" class="btn btn-primary "><i class="fa fa-plus"></i></button>
            </div>
            <div class="modal-footer">
                <button type="button" onclick="simpan_kelurahan('add_kelurahan')" id="tombol-simpan-kelurahan" class="btn btn-primary">Simpan</button>
                <button type="button" onclick="simpan_kelurahan('update_kelurahan')" id="tombol-ubah-kelurahan" class="btn btn-success">Ubah</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
            </form>
        </div>
    </div>
</div>
<script>
    function tambahkelurahan() {
        $("#formkelurahan").append('<div class="mb-3 kelurahan"><label for = "recipient-name" class = "col-form-label" >Kelurahan: </label> <div class = "row" ><div class = "col-lg-10" ><input type = "text" class = "form-control" name = "kelurahan[]" > </div > <div class = "col-lg-2" >' +
            '<button type = "button" class = "btn btn-danger btn-sm btnhapusform" > <i class = "fa fa-trash" > </i></button > ' +
            '</div> </div > </div>');
    };
    $(document).on('click', '.btnhapusform', function(e) {
        e.preventDefault();
        $(this).parents('.kelurahan').remove();
    });
</script>