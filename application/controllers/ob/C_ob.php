<?php
if(! defined('BASEPATH')) exit('No direct script access allowed');

class C_ob extends CI_Controller {  
    function __construct(){ 
        parent::__construct(); 
        $this->load->database();
        $this->load->helper('url','form');
        $this->load->model('m_ob','',TRUE);
        $this->load->library('session'); 
        $ob=$this->session->userdata('status');
        if($ob==''||$ob!='ob'){
            redirect('auth');
        } 
    }

    public function index(){   
        $data['nama'] = $this->m_ob->tampil_nama();
           
        $this->load->view('ob/nav.php',$data); 
        $this->load->view('ob/index');
        $data['ob']=$this->m_ob->get_ob();
        $this->load->view('ob/footer',$data);
    }

/*------------------------------------------DAFTAR PESANAN SIANG---------------------------------------------------*/

    public function daftar_pesanan_siang(){   
          $data['nama'] = $this->m_ob->tampil_nama();
           
        $this->load->view('ob/nav.php',$data); 
        $this->load->view('ob/daftar_pesanan_siang');
        $data['ob']=$this->m_ob->get_ob();
        $this->load->view('ob/footer',$data);
    }

    public function getData_siang(){
        $action = $this->input->post("action");
        $today = date('Y-m-d');
        $stmt="";
        $q = "SELECT * FROM `tbl_order` 
            join tbl_makanan ON tbl_makanan.id_makanan=tbl_order.id_makanan 
            join tbl_user ON tbl_user.id_user=tbl_order.id_user 
            WHERE date(waktu)='$today' and jam_makan='1' 
            group by kode_pemesanan HAVING (sum(`tbl_order`.`status`) = 0)";         
        $stmt=$this->db->query($q);
        foreach ($stmt->result() as $key => $value){
            echo"<div class='col-md-4'>
                    <form action='http://localhost/nufood/index.php/ob/c_ob/add_transaksi_aksi_siang' method='post'>
                        <div class='price-box'>
                            <select class='form-control' data-user='".$value->id_user."' data-index='".$key."' id='getProducts' style='font-size:119.5%;' >
                                <option class='form-control' value='Utama' selected='selected'>Utama</option>
                                <option class='form-control' value='alternatif 1'>Alternatif 1</option>
                                <option class='form-control' value='alternatif 2'>Alternatif 2</option>
                            </select><br/>
                            <div id='apa".$key."'>
                                <input type='hidden' value='$value->kode_pemesanan' name='kode_pemesanan'></input>
                                <h3 style='color:black; padding-top:-9%;'> <input type='hidden' value='$value->id_user' name='id_user'>$value->nama</h3>
                                <h4 style='color:black; padding-top:-9%;'> <input type='hidden' value='$value->id_order' name='id_order'>$value->nama_makanan</h4>
                                <div class='ngaruh' style='width:100%; min-height:100px; max-height:100px; padding-bottom:150px;'>
                                <h4 style='color:black; padding-top:-9%; font-size:15px;'> Rincian :<input type='hidden' value='$value->note' name='note'>$value->note</h4>
                                </div>
                                <div class='form group'>
                                <p> Harga </p>
                                    <input class='form-control' type='text' value='$value->harga' name='harga'  > </input>
                                </div>
                                    <br>
                                <div class='form group'>
                                  <p> Keterangan </p>
                                    <textarea class='form-control' type='text' placeholder='keterangan' name='keterangan' > </textarea>
                                </div>
                                <br> <br>
                                <div class='col-md-12'>
                                    <button type='submit' value='batal'name='batal' role='button' class='btn btn-primary'>Batal</i></button>
                                    <button type='submit' value='ok' name='ok' role='button' class='btn btn-primary'>Oke</i></button>
                                </div>
                            </div>
                        </div>
                    </form><br/>
                </div>";            
            }
        }

    public function getData2_siang(){
        $action = $this->input->post("action");
        $iduser = $this->input->post("iduser");
        $stmt="";
        $today = date('Y-m-d');         
        $q = "SELECT * FROM `tbl_order` join  tbl_makanan ON tbl_makanan.id_makanan=tbl_order.id_makanan join
            tbl_user ON tbl_user.id_user=tbl_order.id_user   WHERE jam_makan='1'and jenis_order='$action'and tbl_order.status='0' and date(waktu)='$today'and tbl_order.id_user=".$iduser;
        $stmt=$this->db->query($q);
        foreach ($stmt->result() as $key => $value){
            echo"<div id='apa".$key."'>
                                <input type='hidden' value='$value->kode_pemesanan' name='kode_pemesanan'></input>
                                <h3 style='color:black; padding-top:-9%;'> <input type='hidden' value='$value->id_user' name='id_user'>$value->nama</h3>
                                <h4 style='color:black; padding-top:-9%;'> <input type='hidden' value='$value->id_order' name='id_order'>$value->nama_makanan</h4>
                                <div class='ngaruh' style='width:100%; min-height:100px; max-height:100px; padding-bottom:150px;'>
                                <h4 style='color:black; padding-top:-9%; font-size:15px;'> Rincian :<input type='hidden' value='$value->note' name='note'>$value->note</h4>
                                </div>
                                <div class='form group'>
                                <p> Harga </p>

                                    <input class='form-control' type='text' value='$value->harga' name='harga'  > </input>
                                </div>
                                    <br>
                                <div class='form group'>
                                <p> Keterangan </p>
                                    <textarea class='form-control' type='text' placeholder='keterangan' name='keterangan' > </textarea>
                                </div>
                                <br> <br>
                                <div class='col-md-12'>
                                    <button type='submit' value='batal'name='batal' role='button' class='btn btn-primary'>Batal</i></button>
                                    <button type='submit' value='ok' name='ok' role='button' class='btn btn-primary'>Oke</i></button>
                                </div>
                            </div>";
        }
    }
/*------------------------------------------END DAFTAR PESANAN SIANG---------------------------------------------------*/

/*------------------------------------------DAFTAR PESANAN MALAM---------------------------------------------------*/

    public function daftar_pesanan_malam(){   
        $data['nama'] = $this->m_ob->tampil_nama();
        $this->load->view('ob/nav.php',$data); 
        $this->load->view('ob/daftar_pesanan_malam');
        $data['ob']=$this->m_ob->get_ob();
        $this->load->view('ob/footer',$data);
    }

    public function getData_malam(){
        $action = $this->input->post("action");
        $today = date('Y-m-d');
        $stmt="";
        $q = "SELECT * FROM `tbl_order` 
            join tbl_makanan ON tbl_makanan.id_makanan=tbl_order.id_makanan 
            join tbl_user ON tbl_user.id_user=tbl_order.id_user 
            WHERE date(waktu)='$today' and jam_makan='0' 
            group by kode_pemesanan HAVING (sum(`tbl_order`.`status`) = 0)";         
        $stmt=$this->db->query($q);
        foreach ($stmt->result() as $key => $value){
            echo"<div class='col-md-4'>
                    <form action='http://localhost/nufood/index.php/ob/c_ob/add_transaksi_aksi_malam' method='post'>
                        <div class='price-box'>
                            <select class='form-control' data-user='".$value->id_user."' data-index='".$key."' id='getProducts' style='font-size:119.5%;' >
                                <option class='form-control' value='Utama' selected='selected'>Utama</option>
                                <option class='form-control' value='alternatif 1'>Alternatif 1</option>
                                <option class='form-control' value='alternatif 2'>Alternatif 2</option>
                            </select><br/>
                            <div id='apa2".$key."'>
                                <input type='hidden' value='$value->kode_pemesanan' name='kode_pemesanan'></input>
                                <h3 style='color:black; padding-top:-9%;'> <input type='hidden' value='$value->id_user' name='id_user'>$value->nama</h3>
                                <h4 style='color:black; padding-top:-9%;'> <input type='hidden' value='$value->id_order' name='id_order'>$value->nama_makanan</h4>
                                <div class='ngaruh' style='width:100%; min-height:100px; max-height:100px; padding-bottom:150px;'>
                                <h4 style='color:black; padding-top:-9%; font-size:15px;'> Rincian :<input type='hidden' value='$value->note' name='note'>$value->note</h4>
                                </div>
                                <div class='form group'>
                                <p> Harga </p>
                                    <input class='form-control' type='text' value='$value->harga' name='harga'  > </input>
                                </div>
                                    <br>
                                <div class='form group'>
                                <p> Keterangan </p>
                                    <textarea class='form-control' type='text' placeholder='keterangan' name='keterangan' > </textarea>
                                </div>
                                <br> <br>
                                <div class='col-md-12'>
                                    <button type='submit' value='batal'name='batal' role='button' class='btn btn-primary'>Batal</i></button>
                                    <button type='submit' value='ok' name='ok' role='button' class='btn btn-primary'>Oke</i></button>
                                </div>
                            </div>
                        </div>
                    </form><br/>
                </div>";             
            }
        }

    public function getData2_malam(){
        $action = $this->input->post("action");
        $iduser = $this->input->post("iduser");
        $stmt="";
        $today = date('Y-m-d');         
        $q = "SELECT * FROM `tbl_order` join  tbl_makanan ON tbl_makanan.id_makanan=tbl_order.id_makanan join
            tbl_user ON tbl_user.id_user=tbl_order.id_user   WHERE jam_makan='0'and jenis_order='$action'and tbl_order.status='0' and date(waktu)='$today'and tbl_order.id_user=".$iduser;
        $stmt=$this->db->query($q);
        foreach ($stmt->result() as $key => $value){
            echo"<div id='apa2".$key."'>
                                <input type='hidden' value='$value->kode_pemesanan' name='kode_pemesanan'></input>
                                <h3 style='color:black; padding-top:-9%;'> <input type='hidden' value='$value->id_user' name='id_user'>$value->nama</h3>
                                <h4 style='color:black; padding-top:-9%;'> <input type='hidden' value='$value->id_order' name='id_order'>$value->nama_makanan</h4>
                                <div class='ngaruh' style='width:100%; min-height:100px; max-height:100px; padding-bottom:150px;'>
                                <h4 style='color:black; padding-top:-9%; font-size:15px;'> Rincian :<input type='hidden' value='$value->note' name='note'>$value->note</h4>
                                </div>
                                <div class='form group'>
                                    <p> Harga </p>
                                    <input class='form-control' type='text' value='$value->harga' name='harga'  > </input>
                                </div>
                                    <br>
                                <div class='form group'>
                                 <p> Keterangan </p>
                                    <textarea class='form-control' type='text' placeholder='keterangan' name='keterangan' > </textarea>
                                </div>
                                <br> <br>
                                <div class='col-md-12'>
                                    <button type='submit' value='batal'name='batal' role='button' class='btn btn-primary'>Batal</i></button>
                                    <button type='submit' value='ok' name='ok' role='button' class='btn btn-primary'>Oke</i></button>
                                </div>
                            </div>";
        }
    }
/*------------------------------------------END DAFTAR PESANAN MALAM---------------------------------------------------*/
                                      
    
    function add_transaksi_aksi_siang(){
        $id_user = $this->input->post('id_user');
        $id_order = $this->input->post('id_order');
        $harga_asli = $this->input->post('harga');
        $keterangan=$this->input->post('note');
        $kode_pemesanan=$this->input->post('kode_pemesanan');

        if($this->input->post('ok')){

        $data = array(
         'id_user' => $id_user,
        'id_order' => $id_order,
        'harga' => $harga_asli,
        'keterangan'=>$keterangan
        );

            $this->m_ob->add_transaksi_ok($data,'tbl_transaksi');
            redirect('ob/c_ob/daftar_pesanan_siang');
        }elseif ($this->input->post('batal')){

        $data = array(
         'id_user' => $id_user,
        'id_order' => $id_order,
        'harga' => $harga_asli,
        'keterangan'=>$keterangan,
        'kode_pemesanan'=>$kode_pemesanan
        );

            $this->m_ob->add_transaksi_batal($data,'tbl_transaksi');
          redirect('ob/c_ob/daftar_pesanan_siang'); 
        }
    }


    function add_transaksi_aksi_malam()
    {
        $id_user = $this->input->post('id_user');
        $id_order = $this->input->post('id_order');
        $harga_asli = $this->input->post('harga');
        $keterangan=$this->input->post('note');
        $kode_pemesanan=$this->input->post('kode_pemesanan');

        if($this->input->post('ok'))
        {
        $data = array('id_user' => $id_user,'id_order' => $id_order, 'harga' => $harga_asli, 'keterangan'=>$keterangan );
        $this->m_ob->add_transaksi_ok($data,'tbl_transaksi');
        redirect('ob/c_ob/daftar_pesanan_malam');
        }
        elseif($this->input->post('batal'))
        {

        $data = array('id_user' => $id_user,'id_order' => $id_order,'harga' => $harga_asli,'keterangan'=>$keterangan,'kode_pemesanan'=>$kode_pemesanan);
        $this->m_ob->add_transaksi_batal($data,'tbl_transaksi');
        redirect('ob/c_ob/daftar_pesanan_malam'); 
        }
    }

//total transaksi
    public function totaltrans()
    {
        $data['nama'] = $this->m_ob->tampil_nama();
           
        $this->load->view('ob/nav.php',$data); 
        $data['total_saldo']=$this->m_ob->total_saldo()->result();
        $data['saldo'] = $this->m_ob->tampil_saldo()->result();
        $this->load->view('ob/totaltrans',$data);
        $data['ob']=$this->m_ob->get_ob();
        $this->load->view('ob/footer',$data);

    }


//--------------------------------------------------------------------------------------------
//ganti password
//--------------------------------------------------------------------------------------------
    public function edit_password()
    {
        
         $data['nama'] = $this->m_ob->tampil_nama();
           
        $this->load->view('ob/nav.php',$data); 
     
        $this->load->view('ob/edit_password');
        $data['ob']=$this->m_ob->get_ob();
        $this->load->view('ob/footer',$data);
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

        $query = $this->m_ob->checkOldPass(($this->input->post('oldPass')));

        if($query){
            $query = $this->m_ob->saveNewPass(md5($this->input->post('newPass')));
            if($query){
               
                echo "<script>alert('password terganti');history.go(-1);</script>";
                $this->session->sess_destroy();
                // $this->load->view('karyawan/index');

            }else{
                $ref = $this->input->server('HTTP_REFERER', TRUE);
                //echo "<script>alert('aaaaaaa');history.go(-1);</script>";
                redirect($ref, 'ob/c_ob/edit_password');

            }
        }
        else{

            echo "<script>alert('password saat ini tidak sesuai');history.go(-1);</script>";
        }
    }
}


    public function logout(){
        $this->session->unset_userdata('nama');
        $this->session->unset_userdata('status');
        session_destroy();
        redirect('auth');
    }    
} 
?> 