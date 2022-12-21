<div id="fh5co-pricing-section">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3 text-center fh5co-heading animate-box">
                    <h1>Daftar Pesanan Tambahan</h1>
                </div> 
            </div>
             
            <div class="col-lg-12">
                <div class="row">
                    <?php  foreach ($pesanan as $row ) {?>
                        <div class="col-sm-4 animate-box">
                            <div class="price-box">
                                <form action="<?=site_url('ob/c_ob/add_transaksi_aksi');?>" method="post">
                                      <h3 style="color:black; padding-top:-9%;"> 
                                        <input type='hidden' value='<?php echo $row->id_order;?>' name='id_user'></input>
                                        <input type='hidden' value='<?php echo $row->id_user;?>' name='id_user'><?php echo $row->nama;?>
                                    </h3>                                 
                                    <h4 style="color:black; padding-top:-9%;">Pesanan: <input type='hidden' value='<?php echo $row->note;?>' name='note'><?php echo $row->rincian;?></h4>
                                    
                                    <div class="form group">
                                        <label for="comment" style="color:black;">Harga </label>
                                        
                                        <input class="form-control" id="harga" name="harga_asli"></input>
                                    </div>

                                    <div class="form-group">
                                        <label for="comment" style="color:black;">Keterangan: </label>
                                        <textarea class="form-control" rows="3" id="comment" name="keterangan"> <?php print set_value('keterangan'); ?></textarea>
                                    </div>
                                        
                                    <div class="col-md-12 text-center animate-box">
                                        <button type="submit" value="batal" name="batal" role="button" class="btn btn-primary">Batal</i></button>
                                        <button type="submit" value="ok" name="ok" role="button" class="btn btn-primary">Oke</i></button>
                                    </div> 
                                    
                                </form>
                            </div>
                        </div>
           <?php }?>
            </div><!--end row-->
            </div>

        </div>
</div>
</body>

</html>
