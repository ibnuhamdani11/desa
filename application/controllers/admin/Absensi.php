<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Absensi extends CI_Controller {
    private $TABLE = "t_absensi";
    private $ID = "id";

	function __construct(){
		parent::__construct();
		$this->load->model('M_general');
		$this->load->helper(array('form', 'url'));
        // $this->load->library('Dompdf_gen');
        date_default_timezone_set("Asia/Jakarta");



        if($this->session->userdata('isLogin') != "true"){
            redirect(base_url("login"));
        }
	
	}

	public function index(){
        $data['date'] = date('Y-m-d H:i:s'); 
        $data['data_ab']=$this->db->query("SELECT a.*, mu.username  FROM $this->TABLE AS a LEFT JOIN m_user AS mu ON(mu.id = a.id_user) ORDER BY $this->ID DESC")->result();
        $data['user']=$this->db->query("SELECT * FROM m_user ORDER BY $this->ID DESC")->result();
        $data['content'] = './V_absensi';
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

	public function aksi_simpan(){
        $data = array(
                    'id_user'      => $this->input->post('user'),
                    'created_date' => $this->input->post('tanggal'),
                    'created_by'   => $this->session->userdata('username')
                );
                $proses = $this->M_general->Insert($this->TABLE, $data);
                if ($proses) {
                    # code...
                    ?>
                    <script>
                        alert('Data berhasil disimpan');
                        window.location.replace("<?=base_url();?>admin/absensi");
                    </script>
                <?php

                }else{
                    ?>
                    <script>
                        alert('Data gagal disimpan');
                        window.location.replace("<?=base_url();?>admin/absensi");
                    </script>
                <?php
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
                        window.location.replace("<?=base_url();?>admin/absensi");
                    </script>
                <?php

                }else{
                    ?>
                    <script>
                        alert('Data have no updated');
                        window.location.replace("<?=base_url();?>admin/absensi");
                    </script>
                <?php
                }        
       
    } 

    public function hapus() {
        $query = $this->M_general->Delete($this->TABLE, $this->ID, $_GET['val']);  
           if ($query) {
               # code...
            ?>
                <script>
                    alert('Data berhasil dihapus');
                    window.location.replace("<?=base_url();?>admin/absensi");
                </script>
            <?php
           }else{
            ?>
                <script>
                    alert('Data gagal dihapus');
                    window.location.replace("<?=base_url();?>admin/absensi");
                </script>
            <?php
           }    
    }  
}

?>