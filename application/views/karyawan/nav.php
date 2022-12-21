<!DOCTYPE html>
<html class="no-js">
  <head>
  <meta charset="utf-8">
  <link rel="icon" type="image/png" sizes="96x96" href="<?php echo base_url();?>assets/img/nf.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>NuFOOD</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <!-- Animate.css -->
  <link rel="stylesheet" href="<?= base_url("assets/assets_obk/css/animate.css")?>">
  <!-- Icomoon Icon Fonts dan Font Awesome, oke kerajinan make dua. mubazir hih-->
  <link rel="stylesheet" href="<?= base_url("assets/assets_obk/css/icomoon.css")?>">
  <link href="<?= base_url("assets/css/font-awesome.min.css")?>" rel="stylesheet">
  <!-- Bootstrap  -->
  <link rel="stylesheet" href="<?= base_url("assets/assets_obk/css/bootstrap.css")?>">
  <!-- Flexslider  -->
  <link rel="stylesheet" href="<?= base_url("assets/assets_obk/css/flexslider.css")?>">
  <!-- Theme style  -->
  <link rel="stylesheet" href="<?= base_url("assets/assets_obk/css/style.css")?>">
  <!-- Modernizr JS -->
  <script src="<?= base_url("assets/assets_obk/js/modernizr-2.6.2.min.js")?>"></script>
  <!-- jQuery -->
  <script src="<?= base_url("assets/assets_obk/js/jquery.min.js")?>"></script>
  <!-- jQuery Easing -->
  <script src="<?= base_url("assets/assets_obk/js/jquery.easing.1.3.js")?>"></script>
  <!-- Bootstrap -->
  <script src="<?= base_url("assets/assets_obk/js/bootstrap.min.js")?>"></script>
  <!-- Waypoints -->
  <script src="<?= base_url("assets/assets_obk/js/jquery.waypoints.min.js")?>"></script>
  <!-- Flexslider -->
  <script src="<?= base_url("assets/assets_obk/js/jquery.flexslider-min.js")?>"></script>
  <!-- MAIN JS -->
  <script src="<?= base_url("assets/assets_obk/js/main.js")?>"></script>


  </head>
  <body>
    <div id="fh5co-page">
      <header id="fh5co-header" role="banner">
        <div class="container">
          <div class="header-inner">
            <h1>
          
                <img class="img-responsive" src="<?php echo base_url();?>assets/img/nufood.png"
                    style="width:15%; margin-top:-2.5%;"></h1>
            <nav role="navigation" style="margin-top:-3%;">
              <ul>
                <li><a href="<?php echo site_url('karyawan/c_karyawan/index'); ?>">Beranda</a></li>
                <li> <a href="<?php echo site_url('karyawan/c_karyawan/pesanan'); ?>">Pesanan</a></li>
                <li><a href="<?php echo site_url('karyawan/c_karyawan/transaksi'); ?>">Transaksi </a></li>
                <!-- <li><a href="<?php// echo site_url('karyawan/c_karyawan/orderan_lain'); ?>">menu lain</a></li>
             -->  <!--   <li class="dropdown">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <span class="pesanan">
                                Pesanan
                                </span>
                                <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu extended logout">
                               
                                <li> <a href="<?php echo site_url('karyawan/c_karyawan/pesanan'); ?>">Pesanan Utama</a></li>
                                <li>
                                    <a href="<?php echo site_url('karyawan/c_karyawan/pesanan_tambahan'); ?>">Pesanan Tambahan</a>
                                </li>
                            </ul>

                 


                </li> -->

                 <!--    <li class="dropdown">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <span class="pesanan">
                                Transaksi
                                </span>
                                <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu extended logout">
                               
                               <li><a href="<?php echo site_url('karyawan/c_karyawan/transaksi'); ?>">Transaksi Utama</a></li>
                                <li>
                                    <a href="<?php echo site_url('karyawan/c_karyawan/transaksi_lain'); ?>">Transaksi Tambahan</a>
                                </li>
                            </ul>

                 


                </li>
 -->

               
              
                <li class="dropdown">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <span class="username">
                                 Hai, <?php 
                                    foreach ($saldo as $row ) {
                                            echo "$row->nama";
                                          ?>
                                </span>
                                <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu extended logout">
                                <div class="log-arrow-up"></div>
                                <li><a> Saldo : Rp <?php 
                              
                                            echo "$row->saldo";
                                        } ; ?>
                                  
                                    </a>
                                </li>
                                <li><a href="<?php echo site_url('karyawan/c_karyawan/edit_password'); ?>" style="hover:black;">Ubah Password</a></li>
                                <li>
                                    <a href="<?php echo site_url('karyawan/c_karyawan/logout'); ?>">Keluar</a>
                                </li>
                            </ul>
                  </li>
              </ul>
            </nav>
          </div>
        </div>
      </header>