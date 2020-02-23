
<!--MODAL-->
<div class="modal fade" id="modalTrx" role="dialog"  style="z-index:9999">
	<div class="modal-dialog modal-xs"  style="z-index:9999">
		<div class="modal-content">
			<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
				Edit Transaksi
			</div>
			<div class="modal-body">
				<form  action="#" id="form" class="form-horizontal">
				 <input type="hidden" value="" name="id_trx"/>
				<label>User : </label>
				<input type="text" name="user" class="form-control input-sm" disabled>
				<label>Tanggal Transaksi : </label>
				<input type="text" name="tgl_trx" class="form-control input-sm" disabled>
				<label>Tanggal Bayar : </label>
				<input type="text" name="tgl_bayar" class="form-control input-sm datepicker2">
				<label>Keterangan : </label>
				<select name="keterangan" class="form-control input-sm" required>
					<option value="LUNAS">LUNAS</option>
					<option value="HUTANG">HUTANG</option>
				</select>
			</div>
			<div class="modal-footer">
				<button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
				</form>
			</div>
		</div>
	</div>
</div>
