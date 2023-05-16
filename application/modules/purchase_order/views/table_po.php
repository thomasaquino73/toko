<table class=" table table-border table-striped custom-table datatables mb-0 compact " style=" width:100%">
    <thead>
        <tr>
            <th style="">Kode - Nama Barang</th>
            <th>Jumlah</th>
            <th>Harga Beli</th>
            <th>Sub Total</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php if ($cart = $this->cart->contents()) { ?>
            <?php $grand_total = 0;
                $sub_total = 0;
                $i = 1;
                foreach ($cart as $item) :
                    $sub_total = $item['price'] * $item['qty'];
                    $grand_total = $grand_total + $sub_total; ?>
                <tr>
                    <input type="hidden" name="cart[<?= $item['id']; ?>][rowid]" value="<?= $item['rowid']; ?>" class="form-control" readonly />
                    <input type="hidden" name="cart[<?= $item['id']; ?>][id]" id="cart[<?= $item['id']; ?>][id]" value="<?= $item['id']; ?>" class="form-control" readonly>

                    <input type="hidden" class="form-control" name="" id="" value="<?= number_format($sub_total, 0, ",", "."); ?>" readonly>
                    <td>
                        <span><?= $item['barcode']; ?> - <?= $item['name']; ?></span>
                        <!-- <input type="text" class="form-control " value="" readonly> -->
                    </td>
                    <td>
                        <input type="number" name="cart[<?= $item['id']; ?>][qty]" id="cart[<?= $item['id']; ?>][qty]" value="<?= $item['qty']; ?>" class="form-control">
                    </td>
                    <td>
                        <input type="number" class="form-control" name=" cart[<?= $item['id']; ?>][price]" id=" cart[<?= $item['id']; ?>][price]" value="<?= $item['price']; ?>">
                    </td>
                    <td>
                        <div class="input-group ">
                            <div class="input-group-append">
                                <div class="input-group-text">Rp. </div>
                            </div>
                            <input type="text" class="form-control" name="tanggalKirim" value="<?= number_format($sub_total, 0, ",", "."); ?>" readonly />
                        </div>
                    </td>
                    <td>
                        <button type="button" id="<?= $item['rowid'] ?>" class="hapus_po btn btn-danger btn-sm">
                            <i class="fa fa-trash"></i>
                        </button>
                        <button type="button" id="<?= $item['rowid'] ?>" class="hapus_po btn btn-primary btn-sm">
                            <i class="fa fa-pencil"></i>
                        </button>
                    </td>
                </tr>
    </tbody>
<?php endforeach; ?>
<tfoot>
    <tr>
        <th class="text-right" colspan="3">TOTAL</th>
        <th>
            <div class="input-group ">
                <div class="input-group-append">
                    <div class="input-group-text">Rp. </div>
                </div>
                <input type="text" class="form-control" name="tanggalKirim" value="<?= number_format($grand_total, 0, ",", "."); ?>" readonly />
            </div>
        </th>
    </tr>
</tfoot>
</table>

<?php } else { ?>
    <tr>
        <td> Data Pembelian Masih Kosong</td>
    </tr>
    </table>


<?php } ?>