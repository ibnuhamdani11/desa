<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('M_login');
		$this->load->helper('url');
	
	}

	public function index(){
        
        // $data['view']=$this->db->query("SELECT * FROM ms_content where content_id='1'")->row();
        // $data['content'] = './guest/About';
        // $data['header'] = './guest/Header';
		$this->load->view('./V_login');
	}

	function aksi_login(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$where = array(
			'username' => $username,
			// 'password' => md5($password)
			'password' => $password
			);
		$cek = $this->M_login->cek_login("m_user",$where)->num_rows();
		$detail_users = $this->M_login->detail_user("m_user",$where);
		// print_r($username);
		if($cek > 0){
			foreach ($detail_users as $detail_user) {
                    $username   = $detail_user['username'];
                    $level		= $detail_user['level_id'];
                }
			$data_session = array(
				'username' 	=> $username,
				'level'		=> $level,
				'isLogin'	=> 'true'
				);

			$this->session->set_userdata($data_session);

			?>
			<script>
			// alert('Welcome to Aplikasi');
			window.location.replace("<?=base_url('/admin/admin');?>");
			</script>
			<?php
			// $this->load->view('./admin/admin');
		} 
		else {
			?>
			<script>
			alert('Email atau Password anda salah');
			window.location.replace("<?=base_url('/login');?>");
			</script>
			<?php
		}
	}

	function logout(){
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}
}

?>