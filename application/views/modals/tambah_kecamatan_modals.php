<div class="modal fade " id="modal_kecamatan">
    <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title fs-5" id="title_modal_kecamatan"></h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" id="form_kecamatan">
                    <input type="hidden" name="id" id="id" value="">
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Kota :</label>
                        <!-- <select class="form-control selectkota " name="kota" style="width:100%"> -->
                        <select class="form-control" name="kota" style="width:100%">
                            <option selected disabled hidden>Pilih Kota</option>
                            <?php foreach ($kota as $kota) { ?>
                                <option value="<?= $kota->idKota ?>" <?php echo set_select('kota', $kota->idKota, (!empty($data) && $data == $kota->idKota ? TRUE : FALSE)); ?>> <?= $kota->kota ?></option>
                            <?php } ?>
                        </select>
                        <span id="kota_error" class="text-danger"></span>

                    </div>
                    <div class="mb-3 formkecamatan ">
                        <label for=" recipient-name" class="col-form-label">Kecamatan :</label>
                        <div class="row">
                            <div class="col-lg-10">
                                <input type="text" class="form-control" name="kecamatan[]">
                                <input type="text" class="form-control" name="kec">
                                <span id="kecamatan[]_error" class="text-danger"></span>
                                <span id="kec_error" class="text-danger"></span>
                            </div>
                            <div class="col-lg-2">
                                <!-- <button type="button" class="btn btn-danger btn-sm "><i class="fa fa-trash"></i></button> -->
                            </div>
                        </div>
                    </div>
                    <div id="formkecamatan">
                    </div>
                    <button type="button" onclick="tambahkecamatan()" id="tombol-tambah-kecamatan" class="btn btn-primary btnaddkecamatan"><i class="fa fa-plus"></i></button>
            </div>
            <div class="modal-footer">
                <button type="button" onclick="simpan_kecamatan('add_kecamatan')" id="tombol-simpan-kecamatan" class="btn btn-primary">Simpan</button>
                <button type="button" onclick="simpan_kecamatan('update_kecamatan')" id="tombol-ubah-kecamatan" class="btn btn-success">Ubah</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
            </form>
        </div>
    </div>
</div>
<script>
    function tambahkecamatan() {
        $("#formkecamatan").append('<div class="mb-3 kecamatan"> <label for = "recipient-name" class = "col-form-label" > Kecamatan: </label> <div class = "row" ><div class = "col-lg-10" > <input type = "text"class = "form-control" name = "kecamatan[]"  ></div> <div class = "col-lg-2" > <button type = "button"class = "btn btn-danger btn-sm btnhapusform" > <i class = "fa fa-trash" > </i></button ></div> </div > </div>');
    };


    $(document).on('click', '.btnhapusform', function(e) {
        e.preventDefault();
        $(this).parents('.kecamatan').remove();
    });
</script>