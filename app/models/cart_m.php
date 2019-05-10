<?php

class Cart_m extends Model {

	public function __construct(){
		parent::__construct();	
	}
	
	public function insert($table, $data){
		return $this->db->insert($table, $data);
	}
	
	public function insert_id($table, $data){
		$this->db->insert($table, $data);
		return $this->db->pdo->lastInsertId();
	}
	
	public function update_item($data, $id){
		return $this->db->query("UPDATE items SET $data WHERE id_item = :no", array(':no' => $id));
	}
	
}