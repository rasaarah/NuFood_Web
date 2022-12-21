<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" /> 
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <!--ICON di tab-->
    <link rel="icon" type="image/png" sizes="96x96" href="<?php echo base_url();?>assets/img/nf.png">
    <title>Halaman Admin</title>
    <!--boostrap-->
    <link href="<?= base_url("assets/assets_admin/css/bootstrap.min.css")?>" rel="stylesheet"/>
    <!-- font icon -->
    <link href="<?= base_url("assets/assets_admin/css/font-awesome.min.css")?>" rel="stylesheet"/>
    <link href="<?= base_url("assets/assets_admin/css/font-awesome.css")?>" rel="stylesheet"/>
    <!-- Custom styles -->  
    <link href="<?= base_url("assets/assets_admin/css/style.css")?>" rel="stylesheet"/>
    <link href="<?= base_url("assets/assets_admin/css/style-responsive.css" )?>" rel="stylesheet"/>
    <link href="<?= base_url("assets/assets_admin/css/animate.min.css")?>" rel="stylesheet">
    <link href="<?= base_url("assets/assets_admin/css/paper-dashboard.css")?>" rel="stylesheet"/>
    <link rel="stylesheet" href="<?= base_url("assets/assets_admin/css/themify-icons.css")?>">
    <!--Core JS Files   -->
    <script src="<?= base_url("assets/assets_admin/js/jquery-1.10.2.js")?>" type="text/javascript"></script>
    <script src="<?= base_url("assets/assets_admin/js/bootstrap.min.js")?>" type="text/javascript"></script>
    <!-- Core javascript untuk toggle samping-->
    <script src="<?= base_url("assets/assets_admin/js/paper-dashboard.js")?>"></script>
</head>

<body>
    <div class="wrapper">
        <div class="sidebar" data-background-color="white" data-active-color="danger">
            <div class="sidebar-wrapper">
                <div class="logo">
                    <a href="<?= site_url('admin/c_admin/index');?>">
                        <img class="img-responsive" src="<?php echo base_url();?>assets/img/nufood.png"
                            style="width:40%;  margin-top:5%; margin-left:30%; margin-bottom:-2%;"></a>
                </div>

                <ul class="nav">
                    <li class="">
                        <a href="<?= site_url('admin/c_admin/index'); ?>">
                            <i class="ti-panel"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li>
                        <a href="<?= site_url('admin/c_admin/user'); ?>">
                            <i class="ti-user"></i>
                            <p>User</p>
                        </a>
                    </li>
                    <li>
                        <a class="" href="<?= site_url('admin/c_admin/makanan'); ?>">
                            <i class="ti-view-list-alt"></i>
                            <p>Makanan</p>
                        </a>
                    </li>
                    <li>
                        <a class="" href="<?= site_url('admin/c_admin/topup'); ?>">
                            <i class="ti-credit-card"></i>
                            <p>Topup</p>
                        </a>
                    </li>
                    <li>
                        <a class="" href="<?= site_url('admin/c_admin/transaksi'); ?>">
                            <i class="ti-shopping-cart-full"></i>
                            <p>Transaksi</p>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('admin/c_admin/logout'); ?>">
                            <i class="ti-power-off"></i>
                            <p>Logout</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div> <!--END sidebar-->
</body>
</html>