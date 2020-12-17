<?php
session_start();
if(!isset($_SESSION['auth'])){
    echo "<script> location.replace('login.php'); </script>";
}
define('PATHASSET', '../assets/');
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SPK</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo (PATHASSET . 'plugins/fontawesome-free/css/all.min.css') ?>">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="<?php echo (PATHASSET . 'plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') ?>">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?php echo (PATHASSET . 'plugins/icheck-bootstrap/icheck-bootstrap.min.css') ?>">
    <!-- JQVMap -->
    <link rel="stylesheet" href="<?php echo (PATHASSET . 'plugins/jqvmap/jqvmap.min.css') ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo (PATHASSET . 'dist/css/adminlte.min.css') ?>">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?php echo (PATHASSET . 'plugins/overlayScrollbars/css/OverlayScrollbars.min.css') ?>">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?php echo (PATHASSET . 'plugins/daterangepicker/daterangepicker.css') ?>">
    <!-- summernote -->
    <link rel="stylesheet" href="<?php echo (PATHASSET . 'plugins/summernote/summernote-bs4.css') ?>">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- Select2 -->
    <link rel="stylesheet" href="<?php echo (PATHASSET . 'plugins/select2/css/select2.min.css') ?>">
    <link rel="stylesheet" href="<?php echo (PATHASSET . 'plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') ?>">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">
                       Logout <i class="fas fa-sign-out-alt"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="index3.html" class="brand-link">
                <span class="brand-text font-weight-light">SPK Topsis</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="<?php echo (PATHASSET . 'images/user.png'); ?>" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">Admin</a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-header">EXAMPLES</li>
                        <li class="nav-item">
                            <a href="?page=kriteria" class="nav-link <?php if(isset($_GET['page']) && $_GET['page'] == "kriteria"){ echo 'active'; } ?>">
                                <i class="nav-icon fa fa-laptop"></i>
                                <p>
                                    Kriteria
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="?page=range_kriteria" class="nav-link <?php if(isset($_GET['page']) && $_GET['page'] == "range_kriteria"){ echo 'active'; } ?>">
                                <i class="nav-icon fa fa-laptop"></i>
                                <p>
                                    Range Kriteria
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="?page=kategori_alternatif" class="nav-link <?php if(isset($_GET['page']) && $_GET['page'] == "kategori_alternatif"){ echo 'active'; } ?>">
                                <i class="nav-icon fa fa-laptop"></i>
                                <p>
                                    Kategori Alternatif/Merek
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="?page=alternatif" class="nav-link <?php if(isset($_GET['page']) && $_GET['page'] == "alternatif"){ echo 'active'; } ?>">
                                <i class="nav-icon fa fa-laptop"></i>
                                <p>
                                    Alternatif/Laptop
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="?page=nilai_alternatif" class="nav-link <?php if(isset($_GET['page']) && $_GET['page'] == "nilai_alternatif"){ echo 'active'; } ?>">
                                <i class="nav-icon fa fa-laptop"></i>
                                <p>
                                    Nilai Alternatif
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="?page=keputusan" class="nav-link <?php if(isset($_GET['page']) && $_GET['page'] == "keputusan"){ echo 'active'; } ?>">
                                <i class="nav-icon fa fa-laptop"></i>
                                <p>
                                    Nilai Keputusan
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <?php if(isset($_SESSION['message']) && $_SESSION['message']['status'] == "success"){ ?>
                <div class="alert alert-success alert-dismissible fade show float-right" role="alert" style="position: fixed; right: 0; z-index:1" >
                    <?php echo $_SESSION['message']['pesan']; ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php

                }
                unset($_SESSION['message']);
            ?>

            <?php
                if(isset($_GET['page']) && $_GET['page'] == "alternatif"){
                    if(isset($_GET['action']) && $_GET['action']=="edit"){
                        include_once ("alternatif/edit.php");
                    }elseif(isset($_GET['action']) && $_GET['action']=="create"){
                        include_once ("alternatif/create.php");
                    }else{
                        include "alternatif/index.php";
                    }
                }elseif(isset($_GET['page']) && $_GET['page'] == "kategori_alternatif"){
                    include "kategori_alternatif/index.php";
                }elseif(isset($_GET['page']) && $_GET['page'] == "nilai_alternatif"){
                    include "nilai_alternatif/index.php";
                }elseif(isset($_GET['page']) && $_GET['page'] == "keputusan"){
                    include "keputusan/index.php";
                }elseif(isset($_GET['page']) && $_GET['page'] == "range_kriteria"){
                    include "range/index.php";
                }else{
                    include "kriteria/index.php";
                }
            ?>
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 3.0.2
            </div>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="<?php echo (PATHASSET . 'plugins/jquery/jquery.min.js') ?>"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="<?php echo (PATHASSET . 'plugins/jquery-ui/jquery-ui.min.js') ?>"></script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo (PATHASSET . 'plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
    <!-- ChartJS -->
    <script src="<?php echo (PATHASSET . 'plugins/chart.js/Chart.min.js') ?>"></script>
    <!-- Sparkline -->
    <script src="<?php echo (PATHASSET . 'plugins/sparklines/sparkline.js') ?>"></script>
    <!-- JQVMap -->
    <script src="<?php echo (PATHASSET . 'plugins/jqvmap/jquery.vmap.min.js') ?>"></script>
    <script src="<?php echo (PATHASSET . 'plugins/jqvmap/maps/jquery.vmap.usa.js') ?>"></script>
    <!-- jQuery Knob Chart -->
    <script src="<?php echo (PATHASSET . 'plugins/jquery-knob/jquery.knob.min.js') ?>"></script>
    <!-- daterangepicker -->
    <script src="<?php echo (PATHASSET . 'plugins/moment/moment.min.js') ?>"></script>
    <script src="<?php echo (PATHASSET . 'plugins/daterangepicker/daterangepicker.js') ?>"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="<?php echo (PATHASSET . 'plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') ?>"></script>
    <!-- Summernote -->
    <script src="<?php echo (PATHASSET . 'plugins/summernote/summernote-bs4.min.js') ?>"></script>
    <!-- overlayScrollbars -->
    <script src="<?php echo (PATHASSET . 'plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') ?>"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo (PATHASSET . 'dist/js/adminlte.js') ?>"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="<?php echo (PATHASSET . 'dist/js/pages/dashboard.js') ?>"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo (PATHASSET . 'dist/js/demo.js') ?>"></script>
    <!-- Select 2 -->
    <script src="<?php echo (PATHASSET . 'plugins/select2/js/select2.full.min.js') ?>"></script>
    <script>
        $(function () {
            //Initialize Select2 Elements
            $('.select2bs4').select2({
            theme: 'bootstrap4'
            })
        });
    </script>
</body>

</html>