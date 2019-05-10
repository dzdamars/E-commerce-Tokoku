<?php

class Member_m extends Model {

	public function __construct(){
		parent::__construct();	
	}
	
	public function insert($table, $data){
		return $this->db->insert($table, $data);
	}
	
	public function my_account($data, $id){
		return $this->db->query("UPDATE members SET $data WHERE id_member = :idm", array(':idm' => $id));	
	}
	public function update_invoice($data, $in){
		return $this->db->query("UPDATE order_group SET $data WHERE invoice_number = :in", array(':in' => $in));	
	}
}