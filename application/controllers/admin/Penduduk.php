<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penduduk extends CI_Controller {
    private $TABLE = "m_user";
    private $ID = "id";

	function __construct(){
		parent::__construct();
		$this->load->model('M_general');
		$this->load->helper(array('form', 'url'));
        date_default_timezone_set("Asia/Jakarta");


        if($this->session->userdata('isLogin') != "true"){
            redirect(base_url("login"));
        }
	
	}

	public function index(){
        
        $data['data_penduduk']=$this->db->query("SELECT * FROM $this->TABLE ORDER BY $this->ID DESC")->result();
        $data['data_level']=$this->db->query("SELECT * FROM m_level ORDER BY $this->ID DESC")->result();
        $data['content'] = './V_penduduk';
        $data['side_menu'] =  './V_side_menu';
        // $data['header'] = './guest/Header';
            if(isset($_GET['action'])){
                switch ($_GET['action']){
                    case "edit":
                    $data['data_edit'] = $this->db->query("SELECT * FROM $this->TABLE
                                                            WHERE $this->ID = '$_GET[val]'")->row();
                    break;
                }
            }
		$this->load->view('./V_main', $data);
	}

    // private function _uploadImage()
    // {
    //     $config['upload_path']          = './public/upload/user/';
    //     $config['allowed_types']        = 'gif|jpg|png';
    //     $config['file_name']            = $this->name_file;
    //     $config['overwrite']            = true;
    //     $config['max_size']             = 2024; // 1MB
    //     // $config['max_width']            = 1024;
    //     // $config['max_height']           = 768;

    //     $this->load->library('upload', $config);

    //     if ($this->upload->do_upload('photo')) {
    //         return $this->upload->data("file_name");
    //     }
        
    //     return $this->name_file;
    // }

    public function aksi_simpan(){
        $username           = $this->input->post('username');
        $password           = $this->input->post('password');
        $ulangi_password    = $this->input->post('ulangi_password');
        $phone_number       = $this->input->post('phone_number');
        $level              = $this->input->post('level');
        $gender             = $this->input->post('gender');
        $created_by         = $this->session->userdata('username');
        $updated_by         = $this->session->userdata('username');
        $created_date       = date('Y-m-d H:i:s');
        $updated_date       = date('Y-m-d H:i:s');

        if ($password != $ulangi_password) {
            ?>
                <script>
                    alert('Password dan ulangi password tidak sama, mohon harus diisi sama');
                    window.location.replace("<?=base_url('/admin/penduduk');?>");
                </script>
            <?php
        }else{
 
            $this->load->library('upload');
            $nmfile = "file_".time(); //nama file saya beri nama langsung dan diikuti fungsi time
            // $config['upload_path'] = './assets/uploads/'; //path folder
            $config['upload_path'] = './public/upload/user/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
            $config['max_size'] = '2048'; //maksimum besar file 2M
            $config['max_width']  = '2288'; //lebar maksimum 1288 px
            $config['max_height']  = '1768'; //tinggi maksimu 768 px
            $config['file_name'] = $nmfile; //nama yang terupload nantinya

            $this->upload->initialize($config);
            
            if($_FILES['photo']['name'])
            {
                if ($this->upload->do_upload('photo'))
                {
                    $gbr = $this->upload->data();
                    $data = array(
                        'username'              => $username,
                        'password'              => $password,
                        'level_id'              => $level,
                        'phone_number'          => $phone_number,
                        'gender'                => $gender,
                        'photo'                 => $gbr['file_name'],
                        'created_by'            => $created_by,
                        'updated_by'            => $updated_by,
                        'created_date'          => $created_date,
                        'updated_date'          => $updated_date
                    );

                    $this->M_general->Insert($this->TABLE, $data);
                    ?>
                        <script>
                            alert('Data berhasil disimpan');
                            window.location.replace("<?=base_url('/admin/penduduk'); ?>");
                        </script>
                    <?php } else { ?>
                        <script>
                            alert('Data gagal disimpan');
                            window.location.replace("<?=base_url('/admin/penduduk'); ?>");
                        </script>
                    <?php
                }
            }

        }
    }


	public function aksi_edit(){
            $id = $this->input->post('id');
            $data = array(
                    'category'           => $this->input->post('kategori'),
                    'desc'               => $this->input->post('keterangan'),
                    'created_by'         => $this->session->userdata('username')
                );
                $proses = $this->M_general->Update($this->TABLE, $data, $this->ID, $id);
                if ($proses) {
                    # code...
                    ?>
                    <script>
                        alert('The data has been updated');
                        window.location.replace("<?=base_url('/admin/penduduk');?>");
                    </script>
                <?php

                }else{
                    ?>
                    <script>
                        alert('Data have no updated');
                        window.location.replace("<?=base_url('/admin/penduduk');?>");
                    </script>
                <?php
                }        
       
    } 

    public function hapus() {
        $query = $this->M_general->Delete($this->TABLE, $this->ID, $_GET['val']);  
           if ($query) {
            if(file_exists('./public/upload/user/'.$_GET['image'])){
                unlink('./public/upload/user/'.$_GET['image']);
            }
            
            ?>
                <script>
                    alert('Data berhasil dihapus');
                    window.location.replace("<?=base_url('/admin/penduduk');?>");
                </script>
            <?php
           }else{
            ?>
                <script>
                    alert('Data gagal dihapus');
                    window.location.replace("<?=base_url('/admin/penduduk');?>");
                </script>
            <?php
           }    
    }  
}

?>