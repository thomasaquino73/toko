<div class="row">
    <div class="col-sm-4 col-3">
        <h4 class="page-title">Ubah Pembelian</h4>
    </div>
</div>
<?php if ($this->session->flashdata('error')) { ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error! </strong> <?= $this->session->flashdata('error') ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php }; ?>
<div class="row">
    <div class="col-md-6">
        <div class="card-box">
            <form class="form-horizontal" id="form_beli">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group row ">
                            <label class="col-lg-3 col-form-label">Kasir<span class="text-danger">*</span></label>
                            <div class="col-lg-9">
                                <input type="text" readonly class="form-control " value="<?= $header->namaLengkap ?>">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group row ">
                            <label class="col-lg-3 col-form-label">Barcode<span class="text-danger">*</span></label>
                            <input type="hidden" class="form-control" readonly id="idBarang" name="idBarang" value="<?= set_value('idBarang') ?>">
                            <input type="hidden" class="form-control" readonly id="noRand" name="noRand" value="<?= $header->noRand ?>">
                            <div class="col-lg-9">
                                <div class="input-group ">
                                    <input type="text" class="form-control" name="barcode" id="barcode" value="<?= set_value('barcode') ?>" readonly />
                                    <input type="hidden" name="nopo1" readonly placeholder="" class="form-control <?= form_error('nopo') ? 'is-invalid' : null ?>" value="<?= $header->noPo ?>">
                                    <div class="input-group-append">
                                        <button data-toggle="modal" type="button" href="#modal_barang" class="btn btn-info btn-flat"> <i class="fa fa-search"></i> </button>
                                    </div>
                                </div>
                                <span id="barcode_error" class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group row ">
                            <label class="col-lg-3 col-form-label">Nama Barang<span class="text-danger">*</span></label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control " name="namaBarang" id="namaBarang" readonly>
                                <span id="namaBarang_error" class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group row ">
                            <label class="col-lg-3 col-form-label">Jumlah<span class="text-danger">*</span></label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control " name="jumlahBarang" id="jumlahBarang">
                                <span id="jumlahBarang_error" class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group row ">
                            <label class="col-lg-3 col-form-label">Harga Beli<span class="text-danger">*</span></label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control " name="hargaBeli" id="hargaBeli">
                                <span id="hargaBeli_error" class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="text-right">
                    <button type="button" id="tambah" class="btn btn-primary btn-sm btnsimpankeranjang">
                        <i class="fa fa-plus"></i> Tambah
                    </button>
                </div>
            </form>
        </div>
    </div>
    <div class="col-md-6">
        <form action="" method="post">
            <!-- <form class="form-horizontal" id="form_pembelian"> -->
            <div class="card-box">
                <div class="row">

                    <div class="col-md-12">
                        <div class="form-group row ">
                            <label class="col-lg-3 col-form-label">No PO<span class="text-danger">*</span></label>
                            <div class="col-lg-9">
                                <input type="text" name="nopo" readonly placeholder="" class="form-control <?= form_error('nopo') ? 'is-invalid' : null ?>" value="<?= $header->noPo ?>">
                                <input type="hidden" name="noRand1" id="noRand1" readonly placeholder="" class="form-control " value="<?= $header->noRand ?>">
                            </div>
                        </div>
                        <div class="form-group row ">
                            <label class="col-lg-3 col-form-label">Tanggal<span class="text-danger">*</span></label>
                            <div class="col-lg-9">
                                <input type="text" name="tanggal" class="form-control datetimepicker <?= form_error('tanggal') ? 'is-invalid' : null ?>" value="<?= date('d-m-Y', strtotime($header->date)) ?>">
                                <small class="text-danger"> <?= form_error('tanggal') ?></small>

                            </div>
                        </div>
                        <div class="form-group row ">

                            <label class="col-lg-3 col-form-label">Supplier<span class="text-danger">*</span></label>
                            <div class="col-lg-9">
                                <div class="input-group ">
                                    <select class="combo col-md-12 <?= form_error('supplier') ? 'has-error' : null ?>" id="supplier" name="supplier">
                                        <option value="<?= $header->idSupplier ?>" selected hidden><?= $header->namaperusahaan ?></option>
                                        <?php foreach ($supplier as $supplier) { ?>
                                            <option value="<?= $supplier->idSupplier ?>"><?= $supplier->namaperusahaan ?></option>
                                        <?php } ?>
                                    </select>

                                </div>
                                <small class="text-danger"> <?= form_error('supplier') ?></small>
                            </div>
                            <span id="supplier_error" class="text-danger"></span>
                        </div>
                        <div class="form-group row ">
                            <label class="col-lg-3 col-form-label">Pembayaran<span class="text-danger">*</span></label>
                            <div class="col-lg-9">
                                <select name="pembayaran" id="pembayaran" class="combo col-lg-12">
                                    <option value="<?= $header->pembayaran ?>" selected hidden><?= $header->pembayaran ?></option>
                                    <option value="COD"> COD</option>
                                    <option value="Transfer"> Transfer</option>
                                    <option value="Tempo"> Tempo</option>
                                </select>
                                <small class="text-danger"> <?= form_error('pembayaran') ?></small>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
    </div>


    <div class="col-md-12">
        <div class="card-box">
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>KODE - NAMA BARANG</th>
                            <th>JUMLAH</th>
                            <th>HARGA</th>
                            <th>SUB TOTAL</th>
                            <th>AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        $gt = 0; ?>
                        <?php foreach ($detail as $dt) {
                            $button = '<button class="btn btn-sm btn-info" onclick="tombol(' . $dt->iddetailbeli . ')" data-toggle="modal" type="button" href="#modal_pesanan" data-id="<?= $dt->iddetailbeli ?>"><i class="fa fa-edit" aria-hidden="true"></i></button>
                             <a class="btn btn-danger btn-sm" onclick="hapus_pembelian(' . $dt->iddetailbeli . ')"><i class="fa fa-trash"></i> </a>';
                            $subTotal = $dt->jumlahBarang * $dt->hargaBeli;
                            $gt = $gt + $subTotal; ?>
                            <tr>
                                <td>


                                    <?= $no++ ?>
                                </td>
                                <td>
                                    <?= $dt->barcode ?> - <?= $dt->namaBarang ?>
                                </td>
                                <td>
                                    <div class="row">
                                        <?= $dt->jumlahBarang ?> <?= $dt->namaSatuan ?>
                                    </div>
                                </td>
                                <td>Rp. <?= number_format($dt->hargaBeli, 0, ".", ",") ?></td>
                                <td>Rp. <?= number_format($subTotal, 0, ".", ",") ?></td>
                                <td>
                                    <?= $button ?>
                                </td>
                            </tr>
                        <?php } ?>

                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="4">T O T A L</th>
                            <th>Rp. <?= number_format($gt, 0, ".", ",") ?></th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>

    </div>

    <div class="col-md-12">
        <div class="card-box">
            <div class="text-right">
                <button type="submit" class="btn btn-primary">Ubah</button>
                <a href="<?= base_url() ?>pembelian" class="btn btn-danger">Batal</a>
            </div>
        </div>
    </div>

    </form>
</div>
<?php $this->load->view('modals/barang_modals') ?>

<script>
    $(document).ready(function() {
        $('#table').DataTable();
        $("#tambah").click(function() {
            var datastring = $("#form_beli").serialize();
            var mesej = 'ditambah';
            // var url = "pembelian/tambah_pembelian";
            var url = baseUrl('pembelian/tambah_pembelian');
            $.ajax({
                type: 'POST',
                data: datastring,
                url: url,
                dataType: 'JSON',
                beforeSend: function(e) {
                    $('.btnsimpankeranjang').html('<i class="fa fa-spin fa-spinner"></i>');
                },
                complete: function(e) {
                    $('#barcode').addClass('btn-success');
                    $('#barcode').removeClass('btn-primary');
                    $('.btnsimpankeranjang').html('<i class="fa fa-plus"> Tambah</i>');
                },
                success: function(hasil) {
                    if (hasil.error) {
                        if (hasil.barcode_error != '') {
                            $('#barcode').addClass('is-invalid');

                            $('#barcode_error').html(hasil.barcode_error);
                        } else {
                            $('#barcode').removeClass('is-invalid');
                            $('#barcode').addClass('is-valid');
                            $('#barcode_error').html('');
                        }
                    }
                    if (hasil.error) {
                        if (hasil.namaBarang_error != '') {
                            $('#namaBarang').addClass('is-invalid');

                            $('#namaBarang_error').html(hasil.namaBarang_error);
                        } else {
                            $('#namaBarang').removeClass('is-invalid');
                            $('#namaBarang').addClass('is-valid');
                            $('#namaBarang_error').html('');
                        }
                    }
                    if (hasil.error) {
                        if (hasil.jumlahBarang_error != '') {
                            $('#jumlahBarang').addClass('is-invalid');

                            $('#jumlahBarang_error').html(hasil.jumlahBarang_error);
                        } else {
                            $('#jumlahBarang').removeClass('is-invalid');
                            $('#jumlahBarang').addClass('is-valid');
                            $('#jumlahBarang_error').html('');
                        }
                    }
                    if (hasil.error) {
                        if (hasil.hargaBeli_error != '') {
                            $('#hargaBeli').addClass('is-invalid');

                            $('#hargaBeli_error').html(hasil.hargaBeli_error);
                        } else {
                            $('#hargaBeli').removeClass('is-invalid');
                            $('#hargaBeli').addClass('is-valid');
                            $('#hargaBeli_error').html('');
                        }
                    }

                    if (hasil.success) {
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Data sudah ' + mesej,
                            showConfirmButton: false,
                            timer: 5000
                        });
                        setTimeout(function() {
                            document.getElementById("form_beli").reset();
                            $('#barcode_error').html('');
                            window.location.reload();
                        }, 1000);
                    }
                }
            })


        });

    });
</script>
<script>
    function hapus_pembelian(id) {
        Swal.fire({
            title: 'Yakin Mau Dihapus?',
            text: ` `,
            icon: '',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Hapus Data'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    data: "iddetailbeli=" + id,
                    url: baseUrl('pembelian/hapus_detail'),
                    // url: "pembelian/hapus_detail",
                    type: "GET",
                    success: function(data) {
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Data sudah dihapus',
                            showConfirmButton: false,
                            timer: 5000
                        });
                        setTimeout(function() {
                            window.location.reload();
                        }, 1000);
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        Swal.fire({
                            position: 'center',
                            icon: 'error',
                            title: 'Gagal Dihapus ',
                            showConfirmButton: false,
                            timer: 5000
                        });
                    }
                });
            }
        })
    }
</script>