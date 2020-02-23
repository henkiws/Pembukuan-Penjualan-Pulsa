<div class="row">
    <div class="col-lg-4 pull-left">
        <h4>Data Pengeluaran Uang</h4>
    </div>
    <div class="col-lg-8 pull-right" style="text-align:right">
    	<h4>
            <button class="btn btn-success" onclick="add_keluar()"><i class="glyphicon glyphicon-plus"></i> Tambah Pengeluaran</button>
        </h4>
    </div>
</div>
<div class="panel panel-default">
<div class="panel-body">
<table class='table table-striped table-hover display' id='table_id'>
	<thead>
		<th>No</th>
		<th>Tanggal</th>
		<th>Jumlah Pengeluaran</th>
		<th>Keterangan</th>
		<th>Aksi</th>
	</thead>
	<tbody>
			<?php
			$urut=1;
			foreach ($dataPengeluaran as $x) { ?>
		<tr>
			<td><?php echo $urut++; ?></td>
			<td><?php echo $x->tanggal; ?></td>
			<td><?php echo rupiah($x->jumlah); ?></td>
			<td><?php echo $x->keterangan; ?></td>
			<td>
				<button class="btn btn-warning" onclick="edit_keluar(<?php echo $x->id_pengeluaran;?>)"><i class="glyphicon glyphicon-pencil"></i></button>
				<button class="btn btn-danger" onclick="hapus_keluar(<?php echo $x->id_pengeluaran;?>)"><i class="glyphicon glyphicon-remove"></i></button>
			</td>
		</tr>
		<?php } ?>
	</tbody>
</table>
</div>
</div>

<script type="text/javascript">
	var aksi;
	function add_keluar(){
		aksi='add';
		$('#form')[0].reset();
		$('#modalKeluar').modal('show');
	}

	function edit_keluar(id){
		aksi="update";
		$('#form')[0].reset();
		//load data with ajax
		$.ajax({
			url   : "<?php echo base_url('pengeluaran/ajax_edit/'); ?>"+id,
			type  : "GET",
			dataType : "JSON",
			success: function(data){
				$('[name="id_pengeluaran"]').val(data.id_pengeluaran);
				$('[name="tanggal"]').val(data.tanggal);
				$('[name="jml_keluar"]').val(data.jumlah);
				$('[name="keterangan"]').val(data.keterangan);

				$('#modalKeluar').modal('show');
				$('#modal-header').text('modal edit deposit');
			},
			error: function(jqXHR, textStatus, errorThrown){
				alert('maaf terjadi kesalahan');
			}
		});
	}

	function save(){
	var url;
		if (aksi=='add'){
			url="<?php echo base_url('pengeluaran/simpan'); ?>";
		}else{
			url="<?php echo base_url('pengeluaran/edit'); ?>";
		}
		$.ajax({
			url : url,
			type: "POST",
			data: $('#form').serialize(),
			dataType: "JSON",
			success: function(data){
				$('#modalKeluar').modal('hide');
				location.reload();
			},
			error: function(jqXHR, textStatus, errorThrown){
				alert('maaf terjadi kesalahan mohon cek kembali');
			}
		});
	}

	function hapus_keluar(id){
		if(confirm("yakin data dihapus ?")){
			$.ajax({
				url:"<?php echo base_url('pengeluaran/hapus/'); ?>"+id,
				type:"POST",
				dataType:"JSON",
				success: function(data) {
					location.reload();
				},
				error: function (jqXHR, textStatus, errorThrown){
					alert('terjadi kesalahan');
				}
			});
		}
	}
</script>

<!--MODAL-->
<div class="modal fade" id="modalKeluar" role="dialog"  style="z-index:9999">
	<div class="modal-dialog modal-xs"  style="z-index:9999">
		<div class="modal-content">
			<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
				Tambah Pengeluaran Baru
			</div>
			<div class="modal-body">
				<form  action="#" id="form" class="form-horizontal">
				 <input type="hidden" value="" name="id_pengeluaran"/>
					Tanggal : <input type="text" name="tanggal" placeholder="tanggal deposit" class="form-control input-sm datepicker2" id="tanggal" value="<?php echo date('d-m-Y'); ?>">
					Banyak Pengeluaran : <input type="number" name="jml_keluar" placeholder="Banyak Pengeluaran" class="form-control input-sm">
					Keterangan : <input type="text" name="keterangan" placeholder="keterangan pengeluaran" class="form-control input-sm">
			</div>
			<div class="modal-footer">
				<button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
				</form>
			</div>
		</div>
	</div>
</div>
