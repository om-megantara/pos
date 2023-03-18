<?php //$this->extend('auth/templates/index'); ?>
<?php //$this->section('content');?>
<?php $this->extend('templates/main'); ?>
<?php $this->section('admin-content');?>
<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <!-- <div class="col-xl-10 col-lg-12 col-md-9"> -->
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Update Password</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <!-- <form class="form-horizontal"> -->
                    <form method="POST" enctype="multipart/form-data"
                        action="<?= base_url('user/save_change_password/'.$list->id);?>">
                        <?php csrf_field(); ?>
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-6 col-form-label">Password
                                    Lama<?= $list->id;?></label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" id="inputPassword3"
                                        placeholder="Password">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-6 col-form-label">Password Baru</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" id="inputPassword3"
                                        placeholder="Password">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-6 col-form-label">Konfirmasi Password</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" id="inputPassword3"
                                        placeholder="Password">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class=" col-sm-10 align-start">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="exampleCheck2">
                                        <label class="form-check-label" for="exampleCheck2">Remember me</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <div class="d-flex center-content-center mb-12">
                                <button type="submit" class="btn btn-info">Change Password</button>
                            </div>
                            <!-- <button type="submit" class="btn btn-info">Change Password</button> -->
                            <a href="<?= base_url('/admin/home');?>" type="submit"
                                class="btn btn-default float-right">Cancel</a>
                        </div>
                        <!-- /.card-footer -->
                    </form>
                </div>
            </div>
        </div>

    </div>

</div>
<?=$this->endSection();?>