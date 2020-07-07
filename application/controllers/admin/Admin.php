<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('M_login');
		$this->load->helper('url');
	
	}

	public function index(){
        
        // $data['view']=$this->db->query("SELECT * FROM ms_content where content_id='1'")->row();
        $data['content'] = './V_admin';
        $data['side_menu'] =  './V_side_menu';
        // $data['header'] = './guest/Header';
		$this->load->view('./V_main', $data);
	}
}

?>