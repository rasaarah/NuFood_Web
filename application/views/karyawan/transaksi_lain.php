<div id="fh5co-pricing-section">
	    <div class="container animate-box">

	            <div class="col-lg-12" style="margin-top:-10%;">
	                <h1 class="page-header">
	                    Transaksi Tambahan
	                </h1>
	            </div>

	            <div class="col-lg-12">
	                <div class="table-responsive">
	                      <table class="table table-striped">
	                        <tr>
	                            <td> Tanggal </td>
	                            <td> Pesanan </td>
	                            <td> Keterangan </td> 
                                <td> Harga </td>
	                        </tr> 
                            <?php  foreach ($transaksi as $row ) {
                                echo" <tr>
                                        <td bgcolor='white'> $row->waktu </td>
                                        <td bgcolor='white'> $row->rincian </td>";
                                        
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

