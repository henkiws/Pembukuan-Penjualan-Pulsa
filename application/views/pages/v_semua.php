<div class="row">
    <div class="col-lg-4 pull-left">
        <h4>Transaksi Semua</h4>
    </div>
    <div class="col-lg-8 pull-right" style="text-align:right">
    	<h4>
            <label class="label label-primary">Deposit Terakhir: <?php foreach ($dataTransaksiDepo as $x){echo rupiah($x->deposit);} ?></label>
        </h4>
    </div>
</div>
<div class="panel panel-default">
<div class="panel-body">
<table class='table table-striped table-hover display' id='table_id2'>
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
		foreach($dataTransaksiSemua as $x){ ?>
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
			}
		?>
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