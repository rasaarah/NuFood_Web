<div class="main-panel">
        <nav class="navbar navbar-default">
            <div class="container-fluid" style="padding-bottom:0%; margin-top:1%;">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar bar1"></span>
                        <span class="icon-bar bar2"></span>
                        <span class="icon-bar bar3"></span>
                    </button>
                    <a class="navbar-brand">User</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a class="dropdown-toggle" data-toggle="dropdown">
                                <p>Hai, &nbsp;</p><span class="username"><?php echo $username; ?>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>


        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-7">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Tambah User</h4>
                            </div>
                            <div class="content">
                                <section class="panel">
                                <div class="panel-body">
                                <form role="form" action="<?= site_url('admin/c_admin/add_aksi_user');?>" method="post">
                                    <div class="row">
                                        <select class="form-control m-bot15" name="status" style="background:#FFF6CF;">
                                            <option value="ob">Office Boy</option>
                                            <option value="karyawan">Karyawan</option>
                                            <option value="admin">Admin</option>
                                        </select>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Karyawan" style="background:#FFF6CF;">
                                        </div>
                                    </div>
                                    <div class="row">  
                                        <div class="form-group">
                                            <input type="password" class="form-control" id="password" name="password" placeholder="Password" style="background:#FFF6CF;">
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-info btn-fill btn-wd">Simpan</button>
                                    </div>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                            </div>
                            </section>
                        </div>
                    </div><!--END col-lg 12 col-md-sekian -->
                </div><!--END row-->
            </div><!--END container-fluid-->
        </div><!-- END content-->
    </div><!-- END main-panel-->
</div><!--END wrapper yang ada di nav--> 