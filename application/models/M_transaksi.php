<?php
class M_transaksi extends CI_Model{
	function lihatData($table){
		return $this->db->get($table);
	}
	function lihatDataOrderBy($table,$field){
		$this->db->order_by($field,'DESC');
		return $this->db->get($table);
	}
	function simpanData($table,$data){
		$this->db->insert($table,$data);
	}
	function lihatDataSelect($table,$field,$id){
		$this->db->where($field,$id);
		return $this->db->get($table);
	}
	function lihatDataAjax($table,$field,$id){
		$this->db->where($field,$id);
		return $this->db->get($table)->row();
	}
	function updateData($table,$data,$id){
		$this->db->where($id);
		$this->db->update($table,$data);
	}
	function hapusData($table,$field,$id){
		$this->db->where($field,$id);
		$this->db->delete($table);
	}
}
?>