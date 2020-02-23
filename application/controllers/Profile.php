<?php
class Profile extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('m_transaksi');
		$this->load->library('template');
	}
	function index(){
		$data['deposit']=$this->m_transaksi->lihatData('depo_terakhir')->result();
		$this->template->display('pages/v_profile',$data);
	}
}
?>