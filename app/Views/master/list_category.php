<?= $this->extend('templates/main'); ?>
<?= $this->section('admin-content');?>

<link rel="stylesheet" href="<?=base_url('public/plugins');?>/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="<?=base_url('public/plugins');?>/datatables-responsive/css/responsive.bootstrap4.min.css">

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
            <!-- <div class="card-header">
                <h3 class="card-title">Company Profile</h3>
            </div> -->
            <!-- /.card-header -->
            <div class="card-body">
                <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#add_category"
                    data-dismiss="modal"><i class="fas fa-sm fa-plus"></i> Add Category</button>

                <table id="example1" class="table table-bordered table-striped">
                    <?php if (!empty(session()->getFlashdata('error'))) : ?>
                    &nbsp;
                    <div class="alert alert-danger alert-dismissible fade show" style="padding:0" role="alert">
                        <?php echo session()->getFlashdata('error'); ?>
                    </div>
                    <?php endif; ?>
                    <thead>
                        <tr>
                            <th width="7%" style="text-align:center;vertical-align:middle;padding:0.2rem;">No</th>
                            <th width="8%" style="text-align:center;vertical-align:middle;padding:0.2rem;">Category
                                ID
                            </th>
                            <th width="12%" style="text-align:center;vertical-align:middle;padding:0.2rem;">
                                CategoryName
                            </th>
                            <th width="19%" style="text-align:center;vertical-align:middle;padding:0.2rem;">Status
                            </th>
                            <th width="10%" style="text-align:center;vertical-align:middle;padding:0.2rem;"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; foreach($list as $p):?>
                        <tr>
                            <?php if ($p->Status=='1'){
                                $status="ACTIVE";
                            }else{
                                $status="NON ACTIVE";
                            }
                            ?>
                            <td style='padding:0.2rem;text-align:center;'><?= $no;?></td>
                            <td style='padding:0.2rem;'><?= htmlentities($p->CategoryID, ENT_QUOTES);?></td>
                            <td style='padding:0.2rem;'><?= htmlentities($p->CategoryName, ENT_QUOTES);?></td>
                            <td style='padding:0.2rem;text-align:center;'><?= htmlentities($status, ENT_QUOTES);?></td>
                            <td style='padding:0.2rem;text-align:center;'>
                                <button type="submit" class="btn btn-info btn-sm" data-toggle="modal"
                                    data-target="#update<?= $no;?>" data-dismiss="modal" title="Update"><i
                                        class="fas fa-edit"></i></button>
                                <!-- Modal -->
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
                                                    action="<?= base_url('master/save_category/'.$p->CategoryID);?>">
                                                    <?php csrf_field(); ?>
                                                    <!-- <div class="form-group">
                                                        <label>CategoryID</label>
                                                        <input type="text" name="category_id" id="category_id"
                                                            class="form-control"
                                                            value="<?= htmlentities($p->CategoryID, ENT_QUOTES);?>"
                                                            autocomplete="off" required>
                                                    </div> -->
                                                    <div class="form-group">
                                                        <label>Category Name</label>
                                                        <input type="text" name="category_name" id="category_name"
                                                            class="form-control"
                                                            value="<?= htmlentities($p->CategoryName, ENT_QUOTES);?>"
                                                            autocomplete="off" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Status</label>
                                                        <!-- <input type="text" name="category_name" id="category_name"
                                                            class="form-control"
                                                            value="<?= htmlentities($status, ENT_QUOTES);?>"
                                                            autocomplete="off" required> -->
                                                        <select class="form-control" name="category_status" id="select"
                                                            data-live-search="true" data-hide-disabled="true">
                                                            <option value="<?= htmlentities($p->Status, ENT_QUOTES);?>">
                                                                <?= strtoupper($status); ?></option>
                                                            <option value='1'>ACTIVE</option>
                                                            <option value='0'>NON ACTIVE</option>

                                                        </select>
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
                                <a href="<?= base_url('master/delete-category/'.$p->CategoryID); ?>">
                                    <button type="submit" class="btn btn-info btn-sm btn-danger" data-dismiss="modal"
                                        title="Delete">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </a>
                                <!-- <button type="submit" class="btn btn-info btn-sm btn-danger" data-toggle="modal"
                                    data-target="#update" data-dismiss="modal" title="Delete"><i
                                        class="fas fa-trash"></i></button> -->
                            </td>
                        </tr>
                        <?php $no++; endforeach; ?>

                    </tbody>
                    <tfoot>
                        <tr>
                            <th width="7%" style="text-align:center;vertical-align:middle;padding:0.2rem;">No</th>
                            <th width="8%" style="text-align:center;vertical-align:middle;padding:0.2rem;">Category
                                ID
                            </th>
                            <th width="12%" style="text-align:center;vertical-align:middle;padding:0.2rem;">
                                CategoryName
                            </th>
                            <th width="19%" style="text-align:center;vertical-align:middle;padding:0.2rem;">Status
                            </th>
                            <th width="10%" style="text-align:center;vertical-align:middle;padding:0.2rem;"></th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </div><!-- /.container-fluid -->
</section>

<div class="modal fade" id="add_category" tabindex="-1" role="dialog" aria-labelledby="tambah_brg" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="tambah_brg">Add Category</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" enctype="multipart/form-data" action="<?= base_url('master/save-category')?>">
                    <div class="form-group">
                        <label>Category Name</label>
                        <input type="text" name="category_name" id="category_name" class="form-control"
                            autocomplete="off" required>
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