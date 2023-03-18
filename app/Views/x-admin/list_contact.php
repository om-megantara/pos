<?= $this->extend('templates/main'); ?>
<?= $this->section('admin-content');?>

<link rel="stylesheet" href="<?=base_url('public/adm/plugins');?>/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet"
    href="<?=base_url('public/adm/plugins');?>/datatables-responsive/css/responsive.bootstrap4.min.css">

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
            <div class="card-header">
                <h3 class="card-title">Contacts</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-sm-6 col-md-6 d-flex align-items-stretch flex-column">
                        <div class="card bg-light d-flex flex-fill">
                            <div class="card-header text-muted border-bottom-0">
                                Company
                            </div>
                            <div class="card-body pt-2">
                                <div class="row">
                                    <div class="col-7">
                                        <h2 class="lead"><b><?= $list[0]->nama_pt;?></b></h2>
                                        <!-- <p class="text-muted text-sm"><b>Email: </b> email1</p> -->
                                        <ul class="ml-4 mb-0 fa-ul text-muted">
                                            <li class="small"><span class="fa-li"><i
                                                        class="fas fa-lg fa-building"></i></span> Address:
                                                <?= $list[0]->alamat;?></li>
                                            <li class="small"><span class="fa-li"><i
                                                        class="fas fa-lg fa-envelope"></i></span>
                                                Email #: <?= $list[0]->email1;?></li>
                                            <li class="small"><span class="fa-li"><i
                                                        class="fas fa-lg fa-phone"></i></span>
                                                Phone #: <?= $list[0]->tlp1;?></li>
                                        </ul>
                                    </div>
                                    <div class="col-5 text-center">
                                        <img src="<?= base_url('public/img/pt_lai2.png')?>" alt="user-avatar"
                                            class="img-circle img-fluid">
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer">
                                <div class="text-right">
                                    <!-- <a href="#" class="btn btn-sm bg-teal">
                                        <i class="fas fa-comments"></i>
                                    </a> -->
                                    <a href="#" class="btn btn-sm btn-primary">
                                        <i class="fas fa-user"></i> Update
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-6 d-flex align-items-stretch flex-column">
                        <div class="card bg-light d-flex flex-fill">
                            <div class="card-header text-muted border-bottom-0">
                                Maps
                            </div>
                            <div class="card-body pt-2">
                                <div class="google-maps">
                                    <iframe src="<?= $list[0]->map;?>" width="450" height="250" style="border:0;"
                                        allowfullscreen="" loading="lazy">
                                    </iframe>
                                </div>
                            </div>

                            <div class="card-footer">
                                <div class="text-right">
                                    <!-- <a href="#" class="btn btn-sm bg-teal">
                                        <i class="fas fa-comments"></i>
                                    </a> -->
                                    <a href="#" class="btn btn-sm btn-primary">
                                        <i class="fas fa-user"></i> Update
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th width="8%" style="text-align:center;vertical-align:middle">No</th>
                            <th width="55%" style="text-align:center;vertical-align:middle">Product Name</th>
                            <th width="25%" style="text-align:center;vertical-align:middle">Deskripsi</th>
                            <th width="12%" style="text-align:center;vertical-align:middle"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; foreach($list as $p):?>
                        <tr>
                            <td style="text-align:center;padding:0rem;vertical-align:middle"><?= $no;?></td>
                            <td style="text-align:left;padding:0rem;vertical-align:middle">
                                &nbsp;<?= $p->nama_pt;?>
                            </td>
                            <td style="text-align:center;padding:0rem;vertical-align:middle">&nbsp;<?= $p->alamat;?>
                            </td>
                            <td style="text-align:center;padding:0rem;vertical-align:middle"><a
                                    href="<?= base_url('admin/product-detail/'.$p->id_kontak);?>"
                                    class="btn btn-info btn-sm"><i class="fas fa-search-plus"></i> Detail</a></td>
                        </tr>
                        <?php $no++; endforeach; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th width="8%" style="text-align:center;vertical-align:middle">No</th>
                            <th width="25%" style="text-align:center;vertical-align:middle">Facilities & Equipment</th>
                            <th width="55%" style="text-align:center;vertical-align:middle">Name</th>
                            <th width="12%" style="text-align:center;vertical-align:middle"></th>
                        </tr>
                    </tfoot>
                </table> -->
            </div>
            <!-- /.card-body -->
        </div>
    </div><!-- /.container-fluid -->
</section>


<?=$this->endSection();?>