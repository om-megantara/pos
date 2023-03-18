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
                <!-- <a href="<?=base_url('transaction/selling')?> ">
                    <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#add_product"
                        data-dismiss="modal"><i class="fas fa-sm fa-plus"></i> Add Sales
                    </button>
                </a> -->

                <!-- <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#add_product"
                    data-dismiss="modal"><i class="fas fa-sm fa-plus"></i> Add Sales</button> -->
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
                            <th width="8%" style="text-align:center;vertical-align:middle;padding:0.2rem;">ProductID
                            </th>
                            <th width="17%" style="text-align:center;vertical-align:middle;padding:0.2rem;">Product
                                Name
                            </th>
                            <th width="12%" style="text-align:center;vertical-align:middle;padding:0.2rem;">Purchase
                                Price
                            </th>
                            <th width="12%" style="text-align:center;vertical-align:middle;padding:0.2rem;">Selling
                                Price
                            </th>
                            <th width="8%" style="text-align:center;vertical-align:middle;padding:0.2rem;">Qty Selling
                            </th>
                            <th width="12%" style="text-align:center;vertical-align:middle;padding:0.2rem;">Total
                                Purchase</th>
                            <th width="12%" style="text-align:center;vertical-align:middle;padding:0.2rem;">Total
                                Selling</th>
                            <th width="12%" style="text-align:center;vertical-align:middle;padding:0.2rem;">Profit</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1;$Gprofit=0; foreach($list as $p):?>
                        <tr>
                            <td style='padding:0.2rem;text-align:center;'><?= $no;?></td>
                            <td style='padding:0.2rem;'><?= htmlentities(strtoupper($p->ProductID), ENT_QUOTES);?></td>
                            <td style='padding:0.2rem;'><?= htmlentities($p->ProductName, ENT_QUOTES);?></td>
                            <td style='padding:0.2rem;'>
                                <?= 'Rp ' . number_format(htmlentities($p->PurchasePrice, ENT_QUOTES), 2, ",", ".");?>
                            </td>
                            <td style='padding:0.2rem;'>
                                <?= 'Rp ' . number_format(htmlentities($p->SellingPrice, ENT_QUOTES), 2, ",", ".");?>
                            </td>
                            <td style='padding:0.2rem;text-align:center;'><?= htmlentities($p->Qty, ENT_QUOTES);?></td>
                            <?php 
                                $TotalPurchase=$p->PurchasePrice*$p->Qty;
                                $TotalSelling=$p->SellingPrice*$p->Qty;
                                $Profit=$TotalSelling-$TotalPurchase;
                                $Gprofit=$Profit+$Gprofit;

                            ?>
                            <td style='padding:0.2rem;'>
                                <?= 'Rp ' . number_format(htmlentities($TotalPurchase, ENT_QUOTES), 2, ",", ".");?></td>
                            <td style='padding:0.2rem;'>
                                <?= 'Rp ' . number_format(htmlentities($TotalSelling, ENT_QUOTES), 2, ",", ".");?></td>
                            <td style='padding:0.2rem;text-align:center;'>
                                <?= 'Rp ' . number_format(htmlentities($Profit, ENT_QUOTES), 2, ",", ".");?>
                            </td>

                        </tr>
                        <?php $no++; endforeach; ?>


                    </tbody>
                    <tfoot>
                        <tr>
                            <th width="7%" style="text-align:center;vertical-align:middle;padding:0.2rem;">No</th>
                            <th width="8%" style="text-align:center;vertical-align:middle;padding:0.2rem;">ProductID
                            </th>
                            <th width="17%" style="text-align:center;vertical-align:middle;padding:0.2rem;">Product
                                Name
                            </th>
                            <th width="12%" style="text-align:center;vertical-align:middle;padding:0.2rem;">Purchase
                                Price
                            </th>
                            <th width="12%" style="text-align:center;vertical-align:middle;padding:0.2rem;">Selling
                                Price
                            </th>
                            <th width="8%" style="text-align:center;vertical-align:middle;padding:0.2rem;">Qty Selling
                            </th>
                            <th width="12%" style="text-align:center;vertical-align:middle;padding:0.2rem;">Total
                                Purchase</th>
                            <th width="12%" style="text-align:center;vertical-align:middle;padding:0.2rem;">Total
                                Selling</th>
                            <th width="12%" style="text-align:center;vertical-align:middle;padding:0.2rem;">Profit</th>
                        </tr>
                    </tfoot>
                </table>
                <table class="table table">
                    <tr>
                        <td style="text-align:center;font-size: 20px;color:blue;"><label
                                style="text-align:center;font-size: 20px;">Total Profit:</label></td>
                        <td style="text-align:center;font-size: 20px;color:blue;"><label
                                style="text-align:center;font-size: 20px;"><?= 'Rp ' . number_format(htmlentities($Gprofit, ENT_QUOTES), 2, ",", ".");?></label>
                        </td>
                    </tr>
                </table>

            </div>
            <!-- /.card-body -->
        </div>
    </div><!-- /.container-fluid -->
</section>



<?=$this->endSection();?>