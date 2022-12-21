     <?php
class M_admin extends CI_Model
                {
                        
                        function input_data($data,$table){
                               

                                $data['saldo']=0;
                                $this->db->insert($table,$data);
                            
                        }
                        function input_makanan($data,$table){
                             
                                $this->db->insert($table,$data);
                            
                        }
                         function input_topup($data,$table){
                             
                                $this->db->insert($table,$data);
                                $this->db->query("UPDATE tbl_user SET saldo=saldo+? WHERE id_user=?",array(floatval($data ['nilai_topup'] ), intval($data ['id_user'])));
                        }
                       

                        function edit_data($where,$table)
                        {
                                return $this->db->get_where($table,$where);
                        }
                       function update_data($where,$data,$table)
                       {
                                $this->db->where($where);
                                $this->db->update($table,$data);
                        }       
                        function hapus_data($where,$table){
                                $this->db->where($where);
                                $this->db->delete($table);
                        }
                        function get_karyawan(){
                             $q=$this->db->query("SELECT * from tbl_user where status='karyawan'" );
                             return $q;
                        }
                        function tampil_data_topup($num, $offset){

                            $this->db->select('tbl_topup.*, tbl_user.nama');
                            $this->db->join('tbl_user', 'tbl_user.id_user = tbl_topup.id_user');
                            $this->db->order_by('id_topup desc');
                            $query = $this->db->get('tbl_topup',$num, $offset);
                            return $query->result(); 
                        }
                        function tampil_data_transaksi($num, $offset)
                        {
                            
                            $this->db->select('tbl_transaksi.*, tbl_makanan.nama_makanan, tbl_user.nama');
                            $this->db->join('tbl_user', ' tbl_user.id_user = tbl_transaksi.id_user');
                            $this->db->join('tbl_order', 'tbl_order.id_order = tbl_transaksi.id_order');
                            $this->db->join('tbl_makanan', 'tbl_makanan.id_makanan = tbl_order.id_makanan');
                            
                             $this->db->like('tbl_transaksi.waktu', date('Y') );
                            $query=$this->db->get('tbl_transaksi',$num, $offset);
                            return $query->result(); 
                                
                        }


                        function view_user($num, $offset)        
                        {
                        $query = $this->db->get("tbl_user",$num, $offset);
                         return $query->result();
        
                        }
                        function view_makanan($num, $offset)        {
                         $query = $this->db->get("tbl_makanan",$num, $offset);
                         return $query->result();
        
                        }
                        
    

                        

                       
    }
?>