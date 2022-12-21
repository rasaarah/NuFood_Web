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
                    <a class="navbar-brand">Makanan/Minuman</a>
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
                                <h4 class="title">Tambah Makanan/Minuman</h4>
                            </div>
                            <div class="content">
                                <section class="panel">
                                <div class="panel-body">
                                  <form role="form" action="<?= site_url('admin/c_admin/add_aksi_makanan');?>" method="post">
                                      <div class="form-group">
                                          <label for="nama_makanan">Nama Makanan</label>
                                          <input type="text" class="form-control" id="nama" name="nama_makanan" placeholder="Nama Makanan">
                                      </div>
                                      <div class="form-group">
                                          <label for="harga">Harga Makanan</label>
                                          <input type="text" class="form-control" id="harga" name="harga" placeholder="Harga Makanan">
                                      </div>                                  
                                      <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                                  </form>

                            </div><!-- END panel-body-->
                            </div><!--END content-->
                            </section>
                        </div>
                    </div><!--END col-lg 12 col-md-sekian -->
                </div><!--END row-->
            </div><!--END container-fluid-->
        </div><!-- END content-->
    </div><!-- END main-panel-->
</div><!--END wrapper yang ada di nav--> 