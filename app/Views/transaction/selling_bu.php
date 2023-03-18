<?= $this->extend('templates/main'); ?>
<?= $this->section('admin-content');?>

<link rel="stylesheet" href="<?=base_url('public/plugins');?>/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="<?=base_url('public/plugins');?>/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="<?=base_url('public/plugins');?>/select2/css/select2.min.css">
<link rel="stylesheet" href="<?=base_url('public/plugins');?>/select2-bootstrap4-theme/select2-bootstrap4.min.css">
<!-- <link rel="stylesheet" href="<?php echo base_url();?>tool/adminlte/bower_components/select2/dist/css/select2.min.css"> -->
<!-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> -->

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/css/bootstrap-select.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/js/bootstrap-select.min.js"></script>

<!-- <link rel="stylesheet" href="<?= base_url('assets/'); ?>plugins/checkout/form-validation.css">
<script src="<?= base_url('assets/'); ?>plugins/checkout/form-validation.js"></script> -->
<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>


<div class="content-header">
    <!-- <div class="container-fluid">
        <div class="row mb-1">
            <div class="col-sm-6">
                <h1 class="m-0"><?=$title;?></h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?=base_url('user');?>"><?= $breadcrumb['control'];?></a></li>
                    <li class="breadcrumb-item active"><?= $breadcrumb['menu'];?></li>
                </ol>
            </div>

        </div>
    </div> -->
    <!-- <hr> -->
</div>
<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <section class="content">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title "><i class="fa fa-search"></i> Product ID/Name
                                            </h3>
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label>ENTER Customer ID/Name</label>
                                                <!-- <select class="form-control select2" style="width: 100%;" name="cari" -->
                                                <select class="form-control" style="width: 100%;" name="cari_customer"
                                                    id="cari_customer">
                                                    <option selected="selected"></option>
                                                    <?php  foreach($customer as $q):?>
                                                    <option value="<?= $q->CustomerID;?>">
                                                        <?= $q->CustomerID .' - '.$q->FullName;?>
                                                    </option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>ENTER Product ID/Name</label>
                                                <!-- <select class="form-control select2" style="width: 100%;" name="cari" -->
                                                <select class="form-control" style="width: 100%;" name="cari" id="cari">
                                                    <option selected="selected"></option>
                                                    <?php  foreach($list as $p):?>
                                                    <option value="<?= $p->ProductID;?>">
                                                        <?= $p->ProductID .' - '.$p->ProductName;?>
                                                    </option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <!-- /.col -->
                                <div class="col-md-8">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title"><i class="fa fa-list"></i> Result</h3>
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body p-0">
                                            <!-- <form method="POST" enctype="multipart/form-data"
                                                action="<?= base_url('transaction/save_selling_temp/');?>"> -->
                                            <form method="POST" enctype="multipart/form-data" action="">
                                                <?php csrf_field(); ?>
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <!-- <th style="width: 10px">#</th> -->
                                                            <th>ProductID</th>
                                                            <th>ProductName</th>
                                                            <th>Price</th>
                                                            <th>Qty</th>
                                                            <th>Stock</th>
                                                            <th style="width: 40px">Add</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <!-- <td>1.</td> -->
                                                            <td>

                                                                <input type="text" id="customer_id" name="customer_id"
                                                                    value="" class="form-control" placeholder=""
                                                                    readonly>
                                                                <input type="text" id="product_id" name="product_id"
                                                                    class="form-control" placeholder="Product ID"
                                                                    readonly>
                                                            </td>
                                                            <td>
                                                                <input type="text" id="product_name" name="product_name"
                                                                    class="form-control" placeholder="Product Name"
                                                                    readonly>
                                                            </td>
                                                            <td>
                                                                <input type="text" id="product_price"
                                                                    name="product_price" class="form-control"
                                                                    placeholder="Price" readonly>
                                                            </td>
                                                            <td>
                                                                <input type="text" id="product_qty" name="product_qty"
                                                                    class="form-control" placeholder="Qty" readonly>
                                                            </td>
                                                            <td>
                                                                <input type="text" id="product_stock"
                                                                    name="product_stock" class="form-control"
                                                                    placeholder="Stock" readonly>
                                                            </td>
                                                            <td>
                                                                <!-- <a href="<?= base_url('transaction/save_selling_temp/');?>"
                                                                    class="btn btn-success">
                                                                    <i class="fa fa-shopping-cart"></i>
                                                                </a> -->
                                                                <!-- <button type="submit" class="btn btn-success"
                                                                    data-dismiss="modal">Cancel</button> -->
                                                                <button type="submit" class="btn btn-success add-more"
                                                                    id="btn_chart" name="btn_chart" disabled><i
                                                                        class="fa fa-shopping-cart"></i></button>
                                                                <button class="btn btn-success add-more col-md-2"
                                                                    type="button">
                                                                    <i class="glyphicon glyphicon-plus"></i> +
                                                                </button>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </form>
                                        </div>
                                        <!-- /.card-body -->
                                    </div>
                                    <!-- /.card -->


                                    <!-- /.card -->
                                </div>
                                <!-- /.col -->
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card card-primary">
                                        <!-- <div class="card-header bg-primary text-white">
                                        <h5><i class="fa fa-shopping-cart"></i> KASIR
                                            <a class="btn btn-danger float-right"
                                                onclick="javascript:return confirm('Apakah anda ingin reset keranjang ?');"
                                                href="fungsi/hapus/hapus.php?penjualan=jual">
                                                <b>RESET Chart</b></a>
                                        </h5>
                                    </div> -->
                                        <div class="card-body">
                                            <div id="keranjang" class="table-responsive">
                                                <!-- <form method="POST" action=""> -->
                                                <form method="POST" enctype="multipart/form-data" name="MyForm2"
                                                    action="<?= base_url('transaction/save-selling')?>">
                                                    <?php csrf_field(); ?>
                                                    <!-- <table class="table table-bordered">
                                                        <tr>
                                                            <td width="40%"> -->
                                                    <!-- <div class="card-body"> -->
                                                    <!-- <div class="form-group"> -->
                                                    <!-- <label>ENTER Customer ID/Name</label> -->
                                                    <!-- <select class="form-control select2" style="width: 100%;" name="cari" -->
                                                    <!-- <select class="form-control" style="width: 100%;"
                                                                    name="cari_customer" id="cari_customer">
                                                                    <option selected="selected"></option>
                                                                    <?php  foreach($customer as $q):?>
                                                                    <option value="<?= $q->CustomerID;?>">
                                                                        <?= $q->CustomerID .' - '.$q->FullName;?>
                                                                    </option>
                                                                    <?php endforeach; ?>
                                                                </select> -->
                                                    <!-- </div> -->
                                                    <!-- </div> -->
                                                    <!-- </td>
                                                            <td width="100%">
                                                            </td>
                                                        </tr>
                                                    </table> -->
                                                    <input type="text" id="customer_id" name="customer_id" value=""
                                                        class="form-control" placeholder="" readonly>
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th> No</th>
                                                                <th> ProductID</th>
                                                                <th> Product Name</th>
                                                                <th style="width:10%;"> Quantity</th>
                                                                <th style="width:20%;"> Selling Price</th>
                                                                <th> Total</th>
                                                                <th> Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <!-- <form method="POST" action="fungsi/edit/edit.php?jual=jual"> -->
                                                            <?php $no=1;$gtot=0; foreach($trx as $r):?>

                                                            <tr>
                                                                <td><?= $no;?></td>
                                                                <td>

                                                                    <input type="text" id="product_id[]"
                                                                        value="<?= $r->ProductID;?>" name="product_id[]"
                                                                        class="form-control" placeholder="Stock"
                                                                        readonly>
                                                                </td>
                                                                <td>
                                                                    <input type="text" id="product_name[]"
                                                                        value="<?= $r->ProductName;?>"
                                                                        name="product_name[]" class="form-control"
                                                                        placeholder="Stock" readonly>
                                                                </td>
                                                                <td><input type="text" id="product_qty[]"
                                                                        value="<?= $r->Qty;?>" name="product_qty[]"
                                                                        class="form-control" style="text-align:right"
                                                                        placeholder="Stock" readonly>
                                                                </td>
                                                                <td>
                                                                    <input type="text" id="product_price[]"
                                                                        value="<?= htmlentities($r->SellingPrice, ENT_QUOTES);?>"
                                                                        name="product_price[]" class="form-control"
                                                                        hidden style="text-align:right"
                                                                        placeholder="Stock" readonly>
                                                                    <input type="text" id="product_price2[]"
                                                                        value="<?= 'Rp ' . number_format(htmlentities($r->SellingPrice, ENT_QUOTES), 2, ",", ".");?>"
                                                                        name="product_price2[]" class="form-control"
                                                                        style="text-align:right" placeholder="Stock"
                                                                        readonly>
                                                                </td>
                                                                <td>
                                                                    <input type="text" id="product_stotal[]"
                                                                        value="<?= htmlentities($r->Qty*$r->SellingPrice, ENT_QUOTES);$stot=$r->Qty*$r->SellingPrice;?>"
                                                                        name="product_stotal[]" class="form-control"
                                                                        hidden style="text-align:right"
                                                                        placeholder="Stock" readonly>
                                                                    <input type="text" id="product_stotal2[]"
                                                                        value="<?= 'Rp ' . number_format(htmlentities($r->Qty*$r->SellingPrice, ENT_QUOTES), 2, ",", ".");?>"
                                                                        name="product_stotal2[]" class="form-control"
                                                                        style="text-align:right" placeholder="Stock"
                                                                        readonly>

                                                                </td>

                                                                <td>
                                                                    <!-- <button type="submit"
                                                                    class="btn btn-warning">Update</button> -->

                                                                    <!-- aksi ke table penjualan -->
                                                                    <a href="<?= base_url('transaction/delete_selling_temp/'.$r->ProductID);?>"
                                                                        class="btn btn-danger"><i
                                                                            class="fa fa-times"></i>
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                            <?php 
                                                            $gtot=$stot+$gtot;
                                                            $no++; 
                                                            endforeach; 
                                                        ?>

                                                            <!-- </form> -->

                                                            <?php //$no++; $total_bayar += $isi['total'];}?>
                                                        </tbody>
                                                    </table>
                                                    <br />
                                                    <?php //$hasil = $lihat -> jumlah(); ?>
                                                    <div id="kasirnya">
                                                        <table class="table table-stripped">

                                                            <!-- aksi ke table nota -->
                                                            <!-- <form method="POST" -->
                                                            <!-- action="index.php?page=jual&nota=yes#kasirnya"> -->

                                                            <tr>
                                                                <td style="font-size: 25px;font-weight:bold">Grand Total
                                                                </td>
                                                                <td style="font-size: 25px;font-weight:bold">

                                                                    <?='Rp ' . number_format(htmlentities($gtot, ENT_QUOTES), 2, ",", ".");?>
                                                                    <input type="text" id="grand_total"
                                                                        value="<?=htmlentities($gtot, ENT_QUOTES);?>"
                                                                        name="grand_total" class="form-control" hidden
                                                                        style="text-align:right" placeholder="Stock"
                                                                        readonly>
                                                                </td>
                                                            </tr>

                                                        </table>
                                                        <!-- <br /> -->
                                                        <!-- <br /> -->
                                                        <div class="card-footer ">
                                                            <button type="submit" class="btn btn-primary float-right"
                                                                id="btn_save" name="btn_save"><i class="fa fa-save"></i>
                                                                Save
                                                            </button>
                                                        </div>
                                                    </div>

                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
</section>

<!-- <script src="<?=base_url('public/plugins');?>/select2/js/select2.full.min.js"></script> -->

<script>
// AJAX call for autocomplete 
$(document).ready(function() {
    // $('.select2').select2()
    // document.getElementById('product_qty').style.visibility = "hidden";
    // document.getElementById('btn_chart').setAttribute("readonly");

    // //Initialize Select2 Elements
    // $('.select2bs4').select2({
    //     theme: 'bootstrap4'
    // })
    // $('#cari').on('change', function() {
    //     const selectedPackage = $('#cari').val();
    //     $('#selected').text(selectedPackage);
    // });
    $("#cari").change(function() {
        var product_id = $(this).val();
        // messagebox('cst_id');
        $.ajax({
            url: "<?php echo site_url('transaction/view-product?id=');?>" +
                product_id, //"lala.php",
            method: "post",
            cache: false,
            dataType: "json",
            data: {
                id: product_id
            }, //id ini berisi comboid untuk parameter GET di php
            success: function(result) {
                document.getElementById('product_id').value = result["product_id"];
                document.getElementById('product_name').value = result["product_name"];
                document.getElementById('product_price').value = result["harga_jual"];
                // document.getElementById('product_qty').style.visibility = "visible";
                document.getElementById('product_qty').removeAttribute("readonly");
                document.getElementById('product_qty').focus();
                $('#btn_chart').prop('disabled', false);

                // document.getElementsByTagName("product_qty")[0].setAttribute("readonly",
                // true);
                document.getElementById('product_stock').value = result["stok"];
            }
        });
    });

    $("#cari_customer").change(function() {
        var customer_id = $(this).val();
        // messagebox('cst_id');
        $.ajax({
            url: "<?php echo site_url('transaction/view-customer?id=');?>" +
                customer_id, //"lala.php",
            method: "post",
            cache: false,
            dataType: "json",
            data: {
                id: customer_id
            }, //id ini berisi comboid untuk parameter GET di php
            success: function(result) {
                document.getElementById('customer_id').value = result["customer_id"];
                document.getElementById('MyForm2').getElementById('customer_id').value =
                    result["customer_id"];
                // document.getElementById('customer_name').value = result["customer_name"];
                // document.getElementById('product_price').value = result["harga_jual"];
                // // document.getElementById('product_qty').style.visibility = "visible";
                // document.getElementById('product_qty').removeAttribute("readonly");
                // document.getElementById('product_qty').focus();
                // $('#btn_chart').prop('disabled', false);

                // // document.getElementsByTagName("product_qty")[0].setAttribute("readonly",
                // // true);
                // document.getElementById('product_stock').value = result["stok"];
            }
        });
    });

    $("#btn_chart").click(function() {
        var isi = document.getElementById("product_qty").value;
        var nama = document.getElementById("customer_id").value;
        if (isi == "") {
            alert("Qty can't be empty");
            document.getElementById('product_qty').focus();
            return false;
        } else {
            if (isi <= 0) {
                alert("Qty must be greater than 0");
                document.getElementById('product_qty').focus();
                return false;
                // } else {
                //     return true;
            }
        }
        if (nama == "") {
            alert("Please select customer first");
            document.getElementById('cari_customer').focus();
            return false;
            // } else {
            //     return true;

        }
        return true;

        // document.getElementById("customer_id").value = nama;
        // document.getElementById("cari_customer").value = nama;
        // base_url('transaction/save_selling_temp/'
        // $.ajax({
        //     url: "<?php echo site_url('transaction/save_selling_temp/');?>" +
        //         customer_id, //"lala.php",
        //     method: "post",
        //     cache: false,
        //     dataType: "json",
        //     data: {
        //         id: nama
        //     },
        //     success: function(result) {
        //         document.getElementById('customer_id').value = result["customer_id"];

        //     }
        //     // return true;
        // });
    });
    $(".add-more").click(function() {
        if (document.getElementById("product2").value == "0") {
            alert("Select Product First");
            document.getElementById("product2").value = "0";
        } else {
            var html = $(".copy").html();
            $(".after-add-more").after(html);
            $('#product2').val('0'); // Change the value or make some change to the internal state
            $('#product2').trigger('change.select2'); // Notify only Select2 of changes
            document.getElementById("type2").value = "";
            document.getElementById("product2").value = "0";
        }
    });
});
</script>

<?=$this->endSection();?>