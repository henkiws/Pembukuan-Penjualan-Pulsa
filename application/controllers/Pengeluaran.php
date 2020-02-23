<?php
class Pengeluaran extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->library('template');
		$this->load->model('m_pengeluaran');
	}
	function index(){
		$data['on_keluar']="active";
		$data['deposit']=$this->m_pengeluaran->lihatData('depo_terakhir','deposit_akhir')->result();
		$data['dataPengeluaran']=$this->m_pengeluaran->lihatData('pengeluaran','id_pengeluaran')->result();
		$this->template->display('pages/v_pengeluaran',$data);
	}
	function simpan(){
		$data=array(
			'tanggal'=>$this->input->post('tanggal'),
			'jumlah'=>$this->input->post('jml_keluar'),
			'keterangan'=>$this->input->post('keterangan')
			);
		$this->m_pengeluaran->simpanData('pengeluaran',$data);
		echo json_encode(array("status"=>true));
	}
	function hapus($id){
		$this->m_pengeluaran->hapusData('pengeluaran','id_pengeluaran',$id);
		echo json_encode(array("status"=>true));
	}
	function ajax_edit($id){
		$data=$this->m_pengeluaran->lihatEdit('pengeluaran','id_pengeluaran',$id);
		echo json_encode($data);
	}
	function edit(){
		$id['id_pengeluaran']=$this->input->post('id_pengeluaran');
		$data=array(
			'tanggal'=>$this->input->post('tanggal'),
			'jumlah'=>$this->input->post('jml_keluar'),
			'keterangan'=>$this->input->post('keterangan')
			);
		$this->m_pengeluaran->updateData('pengeluaran',$data,$id);
		echo json_encode(array("status"=>true));
	}
}
?>