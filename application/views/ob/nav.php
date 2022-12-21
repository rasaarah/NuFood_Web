<!DOCTYPE html>
<html class="no-js">
    <head> 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" type="image/png" sizes="96x96" href="<?php echo base_url();?>assets/img/nf.png">
    <title>nuFood</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
     
    <!-- Animate.css -->
    <link rel="stylesheet" href="<?= base_url("assets/assets_obk/css/animate.css")?>">
    <!-- Icomoon Icon Fonts-->
    <link rel="stylesheet" href="<?= base_url("assets/assets_obk/css/icomoon.css")?>">
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
    <!-- Owl Carousel -->
    <script src="<?= base_url("assets/assets_obk/js/owl.carousel.min.js")?>"></script>
    <!-- Flexslider -->
    <script src="<?= base_url("assets/assets_obk/js/jquery.flexslider-min.js")?>"></script>
    <!-- MAIN JS -->
    <script src="<?= base_url("assets/assets_obk/js/main.js")?>"></script>
    
    <!--AJAX-->
    <script src="<?=  base_url()."assets/css/jquery-1.11.2.min.js"; ?>"></script>
        <script type="text/javascript">
            $("document").ready(function()
                {       
                    $(window).load(function(){
                        var x = 'Utama';
                        $.ajax({
                            dataType: "text",
                            url:"<?php echo base_url();?>index.php/ob/c_ob/getData_siang",
                            type: "POST",
                            data:"action="+x,
                            success:function(ret){
                                $("#display").html(ret);
                            }
                        });
                    });


                    $("#getProducts").on("change",function(){
                        var id = $(this).find(":selected").val();
                        var dataString = 'action='+ id;
                        $.ajax({
                            dataType: "text",
                            url:"<?php echo base_url();?>index.php/ob/c_ob/getData_siang",
                            type: "POST",
                            data:"action="+id,
                            success:function(ret){
                                $("#display").html(ret);
                            }
                        });
                    });

                    $('#display').on('change', '#getProducts', function(){
                        var id = $(this).find(":selected").val();
                        var dataString = 'action='+ id;
                        var dataIndex= $(this).attr('data-index');
                        var iduser=$(this).attr('data-user');
                        $.ajax({
                            dataType: "text",
                            url:"<?php echo base_url();?>index.php/ob/c_ob/getData2_siang",
                            type: "POST",
                            data:"action="+id+"&iduser="+iduser,
                            success:function(ret){
                               if($.trim(ret)==''){
                                    $("#apa"+dataIndex).html('Tidak Memilih Pesanan');
                               }else{
                                    $("#apa"+dataIndex).html(ret);
                                }
                            }
                        });
                    });

                    $(window).load(function(){
                        var x = 'Utama';
                        $.ajax({
                            dataType: "text",
                            url:"<?php echo base_url();?>index.php/ob/c_ob/getData_malam",
                            type: "POST",
                            data:"action="+x,
                            success:function(ret){
                                $("#display2").html(ret);
                            }
                        });
                    });


                    $("#getProducts").on("change",function(){
                        var id = $(this).find(":selected").val();
                        var dataString = 'action='+ id;
                        $.ajax({
                            dataType: "text",
                            url:"<?php echo base_url();?>index.php/ob/c_ob/getData_malam",
                            type: "POST",
                            data:"action="+id,
                            success:function(ret){
                                $("#display2").html(ret);
                            }
                        });
                    });

                    $('#display2').on('change', '#getProducts', function(){
                        var id = $(this).find(":selected").val();
                        var dataString = 'action='+ id;
                        var dataIndex= $(this).attr('data-index');
                        var iduser=$(this).attr('data-user');
                        $.ajax({
                            dataType: "text",
                            url:"<?php echo base_url();?>index.php/ob/c_ob/getData2_malam",
                            type: "POST",
                            data:"action="+id+"&iduser="+iduser,
                            success:function(ret){
                                if($.trim(ret)==''){
                                    $("#apa2"+dataIndex).html('Tidak Memilih Pesanan');
                                }else{
                                    $("#apa2"+dataIndex).html(ret);
                                }
                            }
                        });
                    });
                });
        </script>

        <style>
            .tombol{
                padding-left: 20%;
                width: auto;
            }
        </style>
    </head>
    
    <body>
        <div id="fh5co-page">
            <header id="fh5co-header" role="banner">
                <div class="container">
                    <div class="header-inner">
                        <h1>
                            <a>
                            <img class="img-responsive" src="<?php echo base_url();?>assets/img/nufood.png" style="width:15%; margin-top:-2.5%;">
                            </a>
                        </h1>
                        <nav role="navigation">
                          <!--   <ul>
                                <li><a href="<?php //echo site_url('ob/c_ob/index'); ?>">Beranda</a></li>
                                <li><a href="<?php //echo site_url('ob/c_ob/totaltrans'); ?>">Saldo</a></li>
                                    <li><a href="<?php //echo site_url('ob/c_ob/edit_password'); ?>">edit_password</a></li>
                                <li><a href="<?php //echo site_url('ob/c_ob/logout'); ?>">Keluar</a></li>

                            </ul> -->

                             <ul>
                                <li><a href="<?php  echo site_url('ob/c_ob/index'); ?>">Beranda</a></li>
                                <!--  <li><a href="<?php //echo site_url('ob/c_ob/daftar_pesanan_lain'); ?>">Pesanan Lain</a></li> -->
                                <li><a href="<?php  echo site_url('ob/c_ob/totaltrans'); ?>">Saldo</a></li>
                              
                        <li class="dropdown">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <span class="username">
                                 Hai, <?php 
                                    foreach ($nama as $row ) {
                                            echo "$row->nama";};
                                          ?>
                                </span>
                                <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu extended logout">
                                <div class="log-arrow-up"></div>
                               
                                <li><a href="<?php echo site_url('ob/c_ob/edit_password'); ?>" style="hover:black;">Ubah Password</a></li>
                                <li>
                                      <li><a href="<?php echo site_url('ob/c_ob/logout'); ?>">Keluar</a></li>
                                </li>
                            </ul>
                         </li>
              </ul>
                        </nav>
                    </div>
                </div>
            </header>