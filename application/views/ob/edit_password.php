
<!-- <div class="div6"> -->
<div id="fh5co-pricing-section">
  <div class="container">
    <div class="popup">
      <div class="div6"> 
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
            </div>
                <div class="modal-body">
                       <?php 
                           // foreach($user as $row)
                                  //  {?>
                              <!--   <form action="<?= site_url('karyawan/c_karyawan/update_user');?>" role="form" method="post">
                                   <?php $id_user= $_SESSION['id_user'];?>
                                      <input type="hidden" class="form-control" id="nama" name="id_user" placeholder="Nama User" value="<?php echo  $id_user ;?>" >
                                      
                                        <div class="form-group">
                                          <label for="password">Password Saat Ini</label>
                                          <input type="password" class="form-control" id="password" name="password" style="background:#FFF6CF;" placeholder="Input Password Saat Ini" value="<?php //echo $row->password;?>" >
                                      </div>
                                      <div class="form-group">
                                          <label for="password">Password</label>
                                          <input type="password" class="form-control" id="password" name="password" style="background:#FFF6CF;" placeholder="Input Password" value="<?php //echo $row->password;?>" >
                                      </div> -->

                                   
                                <!--     <div class="clearfix"></div> -->
                                   
                               
                                <?php
                                
                                 //s }
                                ?>

                            <?php echo form_open('ob/c_ob/changePass')?>
                            <?php $id_user= $_SESSION['id_user'];?>
                           <input type="hidden" class="form-control" id="nama" name="id_user" placeholder="Nama User" value="<?php echo  $id_user ;?>" >
                            <div class="form-group">
                              <input  class="form-control" type="password" name="oldPass" placeholder="Old Password" required/>
                            </div>
                             <div class="form-group">
                            <input class="form-control" type="password" name="newPass" placeholder="New Password" required/>
                              </div>
                                <div class="form-group">
                            <input class="form-control" type="password" name="renewPass" placeholder="Re-type New Password" required/>
                          </div>


                          <!-- <button type="submit" value="Change" class="btn btn-primary btn-inverse" /> -->
                           <button type="submit"  value="Change" name="submit" class="btn btn-primary" role="button"  >Simpan</button>
                          <button type="button" data-dismiss="modal" class="btn">Cancel</button>
                           <?php echo form_close()?>
                </div>
              <!--   <div class="modal-footer">
                  
                                       
                            <button type="submit"  name="submit" class="btn btn-primary" role="button" >Simpan
                     </i></button>
                           </form> -->

               <!--  </div> -->
            </div>
           </div>
           </div>
           </div>

      </div>
</div>
</body>
</html>