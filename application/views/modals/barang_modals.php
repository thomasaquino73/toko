<div class="modal fade " id="modal_barang" aria-hidden="true">
	<div class="modal-dialog  ">
		<div class="modal-content">
			<div class="modal-header">
				<h3 class="modal-title fs-5" id="">Pilih Barang</h3>
				<button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form class="form-horizontal">

					<table id="table" class="display compact">
						<thead>
							<tr>
								<!-- <th>No</th> -->
								<th>NAMA BARANG</th>
								<th>AKSI</th>
							</tr>
						</thead>
						<tbody>
							<?php $no = 1;
							foreach ($barang->result() as $val) { ?>
								<tr>
									<!-- <td><?= $no++ ?></td> -->
									<td><?= $val->namaBarang ?></td>
									<td>
										<button type="button" id="selectbarang" data-id="<?= $val->idBarang ?>" data-barcode="<?= $val->barcode ?>" data-name="<?= $val->namaBarang ?>" class="btn btn-success" data-dismiss="modal">Pilih</button>

									</td>
								</tr>
							<?php } ?>
						</tbody>
					</table>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
			</div>
		</div>
	</div>
</div>
<script>
	$(document).on('click', '#selectbarang', function() {
		$('#modal_barang').modal('hide');
		var idBarang = $(this).data('id');
		var name = $(this).data('name');
		var barcode = $(this).data('barcode');
		$('#idBarang').val(idBarang);
		$('#namaBarang').val(name);
		$('#barcode').val(barcode);

	});
</script>