<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $title;?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?= base_url()?>asset/admin/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url()?>asset/admin/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?= base_url()?>asset/admin/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url()?>asset/admin/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?= base_url()?>asset/admin/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<!-- Google Font -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

    <header class="main-header">
      <!-- Logo -->
      <a href="index2.html" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>S</b>P</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Sistem</b>Pakar</span>
      </a>
      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>

        <?php
        if (isset($_SESSION['login']['username'])) {
          $user_name = $_SESSION['login']['username'];
        } else {
          $user_name = '';
        }
        ?>

        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <!-- User Account: style can be found in dropdown.less -->
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="<?= base_url()?>asset/admin/img/user2-160x160.jpg" class="user-image" alt="User Image">
                <span class="hidden-xs"><?=$user_name?></span>
              </a>
              <ul class="dropdown-menu">
                <!-- User image -->
                <li class="user-header">
                  <img src="<?= base_url()?>asset/admin/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                  <p>
                    <?=$user_name?>
                    <small><?=$_SESSION['login']['level']?></small>
                  </p>
                </li>

                <!-- Menu Footer-->
                <li class="user-footer">
                  <div class="pull-left">
                    <a href="#" class="btn btn-default btn-flat">Profile</a>
                  </div>
                  <div class="pull-right">
                    <a href="<?= base_url()?>admin/login/logout" class="btn btn-danger btn-flat">Sign out</a>
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
        <!-- Sidebar user panel -->
        <div class="user-panel" style="padding: 25px 10px;">
          <div class="pull-left image">
            <img src="<?= base_url()?>asset/admin/img/user2-160x160.jpg" class="img-circle" alt="User Image">
          </div>
          <div class="pull-left info">
            <p><?=$user_name?></p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
          </div>
        </div>

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
          <li class="header" style="padding: 20px 25px 20px 15px">MAIN MENU</li>
          <li class=<?=($title == "Dashboard") ? "active" : "" ?>>
            <a href="<?php echo site_url ('admin/dashboard');?>">
              <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            </a>
          </li>

          <li class=<?=($title == "Data Gejala") ? "active" : "" ?>>
            <a href="<?php echo site_url ('admin/gejala');?>">
              <i class="fa fa-th"></i> <span>Data Gejala</span>
            </a>
          </li>

          <li class=<?=($title == "Data Penyakit") ? "active" : "" ?>>
            <a href="<?php echo site_url ('admin/penyakit');?>">
              <i class="fa fa-th"></i> <span>Data Penyakit</span>
            </a>
          </li>

          <li class=<?=($title == "Data Aturan") ? "active" : "" ?>>
            <a href="<?php echo site_url ('admin/aturan');?>">
              <i class="fa fa-th"></i> <span>Data Aturan</span>
            </a>
          </li>

          <li class=<?=($title == "Data Pasien") ? "active" : "" ?>>
            <a href="<?php echo site_url ('admin/pasien');?>">
              <i class="fa fa-th"></i> <span>Data Pasien</span>
            </a>
          </li>

          <li class=<?=($title == "Data User") ? "active" : "" ?>>
            <a href="<?php echo site_url ('admin/user');?>">
              <i class="fa fa-th"></i> <span>Data User</span>
            </a>
          </li>

          <li class="header">DIAGNOSA</li>

          <li class=<?=($title == "Pemeriksaan") ? "active" : "" ?>>
            <a href="#">
              <i class="fa fa-stethoscope"></i> <span>Form Pemeriksaan</span>
            </a>
          </li>

        </ul>
      </section>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <?php echo $contents; ?>
      <?php //$this->load->view($contents); ?>
    </div>
    <!-- /.content-wrapper -->

    <footer class="main-footer">
      <div class="pull-right hidden-xs">
        <b>Version</b> 2.4.0
      </div>
      <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
      reserved.
    </footer>

  </div>
  <!-- ./wrapper -->

  <!-- jQuery 3 -->
  <script src="<?= base_url()?>asset/admin/bower_components/jquery/dist/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="<?= base_url()?>asset/admin/bower_components/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button);
  </script>
  <!-- Bootstrap 3.3.7 -->
  <script src="<?= base_url()?>asset/admin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

  <!-- Slimscroll -->
  <script src="<?= base_url()?>asset/admin/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>

  <!-- AdminLTE App -->
  <script src="<?= base_url()?>asset/admin/js/adminlte.min.js"></script>

  <!-- AdminLTE for demo purposes -->
  <script src="<?= base_url()?>asset/admin/js/demo.js"></script>

  <script type="text/javascript">
    $(document).ready(function(){
      <?php
      if ($this->session->flashdata('message') != '') {
        ?>
        setTimeout(function(){
          $('#msgShow').fadeOut();
        }, 3000);
        <?php
      }
      ?>
      
    });
  </script>
</body>
</html>
