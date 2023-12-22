<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Dashboard 2</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?= base_url() ?>/AdminLTE/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?= base_url() ?>/AdminLTE/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url() ?>/AdminLTE/dist/css/adminlte.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?= base_url() ?>/AdminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/AdminLTE/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/AdminLTE/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/AdminLTE/plugins/fullcalendar/main.css">

    <link rel="stylesheet" href="<?= base_url() ?>/AdminLTE/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/AdminLTE/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- bootstrap icon -->
    <link rel="stylesheet" href="<?= base_url() ?>/AdminLTE/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">

    <?= $this->renderSection('style'); ?>
</head>

<body class="hold-transition light-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__wobble" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
        </div>

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="fas fa-power-off"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu dropdown-menu-right">
                        <span class="dropdown-item" id="logout">Logout</span>
                    </div>
                    <form action="<?= base_url() ?>Login/logout" method="post" id="formLogout"></form>
                </li>
            </ul>
        </nav>

        <?= $this->include('Layout/sidebar'); ?>
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0"><?= $title ?? "Home" ?></h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#"><?= $folder ?? "Home" ?></a></li>
                                <li class="breadcrumb-item active"><?= $title ?? "Index" ?></li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <?= $this->renderSection('content') ?>
        </div>

        <!-- Main Footer -->
        <?= $this->include('Layout/footer'); ?>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->
    <!-- jQuery -->
    <script src="<?= base_url() ?>/AdminLTE/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?= base_url() ?>/AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="<?= base_url() ?>/AdminLTE/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url() ?>/AdminLTE/dist/js/adminlte.js"></script>

    <script src="<?= base_url() ?>/AdminLTE/plugins/fullcalendar/main.js"></script>

    <!-- PAGE PLUGINS -->
    <!-- jQuery Mapael -->
    <script src="<?= base_url() ?>/AdminLTE/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
    <script src="<?= base_url() ?>/AdminLTE/plugins/raphael/raphael.min.js"></script>
    <script src="<?= base_url() ?>/AdminLTE/plugins/jquery-mapael/jquery.mapael.min.js"></script>
    <script src="<?= base_url() ?>/AdminLTE/plugins/jquery-mapael/maps/usa_states.min.js"></script>
    <!-- ChartJS -->
    <script src="<?= base_url() ?>/AdminLTE/plugins/chart.js/Chart.min.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="<?= base_url() ?>/AdminLTE/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url() ?>/AdminLTE/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?= base_url() ?>/AdminLTE/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?= base_url() ?>/AdminLTE/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="<?= base_url() ?>/AdminLTE/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?= base_url() ?>/AdminLTE/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="<?= base_url() ?>/AdminLTE/plugins/jszip/jszip.min.js"></script>
    <script src="<?= base_url() ?>/AdminLTE/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="<?= base_url() ?>/AdminLTE/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="<?= base_url() ?>/AdminLTE/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="<?= base_url() ?>/AdminLTE/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="<?= base_url() ?>/AdminLTE/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <script src="<?= base_url() ?>/AdminLTE/plugins/select2/js/select2.full.min.js"></script>

<script src="<?= base_url() ?>/AdminLTE/dist/js/adminlte.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>

    <!-- AdminLTE for demo purposes -->

    <script src="<?= base_url() ?>/AdminLTE/plugins/sweetalert2/sweetalert2.min.js"></script>

    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="<?= base_url() ?>/AdminLTE/dist/js/pages/dashboard2.js"></script>
    <script>
        $(function() {
            $("#logout").click(function() {
                $("#formLogout").submit();
            });

            var url = window.location;
            // for single sidebar menu
            $('ul.nav-sidebar a').removeClass('active menu-open');
            $('ul.nav-sidebar a').filter(function() {
                return this.href == url
            }).addClass('active').parent().addClass('menu-open');

            // for sidebar menu and treeview
            $('ul.nav-treeview a').filter(function() {
                    return this.href == url;
                }).parentsUntil(".nav-sidebar > .nav-treeview")
                .addClass('menu-open').prev('a')
                .addClass('active');

            $('.select2').select2();

            $('.select2').select2()

            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            });

            
        });
    </script>
    <?= $this->renderSection('script') ?>
</body>

</html>