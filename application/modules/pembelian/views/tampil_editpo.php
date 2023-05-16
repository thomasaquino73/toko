<?php
$id = $this->input->post('noRand');
$header = $this->Model_transaksi->getHeader($id);
$detail = $this->Model_transaksi->getdetailpenjualan($header->noRand);
?>
<input type="text" value="<?= $header->noRand ?>" name="noRand" id="noRand">
<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>#</th>
            <th>KODE - NAMA BARANG</th>
            <th>JUMLAH</th>
            <th>HARGA</th>
            <th>SUB TOTAL</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1;
        $gt = 0; ?>


        <?php foreach ($detail as $dt) {

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
                <!-- <td>
                                        <?= $button ?>
                                    </td> -->
            </tr>
        <?php } ?>

    </tbody>
</table>