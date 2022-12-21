<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->model('model_user'); 
		$this->load->helper("url");
		$this->load->library('session');
		

	}
	public function index() {
			if ($this->session->userdata('status')=='admin') {
				redirect('admin/c_admin/');
			}
			elseif ($this->session->userdata('status')=='karyawan') {
				redirect('karyawan/c_karyawan/');
			}
			elseif ($this->session->userdata('status')=='ob') {
				redirect('ob/c_ob/');
			}		
		$this->load->view('index');
	}

	public function cek_login() {
		$data = array('nama' => $this->input->post('nama', TRUE),
						'password' => md5($this->input->post('password', TRUE))
			);
		
		$hasil = $this->model_user->cek_user($data);
		if ($hasil->num_rows() == 1)
		 {
			foreach ($hasil->result() as $sess) {
				$sess_data['logged_in'] = 'Sudah Loggin';
				$sess_data['id_user'] = $sess->id_user;
				$sess_data['nama'] = $sess->nama;
				$sess_data['saldo'] = $sess->saldo;
				$sess_data['status'] = $sess->status;
				$this->session->set_userdata($sess_data);
			}
			if ($this->session->userdata('status')=='admin') {
				redirect('admin/c_admin/');
			}
			elseif ($this->session->userdata('status')=='karyawan') {
				redirect('karyawan/c_karyawan/');
			}
			elseif ($this->session->userdata('status')=='ob') {
				redirect('ob/c_ob/');
			}		
		}
		else {
			echo "<script>alert('Gagal login: Cek username, password!');history.go(-1);</script>";
		}
	}

}

?>