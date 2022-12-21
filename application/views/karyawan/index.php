<div id="fh5co-pricing-section">
    <div class="container">
       

        <?php 
            date_default_timezone_set("Asia/Jakarta");
            $time= date('Y-m-d H:i:s');
            echo "<div class='row'>";
            if($time>=date("Y-m-d 07:00:00am")&& $time<=date("Y-m-d 11:00:00am"))
            {  
        ?> 
          <div class="col-md-6 col-md-offset-3 text-center fh5co-heading animate-box" style="margin-top:-8%">
             <h2>Pilih Makan Siang/Malam</h2>
          </div>

              <div class="col-md-3 col-md-offset-3 animate-box">
                   <div class="price-box">
                    <img class="img-responsive" src="<?php echo base_url();?>assets/img/cloudyy.png">
                    <br>
                      <div class="col-md-12 text-center animate-box">
                        <a href="<?php echo site_url('karyawan/c_karyawan/menu_utama_siang'); ?>">  <button type="submit"  name="submit" class="btn btn-primary with-arrow" role="button" >Siang
                        <i class="icon-arrow-right"></i></button></a>
                      </div>
                  </div>
              </div>


              <div class="col-md-3  animate-box">
                   <div class="price-box">
                    <img class="img-responsive" src="<?php echo base_url();?>assets/img/halfmoon.png">
                    <br>
                   <div class="col-md-12 text-center animate-box">
                       <a href="<?php echo site_url('karyawan/c_karyawan/popup_malam'); ?>">   
                        <button type="submit"  name="submit" class="btn btn-primary with-arrow" role="button" 
                         >Malam
                        <i class="icon-arrow-right"></i></button> </a>
                      </div>   
                  </div>
              </div>
        
      <?php
          }
            elseif($time>=date("Y-m-d 11:01:00am") && $time<=date("Y-m-d 19:30:00pm"))
          {
      ?>
          <div class="col-md-6 col-md-offset-3 text-center fh5co-heading animate-box" style="margin-top:-8%">
             <h2>Pilih Makan Siang/Malam</h2>
          </div>

             <div class="col-md-3 col-md-offset-3 animate-box">
                   <div class="price-box">
                    <img class="img-responsive" src="<?php echo base_url();?>assets/img/cloudyy.png">
                    <br>
                      <div class="col-md-12 text-center animate-box">
                       <a href="<?php echo site_url('karyawan/c_karyawan/popup_siang'); ?>"> 
                       <button type="submit"  name="submit" class="btn btn-primary with-arrow" role="button">Siang 
                        <i class="icon-arrow-right"></i></button></a>
                      </div>
                  </div>
              </div>

              <div class="col-md-3  animate-box">
                   <div class="price-box">
                    <img class="img-responsive" src="<?php echo base_url();?>assets/img/halfmoon.png">
                    <br>
                   <div class="col-md-12 text-center animate-box">
                       <a href="<?php echo site_url('karyawan/c_karyawan/menu_utama_malam'); ?>">   <button type="submit"  name="submit" class="btn btn-primary with-arrow" role="button" >Malam
                        <i class="icon-arrow-right"></i></button> </a>
                      </div>   
                  </div>
              </div>
            
        <?php
            }
                else{
        ?>

          <div class="col-md-3 col-md-offset-3 animate-box">
                 
                 
                    <div class="col-md-12 text-center animate-box">
                      <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                              <div class="modal-header">
                              </div>
                              <div class="modal-body">
                                <p class="text-center" style="color:black;"> Waktu Pesanan Sudah Habis</p>
                              </div>
                              <div class="modal-footer">
                              <p><a href="<?php echo site_url('karyawan/c_karyawan/index'); ?>"
                                 type="button" class="btn btn-default" data-dismiss="modal">Close </a></p>
                              </div>
                            </div>  
                      </div>
                    </div>
                         
          </div>
          
          

        <?php
            }
        ?>
       
      </div><!--END container-->
    </div><!--END fh5co-page-->
  </body>
</html>