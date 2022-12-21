<div id="fh5co-pricing-section">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-md-offset-3 text-center fh5co-heading animate-box">
          <h2>Daftar Menu Makanan/Minuman</h2>
           
          <!--search-->
          <form class="form-inline" action="<?php print site_url();?>/karyawan/c_karyawan/menu_utama_siang" method=POST>
            <div class="form-group">
              <input type="text" class="form-control" id="cari" placeholder="Ketik Kata Kunci" name="cari">
            </div>        
            <button type="submit" class="btn btn-primary" value="cari"><i class="fa fa-search" aria-hidden="true"></i></button>
          </form>
          <!--END search-->
          <br>
        </div> 
      </div>

      <div class="row">
          <?php foreach ($makanan as $row) { ?>
            <div class="col-md-3 animate-box" style="min-height:60%;">
                 <div class="price-box">
                    <form action="<?= site_url('karyawan/c_karyawan/add_order_utama_siang_aksi');?>" method="post">
                        <div style="padding:0; margin:0; min-height:90px; width:100%; padding-top:5%;">
                        <h3> <input type='hidden' value='<?php echo $row->id_makanan;?>' name='id_makanan'><?php echo $row->nama_makanan;?></input></h3>
                        </div>
                        <h4>
                          <input type='hidden' value='<?php echo $row->harga;?>' name='harga'>
                            <sup class="currency">Rp </sup><?php echo $row->harga; ?>
                          </input>
                        </h4>

                        


                        <p> Tambah Rincian:</p>
                        <textarea class="form-control" rows="3"  name="note"><?php echo set_value('note'); ?> </textarea>
            
                     <br> 
                    <div class="col-md-12 text-center animate-box">
                      <button type="submit"  name="submit" class="btn btn-primary with-arrow" role="button" >Pesan
                      <i class="icon-arrow-right"></i></button>
                    </div>
                   
                  </form>
                </div>
            </div>
         <?php }?>
      </div><!--END row bagian 2-->
      </div><!--END container-->
    </div>
  </body>
</html>