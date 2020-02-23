<?php
class M_master extends CI_Model{
	function tampilData($tabel,$field){
		$this->db->order_by($field,'DESC');
		return $this->db->get($tabel);
	}
	function simpanData($tabel,$data){
		$this->db->insert($tabel,$data);
	}
	function tampilEdit($table,$field,$id){
		$this->db->where($field,$id);
		return $this->db->get($table)->row();
	}
	function hapusData($table,$field,$id){
		$this->db->where($field,$id);
		$this->db->delete($table);
	}
	function updateData($table,$data,$id){
		$this->db->where($id);
		$this->db->update($table,$data);
	}
}
?>