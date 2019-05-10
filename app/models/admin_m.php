<?php

class Admin_m extends Model {

	public function __construct(){
		parent::__construct();	
	}
	
	public function insert($table, $data){
		return $this->db->insert($table, $data);
	}
	
	public function edit_item($data, $id){
		return $this->db->query("UPDATE items SET $data WHERE id_item = :idi", array(':idi' => $id));	
	}
	
	public function delete_item($id){
		return $this->db->query("DELETE FROM items WHERE id_item = :idi", array(':idi' => $id));	
	}
	
	public function edit_member($data, $id){
		return $this->db->query("UPDATE members SET $data WHERE id_member = :idm", array(':idm' => $id));	
	}
	
	public function delete_member($id){
		return $this->db->query("DELETE FROM members WHERE id_member = :idi", array(':idi' => $id));	
	}
	
	public function edit_menu($data, $id){
		return $this->db->query("UPDATE menu SET $data WHERE id_menu = :idm", array(':idm' => $id));	
	}

	public function delete_menu($id){
		return $this->db->query("DELETE FROM menu WHERE id_menu = :idm", array(':idm' => $id));	
	}
	
	public function update_invoice($data, $in){
		return $this->db->query("UPDATE order_group SET $data WHERE invoice_number = :in", array(':in' => $in));	
	}
	public function update_invoice_detail($data, $in){
		return $this->db->query("UPDATE order_detail SET $data WHERE invoice_number = :in", array(':in' => $in));	
	}
	
	public function edit_kategori($data, $id){
		return $this->db->query("UPDATE kategori SET $data WHERE id_kategori = :id", array(':id' => $id));	
	}
	
	public function edit_lokasi($data, $id){
		return $this->db->query("UPDATE lokasi SET $data WHERE id_lokasi = :id", array(':id' => $id));	
	}
	
	public function delete_kategori($id){
		return $this->db->query("DELETE FROM kategori WHERE id_kategori = :id", array(':id' => $id));	
	}
	
	public function delete_lokasi($id){
		return $this->db->query("DELETE FROM lokasi WHERE id_lokasi = :id", array(':id' => $id));	
	}
	
}