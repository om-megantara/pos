<?= $this->extend('templates/main'); ?>
<?= $this->section('admin-content');?>

<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <!-- Main content -->
                <section class="content">
                    <div class="container-fluid" style="text-align: center;">
                        <!-- <h5><?= //$title. ucwords(user()->fullname) ?></h5> -->
                        <h1 style="text-align: center">PT. LANCAR ASIA INDUSTRI</h1>
                        <hr>
                        <!-- <br> -->
                        <img src="<?= base_url('public/img/pt_lai2.png'); ?>" alt="PT. Lancar Asia Industri"
                            style="text-align: center;max-height:200px;max-width:200px;" class="my-2">
                        <!-- <br> -->
                        <p>
                        <h5 style="text-align: center">
                            Dsn. Sidokerto RT/RW: 002/001
                            <br>Pulorejo Dawarblandong
                            <br>Mojokerto
                        </h5>
                        </p>
                        <hr>
                        <!-- /.row (main row) -->
                    </div><!-- /.container-fluid -->
                </section>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- jQuery -->
    </div><!-- /.container-fluid -->
</section>
<?=$this->endSection();?>