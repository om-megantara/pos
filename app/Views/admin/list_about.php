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
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th width="8%" style="text-align:center;vertical-align:middle">No</th>
                            <th width="12%" style="text-align:center;vertical-align:middle">Name</th>
                            <th width="35%" style="text-align:center;vertical-align:middle">Address</th>
                            <th width="10%" style="text-align:center;vertical-align:middle">Phone</th>
                            <th width="10%" style="text-align:center;vertical-align:middle">Email</th>
                            <th width="10%" style="text-align:center;vertical-align:middle">Owner</th>
                            <th width="15%" style="text-align:center;vertical-align:middle"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td><?= $list[0]->name;?></td>
                            <td><?= $list[0]->address;?></td>
                            <td><?= $list[0]->phone;?></td>
                            <td><?= $list[0]->email;?></td>
                            <td><?= $list[0]->owner;?></td>
                            <td>
                                <button type="submit" class="btn btn-info btn-sm" data-toggle="modal"
                                    data-target="#update" data-dismiss="modal" title="Update"><i
                                        class="fas fa-edit"></i></button>
                                <button type="submit" class="btn btn-info btn-sm btn-danger" data-toggle="modal"
                                    data-target="#update" data-dismiss="modal" title="Delete"><i
                                        class="fas fa-trash"></i></button>
                            </td>
                        </tr>


                    </tbody>
                    <tfoot>
                        <tr>
                            <th width="8%" style="text-align:center;vertical-align:middle">No</th>
                            <th width="12%" style="text-align:center;vertical-align:middle">Name</th>
                            <th width="35%" style="text-align:center;vertical-align:middle">Address</th>
                            <th width="10%" style="text-align:center;vertical-align:middle">Phone</th>
                            <th width="10%" style="text-align:center;vertical-align:middle">Email</th>
                            <th width="10%" style="text-align:center;vertical-align:middle">Owner</th>
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
                        <label>Name</label>
                        <input type="text" name="name" id="name" class="form-control"
                            value="<?= htmlentities( $list[0]->name, ENT_QUOTES); ?>" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <input type="text" name="address" id="address" class="form-control"
                            value="<?= htmlentities( $list[0]->address, ENT_QUOTES);?>" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label>Phone</label>
                        <input type="text" name="phone" id="phone" class="form-control"
                            value="<?= htmlentities( $list[0]->phone, ENT_QUOTES);?>" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" name="email" id="email" class="form-control"
                            value="<?= htmlentities( $list[0]->email, ENT_QUOTES);?>" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label>Owner</label>
                        <input type="text" name="owner" id="owner" class="form-control"
                            value="<?= htmlentities( $list[0]->owner, ENT_QUOTES);?>" autocomplete="off" required>
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