<?php
class Master extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->library('template');
		$this->load->model('m_master');
	}
	function index(){
		redirect('master/harga');
	}
	function harga(){
		$data['on_harga']='active';
		$data['deposit']=$this->m_master->tampilData('depo_terakhir','deposit_akhir')->result();
		$data['dataku']=$this->m_master->tampilData('harga','id_harga')->result();
		$this->template->display('pages/v_harga',$data);
	}
	function simpan_harga(){
		$data = array(
				'nominal'=> $this->input->post('nominal'),
				'harga_jual'=> $this->input->post('harga')
				);
		$this->m_master->simpanData('harga',$data);
		echo json_encode(array("status" => true));
	}
	function ajax_edit($id){
		//$id['id_harga'] = $this->uri->segment(3);
		$data = $this->m_master->tampilEdit('harga','id_harga',$id);
		echo json_encode($data);
	}
	function hapus_harga($id){
		$this->m_master->hapusData('harga','id_harga',$id);
		echo json_encode(array("status"=>true));
	}
	function update_harga(){
		$id['id_harga']=$this->input->post('id_harga');
		$data=array(
			'nominal'=>$this->input->post('nominal'),
			'harga_jual'=>$this->input->post('harga')
			);
		$this->m_master->updateData('harga',$data,$id);
		echo json_encode(array("status"=>true));
	}

//untuk pengolahan deposit
	function deposit(){
		$data['on_depo']='active';
		$data['deposit']=$this->m_master->tampilData('depo_terakhir','deposit_akhir')->result();
		$data['dataku']=$this->m_master->tampilData('deposit','id_deposit')->result();
		$this->template->display('pages/v_deposit',$data);
	}
	function simpan_depo(){
		$data=array(
			'waktu_masuk'=>$this->input->post('tanggal'),
			'deposit'=>$this->input->post('deposit')
			);
		$this->m_master->simpanData('deposit',$data);
		echo json_encode(array('status'=>true));
	}
	function hapus_depo($id){
		$this->m_master->hapusData('deposit','id_deposit',$id);
		echo json_encode(array("status"=>true));
	}
	function ajax_editdepo($id){
		$data=$this->m_master->tampilEdit('deposit','id_deposit',$id);
		echo json_encode($data);
	}
	function update_depo(){
		$id['id_deposit']=$this->input->post('id_deposit');
		$data=array(
			'waktu_masuk'=>$this->input->post('tanggal'),
			'deposit'=>$this->input->post('deposit')
			);
		$this->m_master->updateData('deposit',$data,$id);
		echo json_encode(array("status"=>true));
	}
}
?>