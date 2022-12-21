<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_admin extends CI_Controller {
	 
	function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->model("m_admin");
		$this->load->helper('url');
			$this->load->helper('string');
	
		$this->load->library('session','pagination');
		$admin=$this->session->userdata('status');  
		if($admin=='' || $admin!='admin')	 
		{	
			redirect('auth');
		}

	}

	public function index()
	{ 
		$data['username'] = $this->session->userdata('nama');
		$this->load->view('admin/v_nav',$data);
		$data['user'] = $this->db->get('tbl_user')->num_rows();
		$data['makanan_rows'] = $this->db->get('tbl_makanan')->num_rows();
		$data['topup_rows'] = $this->db->get('tbl_topup')->num_rows();
		$data['transaksi_rows'] = $this->db->get('tbl_transaksi')->num_rows();
		$this->load->view('admin/v_index',$data);


	}

	public function logout() {
		$this->session->unset_userdata('nama');
		$this->session->unset_userdata('status');
		session_destroy();
		redirect('auth');
	}

/*----------------------------------------------------------------------------------------------
												USER
-----------------------------------------------------------------------------------------------*/
	public function user($offset=0)	{
		
			$jml = $this->db->get('tbl_user');
			
			$config['base_url'] = base_url().'index.php/admin/c_admin/user';
			
			$config['total_rows'] = $jml->num_rows();
			$config['per_page'] = 5; /*Jumlah data yang dipanggil perhalaman*/	
			
			/*Class bootstrap pagination yang digunakan*/
			$config['full_tag_open'] = "<ul class='pagination pagination-sm' style='position:relative; top:-25px;'>";
    		$config['full_tag_close'] ="</ul>";
			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';
			$config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='user'>";
			$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
			$config['next_tag_open'] = "<li >";
			$config['next_tagl_close'] = "</li>";
			$config['prev_tag_open'] = "<li >";
			$config['prev_tagl_close'] = "</li>";
			$config['first_tag_open'] = "<li>";
			$config['first_tagl_close'] = "</li>";

			$this->pagination->initialize($config);
			
			$data['halaman'] = $this->pagination->create_links();
			/*membuat variable halaman untuk dipanggil di view nantinya*/
			$data['offset'] = $offset;

			$data['data'] = $this->m_admin->view_user($config['per_page'], $offset);
		 	$username['username'] = $this->session->userdata('nama');
			$this->load->view('admin/v_nav',$username);
			$this->load->view('admin/v_user',$data);
			/*memanggil view pagination*/
		}
	public function add_user()
	{
		
		$username['username'] = $this->session->userdata('nama');
		$this->load->view('admin/v_nav',$username);
		$this->load->view('admin/v_add_user');
	}

	public function add_aksi_user()
    {

        $nama = $this->input->post('nama');
      $password = $this->input->post('password');
        $status = $this->input->post('status');

 		if($nama ==''  || $status ==''||$password==''){
       		echo "<script>alert('Data tidak boleh kosong');history.go(-1);</script>";

       }
       else{
       		$data = array(
        'nama' => $nama,
        'password' => md5($password),
        'status' => $status

          );
     $this->m_admin->input_data($data,'tbl_user');
     redirect('admin/c_admin/user');
       }
     	
        
      
 	}


 	public function hapus_user($id){
        $where = array('id_user' => $id);
        $this->m_admin->hapus_data($where,'tbl_user');
        redirect('admin/c_admin/user');
    }

	public function edit_user($id)
	{
		$username['username'] = $this->session->userdata('nama');
		$this->load->view('admin/v_nav',$username);
		 $where = array('id_user' => $id);
	 	$data['user']=$this->m_admin->edit_data($where,'tbl_user')->result();
		$this->load->view('admin/v_edit_user',$data);
	}

	

	public function update_user(){
		$id = $this->input->post('id_user');
        $nama = $this->input->post('nama');
        $password = $this->input->post('password');
       	if($nama =='' || $password ==''){
       		echo "<script>alert('Data tidak boleh kosong');history.go(-1);</script>";
       	}
       	else{
       		$data = array(
        	
            'nama' => $nama,
            'password' =>md5($password),
          
  			);
        $where = array('id_user' => $id);

                $this->m_admin->update_data($where,$data,'tbl_user');
                redirect('admin/c_admin/user');
       	}

        
       }
	

/*	----------------------------------------------------------------------------------------------------
													MAKANAN
	----------------------------------------------------------------------------------------------------
*/
	public function makanan($offset=0)	{
		
			$jml = $this->db->get('tbl_makanan');
			
			$config['base_url'] = base_url().'index.php/admin/c_admin/makanan';
			
			$config['total_rows'] = $jml->num_rows();
			$config['per_page'] = 5; /*Jumlah data yang dipanggil perhalaman*/	
			
			/*Class bootstrap pagination yang digunakan*/
			$config['full_tag_open'] = "<ul class='pagination pagination-sm' style='position:relative; top:-25px;'>";
    		$config['full_tag_close'] ="</ul>";
			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';
			$config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='makanan'>";
			$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
			$config['next_tag_open'] = "<li >";
			$config['next_tagl_close'] = "</li>";
			$config['prev_tag_open'] = "<li >";
			$config['prev_tagl_close'] = "</li>";
			$config['first_tag_open'] = "<li>";
			$config['first_tagl_close'] = "</li>";

			$this->pagination->initialize($config);
			
			$data['halaman'] = $this->pagination->create_links();
			/*membuat variable halaman untuk dipanggil di view nantinya*/
			$data['offset'] = $offset;

			$data['data'] = $this->m_admin->view_makanan($config['per_page'], $offset);
		 	$username['username'] = $this->session->userdata('nama');
			$this->load->view('admin/v_nav',$username);
			$this->load->view('admin/v_makanan',$data);
			/*memanggil view pagination*/

			
		}
	public function add_makanan()
	{	$logged_in = $this->session->userdata('status');
			if(!$logged_in){
				redirect(site_url('admin/c_admin'));
			}
		$username['username'] = $this->session->userdata('nama');
		$this->load->view('admin/v_nav',$username);
		$this->load->view('admin/v_add_makanan');
	}

	public function add_aksi_makanan()
    {
        $nama = $this->input->post('nama_makanan');
        $harga = $this->input->post('harga');

        if($nama =='' || $harga ==''){
       		echo "<script>alert('Data tidak boleh kosong');history.go(-1);</script>";

       }
        else{
       		$data = array(
        'nama_makanan' => $nama,
        'harga' => $harga
        
        );
     $this->m_admin->input_makanan($data,'tbl_makanan');
     redirect('admin/c_admin/makanan');
       }
 
     	
    }

    public function hapus_makanan($id){
        $where = array('id_makanan' => $id);
        $this->m_admin->hapus_data($where,'tbl_makanan');
        redirect('admin/c_admin/makanan');
    }
	public function edit_makanan($id)
	{
		$username['username'] = $this->session->userdata('nama');
		$this->load->view('admin/v_nav',$username);
		  $where = array('id_makanan' => $id);
	 $data['makanan']=$this->m_admin->edit_data($where,'tbl_makanan')->result();
		$this->load->view('admin/v_edit_makanan',$data);
	}

	public function update_makanan(){
        $id_makanan = $this->input->post('id_makanan');
        $nama_makanan = $this->input->post('nama_makanan');
        $harga = $this->input->post('harga');
        if($nama_makanan =='' || $harga ==''){
        	echo "<script>alert('Data tidak boleh kosong');history.go(-1);</script>";
        }
        else{
        	 $data = array(
            'nama_makanan' => $nama_makanan,
            'harga' => $harga
  					);
        $where = array(
            'id_makanan' => $id_makanan
                	);

                $this->m_admin->update_data($where,$data,'tbl_makanan');
                redirect('admin/c_admin/makanan');
        }
     }
/*	--------------------------------------------------------------------------------------------------
												TOP UP
--------------------------------------------------------------------------------------------------
*/
	public function topup($offset=0)
	{
		
			$jml = $this->db->get('tbl_topup');
			
			$config['base_url'] = base_url().'index.php/admin/c_admin/topup';
			
			$config['total_rows'] = $jml->num_rows();
			$config['per_page'] = 5; /*Jumlah data yang dipanggil perhalaman*/	
			
			/*Class bootstrap pagination yang digunakan*/
			$config['full_tag_open'] = "<ul class='pagination pagination-sm' style='position:relative; top:-25px;'>";
    		$config['full_tag_close'] ="</ul>";
			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';
			$config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='topup'>";
			$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
			$config['next_tag_open'] = "<li>";
			$config['next_tagl_close'] = "</li>";
			$config['prev_tag_open'] = "<li>";
			$config['prev_tagl_close'] = "</li>";
			$config['first_tag_open'] = "<li>";
			$config['first_tagl_close'] = "</li>";
			$config['last_tag_open'] = "<li>";
			$config['last_tagl_close'] = "</li>";
		
			$this->pagination->initialize($config);
			
			$data['halaman'] = $this->pagination->create_links();
			/*membuat variable halaman untuk dipanggil di view nantinya*/
			$data['offset'] = $offset;

			$data['data'] = $this->m_admin->tampil_data_topup($config['per_page'], $offset);
		 	$username['username'] = $this->session->userdata('nama');
			$this->load->view('admin/v_nav',$username);
			$this->load->view('admin/v_topup',$data);
		
			
	}

	

	public function add_topup()
	{
		$username['username'] = $this->session->userdata('nama');
		$this->load->view('admin/v_nav',$username);
		 $this->data['nama'] = $this->m_admin->get_karyawan();
		$this->load->view('admin/v_add_topup',$this->data);
	}

	public function add_aksi_topup()
    {
        $nama = $this->input->post('nama');
        $nominal = $this->input->post('nominal');

        if($nama=='' || $nominal ==''){
       		echo "<script>alert('Data tidak boleh kosong');history.go(-1);</script>";

       }
 		else{
 			$data = array(
        'id_user' => $nama,
        'nilai_topup' => $nominal
        
        );
     $this->m_admin->input_topup($data,'tbl_topup');
     redirect('admin/c_admin/topup');
 		}
     	
    }

/*-----------------------------------------------------------------------------------------------
												TRANSAKSI
-------------------------------------------------------------------------------------------------
*/
	public function transaksi($offset=0)
	{
		$jml = $this->db->get('tbl_transaksi');
			
			$config['base_url'] = base_url().'index.php/admin/c_admin/transaksi';
			
			$config['total_rows'] = $jml->num_rows();
			$config['per_page'] = 5; /*Jumlah data yang dipanggil perhalaman*/	
			
			/*Class bootstrap pagination yang digunakan*/
			$config['full_tag_open'] = "<ul class='pagination pagination-sm' style='position:relative; top:-25px;'>";
    		$config['full_tag_close'] ="</ul>";
			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';
			$config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='admin/c_admin/transaksi'>";
			$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
			$config['next_tag_open'] = "<li>";
			$config['next_tagl_close'] = "</li>";
			$config['prev_tag_open'] = "<li>";
			$config['prev_tagl_close'] = "</li>";
			$config['first_tag_open'] = "<li>";
			$config['first_tagl_close'] = "</li>";
			$config['last_tag_open'] = "<li>";
			$config['last_tagl_close'] = "</li>";
		
			$this->pagination->initialize($config);
			
			$data['halaman'] = $this->pagination->create_links();
			/*membuat variable halaman untuk dipanggil di view nantinya*/
			$data['offset'] = $offset;

			$data['data'] = $this->m_admin->tampil_data_transaksi ($config['per_page'], $offset);
		 	$username['username'] = $this->session->userdata('nama');
			$this->load->view('admin/v_nav',$username);
			$this->load->view('admin/v_transaksi',$data);
	
	}

	
	

}
?>