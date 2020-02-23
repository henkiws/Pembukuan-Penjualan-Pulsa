<div class="row">
    <div class="col-lg-6 pull-left">
        <h4>Transaksi Baru</h4>
    </div>

    <div class="col-lg-6 pull-right" style="text-align:right">
        <h4>
            <label class="label label-primary">Deposit Terakhir: <?php foreach ($dataTransaksiDepo as $x){echo rupiah($x->deposit);} ?></label>
        </h4>
    </div>
 </div>
<div class="panel panel-default">
<div class="panel-body">
<form action="<?php echo base_url('transaksi/simpanInput'); ?>" method="POST" >
	<div class="col-lg-2">
		<label>user</label>
		<input type="text" name="user" class="form-control input-sm" required>
	</div>
	<div class="col-lg-2">
		<label>nominal </label>
		<select name="id_harga" class="form-control input-sm" required>
			<option value="">- Pilih -</option>
			<?php
			foreach ($dataHarga as $x) { ?>
			<option value="<?php echo $x->id_harga; ?>"><?php echo $x->nominal." | ".$x->harga_jual; ?></option>	
			<?php } ?>
		</select>
	</div>
	<div class="col-lg-2">
		<label>tanggal</label>
		<input type="text" name="tanggal_trx" class="form-control input-sm datepicker2" value="<?php echo date('d-m-Y'); ?>" required>
	</div>
	<div class="col-lg-2">
		<label>keterangan</label>
		<select name="keterangan" class="form-control input-sm" required>
			<option value="">- Pilih -</option>
			<option value="LUNAS">LUNAS</option>
			<option value="HUTANG">HUTANG</option>
		</select>
	</div>
	<div class="col-lg-2">
		<label>deposit terakhir</label>
		<input type="text" name="deposit" class="form-control input-sm" required>
	</div>
	<div class="col-lg-2">
	<br>
		<button type="submitt" class="btn btn-sm btn-info">Simpan</button>
	</div>
</form>
</div>
</div>

<div class="col-lg-12"><h4>Transaksi Hari Ini</h4></div>
<div class="panel panel-default">
<div class="panel-body">
<table class='table table-striped table-hover display' id='table_id'>
	<thead>
		<th>No</th>
		<th>User</th>
		<th>Nominal</th>
		<th>Harga Modal</th>
		<th>Harga Jual</th>
		<th>Laba</th>
		<th>Tanggal</th>
		<th>Keterangan</th>
		<th>Deposit Terakhir</th>
		<th>Aksi</th>
	</thead>
	<tbody>
		<?php 
		$urut=1;
		$jml_hmodal=0;
		$jml_hjual=0;
		$jml_laba=0;
		foreach($dataTransaksiToday as $x){ ?>
	<tr>
			<td><?php echo $urut++ ;?></td>
			<td><?php echo $x->user; ?></td>
			<td><?php echo $x->nominal;  ?></td>
			<td><?php echo rupiah($x->harga_modal); ?></td>
			<td><?php echo rupiah($x->harga_jual); ?></td>
			<td><?php echo rupiah($x->laba); ?></td>
			<td><?php echo $x->tanggal_trx; ?></td>
			<td><label <?php if($x->keterangan=="LUNAS"){echo 'class="label label-success"';}else{echo 'class="label label-warning"';} ?>>
				<?php echo $x->keterangan; ?>
			</label></td>
			<td><?php echo rupiah($x->deposit_akhir); ?></td>
			<td>
				<button class="btn btn-warning" onclick="edit_trx(<?php echo $x->id_trx;?>)"><i class="glyphicon glyphicon-pencil"></i></button>
				<button class="btn btn-danger" onclick="hapus_trx(<?php echo $x->id_trx;?>)"><i class="glyphicon glyphicon-remove"></i></button>
			</td>
	</tr>
		<?php
		$jml_hmodal=$jml_hmodal+$x->harga_modal;
		$jml_hjual=$jml_hjual+$x->harga_jual;
		$jml_laba=$jml_laba+$x->laba;
		 } ?>
	</tbody>
		<tfooter>
	<th colspan="3">Jumlah Total</th>
	<th><?php echo rupiah($jml_hmodal); ?></th>
	<th><?php echo rupiah($jml_hjual); ?></th>
	<th><?php echo rupiah($jml_laba); ?></th>
	<th colspan="4"></th>
	</tfooter>
</table>
</div>
</div>

<?php include 'modal.php'; ?>