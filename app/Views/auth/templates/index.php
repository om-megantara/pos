<!DOCTYPE html>
<html lang="en">

<?php 
    $this->db      = \Config\Database::connect();
    $this->builder = $this->db->table('tb_logo');
    $this->builder->select('*');
    $pt = $this->builder->get()->getResult();
    $logo = $pt[0]->Logo;
    $nama=$pt[0]->CompanyName;
?>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" href="<?= base_url('public/img/'.$logo); ?>">
    <title><?= $nama;?></title>

    <!-- Custom fonts for this template-->
    <!-- <link href="<?= base_url('public');?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css"> -->
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url('public');?>/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <?= $this->renderSection('content') ?>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url('public');?>/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url('public');?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url('public');?>/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url('public');?>/js/sb-admin-2.min.js"></script>

</body>

</html>