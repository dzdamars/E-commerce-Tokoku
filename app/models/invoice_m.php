<?php 

class Invoice_m extends Model {

	public function __construct(){
		parent::__construct();	
	}
	
	public function insert($table, $data){
		return $this->db->insert($table, $data);	
	}
	
	public function upload($data, $in){
		return $this->db->query("UPDATE order_group SET $data WHERE invoice_number = :in", array(':in' => $in));	
	}
	
}