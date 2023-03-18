<?= $this->extend('templates/main'); ?>
<?= $this->section('admin-content');?>

<link rel="stylesheet" href="<?=base_url('public/plugins');?>/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="<?=base_url('public/plugins');?>/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="<?=base_url('public/plugins');?>/select2/css/select2.min.css">
<link rel="stylesheet" href="<?=base_url('public/plugins');?>/select2-bootstrap4-theme/select2-bootstrap4.min.css">
<!-- <link rel="stylesheet" href="<?php echo base_url();?>tool/adminlte/bower_components/select2/dist/css/select2.min.css"> -->
<!-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> -->

<link rel="stylesheet" href="<?=base_url('public/plugins/ol');?>/css/bootstrap.min.css">
<link rel="stylesheet" href="<?=base_url('public/plugins/ol');?>/css/bootstrap-select.min.css">
<script src="<?=base_url('public/plugins/ol');?>/js/jquery.min.js"></script>
<script src="<?=base_url('public/plugins/ol');?>/js/bootstrap.bundle.min.js"></script>
<script src="<?=base_url('public/plugins/ol');?>/js/bootstrap-select.min.js"></script>
<script src="<?=base_url('public/plugins/ol');?>/js/jquery-2.2.4.min.js"></script>

<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css"> -->
<!-- <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/css/bootstrap-select.min.css"> -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.bundle.min.js"></script> -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/js/bootstrap-select.min.js"></script> -->

<!-- <link rel="stylesheet" href="<?= base_url('assets/'); ?>plugins/checkout/form-validation.css">
<script src="<?= base_url('assets/'); ?>plugins/checkout/form-validation.js"></script> -->
<!-- <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script> -->


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
                                        <div class="card-body p-0">
                                            <form method="POST" enctype="multipart/form-data"
                                                action="<?= base_url('transaction/save_selling_temp/');?>">
                                                <!-- <form method="POST" enctype="multipart/form-data" action=""> -->
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
                                                                <!-- <button class="btn btn-success add-more col-md-2"
                                                                    type="button">
                                                                    <i class="glyphicon glyphicon-plus"></i> +
                                                                </button> -->
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
                                <form action="proses.php" method="POST">
                                    <div class="control-group after-add-more">
                                        <label>Nama</label>
                                        <input type="text" name="nama[]" class="form-control">
                                        <label>Jenis Kelamin</label>
                                        <input type="text" name="jk[]" class="form-control">
                                        <label>Alamat</label>
                                        <input type="text" name="alamat[]" class="form-control">
                                        <label>Jurusan</label>
                                        <select class="form-control" name="jurusan[]">
                                            <option>Sistem Informasi</option>
                                            <option>Informatika</option>
                                            <option>Akuntansi</option>
                                            <option>DKV</option>
                                        </select>
                                        <br>
                                        <button class="btn btn-success add-more" type="button">
                                            <i class="glyphicon glyphicon-plus"></i> Add
                                        </button>
                                        <hr>
                                    </div>
                                    <button class="btn btn-success" type="submit">Submit</button>
                                </form>

                                <!-- class hide membuat form disembunyikan  -->
                                <!-- hide adalah fungsi bootstrap 3, klo bootstrap 4 pake invisible  -->
                                <div class="copy hide">
                                    <div class="control-group">
                                        <label>Nama</label>
                                        <input type="text" name="nama[]" class="form-control">
                                        <label>Jenis Kelamin</label>
                                        <input type="text" name="jk[]" class="form-control">
                                        <label>Alamat</label>
                                        <input type="text" name="alamat[]" class="form-control">
                                        <label>Jurusan</label>
                                        <select class="form-control" name="jurusan">
                                            <option>Sistem Informasi</option>
                                            <option>Informatika</option>
                                            <option>Akuntansi</option>
                                            <option>DKV</option>
                                        </select>
                                        <br>
                                        <button class="btn btn-danger remove" type="button"><i
                                                class="glyphicon glyphicon-remove"></i> Remove</button>
                                        <hr>
                                    </div>
                                </div>
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

    $("#btn_chart").click(function() {
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
            $(".after-add-more").after(html);
        });

        // saat tombol remove dklik control group akan dihapus 
        $("body").on("click", ".remove", function() {
            $(this).parents(".control-group").remove();
        });
    });
});
</script>

<?=$this->endSection();?>