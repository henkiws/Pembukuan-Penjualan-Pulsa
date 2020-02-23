<?php
class M_pengeluaran extends CI_Model{
	function lihatData($table,$field){
		$this->db->order_by($field,'DESC');
		return $this->db->get($table);
	}
	function simpanData($table,$data){
		$this->db->insert($table,$data);
	}
	function hapusData($table,$field,$id){
		$this->db->where($field,$id);
		$this->db->delete($table);
	}
	function lihatEdit($table,$field,$id){
		$this->db->where($field,$id);
		return $this->db->get($table)->row();
	}
	function updateData($table,$data,$id){
		$this->db->where($id);
		$this->db->update($table,$data);
	}
}
?>