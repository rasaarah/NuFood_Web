<div id="fh5co-pricing-section">
	    <div class="container animate-box">

	            <div class="col-lg-12" style="margin-top:-10%;">
	                <h1 class="page-header">
	                    Transaksi
	                </h1>
	            </div>

	            <div class="col-lg-12">
	                <div class="table-responsive">
	                      <table class="table table-striped">
	                        <tr>
	                            <td> Tanggal </td>
	                            <td> Order </td>
                                 <td> Jam Makan </td>
                                <td> Note </td>
                                <td> Harga </td>
	                        </tr> 
                            <?php  foreach ($transaksi as $row ) {
                                echo" <tr>
                                        <td bgcolor='white'> $row->waktu </td>
                                        <td bgcolor='white'> $row->nama_makanan </td>";
                                         if($row->jam_makan=='1')
					                          { echo"<td bgcolor='white'>siang</td>"; }
					                          else
					                          {
					                            echo"<td bgcolor='white'> Malam </td>";
					                          }
                                    echo"
                                        <td bgcolor='white'>$row->keterangan</td>
                                        <td bgcolor='white'> $row->harga </td>
                                    </tr> ";
                            }?>  
	                      </table>
	               </div>
	            </div>        
	        </div>
	</div>

	
</body>
</html>

