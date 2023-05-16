<div class="card">
    <div class="card-header" style="text-transform:uppercase">
        STOCK GUDANG <?= $konfigurasi->namaPerusahaan ?>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div class="table-responsive table-invoice" style="padding:20px;">

            <table id="table" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NAMA BARANG</th>
                        <th>STOCK</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody></tbody>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>NAMA BARANG</th>
                        <th>STOCK</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
    <!-- /.card-body -->
    <div class="card-footer clearfix">

    </div>

</div>

<script>
    var table;
    jQuery(document).ready(function() {
        table = $('#table').DataTable({
            "ajax": {
                // "url": "sales-order/table",
                "url": "<?= base_url() ?>stok/table",
                // "type": "GET"
            }
        });
    })
</script>