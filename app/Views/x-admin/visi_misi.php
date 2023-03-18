<?= $this->extend('templates/main'); ?>
<?= $this->section('admin-content');?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-1">
            <div class="col-sm-6">
                <h1 class="m-0">Admin - Visi Misi</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?=base_url('/admin')?>">Admin</a></li>
                    <li class="breadcrumb-item active">Visi-Misi</li>
                </ol>
            </div><!-- /.col -->

        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
    <hr>
</div>
<section class="content">
    <div class="container-fluid">
        Admin Site visi misi
    </div><!-- /.container-fluid -->
</section>
<?=$this->endSection();?>