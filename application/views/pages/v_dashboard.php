          <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php foreach ($dataTransaksiLaba as $x){echo rupiah($x->jumlah);} ?></h3>

              <p>Uang Laba</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="<?php echo base_url('transaksi/semua'); ?>" class="small-box-footer">Lebih detail <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo rupiah($uang_lunas_all); ?></h3>

              <p>Uang Lunas</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="<?php echo base_url('transaksi/lunas'); ?>" class="small-box-footer">Lebih detail <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php foreach ($dataTransaksiHutang as $x){echo rupiah($x->jumlah);} ?></h3>

              <p>Uang Hutang</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="<?php echo base_url('transaksi/hutang'); ?>" class="small-box-footer">Lebih detail <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?php echo rupiah($uang_total_all); ?></h3>

              <p>Uang Total</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="<?php echo base_url('transaksi/semua'); ?>" class="small-box-footer">Lebih detail <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>

<div class="row">
    <div class="col-lg-4 pull-left">
        <h4>Transaksi Hari Ini</h4>
    </div>

	<div class="col-lg-8 pull-right" style="text-align:right">
    	<h4>
            <label class="label label-primary">Deposit Terakhir: <?php foreach ($dataTransaksiDepo as $x){echo rupiah($x->deposit);} ?></label>
        </h4>
    </div>
 </div>
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

<div class="row">
    <div class="col-lg-4 pull-left">
        <h4>Transaksi Semua</h4>
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