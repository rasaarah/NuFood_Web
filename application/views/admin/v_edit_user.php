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
                                <h4 class="title">Edit User</h4>
                            </div>
                            <div class="content">
                                <section class="panel">
                                <div class="panel-body">
                                    <?php 
                                      foreach($user as $row)
                                    {?>
                                <form action="<?= site_url('admin/c_admin/update_user');?>" role="form" method="post">
                                    <div class="form-group">
                                          <label for="nama">Nama User</label>
                                          <input type="hidden" class="form-control" id="nama" name="id_user" placeholder="Nama User" value="<?php echo $row->id_user;?>" >
                                          <input type="text" class="form-control" id="nama" name="nama" style="background:#FFF6CF;" placeholder="Nama User" value="<?php echo $row->nama;?>">
                                      </div>
                                      <div class="form-group">
                                          <label for="password">Password</label>
                                          <input type="text" class="form-control" id="password" name="password" style="background:#FFF6CF;" placeholder="Password" value="<?php echo $row->password;?>" >
                                      </div>

                                    <div class="text-center">
                                        <button type="submit" name="submit" class="btn btn-info btn-fill btn-wd">Simpan</button>
                                    </div>
                                    <div class="clearfix"></div>
                                </form>

                                <?php
                                
                                  }
                                ?>

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