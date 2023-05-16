<div class="row">
    <div class="col-sm-4 col-3">
        <h4 class="page-title">Tambah Pembelian</h4>
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
                            <label class="col-lg-3 col-form-label">Barcode<span class="text-danger">*</span></label>
                            <input type="hidden" class="form-control" readonly id="idBarang" name="idBarang" value="<?= set_value('idBarang') ?>">

                            <div class="col-lg-9">
                                <div class="input-group ">
                                    <input type="text" class="form-control" name="barcode" id="barcode" readonly />
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
        <form action="<?= base_url() ?>purchase-order/simpanbeli" method="post">
            <!-- <form class="form-horizontal" id="form_pembelian"> -->
            <div class="card-box">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group row ">
                            <label class="col-lg-3 col-form-label">Kasir<span class="text-danger">*</span></label>
                            <div class="col-lg-9">
                                <input type="text" readonly class="form-control " value="<?= $this->session->userdata('namalengkap') ?>">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">

                        <div class="form-group row ">
                            <label class="col-lg-3 col-form-label">Tanggal<span class="text-danger">*</span></label>
                            <div class="col-lg-9">
                                <input type="date" name="tanggal" value="<?= date('Y-m-d') ?>" class="form-control <?= form_error('tanggal') ? 'is-invalid' : null ?>" value="<?= set_value('tanggal') ?>">
                                <small class="text-danger"> <?= form_error('tanggal') ?></small>

                            </div>
                        </div>
                        <div class="form-group row ">

                            <label class="col-lg-3 col-form-label">Supplier<span class="text-danger">*</span></label>
                            <div class="col-lg-9">
                                <div class="input-group ">
                                    <select class="combo col-md-8" id="supplier" name="supplier">
                                        <option value="" selected disabled hidden>Pilih..</option>
                                        <?php foreach ($supplier as $supplier) { ?>
                                            <option value="<?= $supplier->idSupplier ?>"><?= $supplier->namaperusahaan ?></option>
                                        <?php } ?>
                                    </select>
                                    <div class="input-group-append">
                                        <a type="button" href="<?= base_url() ?>purchase-order/tambah-supplier" class="btn btn-success btn-flat"> <i class="fa fa-plus"></i> </a>
                                    </div>
                                </div>
                                <small class="text-danger"> <?= form_error('supplier') ?></small>
                            </div>
                            <span id="supplier_error" class="text-danger"></span>
                        </div>
                        <div class="form-group row ">
                            <label class="col-lg-3 col-form-label">Pembayaran<span class="text-danger">*</span></label>
                            <div class="col-lg-9">
                                <select name="pembayaran" id="pembayaran" class="combo col-lg-12">
                                    <option value="" selected hidden disabled>Pilih...</option>
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
                <div id="tampil">
                </div>
            </div>
        </div>

    </div>

    <div class="col-md-12">
        <div class="card-box">
            <div class="text-right">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="<?= base_url() ?>pembelian" class="btn btn-danger">Batal</a>
            </div>
        </div>
    </div>

    </form>
</div>
<?php $this->load->view('modals/barang_modals') ?>

<script>
    // function tambahpembelian() {
    //     $("tbody").append('<tr><td><select name="namabarang[]" id="" class="combo" style="width:100%">' +
    //         ' <option value = ""selected hidden disabled>Pilih</option><?php foreach ($barang->result() as $brg) { ?> <option value = "<?= $brg->idBarang ?>" ><?= $brg->namaBarang ?> </option><?php } ?> </select > </td> <td>  <input type="number" class="form-control jumlah" name="jumlahbarang[]"> </td> <td>  <input type="number" class="form-control price" name="hargabeli[]"> </td> <td>  <input type="number" class="form-control" name="subtotal[]" > </i><td><button type="button" class="btn btn-danger  btnhapusform"><i class="fa fa-trash"></i></button> </td> </tr> ');
    //     $('.combo').select2();
    //     i++;
    // };
    // $(document).on('click', '.btnhapusform', function(e) {
    //     e.preventDefault();
    //     $(this).parents('tr').remove();
    // });
    $(document).ready(function() {
        $('#tampil').load("<?= base_url('purchase_order/tabel_po'); ?>");
        $('#table').DataTable();
        $("#tambah").click(function() {
            var barcode = document.getElementById("barcode").value;
            var namaBarang = document.getElementById("namaBarang").value;
            var jumlahBarang = document.getElementById("jumlahBarang").value;
            var hargaBeli = document.getElementById("hargaBeli").value;
            if (barcode == "") {
                document.getElementById("barcode_error").innerHTML = "Kode Barang Harus Diisi";
            } else {
                document.getElementById("barcode_error").innerHTML = "";
            }
            if (namaBarang == "") {
                document.getElementById("namaBarang_error").innerHTML = "Nama Barang Harus Diisi";
            } else {
                document.getElementById("namaBarang_error").innerHTML = "";
            }
            if (jumlahBarang == "") {
                document.getElementById("jumlahBarang_error").innerHTML = "Jumlah Barang Harus Diisi";
            } else {
                document.getElementById("jumlahBarang_error").innerHTML = "";
            }
            if (hargaBeli == "") {
                document.getElementById("hargaBeli_error").innerHTML = "Harga Beli Harus Diisi";
            } else {
                document.getElementById("hargaBeli_error").innerHTML = "";
            }
            if (namaBarang != "" && barcode != "") {
                var url = "purchase-order/simpan";
                var datastring = $("#form_beli").serialize();

                $.ajax({
                    type: 'POST',
                    data: datastring,
                    url: url,
                    beforeSend: function(e) {
                        $('.btnsimpankeranjang').attr('disable', 'disabled');
                        $('.btnsimpankeranjang').html('<i class="fa fa-spin fa-spinner"></i>');
                    },
                    complete: function(e) {
                        $('.btnsimpankeranjang').removeAttr('disable');
                        $('.btnsimpankeranjang').html('<i class="fa fa-plus"></i> Tambah');
                    },
                    success: function() {
                        $('#tampil').load("<?= base_url(''); ?>purchase_order/tabel_po");
                        document.getElementById("form_beli").reset();
                    }
                    // error: function(response) {
                    //   console.log(response.responseText);
                    // }
                });
            }
        });
        $(document).on('click', '.hapus_po', function() {
            var row_id = $(this).attr("id"); //mengambil row_id dari artibut id
            Swal.fire({
                title: 'Kok Mau diHAPUS Sih,Om?',
                text: "Jangan Donk,Om",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya udah deh Hapus Aja',
                cancelButtonText: 'Jangan Ya Om'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "<?php echo base_url(); ?>purchase-order/hapus_cart",
                        method: "POST",
                        data: {
                            row_id: row_id
                        },
                        success: function(data) {
                            Swal.fire({
                                position: 'center',
                                icon: 'success',
                                title: 'Data sudah dihapus',
                                showConfirmButton: false,
                                timer: 5000
                            });
                            $('#tampil').load("<?= base_url('purchase_order/tabel_po'); ?>");
                        }
                    });
                }
            })
        });
    });
</script>