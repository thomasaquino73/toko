<div class="modal fade" id="modal_provinsi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title fs-5" id="title_modal_provinsi"></h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" id="form_provinsi">
                    <input type="hidden" name="id" id="id" value="">
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Provinsi :</label>
                        <input type="text" class="form-control" name="provinsi">
                    </div>
                    <span id="provinsi_error" class="text-danger"></span>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" onclick="simpan_provinsi('add_provinsi')" id="tombol-simpan-provinsi" class="btn btn-primary">Simpan</button>
                <button type="button" onclick="simpan_provinsi('update_provinsi')" id="tombol-ubah-provinsi" class="btn btn-success">Ubah</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>