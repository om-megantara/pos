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
                <h3 class="card-title">Facilities</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th width="10%" style="text-align:center;vertical-align:middle">No</th>
                            <th width="30%" style="text-align:center;vertical-align:middle">Name</th>
                            <th width="20%" style="text-align:center;vertical-align:middle">Capacity</th>
                            <th width="20%" style="text-align:center;vertical-align:middle">Satuan</th>
                            <th width="20%" style="text-align:center;vertical-align:middle"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; foreach($list as $p):?>
                        <tr>
                            <td style="text-align:center;padding:0rem;vertical-align:middle"><?= $no;?></td>
                            <td style="text-align:left;padding:0rem;vertical-align:middle">
                                &nbsp;<?= $p->KapasitasName;?>
                            </td>
                            <td style="text-align:center;padding:0rem;vertical-align:middle">
                                &nbsp;<?= $p->Kapasitas_thn?>
                            </td>
                            <td style="text-align:center;padding:0rem;vertical-align:middle"><?= $p->Satuan;?></td>
                            <td style="text-align:center;padding:0rem;vertical-align:middle">
                                <button type="submit" class="btn btn-info btn-sm" data-toggle="modal"
                                    data-target="#update<?= $no;?>" data-dismiss="modal"><i class="fas fa-edit"></i>
                                </button>
                                <div class="modal fade" id="update<?= $no;?>" tabindex="-1" role="dialog"
                                    aria-labelledby="add_scr" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h2 class="modal-title" id="update_pt">Update</h2>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="POST" enctype="multipart/form-data"
                                                    action="<?= base_url('admin/save-capacity/'.$p->KapasitasID)?>">
                                                    <?php csrf_field(); ?>
                                                    <div class="form-group">
                                                        <label>Company Name</label>
                                                        <input type="text" name="name" id="name" class="form-control"
                                                            value="<?= $p->KapasitasName?>" autocomplete="off" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Capacity / Year</label>
                                                        <input type="text" name="kapasitas" id="kapasitas"
                                                            class="form-control" value="<?= $p->Kapasitas_thn?>"
                                                            autocomplete="off" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Unit</label>
                                                        <select name="unit" id="unit" class="form-control">
                                                            <option value="<?= $p->Satuan; ?>"><?= $p->Satuan;?>
                                                            </option>
                                                            <option value="Ton">Ton</option>
                                                            <option value="Cubic">Cubic</option>
                                                            <option value="Unit">Unit</option>

                                                        </select>
                                                        <!-- <input type="text" name="name" id="name" class="form-control"
                                                            value="<?= $p->KapasitasName?>" autocomplete="off" required> -->
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-secondary"
                                                            data-dismiss="modal">Cancel</button>
                                                        <button type="submit" class="btn btn-primary">Save</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <a href="<?= base_url('admin/delete-capacity/'.$p->KapasitasID);?>"
                                    class="btn btn-danger btn-sm"><i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        <?php $no++; endforeach; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th width="10%" style="text-align:center;vertical-align:middle">No</th>
                            <th width="30%" style="text-align:center;vertical-align:middle">Name</th>
                            <th width="20%" style="text-align:center;vertical-align:middle">Capacity</th>
                            <th width="20%" style="text-align:center;vertical-align:middle">Satuan</th>
                            <th width="20%" style="text-align:center;vertical-align:middle"></th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </div><!-- /.container-fluid -->
</section>


<?=$this->endSection();?>