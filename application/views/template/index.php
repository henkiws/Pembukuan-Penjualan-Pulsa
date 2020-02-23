<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/datepicker.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/datatables/css/dataTables.bootstrap.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css'); ?>">
  	<link rel="stylesheet" href="<?php echo base_url('assets/adminLTE/css/AdminLTE.min.css'); ?>">
  	<link rel="stylesheet" href="<?php echo base_url('assets/adminLTE/css/skins/_all-skins.min.css');?>">
  	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/font-awesome/css/font-awesome.min.css'); ?>">


	<script src="<?php echo base_url('assets/jquery/jquery-2.2.3.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/adminLTE/js/app.min.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/js/datepicker.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/datatables/js/dataTables.bootstrap.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/pdf/jspdf.debug.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/pdf/jspdf.plugin.autotable.js') ?>"></script>

	<!-- datatables -->
	<script>
		$(document).ready(function(){
			$('#table_id').DataTable();
		});
	</script>
	<script>
		$(document).ready(function(){
			$('#table_id2').DataTable();
		});
	</script>

	<!-- datepicker -->
	<script> 
	$(document).ready(function(){
		$('.datepicker2').datepicker({
			format: 'dd-mm-yyyy'
		});
	});
	</script>

	<!-- toggle-menu -->
	<script>
		$(document).ready(function(){
			$("#transaksi").click(function(){
				$("#panel-transaksi").slideToggle("fast");
			});
		});
	</script>
	<script>
		$(document).ready(function(){
			$("#master").click(function(){
				$("#panel-master").slideToggle("fast");
			});
		});
	</script>
	<script>
		$(document).ready(function(){
			$("#laporan").click(function(){
				$("#panel-laporan").slideToggle("fast");
			});
		});
	</script>
	<script type="text/javascript">
		

 	function edit_trx(id){
 		$("#form")[0].reset();

 		//load data
 		$.ajax({
 			url:"<?php echo base_url('transaksi/ajax_edit/'); ?>" +id,
 			type:"GET",
 			dataType:"JSON",
 			success:function(data){
 				$('[name="id_trx"]').val(data.id_trx);
 				$('[name="user"]').val(data.user);
 				$('[name="tgl_trx"]').val(data.tanggal_trx);
 				$('[name="tgl_bayar"]').val(data.tanggal_lunas);
 				$('[name="keterangan"]').val(data.keterangan);

 				$('#modalTrx').modal('show');
 			},
 			error: function(jqXHR, textStatus, errorThrown){
				alert('maaf terjadi kesalahan');
			}
 		});
 	}

 	function save(){
 		var url;
 		url="<?php echo site_url('transaksi/simpan_trx'); ?>";
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
				alert('maaf terjadi kesalahan mohon cek kembali simpan');
			}
		});
 	}

 	function hapus_trx(id){
 		if (confirm('Data dihapus ?')){
 			$.ajax({
 				url   : "<?php echo base_url('transaksi/hapus_trx/'); ?>"+id,
 				type  : "POST",
 				dataType : "JSON",
 				success:function (data){
 					location.reload();
 				},
 				error:function(jqXHR, textStatus, errorThrown){
					alert('maaf terjadi kesalahan');
				}
 			});
 		}
 	}

	</script>

	<title>dashboard admin</title>
</head>
<body class="hold-transition skin-green sidebar-mini">

<div class="wrapper">
		<?php echo $headernya; ?>
  <div class="content-wrapper">
    <section class="content">
		<?php echo $contentnya; ?>
    </section>
  </div>
  <footer class="main-footer">
		<?php echo $footernya; ?>
  </footer>
</div>

</body>
</html>