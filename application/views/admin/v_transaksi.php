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
                    <a class="navbar-brand">Transaksi</a>
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
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Data Transaksi</h4>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-striped">
                                    <thead>
                                        <th><i class=""></i> Nama </th>
                                        <th><i class=""></i> Order </th>
                                        <th><i class=""></i> Harga </th>
                                        <th><i class=""></i> Waktu </th>
                                        <th><i class=""></i> Keterangan </th>
                                    </thead> 
                                    <tbody>
                                      <?php
                                            foreach ($data as $row)
                                            {
                                        ?>
                             
                                        <tr>
                                            <td><?php echo $row->nama; ?></td> 
                                            <td><?php echo $row->nama_makanan; ?></td>
                                            <td><?php echo $row->harga; ?></td>
                                            <td><?php echo $row->waktu; ?></td>
                                            <td><?php echo $row->keterangan; ?></td>    
                                        </tr>
                                        <?php
                                            }
                                        ?>                                                                 
                                   </tbody>
                                </table>
                            </div><!-- END table-responsive-->
                            <div class="panel-footer" style="height:40px;">
                           <?php echo $halaman; ?>
                        </div><!--END card-->
                    </div><!-- END col-md-12-->
                </div><!--END row-->
            </div><!--END container-fluid-->
        </div><!-- END content-->
    </div><!-- END main-panel-->
</div><!--END wrapper yang ada di nav--> 