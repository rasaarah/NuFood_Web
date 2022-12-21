<?php
class M_ob extends CI_Model{
	
    function tampil_nama() 
         {
            $id_user= $_SESSION['id_user'] ;
            $query = $this->db->query("SELECT saldo ,nama FROM tbl_user WHERE status='ob' AND id_user=".$id_user." ");
            return $query->result();
        } 
	function add_transaksi_ok($data,$table)
    {
           
        $this->db->insert($table,$data); 
        $this->db->query("UPDATE tbl_order SET status='1' WHERE id_order=?",array(intval($data ['id_order']))); 
         $this->db->query("UPDATE tbl_order SET status='-1' WHERE id_user = ".intval($data ['id_user'])." and id_order <> ?",array(intval($data['id_order'])));
		    $this->db->query("UPDATE tbl_user set tbl_user.saldo= tbl_user.saldo - ".$data['harga']." WHERE tbl_user.id_user=?  ",array(  intval($data['id_user'])));

         
      	$this->db->last_query();
        //echo $this->db->last_query();
    }

         function add_transaksi_batal($data,$table)
        {
			          
              $this->db->query("UPDATE tbl_order SET status=-10 WHERE kode_pemesanan=? ",array(intval($data ['kode_pemesanan']))); 
              echo $this->db->last_query();

        }

     
        function tampil_saldo(){
            // $status="karyawan";
            // $this->db->select('*');
            // $this->db->where('status',$status);
            // $query=$this->db->get('tbl_user',$num, $offset);
        	$query = $this->db->query("SELECT * FROM tbl_user WHERE status='karyawan' ");
        	return $query;
        }

        function total_saldo(){
        	$this->db->select_sum('saldo');
			$total_saldo=$this->db->get('tbl_user');
        	return $total_saldo;
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

      function get_ob()
        {
          $query=$this->db->query("select * from tbl_user where status='ob' ");
          return $query->result();
        }     
       
       
//------------------------------------------------------------------
// Pesanan lain
//------------------------------------------------------------------
    //     function pesanan_lain(){

    //         $query=$this->db->query("SELECT * FROM tbl_order_lain
    //         JOIN tbl_user ON tbl_user.id_user=tbl_order_lain.id_user 
    //         WHERE date(waktu)=CURRENT_DATE and tbl_order_lain.status=0");
    //         return $query->result();
    //     }

    //     function add_transaksi_lain_ok($data,$table)
    // {
           
    //     $this->db->insert($table,$data); 
    //     $this->db->query("UPDATE tbl_order_lain SET status='1' WHERE id=?",array(intval($data ['id']))); 
    //     $this->db->query("UPDATE tbl_user set tbl_user.saldo= tbl_user.saldo - ".$data['harga']." WHERE tbl_user.id_user=?  ",array(  intval($data['id_user'])));
    //     $this->db->last_query();
    //     //echo $this->db->last_query();
    // }

    //      function add_transaksi_lain_batal($data,$table)
    //     {
                      
    //           $this->db->query("UPDATE tbl_order_lain SET status=-10 WHERE id=? ",array(intval($data ['id']))); 
    //           echo $this->db->last_query();

    //     }

}
?>														 