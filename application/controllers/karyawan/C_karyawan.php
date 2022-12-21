<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_karyawan extends CI_Controller {

	 
	function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->model("m_karyawan");
		$this->load->helper("url");
		$this->load->helper("date");
		
		$this->load->library('session');  
		$this->load->library('form_validation');
  
		$karyawan=$this->session->userdata('status');
		if($karyawan==''||$karyawan!='karyawan')
		{
			redirect('auth');
		}
		 
	} 

	function index()
	{
	
		$id_user= $_SESSION['id_user'] ;
        $query = $this->db->query("SELECT saldo FROM tbl_user WHERE status='karyawan' AND id_user=".$id_user." ");
		$row = $query->row();
		$saldo = $row->saldo;

		// if($saldo['saldo'] = $this->session->userdata('saldo') < '10000')
		if ($saldo < '10000') 
		{
			// $saldo['saldo'] = $this->session->userdata('saldo');
			$data['saldo'] = $this->m_karyawan->tampil_saldo();
			$this->load->view('karyawan/nav',$data);
			$this->load->view('karyawan/popup');
			$data['ob']=$this->m_karyawan->get_ob();
			$this->load->view('karyawan/footer',$data);
		}
		else
		{	
				//$this->sendMail();	              
				$data['saldo'] = $this->m_karyawan->tampil_saldo();
				$this->load->view('karyawan/nav',$data);
				$this->load->view('karyawan/index',$data);
				$data['ob']=$this->m_karyawan->get_ob();
				$this->load->view('karyawan/footer',$data);
		
		}
	
	}

//--------------------------------------------------------------------------------------------
// Popup waktu siang/malam
//--------------------------------------------------------------------------------------------

	function popup()
	{
		$data['saldo'] = $this->m_karyawan->tampil_saldo();

		$this->load->view('karyawan/nav',$data);
		$this->load->view('karyawan/popup_waktu',$data);
		$data['ob']=$this->m_karyawan->get_ob();
		$this->load->view('karyawan/footer',$data);
	}

	function popup_siang()
	{
		$data['saldo'] = $this->m_karyawan->tampil_saldo();

		$this->load->view('karyawan/nav',$data);
		$this->load->view('karyawan/popup_siang',$data);
		$data['ob']=$this->m_karyawan->get_ob();
		$this->load->view('karyawan/footer',$data);
	}

	function popup_malam()
	{
		$data['saldo'] = $this->m_karyawan->tampil_saldo();

		$this->load->view('karyawan/nav',$data);
		$this->load->view('karyawan/popup_malam',$data);
		$data['ob']=$this->m_karyawan->get_ob();
		$this->load->view('karyawan/footer',$data);
	}



//--------------------------------------------------------------------------------------------
// Popup waktu siang dan malam abis
//--------------------------------------------------------------------------------------------

	function waktu_abis()
	{
		$data['saldo'] = $this->m_karyawan->tampil_saldo();

		$this->load->view('karyawan/nav',$data);
		$this->load->view('karyawan/waktu_abis',$data);
		$data['ob']=$this->m_karyawan->get_ob();
		$this->load->view('karyawan/footer',$data);
	}

//--------------------------------------------------------------------------------------------
//ganti password
//--------------------------------------------------------------------------------------------
	public function edit_password()
	{
		
		$data['saldo'] = $this->m_karyawan->tampil_saldo();
		$this->load->view('karyawan/nav',$data);
		$this->load->view('karyawan/edit_password');
		$data['ob']=$this->m_karyawan->get_ob();
		$this->load->view('karyawan/footer',$data);
	}

	function changePass(){

    $oldPass= $this->form_validation->set_rules('oldPass','Old Password','required');
    $this->form_validation->set_rules('newPass','New Password','required');
    $this->form_validation->set_rules('renewPass','Retype Password','required|matches[newPass]');

    if($this->form_validation->run() == FALSE){
        $ref = $this->input->server('HTTP_REFERER', TRUE);
         echo "<script>alert('periksa kembali inputan anda');history.go(-1);</script>";
        //redirect($ref, 'karyawan/c_karyawan/edit_password');

    }else{

        $query = $this->m_karyawan->checkOldPass(($this->input->post('oldPass')));

        if($query){
            $query = $this->m_karyawan->saveNewPass(md5($this->input->post('newPass')));
            if($query){
               
                echo "<script>alert('password terganti');history.go(-1);</script>";
                $this->session->sess_destroy();
              	// $this->load->view('karyawan/index');

            }else{
                $ref = $this->input->server('HTTP_REFERER', TRUE);
                //echo "<script>alert('aaaaaaa');history.go(-1);</script>";
               	redirect($ref, 'karyawan/c_karyawan/edit_password');

            }
        }
        else{

            echo "<script>alert('password saat ini tidak sesuai');history.go(-1);</script>";
        }
    }
}
//--------------------------------------------------------------------------------------------
// Pilih Menu Makan siang	
//--------------------------------------------------------------------------------------------
	 function menu_utama_siang()
	{
			$data['order'] = $this->m_karyawan->get_order_siang()->result();
			if($data['order']==null )
			{

				$data['saldo'] = $this->m_karyawan->tampil_saldo();
				$this->load->view('karyawan/nav',$data);
				$data['makanan'] = $this->m_karyawan->tampil_makanan();
				$data['makanan']=$this->m_karyawan->caridata();
			
				if($data['makanan']==null) 
					{
	  		 			echo "<script>alert('data yang anda cari tidak ada');history.go(-1);</script>";
	    				$this->load->view('karyawan/utama_siang',$data);
	    				$data['ob']=$this->m_karyawan->get_ob();
						$this->load->view('karyawan/footer',$data);
			    	}	
			    else 
			    	{
			        	$this->load->view('karyawan/utama_siang',$data);
			        	$data['ob']=$this->m_karyawan->get_ob();
						$this->load->view('karyawan/footer',$data);
			     	}

			}
			else
			{
				$data['saldo'] = $this->m_karyawan->tampil_saldo();
				$this->load->view('karyawan/nav',$data);
				$this->load->view('karyawan/popup_order');
				$data['ob']=$this->m_karyawan->get_ob();
				$this->load->view('karyawan/footer',$data);

			}
		
	}


	 function add_order_utama_siang_aksi()
    {	
    	$id_user= $_SESSION['id_user'] ;
        $query = $this->db->query("SELECT saldo FROM tbl_user WHERE status='karyawan' AND id_user=".$id_user." ");
		$row = $query->row();
		$saldo = $row->saldo;
		$data['makanan'] = $this->m_karyawan->tampil_makanan();

       	$username = $this->session->userdata('id_user');
        $id = $this->input->post('id_makanan');
     	        $keterangan = $this->input->post('note') ;
        $harga = $this->input->post('harga');
    

 		if($saldo >=$harga)
 		{
 			$data = array(
	     	 'id_user' => $username,
	        'id_makanan' => $id,
	      	'note' => $keterangan
	


	      	);
     		$this->m_karyawan->add_pesanan_utama_siang($data,'tbl_order');
     		redirect('karyawan/C_karyawan/pilih_alternatif_satu_siang');

 		}
 		else{
 			echo "<script>alert('saldo anda tidak cukup untuk membeli makanan ini');history.go(-1);</script>";
 			$data['saldo'] = $this->m_karyawan->tampil_saldo();
			$this->load->view('karyawan/nav',$data);
 			$data['makanan'] = $this->m_karyawan->tampil_makanan();
 			$this->load->view('karyawan/utama_siang',$data);
			$data['ob']=$this->m_karyawan->get_ob();
			$this->load->view('karyawan/footer',$data);

 		}

     	
     	
 	}

// --------------------------------------------------------------------------------------------
// order menu alternatif satu siang
// --------------------------------------------------------------------------------------------
 	 function add_alternatif_satu_siang()
	{
		//$saldo['saldo'] = $this->session->userdata('saldo');
		$data['saldo'] = $this->m_karyawan->tampil_saldo();
		$this->load->view('karyawan/nav',$data);
		$data['makanan'] = $this->m_karyawan->tampil_makanan();


		 $data['makanan']=$this->m_karyawan->caridata();
			
			if($data['makanan']==null) {
	  		 echo "<script>alert('data yang anda cari tidak ada');history.go(-1);</script>";
	    		$this->load->view('karyawan/alternatif_satu_siang',$data);
	    		$data['ob']=$this->m_karyawan->get_ob();
				$this->load->view('karyawan/footer',$data);
			     }
			     else 
			     {
			        $this->load->view('karyawan/alternatif_satu_siang',$data);
			        $data['ob']=$this->m_karyawan->get_ob();
					$this->load->view('karyawan/footer',$data);
			      }
	}

	 function add_alternatif_satu_siang_aksi()
    {
    	$id_user= $_SESSION['id_user'] ;
        $query = $this->db->query("SELECT saldo FROM tbl_user WHERE status='karyawan' AND id_user=".$id_user." ");
		$row = $query->row();
		$saldo = $row->saldo;
		$data['makanan'] = $this->m_karyawan->tampil_makanan();

		$username = $this->session->userdata('id_user');
        $id = $this->input->post('id_makanan');
        $keterangan = $this->input->post('note');
   		$harga = $this->input->post('harga');

		if($saldo  >= $harga)
 		{
 			$data = array(
	     	 'id_user' => $username,
	        'id_makanan' => $id,
	      	'note' => $keterangan);
    	 	$this->m_karyawan->add_pesanan_alternatif_satu_siang($data,'tbl_order');
	     	redirect('karyawan/C_karyawan/pilih_alternatif_dua_siang');

 		}
 		else{
 		echo "<script>alert('saldo anda tidak cukup untuk membeli makanan ini');history.go(-1);</script>";
 			$data['saldo'] = $this->m_karyawan->tampil_saldo();
			$this->load->view('karyawan/nav',$data);
 			$data['makanan'] = $this->m_karyawan->tampil_makanan();
 			$this->load->view('karyawan/alternatif_satu_siang',$data);
			$data['ob']=$this->m_karyawan->get_ob();
			$this->load->view('karyawan/footer',$data);

 		}

    }



// --------------------------------------------------------------------------------------------
// order menu alternatif dua siang
// --------------------------------------------------------------------------------------------
 	 function add_alternatif_dua_siang()
	{
		// $saldo['saldo'] = $this->session->userdata('saldo');
		// $this->load->view('karyawan/nav',$saldo);
		$data['saldo'] = $this->m_karyawan->tampil_saldo();
		$this->load->view('karyawan/nav',$data);
		$data['makanan'] = $this->m_karyawan->tampil_makanan();


		 $data['makanan']=$this->m_karyawan->caridata();
			
			if($data['makanan']==null) {
	  		 echo "<script>alert('data yang anda cari tidak ada');history.go(-1);</script>";
	    		$this->load->view('karyawan/alternatif_dua_siang',$data); 
	    		$data['ob']=$this->m_karyawan->get_ob();
				$this->load->view('karyawan/footer',$data);
			     }
			     else 
			     {
			        $this->load->view('karyawan/alternatif_dua_siang',$data);
			        $data['ob']=$this->m_karyawan->get_ob();
					$this->load->view('karyawan/footer',$data);
			      }
	}

	 function add_alternatif_dua_siang_aksi()
    {
		$id_user= $_SESSION['id_user'] ;
        $query = $this->db->query("SELECT saldo FROM tbl_user WHERE status='karyawan' AND id_user=".$id_user." ");
		$row = $query->row();
		$saldo = $row->saldo;
		$data['makanan'] = $this->m_karyawan->tampil_makanan();

       	$username = $this->session->userdata('id_user');
        $id = $this->input->post('id_makanan');
        $keterangan = $this->input->post('note');
        $harga = $this->input->post('harga');

 		if($saldo >= $harga)
 		{
 			$data = array(
	     	 'id_user' => $username,
	        'id_makanan' => $id,
	      	'note' => $keterangan);
     		$this->m_karyawan->add_pesanan_alternatif_dua_siang($data,'tbl_order');
     		redirect('karyawan/C_karyawan/pesanan');

 		}
 		else{
 			echo "<script>alert('saldo anda tidak cukup untuk membeli makanan ini');history.go(-1);</script>";
 			$data['saldo'] = $this->m_karyawan->tampil_saldo();
			$this->load->view('karyawan/nav',$data);
 			$data['makanan'] = $this->m_karyawan->tampil_makanan();
 			$this->load->view('karyawan/alternatif_dua_siang',$data);
			$data['ob']=$this->m_karyawan->get_ob();
			$this->load->view('karyawan/footer',$data);

 		}

 	}

// --------------------------------------------------------------------------------------------
// pilih alternatif satu siang
// --------------------------------------------------------------------------------------------

 	public function pilih_alternatif_satu_siang()
	{
		
		// $saldo['saldo'] = $this->session->userdata('saldo');
		// $this->load->view('karyawan/nav',$saldo);
		$data['saldo'] = $this->m_karyawan->tampil_saldo();
		$this->load->view('karyawan/nav',$data);
		$this->load->view('karyawan/pilih_alternatif_satu_siang');
		$data['ob']=$this->m_karyawan->get_ob();
		$this->load->view('karyawan/footer',$data);
	}

// --------------------------------------------------------------------------------------------
// pilih alternatif dua siang
// --------------------------------------------------------------------------------------------

 	public function pilih_alternatif_dua_siang()
	{
		
		// $saldo['saldo'] = $this->session->userdata('saldo');
		// $this->load->view('karyawan/nav',$saldo);
		$data['saldo'] = $this->m_karyawan->tampil_saldo();
		$this->load->view('karyawan/nav',$data);
		$this->load->view('karyawan/pilih_alternatif_dua_siang');
		$data['ob']=$this->m_karyawan->get_ob();
		$this->load->view('karyawan/footer',$data);
	}



//--------------------------------------------------------------------------------------------
// Pilih Menu Makan malam	
//--------------------------------------------------------------------------------------------
	 function menu_utama_malam()
	{
			$data['order'] = $this->m_karyawan->get_order_malam()->result();
			if($data['order']==null )
			{

				$data['saldo'] = $this->m_karyawan->tampil_saldo();
				$this->load->view('karyawan/nav',$data);
				$data['makanan'] = $this->m_karyawan->tampil_makanan();
				$data['makanan']=$this->m_karyawan->caridata();
			
				if($data['makanan']==null) 
					{
	  		 			echo "<script>alert('data yang anda cari tidak ada');history.go(-1);</script>";
	    				$this->load->view('karyawan/utama_malam',$data);
	    				$data['ob']=$this->m_karyawan->get_ob();
						$this->load->view('karyawan/footer',$data);
	    				
			    	}	
			    else 
			    	{
			        	$this->load->view('karyawan/utama_malam',$data);
			        	$data['ob']=$this->m_karyawan->get_ob();
						$this->load->view('karyawan/footer',$data); 
			     	}

			}
			else
			{
				$data['saldo'] = $this->m_karyawan->tampil_saldo();
				$this->load->view('karyawan/nav',$data);
				$this->load->view('karyawan/popup_order');
				$data['ob']=$this->m_karyawan->get_ob();
				$this->load->view('karyawan/footer',$data);

			}
		
	}


	 function add_order_utama_malam_aksi()
    {
    	$id_user= $_SESSION['id_user'] ;
        $query = $this->db->query("SELECT saldo FROM tbl_user WHERE status='karyawan' AND id_user=".$id_user." ");
		$row = $query->row();
		$saldo = $row->saldo;
		$data['makanan'] = $this->m_karyawan->tampil_makanan();

       	$username = $this->session->userdata('id_user');
        $id = $this->input->post('id_makanan');
        $keterangan = $this->input->post('note');
        $harga = $this->input->post('harga');

 		if($saldo  >= $harga)
 		{
 			$data = array(
	     	 'id_user' => $username,
	        'id_makanan' => $id,
	      	'note' => $keterangan);
	     	$this->m_karyawan->add_pesanan_utama_malam($data,'tbl_order');
	     	redirect('karyawan/C_karyawan/pilih_alternatif_satu_malam');

 		}
 		else{
 			echo "<script>alert('saldo anda tidak cukup untuk membeli makanan ini');history.go(-1);</script>";
 			$data['saldo'] = $this->m_karyawan->tampil_saldo();
			$this->load->view('karyawan/nav',$data);
 			$data['makanan'] = $this->m_karyawan->tampil_makanan();
 			$this->load->view('karyawan/utama_malam',$data);
			$data['ob']=$this->m_karyawan->get_ob();
			$this->load->view('karyawan/footer',$data);

 		}

    	
     	
 	}

// --------------------------------------------------------------------------------------------
// order menu alternatif satu malam
// --------------------------------------------------------------------------------------------
 	 function add_alternatif_satu_malam()
	{
		//$saldo['saldo'] = $this->session->userdata('saldo');
		$data['saldo'] = $this->m_karyawan->tampil_saldo();
		$this->load->view('karyawan/nav',$data);
		$data['makanan'] = $this->m_karyawan->tampil_makanan();


		 $data['makanan']=$this->m_karyawan->caridata();
			
			if($data['makanan']==null) {
	  		 echo "<script>alert('data yang anda cari tidak ada');history.go(-1);</script>";
	    		$this->load->view('karyawan/alternatif_satu_malam',$data);
	    		$data['ob']=$this->m_karyawan->get_ob();
				$this->load->view('karyawan/footer',$data);
			     }
			     else 
			     {
			        $this->load->view('karyawan/alternatif_satu_malam',$data);
			       $data['ob']=$this->m_karyawan->get_ob();
					$this->load->view('karyawan/footer',$data);
			      }
	}

	 function add_alternatif_satu_malam_aksi()
    {
    	$id_user= $_SESSION['id_user'] ;
        $query = $this->db->query("SELECT saldo FROM tbl_user WHERE status='karyawan' AND id_user=".$id_user." ");
		$row = $query->row();
		$saldo = $row->saldo;
		$data['makanan'] = $this->m_karyawan->tampil_makanan();

       	$username = $this->session->userdata('id_user');
        $id = $this->input->post('id_makanan');
        $keterangan = $this->input->post('note');
        $harga = $this->input->post('harga');

 		if($saldo  >= $harga)
 		{
 			$data = array(
	     	 'id_user' => $username,
	        'id_makanan' => $id,
	      	'note' => $keterangan);
	     	$this->m_karyawan->add_pesanan_alternatif_satu_malam($data,'tbl_order');
     		redirect('karyawan/C_karyawan/pilih_alternatif_dua_malam');

 		}
 		else{
 			echo "<script>alert('saldo anda tidak cukup untuk membeli makanan ini');history.go(-1);</script>";
 			$data['saldo'] = $this->m_karyawan->tampil_saldo();
			$this->load->view('karyawan/nav',$data);
 			$data['makanan'] = $this->m_karyawan->tampil_makanan();
 			$this->load->view('karyawan/alternatif_satu_malam',$data);
			$data['ob']=$this->m_karyawan->get_ob();
			$this->load->view('karyawan/footer',$data);

 		}

    }



// --------------------------------------------------------------------------------------------
// order menu alternatif dua malam
// --------------------------------------------------------------------------------------------
 	 function add_alternatif_dua_malam()
	{
		// $saldo['saldo'] = $this->session->userdata('saldo');
		// $this->load->view('karyawan/nav',$saldo);
		$data['saldo'] = $this->m_karyawan->tampil_saldo();
		$this->load->view('karyawan/nav',$data);
		$data['makanan'] = $this->m_karyawan->tampil_makanan();


		 $data['makanan']=$this->m_karyawan->caridata();
			
			if($data['makanan']==null) {
	  		 echo "<script>alert('data yang anda cari tidak ada');history.go(-1);</script>";
	    		$this->load->view('karyawan/alternatif_dua_malam',$data); 
	    		$data['ob']=$this->m_karyawan->get_ob();
				$this->load->view('karyawan/footer',$data);
			     }
			     else 
			     {
			        $this->load->view('karyawan/alternatif_dua_malam',$data);
			      	$data['ob']=$this->m_karyawan->get_ob();
					$this->load->view('karyawan/footer',$data);
			      }
	}

	 function add_alternatif_dua_malam_aksi()
    {	
    	$id_user= $_SESSION['id_user'] ;
        $query = $this->db->query("SELECT saldo FROM tbl_user WHERE status='karyawan' AND id_user=".$id_user." ");
		$row = $query->row();
		$saldo = $row->saldo;
		$data['makanan'] = $this->m_karyawan->tampil_makanan();

       	$username = $this->session->userdata('id_user');
        $id = $this->input->post('id_makanan');
        $keterangan = $this->input->post('note');
        $harga = $this->input->post('harga');

 		if($saldo  >= $harga)
 		{
 			$data = array(
	     	 'id_user' => $username,
	        'id_makanan' => $id,
	      	'note' => $keterangan);
	     	$this->m_karyawan->add_pesanan_alternatif_dua_malam($data,'tbl_order');
     		redirect('karyawan/C_karyawan/pesanan');

 		}
 		else{
 			echo "<script>alert('saldo anda tidak cukup untuk membeli makanan ini');history.go(-1);</script>";
 			$data['saldo'] = $this->m_karyawan->tampil_saldo();
			$this->load->view('karyawan/nav',$data);
 			$data['makanan'] = $this->m_karyawan->tampil_makanan();
 			$this->load->view('karyawan/alternatif_dua_malam',$data);
			$data['ob']=$this->m_karyawan->get_ob();
			$this->load->view('karyawan/footer',$data);

 		} 
 	}

// --------------------------------------------------------------------------------------------
// pilih alternatif satu malam
// --------------------------------------------------------------------------------------------

 	public function pilih_alternatif_satu_malam()
	{
		
		// $saldo['saldo'] = $this->session->userdata('saldo');
		// $this->load->view('karyawan/nav',$saldo);
		$data['saldo'] = $this->m_karyawan->tampil_saldo();
		$this->load->view('karyawan/nav',$data);
		$this->load->view('karyawan/pilih_alternatif_satu_malam');
		$data['ob']=$this->m_karyawan->get_ob();
		$this->load->view('karyawan/footer',$data);
	}

// --------------------------------------------------------------------------------------------
// pilih alternatif dua malam
// --------------------------------------------------------------------------------------------

 	public function pilih_alternatif_dua_malam()
	{
		
		// $saldo['saldo'] = $this->session->userdata('saldo');
		// $this->load->view('karyawan/nav',$saldo);
		$data['saldo'] = $this->m_karyawan->tampil_saldo();
		$this->load->view('karyawan/nav',$data);
		$this->load->view('karyawan/pilih_alternatif_dua_malam');
		$data['ob']=$this->m_karyawan->get_ob();
		$this->load->view('karyawan/footer',$data);
	}




 // --------------------------------------------------------------------------------------------
// transaksi
// --------------------------------------------------------------------------------------------

 	public function transaksi()
	{
		
		// $saldo['saldo'] = $this->session->userdata('saldo');
		// $this->load->view('karyawan/nav',$saldo);
		$data['saldo'] = $this->m_karyawan->tampil_saldo();
		$this->load->view('karyawan/nav',$data);
		$data['transaksi'] = $this->m_karyawan->get_transaksi()->result();
		$this->load->view('karyawan/transaksi',$data);
		$data['ob']=$this->m_karyawan->get_ob();
		$this->load->view('karyawan/footer',$data);
	}
 // --------------------------------------------------------------------------------------------
// pesanan
// --------------------------------------------------------------------------------------------

	public function pesanan()
	{
		
		// $saldo['saldo'] = $this->session->userdata('saldo');
		// $this->load->view('karyawan/nav',$saldo);
		$data['saldo'] = $this->m_karyawan->tampil_saldo();
		$this->load->view('karyawan/nav',$data);
		$data['order'] = $this->m_karyawan->get_order()->result();
		$this->load->view('karyawan/pesanan',$data);
		$data['ob']=$this->m_karyawan->get_ob();
		$this->load->view('karyawan/footer',$data);
	}
	// --------------------------------------------------------------------------------------------
	//orderan lain
	// --------------------------------------------------------------------------------------------

	public function orderan_lain()
	{
		$id_user= $_SESSION['id_user'] ;
        $query = $this->db->query("SELECT saldo FROM tbl_user WHERE status='karyawan' AND id_user=".$id_user." ");
		$row = $query->row();
		$saldo = $row->saldo;

		// if($saldo['saldo'] = $this->session->userdata('saldo') < '10000')
		if ($saldo < '10000') 
		{
			// $saldo['saldo'] = $this->session->userdata('saldo');
			$data['saldo'] = $this->m_karyawan->tampil_saldo();
			$this->load->view('karyawan/nav',$data);
			$this->load->view('karyawan/popup');
			$data['ob']=$this->m_karyawan->get_ob();
			$this->load->view('karyawan/footer',$data);
		}
		else
		{	
			$data['saldo'] = $this->m_karyawan->tampil_saldo();
			$this->load->view('karyawan/nav',$data);
			$this->load->view('karyawan/orderan_lain');
			$data['ob']=$this->m_karyawan->get_ob();
			$this->load->view('karyawan/footer',$data);
		}
	}


	function add_order_lain_aksi()
    {	
  	
     	$username = $this->session->userdata('id_user');
        $keterangan = $this->input->post('note') ;
 			$data = array(
	     	 'id_user' => $username,
	      	'rincian' => $keterangan

	      	);
     		$this->m_karyawan->add_orderan_lain($data,'tbl_order_lain');
     		redirect('karyawan/C_karyawan/pesanan');
	}

	public function pesanan_tambahan()
	{
		
		$data['saldo'] = $this->m_karyawan->tampil_saldo();
		$this->load->view('karyawan/nav',$data);
		$data['order'] = $this->m_karyawan->get_order_lain()->result();
		$this->load->view('karyawan/pesanan_lain',$data);
		$data['ob']=$this->m_karyawan->get_ob();
		$this->load->view('karyawan/footer',$data);
	}

	public function transaksi_lain()
	{
		
		// $saldo['saldo'] = $this->session->userdata('saldo');
		// $this->load->view('karyawan/nav',$saldo);
		$data['saldo'] = $this->m_karyawan->tampil_saldo();
		$this->load->view('karyawan/nav',$data);
		$data['transaksi'] = $this->m_karyawan->get_transaksi_lain()->result();
		$this->load->view('karyawan/transaksi_lain',$data);
		$data['ob']=$this->m_karyawan->get_ob();
		$this->load->view('karyawan/footer',$data);
	}
 		



	public function logout() 
	{
		$this->session->unset_userdata('nama');
		$this->session->unset_userdata('status');
		session_destroy();
		redirect('auth');
	}
	

}
