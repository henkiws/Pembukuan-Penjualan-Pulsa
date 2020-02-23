<div class="row">
    <div class="col-lg-4 pull-left">
        <h4>Data Master Deposit</h4>
    </div>
    <div class="col-lg-8 pull-right" style="text-align:right">
    	<h4>
            <button class="btn btn-success" onclick="add_depo()"><i class="glyphicon glyphicon-plus"></i> Tambah Deposit</button>
        </h4>
    </div>
</div>

<div class="panel panel-default">
<div class="panel-body">
<table class='table table-striped table-hover display' id='table_id'>
	<thead>
		<th>No</th>
		<th>Tanggal</th>
		<th>Deposit</th>
		<th>Aksi</th>
	</thead>
	<tbody>
	<?php 
	$urut=1;
		foreach($dataku as $x){ ?>
		<tr>
			<td><?php echo $urut++; ?></td>
			<td><?php echo $x->waktu_masuk; ?></td>
			<td><?php echo rupiah($x->deposit); ?></td>
			<td><button class="btn btn-warning" onclick="edit_depo(<?php echo $x->id_deposit;?>)"><i class="glyphicon glyphicon-pencil"></i></button>
				<button class="btn btn-danger" onclick="hapus_depo(<?php echo $x->id_deposit;?>)"><i class="glyphicon glyphicon-remove"></i></button>
			</td>
		</tr>
	<?php }	?>
	</tbody>
</table>
</div>
</div>

<script type="text/javascript">
	var aksi;
	function add_depo(){
		aksi='add';
		$('#form')[0].reset();
		$('#modalDepo').modal('show');
	}

	function edit_depo(id){
		aksi="update";
		$('#form')[0].reset();
		//load data with ajax
		$.ajax({
			url   : "<?php echo base_url('master/ajax_editdepo/'); ?>/"+id,
			type  : "GET",
			dataType : "JSON",
			success: function(data){
				$('[name="id_deposit"]').val(data.id_deposit);
				$('[name="tanggal"]').val(data.waktu_masuk);
				$('[name="deposit"]').val(data.deposit);

				$('#modalDepo').modal('show');
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
			url="<?php echo base_url('master/simpan_depo'); ?>";
		}else{
			url="<?php echo base_url('master/update_depo'); ?>";
		}
		$.ajax({
			url : url,
			type: "POST",
			data: $('#form').serialize(),
			dataType: "JSON",
			success: function(data){
				$('#modalDepo').modal('hide');
				location.reload();
			},
			error: function(jqXHR, textStatus, errorThrown){
				alert('maaf terjadi kesalahan mohon cek kembali');
			}
		});
	}

	function hapus_depo(id){
		if(confirm("yakin data dihapus ?")){
			$.ajax({
				url:"<?php echo base_url('master/hapus_depo/'); ?>"+id,
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
<div class="modal fade" id="modalDepo" role="dialog"  style="z-index:9999">
	<div class="modal-dialog modal-xs"  style="z-index:9999">
		<div class="modal-content">
			<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
				Tambah Deposit
			</div>
			<div class="modal-body">
				<form  action="#" id="form" class="form-horizontal">
				 <input type="hidden" value="" name="id_deposit"/>
					Tanggal : <input type="text" name="tanggal" placeholder="tanggal deposit" class="form-control input-sm datepicker2" id="tanggal" value="<?php echo date('Y-m-d'); ?>">
					Deposit : <input type="number" name="deposit" placeholder="banyak deposit" class="form-control input-sm">
			</div>
			<div class="modal-footer">
				<button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
				</form>
			</div>
		</div>
	</div>
</div>
