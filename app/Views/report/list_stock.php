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
                            <th width="10%" style="text-align:center;vertical-align:middle;padding:0.2rem;">No</th>
                            <th width="10%" style="text-align:center;vertical-align:middle;padding:0.2rem;">Product ID
                            </th>
                            <th width="30%" style="text-align:center;vertical-align:middle;padding:0.2rem;">Product
                                Name
                            </th>
                            <th width="10%" style="text-align:center;vertical-align:middle;padding:0.2rem;">Stock
                            </th>
                            <!-- <th width="15%" style="text-align:center;vertical-align:middle;padding:0.2rem;">Plus</th> -->
                            <!-- <th width="15%" style="text-align:center;vertical-align:middle;padding:0.2rem;">Minus</th> -->
                            <!-- <th width="15%" style="text-align:center;vertical-align:middle;padding:0.2rem;">Stock</th> -->
                            <!-- <th width="10%" style="text-align:center;vertical-align:middle;padding:0.2rem;">Purchase
                                Price</th> -->
                            <!-- <th width="10%" style="text-align:center;vertical-align:middle;padding:0.2rem;">Selling
                                Price</th>
                            <th width="7%" style="text-align:center;vertical-align:middle;padding:0.2rem;">Unit</th>
                            <th width="7%" style="text-align:center;vertical-align:middle;padding:0.2rem;">Stock</th> -->
                            <th width="10%" style="text-align:center;vertical-align:middle;padding:0.2rem;"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; foreach($list as $p):?>
                        <tr>
                            <td style='padding:0.2rem;text-align:center;'><?= $no;?></td>
                            <td style='padding:0.2rem;'><?= htmlentities(strtoupper($p->ProductID), ENT_QUOTES);?></td>
                            <td style='padding:0.2rem;'><?= htmlentities($p->ProductName, ENT_QUOTES);?></td>
                            <td style='padding:0.2rem;text-align:center;'><?= htmlentities($p->Stock, ENT_QUOTES);?>
                            </td>


                            <td style='padding:0.2rem;text-align:center;'>
                                <!-- <a href="<?= base_url('transaction/po-update/').$p->ProductID ?>"><button type="submit"
                                        class="btn btn-success btn-xs dtbutton" data-dismiss="modal"><i
                                            class="fas fa-eye"></i> Detail</button></a> -->
                                <button type="submit" class="btn btn-info btn-sm" data-toggle="modal" id="dialogBtn"
                                    data-target="#detail_selling<?= $no;?>" data-dismiss="modal" title="Detail"><i
                                        class="fas fa-eye"></i> Detail
                                </button>
                                <div class="modal fade " id="detail_selling<?= $no;?>" tabindex="-1" role="dialog"
                                    aria-labelledby="detail_selling" aria-hidden="true">
                                    <div class="modal-dialog modal-xl" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h2 class="modal-title" id="detail">Stock Mutation Details
                                                    Product#<?= $p->ProductID."  ".$p->ProductName?></h2>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <table class="table table-bordered table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th width="8%">No</th>
                                                            <!-- <th width="10%">Product ID</th> -->
                                                            <th width="10%">Date Update</th>
                                                            <th width="10%">Information</th>
                                                            <!-- <th width="32%">Product Name</th> -->
                                                            <th width="10%">Last Stock</th>
                                                            <th width="10%">+/-</th>
                                                            <th width="15%">Stock Now</th>
                                                            <!-- <th width="15%">Sub Total</th> -->
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php 
                                                                $nod=1; 
                                                                $gtot=0;
                                                                foreach($detail as $q):
                                                                if ($p->ProductID==$q->ProductID){ 
                                                                    if ($nod % 2 == 0){;?>
                                                        <tr style="background-color: #f8f9fa;">
                                                            <?php }else{ ?>
                                                        <tr style="background-color: #fff;">
                                                            <?php } ?>
                                                            <td>
                                                                <?= $nod;?>
                                                            </td>
                                                            <!-- <td>
                                                                <?= htmlentities(strtoupper($q->Ket), ENT_QUOTES);?>

                                                            </td> -->
                                                            <td>
                                                                <?= htmlentities(strtoupper($q->UpdateDate), ENT_QUOTES);?>

                                                            </td>
                                                            <td>
                                                                <?= htmlentities(strtoupper($q->Ket), ENT_QUOTES);?>
                                                            </td>

                                                            <td>
                                                                <?= htmlentities(strtoupper($q->Stock_awal), ENT_QUOTES);?>

                                                            </td>
                                                            <td>
                                                                <?= htmlentities(strtoupper($q->StockUpdate), ENT_QUOTES);?>
                                                            </td>
                                                            <td>
                                                                <?= htmlentities(strtoupper($q->Stock_Sekarang), ENT_QUOTES);?>

                                                            </td>
                                                        </tr>

                                                        <?php $nod++; $StockSekarang=$q->Stock_Sekarang; }else{
                                                                    //$nod=1;
                                                                }?>

                                                    </tbody>

                                                    <?php 
                                                                endforeach; ?>
                                                    <tr>
                                                        <td colspan="4" style="font: size 15px; font-weight:bold">
                                                            Current Stock
                                                            <?= $q->ProductID." - ".$q->ProductName;?>
                                                        </td>
                                                        <td colspan="5" style="font: size 15px; font-weight:bold">
                                                            <?= $StockSekarang;?>
                                                        </td>
                                                    </tr>
                                                    <!-- <div class="modal-footer">
                                                                <button type="submit" class="btn btn-secondary"
                                                                    data-dismiss="modal">Cancel</button>
                                                                <button type="submit" class="btn btn-primary">Save</button>
                                                            </div> -->
                                                </table>
                                                <!-- </div> -->

                                                <!-- </form> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <a href="<?= base_url('report/report_stoct_print/'.$p->ProductID);?>"><button
                                        type="submit" class="btn btn-success btn-sm" data-dismiss="modal"><i
                                            class="fas fa-print"></i> Print</button></a>
                            </td>


                        </tr>
                        <?php $no++; endforeach; ?>

                    </tbody>
                    <tfoot>
                        <tr>
                            <th width="10%" style="text-align:center;vertical-align:middle;padding:0.2rem;">No</th>
                            <th width="10%" style="text-align:center;vertical-align:middle;padding:0.2rem;">Product ID
                            </th>
                            <th width="30%" style="text-align:center;vertical-align:middle;padding:0.2rem;">Product
                                Name
                            </th>
                            <th width="10%" style="text-align:center;vertical-align:middle;padding:0.2rem;">Stock
                            </th>
                            <!-- <th width="15%" style="text-align:center;vertical-align:middle;padding:0.2rem;">Plus</th> -->
                            <!-- <th width="15%" style="text-align:center;vertical-align:middle;padding:0.2rem;">Minus</th> -->
                            <!-- <th width="15%" style="text-align:center;vertical-align:middle;padding:0.2rem;">Stock</th> -->
                            <!-- <th width="10%" style="text-align:center;vertical-align:middle;padding:0.2rem;">Purchase
                                Price</th> -->
                            <!-- <th width="10%" style="text-align:center;vertical-align:middle;padding:0.2rem;">Selling
                                Price</th>
                            <th width="7%" style="text-align:center;vertical-align:middle;padding:0.2rem;">Unit</th>
                            <th width="7%" style="text-align:center;vertical-align:middle;padding:0.2rem;">Stock</th> -->
                            <th width="10%" style="text-align:center;vertical-align:middle;padding:0.2rem;"></th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </div><!-- /.container-fluid -->
</section>



<?=$this->endSection();?>