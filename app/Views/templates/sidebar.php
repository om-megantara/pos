<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= base_url('admin');?>" class="brand-link">
        <img src="<?= base_url('public/img');?>/logo-apl-putih.png" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-light">Animax Putra Lancar</span>&nbsp;
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <!-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?= base_url('public/adm/img');?>/user2-160x160.jpg" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Alexander Pierce</a>
            </div>
        </div> -->

        <!-- SidebarSearch Form -->
        <!-- <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div> -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item ">
                    <!-- <a href="<?= base_url('/admin');?>" class="nav-link active"> -->
                    <a href="<?= base_url('/admin');?>" class="nav-link">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Dashboard
                            <!-- <i class="right fas fa-angle-left"></i> -->
                        </p>
                    </a>
                </li>
                <?php if (in_groups('admin')):?>
                <li class="nav-item">
                    <?php if (has_permission('manage-users')):?>
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Manage Users
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <?php endif;?>
                    <ul class="nav nav-treeview">
                        <div class="dropdown-divider"></div>
                        <?php if (has_permission('user-list')):?>
                        <li class="nav-item ">
                            <a href="<?= base_url('/user/user-list');?>" class="nav-link">
                                <i class="nav-icon fas fa-user-plus"></i>
                                <p>
                                    User List
                                    <!-- <i class="right fas fa-angle-left"></i> -->
                                </p>
                            </a>
                        </li>
                        <?php endif;?>
                        <?php if (has_permission('user-access')):?>
                        <li class="nav-item ">
                            <a href="<?= base_url('/user/user-access');?>" class="nav-link">
                                <i class="nav-icon fas fa-user-cog"></i>
                                <p>
                                    User Access
                                    <!-- <i class="right fas fa-angle-left"></i> -->
                                </p>
                            </a>
                        </li>
                        <?php endif;?>
                        <div class="dropdown-divider"></div>
                    </ul>
                </li>
                <?php endif;?>

                <?php if (has_permission('manage-shop')):?>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-industry"></i>
                        <p>
                            Shop Profiles
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">
                        <div class="dropdown-divider"></div>
                        <?php if (has_permission('manage-shop')):?>
                        <li class="nav-item">
                            <a href="<?=base_url('admin/manage-shop')?>" class="nav-link">
                                <i class="nav-icon fas fa-cog"></i>
                                <p>
                                    Manage
                                </p>
                            </a>
                        </li>
                        <?php endif;?>
                        <div class="dropdown-divider"></div>
                    </ul>
                </li>
                <?php endif;?>

                <?php if (has_permission('manage-master')):?>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Master
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">
                        <div class="dropdown-divider"></div>
                        <?php if (has_permission('manage-master')):?>
                        <li class="nav-item">
                            <a href="<?=base_url('master/list-customer')?>" class="nav-link">
                                <i class="nav-icon fas fa-user-friends"></i>
                                <p>
                                    Customers
                                </p>
                            </a>
                        </li>
                        <?php endif;?>
                        <?php if (has_permission('manage-master')):?>
                        <li class="nav-item">
                            <a href="<?=base_url('master/list-supplier')?>" class="nav-link">
                                <i class="nav-icon fas fa-user-friends"></i>
                                <p>
                                    Supplier
                                </p>
                            </a>
                        </li>
                        <?php endif;?>
                        <?php if (has_permission('manage-master')):?>
                        <li class="nav-item">
                            <a href="<?=base_url('master/list-category')?>" class="nav-link">
                                <i class="nav-icon fas fa-list"></i>
                                <p>
                                    Categories
                                </p>
                            </a>
                        </li>
                        <?php endif;?>
                        <?php if (has_permission('manage-master')):?>
                        <li class="nav-item">
                            <a href="<?=base_url('master/list-product')?>" class="nav-link">
                                <i class="nav-icon fas fa-box-open"></i>
                                <p>
                                    Products
                                </p>
                            </a>
                        </li>
                        <?php endif;?>
                        <div class="dropdown-divider"></div>
                    </ul>
                </li>
                <?php endif;?>

                <?php if (has_permission('manage-transaction')):?>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-shopping-cart"></i>
                        <!-- <i class="fa-solid fa-cart-shopping"></i> -->
                        <p>
                            Transaction
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">
                        <div class="dropdown-divider"></div>
                        <?php if (has_permission('manage-transaction')):?>
                        <li class="nav-item">
                            <a href="<?=base_url('transaction/list-purchase')?>" class="nav-link">
                                <i class="nav-icon far fa-money-bill-alt"></i>
                                <p>
                                    Purchasing
                                </p>
                            </a>
                        </li>
                        <?php endif;?>
                        <!-- <div class="dropdown-divider"></div> -->
                        <?php if (has_permission('manage-transaction')):?>
                        <li class="nav-item">
                            <a href="<?=base_url('transaction/list-selling')?>" class="nav-link">
                                <i class="nav-icon fas fa-shopping-cart"></i>
                                <p>
                                    Selling
                                </p>
                            </a>
                        </li>
                        <?php endif;?>
                        <div class="dropdown-divider"></div>
                    </ul>
                </li>
                <?php endif;?>

                <?php if (has_permission('view-report')):?>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-file-alt"></i>
                        <p>
                            Report
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">
                        <div class="dropdown-divider"></div>
                        <?php if (has_permission('view-report')):?>
                        <li class="nav-item">
                            <a href="<?=base_url('report/list-purchase-report')?>" class="nav-link">
                                <i class="nav-icon fas fa-chart-bar"></i>
                                <p>
                                    Report Purchasing
                                </p>
                            </a>
                        </li>
                        <?php endif;?>
                        <!-- <div class="dropdown-divider"></div> -->
                        <?php if (has_permission('view-report')):?>
                        <li class="nav-item">
                            <a href="<?=base_url('report/list-selling-report')?>" class="nav-link">
                                <i class="nav-icon fas fa-chart-bar"></i>
                                <p>
                                    Report Selling
                                </p>
                            </a>
                        </li>
                        <?php endif;?>
                        <?php if (has_permission('view-report')):?>
                        <li class="nav-item">
                            <a href="<?=base_url('report/list-stock')?>" class="nav-link">
                                <i class="nav-icon fas fa-chart-bar"></i>
                                <p>
                                    Report Stock
                                </p>
                            </a>
                        </li>
                        <?php endif;?>
                        <?php if (has_permission('view-report')):?>
                        <li class="nav-item">
                            <a href="<?=base_url('report/lost-profit')?>" class="nav-link">
                                <i class="nav-icon fas fa-chart-bar"></i>
                                <p>
                                    Report R/L
                                </p>
                            </a>
                        </li>
                        <?php endif;?>
                        <div class="dropdown-divider"></div>
                    </ul>
                </li>
                <?php endif;?>


                <div class="dropdown-divider mt-5"></div>

                <li class="nav-item">
                    <a href="<?= base_url('/logout');?>" class="nav-link" style="background-color:black;color:#FFC107">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>
                            Logout
                            <!-- <i class="right fas fa-angle-left"></i> -->
                        </p>
                    </a>

                </li>
                <div class="dropdown-divider"></div>

            </ul>

        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>