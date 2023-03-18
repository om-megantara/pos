<?= $this->extend('templates/main'); ?>
<?= $this->section('admin-content');?>

<!-- Google Font: Source Sans Pro -->
<!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback"> -->
<!-- Font Awesome -->
<!-- <link rel="stylesheet"
    href="<?=base_url('public/plugins');?>/fontawesome-free/css/all.min.css"> -->
<!-- DataTables -->
<link rel="stylesheet" href="<?=base_url('public/plugins');?>/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="<?=base_url('public/plugins');?>/datatables-responsive/css/responsive.bootstrap4.min.css">
<!-- <link rel="stylesheet" href="<?=base_url('public/plugins');?>/datatables-buttons/css/buttons.bootstrap4.min.css"> -->
<!-- Theme style -->
<!-- <link rel="stylesheet" href="http://localhost:81/lancarasiaindustri.com/public/css/adminlte.min.css"> -->


<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-1">
            <div class="col-sm-6">
                <h1 class="m-0"><?=$title;?></h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?=base_url('admin');?>"><?= $breadcrumb['control'];?></a></li>
                    <li class="breadcrumb-item active"><?= $breadcrumb['menu'];?></li>
                </ol>
            </div><!-- /.col -->

        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
    <hr>
</div>
<section class="content">
    <div class="container-fluid">
        <div class="card">
            <section style="background-color: #eee;">
                <div class="container py-2">

                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card mb-4">
                                <div class="card-body text-center">
                                    <div class="btn btn btn-sm" data-toggle="modal" data-target="#edit_photo"
                                        data-dismiss="modal">
                                        <?php 
                                            if(!empty($list->user_image)){ ?>
                                        <img src="<?= base_url('public/img/foto/'.$list->user_image); ?>" alt="avatar"
                                            class="rounded-circle img-fluid" style="width: 150px;">
                                        <?php }else{ ?>
                                        <img src="<?= base_url('public/img/foto/default.jpg'); ?>" alt="avatar"
                                            class="rounded-circle img-fluid" style="width: 150px;">
                                        <?php } ?>
                                    </div>
                                    <!-- <img src="<?= base_url('public/img/'.$list->user_image); ?>" alt="avatar"
                                        class="rounded-circle img-fluid" style="width: 150px;"> -->
                                    <h5 class="my-3"><?= $list->fullname;?></h5>
                                    <p class="text-muted mb-1"><?= $list->name;?></p>
                                    <p class="text-muted mb-4"><?= $list->email;?></p>
                                    <!-- <div class="d-flex justify-content-center mb-2">
                                        <button type="button" class="btn btn-primary ">Follow - <?=$list->id?></button>
                                        <button type="button" class="btn btn-outline-primary ms-1 ">Message</button>
                                    </div> -->
                                </div>
                            </div>
                            <!-- <div class="card mb-4 mb-lg-0">
                            <div class="card-body p-0">
                                <ul class="list-group list-group-flush rounded-3">
                                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                        <i class="fas fa-globe fa-lg text-warning"></i>
                                        <p class="mb-0">https://mdbootstrap.com</p>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                        <i class="fab fa-github fa-lg" style="color: #333333;"></i>
                                        <p class="mb-0">mdbootstrap</p>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                        <i class="fab fa-twitter fa-lg" style="color: #55acee;"></i>
                                        <p class="mb-0">@mdbootstrap</p>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                        <i class="fab fa-instagram fa-lg" style="color: #ac2bac;"></i>
                                        <p class="mb-0">mdbootstrap</p>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                        <i class="fab fa-facebook-f fa-lg" style="color: #3b5998;"></i>
                                        <p class="mb-0">mdbootstrap</p>
                                    </li>
                                </ul>
                            </div>
                        </div> -->
                        </div>
                        <div class="col-lg-8">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Full Name</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <!-- <input type="text" name="cst_id" id="cst_id" class="form-control"
                                                value="<?= $list->fullname;?>" autocomplete="off" required> -->
                                            <p class="text-muted mb-0"><?= $list->fullname;?></p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Email</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <!-- <input type="text" name="cst_id" id="cst_id" class="form-control"
                                                value="<?= $list->email;?>" autocomplete="off" required> -->
                                            <p class="text-muted mb-0"><?= $list->email;?></p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Phone</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <!-- <input type="text" name="cst_id" id="cst_id" class="form-control"
                                                value="<?= $list->Phone;?>" autocomplete="off" required> -->
                                            <p class="text-muted mb-0"><?= $list->Phone;?></p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Mobile</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <!-- <input type="text" name="cst_id" id="cst_id" class="form-control"
                                                value="<?= $list->Mobile;?>" autocomplete="off" required> -->
                                            <p class="text-muted mb-0"><?= $list->Mobile;?></p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Address</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <!-- <textarea type="text" rows="5" name="cst_id" id="cst_id"
                                                class="form-control" value="" autocomplete="off"
                                                required><?= "$list->Address \n$list->City \n$list->Province \n$list->Country";?></textarea> -->
                                            <p class="text-muted mb-0">
                                                <?= "$list->Address \n$list->City \n$list->Province \n$list->Country";?>
                                            </p>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row ">
                                <div class="d-flex center-content-center mb-12">
                                    <a href="<?= base_url('user/update-profile/'.$list->user_id);?>" type="button"
                                        class="btn btn-primary ">Update</a>
                                    <!-- <button type="button" class="btn btn-outline-primary ms-1 ">Save</button> -->
                                </div>
                            </div>
                            <!-- <div class="row">
                                <div class="col-md-6">
                                    <div class="card mb-4 mb-md-0">
                                        <div class="card-body">
                                            <p class="mb-4"><span class="text-primary font-italic me-1">assigment</span>
                                                Project Status
                                            </p>
                                            <p class="mb-1" style="font-size: .77rem;">Web Design</p>
                                            <div class="progress rounded" style="height: 5px;">
                                                <div class="progress-bar" role="progressbar" style="width: 80%"
                                                    aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <p class="mt-4 mb-1" style="font-size: .77rem;">Website Markup</p>
                                            <div class="progress rounded" style="height: 5px;">
                                                <div class="progress-bar" role="progressbar" style="width: 72%"
                                                    aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <p class="mt-4 mb-1" style="font-size: .77rem;">One Page</p>
                                            <div class="progress rounded" style="height: 5px;">
                                                <div class="progress-bar" role="progressbar" style="width: 89%"
                                                    aria-valuenow="89" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <p class="mt-4 mb-1" style="font-size: .77rem;">Mobile Template</p>
                                            <div class="progress rounded" style="height: 5px;">
                                                <div class="progress-bar" role="progressbar" style="width: 55%"
                                                    aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <p class="mt-4 mb-1" style="font-size: .77rem;">Backend API</p>
                                            <div class="progress rounded mb-2" style="height: 5px;">
                                                <div class="progress-bar" role="progressbar" style="width: 66%"
                                                    aria-valuenow="66" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card mb-4 mb-md-0">
                                        <div class="card-body">
                                            <p class="mb-4"><span class="text-primary font-italic me-1">assigment</span>
                                                Project Status
                                            </p>
                                            <p class="mb-1" style="font-size: .77rem;">Web Design</p>
                                            <div class="progress rounded" style="height: 5px;">
                                                <div class="progress-bar" role="progressbar" style="width: 80%"
                                                    aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <p class="mt-4 mb-1" style="font-size: .77rem;">Website Markup</p>
                                            <div class="progress rounded" style="height: 5px;">
                                                <div class="progress-bar" role="progressbar" style="width: 72%"
                                                    aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <p class="mt-4 mb-1" style="font-size: .77rem;">One Page</p>
                                            <div class="progress rounded" style="height: 5px;">
                                                <div class="progress-bar" role="progressbar" style="width: 89%"
                                                    aria-valuenow="89" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <p class="mt-4 mb-1" style="font-size: .77rem;">Mobile Template</p>
                                            <div class="progress rounded" style="height: 5px;">
                                                <div class="progress-bar" role="progressbar" style="width: 55%"
                                                    aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <p class="mt-4 mb-1" style="font-size: .77rem;">Backend API</p>
                                            <div class="progress rounded mb-2" style="height: 5px;">
                                                <div class="progress-bar" role="progressbar" style="width: 66%"
                                                    aria-valuenow="66" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Modal Photo-->
<div class="modal fade" id="edit_photo" tabindex="-1" role="dialog" aria-labelledby="list_edit_category"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="POST" enctype="multipart/form-data"
                action="<?= base_url('user/save-picture/'.$list->user_id)?>">
                <div class="modal-header">
                    <img class="mt-3" src="<?= base_url('public/img/foto/'.$list->user_image); ?>" width="60%">
                </div>

                <div class="modal-body">

                    <div class="form-group">
                        <label>Cange Photo (Files *.JPG, *.PNG)</label>
                        <input class="form-control" type="file" id="foto" name="foto" accept=".png, .jpg, .jpeg">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
            </form>
        </div>
        </form>
    </div>
</div>
</div>

<?=$this->endSection();?>