<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Domisili_perusahaan extends CI_Controller {
    private $TABLE = "s_domisili_lembaga";
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
        
        $data['data_domisili_lembaga']=$this->db->query("SELECT * FROM $this->TABLE ORDER BY $this->ID DESC")->result();
        $data['content'] = './suket/V_domisili_perusahaan';
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
                    'name_lembaga'      => $this->input->post('name'),
                    'domisili'          => $this->input->post('domisili'),
                    'desa'              => $this->input->post('desa'),
                    'kecamatan'         => $this->input->post('kecamatan'),
                    'kabupaten'         => $this->input->post('kabupaten'),
                    'created_by'        => $this->session->userdata('username'),
                    'updated_by'        => $this->session->userdata('username'),
                    'created_date'      => date('Y-m-d H:i:s'),
                    'updated_date'      => date('Y-m-d H:i:s')
                );
                $proses = $this->M_general->Insert($this->TABLE, $data);
                if ($proses) {
                    # code...
                    ?>
                    <script>
                        alert('Data berhasil disimpan');
                        window.location.replace("<?=base_url('/admin/suket/domisili_perusahaan');?>");
                    </script>
                <?php

                }else{
                    ?>
                    <script>
                        alert('Data gagal disimpan');
                        window.location.replace("<?=base_url('/admin/suket/domisili_perusahaan');?>");
                    </script>
                <?php
                }   


    }
    public function aksi_edit(){
            $id = $this->input->post('id');
            $data = array(
                    'name_lembaga'      => $this->input->post('name'),
                    'domisili'          => $this->input->post('domisili'),
                    'desa'              => $this->input->post('desa'),
                    'kecamatan'         => $this->input->post('kecamatan'),
                    'kabupaten'         => $this->input->post('kabupaten'),
                    'created_by'        => $this->session->userdata('username'),
                    'updated_by'        => $this->session->userdata('username'),
                    'created_date'      => date('Y-m-d H:i:s'),
                    'updated_date'      => date('Y-m-d H:i:s')
                );
                $proses = $this->M_general->Update($this->TABLE, $data, $this->ID, $id);
                if ($proses) {
                    # code...
                    ?>
                    <script>
                        alert('The data has been updated');
                        window.location.replace("<?=base_url('/admin/suket/domisili_perusahaan');?>");
                    </script>
                <?php

                }else{
                    ?>
                    <script>
                        alert('Data have no updated');
                        window.location.replace("<?=base_url('/admin/suket/domisili_perusahaan');?>");
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
                                        window.location.replace("<?=base_url('/admin/suket/domisili_perusahaan');?>");
                                    </script>
                                <?php
                               }else{
                                ?>
                                    <script>
                                        alert('Data gagal dihapus');
                                        window.location.replace("<?=base_url('/admin/suket/domisili_perusahaan');?>");
                                    </script>
                                <?php
                               }    
    }  

    public function cetak(){
        $data['data_cetak'] = $this->db->query("SELECT * FROM $this->TABLE
                                                        WHERE $this->ID = '$_GET[val]'")->row();

        $mpdf = new \Mpdf\Mpdf();
        $html = $this->load->view('suket/Suket_domisili_perusahaan',$data,true);
        $mpdf->WriteHTML($html);
        
        $mpdf->Output('test.pdf', 'I');


        // $mpdf->WriteHTML(utf8_encode($html));
        // $mpdf->Output($nama_dokumen.".pdf" ,'I');
    }
}

?>