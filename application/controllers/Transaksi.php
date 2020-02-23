<?php
class Transaksi extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->library('template');
		$this->load->model('m_transaksi');
	}
	function input(){
		$data['on_input']="active";
		$data['deposit']=$this->m_transaksi->lihatData('depo_terakhir')->result();
		$data['dataHarga']=$this->m_transaksi->lihatData('harga')->result();
		$data['dataTransaksiDepo']=$this->m_transaksi->lihatData('depo_baru')->result();
		$data['dataTransaksiToday']=$this->m_transaksi->lihatDataOrderBy('transaksitoday','id_trx')->result();
		$this->template->display('pages/v_input',$data);
	}
	function simpanInput(){
		$user = $this->input->post('user');
		$nominal=$this->input->post('id_harga');
		$tanggal_trx=$this->input->post('tanggal_trx');
		$keterangan=$this->input->post('keterangan');
		$deposit=$this->input->post('deposit');
		//waktu lunas = jika pilih lunas maka auto sama, jika utang maka kosong
		if ($keterangan=="LUNAS"){
			$tanggal_lunas = $tanggal_trx;
		}else{
			$tanggal_lunas = "";
		}
		//harga modal = deposit terakhir-deposit sekarang
		//data masih kosong
		$depo_new=$this->m_transaksi->lihatData('depo_baru')->result();
		foreach($depo_new as $x){
			$x->deposit;
		}
		//data sudah terisi
		$depo_terakhir=$this->m_transaksi->lihatData('depo_terakhir')->result();
		foreach ($depo_terakhir as $y){
			$y->deposit_akhir;
		}
		if ($y->deposit_akhir==null){
			$harga_modal=$x->deposit - $deposit;
		}elseif($deposit >= $y->deposit_akhir){
			$jml = $y->deposit_akhir + $x->deposit;
			$harga_modal=$jml - $deposit;
		}else{
			$harga_modal=$y->deposit_akhir - $deposit;
		}
		//mencari laba tiap transaksi
		$harga_x=$this->m_transaksi->lihatDataSelect('harga','id_harga',$nominal)->result();
		foreach ($harga_x as $x){
			$x->harga_jual;
		}
		$laba=$x->harga_jual - $harga_modal;
		//echo "harga jual ".$x->harga_jual;
		//echo "<br>harga_modal ".$harga_modal;
		//echo "<br>laba ".$laba;
		//selanjutnya simpan di database 
		$data=array(
			'user'=>$user,
			'id_harga'=>$nominal,
			'tanggal_trx'=>$tanggal_trx,
			'tanggal_lunas'=>$tanggal_lunas,
			'deposit_akhir'=>$deposit,
			'harga_modal'=>$harga_modal,
			'laba'=>$laba,
			'keterangan'=>$keterangan
			);
		$this->m_transaksi->simpanData('transaksi',$data);
		redirect('transaksi/input');
	}
	function lunas(){
		$data['on_lunas']="active";
		$data['deposit']=$this->m_transaksi->lihatData('depo_terakhir')->result();
		$data['dataTransaksiDepo']=$this->m_transaksi->lihatData('depo_baru')->result();
		$data['dataTransaksiLunas']=$this->m_transaksi->lihatDataOrderBy('transaksilunas','id_trx')->result();
		$this->template->display('pages/v_lunas',$data);
	}
	function hutang(){
		$data['on_hutang']="active";
		$data['deposit']=$this->m_transaksi->lihatData('depo_terakhir')->result();
		$data['dataTransaksiDepo']=$this->m_transaksi->lihatData('depo_baru')->result();
		$data['dataTransaksiHutang']=$this->m_transaksi->lihatDataOrderBy('transaksihutang','id_trx')->result();
		$this->template->display('pages/v_hutang',$data);
	}
	function semua(){
		$data['on_semua']="active";
		$data['deposit']=$this->m_transaksi->lihatData('depo_terakhir')->result();
		$data['dataTransaksiDepo']=$this->m_transaksi->lihatData('depo_baru')->result();
		$data['dataTransaksiSemua']=$this->m_transaksi->lihatDataOrderBy('transaksisemua','id_trx')->result();
		$this->template->display('pages/v_semua',$data);
	}

	//hapus dan edit transaksi
	function ajax_edit($id){
		$data=$this->m_transaksi->lihatDataAjax('transaksi','id_trx',$id);
		echo json_encode($data);
	}
	function simpan_trx(){
		$id['id_trx']=$this->input->post('id_trx');
		$data=array(
			'tanggal_lunas'=>$this->input->post('tgl_bayar'),
			'keterangan'=>$this->input->post('keterangan')
			);
		$this->m_transaksi->updateData('transaksi',$data,$id);
		echo json_encode(array("status"=>true));
	}
	function hapus_trx($id){
		$this->m_transaksi->hapusData('transaksi','id_trx',$id);
		echo json_encode(array("status"=>true));
	}
}
?>