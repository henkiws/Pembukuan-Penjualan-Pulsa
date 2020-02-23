<?php
    $array_hari = array(1=>'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu');
    $array_bulan = array(1=>'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
    $hari = $array_hari[date('N')];
    $bulan = $array_bulan[date('n')];
    $tanggal = date('j');
    $tahun = date('Y');
  
  $nama = $this->session->userdata('nama');
  $username = $this->session->userdata('username');
?>
 <header class="main-header">
    <!-- Logo -->
    <a href="#" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>H</b>W<b>S</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Pembukuan </b>PULSA</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
 <li class="dropdown tasks-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
             Sisa Deposit <b><?php foreach($deposit as $x){echo rupiah($x->deposit_akhir);} ?></b>
            </a>
  </li>
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="http://127.0.0.1/codeIgniter/assets/img/henki.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs">Henki Wisnu Subakti</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="http://127.0.0.1/codeIgniter/assets/img/henki.jpg" class="img-circle" alt="User Image">

                <p>
                  Henki Wisnu Subakti
                  <small>Administrator</small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="<?php echo base_url('profile'); ?>" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="<?php echo base_url('login/keluar'); ?>" class="btn btn-default btn-flat">Keluar</a>
                </div>
              </li>
            </ul>
          </li>

        </ul>
      </div>
    </nav>
  </header>



  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header"><span class="glyphicon glyphicon-calendar"></span>&nbsp;&nbsp;<?php echo $hari.', '.$tanggal.' '.$bulan.' '.$tahun ;?></li>
        <li <?php if(!empty($on_beranda)) echo "class=".$on_beranda; ?>>
          <a href="<?php echo base_url('dashboard'); ?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <?php 
          if (!empty($on_input)){
            echo "<li class='active treeview'>";
          }elseif (!empty($on_lunas)) {
            echo "<li class='active treeview'>";
          }elseif (!empty($on_hutang)) {
            echo "<li class='active treeview'>";
          }elseif (!empty($on_semua)) {
            echo "<li class='active treeview'>";
          }else{
            echo "<li class='treeview'>";
          }
        ?>
          <a href="#">
            <i class="fa fa-edit"></i>
            <span>Transaksi</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php if(!empty($on_input)) echo $on_input; ?>"><a href="<?php echo base_url('transaksi/input'); ?>"><i class="fa fa-circle-o"></i> Input</a></li>
            <li class="<?php if(!empty($on_lunas)) echo $on_lunas; ?>"><a href="<?php echo base_url('transaksi/lunas'); ?>"><i class="fa fa-circle-o"></i> Lunas</a></li>
            <li class="<?php if(!empty($on_hutang)) echo $on_hutang; ?>"><a href="<?php echo base_url('transaksi/hutang'); ?>"><i class="fa fa-circle-o"></i> Hutang</a></li>
            <li class="<?php if(!empty($on_semua)) echo $on_semua; ?>"><a href="<?php echo base_url('transaksi/semua'); ?>"><i class="fa fa-circle-o"></i> Semua</a></li>
          </ul>
        </li>
        <?php
        if (!empty($on_depo)){
            echo "<li class='active treeview'>";
          }elseif (!empty($on_harga)) {
            echo "<li class='active treeview'>";
          }else{
            echo "<li class='treeview'>";
          }
        ?>
          <a href="#">
            <i class="fa fa-book"></i>
            <span>Master</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php if(!empty($on_depo)) echo $on_depo; ?>"><a href="<?php echo base_url('master/deposit'); ?>"><i class="fa fa-circle-o"></i> Deposit</a></li>
            <li class="<?php if(!empty($on_harga)) echo $on_harga; ?>"><a href="<?php echo base_url('master/harga'); ?>"><i class="fa fa-circle-o"></i> Harga</a></li>
          </ul>
        </li>
        <li class="<?php if(!empty($on_keluar)) echo $on_keluar; ?>">
          <a href="<?php echo base_url('pengeluaran'); ?>">
            <i class="fa fa-share"></i> <span>Pengeluaran</span>
          </a>
        </li>
        <li class="<?php if(!empty($on_laporan)) echo $on_laporan; ?>"><a href="<?php echo base_url('laporan'); ?>"><i class="fa fa-folder"></i> <span>Laporan</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
