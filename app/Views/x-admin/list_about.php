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
                <h3 class="card-title">About</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th width="8%" style="text-align:center;vertical-align:middle">No</th>
                            <th width="12%" style="text-align:center;vertical-align:middle">Submenu</th>
                            <th width="65%" style="text-align:center;vertical-align:middle">Contents</th>
                            <th width="15%" style="text-align:center;vertical-align:middle"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Nama PT</td>
                            <td><?= $list[0]->title_about?></td>
                            <td>
                                <button type="submit" class="btn btn-info btn-sm" data-toggle="modal"
                                    data-target="#update" data-dismiss="modal"><i class="fas fa-edit"></i>
                                    Update</button>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>About</td>
                            <td><?= $list[0]->contents_about?></td>
                            <td><a href="<?= base_url('admin/2');?>" class="btn btn-info btn-sm"><i
                                        class="fas fa-edit"></i> Update</a></td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Visi</td>
                            <td><?= $list[0]->Visi?></td>
                            <td><a href="<?= base_url('admin/3');?>" class="btn btn-info btn-sm"><i
                                        class="fas fa-edit"></i> Update</a></td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Misi</td>
                            <td><?= $list[0]->Misi?></td>
                            <td><a href="<?= base_url('admin/4');?>" class="btn btn-info btn-sm"><i
                                        class="fas fa-edit"></i> Update</a></td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th width="8%" style="text-align:center;vertical-align:middle">No</th>
                            <th width="12%" style="text-align:center;vertical-align:middle">Submenu</th>
                            <th width="65%" style="text-align:center;vertical-align:middle">Contents</th>
                            <th width="15%" style="text-align:center;vertical-align:middle"></th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Modal -->
<div class="modal fade" id="update" tabindex="-1" role="dialog" aria-labelledby="add_scr" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="update_pt">Update</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" enctype="multipart/form-data" action="<?= base_url('admin/save_about/name')?>">
                    <?php csrf_field(); ?>
                    <div class="form-group">
                        <label>Company Name</label>
                        <input type="text" name="name" id="name" class="form-control"
                            value="<?= $list[0]->title_about?>" autocomplete="off" required>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?=$this->endSection();?>