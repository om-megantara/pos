<?= $this->extend('templates/main'); ?>
<?= $this->section('admin-content');?>

<link rel="stylesheet" href="<?=base_url('public/plugins');?>/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="<?=base_url('public/plugins');?>/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="<?=base_url('public/plugins');?>/select2/css/select2.min.css">
<link rel="stylesheet" href="<?=base_url('public/plugins');?>/select2-bootstrap4-theme/select2-bootstrap4.min.css">

<!-- 
<link rel="stylesheet" href="<?=base_url('public/plugins/ol');?>/css/bootstrap.min.css">
<link rel="stylesheet" href="<?=base_url('public/plugins/ol');?>/css/bootstrap-select.min.css">
<script src="<?=base_url('public/plugins/ol');?>/js/jquery.min.js"></script>
<script src="<?=base_url('public/plugins/ol');?>/js/bootstrap.bundle.min.js"></script>
<script src="<?=base_url('public/plugins/ol');?>/js/bootstrap-select.min.js"></script>
<script src="<?=base_url('public/plugins/ol');?>/js/jquery-2.2.4.min.js"></script> -->

<script src="<?=base_url('public/js');?>/jquery.js"></script>
<!-- <link rel="stylesheet" href="<?=base_url('public/css');?>/bootstrap.min.css"> -->



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
                                        <div class="card-body ">
                                            <form method="POST" enctype="multipart/form-data"
                                                action="<?= base_url('transaction/save_selling_temp/');?>">
                                                <!-- <form method="POST" enctype="multipart/form-data" action=""> -->
                                                <?php csrf_field(); ?>
                                                <div class="control-group after-add-more">

                                                    <div class="control-group">
                                                        <table width="100%">
                                                            <thead>
                                                                <tr>
                                                                    <!-- <th style="width: 10px">#</th> -->
                                                                    <th width="15%" style="text-align:center">ProductID
                                                                    </th>
                                                                    <th width="35%" style="text-align:center">
                                                                        ProductName</th>
                                                                    <th width="20%" style="text-align:center">Price</th>
                                                                    <th width="20%" style="text-align:center">Qty</th>
                                                                    <th width="10%" style="text-align:center"></th>
                                                                    <!-- <th style="width: 40px">Add</th> -->
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <!-- <div class="row"> -->
                                                                <tr>
                                                                    <!-- <div class="row"> -->
                                                                    <td>
                                                                        <div class="form-group">
                                                                            <label>ENTER Product ID/Name</label>
                                                                            <!-- <select class="form-control select2" style="width: 100%;" name="cari" -->
                                                                            <select class="form-control"
                                                                                style="width: 100%;" name="cari"
                                                                                id="cari">
                                                                                <option selected="selected"></option>
                                                                                <?php  foreach($list as $p):?>
                                                                                <option value="<?= $p->ProductID;?>">
                                                                                    <?= $p->ProductID .' - '.$p->ProductName;?>
                                                                                </option>
                                                                                <?php endforeach; ?>
                                                                            </select>
                                                                        </div>
                                                                        <!-- <div class=" col-md-2"> -->
                                                                        <input type="text" name="product_id[]"
                                                                            id="product_id[]" class="form-control">
                                                                        <!-- </div> -->
                                                                    </td>
                                                                    <td>
                                                                        <!-- <div class=" col-md-2"> -->
                                                                        <input type="text" name="product_name[]"
                                                                            id="product_name[]" class="form-control">
                                                                        <!-- </div> -->
                                                                    </td>
                                                                    <td>
                                                                        <!-- <div class="col-md-2"> -->
                                                                        <input type="text" name="product_price[]"
                                                                            id="product_price[]" class="form-control">
                                                                        <!-- </div> -->
                                                                    </td>
                                                                    <td>
                                                                        <!-- <div class=" col-md-2"> -->
                                                                        <input type="text" name="product_qty[]"
                                                                            id="product_qty[]" class="form-control">
                                                                        <!-- </div> -->
                                                                    </td>
                                                                    <td>
                                                                        <!-- <div class=" col-md-2"> -->
                                                                        <button class="btn btn-success add-more"
                                                                            type="button">
                                                                            <i class="fas fa-plus"></i>
                                                                        </button>
                                                                        <!-- </div> -->
                                                                    </td>
                                                                    <!-- <hr> -->
                                                                </tr>
                                                            </tbody>
                                                            <!-- <hr> -->
                                                        </table>
                                                        <!-- </div> -->
                                                    </div>
                                                </div>
                                                <div class="copy invisible">
                                                    <div class="control-group">
                                                        <table width="100%">
                                                            <thead></thead>
                                                            <tbody>
                                                                <tr>
                                                                    <!-- <div class="row"> -->
                                                                    <td width="15%">
                                                                        <div class="form-group">
                                                                            <label>ENTER Product ID/Name</label>
                                                                            <!-- <select class="form-control select2" style="width: 100%;" name="cari" -->
                                                                            <select class="form-control"
                                                                                style="width: 100%;" name="cari"
                                                                                id="cari">
                                                                                <option selected="selected"></option>
                                                                                <?php  foreach($list as $p):?>
                                                                                <option value="<?= $p->ProductID;?>">
                                                                                    <?= $p->ProductID .' - '.$p->ProductName;?>
                                                                                </option>
                                                                                <?php endforeach; ?>
                                                                            </select>
                                                                        </div>
                                                                        <!-- <div class=" col-md-2"> -->
                                                                        <input type="text" name="product_id[]"
                                                                            id="product_id[]" class="form-control">
                                                                        <!-- </div> -->
                                                                    </td>
                                                                    <td width="35%">
                                                                        <!-- <div class=" col-md-2"> -->
                                                                        <input type="text" name="product_name[]"
                                                                            id="product_name[]" class="form-control">
                                                                        <!-- </div> -->
                                                                    </td>
                                                                    <td width="20%">
                                                                        <!-- <div class="col-md-2"> -->
                                                                        <input type="text" name="product_price[]"
                                                                            id="product_price[]" class="form-control">
                                                                        <!-- </div> -->
                                                                    </td>
                                                                    <td width="20%">
                                                                        <!-- <div class=" col-md-2"> -->
                                                                        <input type="text" name="product_qty[]"
                                                                            id="product_qty[]" class="form-control">
                                                                        <!-- </div> -->
                                                                    </td>
                                                                    <td width="10%">
                                                                        <!-- <div class=" col-md-2"> -->
                                                                        <button class="btn btn-danger remove"
                                                                            type="button"><i
                                                                                class="fas fa-window-close"></i>
                                                                        </button>
                                                                        <!-- </div> -->
                                                                    </td>
                                                                    <!-- <hr> -->
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <!-- </div> -->
                                                    </div>
                                                </div>
                                                <!-- <div class="row"> -->
                                                <!-- <br> -->
                                                <button class="btn btn-success" type="submit">Submit</button>
                                                <!-- </div> -->
                                            </form>
                                        </div>
                                        <!-- /.card-body -->
                                    </div>
                                    <!-- /.card -->


                                    <!-- /.card -->
                                </div>
                                <!-- /.col -->
                            </div>


                        </div>
                </div>
            </div>
</section>

<!-- <script src="<?=base_url('public/plugins');?>/select2/js/select2.full.min.js"></script> -->

<script type="text/javascript">
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
                document.getElementById('product_id[]').value = result["product_id"];
                document.getElementById('product_name[]').value = result["product_name"];
                document.getElementById('product_price[]').value = result["harga_jual"];
                // document.getElementById('product_qty').style.visibility = "visible";
                document.getElementById('product_qty[]').removeAttribute("readonly");
                document.getElementById('product_qty[]').focus();
                $('#btn_chart').prop('disabled', false);

                // document.getElementsByTagName("product_qty")[0].setAttribute("readonly",
                // true);
                // document.getElementById('product_stock').value = result["stok"];
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
                document.getElementById('customer_name').value = result["customer_name"];
                document.getElementById('customer_address').value = result[
                    "customer_address"];
                document.getElementById('customer_phone').value = result["customer_phone"];
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

    $("#btn_save").click(function() {
        var nama = document.getElementById("customer_id").value;
        if (nama == "") {
            alert("Please select customer first");
            document.getElementById('cari_customer').focus();
            return false;
        } else {
            return true;
        }
    });

    $("#btn_add").click(function() {
        var isi = document.getElementById("product_qty").value;
        // var nama = document.getElementById("customer_id").value;
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
        // if (nama == "") {
        //     alert("Please select customer first");
        //     document.getElementById('cari_customer').focus();
        //     return false;
        //     // } else {
        //     //     return true;

        // }
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
    $(document).ready(function() {
        $(".add-more").click(function() {
            var html = $(".copy").html();
            document.getElementById('product_id[]').value = document.getElementById(
                "product_id[]").value;
            $(".after-add-more").after(html);
            // alert("Please select customer first");
            // document.getElementById('product_id[]').value = document.getElementById(
            //     "product_id[]").value;
            // document.getElementById('product_name[]').value = result["product_name"];
            // document.getElementById('product_price[]').value = result["harga_jual"];
        });

        // saat tombol remove dklik control group akan dihapus 
        $("body").on("click", ".remove", function() {
            $(this).parents(".control-group").remove();
        });
    });
});
</script>

<?=$this->endSection();?>