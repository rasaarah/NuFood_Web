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
                    <a class="navbar-brand">Topup</a>
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
                                <h4 class="title">Tambah Saldo</h4>
                            </div>
                            <div class="content">
                                <section class="panel">
                                <div class="panel-body">
                                <form role="form" action="<?= site_url('admin/c_admin/add_aksi_topup');?>" method="post">
                                    <select class="form-control " name="nama" style="background:#FFF6CF;">
                                        <option value="">-----Pilih Nama Karyawan-----</option>
                                            <?php foreach ($nama->result_array() as $row): ?>
                                        <option value="<?php echo $row['id_user']; ?>"><?php echo $row['nama']; ?></option>";
                                            <?php endforeach; ?>
                                    </select>
                                    <br>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="nominal" name="nominal" placeholder="Nominal Uang" style="background:#FFF6CF;">
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