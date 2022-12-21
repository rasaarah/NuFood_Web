<div id="fh5co-pricing-section">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-md-offset-3 text-center fh5co-heading animate-box">
          <h2>Menu Tambahan</h2>
           
        </div> 
      </div>

      <div class="row">
        
            <div class="col-md-7 animate-box" style="min-height:60%; align:center;">
             
                 <div class="price-box" >
                    <form action="<?= site_url('karyawan/c_karyawan/add_order_lain_aksi');?>" method="post">
                        
                       
                        <p>Tulis Pesanan anda</p>
                        <textarea class="form-control" rows="3"  name="note"><?php echo set_value('note'); ?> </textarea>
            
                     <br>
                    <div class="col-md-12 text-center animate-box">
                      <button type="submit"  name="submit" class="btn btn-primary with-arrow" role="button" >Pesan
                      <i class="icon-arrow-right"></i></button>
                    </div>
                   
                  </form>
                </div>

            </div> 
     
      </div><!--END row bagian 2-->
    
      </div><!--END container-->
    </div>
  </body>
</html>