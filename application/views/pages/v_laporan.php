<?php
    $array_hari = array(1=>'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu');
    $array_bulan = array(1=>'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
    $hari = $array_hari[date('N')];
    $bulan = $array_bulan[date('n')];
    $tanggal = date('j');
    $tahun = date('Y')
?>
<div align="center"><h1>Laporan Pembukuan Pulsa</h1>
<h2>Henki Wisnu Subakti</h2></div>
<div align="right">
	<button class="btn btn-primary fa fa-print" onclick="generatefromtable()"> Simpan Laporan</button>
</div><br>
<div class="panel panel-default">
<div class="panel-body">
<table class="table table-striped table-hover display" id="tbl-lap">

	<thead>
		<th>No</th>
		<th>User</th>
		<th>Nominal</th>
		<th>Harga Modal</th>
		<th>Harga Jual</th>
		<th>Laba</th>
		<th>Tanggal</th>
		<th>Keterangan</th>
	</thead>
	<tbody>
		<?php 
		$urut=1;
		foreach($dataHutang as $x) {?>
		<tr>
		<td><?php echo $urut++; ?></td>
		<td><?php echo $x->user; ?></td>
		<td><?php echo $x->nominal; ?></td>
		<td><?php echo rupiah($x->harga_modal); ?></td>
		<td><?php echo rupiah($x->harga_jual); ?></td>
		<td><?php echo rupiah($x->laba); ?></td>
		<td><?php echo $x->tanggal_trx; ?></td>
		<td><?php echo $x->keterangan; ?></td>
		</tr>
		<?php } ?>
	</tbody>
	<tfooter>
		<tr>
			<td></td>
			<td align="right"><b>Uang Hutang Total</b></td>
			<td colspan="2"><b><font color="red"><?php foreach ($dataTransaksiHutang as $x){echo rupiah($x->jumlah);} ?></b></font></td>
		</tr>
		<tr>
			<td></td>
			<td align="right"><b>Uang Lunas Total</b></td>
			<td colspan="2"><b><font color="green"> <?php echo rupiah($uang_lunas_all); ?> </font></b></td>
		</tr>
		<tr>
			<td></td>
			<td align="right"><b>Uang Laba Total</b></td>
			<td colspan="2"><b><font color="blue"> <?php foreach($dataTransaksiLaba as $x){echo rupiah($x->jumlah);} ?> </font></b></td>
		</tr>
		<tr>
			<td></td>
			<td align="right"><b>Uang Total</b></td>
			<td colspan="2"><b><font color="orange"> <?php echo rupiah($uang_total_all); ?> </font></b></td>
		</tr>
		<tr>
			<td colspan="5"></td>
			<td colspan="3" align="right"><b>Dicetak Tanggal</b> <?php echo $hari.', '.$tanggal.' '.$bulan.' '.$tahun ;?></td>
		</tr>
	</tfooter>
</table>
</div>
</div>

<script type="text/javascript">
  function generatefromtable() {
    var doc = new jsPDF('p', 'pt', 'a4');
    var elem = document.getElementById("tbl-lap");
    var res = doc.autoTableHtmlToJson(elem);

    doc.text(200, 40, "Laporan Pembukuan Pulsa");
    doc.text(220, 60, "Henki Wisnu Subakti");
    doc.line(40, 75, 800, 75);
    doc.autoTable(res.columns, res.data, {
        startY: 100,
        styles: {
          overflow: 'linebreak',
          fontSize: 10,
          columnWidth: 'wrap'
        },
        columnStyles: {
          1: {columnWidth: 'auto'}
        }
      });
    
    doc.output('dataurlnewwindow');
      }
</script>