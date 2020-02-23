<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/font-awesome/css/font-awesome.min.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/adminLTE/css/AdminLTE.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/adminLTE/css/skins/skin-green.css'); ?>">

</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <font color="red"><b>Henki</b></font><font color="green">APP</font></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
		  <?php
		$msg=$this->session->flashdata('msg');
		if($msg){
			echo "<p class='login-box-msg'>".$msg."</p>";
		}
		?>
    <p class="login-box-msg">Pembukuan <b>PULSA</b></p>

    <form action="<?php echo  base_url('login/proses'); ?>" method="post">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Username" name="user">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" name="pass">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Login</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
</body>
</html>