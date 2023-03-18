<?= $this->extend('templates/main'); ?>
<?= $this->section('admin-content');?>



<!-- <link rel="stylesheet" href="<?=base_url('public/adm/plugins');?>/summernote/summernote-bs4.min.css"> -->


<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-1">
            <div class="col-sm-6">
                <h1 class="m-0"><?=$title;?></h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?=base_url('user');?>"><?= $breadcrumb['control'];?></a></li>
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
            <section class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-outline card-info">
                            <form action="<?= base_url('admin/save_about/visi');?>" method="post"
                                enctype="multipart/form-data">
                                <?php csrf_field(); ?>
                                <div class="card-header">
                                    <h3 class="card-title">
                                        Visi
                                    </h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <textarea id="summernote" name="visi">
                                <?= $list[0]->Visi;?>
                                </textarea>
                                </div>
                                <div class="card-footer">
                                    <button class="btn btn-sm btn-primary"><i class="fas fa-save"></i> Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /.col-->
                </div>
                <!-- ./row -->

            </section>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- <script src="<?= base_url('public/adm/plugins');?>/summernote/summernote-bs4.min.js"></script>
<script src="<?= base_url('public/adm');?>/dist/js/demo.js"></script>
<script>
$(function() {
    // Summernote
    $('#summernote').summernote()

    // CodeMirror
    CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
        mode: "htmlmixed",
        theme: "monokai"
    });
})
</script> -->
<?=$this->endSection();?>