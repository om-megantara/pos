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
                    <?php if (!empty(session()->getFlashdata('error'))) : ?>
                    &nbsp;
                    <div class="alert alert-danger alert-dismissible fade show" style="padding:0" role="alert">
                        <?php echo session()->getFlashdata('error'); ?>
                    </div>
                    <?php endif; ?>
                    <thead>
                        <tr>
                            <th width="10%" style="text-align:center;vertical-align:middle;padding:0.2rem;">No</th>
                            <th width="10%" style="text-align:center;vertical-align:middle;padding:0.2rem;">PO Number
                            </th>
                            <th width="30%" style="text-align:center;vertical-align:middle;padding:0.2rem;">Supplier
                                Name
                            </th>
                            <th width="10%" style="text-align:center;vertical-align:middle;padding:0.2rem;">Total Item
                            </th>
                            <th width="15%" style="text-align:center;vertical-align:middle;padding:0.2rem;">Total</th>
                            <th width="15%" style="text-align:center;vertical-align:middle;padding:0.2rem;">Date</th>
                            <th width="10%" style="text-align:center;vertical-align:middle;padding:0.2rem;"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; foreach($list as $p):?>
                        <tr>
                            <td style='padding:0.2rem;text-align:center;'><?= $no;?></td>
                            <td style='padding:0.2rem;'><?= htmlentities(strtoupper($p->POID), ENT_QUOTES);?></td>
                            <td style='padding:0.2rem;'><?= htmlentities($p->SupplierName, ENT_QUOTES);?></td>
                            <td style='padding:0.2rem;'><?= htmlentities($p->Item, ENT_QUOTES);?></td>
                            <td style='padding:0.2rem;text-align:center;'>
                                <?= 'Rp ' . number_format(htmlentities($p->Total, ENT_QUOTES), 2, ",", ".");?>
                            </td>
                            <td style='padding:0.2rem;text-align:center;'>
                                <?= htmlentities($p->DateInput, ENT_QUOTES);?>
                            </td>
                            <td style='padding:0.2rem;text-align:center;'>

                                <button type="submit" class="btn btn-info btn-sm" data-toggle="modal" id="dialogBtn"
                                    data-target="#detail_selling<?= $no;?>" data-dismiss="modal" title="Detail"><i
                                        class="fas fa-eye"></i> Detail
                                </button>
                                <div class="modal fade " id="detail_selling<?= $no;?>" tabindex="-1" role="dialog"
                                    aria-labelledby="detail_selling" aria-hidden="true">
                                    <div class="modal-dialog modal-xl" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h2 class="modal-title" id="detail">Detail PO#<?= $p->POID?></h2>
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
                                                            <th width="10%">PO Number</th>
                                                            <th width="10%">Product ID</th>
                                                            <th width="32%">Product Name</th>
                                                            <th width="10%">QTY</th>
                                                            <th width="15%">Purchase Price</th>
                                                            <th width="15%">Sub Total</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php 
                                                                $nod=1; 
                                                                $gtot=0;
                                                                foreach($detail as $q):
                                                                if ($p->POID==$q->POID){ 
                                                                    if ($nod % 2 == 0){;?>
                                                        <tr style="background-color: #f8f9fa;">
                                                            <?php }else{ ?>
                                                        <tr style="background-color: #fff;">
                                                            <?php } ?>
                                                            <td>
                                                                <?= $nod;?>
                                                            </td>
                                                            <td>
                                                                <?= htmlentities(strtoupper($q->POID), ENT_QUOTES);?>
                                                            </td>
                                                            <td>
                                                                <?= htmlentities(strtoupper($q->ProductID), ENT_QUOTES);?>
                                                            </td>
                                                            <td style="text-align:left">
                                                                <?= htmlentities(strtoupper($q->ProductName), ENT_QUOTES);?>
                                                            </td>
                                                            <td>
                                                                <?= htmlentities(strtoupper($q->Qty), ENT_QUOTES);?>
                                                            </td>
                                                            <td>
                                                                <?= 'Rp ' . number_format(htmlentities($q->Price, ENT_QUOTES), 2, ",", ".");?>
                                                            </td>
                                                            <td>
                                                                <?= 'Rp ' . number_format(htmlentities($q->SubTotal, ENT_QUOTES), 2, ",", ".");$gtot=$q->SubTotal+$gtot;?>
                                                            </td>
                                                        </tr>

                                                        <?php $nod++; }else{
                                                                    //$nod=1;
                                                                }?>

                                                    </tbody>

                                                    <?php 
                                                                endforeach; ?>
                                                    <tr>
                                                        <td colspan="5" style="font: size 15px; font-weight:bold">Grand
                                                            Total</td>
                                                        <td colspan="2" style="font: size 15px;font-weight:bold">
                                                            <?= 'Rp ' . number_format(htmlentities($gtot, ENT_QUOTES), 2, ",", ".");?>
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
                                <a href="<?= base_url('report/report_selling_print/'.$p->POID);?>"><button type="submit"
                                        class="btn btn-success btn-xs dtbutton" data-dismiss="modal"><i
                                            class="fas fa-print"></i> Print</button></a>
                            </td>


                        </tr>
                        <?php $no++; endforeach; ?>


                    </tbody>
                    <tfoot>
                        <tr>
                            <th width="10%" style="text-align:center;vertical-align:middle;padding:0.2rem;">No</th>
                            <th width="10%" style="text-align:center;vertical-align:middle;padding:0.2rem;">PO Number
                            </th>
                            <th width="30%" style="text-align:center;vertical-align:middle;padding:0.2rem;">Supplier
                                Name
                            </th>
                            <th width="10%" style="text-align:center;vertical-align:middle;padding:0.2rem;">Total Item
                            </th>
                            <th width="15%" style="text-align:center;vertical-align:middle;padding:0.2rem;">Total</th>
                            <th width="15%" style="text-align:center;vertical-align:middle;padding:0.2rem;">Date</th>
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