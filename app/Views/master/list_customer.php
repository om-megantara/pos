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
                <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#add_customer"
                    data-dismiss="modal"><i class="fas fa-sm fa-plus"></i> Add Customer</button>
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
                            <th width="8%" style="text-align:center;vertical-align:middle;padding:0.2rem;">Customer ID
                            </th>
                            <th width="19%" style="text-align:center;vertical-align:middle;padding:0.2rem;">Full Name
                            </th>
                            <th width="12%" style="text-align:center;vertical-align:middle;padding:0.2rem;">Address
                            </th>
                            <th width="10%" style="text-align:center;vertical-align:middle;padding:0.2rem;">City</th>
                            <th width="10%" style="text-align:center;vertical-align:middle;padding:0.2rem;">Province
                            </th>
                            <th width="10%" style="text-align:center;vertical-align:middle;padding:0.2rem;">Zip Code
                            </th>
                            <th width="7%" style="text-align:center;vertical-align:middle;padding:0.2rem;">Phone/Mobile
                                Phone</th>
                            <th width="10%" style="text-align:center;vertical-align:middle;padding:0.2rem;"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; foreach($list as $p):?>
                        <tr>
                            <td style='padding:0.2rem;text-align:center;'><?= $no;?></td>
                            <td style='padding:0.2rem;'><?= htmlentities(strtoupper($p->CustomerID), ENT_QUOTES);?></td>
                            <td style='padding:0.2rem;'><?= htmlentities(strtoupper($p->FullName), ENT_QUOTES);?></td>
                            <td style='padding:0.2rem;'>
                                <?= htmlentities(strtoupper($p->Address), ENT_QUOTES)."<br>".htmlentities(strtoupper($p->Village), ENT_QUOTES)."<br>".htmlentities(strtoupper($p->SubDistricts), ENT_QUOTES);?>
                            </td>
                            </td>

                            <td style='padding:0.2rem;text-align:right;'>
                                <?= htmlentities(strtoupper($p->City), ENT_QUOTES);?>
                            </td>
                            <td style='padding:0.2rem;text-align:center;'>
                                <?= htmlentities(strtoupper($p->Province), ENT_QUOTES);?>
                            </td>
                            <td style='padding:0.2rem;text-align:center;'><?= htmlentities($p->ZipCode, ENT_QUOTES);?>
                            <td style='padding:0.2rem;text-align:center;'>
                                <?= htmlentities($p->MobilePhone, ENT_QUOTES);?>
                            <td style='padding:0.2rem;text-align:center;'>
                                <button type="submit" class="btn btn-info btn-sm" data-toggle="modal"
                                    data-target="#update_product<?= $no;?>" data-dismiss="modal" title="Update"><i
                                        class="fas fa-edit"></i></button>
                                <!-- Modal -->
                                <div class="modal fade " id="update_product<?= $no;?>" tabindex="-1" role="dialog"
                                    aria-labelledby="update_product" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
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
                                                    action="<?= base_url('master/save_customer/'.htmlentities($p->CustomerID, ENT_QUOTES));?>">
                                                    <?php csrf_field(); ?>
                                                    <div class="row">
                                                        <div class="form-group col-sm-6" style="text-align:left">
                                                            <label>Full Name</label>
                                                            <input type="text" name="customer_name" id="customer_name"
                                                                value="<?= htmlentities(strtoupper($p->FullName), ENT_QUOTES);?>"
                                                                class="form-control" autocomplete="off" required>
                                                        </div>
                                                        <div class="form-group col-sm-6" style="text-align:left">
                                                            <label>Address</label>
                                                            <input type="text" name="address" id="address"
                                                                value="<?= htmlentities( $p->Address, ENT_QUOTES);?>"
                                                                class="form-control" autocomplete="off" required>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="form-group col-sm-6" style="text-align:left">
                                                            <label>Village</label>
                                                            <input type="text" name="village" id="village"
                                                                value="<?= htmlentities( $p->Village, ENT_QUOTES);?>"
                                                                class="form-control" autocomplete="off" required>
                                                        </div>
                                                        <div class="form-group col-sm-6" style="text-align:left">
                                                            <label>SubDistricts</label>
                                                            <input type="text" name="subdistricts" id="subdistricts"
                                                                value="<?= htmlentities( $p->SubDistricts, ENT_QUOTES);?>"
                                                                class="form-control" autocomplete="off" required>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group col-sm-6" style="text-align:left">
                                                            <label>City</label>
                                                            <input type="text" name="city" id="city"
                                                                value="<?= htmlentities($p->City, ENT_QUOTES);?>"
                                                                class="form-control" autocomplete="off" required>
                                                        </div>
                                                        <div class="form-group col-sm-6" style="text-align:left">
                                                            <label>Province</label>
                                                            <input type="text" name="province" id="province"
                                                                value="<?= htmlentities($p->Province, ENT_QUOTES);?>"
                                                                class="form-control" autocomplete="off" required>
                                                        </div>
                                                    </div>
                                                    <div class="row">

                                                        <div class="form-group col-sm-6" style="text-align:left">
                                                            <label>Zip Code</label>
                                                            <input type="text" name="zip_code" id="zip_code"
                                                                value="<?= htmlentities( $p->ZipCode, ENT_QUOTES);?>"
                                                                class="form-control" autocomplete="off" required>
                                                        </div>
                                                        <div class="form-group col-sm-6" style="text-align:left">
                                                            <label>Phone/Mobile Phone</label>
                                                            <input type="text" name="hp_phone" id="hp_phone"
                                                                value="<?= htmlentities( $p->Phone, ENT_QUOTES);?>"
                                                                class="form-control" autocomplete="off" required>
                                                        </div>
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
                                <!-- <button type="submit" class="btn btn-info btn-sm btn-danger" data-toggle="modal"
                                    data-target="#update" data-dismiss="modal" title="Delete"><i
                                        class="fas fa-trash"></i></button> -->
                                <a href="<?= base_url('master/delete-customer/'.$p->CustomerID); ?>">
                                    <button type="submit" class="btn btn-info btn-sm btn-danger" data-dismiss="modal"
                                        title="Delete">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </a>
                            </td>
                        </tr>
                        <?php $no++; endforeach; ?>


                    </tbody>
                    <tfoot>
                        <tr>
                            <th width="7%" style="text-align:center;vertical-align:middle;padding:0.2rem;">No</th>
                            <th width="8%" style="text-align:center;vertical-align:middle;padding:0.2rem;">Customer ID
                            </th>
                            <th width="19%" style="text-align:center;vertical-align:middle;padding:0.2rem;">Full Name
                            </th>
                            <th width="12%" style="text-align:center;vertical-align:middle;padding:0.2rem;">Address
                            </th>
                            <th width="10%" style="text-align:center;vertical-align:middle;padding:0.2rem;">City</th>
                            <th width="10%" style="text-align:center;vertical-align:middle;padding:0.2rem;">Province
                            </th>
                            <th width="10%" style="text-align:center;vertical-align:middle;padding:0.2rem;">Zip Code
                            </th>
                            <th width="7%" style="text-align:center;vertical-align:middle;padding:0.2rem;">Phone/Mobile
                                Phone</th>
                            <th width="10%" style="text-align:center;vertical-align:middle;padding:0.2rem;"></th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </div><!-- /.container-fluid -->
</section>

<div class="modal fade" id="add_customer" tabindex="-1" role="dialog" aria-labelledby="tambah_brg" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="tambah_brg">Add Customer</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" enctype="multipart/form-data" action="<?= base_url('master/save-customer')?>">
                    <?php csrf_field(); ?>
                    <div class="row">
                        <!-- <div class="form-group col-sm-4" style="text-align:left">
                            <label>CustomerID</label>
                            <input type="text" name="customer_id" id="customer_id" class="form-control"
                                autocomplete="off" required>
                        </div> -->

                        <div class="form-group col-sm-6" style="text-align:left">
                            <label>Full Name</label>
                            <input type="text" name="customer_name" id="customer_name" class="form-control"
                                autocomplete="off" required>
                        </div>
                        <div class="form-group col-sm-6" style="text-align:left">
                            <label>Address</label>
                            <input type="text" name="address" id="address" class="form-control" autocomplete="off"
                                required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-sm-6" style="text-align:left">
                            <label>Village</label>
                            <input type="text" name="village" id="village" class="form-control" autocomplete="off"
                                required>
                        </div>
                        <div class="form-group col-sm-6" style="text-align:left">
                            <label>SubDistricts</label>
                            <input type="text" name="subdistricts" id="subdistricts" class="form-control"
                                autocomplete="off" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-6" style="text-align:left">
                            <label>City</label>
                            <input type="text" name="city" id="city" class="form-control" autocomplete="off" required>
                        </div>
                        <div class="form-group col-sm-6" style="text-align:left">
                            <label>Province</label>
                            <input type="text" name="province" id="province" class="form-control" autocomplete="off"
                                required>
                        </div>
                    </div>
                    <div class="row">

                        <div class="form-group col-sm-6" style="text-align:left">
                            <label>Zip Code</label>
                            <input type="text" name="zip_code" id="zip_code" class="form-control" autocomplete="off"
                                required>
                        </div>
                        <div class="form-group col-sm-6" style="text-align:left">
                            <label>Phone/Mobile Phone</label>
                            <input type="text" name="hp_phone" id="hp_phone" class="form-control" autocomplete="off"
                                required>
                        </div>
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