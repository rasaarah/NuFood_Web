<div id="fh5co-pricing-section">
      <div class="container animate-box">
        <div class="col-lg-12" style="margin-top:-10%;">
          <h1 class='page-header'>Makanan <small style="color:#82837E;">Yang Telah Anda Pesan </small></h1>
        </div>
      

      <div class="col-lg-12">
        <?php  
                                        
          echo"

            <div class='table-responsive'>
              <table class='table table-striped'>
                <tr>
                  <th>Tanggal</th>
                  <th>Pesanan</th>
                  <th>Status</th>  
                  </tr>

                    <tbody>";                             
                      foreach ($order as $row ) 
                      {
                        echo "
                        <tr>
                          <td bgcolor='white'>$row->waktu</td>                 
                          <td bgcolor='white'>$row->rincian</td>";
                           if($row->status==1)
                          { echo"<td bgcolor='white'>Terbeli</td>"; }
                          elseif($row->status==-10)
                          {
                            echo"<td bgcolor='white'> Batal </td>";
                          }
                          else
                            { echo "<td bgcolor='white'>-</td>";}

                            
                        echo"</tr>";
        }?>
                    </tbody>
              </table>
            </div> <!--table-responsive-->
      </div>

      </div><!--END container-->
  </div> <!--END pricing-->
</body>
</html>

