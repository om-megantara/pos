<?php if(empty(user()->user_image)){ return redirect()->to('/login');};?>
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button">
                <i class="fas fa-bars"></i>
                <!-- <i class="fa fa-chevron-circle-left" aria-hidden="true"></i> -->
            </a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="<?= base_url('main'); ?>" class="nav-link">Home</a>
        </li>
    </ul>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">

            <a data-toggle="dropdown" href="#">
                <div class="user-panel mt-1 pb-1 mb-1 d-flex">
                    <div class="image ">
                        <img src="<?= base_url('public/img/foto/');?>/<?= user()->user_image;?>"
                            class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <?= ucwords(user()->username);?>
                    </div>
                </div>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <div class="dropdown-divider"></div>
                <a href="<?= base_url('user/').'/'.user()->id;?>" class="dropdown-item">
                    <i class="fas fa-user"></i>&nbsp;Profiles
                </a>
                <div class="dropdown-divider"></div>
                <a href="<?= base_url('user/change-password')?>" class="dropdown-item">
                    <i class="fas fa-edit"></i></i>&nbsp;Change Password
                </a>
                <div class="dropdown-divider"></div>
                <a href="<?= base_url('/logout')?>" class="dropdown-item">
                    <i class="fas fa-sign-out-alt"></i>&nbsp;Logout
                </a>
            </div>
        </li>
    </ul>
</nav>