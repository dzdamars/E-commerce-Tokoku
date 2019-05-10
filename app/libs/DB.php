<?php

class DB {
	
	public $pdo;
	
	public function __construct(){
		$this->connect();	
	}
	
	public function connect(){
		try {
			$this->pdo = new PDO("mysql:host=".HOST.";dbname=".DBNY, USER, PASS, array(PDO::ATTR_PERSISTENT => TRUE));	
			$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
		}
		catch(PDOException $e){
			die("ERROR : ".$e->getMessage());
		}
	}

	public function query($sql, $data = array()){
		$q = $this->pdo->prepare($sql);
		return $q->execute($data);
	}
	
	public function insert($table, $data = array()){
		$fill = array_keys($data);
		$key = "(`".implode('`, `', $fill)."`)";
		$val = "(:".implode(', :', $fill).")";
		
		$sql = "INSERT INTO $table $key VALUES $val";
		$q = $this->pdo->prepare($sql);
		return $q->execute($data);
	}
	
	public function fetch($sql, $data = array()){
		$q = $this->pdo->prepare($sql);
		$q->execute($data);
		return $q->fetchAll(PDO::FETCH_ASSOC);
	}
	
	public function count($sql, $data = array()){
		$q = $this->pdo->prepare($sql);
		$q->execute($data);
		return $q->rowCount();
	}
	
}