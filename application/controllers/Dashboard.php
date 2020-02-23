<?php
class Dashboard extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->library('template');
		$this->load->model('m_transaksi');
		//$this->load->model('m_transaksi');
		if ($this->session->userdata('username') != TRUE){
			$this->session->set_flashdata('msg','login dulu bro');
			redirect('login');
		}
	}
	function index(){
		$data['on_beranda']="active";
		$data['dataTransaksiDepo']=$this->m_transaksi->lihatData('depo_baru')->result();
		$data['dataTransaksiToday']=$this->m_transaksi->lihatDataOrderBy('transaksitoday','id_trx')->result();
		$data['dataTransaksiSemua']=$this->m_transaksi->lihatDataOrderBy('transaksisemua','id_trx')->result();
		$data['dataTransaksiHutang']=$this->m_transaksi->lihatData('jumlah_hutang_all')->result();
		$data['dataTransaksiLaba']=$this->m_transaksi->lihatData('jumlah_laba_all')->result();
		$data['deposit']=$this->m_transaksi->lihatData('depo_terakhir')->result();
		$uang_lunas=$this->m_transaksi->lihatData('jumlah_lunas_all')->result();
		$uang_total=$this->m_transaksi->lihatData('jumlah_total_all')->result();
		$uang_keluar=$this->m_transaksi->lihatData('jumlah_keluar_all')->result();
		foreach($uang_lunas as $x){		//uang lunas all
			$uang_lunas_x=$x->jumlah;
		}
		foreach($uang_total as $x){	//uang hutang all
			$uang_total_x=$x->jumlah;
		}
		foreach($uang_keluar as $x){	//uang keluar all
			$uang_keluar_x=$x->jumlah;
		}
		$data['uang_lunas_all']=$uang_lunas_x - $uang_keluar_x;
		$data['uang_total_all']=$uang_total_x - $uang_keluar_x;
		$this->template->display('pages/v_dashboard',$data);
	}
}
?>