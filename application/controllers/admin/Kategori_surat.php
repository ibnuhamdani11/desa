<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_surat extends CI_Controller {
    private $TABLE = "m_category_letter";
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
        
        // ambil data 1 row
        // $data['data_kat']=$this->db->query("SELECT * FROM m_category_letter ORDER BY id DESC")->row();
        $data['data_kat']=$this->db->query("SELECT * FROM $this->TABLE ORDER BY $this->ID DESC")->result();
        $data['content'] = './V_kategori_surat';
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
                    'category'           => $this->input->post('kategori'),
                    'desc'               => $this->input->post('keterangan'),
                    'created_by'         => $this->session->userdata('username')
                );
                $proses = $this->M_general->Insert($this->TABLE, $data);
                if ($proses) {
                    # code...
                    ?>
                    <script>
                        alert('Data berhasil disimpan');
                        window.location.replace("<?=base_url();?>admin/Kategori_surat");
                    </script>
                <?php

                }else{
                    ?>
                    <script>
                        alert('Data gagal disimpan');
                        window.location.replace("<?=base_url();?>admin/Kategori_surat");
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
                        window.location.replace("<?=base_url();?>admin/Kategori_surat");
                    </script>
                <?php

                }else{
                    ?>
                    <script>
                        alert('Data have no updated');
                        window.location.replace("<?=base_url();?>admin/Kategori_surat");
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
                                        window.location.replace("<?=base_url();?>admin/Kategori_surat");
                                    </script>
                                <?php
                               }else{
                                ?>
                                    <script>
                                        alert('Data gagal dihapus');
                                        window.location.replace("<?=base_url();?>admin/Kategori_surat");
                                    </script>
                                <?php
                               }    
    }  
    public function cetak(){
        $html1 = "<html><head>".
                "<style type='text/css'>".
                        "@font-face {".
                            "font-family: times-new-roman;".
                            "src: url(<?= base_url(); ?>public/font/times-new-roman.ttf);".
                        "}".
                        "body {".
                            "font-family: times-new-roman;".
                            "font-size: 12px;".
                        "}".
                
                        /*table, tr, th, td {
                            padding: 5px;
                            border:5px solid #D8D8D8;
                            background: grey;         
                        }*/
                 
                      ".table {".
                            "border-collapse: collapse;".
                            "width: 100%;".
                            "margin: 0 auto;".
                            "font-family: times-new-roman;".
                      "}".
                      ".table td, th{".
                            "border:15px solid #D8D8D8;".
                            "padding: 5px;".
                            "font-family: times-new-roman;".
                      "}".
                 
                "</style>".
                "</head><body>".
                "<table class='table' rules='all' width='100%'>".
                    "<tr>".
                        "<td align='left' style='padding: 0px; width: 300px;' >".
                                "<img src='public/theme/guest/img/logoexposi_web-04.jpg' style='width: 300px; height: 80px;'>".
                        "</td>".
                        "<td align='center' style='width: 200px;'><b>TICKET</b></td>".
                        // "<td align='center' >Order ID # ".$ticket->order_id." <br>".
                            "Order Date : www </td>".
                    "</tr>".

                    "<tr>".
                        "<td colspan='3'>".
                            "<font color='red'>TICKET INFORMATION</font><br>".
                            "<ul>".
                                "<li>Tiket berlaku 1(satu) orang peserta, non-refundable</li>".
                                "<li>Registrasi ulang pada tanggal ssss, peserta harap datang min 1 jam sebelum acara dimulai.</li>".
                                "<li>Peserta registrasi ulang dengan menunjukan e-ticket ini ke counter registrasi</li>".
                                "<li>Panitia tidak bertanggung jawab atas hilangnya e-ticket</li>".
                                "<li>Panitia berhak untuk menolak atau membatalkan tiket peserta yang tidak sesuai dengan ketentuan yang berlaku</li>".
                            "</ul>".
                        "</td>".
                    "</tr>".
                    "<tr>".
                        "<td colspan='2'><h4>www.xposi.co.id</td>".
                        "<td>021-58907366-68</td>".
                    "</tr>".
                "</table>".
                "</body></html>";
                // 

                $paper_size  = 'A4'; //paper size
                // $html = $this->output->get_output();
                
                // Load library
                // $this->load->library('dompdf_gen');
                
                // Convert to PDF
                // $this->dompdf = new DOMPDF();
                // $this->dompdf->load_html($html);
                // $this->dompdf->render();
                // $output = $this->dompdf->output();
                // file_put_contents("./theme/ssss.pdf", $output);
                // $this->dompdf->stream("Detail_Ticket.pdf", array('Attachment'=>0));


                $mpdf = new \Mpdf\Mpdf();
                $html = $this->load->view('Suket_usaha',[],true);
                $mpdf->WriteHTML($html);
                
                $mpdf->Output('test.pdf', 'I');


                // $mpdf->WriteHTML(utf8_encode($html));
                // $mpdf->Output($nama_dokumen.".pdf" ,'I');
    }
}

?>