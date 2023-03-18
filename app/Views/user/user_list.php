<?= $this->extend('templates/main'); ?>
<?= $this->section('admin-content');?>

<!-- <link rel="stylesheet" href="<?=base_url('public/adm/plugins');?>/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet"
    href="<?=base_url('public/adm/plugins');?>/datatables-responsive/css/responsive.bootstrap4.min.css"> -->


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
            <div class="card-header">
                <a href="<?= base_url('/admin/register/');?>" class="btn btn-sm btn-primary"><i class="fas fa-save"></i>
                    Add</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th width="10%" style="text-align:center;vertical-align:middle">NO</th>
                            <th width="25%" style="text-align:center;vertical-align:middle">Username</th>
                            <th width="25%" style="text-align:center;vertical-align:middle">Email</th>
                            <th width="25%" style="text-align:center;vertical-align:middle">Role</th>
                            <!-- <th width="10%" style="text-align:center;vertical-align:middle">Photo</th> -->
                            <th width="15%" style="text-align:center;vertical-align:middle"></th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1;foreach($list as $p):?>
                        <tr style="vertical-align:middle">
                            <td width="10%" style="text-align:center;padding:0rem;vertical-align:middle"><?= $no++; ?>
                            </td>
                            <td width="10%" style="text-align:left;margin-left:5px;padding:0rem;vertical-align:middle">
                                &nbsp;<?= strtolower($p->username); ?>
                            </td>
                            <td width="10%" style="text-align:left;padding:0rem;vertical-align:middle">
                                &nbsp;<?= strtolower($p->email); ?></td>

                            <td width="10%" style="text-align:center;padding:0rem;vertical-align:middle">
                                &nbsp;<?= strtolower($p->name); ?></td>
                            <td width="10%" style="text-align:center;padding:0rem;vertical-align:middle">
                                <a href="<?= base_url('user/'.$p->userid);?>" class="btn btn-info sm"><i
                                        class="fas fa-search-plus"></i> Detail</a>
                            </td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th width="10%" style="text-align:center;vertical-align:middle">NO</th>
                            <th width="10%" style="text-align:center;vertical-align:middle">Username</th>
                            <th width="10%" style="text-align:center;vertical-align:middle">Email</th>
                            <th width="10%" style="text-align:center;vertical-align:middle">Role</th>
                            <!-- <th width="10%" style="text-align:center;vertical-align:middle">Photo</th> -->
                            <th width="10%" style="text-align:center;vertical-align:middle"></th>

                        </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </div><!-- /.container-fluid -->
</section>


<?=$this->endSection();?>