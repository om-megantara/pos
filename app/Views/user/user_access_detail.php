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
                    <form method="POST" enctype="multipart/form-data"
                        action="<?= base_url('user/update-user-access/'.$list->id);?>">
                        <?php csrf_field(); ?>
                        <div class="row">

                            <div class="col-lg-8">
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <input type="checkbox" hidden name="menuakses[]" id="menuakses[]"
                                            checked="checked" class="text-muted mb-0" value="0">
                                        </input>
                                        <?php 
                                    // echo $access->user_permission_id;
                                    
                                    foreach ($menuakses as $q): 
                                        
                                        $ada = array_search($q->id, explode(',','0,'.$access->user_permission_id));
                                        // echo ($ada)."-";
                                        if(!empty($ada)){
                                            $checked="checked";
                                            $isi=$q->id;
                                        }else{
                                            $checked="";
                                            $isi="0";
                                        }
                                        ?>
                                        <div class="row">
                                            <!-- <div class="col-sm-3">
                                            <p class="mb-0">Full Name</p>
                                        </div> -->

                                            <div class="col-sm-9">
                                                <input type="checkbox" name="menuakses[]" id="menuakses[]"
                                                    <?php echo $checked; ?> class="text-muted mb-0" value=<?= $q->id;?>>
                                                <?= $q->name;?></input>
                                                <!-- <p class="text-muted mb-0"><?= $q->name." | $q->id ".$checked;?></p> -->
                                            </div>
                                        </div>
                                        <!-- <hr> -->
                                        <?php endforeach; ?>
                                    </div>

                                </div>
                                <div class="row ">
                                    <div class="d-flex center-content-center mb-12">
                                        <button type="submit" class="btn btn-primary ">Save</button>
                                        <!-- <button type="button" class="btn btn-outline-primary ms-1 ">Save</button> -->
                                    </div>
                                </div>

                            </div>
                        </div>
                    </form>
                </div>
            </section>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Modal Photo-->
<!-- <div class="modal fade" id="edit_photo" tabindex="-1" role="dialog" aria-labelledby="list_edit_category"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="POST" enctype="multipart/form-data" action="<?= base_url('user/save-picture/'.$list->id)?>">
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
</div> -->
<!-- </div> -->

<?=$this->endSection();?>