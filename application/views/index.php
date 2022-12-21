<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
     <link rel="icon" type="image/png" sizes="96x96" href="<?php echo base_url();?>assets/img/nf.png">
    <title>nuFood</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    <link rel="shortcut icon" href="img/favicon.png">
    <!-- Bootstrap CSS -->    
    <link href="css/bootstrap.min.css" rel="stylesheet">
   <link href="<?= base_url("assets/css/bootstrap.min.css")?>" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="<?= base_url("assets/css/bootstrap-theme.css")?>" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="<?= base_url("assets/css/elegant-icons-style.css")?>" rel="stylesheet" />
    <link href="<?= base_url("assets/css/font-awesome.min.css")?>" rel="stylesheet" />
    <!-- Custom styles -->  
    <link href="<?= base_url("assets/css/style.css")?>" rel="stylesheet">
    <link href="<?= base_url("assets/css/style-responsive.css" )?>" rel="stylesheet" />
</head>

<body>
<div class="container">
    <form class="login-form " style="background:none; margin-top:13%;" action="<?=  site_url('auth/cek_login');?>" method="post">        
        <div class="login-wrap" style="background-color: rgba(255,255,255,0.8);">
            <p class="login-img" style="color:#FFAE2B; font-family: 'Lato', sans-serif;">
                <img src="<?php echo base_url();?>assets/img/nufood.png" style="width:65%;"></p>
            <div class="input-group" style="width:100%;">
              <input type="text" class="form-control" name="nama" placeholder="Username" style=" background-color:#F5D76E; border-radius:3px; color:black;">
            </div>
            <div class="input-group" style="width:100%;">
                <input type="password" class="form-control" name="password" placeholder=" Password"  style="border-radius:3px; background-color:#F5D76E; color:black;">
            </div>
           
            <button class="btn btn-masuk btn-lg btn-block" type="submit" style="background:grey; border-radius:3px opacity:0.8;;">Masuk</button>
            
        </div>
      </form action="">

</div>
</body>
</html>