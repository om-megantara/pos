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
                <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#add_product"
                    data-dismiss="modal"><i class="fas fa-sm fa-plus"></i> Add Product</button>
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
                            <th width="8%" style="text-align:center;vertical-align:middle;padding:0.2rem;">Product ID
                            </th>
                            <th width="19%" style="text-align:center;vertical-align:middle;padding:0.2rem;">Product Name
                            </th>
                            <th width="12%" style="text-align:center;vertical-align:middle;padding:0.2rem;">Category
                            </th>
                            <th width="7%" style="text-align:center;vertical-align:middle;padding:0.2rem;">Merk</th>
                            <th width="12%" style="text-align:center;vertical-align:middle;padding:0.2rem;">Purchase
                                Price</th>
                            <th width="12%" style="text-align:center;vertical-align:middle;padding:0.2rem;">Selling
                                Price</th>
                            <th width="6%" style="text-align:center;vertical-align:middle;padding:0.2rem;">Unit</th>
                            <th width="7%" style="text-align:center;vertical-align:middle;padding:0.2rem;">Stock</th>
                            <th width="10%" style="text-align:center;vertical-align:middle;padding:0.2rem;"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; foreach($list as $p):?>
                        <tr>
                            <td style='padding:0.2rem;text-align:center;'><?= $no;?></td>
                            <td style='padding:0.2rem;'><?= htmlentities(strtoupper($p->ProductID), ENT_QUOTES);?></td>
                            <td style='padding:0.2rem;'><?= htmlentities($p->ProductName, ENT_QUOTES);?></td>
                            <td style='padding:0.2rem;'><?= htmlentities($p->CategoryName, ENT_QUOTES);?></td>
                            <td style='padding:0.2rem;text-align:center;'><?= htmlentities($p->Brand, ENT_QUOTES);?>
                            </td>
                            <td style='padding:0.2rem;text-align:right;'>
                                <?= 'Rp ' . number_format(htmlentities($p->PurchasePrice, ENT_QUOTES), 2, ",", ".");?>
                            </td>
                            <td style='padding:0.2rem;text-align:right;'>
                                <?= 'Rp ' . number_format(htmlentities($p->SellingPrice, ENT_QUOTES), 2, ",", ".");?>
                            </td>
                            <td style='padding:0.2rem;text-align:center;'><?= htmlentities($p->Unit, ENT_QUOTES);?></td>
                            <td style='padding:0.2rem;text-align:center;'><?= htmlentities($p->Stock, ENT_QUOTES);?>
                            </td>
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
                                                    action="<?= base_url('master/save_product/'.htmlentities($p->ProductID, ENT_QUOTES));?>">
                                                    <?php csrf_field(); ?>
                                                    <div class="row">

                                                        <div class="form-group col-sm-6" style="text-align:left">
                                                            <label>ProductID</label><br>
                                                            <label><?= htmlentities(strtoupper($p->ProductID), ENT_QUOTES);?></label>
                                                            <!-- <input type="text" name="product_id" id="product_id"
                                                            class="form-control"
                                                            value="<?= htmlentities($p->ProductID, ENT_QUOTES);?>"
                                                            autocomplete="off" required> -->
                                                        </div>

                                                        <div class="form-group col-sm-6" style="text-align:left">
                                                            <label>ProductName</label>
                                                            <input type="text" name="product_name" id="product_name"
                                                                class="form-control"
                                                                value="<?= htmlentities( $p->ProductName, ENT_QUOTES);?>"
                                                                autocomplete="off" required>
                                                        </div>
                                                    </div>
                                                    <div class="row">

                                                        <div class="form-group col-sm-6" style="text-align:left">
                                                            <label>Category</label>
                                                            <!-- <input type="text" name="address" id="address"
                                                            class="form-control"
                                                            value="<?= htmlentities( $p->CategoryID, ENT_QUOTES);?>"
                                                            autocomplete="off" required> -->
                                                            <select class="form-control" name="category" id="select"
                                                                data-live-search="true" data-hide-disabled="true">
                                                                <option
                                                                    value="<?= htmlentities($p->CategoryID, ENT_QUOTES);?>">
                                                                    <?= strtoupper($p->CategoryName); ?>
                                                                </option>
                                                                <?php foreach($category as $q):?>
                                                                <option value='<?= $q->CategoryID?>'>
                                                                    <?= $q->CategoryName; ?>
                                                                </option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-sm-6" style="text-align:left">
                                                            <label>Supplier</label>
                                                            <select class="form-control" name="supplier" id="select"
                                                                data-live-search="true" data-hide-disabled="true"
                                                                required>
                                                                <option value='0'>Select Supplier</option>
                                                                <?php foreach($supplier as $r):?>

                                                                <option value='<?= $r->SupplierID?>'>
                                                                    <?= $r->SupplierName; ?>
                                                                </option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                        </div>

                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group col-sm-6" style="text-align:left">
                                                            <label>Brand</label>
                                                            <input type="text" name="brand" id="brand"
                                                                class="form-control"
                                                                value="<?= htmlentities( $p->Brand, ENT_QUOTES);?>"
                                                                autocomplete="off" required>
                                                        </div>
                                                        <div class="form-group col-sm-6" style="text-align:left">
                                                            <label>PurchasePrice</label>
                                                            <input type="text" name="purchase_price" id="purchase_price"
                                                                class="form-control"
                                                                value="<?= number_format(htmlentities($p->PurchasePrice, ENT_QUOTES), 2, ",", ".");?>"
                                                                autocomplete="off" required>
                                                        </div>

                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group col-sm-6" style="text-align:left">
                                                            <label class="col-form-label">SellingPrice</label>
                                                            <input type="text" name="selling_price" id="selling_price"
                                                                class="form-control"
                                                                value="<?= number_format(htmlentities($p->SellingPrice, ENT_QUOTES), 2, ",", ".");?>"
                                                                autocomplete="off" required>
                                                        </div>
                                                        <div class="form-group col-sm-6" style="text-align:left">
                                                            <label>Unit</label>
                                                            <input type="text" name="unit" id="unit"
                                                                class="form-control"
                                                                value="<?= htmlentities( $p->Unit, ENT_QUOTES);?>"
                                                                autocomplete="off" required>
                                                        </div>

                                                    </div>
                                                    <!-- <div class="row">
                                                        <div class="form-group col-sm-6" style="text-align:left">
                                                            <label>Stock</label>
                                                            <input type="text" name="stock" id="stock"
                                                                class="form-control"
                                                                value="<?= htmlentities( $p->Stock, ENT_QUOTES);?>"
                                                                autocomplete="off" required>
                                                        </div>
                                                    </div> -->
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
                                <a href="<?= base_url('master/delete-product/'.$p->ProductID); ?>">
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
                            <th width="8%" style="text-align:center;vertical-align:middle;padding:0.2rem;">Product ID
                            </th>
                            <th width="19%" style="text-align:center;vertical-align:middle;padding:0.2rem;">Product Name
                            </th>
                            <th width="12%" style="text-align:center;vertical-align:middle;padding:0.2rem;">Category
                            </th>
                            <th width="7%" style="text-align:center;vertical-align:middle;padding:0.2rem;">Merk</th>
                            <th width="12%" style="text-align:center;vertical-align:middle;padding:0.2rem;">Purchase
                                Price</th>
                            <th width="12%" style="text-align:center;vertical-align:middle;padding:0.2rem;">Selling
                                Price</th>
                            <th width="6%" style="text-align:center;vertical-align:middle;padding:0.2rem;">Unit</th>
                            <th width="7%" style="text-align:center;vertical-align:middle;padding:0.2rem;">Stock</th>
                            <th width="10%" style="text-align:center;vertical-align:middle;padding:0.2rem;"></th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </div><!-- /.container-fluid -->
</section>

<div class="modal fade" id="add_product" tabindex="-1" role="dialog" aria-labelledby="add_product" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="add_product">Add Product</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" enctype="multipart/form-data" action="<?php //base_url('master/save-product')?>"
                    onSubmit="return validasi()">
                    <?php csrf_field(); ?>
                    <div class="row">

                        <div class="form-group col-sm-6" style="text-align:left">
                            <label>ProductID</label>
                            <input type="text" name="product_id" id="product_id" class="form-control" autocomplete="off"
                                required>
                        </div>

                        <div class="form-group col-sm-6" style="text-align:left">
                            <label>ProductName</label>
                            <input type="text" name="product_name" id="product_name" class="form-control"
                                autocomplete="off" required>
                        </div>
                    </div>
                    <div class="row">

                        <div class="form-group col-sm-6" style="text-align:left">
                            <label>Category</label>
                            <select class="form-control" name="category" id="select" data-live-search="true"
                                data-hide-disabled="true" required>
                                <option value='0'>Select Category</option>
                                <?php foreach($category as $q):?>

                                <option value='<?= $q->CategoryID?>'>
                                    <?= $q->CategoryName; ?>
                                </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group col-sm-6" style="text-align:left">
                            <label>Supplier</label>
                            <select class="form-control" name="supplier" id="select" data-live-search="true"
                                data-hide-disabled="true" required>
                                <option value='0'>Select Supplier</option>
                                <?php foreach($supplier as $r):?>

                                <option value='<?= $r->SupplierID?>'>
                                    <?= $r->SupplierName; ?>
                                </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">

                        <div class="form-group col-sm-6" style="text-align:left">
                            <label>Brand</label>
                            <input type="text" name="brand" id="brand" class="form-control" autocomplete="off" required>
                        </div>
                        <div class="form-group col-sm-6" style="text-align:left">
                            <label>PurchasePrice</label>
                            <input type="text" name="purchase_price" id="purchase_price" class="form-control"
                                autocomplete="off" required>
                        </div>
                    </div>
                    <div class="row">

                        <div class="form-group col-sm-6" style="text-align:left">
                            <label class="col-form-label">SellingPrice</label>
                            <input type="text" name="selling_price" id="selling_price" class="form-control"
                                autocomplete="off" required>
                        </div>
                        <div class="form-group col-sm-6" style="text-align:left">
                            <label>Unit</label>
                            <input type="text" name="unit" id="unit" class="form-control" autocomplete="off" required>
                        </div>
                    </div>
                    <!-- <div class="form-group col-sm-6" style="text-align:left">
                        <label style="text-align:left">Stock</label>
                        <input type="text" name="stock" id="stock" class="form-control" autocomplete="off" required>
                    </div> -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary" id="btn_save" name="btn_save"
                            onclick="validasi()">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?=$this->endSection();?>

<script type="text/javascript">
function validasi() {
    var kat = document.getElementById("category").value;
    alert("Please select Category first");

    // if ((kat == "") || (kat == 0)) {
    //     alert("Please select Category first");
    //     document.getElementById('category').focus();
    //     return false;
    // } else {
    //     return true;
    // }
}

// $(document).ready(function() {
//     $("#btn_save").click(function() {
//         var kat = document.getElementById("category").value;
//         if ((kat == "") || (kat == 0)) {
//             alert("Please select Category first");
//             document.getElementById('category').focus();
//             return false;
//         } else {
//             return true;
//         }
//     });
// })
</script>