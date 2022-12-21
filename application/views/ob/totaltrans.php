<div id="fh5co-pricing-section">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3 text-center fh5co-heading animate-box">
                    <h1>Total Saldo</h1>
                    
                </div>
            </div>
            
            <div class="col-lg-12">
                <div class="table-responsive">
                      <table class="table table-striped table-bordered">
                        <tr >
                            <td  ><strong>NAMA</strong></td>
                            <td ><strong>SALDO</strong> </td>
                        </tr>
                        <?php foreach($saldo as $tampil_saldo){?>
                        <tr>
                            <td bgcolor="white"><?=$tampil_saldo->nama;?></td>
                            <td bgcolor="white">Rp <?=$tampil_saldo->saldo;?></td>
                        </tr>

                        <?php } ?>
                        <?php 
                            foreach ($total_saldo as $row) {
                              echo"<tr > 
                                    <td bgcolor='#bdc3c7'> Total saldo </td>
                                    <td bgcolor='#bdc3c7'> Rp $row->saldo </td>
                                    </tr>
                                    ";
                            }
                        ?>

                      </table>
                    </div>
                    <!--  <div class="panel-footer" style="height:40px;">
        <?php// echo $halaman; ?>
                        </div><!--END card--> 
            </div>

        </div>
</div>
</body>

</html>
