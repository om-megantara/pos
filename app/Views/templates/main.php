<?php if(empty(user()->username)){ return redirect()->to('/login');};?>

<!DOCTYPE html>
<html lang="en">

<?php 
    $this->db      = \Config\Database::connect();
    $this->builder = $this->db->table('tb_logo');
    $this->builder->select('*');
    $pt = $this->builder->get()->getResult();
    $logo_pt = $pt[0]->Logo;
    $nama_pt=$pt[0]->CompanyName;
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="<?= base_url('public/img/'.$logo_pt); ?>">
    <title><?= $nama_pt;?></title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('public/plugins');?>/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="<?= base_url('public/plugins');?>/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?= base_url('public/plugins');?>/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="<?= base_url('public/plugins');?>/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('public/css');?>/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?= base_url('public/plugins');?>/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?= base_url('public/plugins');?>/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="<?= base_url('public/plugins');?>/summernote/summernote-bs4.min.css">

    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css>">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.bootstrap4.min.css"> -->

    <link rel="stylesheet" href="<?=base_url('public/plugins');?>/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet"
        href="<?=base_url('public/plugins');?>/datatables-responsive/css/responsive.bootstrap4.min.css">

    <!-- <link rel="stylesheet" href="<?=base_url('public/plugins');?>/select2/css/select2.min.css">
    <link rel="stylesheet" href="<?=base_url('public/plugins');?>/select2-bootstrap4-theme/select2-bootstrap4.min.css"> -->

    <!-- <link rel="stylesheet" href="<?=base_url('public/plugins');?>/summernote/summernote-bs4.min.css"> -->
    <!-- CodeMirror -->
    <!-- <link rel="stylesheet" href="<?=base_url('public/plugins');?>/codemirror/codemirror.css"> -->
    <!-- <link rel="stylesheet" href="<?=base_url('public/plugins');?>/codemirror/theme/monokai.css"> -->

</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <!-- <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="<?= base_url('public/img');?>/AdminLTELogo.png" alt="AdminLTELogo"
                height="60" width="60">
        </div> -->

        <!-- Navbar -->
        <?= $this->include('templates/navbar');?>

        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?= $this->include('templates/sidebar');?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->



            <!-- /.content-header -->

            <!-- Main content -->
            <?php $this->renderSection('admin-content');?>


            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer center">
            <?php if (date('Y')<=2023){ ?>
            <strong>Copyright &copy; 2023 <a href="<?= base_url();?>"><?= "PT. Animax Putra Lancar"; ?></a>.</strong>
            All rights reserved.
            <?php }else{ ?>
            <strong>Copyright &copy; 2023 - <?= date('Y');?> <a
                    href="<?= base_url();?>"><?= "PT. Animax Putra Lancar"; ?></a>.</strong>
            All rights reserved.
            <!-- <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 3.1.0
            </div> -->
            <?php } ?>
        </footer>


    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="<?= base_url('public/plugins');?>/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="<?= base_url('public/plugins');?>/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
    $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url('public/plugins');?>/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="<?= base_url('public/plugins');?>/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="<?= base_url('public/plugins');?>/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <!-- <script src="<?= base_url('public/plugins');?>/jqvmap/jquery.vmap.min.js"></script> -->
    <!-- <script src="<?= base_url('public/plugins');?>/jqvmap/maps/jquery.vmap.usa.js"></script> -->
    <!-- jQuery Knob Chart -->
    <script src="<?= base_url('public/plugins');?>/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="<?= base_url('public/plugins');?>/moment/moment.min.js"></script>
    <script src="<?= base_url('public/plugins');?>/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="<?= base_url('public/plugins');?>/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js">
    </script>
    <!-- Summernote -->
    <script src="<?= base_url('public/plugins');?>/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="<?= base_url('public/plugins');?>/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url('public/js')?>/adminlte.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?= base_url('public/js')?>/demo.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="<?= base_url('public/js')?>/dashboard.js"></script>


    <!-- DataTables  & Plugins -->
    <script src="<?= base_url('public/plugins');?>/datatables/jquery.dataTables.min.js">
    </script>
    <script src="<?= base_url('public/plugins');?>/datatables-bs4/js/dataTables.bootstrap4.min.js">
    </script>
    <script src="<?= base_url('public/plugins');?>/datatables-responsive/js/dataTables.responsive.min.js">
    </script>
    <!-- <script src="<?= base_url('public/plugins');?>/datatables-buttons/js/dataTables.buttons.min.js">
    </script> -->
    <!-- <script src="<?= base_url('public/plugins');?>/datatables-buttons/js/buttons.bootstrap4.min.js">
    </script> -->
    <!-- <script src="<?= base_url('public/plugins');?>/datatables-responsive/js/responsive.bootstrap4.min.js">
    </script> -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/js/bootstrap-select.min.js"></script>

    <script src="<?= base_url('public/plugins');?>/summernote/summernote-bs4.min.js"></script>
    <script src="<?= base_url('public');?>/dist/js/demo.js"></script>

    <script src="<?=base_url('public/plugins');?>/select2/js/select2.full.min.js"></script>

    <script>
    $(function() {
        $('.select2').select2()

        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })


        $('#summernote').summernote();
        // CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
        //     mode: "htmlmixed",
        //     theme: "monokai"
        // });

        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });

    });
    </script>

</body>

</html>