<?php
class M_karyawan extends CI_Model
    {
        function tampil_saldo()
         {
            $id_user= $_SESSION['id_user'] ;
            $query = $this->db->query("SELECT saldo ,nama FROM tbl_user WHERE status='karyawan' AND id_user=".$id_user." ");
            return $query->result();
        } 

    	function tampil_makanan()  
    	{   
 
    		return $this->db->get('tbl_makanan')->result();
    	}
// ---------------------------------------------------------------------------------------
// ganti password 
// ------------------------------------------------------ ---------------------------------
      
         function checkOldPass($oldPass)
        {
            $id_user= $_SESSION['id_user'] ;
            $this->db->where('id_user',$id_user);
            $this->db->where('password', md5($oldPass));
            $query=$this->db->get('tbl_user');
            if($query->num_rows()>0)
            {
              $row=$query->row();
              $oli = md5($oldPass);
              if($row->password == $oli){
                  return 1;
                  
              }else{
                 return 0;
              }
            }
       
         }

      function saveNewPass($new_pass){
          $data = array(
              'password' => $new_pass
          );
          $this->db->where('id_user', $this->session->userdata('id_user'));
          $query = $this->db->update('tbl_user', $data);
          if($query){
              return true;
          }else{
              return false;
          }
      }               
       
       
 // --------------------------------------------------------------------------------------------------------------
// --------------------------------------- siang-----------------------------------------------------------------
// --------------------------------------------------------------------------------------------------------------
    	function add_pesanan_utama_siang($data,$table)
    	{
      
            $query = $this->db->query("SELECT MAX(kode_pemesanan) as max_kode FROM tbl_order"); 
            $row = $query->row_array();
            $max_kode = $row['max_kode']; 
            $kode_pemesanan = $max_kode+1;
            $maxkode_pemesanan =$kode_pemesanan;
            $_SESSION['kode_pemesanan']=$maxkode_pemesanan;
            $data['kode_pemesanan']=  $maxkode_pemesanan;
             $data['jenis_order'] = 'Utama';
            $data['jam_makan']='1';
            $this->db->insert($table,$data);          
    	} 

        function add_pesanan_alternatif_satu_siang($data,$table)
        {
            $data['kode_pemesanan']=$_SESSION['kode_pemesanan'];
            $data['jenis_order'] = 'Alternatif 1';
            $data['jam_makan']='1';
            $this->db->insert($table,$data);            
        }

        function add_pesanan_alternatif_dua_siang($data,$table)
        {
             $data['kode_pemesanan']=$_SESSION['kode_pemesanan'];
            $data['jenis_order'] = 'Alternatif 2';
            $data['jam_makan']='1';
            $this->db->insert($table,$data);
        }

        function get_order_siang()
        {

            $today = date('Y-m-d');
            $id_user= $_SESSION['id_user'] ;
            $jam_makan='1';
    

            $this->db->select('*');
            $this->db->from('tbl_order');
            $this->db->where('date(waktu)',$today );
             $this->db->where('id_user',$id_user);
               $this->db->where('jam_makan',$jam_makan);
             $this->db->join('tbl_makanan','tbl_makanan.id_makanan=tbl_order.id_makanan');
            $this->db->order_by('id_order','asc');
             return $this->db->get();
             //  $sql= $this->db->query("SELECT * FROM tbl_order JOIN tbl_makanan ON tbl_makanan.id_makanan=tbl_order.id_makanan WHERE  id_user=$id_user and date(waktu)=date('2016-8-10') ");
             // return $sql;
           // echo $this->db->last_query();
        }
 
// --------------------------------------------------------------------------------------------------------------
// --------------------------------------- Malam-----------------------------------------------------------------
// --------------------------------------------------------------------------------------------------------------
        function add_pesanan_utama_malam($data,$table)
        {
              $query = $this->db->query("SELECT MAX(kode_pemesanan) as max_kode FROM tbl_order"); 
            $row = $query->row_array();
            $max_kode = $row['max_kode']; 
            $kode_pemesanan = $max_kode+1;
            $maxkode_pemesanan =$kode_pemesanan;
            $_SESSION['kode_pemesanan']=$maxkode_pemesanan;
            $data['kode_pemesanan']=  $maxkode_pemesanan;
             $data['jenis_order'] = 'Utama';
            $data['jam_makan']='0';
            $this->db->insert($table,$data);                    
        } 

        function add_pesanan_alternatif_satu_malam($data,$table)
        {
             $data['kode_pemesanan']=$_SESSION['kode_pemesanan'];
            $data['jenis_order'] = 'Alternatif 1';
            $data['jam_makan']='0';
            $this->db->insert($table,$data);           
        }

        function add_pesanan_alternatif_dua_malam($data,$table)
        {
             $data['kode_pemesanan']=$_SESSION['kode_pemesanan'];
            $data['jenis_order'] = 'Alternatif 2';
            $data['jam_makan']='0';
            $this->db->insert($table,$data);
        }

        function get_order_malam()
        {

            $today = date('Y-m-d');
            $id_user= $_SESSION['id_user'] ;
            $jam_makan='0'; 
    

            $this->db->select('*');
            $this->db->from('tbl_order');
            $this->db->where('date(waktu)',$today );
             $this->db->where('id_user',$id_user);
               $this->db->where('jam_makan',$jam_makan);
             $this->db->join('tbl_makanan','tbl_makanan.id_makanan=tbl_order.id_makanan');
            $this->db->order_by('id_order','asc');
             return $this->db->get();
             //  $sql= $this->db->query("SELECT * FROM tbl_order JOIN tbl_makanan ON tbl_makanan.id_makanan=tbl_order.id_makanan WHERE  id_user=$id_user and date(waktu)=date('2016-8-10') ");
             // return $sql;
           // echo $this->db->last_query();
        }
//-----------------------------------------------------------------------------------------------------------------
        
        function caridata()
        {
            $c = $this->input->POST ('cari');
            $this->db->like('nama_makanan', $c);
            $this->db->or_like('harga', $c);
            $query = $this->db->get ('tbl_makanan');
            return $query->result(); 
        } 

        function get_order()
        {

            $today = date('Y-m-d');
            $id_user= $_SESSION['id_user'] ;
    

            $this->db->select('*');
            $this->db->from('tbl_order');
            $this->db->where('date(waktu)',$today );
             $this->db->where('id_user',$id_user);
  
             $this->db->join('tbl_makanan','tbl_makanan.id_makanan=tbl_order.id_makanan');
            $this->db->order_by('id_order','asc');
             return $this->db->get();
             //  $sql= $this->db->query("SELECT * FROM tbl_order JOIN tbl_makanan ON tbl_makanan.id_makanan=tbl_order.id_makanan WHERE  id_user=$id_user and date(waktu)=date('2016-8-10') ");
             // return $sql;
           // echo $this->db->last_query();
        }

    	function get_transaksi()
    	{
            $id_user= $_SESSION['id_user'] ;
            $this->db->like('tbl_transaksi.waktu', date('Y-m') );
            $this->db->select('tbl_transaksi.*,tbl_makanan.nama_makanan,tbl_transaksi.harga,tbl_order.jam_makan');
            $this->db->where('tbl_transaksi.id_user',$id_user);
            $this->db->from('tbl_transaksi');
            $this->db->order_by('tbl_transaksi.waktu desc');
            $this->db->join('tbl_order', 'tbl_order.id_order = tbl_transaksi.id_order');
            $this->db->join('tbl_makanan', 'tbl_makanan.id_makanan = tbl_order.id_makanan');
    	   return $this->db->get();
         // echo $this->db->last_query();
            
        }

        function get_ob()
        {
          $query=$this->db->query("select * from tbl_user where status='ob' ");
          return $query->result();
        }


//-----------------------
// menu tambahan
//-------------------
        //  function add_orderan_lain($data,$table)
        // {
        //   $this->db->insert($table,$data);            
        // }

        //   function get_order_lain()
        // {

        //     $today = date('Y-m-d');
        //     $id_user= $_SESSION['id_user'] ;
        //     $this->db->select('*');
        //     $this->db->from('tbl_order_lain');
        //     $this->db->where('date(waktu)',$today );
        //     $this->db->where('id_user',$id_user);
        //     $this->db->order_by('id','asc');
        //      return $this->db->get();
        // }
        // function get_transaksi_lain()
        // {
        //     $id_user= $_SESSION['id_user'] ;
        //     $this->db->like('tbl_transaksi_lain.waktu', date('Y-m') );
        //     $this->db->select('*');
        //     $this->db->where('tbl_transaksi_lain.id_user',$id_user);
        //     $this->db->from('tbl_transaksi_lain');
        //     $this->db->order_by('tbl_transaksi_lain.waktu desc');
        //     $this->db->join('tbl_order_lain', 'tbl_order_lain.id = tbl_transaksi_lain.id_order_lain');
        //     return $this->db->get();
        //  // echo $this->db->last_query();
            
        // }




                 
    }
?>