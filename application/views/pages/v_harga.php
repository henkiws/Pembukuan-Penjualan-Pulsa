<div class="row">
    <div class="col-lg-4 pull-left">
        <h4>Data Master Harga Jual</h4>
    </div>
    <div class="col-lg-8 pull-right" style="text-align:right">
    	<h4>
             <button class="btn btn-success" onclick="add_harga()"><i class="glyphicon glyphicon-plus"></i> Add Book</button>
        </h4>
    </div>
</div>
<div class="panel panel-default">
<div class="panel-body">
<table class='table table-striped table-hover display' id='table_id'>
	<thead>
		<th>No</th>
		<th>Nominal</th>
		<th>Harga</th>
		<th>Aksi</th>
	</thead>
	<tbody>
	<?php 
	$urut=1;
		foreach($dataku as $x){ ?>
		<tr>
			<td><?php echo $urut++; ?></td>
			<td><?php echo $x->nominal; ?></td>
			<td><?php echo rupiah($x->harga_jual); ?></td>
			<td><button class="btn btn-warning" onclick="edit_harga(<?php echo $x->id_harga;?>)"><i class="glyphicon glyphicon-pencil"></i></button>
				<button class="btn btn-danger" onclick="hapus_harga(<?php echo $x->id_harga;?>)"><i class="glyphicon glyphicon-remove"></i></button>
			</td>
		</tr>
	<?php }	?>
	</tbody>
</table>
</div>
</div>


<script type="text/javascript">

	var aksi;

	function add_harga(){
		aksi = 'add';
		$('#form')[0].reset();
		$('#modalHarga').modal('show');
	}
	//mengambil id untuk edit
	function edit_harga(id){
		aksi="update";
		$('#form')[0].reset();

		//ajax load data
		$.ajax({
			url : "<?php echo base_url('master/ajax_edit/'); ?>/" +id,
			type: "GET",
	        dataType: "JSON",
	        success: function(data){
	        	$('[name="id_harga"]').val(data.id_harga);
				$('[name="nominal"]').val(data.nominal);
				$('[name="harga"]').val(data.harga_jual);

				$('#modalHarga').modal('show');
				$('.modal-header').text('Modal Edit');
			},
			error: function(jqXHR, textStatus, errorThrown){
				alert('maaf terjadi kesalahan');
			}
		});
	}

	//menyimpan data / update data
	function save(){
		var url
		if(aksi=='add'){
			url = '<?php echo site_url('master/simpan_harga'); ?>';
		}else{
			url = '<?php echo site_url('master/update_harga'); ?>';
		}
		//script ajax save
		$.ajax({
			url : url,
			type: "POST",
			data: $('#form').serialize(),
			dataType: "JSON",
			success: function(data){
				//jika sukses close modal and reload
				$('#modalHarga').modal('hide');
				location.reload();
			},
			error: function(jqXHR, textStatus, errorThrown){
				alert('maaf terjadi kesalahan mohon cek kembali');
			}
		});
	}

	function hapus_harga(id){
		if (confirm('Data akan dihapus ??')){
			$.ajax({
				url  : "<?php echo base_url('master/hapus_harga/'); ?>"+id,
				type : "POST",
				dataType : "JSON",
				success: function(data){
					location.reload();
				},
				error:function(jqXHR, textStatus, errorThrown){
					alert('maaf terjadi kesalahan');
				}
			});
		}
	}
</script>

<!--MODAL tambah-->
<div class="modal fade" id="modalHarga" role="dialog"  style="z-index:9999">
	<div class="modal-dialog modal-xs"  style="z-index:9999">
		<div class="modal-content">
			<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
				Tambah Nominal || Harga
			</div>
			<div class="modal-body">
				<form  action="#" id="form" class="form-horizontal">
				 <input type="hidden" value="" name="id_harga"/>
				Nomminal : <input type="text" name="nominal" placeholder="nominal">
					Harga : <input type="text" name="harga" placeholder="harga">
			</div>
			<div class="modal-footer">
				<button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
				</form>
			</div>
		</div>
	</div>
</div>
