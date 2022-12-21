<footer id="fh5co-footer" role="contentinfo">
    <div class="container">
      <div class="col-md-4 col-sm-10 col-sm-push-0 col-xs-10 col-xs-push-0">
        <h3>Tentang</h3>
        <p>NuFOOD adalah aplikasi berbasis web yang memungkinkan para pegawai PT Tiga Visi Kaya Warna memesan makanan dengan mudah, cepat dan praktis.<br> Aplikasi ini dapat memudahkan office boy untuk melihat pesanan makanan dari pegawai.</p>
      </div>
      <div class="col-md-5 col-md-push-1 col-sm-12 col-sm-push-0 col-xs-12 col-xs-push-0">
        <h3>Servis</h3>
        <ul class="float">
          <li>Pemesanan Makan Siang</li>
          <li>Pemesanan Makan Malam</li>
          <li>Menampilkan Rekaman Makanan yang Telah Dipesan</li>
          <li>Menampilkan Transaksi</li>
        </ul>
      </div>

      <div class="col-md-3 col-md-push-1 col-sm-12 col-sm-push-0 col-xs-12 col-xs-push-0">
        <h3>Petugas</h3>
        <ul class="fh5co-social">
        <?php  foreach($ob as $row){ 
          echo"<li> $row->nama</li>";
          }?>
       
        </ul>
      </div>
      
      
      <div class="col-md-12 fh5co-copyright text-center">
        <p>NuFood &copy; 2016.</p>  
      </div>
      
    </div>
  </footer>