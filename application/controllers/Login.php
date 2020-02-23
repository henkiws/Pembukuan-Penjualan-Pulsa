<?php
class Login extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('m_login');
	}
	public function index(){
		$this->load->view('v_login');
	}
	function proses(){
		$username=$this->input->post('user');
		$password=$this->input->post('pass');

		$valid = $this->m_login->cek($username,md5($password));
		if ($valid->num_rows()>0){
			$this->session->set_userdata('username',$username);
			$this->session->set_userdata('password',$password);
			redirect('dashboard');
		}else{
			$this->session->set_flashdata('msg','gagal login');
			redirect('login');
		}
	}
	function keluar(){
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('password');
		redirect('login');
	}
}
?>